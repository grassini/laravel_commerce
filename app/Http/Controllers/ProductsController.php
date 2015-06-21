<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use CodeCommerce\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


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


        $inputTags = explode(",", $request->get('tags'));


        $product = $this->productsModel->fill($request->all());

        $product->save();

        $p = $product->find($product->id);

        $idTags = $this->recordTags($inputTags);

        $p->tags()->sync($idTags);

        return redirect()->route('products');


//        $input = $request->all();
//
//        $product = $this->productsModel->fill($input);
//        $product->save();
//
//        return redirect()->route('products');
    }



    private function recordTags($inputTags)
    {
        $tag = new Tag();
        $countTags = count($inputTags);
        foreach ($inputTags as $key => $value) {
            $tag = Tag::firstOrCreate(['name' => $value]);
            //$tag->create(["name" => $value]);
        }
        return $idTags = $tag->orderBy('id', 'DESC')->take($countTags)->lists('id');
    }





    public function edit($id, Category $category)
    {

        $product = $this->productsModel->find($id);

        $categories = $category->lists('name', 'id');

        $tags = implode(",", $product->tags()->lists('name'));

        return view('products.edit', compact('product', 'categories', 'tags'));


//        $categories = $category->lists('name', 'id');
//
//        $product = $this->productsModel->find($id);
//
//        return view('products.edit', compact('product', 'categories'));
    }



    public function update(Requests\ProductsRequest $request, $id)
    {

        $inputTags = explode(",", $request->get('tags'));

        $idTags = $this->recordTags($inputTags);

        $this->productsModel->find($id)->tags()->sync($idTags);

        $this->productsModel->find($id)->update($request->all());

        return redirect()->route('products');


//        $this->productsModel->find($id)->update($request->all());
//
//        return redirect()->route('products');
    }



    public function destroy($id)
    {

        $this->productsModel->find($id)->delete();

        return redirect()->route('products');
    }


    /*Image*/
    public function images($id)
    {
        $product = $this->productsModel->find($id);

        return view ('products.images', compact('product'));
    }


    public function createImage($id)
    {
        $product = $this->productsModel->find($id);

        return view ('products.create_image', compact('product'));
    }



    public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage)
    {
        /*Pegando o Arquivo*/
        $file = $request->file('image');


        /*Pegando a Extensão*/
        $extension = $file->getClientOriginalExtension();

        /*Recebendo e Gravando no Banco o Nome e Extensao do arquivo*/
        $image = $productImage::create(['product_id'=>$id, 'extension'=>$extension]);

        /*Gravando o arquivo no Disco*/
        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));

        /*Redirecionando o Usuario*/
        return redirect()->route('products.images', ['id'=>$id]);

    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);

        if(file_exists(public_path().'/uploads/'.$image->id.'.'.$image->extension)){
            Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
        }

        $product = $image->product;
        $image->delete();

        return redirect()->route('products.images', ['id'=>$product->id]);
    }

}
