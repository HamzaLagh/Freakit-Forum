<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Mail\profileMail;
use App\Models\Category;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{

    

    public function dashboard()
{
    $userCount = User::count();
    $publicationCount = Publication::count();
    $categoryCount = Category::count();

    return view('admin.dashboard', compact('userCount', 'publicationCount', 'categoryCount'));
}



    // public function edit_profile_user()
    // {
    //     // $categories = Use::first()->paginate(5);
    //     return view('admin.profiles',compact('profiles'));
    // }

    public function create_user()
    {
        return view('admin.create_user');
    }


    public function store(ProfileRequest $request)
    {
        $formFields = $request->validated();

        $formFields['image'] = $request->file('image')->store('profile', 'public');
                             
        //insertion
        $profile = User::create($formFields);

        //Redirections types:
            //redirect('/home')
            //redirect()->(..,) => to_route()
            //redirect()->action
            //back()
            //back()->withInput

        //Mail confirmation
        Mail::to($profile->email)->send(new profileMail($profile));

        return redirect()->route('admin.create_user')->with('success','Account is successfully created.');
    }


    public function edit_profile_user($id)
    {
        $profile = User::findOrFail($id);

        return view('admin.edit_profile_user',compact('profile'));
    }

    public function update_profile_user(Request $request, $id)
    {
        $profile = User::findOrFail($id);

        $profile->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        
        return redirect()->route('admin.profiles')->with('success', 'Profile updated successfully');
    }

    // ------------?

    public function categories()
    {
        $categories = Category::first()->paginate(5);
        return view('admin.categories',compact('categories'));
    }

    // public function index()
    // {
    //     $publications = Publication::latest()->paginate(5);
    //     return view('admin.index',compact('publications'));
    // }
    public function profile_admin()
    {
        return view('admin.myProfile_admin');
    }

    public function profiles()
    {
        $profiles = User::first()->paginate(9);
        return view('admin.profiles',compact('profiles'));
    }



    public function publications_admin()
    {
        $publications_admin = Publication::first()->paginate(9);
        return view('admin.publications_admin',compact('publications_admin'));
    }

    public function delete_publication(Publication $publication)
    {
        $publication->delete();
        return to_route('admin.publications_admin')->with('success','Your topic is deleted.');
    }

    // public function destroy(Publication $publication)
    // {
        // if(Auth::id() !== $publication->user_id){
        //     abort(403);
        // }
        // $publication->delete();
        // return to_route('publications.index')->with('success','Your topic is deleted.');
    // }

}
