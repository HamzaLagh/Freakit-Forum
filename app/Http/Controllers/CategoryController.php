<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{


    public function searchCategories(Request $request)
    {
        $searchTerm = $request->input('search');

        if (empty($searchTerm)) {
            return view('categories.recherche')->with('message', 'Please enter a search term.');
        }
        $categories = Category::where('nom', 'like', "%{$searchTerm}%")->get();
        if ($categories->isEmpty()) {
            return view('categories.recherche')->with('message', 'No category found for the search: : ' . $searchTerm);
        }
        return view('categories.recherche', compact('categories'));
    }

    public function show($categorie_id)
    {
        $category = Category::findOrFail($categorie_id);
        $publications = $category->publications;
    
        return view('publication.category', compact('category', 'publications'));
    }


    public function Home()
    {
        $categories = Category::first()->paginate(8);
        return view('Home',compact('categories'));
    }

    public function index()
    {
        $categories = Category::first()->paginate(5);
        return view('categories.index',compact('categories'));
    }


    public function create()
    {
        return view('categories.create');
    }


    public function store(Request $request)
    {
        $nom = $request->nom;

        $request->validate([
            'nom' => 'required',
            'image' => 'required|image|',
        ]);

        $fileName = $request->file('image')->store('categories', 'public');

        // Insertion 
        Category::create([
            'nom' => $nom,
            'image' => $fileName
        ]);

        return redirect()->route('admin.categories')->with('success', 'Your category has been created.');
    }


    public function edit($id)
    {
        //  id de catg.
        $category = Category::findOrFail($id);

        // affixhaage formulaire de modifie dans le modal
        return view('categories.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {

        $category = Category::findOrFail($id);

        $category->update([
            'nom' => $request->input('nom'),
        ]);
        
        return redirect()->route('admin.categories')->with('success', 'Category updated successfully');
    }





    //supprimer
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Supprimez la catégorie
        $category->delete();
        return to_route('categories.index')->with('success','Your category is deleted.');
    }
}
