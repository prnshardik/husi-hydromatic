<?php

    namespace App\Http\Controllers\Front;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    class RootController extends Controller{
        public function index(){
            return view('front.index');
        }

        public function product($id = ''){
            return view('front.product');
        }
    }
