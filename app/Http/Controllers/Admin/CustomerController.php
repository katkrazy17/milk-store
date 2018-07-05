<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;
class CustomerController extends Controller
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
        $user = User::all();
        return view('admin.customer.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.customer.add');
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
        $user_edit = User::findOrFail($id);
        return view('admin.customer.edit',compact('user_edit'));
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
         //0. Check Id có tồn tại không
        $data = User::findOrFail($id);
        //1. lay du liệu view
        $update_data= $request->all();
        //2. xác định từng field trong CSDL cần cập nhật - theo view
        $data->name=$update_data['txtname']; 
        $data->email=$update_data['txtemail']; 
        $data->phone=$update_data['txtphone']; 
        $data->address=$update_data['txtaddress']; 
        //3. Lưu
        $data->save();
        //4. Hiển thị view cùng với thông báo
        Session::flash('ketqua','Cập nhật dữ liệu thành công');
        return redirect('admin/customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        Session::flash('ketqua', 'Xóa dữ liệu '.'"'.$data->name.'"'.' thành công!!!');
        return redirect('admin/customer');
    }
}
