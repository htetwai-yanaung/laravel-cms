<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AuthorController extends Controller
{
    //authors
    public function getAuthors(){
        $authors = Author::get();
        return view('authors.index')->with(['authors' => $authors]);
    }

    //Store Authors
    public function storeAuthors(Request $request){
        $request->validate([
            'name' => 'required',
            'biography' => 'required',
            'photo' => 'required|mimes:jpg,png,jpeg,webp'
        ]);
        $photo_name = rand(0, 99999)."_".$request->file('photo')->getClientOriginalName();
        $request->file('photo')->move(public_path('upload/authors/'),$photo_name);

        Author::create([
            'name' => $request->name,
            'biography' => $request->biography,
            'photo' => $photo_name,
        ]);
        return back()->with(['createSuccess' => 'Author create success!']);
    }

    //Delete Authors
    public function deleteAuthors($id){
        $author = Author::find($id);
        $photo_name = $author->photo;
        if(File::exists("upload/authors/".$photo_name)){
            File::delete("upload/authors/".$photo_name);
        }
        Author::where('id',$id)->delete();
        return back()->with(['deleteSuccess' => 'Author delete success!']);
    }

    //edit authors
    public function editAuthors($id){
        $author = Author::find($id);
        return view('authors.edit')->with(['author' => $author]);
    }

    //update authors
    public function updateAuthors(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'biography' => 'required',
            'photo' => 'mimes:jpg,png,jpeg,webp'
        ]);
        $author = Author::find($id);
        $old_photo = $author->photo;
        if($request->photo){
            $new_photo = rand(0, 99999)."_".$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('upload/authors/'),$new_photo);
            if(File::exists("upload/authors/".$old_photo)){
                File::delete("upload/authors/".$old_photo);
            }
            Author::where('id',$id)->update([
                'name' => $request->name,
                'biography' => $request->biography,
                'photo' => $new_photo
            ]);
        }
        Author::where('id',$id)->update([
            'name' => $request->name,
            'biography' => $request->biography
        ]);
        return redirect('authors')->with(['updateSuccess' => 'Author update success!']);
    }
}
