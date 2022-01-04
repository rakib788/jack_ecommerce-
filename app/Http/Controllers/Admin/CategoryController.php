<?php

namespace App\Http\Controllers\Admin;
use App\Models\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	// Main Categories

    public function createCategory(){
    	return view('admin.categories.create');
    }
    public function postCategory(Request $request){
    	$request->validate([
            'cat_name' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);
    	
    	$data = [
    		'cat_name' => $request->input('cat_name'),
    		'slug' => $request->input('slug'),
    		'description' => $request->input('description'),
    		'status' => $request->input('status')==TRUE ? '1' : '0',
    	];
    		$photo = $request->file('photo');
            if ($request->HasFile('photo')){
            $img_full_name = uniqid().'.'.$photo->getClientOriginalExtension();
            $img_path = 'upload/category/';
            $img_url = $img_path.$img_full_name;
            $photo->move($img_path,$img_full_name);
            $data['photo'] = $img_url;
        }
    	Categories:: create($data);
    	return redirect()->back()->with('message', 'Data insert Successful');
    } 

    public function view_category(){
    	$categorie = Categories::orderBy('id','asc')->paginate(15);
    	return view ('admin.categories.allview', compact('categorie'));
    }

    public function view($id)
    	{
    		$view = Categories::find($id);
    		return view('admin.categories.view', compact('view'));
    	}
    public function edit($id)
    {
    	$category = Categories::find($id);
    	return view('admin.categories.edit', compact('category'));
    }
    public function update(Request $request,$id){
    	 $category = Categories::find($id);
        $data = [
    		'cat_name' 		=> $request->input('cat_name'),
    		'slug'			=> $request->input('slug'),
    		'description' 	=> $request->input('description'),
    		'status' 		=> $request->input('status')==TRUE ? '1' : '0',
    	];
    	if ($request->HasFile('photo')) {
    		@unlink(public_path('upload/'.$category->photo));
    		$photo = $request->file('photo');
            $img_full_name = uniqid().'.'.$photo->getClientOriginalExtension();
            $img_path = 'upload/';
            $img_url = $img_path.$img_full_name;
            $photo->move($img_path,$img_full_name);
            $data['photo'] = $img_url;
    	}
    	try{
    		$category->update($data);
    		return redirect()->route('view.category')->with('message', 'Data Update Successful');
    	}catch(\Throwable $exception){
    		return redirect()->back();
    	}	    
    }

    public function delete($id){
    	$category = Categories::find($id);
    	try{
    		$category->delete();
    		return redirect()->back();
    	}catch(\Throwable $exception){
    		return redirect()->back();
    	}
    }

}
