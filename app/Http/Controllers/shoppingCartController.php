<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\mobile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use stdClass;

class shoppingCartController extends Controller
{
    public function getErrorPage()
    {
        return view('frontend.error404');
    }

    //show thong tin gio hang
    public function show()
    {
        // kiểm tra sự tồn tại của shopping cart trong session.
        $shoppingCart = null;
        // nếu có shopping cart rồi thì lấy ra
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
        } else {
            // nếu chưa có thì tạo shopping cart mới.
            $shoppingCart = [];
        }
        $brand = brand::all();
        return view('frontend.cart', [
            'shoppingCart' => $shoppingCart,
            'brands' => $brand
        ]);
    }

    //them san pham vao gio hang
    public function add(Request $request)
    {
        //lay thong tin san pham ban vao shopping cart
        $itemID = $request->get('id');
        $itemQuantity = $request->get('quantity');

        if ($itemQuantity <= 0) {
            return view('frontend.error404', [
                'msg' => 'Số lượng sản phẩm cần lớn hơn 0.'
            ]);
        }
        // 1. Kiểm tra sự tồn tại của sản phẩm.
        $obj = mobile::find($itemID);
        // nếu không tồn tại thì trả về 404.
        if ($obj == null) {
            return view('frontend.error404', [
                'msg' => 'Không tìm thấy sản phẩm'
            ]);
        }
        // 2. Check số lượng tồn kho. Nếu như số lượng mua lớn hơn số lượng trong kho thì báo lỗi.

        // kiểm tra sự tồn tại của shopping cart trong session.
        $shoppingCart = null;
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
        } else {
            $shoppingCart = [];
        }
        // kiểm tra sản phẩm có tồn tại trong giỏ hàng không.
        if (array_key_exists($itemID, $shoppingCart)) {
            $existingCartItem = $shoppingCart[$itemID];
            $existingCartItem->quantity += $itemQuantity;
            $shoppingCart[$itemID] = $existingCartItem;
        } else {
            //truong hop san phan chua co trong gio hang thi tao moi 1 cart item
            $cartItem = new stdClass();
            $cartItem->id = $obj->id;
            $cartItem->name = $obj->name;
            $cartItem->brand = $obj->brandName->name;
            $cartItem->thumbnail = $obj->mainThumbnail;
            $cartItem->price = $obj->price;
            $cartItem->quantity = $itemQuantity;
            $shoppingCart[$itemID] = $cartItem;
        }
        Session::put('shoppingCart', $shoppingCart);
        $brand = brand::all();
        return view('frontend.cart', [
            'brands' => $brand,
            'shoppingCart' => $shoppingCart
        ]);
    }

    //update cart item
    public function update(Request $request)
    {
        $itemID = $request->get('id');
        $itemQuantity = $request->get('quantity');
        if ($itemQuantity <= 0) {
            return view('frontend.error404', [
                'msg' => 'Số lượng sản phẩm cần lớn hơn 0.'
            ]);
        }
        // 1. Kiểm tra sự tồn tại của sản phẩm.
        $obj = mobile::find($itemID);
        // nếu không tồn tại thì trả về 404.
        if ($obj == null) {
            return view('frontend.error404', [
                'msg' => 'Không tìm thấy sản phẩm'
            ]);
        }
        // kiểm tra sự tồn tại của shopping cart trong session.
        $shoppingCart = null;
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
        } else {
            $shoppingCart = [];
        }
        // kiểm tra sản phẩm có tồn tại trong giỏ hàng không.
        if (array_key_exists($itemID, $shoppingCart)) {
            $existingCartItem = $shoppingCart[$itemID];
            $existingCartItem->quantity = $itemQuantity;
            $shoppingCart[$itemID] = $existingCartItem;
        } else {
            //truong hop san phan chua co trong gio hang thi tao moi 1 cart item
            $cartItem = new stdClass();
            $cartItem->id = $obj->id;
            $cartItem->name = $obj->name;
            $cartItem->brand = $obj->brandName->name;
            $cartItem->thumbnail = $obj->mainThumbnail;
            $cartItem->price = $obj->formatPrice;
            $cartItem->quantity = $itemQuantity;
            $shoppingCart[$itemID] = $cartItem;
        }
        Session::put('shoppingCart', $shoppingCart);
        $brand = brand::all();
        return view('frontend.cart', [
            'brands' => $brand,
            'shoppingCart' => $shoppingCart
        ]);
    }

    //remove cart item
    public function remove(Request $request)
    {
        $itemID = $request->get('id');
        // kiểm tra sự tồn tại của shopping cart trong session.
        $shoppingCart = null;
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
        } else {
            $shoppingCart = [];
        }
        unset($shoppingCart[$itemID]); // Xoá giá trị theo key ở trong map với php
        Session::put('shoppingCart', $shoppingCart);
        $brand = brand::all();
        return view('frontend.cart', [
            'brands' => $brand,
            'shoppingCart' => $shoppingCart
        ]);
    }
}
