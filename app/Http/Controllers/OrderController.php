<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\mobile;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function process(Request $request)
    {
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
        }
        if (sizeof($shoppingCart) == 0) {
            return view('frontend.error404', [
                'msg' => 'Không có sản phẩm nào trong giỏ hàng'
            ]);
        }
        $shipName = $request->get('shipName');
        $shipEmail = $request->get('shipEmail');
        $shipAddress = $request->get('shipAddress');
        $shipPhone = $request->get('shipPhone');
        $shipNote = $request->get('shipNote');
        //tao order
        $order = new Order();
        $order->userID = 1; //fix cung vi chua pha trien tinh nang dang nhap
        $order->shipName = $shipName;
        $order->shipEmail = $shipEmail;
        $order->shipPhone = $shipPhone;
        $order->shipAddress = $shipAddress;
        $order->shipNote = $shipNote;
        $order->checkOut = false;
        $order->created_at = Carbon::now();
        $order->updated_at = Carbon::now();
        $order->status = 2;
        //tao order detail
        $hasError = false;
        //tao danh sach orderDetail de cho them orderID
        $arrayOderDetail = [];
        foreach ($shoppingCart as $cartItem) {
            $product = mobile::find($cartItem->id);
            if ($product == null) {
                $hasError = true;
                break;
            }
            $orderDetail = new OrderDetail();
            $orderDetail->productID = $product->id;
            $orderDetail->quantity = $cartItem->quantity;
            $orderDetail->unitPrice = $product->price;
            $order->totalPrice += $cartItem->quantity * $product->price;
            array_push($arrayOderDetail, $orderDetail);
        }
        //save ca 2 vao qua transaction
        try {
            DB::beginTransaction();
            $order->save();
            $orderID1 = $order->id;
            foreach ($arrayOderDetail as $orderDetail) {
                $orderDetail->orderID = $orderID1;
                $orderDetail->save();
            }
            DB::commit();
            Session::remove('shoppingCart');
            $brands = brand::all();
            return view('frontend.submitSuccessPage', ['order' => $order, 'brands' => $brands]);
        } catch (\Exception $e) {
            DB::rollBack();
        }
        if ($hasError) {
            return view('frontend.error404', [
                'msg' => 'Có lỗi xảy ra vui lòng thử lại'
            ]);
        }


    }
}
