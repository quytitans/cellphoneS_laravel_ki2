<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApartmentRequest;
use App\Models\apartments;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function getHomePage(){
        return view('admin.home');
    }

    public function getAll(){
        $apartments = apartments::paginate(6);
        return view ('admin.apartments',['apartments'=>$apartments]);
    }

    public function getForm(){
        return view('admin.form');
    }

    public function createApartment(ApartmentRequest $request){
        $apt = new apartments();
        $apt->name = $request->get('name');
        $apt->address = $request->get('address');
        $apt->price = $request->get('price');
        $apt->information = $request->get('information');
        $apt->informationDetail = $request->get('informationDetail');
        $apt->thumbnail = $request->get('thumbnail');
        $apt->status = $request->get('status');
        $apt->save();
        return view ('admin.form');
        $apartmentcontroller = new ApartmentController();
        return $apartmentcontroller->getAll();
    }
}
