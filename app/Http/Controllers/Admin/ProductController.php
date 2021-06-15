<?php    

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Http\Requests\ProductRequest;
    use App\Models\Product;
    use App\Models\Category;
    use DB, DataTables, File;

    class ProductController extends Controller{
        /** index */
            public function index(Request $request){
                if($request->ajax()){
                    $data = Product::select('id', 'name', DB::Raw("SUBSTRING(".'description'.", 1, 30) as description"),  'status')->get();

                    return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($data){
                                return ' <div class="btn-group btn-sm">
                                                <a href="'.route('admin.product.view', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
                                                    <i class="fa fa-eye"></i>
                                                </a> 
                                                <a href="'.route('admin.product.edit', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a> 
                                                <a href="javascript:;" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fa fa-bars"></i>
                                                </a> 
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="javascript:;" onclick="change_status(this);" data-status="active" data-old_status="'.$data->status.'" data-id="'.base64_encode($data->id).'">Active</a></li>
                                                    <li><a class="dropdown-item" href="javascript:;" onclick="change_status(this);" data-status="inactive" data-old_status="'.$data->status.'" data-id="'.base64_encode($data->id).'">Inactive</a></li>
                                                    <li><a class="dropdown-item" href="javascript:;" onclick="change_status(this);" data-status="deleted" data-old_status="'.$data->status.'" data-id="'.base64_encode($data->id).'">Delete</a></li>
                                                </ul>
                                            </div>';
                            })

                            ->editColumn('status', function($data) {
                                if($data->status == 'active'){
                                    return '<span class="badge badge-pill badge-success">Active</span>';
                                }else if($data->status == 'inactive'){
                                    return '<span class="baige badge-pill badge-warning">Inactive</span>';
                                }else{
                                    return '-';
                                }
                            })

                            ->rawColumns(['action', 'status'])
                            ->make(true);
                }

                return view('admin.products.index');
            }
        /** index */

        /** create */
            public function create(Request $request){
                $categories = Category::select('id', 'name')->where(['status' => 'active'])->get();

                return view('admin.products.create', ['categories' => $categories]);
            }
        /** create */

        /** insert */
            public function insert(ProductRequest $request){
                if($request->ajax()){ return true; }

                if(!empty($request->all())){
                    $crud = [
                        'category_id' => $request->category_id,
                        'name' => ucfirst($request->name),
                        'description' => $request->description ?? NULL,
                        'status' => 'active',
                        'created_at' => date('Y-m-d H:i:s'),
                        'created_by' => auth()->user()->id,
                        'updated_at' => date('Y-m-d H:i:s'),
                        'updated_by' => auth()->user()->id
                    ];

                    if(!empty($request->file('image'))){
                        $file = $request->file('image');
                        $filenameWithExtension = $request->file('image')->getClientOriginalName();
                        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
                        $extension = $request->file('image')->getClientOriginalExtension();
                        $filenameToStore = time()."_".str_replace(' ', '_', strtolower($request->name)).'.'.$extension;

                        $folder_to_uploads = public_path().'/uploads/products/';

                        if (!\File::exists($folder_to_uploads))
                            \File::makeDirectory($folder_to_uploads, 0777, true, true);

                        $crud["image"] = $filenameToStore;
                    }else{
                        $crud["image"] = 'default.png';
                    }

                    $last_id = Product::insertGetId($crud);
                    
                    if($last_id){
                        if(!empty($request->file('image')))
                            $file->move($folder_to_uploads, $filenameToStore);
                        
                        return redirect()->route('admin.products')->with('success', 'Product added successfully.');
                    }else{
                        return redirect()->back()->with('error', 'Faild to add product')->withInput();
                    }
                }else{
                    return redirect()->back()->with('error', 'Something went wrong')->withInput();
                }
            }
        /** insert */

        /** edit */
            public function edit(Request $request){
                if($request->id == '')
                    return redirect()->back()->with('error', 'Something went wrong');

                $categories = Category::select('id', 'name')->where(['status' => 'active'])->get();

                $id = base64_decode($request->id);

                $path = URL('/uploads/products').'/';
                
                $data = Product::select('id', 'category_id', 'name', 'description',
                                        DB::Raw("CASE
                                            WHEN ".'image'." != '' THEN CONCAT("."'".$path."'".", ".'image'.")
                                            ELSE CONCAT("."'".$path."'".", 'default.png')
                                            END as image"))
                                ->where(['id' => $id])
                                ->first();
            
                if($data)
                    return view('admin.products.edit', ['data' => $data, 'categories' => $categories]);
                else
                    return redirect()->back()->with('error', 'No data found');
            }
        /** edit */ 

        /** update */
            public function update(ProductRequest $request){
                if($request->ajax()){ return true; }

                $exst_rec = Product::where(['id' => $request->id])->first();

                if(!empty($request->all())){
                    $crud = [
                        'category_id' => $request->category_id,
                        'name' => ucfirst($request->name),
                        'description' => $request->description ?? NULL,
                        'updated_at' => date('Y-m-d H:i:s'),
                        'updated_by' => auth()->user()->id
                    ];

                    if(!empty($request->file('image'))){
                        $file = $request->file('image');
                        $filenameWithExtension = $request->file('image')->getClientOriginalName();
                        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
                        $extension = $request->file('image')->getClientOriginalExtension();
                        $filenameToStore = time()."_".str_replace(' ', '_', strtolower($request->name)).'.'.$extension;

                        $folder_to_upload = public_path().'/uploads/products/';

                        if (!\File::exists($folder_to_upload))
                            \File::makeDirectory($folder_to_upload, 0777, true, true);

                        $crud["image"] = $filenameToStore;
                    }else{
                        $crud["image"] = $exst_rec->image;
                    }

                    $update = Product::where(['id' => $request->id])->update($crud);
                
                    if($update){
                        if(!empty($request->file('image'))){
                            $file->move($folder_to_upload, $filenameToStore);
                            @unlink(public_path().'/uploads/products/'.$exst_rec->image);
                        }

                        return redirect()->route('admin.products')->with('success', 'Product updated successfully');
                    }else{
                        return redirect()->back()->with('error', 'Faild to update product')->withInput();
                    }
                }else{
                    return redirect()->back()->with('error', 'Something went wrong')->withInput();
                }
            }
        /** update */

        /** view */
            public function view(Request $request, $id=''){
                if($request->id == '')
                    return redirect()->back()->with('error', 'Something went wrong');

                $id = base64_decode($request->id);

                $categories = Category::select('id', 'name')->where(['status' => 'active'])->get();

                $path = URL('/uploads/products').'/';
                
                $data = Product::select('id', 'category_id', 'name', 'description',
                                        DB::Raw("CASE
                                            WHEN ".'image'." != '' THEN CONCAT("."'".$path."'".", ".'image'.")
                                            ELSE CONCAT("."'".$path."'".", 'default.png')
                                            END as image"))
                                ->where(['id' => $id])
                                ->first();
            
                if($data)
                    return view('admin.products.view', ['data' => $data, 'categories' => $categories]);
                else
                    return redirect()->back()->with('error', 'No data found');    
            }
        /** view */ 

        /** change-status */
            public function change_status(Request $request){
                if(!$request->ajax()){ exit('No direct script access allowed'); }

                if(!empty($request->all())){
                    $id = base64_decode($request->id);
                    $status = $request->status;

                    $data = Product::where(['id' => $id])->first();

                    if(!empty($data)){
                        if($status == 'deleted')
                            $update = Product::where(['id' => $id])->delete();
                        else
                            $update = Product::where(['id' => $id])->update(['status' => $status, 'updated_at' => date('Y-m-d H:i:s'), 'updated_by' => auth()->user()->id]);
                        
                        if($update){
                            if($status == 'deleted'){
                                $exst_file = public_path().'/uploads/products/'.$data->image;
    
                                if(\File::exists($exst_file) && $exst_file != '')
                                    @unlink($exst_file);
                            }
                            
                            return response()->json(['code' => 200]);
                        }else{
                            return response()->json(['code' => 201]);
                        }
                    }else{
                        return response()->json(['code' => 201]);
                    }
                }else{
                    return response()->json(['code' => 201]);
                }
            }
        /** change-status */

        /** remove-image */
            public function remove_image(Request $request){
                if(!$request->ajax()){ exit('No direct script access allowed'); }

                if(!empty($request->all())){
                    $id = base64_decode($request->id);
                    $data = Product::find($id);

                    $data = Product::where(['id' => $id])->first();
               
                    if($data){
                        $update = Product::where(['id' => $id])->update(['image' => null]);

                        if($update){
                            if($data->image != '' || $data->image != null){
                                $file_path = public_path().'/uploads/products/'.$data->image;
    
                                if(File::exists($file_path) && $file_path != '')
                                    if($data->image != 'default.png')
                                        @unlink($file_path);   
                            }

                            return response()->json(['code' => 200]);
                        }else{
                            return response()->json(['code' => 201]);
                        }
                    }else{
                        return response()->json(['code' => 201]);    
                    }
                }else{
                    return response()->json(['code' => 201]);
                }
            }
        /** remove-image */
    }