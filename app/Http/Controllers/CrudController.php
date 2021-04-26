<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class CrudController extends Controller
{

    public function getOffers() {

        return Offer::select('id','name')->get();
    }

//    public function store() {
//
//        Offer::create([
//            'name' => 'Cleaning',
//            'price' => '250EGP',
//            'details' => 'Description'
//        ]);
//    }

    public function create() {
        return view('offers.create');
    }
    public function store(OfferRequest $req) {
//        $validator = validator::make($req->all(),[
//
//            'name' => 'required|max:100|unique:offers,name',
//            'price' => 'required|numeric',
//            'details' => 'required|min:5|max:100'
//        ],[
//            'name.required' => 'يجب ان يكون الحقل مملو'
//        ]);
//
//        if($validator->fails()) {
//
//            return redirect()->back()->withErrors($validator)->withInputs($req->all());
//        }else {
//
//
//            return redirect()->back()->with(['success' => 'Your Offer Add Successfuly']);
//        }

            Offer::create([
                'name_en' => $req->name_en,
                'name_ar' => $req->name_ar,
                'price_en' => $req->price_en,
                'price_ar' => $req->price_ar,
                'details_en' => $req->details_en,
                'details_ar' => $req->details_ar,
            ]);
        return redirect()->back()->with(['success' => 'Your Offer Add Successfuly']);

    }

    public function getAllOffer() {
        $langs = LaravelLocalization::getCurrentLocale();
        $offers = offer::select('id','price_'. $langs .' AS price','name_'. $langs .' AS name','details_'. $langs .' AS details')->get();
        return view("offers.all",compact('offers'));
    }
}
