<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Session;
class CategoryController extends Controller
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
        $category = Category::paginate(4);
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('name');
        return view('admin.category.add',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $data = $request->all();
        //dd($data);
        $data = Category::insertGetId([
            'name' => $data['txtCateName']
        ]);
        //3. Trả về thông tin sau khi lưu xong
        Session::flash('ketqua','Lưu dữ liệu thành công');
        return redirect('admin/category');
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
        $category_edit = Category::findOrFail($id);
        return view('admin.category.edit', compact('category_edit'));
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
        $data = Category::findOrFail($id);

        //1. lay du liệu view
        $update_data= $request->all();
        //2. xác định từng field trong CSDL cần cập nhật - theo view
        $data->name=$update_data['txtCateName']; 
        //3. Lưu
        $data->save();
        //4. Hiển thị view cùng với thông báo
        Session::flash('ketqua','Cập nhậ dữ liệu thành công');
        // 5. Trở về trang category
        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // xác định từng field trong CSDL cần cập nhật - theo view
        $data = Category::findOrFail($id);
        // thực hiện xóa
        $data->delete();
        // Hiển thị view cùng với thông báo
        Session::flash('ketqua', 'Xóa dữ liệu thành công!!!');
        return redirect('admin/category');
    }
}
