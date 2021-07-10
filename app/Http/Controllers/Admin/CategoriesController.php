<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::leftJoin('categories as parents', 'parents.id', '=', 'categories.parent_id')
            ->select([
                'categories.*',
                'parents.name as parent_name'
            ])
            // ->where('categories.status', '=', 'active')
            ->orderBy('categories.created_at', 'DESC')
            ->orderBy('categories.name', 'ASC')
            ->get(); // retuen a collection of model object.


        $title = 'Categories List';

        return view(
            'admin/categories/index',
            [
                'categories' => $categories,
                'title' => $title
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category(); // blank object
        $parents = Category::all(); // return a collection of model object
        return view('admin.categories.create', [ // return view file and send all neccessary data that the view will need in the second parameter
            'parents' => $parents,
            'category' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // $request it's object that contain request body and other method that we need it like all()
    {
        // dd($request);
        $request->merge([     //  add a slug field that is not sent in the request body
            'slug' => Str::slug($request->name)
        ]);
        $category = Category::create($request->all()); // create new row in category table using mass assigment method that needs fillable array in object 
        return redirect(route('categories.index'))->with('success', 'Prodect Created'); // redirect the request to (categories.index) route and create session with property ('success') and value
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id); // return model object wich have id attribute equal to $id.
        // dd($category);
        $parents = Category::where('id', '<>', $category->id)->get(); // <> not equal to
        return view('admin.categories.edit', [
            'category' => $category,
            'parents' => $parents
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $request->merge([
            'slug' => Str::slug($request->name),
        ]);
        $category->update($request->all()); // to update specific row in categories table using mass assigment method.
        Session::put('success', 'Category Deleted'); // create session using Session facade.
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id); // delete a row that have id equal to $id from categories table 
        return redirect(route('categories.index'))->with('success', 'Product Deleted');
    }
}
