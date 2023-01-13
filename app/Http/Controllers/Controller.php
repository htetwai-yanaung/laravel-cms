<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeCategoryRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function list(){
        $publishers = Publisher::where('id','>',100)->get();
        return $publishers;
    }

    public function publisherDetails($id){
        $publisher = Publisher::with('books')->find($id);
        return $publisher;
    }

    public function store(){
        $publisher = [
            'name' => 'Steve Roger',
            'address' => 'UK',
            'phone' => '202132323'
        ];
        Publisher::create($publisher);
        return 'store success';
    }

    public function update($id){
        Publisher::find($id)->update([
            'name' => 'John Wick',
        ]);
        return 'update success';
    }

    public function delete($id){
        Publisher::find($id)->delete();
        return 'delete success';
    }

    public function bookList(){
        $books = Book::with('categories', 'additionalBookinfo')->where('price','<',2000)->get();
        return $books;
    }

    public function bookDetails($id){
        $book = Book::with('additionalBookinfo', 'categories')->find($id);
        return $book;
        // return $book->publisher;
    }

    //category
    public function createCategory(){
        $categories = Category::get();
        return view('category.create')->with(['categories' => $categories]);
    }

    public function storeCategory(Request $request){
        $validation = $request->validate([
            'category_name' => 'required'
        ],$message = [
            'category_name.required' => 'Name cannot be empty.'
        ]);

        // $result = Validator::make($request->all(),[
        //     'category_name' => 'required'
        // ]);
        // if($result->fails()){
        //     return "403 error";
        // }

        $name = $request->category_name;
        Category::create([
            'name' => $name
        ]);
        return redirect('category/create')->with(['success' => 'category successfully created.']);
    }
}
