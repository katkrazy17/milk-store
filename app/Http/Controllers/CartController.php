<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;
use App\Product_detail;
use App\Category;
use App\Oder;
use App\Oder_detail;
use Cart,Datetime;
use Session;
class CartController extends Controller
{
    // Pages - Giỏ hàng
    public function getcart()
    {   
        $category = Category::all();
        return view ('detail.cart',compact('category'));
    }
    // Thêm giỏ hàng
    public function addcart($id)
    {
        $pro = Product::where('id',$id)->first();
        //dd($pro);
        Cart::add(['id' => $pro->id, 'name' => $pro->name, 'qty' => 1, 'price' => $pro->price,'options' => ['img' => $pro->images]]);
        // return view ('detail.cart');
        // return redirect()->route('getcart');
        return back();
     
    }
    // Update giỏ hàng (tăng số lượng)
    public function getupdatecart($id,$qty,$dk)
    {
        $category = Category::all();
        if ($dk=='up') {
            $qt = $qty+1;
            Cart::update($id, $qt);
            return view ('detail.cart',compact('category'));
        } elseif ($dk=='down') {
            if ($qty>=2) {
                $qt = $qty-1;
                Cart::update($id, $qt);
                return view ('detail.cart',compact('category'));
            }
            else {
                $qt = $qty-0;
                Cart::update($id, $qt);
                return view ('detail.cart',compact('category'));
            }
        } else {
            return view ('detail.cart',compact('category'));
        }
    }

    public function getdeletecart($id)
    {
        Cart::remove($id);
        Session::flash('ketqua', 'Xóa sản phẩm thành công!!!');
        return redirect('cart');
    }

 
}
