<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\Tag;
use Illuminate\Support\Facades\DB;



class StoreController extends Controller
{

	public function index()
    {

        //$pFeatured = Product::where('featured', '=', 1)->get();

        $pFeatured = Product::featured()->get();

        $pRecomment = Product::recommend()->get();

        $categories = Category::all();

        return view('store.index', compact('categories', 'pFeatured', 'pRecomment'));
    }


    public function category($id)
    {
        $categories = Category::all();

        $category = Category::find($id);

        $products = Product::ofCategory($id)->get();

        return view('store.category', compact('categories', 'products', 'category'));

    }


    public function product($id)
    {

        $categories = Category::all();

        $product = Product::find($id);

        $tag = Tag::find($id);

        return view('store.product', compact('categories', 'product', 'tag'));

    }



    public function tag($id)
    {
        $categories = Category::orderBy('name')->get();

        $tag = Tag::find($id);

        return view('store.tag', compact('categories', 'tag'));
    }




}
