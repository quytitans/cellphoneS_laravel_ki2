<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\mobile;
use Illuminate\Http\Request;

class frontEndController extends Controller
{
    public function getlayout()
    {
        $brands = brand::all();
        $mobiles = mobile::orderBy('updated_at', 'DESC')->paginate(9);
        return view('frontend.home', [
            'brands' => $brands,
            'mobiles' => $mobiles
        ]);
    }

    public function getHomeBrand(Request $request)
    {
        $brandID = $request->get('brandid');
        $brands = brand::all();
        $mobiles = mobile::where('brandID', '=', $brandID)->orderBy('updated_at', 'DESC')->paginate(9);
        return view('frontend.home', [
            'brands' => $brands,
            'mobiles' => $mobiles
        ]);
    }

    public function getDetailPage(Request $request)
    {
        $id = $request->id;
        $brands = brand::all();
        $mobile = mobile::find($id);
        return view('frontend.mobilesDetail', [
            'brands' => $brands,
            'item' => $mobile
        ]);
    }

    public function getCartPage()
    {
        $brands = brand::all();
        return view('frontend.cart', [
            'brands' => $brands
        ]);
    }
}
