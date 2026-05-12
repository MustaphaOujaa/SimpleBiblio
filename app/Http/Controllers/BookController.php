<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $query = Book::query();

    if ($request->has('sort')) {
        switch ($request->sort) {
            case 'asc':
                $query->orderBy('designation', 'asc');
                break;
            case 'desc':
                $query->orderBy('designation', 'desc');
                break;
            case 'price_asc':
                $query->orderBy('prix', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('prix', 'desc');
                break;
            case 'latest':
            default:
                $query->latest();
                break;
        }
    } else {
        $query->latest(); // Tri par défaut (les plus récents)
    }

    $books = $query->paginate(8)->withQueryString(); 
    return view('book.index', compact('books')); 
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'designation' => 'required|string|max:255',
        'auteur' => 'required|string|max:255',
        'prix' => 'required|numeric|min:0',
        'type' => 'required|string|max:255',
        'description' => 'nullable|string', 
        'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $book = new Book();
    $book->designation = $request->input('designation');
    $book->auteur = $request->input('auteur');
    $book->editeur = $request->input('editeur');
    // $book->annee = $request->input('annee');
    $book->prix = $request->input('prix');
    $book->type = $request->input('type');
    $book->description = $request->input('description');

    if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
        $image = $request->file('cover');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('covers'), $imageName);
        $book->cover = $imageName;
    }

    $book->save();

    return redirect()->route('book.index')->with('success', 'Livre ajouté avec succès.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('book.show', ['book'=>$book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book= Book::findOrFail($id);
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    $request->validate([
        'designation' => 'required|string|max:255',
        'auteur' => 'required|string|max:255',
        'prix' => 'required|numeric|min:0',
        'type' => 'required|string|max:255',
        'description' => 'nullable|string',
        'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $book = Book::findOrFail($id);

    $book->designation = $request->designation;
    $book->auteur = $request->auteur;
    $book->editeur = $request->editeur;
    // $book->annee = $request->annee;
    $book->prix = $request->prix;
    $book->type = $request->type;
    $book->description = $request->description;

    if ($request->hasFile('cover')) {
        if ($book->cover && file_exists(public_path('covers/' . $book->cover))) {
            unlink(public_path('covers/' . $book->cover));
        }
        $image = $request->file('cover');
        $imageName = time().'_'.$image->getClientOriginalName();
        $image->move(public_path('covers'), $imageName);
        $book->cover = $imageName;
    }
    $book->save();
    return redirect()->route('book.index')
        ->with('success', 'Livre modifié avec succès.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $book = Book::findOrFail($id);
    
    if ($book->cover && $book->cover != 'no_cover.jpg') {
        if (file_exists(public_path('covers/' . $book->cover))) {
            unlink(public_path('covers/' . $book->cover));
        }
    }
    
    $book->delete();
    
    return redirect()->route('book.index')->with('success', 'Livre supprimé avec succès.');
}

}

