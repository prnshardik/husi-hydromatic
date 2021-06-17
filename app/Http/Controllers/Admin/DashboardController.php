<?php    

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;

    use Illuminate\Http\Request;
    use Auth, DB;

    class DashboardController extends Controller{
        /** index */
            public function index(Request $request){
                $products = DB::table('products')->select(DB::Raw("COUNT(".'id'.") as count"))->where(['status' => 'active'])->first();
                $categories = DB::table('categories')->select(DB::Raw("COUNT(".'id'.") as count"))->where(['status' => 'active'])->first();

                $contactus = DB::table('contact_us')->select('id', 'name', 'email', 'phone')->where(['is_read' => 'n'])->get();

                return view('admin.dashboard', ['products' => $products->count, 'categories' => $categories->count, 'contactus' => $contactus]);
            }
        /** index */
    }