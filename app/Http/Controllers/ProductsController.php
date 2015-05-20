<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;

class ProductsController extends Controller {

    private $productsModel;

    public function __construct(Product $productsModel)
    {
        $this->productsModel = $productsModel;
    }

    public function index()
    {
        $products = $this->productsModel->paginate(10);

        return view('products.index', compact('products'));
    }



	public function create(Category $category)
	{
        $categories = $category->lists('name', 'id');

        return view('products.create', compact('categories'));
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

    public function edit($id, Category $category)
    {
        $categories = $category->lists('name', 'id');

        $product = $this->productsModel->find($id);

        return view('products.edit', compact('product', 'categories'));
    }


    public function update(Requests\ProductsRequest $request, $id)
    {
        $this->productsModel->find($id)->update($request->all());

        return redirect()->route('products');
    }




}
