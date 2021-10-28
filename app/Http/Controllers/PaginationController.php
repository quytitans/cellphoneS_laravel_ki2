<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\mobile;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PaginationController extends Controller
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
        $result = $newMoblie->save();
        if ($result) {
            Session::flash('message', 'Action successfully !!!');
        } else {
            Session::flash('messageFalse', 'Action failed !!!');
        }
        $adminController = new PaginationController();
        return $adminController->index();
    }
    //getdetail
    public function getDetail(Request $request){
        $id = $request->get('id');
        $item = mobile::find($id);
        $brands = brand::all();
        return view('admin.getDetail', [
            'item' => $item,
            'brands' => $brands,
        ]);
    }

    //edit mobile
    public function getDetailEdit(Request $request)
    {
        $id = $request->get('id');
        $item = mobile::find($id);
        $brands = brand::all();
        return view('admin.editMobile', [
            'item' => $item,
            'brands' => $brands,
        ]);
    }

    public function processDetailEdit(Request $request){
        $id = $request->get('id');
        $updateItem = mobile::find($id);
        $updateItem->name = $request->get('name');
        $updateItem->thumbnail = $request->get('thumbnail');
        $updateItem->brandID = $request->get('brandID');
        $updateItem->price = $request->get('price');
        $updateItem->typeID = $request->get('typeID');
        $updateItem->ramID = $request->get('ramID');
        $updateItem->cpu = $request->get('cpu');
        $updateItem->ssdID = $request->get('ssdID');
        $updateItem->screenID = $request->get('screenID');
        $updateItem->updated_at = Carbon::now();
        $updateItem->status = $request->get('status');
        $result = $updateItem->save();
        if ($result) {
            Session::flash('message', 'Update successfully !!!');
        } else {
            Session::flash('messageFalse', 'Update failed !!!');
        }
        $adminController = new PaginationController();
        return $adminController->index();

    }
    //delete mobile
    public function getDetailDelete(Request $request){
        $id = $request->get('id');
        $item = mobile::find($id);
        $brands = brand::all();
        return view('admin.deleteMobile', [
            'item' => $item,
            'brands' => $brands,
        ]);
    }

    public function processDetailDelete (Request $request){
        $id = $request->get('id');
        $deleteItem = mobile::find($id);
        $result=$deleteItem->delete();
        if ($result) {
            Session::flash('message', 'Delete successfully !!!');
        } else {
            Session::flash('messageFalse', 'Action failed !!!');
        }
        $adminController = new PaginationController();
        return $adminController->index();
    }

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


    function fetch_data(Request $request)
    {
        if ($request->ajax()) {
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
                    'page' => $page,
                    'items' => $mobiles
                ])->render();
        }
    }
}
