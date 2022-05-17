<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //categories
    public function Index(){
        //fetch all categories
        $category = DB::table('categories')->orderBy('id', 'desc')->paginate(5);
        return view('backend.category.index', compact('category'));
    }

    //redirect to add new category form
    public function AddCategory(){
        return view('backend.category.create');
    }

    //save new category input
    public function StoreCategory(Request $request){
        //validate input
        $validated = $request->validate([
            'category_en' => 'required|unique:categories|max:255',
        ]);

        $data = [];
        $data['category_en'] = $request->category_en;

        $notification = [
            'message' => 'Category saved successfully!',
            'alert-type' => 'success'
        ];

        DB::table('categories')->insert($data);
        return redirect()->route('categories')->with($notification);
    }

    //edit category
    public function EditCategory($id){
        $category = DB::table('categories')->where('id', $id)->first();
        return view("backend.category.edit", compact('category'));
    }

    //update category
    public function UpdateCategory(Request $request, $id){
        $data = [];
        $data['category_en'] = $request->category_en;

        $notification = [
            'message' => 'Category updated successfully!',
            'alert-type' => 'success'
        ];

        DB::table('categories')->where('id', $id)->update($data);
        return redirect()->route('categories')->with($notification);

    }

    //delete category
    public function DeleteCategory($id){
        DB::table('categories')->where('id', $id)->delete();
        $notification = [
            'message' => 'Category deleted successfully!',
            'alert-type' => 'success'
        ];
        return redirect()->route('categories')->with($notification);
    }
}
