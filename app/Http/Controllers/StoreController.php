<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;


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


}
