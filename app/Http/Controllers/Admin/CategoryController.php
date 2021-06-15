<?php    

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Http\Requests\CategoryRequest;
    use App\Models\Category;
    use DB, DataTables, File;

    class CategoryController extends Controller{
        /** index */
            public function index(Request $request){
                if($request->ajax()){
                    $data = Category::select('id', 'name', DB::Raw("SUBSTRING(".'description'.", 1, 30) as description"),  'status')->get();

                    return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($data){
                                return ' <div class="btn-group btn-sm">
                                                <a href="'.route('admin.categories.view', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
                                                    <i class="fa fa-eye"></i>
                                                </a> 
                                                <a href="'.route('admin.categories.edit', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
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

                return view('admin.categories.index');
            }
        /** index */

        /** create */
            public function create(Request $request){
                return view('admin.categories.create');
            }
        /** create */

        /** insert */
            public function insert(CategoryRequest $request){
                if($request->ajax()){ return true; }

                if(!empty($request->all())){
                    $crud = [
                        'name' => ucfirst($request->name),
                        'description' => $request->description ?? NULL,
                        'status' => 'active',
                        'created_at' => date('Y-m-d H:i:s'),
                        'created_by' => auth()->user()->id,
                        'updated_at' => date('Y-m-d H:i:s'),
                        'updated_by' => auth()->user()->id
                    ];

                    $last_id = Category::insertGetId($crud);
                    
                    if($last_id)
                        return redirect()->route('admin.categories')->with('success', 'Category added successfully.');
                    else
                        return redirect()->back()->with('error', 'Faild to category')->withInput();
                }else{
                    return redirect()->back()->with('error', 'Something went wrong')->withInput();
                }
            }
        /** insert */

        /** edit */
            public function edit(Request $request){
                if($request->id == '')
                    return redirect()->back()->with('error', 'Something went wrong');

                $id = base64_decode($request->id);
                
                $data = Category::select('id', 'name', 'description')->where(['id' => $id])->first();
            
                if($data)
                    return view('admin.categories.edit', ['data' => $data]);
                else
                    return redirect()->back()->with('error', 'No data found');
            }
        /** edit */ 

        /** update */
            public function update(CategoryRequest $request){
                if($request->ajax()){ return true; }

                if(!empty($request->all())){
                    $crud = [
                        'name' => ucfirst($request->name),
                        'description' => $request->description ?? NULL,
                        'updated_at' => date('Y-m-d H:i:s'),
                        'updated_by' => auth()->user()->id
                    ];

                    $update = Category::where(['id' => $request->id])->update($crud);
                
                    if($update)
                        return redirect()->route('admin.categories')->with('success', 'Category updated successfully');
                    else
                        return redirect()->back()->with('error', 'Faild to update category')->withInput();
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

                $data = Category::select('id', 'name', 'description')->where(['id' => $id])->first();
            
                if($data)
                    return view('admin.categories.view', ['data' => $data]);
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

                    $data = Category::where(['id' => $id])->first();

                    if(!empty($data)){
                        if($status == 'deleted')
                            $update = Category::where(['id' => $id])->delete();
                        else
                            $update = Category::where(['id' => $id])->update(['status' => $status, 'updated_at' => date('Y-m-d H:i:s'), 'updated_by' => auth()->user()->id]);
                        
                        if($update)
                            return response()->json(['code' => 200]);
                        else
                            return response()->json(['code' => 201]);
                    }else{
                        return response()->json(['code' => 201]);
                    }
                }else{
                    return response()->json(['code' => 201]);
                }
            }
        /** change-status */
    }