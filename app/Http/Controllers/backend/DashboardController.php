<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Brand;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class DashboardController extends Controller
{
    public function index(){
        $h = view('backend.index');
        return view("layouts.admin")->with('index',$h);
    }
    public function all_brand_product(){
        $all_brand_product = Brand::all(); //nó lấy dữ liệu từ bảng ra
        $manager_brand_product = view('backend.dashboard.brand.all_brand')->with('all_brand_product',$all_brand_product); // chỗ with(tên,biến) thì cái tên sẽ được sử dụng ở foreach trong trang all_brand_product
        return view('layouts.admin')->with('backend.dashboard.brand.all_brand',$manager_brand_product); // admin_layout sẽ chứa all_brand_product luôn
    }
    public function all_category_product(){
        $all_category_product = Category::all(); //nó lấy dữ liệu từ bảng ra
        $manager_category_product = view('backend.dashboard.category.all_category')->with('all_category_product',$all_category_product); // chỗ with(tên,biến) thì cái tên sẽ được sử dụng ở foreach trong trang all_category_product
        return view('layouts.admin')->with('backend.dashboard.category.all_category',$manager_category_product); // admin_layout sẽ chứa all_brand_product luôn
    }
    public function all_product(){
        $all_product = Product::join('db_category', 'db_category.id', '=', 'db_product.category_id')
        ->join('db_brand', 'db_brand.id', '=', 'db_product.brand_id')
        ->select('db_product.id', 'db_product.name', 'db_product.price', 'db_product.image', 'db_category.name AS category_name', 'db_brand.name AS brand_name','db_product.status')
        ->orderBy('db_product.id', 'desc')
        ->get();
        $manager_product = view('backend.dashboard.product.all_product')->with('all_product',$all_product); // chỗ with(tên,biến) thì cái tên sẽ được sử dụng ở foreach trong trang all_product
        return view('layouts.admin')->with('backend.dashboard.product.all_product',$manager_product); // admin_layout sẽ chứa all_product luôn
    }
}
