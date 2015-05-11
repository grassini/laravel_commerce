<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminProductsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

    private $products;

    public function __construct(Product $products)
    {
        $this->middleware('guest');
        $this->products = $products;
    }


    public function index()
    {
        $products = $this->products->all();

        return view('categories.products', compact('products'));
    }




}
