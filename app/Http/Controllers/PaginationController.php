<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\mobile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaginationController extends Controller
{
    function index()
    {
        $brands = brand::all();
        $allMobiles = mobile::paginate(5);
        return view('admin.allProducts_Mobile',
            [
                'items' => $allMobiles,
                'brands' => $brands,
            ]);
    }

    public function filterAllAjax(Request $request)
    {
        $numberDisplay = 5;
        if ($request->has('numberDisplay')) {
            if (isset($request->numberDisplay)) {
                $numberDisplay = $request->get('numberDisplay');
            }
        }
        $mobiles = mobile::query()
            ->nameFilter($request)
            ->brandFilter($request)
            ->priceFilter($request)
            ->dateFilter($request)
            ->ramFilter($request)
            ->paginate($numberDisplay);
        return view('admin.renderTable',
            [
                'items' => $mobiles,
            ])->render();
    }


    function fetch_data(Request $request){
        if ($request->ajax()){
            $page = $request->page;
            $numberDisplay = 5;
            if ($request->has('numberDisplay')) {
                if (isset($request->numberDisplay)) {
                    $numberDisplay = $request->get('numberDisplay');
                }
            }
            $mobiles = mobile::query()
                ->nameFilter($request)
                ->brandFilter($request)
                ->priceFilter($request)
                ->dateFilter($request)
                ->ramFilter($request)
                ->paginate($numberDisplay);

            return view('admin.renderTable',
                [
                    'page'=>$page,
                    'items' => $mobiles
                ])->render();
        }
    }
}
