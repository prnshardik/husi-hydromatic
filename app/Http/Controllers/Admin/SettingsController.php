<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Setting;
    use DB, File;

    class SettingsController extends Controller{
        public function index(){
            $general = Setting::select('id', 'key', 'value')->where(['type' => 'general'])->get();
        
            return view('admin.settings.index', ['general' => $general]);
        }

        public function update(Request $request){
            $data = $request->all();
            unset($data['_method']);
            unset($data['_token']);
            $tab = $data['tab'];
            unset($data['tab']);

            if(!empty($data)){
                foreach($data as $key => $value){
                    $collection = Setting::where(['id' => $key])->first();
                    if(!empty($collection)){
                        $collection->value = $value;
                        $collection->save();
                    }
                }
            }

            return redirect()->back()->with(['success' => 'Settings updated successfully', 'tab' => $tab]);
        }
    }
