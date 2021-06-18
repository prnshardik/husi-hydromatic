<?php

    namespace App\Http\Controllers\Front;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Http\Requests\ContactUsRequest;
    use App\Models\ContactUs;
    use App\Mail\ContactUsMail;
    use DB, Mail;

    class RootController extends Controller{
        public function index(){
            $path = URL('/uploads/products').'/';

            $products = DB::table('products as p')
                            ->select('p.id', 'c.name as category_name', 'p.name', 'p.description',
                                        DB::Raw("CASE
                                            WHEN ".'p.image'." != '' THEN CONCAT("."'".$path."'".", ".'p.image'.")
                                            ELSE CONCAT("."'".$path."'".", 'default.png')
                                        END as image")
                                    )
                            ->leftjoin('categories as c', 'c.id', 'p.category_id')
                            ->where(['p.status' => 'active'])
                            ->get();

            return view('front.index', ['products' => $products]);
        }

        public function product($id = ''){
            if($id == '')
                return redirect()->back()->with(['error' => 'Something went wrong, please try again later']);

            $id = base64_decode($id);

            $path = URL('/uploads/products').'/';

            $product = DB::table('products as p')
                            ->select('p.id', 'c.name as category_name', 'p.name', 'p.description',
                                        DB::Raw("CASE
                                            WHEN ".'p.image'." != '' THEN CONCAT("."'".$path."'".", ".'p.image'.")
                                            ELSE CONCAT("."'".$path."'".", 'default.png')
                                        END as image")
                                    )
                            ->leftjoin('categories as c', 'c.id', 'p.category_id')
                            ->where(['p.status' => 'active', 'p.id' => $id])
                            ->first();

            return view('front.product', ['product' => $product]);
        }

        public function contact(ContactUsRequest $request){
            if(!$request->ajax()){ exit('No direct script access allowed'); }

            $crud = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
                'is_read' => 'n'
            ];

            $contact = ContactUs::create($crud);

            if($contact){
                $mailData = [   
                                'email_from_address' => _settings('MAIL_FROM_ADDRESS'), 
                                'name' => $request->name, 
                                'email' => $request->email, 
                                'phone' => $request->phone, 
                                'subject' => $request->subject, 
                                'message' => $request->message
                            ];

                try{
                    Mail::to(_settings('MAIL_FROM_ADDRESS'))->send(new ContactUsMail($mailData));
                }catch(\Exception $e){
                
                }

                return response()->json(['code' => 200, 'message' => 'Thanks for contact us, we will take actions sortly.']);
            }
            else
                return response()->json(['code' => 201, 'message' => 'Something went wrong, please try again later.']);
        }
    }
