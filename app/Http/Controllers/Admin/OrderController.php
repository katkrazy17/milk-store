<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Oder;
use App\Product;
use App\Oder_detail;
use Session;
use DateTime;
use DB;
class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $oder = Oder::paginate(3);
        return view('admin.order.index',compact('oder'));
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
        $oder = Oder::where('id',$id)->first();
        $data = Oder_detail::where('oder_id',$id)
        ->join('product', 'product.id', '=', 'oder_detail.product_id')
        ->get();
        return view('admin.order.detail',compact('oder','data'));


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
        $oder = Oder::findOrFail($id);
        $oder->status = '1';
        $oder->save();

        //4. Hiển thị view cùng với thông báo
          Session::flash('ketqua','Xác nhận thành công');
        return redirect('admin/order');

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
        $data = Oder::findOrFail($id);
        $data->delete();
        Session::flash('ketqua', 'Xóa dữ liệu '.$data->name.' thành công!!!');
        return redirect('admin/order');
    }
}
