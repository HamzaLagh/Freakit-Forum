<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicationRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Profile;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicationController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except('index');
    }


    public function searchTopic(Request $request)
    {
        $searchTerm = $request->input('search');
        if (empty($searchTerm)) {
            return view('categories.recherche')->with('message', 'Please enter a search term.');
        }
     
        $publications = Publication::where('titre', 'like', "%{$searchTerm}%")->get();
        if ($publications->isEmpty()) {
            return view('publication.recherche')->with('message', 'No topic found for the search: : ' . $searchTerm);
        }
        // taffiche l vue
        return view('publication.recherche', compact('publications'));
    }


    public function index()
    {
        $publications = Publication::first()->paginate();
        return view('publication.index',compact('publications'));
    }


    
    public function open(Publication $publication)
    {
        $publication->update(['closed' => false]);

        return redirect()->route('publications.index', $publication);
    }

    public function close(Publication $publication)
    {
        $publication->update(['closed' => true]);

        return redirect()->route('publications.index', $publication);
    }





    public function storeComment(Request $request, Publication $publication)
    {
        $request->validate([
            'content' => 'required',
        ]);

        
        // ajout nouv. comment
        $comment = new Comment([
            'content' => $request->input('content'),
            'user_id' => Auth::id(), // ID de l'utilisateur actuel
        ]);

        // Associer le commentaire à la publication
        $publication->comments()->save($comment);

        return redirect()->route('publication.index', ['publication' => $publication->id]);
            
    }






    public function create()
    {
        // return view('publication.create');
        $categories = Category::all();
        return view('publication.create', compact('categories'));
    }

    public function store(PublicationRequest $request)
    {
        
        $formFields = $request->validated();
        $formFields['categorie_id'] = $request->input('categorie_id');
        $this->uploadImage($request,$formFields);
        $formFields['user_id'] = Auth::id();
        // dd($formFields);
        Publication::create([
            'titre' => $formFields['titre'],
            'body' => $formFields['body'],
            'categorie_id' => $formFields['categorie_id'],
            'user_id' => $formFields['user_id'],
        ]);
        return to_route('publications.index')->with('success',' Your topic is well published.');
    }
    //   image
    private function uploadImage(PublicationRequest $request,array &$formFields)
    {   
        unset($formFields['image']);
        if ($request->hasFile('image')) {
            
            return $formFields['image'] = $request->file('image')->store('publication','public'); 
        }
    }

    public function edit(Publication $publication)
    {
        //authorisation
        if(Auth::id() !== $publication->user_id){
            abort(403);
        }

        $categories = Category::all();
        return view('publication.edit',compact('publication','categories'));
    }

    public function update(PublicationRequest $request, Publication $publication)
    {
        $formFields = $request->validated();
        $this->uploadImage($request,$formFields);
        // $formFields['categorie_id'] = $request->input('categorie_id');
        $publication->fill($formFields)->save();

        return to_route('publications.index')->with('success','Your topic is well edited.');
    }

    public function destroy(Publication $publication)
    {
        if(Auth::id() !== $publication->user_id){
            abort(403);
        }
        $publication->delete();
        return to_route('publications.index')->with('success','Your topic is deleted.');
    }

}
