<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Oder;
use Auth;
use Session;
class UserController extends Controller
{
   //  public function getlist()
   // {
   // 		// $data = User::paginate(10);
   //  	// return view('user.user');

   //    $user = User::all();
   //    return view('user.index',compact('user'));
   // }

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Trang thông tin người dùng - chi tiết mua hàng
    public function index()
    {
        $user = User::all();
        $category = Category::all();
        $oder = Oder::where('user_id','=',Auth::user()->id)->get();
        return view('user.index',compact('user','category','oder'));
    }
    
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $category = Category::all();
        $user_edit = User::where('id',$id)->first();
        //dd($user_edit);
        return view('user.edit',compact('category','user_edit'));
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
        //dd($data);
        $data->save();
        //4. Hiển thị view cùng với thông báo
        Session::flash('ketqua','Cập nhật dữ liệu thành công');
        return redirect('user');
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
