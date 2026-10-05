<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Category;

class BookController extends Controller
{
    // READ (daftar)
    public function index(Request $request)
    {
        $books = Book::query()
            ->when($request->q, function ($query, $q) {
                $query->where('title', 'like', "%{$q}%")
                    ->orWhere('writer', 'like', "%{$q}%");
            })
            ->with('category') // eager loading
            ->latest()
            ->paginate(50)
            ->withQueryString();

        return view('book.index', compact('books'));
    }

    // CREATE (form)
    public function create()
    {
        $categories = Category::all();
        return view('book.create', compact('categories'));
    }

    // CREATE (simpan)
    public function store(BookRequest $request)
    {
        Book::create($request->validated());
        return redirect()->route('book.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    // READ (detail)
    public function show(Book $book)
    {

        $book->load('category'); // eager loading
        return view('book.show', compact('book'));
    }

    // UPDATE (form)
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('book.edit', compact('book', 'categories'));
    }

    // UPDATE (simpan)
    public function update(BookRequest $request, Book $book)
    {
        $book->update($request->validated());

        return redirect()->route('book.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }

    // DELETE
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('book.index')
            ->with('success', 'Buku berhasil dihapus.');
    }

    public function datatable()
    {
        $books = Book::query()
            ->with('category') // eager loading
            ->latest()
            ->get();

        return DataTables::of($books)
            ->addIndexColumn()
            ->addColumn('action', function ($book) {
                return '
                    <a href="' . route('book.show', $book) . '" class="btn btn-sm btn-success">detail</a>
                    <a href="' . route('book.edit', $book) . '" class="btn btn-sm btn-primary">edit</a>
                    <form action ="' . route('book.destroy', $book) . '"method="POST" class="d-inline" onsubmit="return confirm(\'yakin hapus buku ini?\')">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button class="btn btn-sm btn-danger">hapus</button>
                    </form>
                    ';
            })
            ->make(true);
    }
}
