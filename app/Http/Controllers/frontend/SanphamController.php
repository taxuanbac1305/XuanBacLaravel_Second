<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;


class SanphamController extends Controller
{
    public function details_product($product_id){
        $cate_product = Category::where('status','1')->orderBy('id','desc')->get();
        $brand_product = Brand::where('status','1')->orderBy('id','desc')->get();

        $details_product = Product::join('db_category','db_category.id','=','db_product.category_id')
        ->join('db_brand','db_brand.id','=','db_product.brand_id')
        ->where('db_product.id',$product_id)
        ->select('db_product.id', 'db_product.name', 'db_product.price', 'db_product.image', 'db_category.name AS category_name', 'db_brand.name AS brand_name','db_product.status','db_product.detail','db_product.description','db_product.category_id','db_product.brand_id')
        ->get();
        
        foreach($details_product as $key => $value){
            $category_id = $value->category_id;
        }
            
        $related_product = Product::join('db_category','db_category.id','=','db_product.category_id')
        ->join('db_brand','db_brand.id','=','db_product.brand_id')
        ->where('db_category.id',$category_id)
        ->select('db_product.id', 'db_product.name', 'db_product.price', 'db_product.image', 'db_category.name AS category_name', 'db_brand.name AS brand_name','db_product.status','db_product.detail','db_product.description')
        ->whereNotIn('db_product.id',[$product_id])
        ->get();
        

        return view('frontend.product.show_details')->with('category',$cate_product)->with('brand',$brand_product)->with('product_details',$details_product)->with('relate',$related_product);
    }
}
