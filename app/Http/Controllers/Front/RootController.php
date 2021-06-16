<?php

    namespace App\Http\Controllers\Front;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use DB;

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
    }
