<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller {

    private $productsModel;

    public function __construct(Product $productsModel)
    {
        $this->productsModel = $productsModel;
    }

    public function index()
    {
        $products = $this->productsModel->all();

        return view('products.index', compact('products'));
    }



	public function create()
	{
        return view('products.create');
	}



    public function store(Requests\ProductsRequest $request)
    {
        $input = $request->all();

        $product = $this->productsModel->fill($input);

        $product->save();

        return redirect()->route('products');
    }

    public function destroy($id)
    {

        $this->productsModel->find($id)->delete();

        return redirect()->route('products');
    }

    public function edit($id)
    {
        $product = $this->productsModel->find($id);

        return view('products.edit', compact('product'));
    }


    public function update(Requests\ProductsRequest $request, $id)
    {
        $this->productsModel->find($id)->update($request->all());

        return redirect()->route('products');
    }




}
