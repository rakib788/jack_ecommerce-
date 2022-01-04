<?php

namespace App\Http\Controllers\Admin;
use App\Models\Categories;
use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_category = SubCategory::with('category')->get();
        return view('admin.categories.subCategory.index', compact('sub_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('admin.categories.subCategory.create', compact('categories'));
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
            'cat_name' => 'required',
            'category' => 'required',
            'slug'      => 'required',
            'description' => 'required',
        ]);
        
        $data = [
            'cat_name' => $request->input('cat_name'),
            'cat_id' => $request->input('category'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description'),
            'status' => $request->input('status')==TRUE ? '1' : '0',
        ];
        
        SubCategory:: create($data);
        return redirect()->back()->with('message', 'Data insert Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub_category = SubCategory::find($id);
        return view('admin.categories.subCategory.show', compact('sub_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = SubCategory::find($id);

        return view('admin.categories.subCategory.edit', compact('subcategory'));
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
        $subcategory = SubCategory::find($id);
        $data = [
            'cat_name' => $request->input('cat_name'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description'),
            'status' => $request->input('status')==TRUE ? '1' : '0',
        ];
        try{
            $subcategory->update($data);
            return redirect()->route('sub_index')->with('message', 'Data Update Successful');
        }catch(\Throwable $exception){
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $subcategory = SubCategory::find($id);
        try{
            $subcategory->delete();
            return redirect()->back();
        }catch(\Throwable $exception){
            return redirect()->back();
        }
    }
}
