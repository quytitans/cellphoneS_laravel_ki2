<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\mobile;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function getlayout(){
        $brands = brand::all();
        $mobiles = mobile::paginate(9);
        return view('frontend.home', [
            'brands' => $brands,
            'mobiles'=>$mobiles
        ]);
    }
}
