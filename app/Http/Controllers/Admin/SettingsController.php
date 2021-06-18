<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Setting;
    use DB, File;

    class SettingsController extends Controller{
        public function index(){
            $general = Setting::select('id', 'key', 'value')->where(['type' => 'general'])->get();
            $smtp = Setting::select('id', 'key', 'value')->where(['type' => 'smtp'])->get();
        
            return view('admin.settings.index', ['general' => $general, 'smtp' => $smtp]);
        }

        public function update(Request $request){
            $data = $request->all();
            unset($data['_method']);
            unset($data['_token']);
            $tab = $data['tab'];
            unset($data['tab']);
            session(['tab' => $tab]);

            if(!empty($data)){
                foreach($data as $key => $value){
                    $collection = Setting::where(['id' => $key])->first();
                    if(!empty($collection)){
                        $collection->value = $value;
                        $collection->save();
                    }
                }
            }

            if($tab == 'smtp')
                _setMailConfig();

            return redirect()->back()->with(['success' => 'Settings updated successfully', 'tab' => $tab]);
        }
    }
