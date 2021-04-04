<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FirstController extends Controller
{
//    public function __construct(){
//        $this->middleware('auth')->only(['showNumber', 'showName']);
//    }
//    public function showStrings() {
//        return "Hello From First Controller";
//    }
//
//    public function showNumber() {
//        return '60';
//    }
//
//    public function showName() {
//        return 'Hussien';
//    }

    public function showIndex() {
        $obj = new \stdClass();
        $obj-> name = 'hussien';
        $obj-> age = '25';
        return view('welcome',compact('obj'));
    }
    public function showUser() {
        $data = [];
        $data['id'] = 'Hussien Attia';
        $data['age'] = '25';
        return view('user',$data);
    }

    public function showLanding() {
        return view("landing");
    }
    public function welcomed() {
        return view("welcome");
    }
}
