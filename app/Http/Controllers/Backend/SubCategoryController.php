<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //show all subcategories
    public function Index(){
        $subcategory = DB::table('subcategories')
        ->join('categories', 'subcategories.category_id', 'categories.id')
        ->select('subcategories.*', 'categories.category_en')
        ->orderBy('id', 'desc')->paginate(5);


        return view('backend.subcategory.index', compact('subcategory'));
    }

    //add subcategory form
    public function AddSubCategory(){
        //fetch parent controller
        $category = DB::table('categories')->get();
        return view('backend.subcategory.create', compact('category'));
    }

    //save subcategory data to database
    public function StoreSubCategory(Request $request){
          //validate input
          $validated = $request->validate([
            'subcategory_en' => 'required|unique:subcategories|max:255',
            'category_id' => 'required',
        ]);

        $data = [];
        $data['subcategory_en'] = $request->subcategory_en;
        $data['category_id'] = $request->category_id;

        $notification = [
            'message' => 'SubCategory saved successfully!',
            'alert-type' => 'success'
        ];

        DB::table('subcategories')->insert($data);
        return redirect()->route('subcategories')->with($notification);
    }

    //Edit subcategory form
    public function EditSubCategory($id)
    {
        $subcategory = DB::table('subcategories')->where('id', $id)->first();

        $category = DB::table('categories')->get();
        return view('backend.subcategory.edit', compact('subcategory', 'category'));
    }

    public function UpdateSubCategory(Request $request, $id)
    {
        $data = [];
        $data['subcategory_en'] = $request->subcategory_en;
        $data['category_id'] = $request->category_id;

        $notification = [
            'message' => 'SubCategory updated successfully!',
            'alert-type' => 'success'
        ];

        DB::table('subcategories')->where('id', $id)->update($data);
        return redirect()->route('subcategories')->with($notification);
    }

    public function DeleteSubCategory($id){
        DB::table('subcategories')->where('id', $id)->delete();
        $notification = [
            'message' => 'SubCategory deleted successfully!',
            'alert-type' => 'success'
        ];
        return redirect()->route('subcategories')->with($notification);
    }

}
