<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    // category index
    public function category()
    {
        $categories = Category::latest()->get();
    	return view('admin.category.index', compact('categories'));
    }

    //category add
    public function addCategory()
    {
        $categories = Category::where('parent_id', 0)->orderBy('name','desc')->get();
        // dd($categories);
        return view('admin.category.add', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $validateData = $request->validate([
    		'name' => 'required|unique:categories',
    	]);
        $category = new Category();
    	$category->name = ucwords(strtolower($data['name']));
    	$category->slug =  Str::slug($data['name']);

    	if(empty($data['description'])){
    		$category->description = "";
    	} else{
    		$category->description = $data['description'];
    	}
    	if(empty($data['status'])){
    		$category->status = 0;
    	} else{
    		$category->status = 1;
    	}

    	$random = Str::random(10);
    	if($request->hasFile('image'))
    	{
    		$image_tmp = $request->file('image');
    		if($image_tmp->isValid())
    		{
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'uploads/category/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $category->image = $filename;
            }

    	}

    	$category->save();
    	Session::flash('success_message', 'Category has been successfully added');
    	return redirect()->back();
    }

    //edit Category
    public function editCategory($id)
    {
        $myCategory = Category::findOrFail($id);

        $categories = Category::where('parent_id', 0)->orderBy('name', 'DESC')->get();
        return view('admin.category.edit', compact('categories', 'myCategory'));
    }

    //update Category

	public function updateCategory(Request $request, $id)
    {
    	$data = $request->all();
    	$validateData = $request->validate([
    		'name' => 'required|max:255',

    	]);
    	$category = Category::findOrFail($id);
    	$category->name = ucwords(strtolower($data['name']));
    	$category->slug =  Str::slug($data['name']);
    	$category->parent_id = $data['parent_id'];
    	if(empty($data['description'])){
    		$category->description = "";
    	} else{
    		$category->description = $data['description'];
    	}
    	if(empty($data['status'])){
    		$category->status = 0;
    	} else{
    		$category->status = 1;
    	}

    	$random = Str::random(10);
    	if($request->hasFile('image'))
    	{
    		$image_tmp = $request->file('image');
    		if($image_tmp->isValid())
    		{
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'uploads/category/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $category->image = $filename;
            }

    	}

		$image_path = 'uploads/category/';
        if(!empty($data['image'])) {
            if (!empty($data['current_image'])){
                if (file_exists($image_path . $data['current_image'])) {
                    unlink($image_path . $data['current_image']);
                }
        }
        }


    	$category->save();
    	Session::flash('success_message', 'Category has been successfully Updated');
    	return redirect()->back();
    }



	//delete category

	public function deleteCategory($id){
		$category = Category::findOrFail($id);
		File::delete(public_path().'/uploads/category/'.$category->image);
		$category->delete();
		
	    Session::flash('success_message', 'Category Has Been deleted Successfully');
	    return redirect()->back();
   }

   


}
