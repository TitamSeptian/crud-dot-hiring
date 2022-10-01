<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('book.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'title' => ['required'],
            'author' => ['required'],
            'category' => ['required', 'exists:categories,id'],
            'description' => ['required', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $slug = Str::of($request->title)->slug('-');
        $fileNameImage = $slug . '-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
        $pathImage = $request->file('image')->storeAs('public/book', $fileNameImage);

        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category,
            'description' => $request->description,
            'user_id' => Auth::id(),
            'image' => $pathImage,
        ]);
        if ($book) {
            return redirect()->route('book.index')->with('success', 'Book created successfully');
        } else {
            return back()->withInput()->with('error', 'Error creating new book');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('book.show', [
            'book' => Book::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('book.edit', [
            'book' => Book::findOrFail($id),
            'categories' => Category::all(),
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
        $data = [];
        $request->validate([
            'title' => ['required'],
            'author' => ['required'],
            'category' => ['required', 'exists:categories,id'],
            'description' => ['required', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);
        $book = Book::findOrFail($id);


        if ($request->hasFile('image')) {
            if (Storage::disk('local')->exists($book->image)) {
                Storage::disk('local')->delete($book->image);
            }
            $fileNameImage = $slug . '-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $pathImage = $request->file('image')->storeAs('public/book', $fileNameImage);
            $data['path_image'] = $pathImage;
        }

        $data['title'] = $request->title;
        $data['author'] = $request->author;
        $data['category_id'] = $request->category;
        $data['description'] = $request->description;
        $book->update($data);

        if ($book) {
            return redirect()->route('book.index')->with('success', 'Book has been updated');
        } else {
            return redirect()->route('book.index')->with('error', 'Field to update book');
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
        $book = Book::findOrFail($id);
        if (Storage::disk('local')->exists($book->image)) {
            Storage::disk('local')->delete($book->image);
        }
        $book->delete();
        if ($book) {
            return redirect()->route('book.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('book.index')->with('error', 'Data gagal dihapus');
        }
    }
}
