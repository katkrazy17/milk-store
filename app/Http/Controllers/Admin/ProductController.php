<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Product_detail;
use Session;
use DateTime;
use File;

class ProductController extends Controller
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
    public function index(Request $request)
    {

        $product = Product::paginate(4);
        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::pluck('name','id');
        return view('admin.product.add',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pro = new Product();
        $pro->category_id = $request->category;
        $pro->name = $request->txtname;
        $pro->price = $request->txtprice;
        $pro->promo = $request->txtpromo;
        $pro->packet = $request->txtpacket;
        $pro->status = '1';
        //upload img
        $pro->images = request()->txtimg->getClientOriginalName();
        request()->txtimg->move(public_path('uploads'),$pro->images);
        // lưu
        $pro->save();     
         

        Session::flash('ketqua','Thêm sản phẩm thành công');
        return redirect('admin/product');
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
        $product_edit = Product::where('id',$id)->first();
        $category_edit = Category::pluck('name', 'id');
        // $product_edit_detail = Product_detail::findOrFail($id);
        return view('admin.product.edit',compact('product_edit', 'category_edit','product_edit_detail'));
        // return "hàm của mày có vấn đề"; 

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
        $pro = Product::findOrFail($id);
        $pro->category_id = $request->category;
        $pro->name = $request->txtname;
        $pro->price = $request->txtprice;
        $pro->promo = $request->txtpromo;
        $pro->packet = $request->txtpacket;
        $pro->status = '1';
        //$pro->images = $request->txtimg;
        $file_path = public_path('uploads/').$pro->images;        
        if ($request->hasFile('txtimg')) {
            if (file_exists($file_path))
                {
                    unlink($file_path);
                }
            
            $f = $request->file('txtimg')->getClientOriginalName();
            $filename = time().'_'.$f;
            $pro->images = $filename;       
            $request->file('txtimg')->move('uploads/',$filename);
        }     
        
        $pro->save();
    
    //4. Hiển thị view cùng với thông báo
          Session::flash('ketqua','Cập nhật thành công');
        return redirect('admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();
        Session::flash('ketqua', 'Xóa dữ liệu '.$data->name.' thành công!!!');
        return redirect('admin/product');
    }
}
