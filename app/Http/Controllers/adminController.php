<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\mobile;
use Carbon\Carbon;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //add new product mobile
    public function getFormCreate()
    {
        $brands = brand::all();
        return view('admin.createNewMobile', [
            'brands' => $brands,
        ]);
    }

    public function saveFormCreate(Request $request)
    {
        $newMoblie = new mobile();
        $newMoblie->name = $request->get('name');
        $newMoblie->thumbnail = $request->get('thumbnail');
        $newMoblie->brandID = $request->get('brandID');
        $newMoblie->price = $request->get('price');
        $newMoblie->typeID = $request->get('typeID');
        $newMoblie->ramID = $request->get('ramID');
        $newMoblie->cpu = $request->get('cpu');
        $newMoblie->ssdID = $request->get('ssdID');
        $newMoblie->screenID = $request->get('screenID');
        $newMoblie->created_at = Carbon::now();
        $newMoblie->updated_at = Carbon::now();
        $newMoblie->status = $request->get('status');
        $newMoblie->save();
        $adminController = new adminController;
        return $adminController->getAllProductMobile();
    }

    public function getAllProductMobile()
    {
        $brands = brand::all();
        $allMobiles = mobile::paginate(5);
        return view('admin.allProducts_Mobile',
            [
                'items' => $allMobiles,
                'brands' => $brands,
            ]);
    }

//    bat dau bo loc
    public function filterAll(Request $request)
    {
        $numberDisplay = 5;
        if ($request->has('numberDisplay')) {
            if (isset($request->numberDisplay)) {
                $numberDisplay = $request->get('numberDisplay');
            }
        }
        $brands = brand::all();
        $mobiles = mobile::query()
            ->nameFilter($request)
            ->brandFilter($request)
            ->priceFilter($request)
            ->dateFilter($request)
            ->ramFilter($request)
            ->paginate($numberDisplay);

        return view('admin.allProducts_Mobile',
            [
                'items' => $mobiles,
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
        $brands = brand::all();
        $mobiles = mobile::query()
            ->nameFilter($request)
            ->brandFilter($request)
            ->priceFilter($request)
            ->dateFilter($request)
            ->ramFilter($request)
            ->paginate($numberDisplay);
        $OUTPUT = '';
        $OUTPUT = $this->renderTable($mobiles);
        return response()->json($OUTPUT);
    }

    //renderData to html code
    public function renderTable($mobiles){
        $OUTPUT='';
        foreach ($mobiles as $item) {
            //tinh toan chuoi status
            if ($item->status == 1) {
                $status = 'Hàng sắp về';
            }
            if ($item->status == 2) {
                $status = 'Đang bán';
            }
            if ($item->status == 3) {
                $status = 'Hết hàng';
            }
            if ($item->status == 4) {
                $status = 'Nhận Pre-Order';
            }
            $thumbnail3 = '';
            foreach ($item->ArrayThumbnail as $thumbnail) {
                $thumbnail3 .= '<img width="100" class="img-rounded" src="' . $thumbnail . '"alt="">';
            }
            $OUTPUT .= '<tr>
                <td>' . $item->id . '</td>
                <td>' . $item->name . '</td>
                <td>
                    ' . $thumbnail3 . '
                </td>
                <td>' . $item->brandName->name . '</td>
                <td>' . $item->price . '</td>
                <td>' . $item->typeID . '</td>
                <td>' . $item->ramID . ' GB</td>
                <td>' . $item->cpu . '</td>
                <td>' . $item->ssdID . ' GB</td>
                <td>' . $item->screenID . '</td>
                <td>' . $item->created_at . '</td>
                <td>' . $item->updated_at . '</td>
                <td>
                    ' . $status . '
                </td>
            </tr>';
        }
        return $OUTPUT;
    }
}
