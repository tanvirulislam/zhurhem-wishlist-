<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Product;
use App\Photo;
use App\ProductSize;
use App\DetailAndCare;
use App\SizeAndFit;
use App\Feature;
use App\Wishlist;


class FrontController extends Controller
{
    public function index(){

        $category = Category::all();
        $subcategory_first = Subcategory::latest()->limit(1)->first();
        $subcategory_second = Subcategory::latest()->skip(1)->take(1)->first();
        $subcategory_third = Subcategory::latest()->skip(2)->take(1)->first();
        $product = Product::latest()->limit(6)->get();
        $feature_product = Product::where('status', 2)->limit(12)->get();

        $wishlist = Wishlist::count();
        
    	return view('front.index', compact('category', 'subcategory_first', 'product', 'subcategory_second',
         'subcategory_third', 'feature_product', 'wishlist'));
    }




     public function category($id){
        //dd($id);
        $category = Category::all();
        $subcategory_first = Subcategory::latest()->limit(1)->first();
        $subcategory_second = Subcategory::latest()->skip(1)->take(1)->first();
        $subcategory_third = Subcategory::latest()->skip(2)->take(1)->first();
        $product = Product::latest()->limit(6)->get();
        $wishlist = Wishlist::count();

        $subcategory_list = Subcategory::where('category_slug',$id)->get();
       
        $product_list = Product::where('category_slug', $id)->latest()->paginate(12);
        $image_list = Photo::all();
        $product_size = ProductSize::all();

    	return view('front.category', compact('product', 'category', 'subcategory_third',
         'subcategory_second', 'subcategory_first', 'subcategory_list', 'product_list',
        'image_list', 'product_size', 'wishlist'));
    }

    public function subcategory($id){
        //dd($id);
        $category = Category::all();
        $subcategory_first = Subcategory::latest()->limit(1)->first();
        $subcategory_second = Subcategory::latest()->skip(1)->take(1)->first();
        $subcategory_third = Subcategory::latest()->skip(2)->take(1)->first();
        $product = Product::latest()->limit(6)->get();
        $wishlist = Wishlist::count();

        $subcategory_list = Subcategory::where('subcategory_slug',$id)->get();
       
        $product_list = Product::where('subcategory_slug', $id)->latest()->paginate(12);
        $image_list = Photo::all();
        $product_size = ProductSize::all();


    	return view('front.subcategory', compact('product', 'category', 'subcategory_third',
         'subcategory_second', 'subcategory_first', 'subcategory_list', 'product_list',
        'image_list', 'product_size', 'wishlist'));
    }




     public function product($id){
        $category = Category::all();
        $subcategory_first = Subcategory::latest()->limit(1)->first();
        $subcategory_second = Subcategory::latest()->skip(1)->take(1)->first();
        $subcategory_third = Subcategory::latest()->skip(2)->take(1)->first();
        $product = Product::latest()->limit(6)->get();
        $wishlist = Wishlist::count();

        $product_detail = Product::where('product_slug', $id)->first();
        $product_size = ProductSize::all();
        $detail_care = DetailAndCare::all();
        $size_fit = SizeAndFit::all();
        $feature = Feature::all();
        $image = Photo::all();

        $cat = Category::first();

        $cat_name_value = Product::where('product_slug', $id)->value('category_slug');
        $main_cat_name_value = Category::where('category_slug', $cat_name_value)->value('name');

        $sub_cat_name_value = Product::where('product_slug', $id)->value('subcategory_slug');
        $main_subcat_name_value = Subcategory::where('subcategory_slug', $sub_cat_name_value)->value('name');

        $random_product = Product::where('subcategory_slug', $sub_cat_name_value)->inRandomOrder()->limit(3)->get();

    	return view('front.product', compact( 'category', 'subcategory_third','subcategory_second', 'subcategory_first',
         'product', 'product_detail', 'product_size', 'detail_care', 'size_fit', 'feature', 'image', 'cat',
        'main_cat_name_value', 'main_subcat_name_value', 'random_product', 'wishlist'));

    }

    
}
