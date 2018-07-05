<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;
use App\Product_detail;
use App\Category;
use App\Oder;
use App\Oder_detail;
use DB,Cart,Datetime;
use Session;
use App\Detail_img;
class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     controller > view ajax > view index > js lôi no ra đay
     */

    // Trang chủ người dùng 
    public function index(Request $request)
    {
        $new_product = Product::where('status',1)->inRandomOrder()->paginate(8);
        return view('index.home',compact('new_product'));
    }
    //trang sản phẩm laptop
    public function getcate(Request $request)
    {
        $new_product = Product::where('status',1)->paginate(3);
        return view('category.laptop',compact('new_product'));
    } 
    // Trang chi tiết sản phẩm laptop thánh
      public function detail($id)
    {
        $laptop = Product::where('id',$id)->first();
        $laptop_detail = Product_detail::where('id',$id)->first();
        return view ('detail.laptop',compact('laptop','laptop_detail'));
    }
    //Phân loại sản phẩm
    public function getLoaiSp(Request $request,$id) {
        $new_product = Product::where('category_id',$id)->paginate(4);
        return view('category.laptop',compact('new_product'));
    }

    // gọi view đặt hàng
    public function getoder()
    {
        if (Auth::guest()) {
            return redirect('login');
        } else {
            return view ('detail.oder');
        }        
    }
    // đặt hàng
    public function postoder(Request $Request)
    {
        $oder = new Oder();
        $total =0;
        foreach (Cart::content() as $row) {
            // tổng = tổng hiện tại (0) + số lượng * đơn giá
            $total = $total + ( $row->qty * $row->price);
        }
        $oder->user_id = Auth::user()->id;
        $oder->qty = Cart::count();
        $oder->total =  $total; // tổng
        $oder->status = 0;
        $oder->created_at = new datetime;
         //dd($oder);
        $oder->save();

        $oder_id =$oder->id;
        foreach (Cart::content() as $row) {
           $detail = new Oder_detail();
           $detail->product_id = $row->id;
           $detail->qty = $row->qty;
           $detail->oder_id = $oder_id;
           $detail->created_at = new datetime;
           $detail->save();
        }
        Cart::destroy();   
        Session::flash('ketqua','Đặt hàng thành công');
        return redirect('cart');
        
    }

    public function getintro()
    {   
        // 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
