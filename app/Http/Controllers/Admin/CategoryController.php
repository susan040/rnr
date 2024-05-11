<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\BaseController;
use App\Models\Category;

use App\Helpers\ImageHelper;

class CategoryController extends BaseController
{
    public function __construct()
    {
        $this->title = 'Category';
        $this->resources = 'admin.category.';
        parent::__construct();
        $this->route = 'admin.categories.';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = $this->crudInfo();
        $data['categories'] = Category::all();
        return view($this->indexResource(), $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = $this->crudInfo();
        return view($this->createResource(), $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:categories',
            'image' => 'required|mimes:jpeg,jpg,png|max:10000',
        ]);


        $category = new Category();
        $category->name = $request->input('name');
        if ($request->hasFile('image') && $request->image != '') {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $filename = ImageHelper::saveImage($file, '/categories', $filename);
            $category->image = $filename;
        }
        $category->save();
        return redirect()->route($this->indexRoute())->with('success', 'Category added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        $data = $this->crudInfo();
        $data['item'] = $category;
        return view($this->showResource(), $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //

        $data = $this->crudInfo();
        $data['item'] = $category;
        return view($this->editResource(), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //

        $request->validate([
            'name' => 'required |unique:categories,name,' . $category->id,

            'image' => 'mimes:jpeg,jpg,png|max:10000',
        ]);

        $category->name = $request->input('name');
        if ($request->hasFile('image') && $request->image != '') {
            ImageHelper::deleteImage($category->image);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $filename = ImageHelper::saveImage($file, '/vehicles', $filename);
            $category->image = $filename;
        }
        $category->save();

        return redirect()->route($this->indexRoute())->with('success', 'Category edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        if ($category->image != '') {
            ImageHelper::deleteImage($category->image);
        }
        $category->delete();
        return redirect()->route($this->indexRoute())->with('delete', 'Category deleted successfully!');
    }
}