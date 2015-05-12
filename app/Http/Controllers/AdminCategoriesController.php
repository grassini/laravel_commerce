<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    private $categories;

    public function __construct(Category $category)
    {
        $this->middleware('guest');
        $this->categories = $category;
    }


    public function index()
    {
        $categories = $this->categories->all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return "Action para Criar uma nova Categoria";
    }

    public function update()
    {
        return "Action para Atualizar uma Categoria";
    }

    public function delete()
    {
        return "Action para Deletar uma Categoria";
    }


}