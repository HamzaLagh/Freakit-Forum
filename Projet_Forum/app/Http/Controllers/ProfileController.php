<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Mail\profileMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['show']);
    }

    // public function index()
    // {

    //     $Profiles = User::paginate(6);
    //     return view('admin.profiles',compact('Profiles'));
    // }



    public function show(User $profile){
        return view('profile.show',compact('profile'));
    }



    public function create()
    {
        return view('profile.create');
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

        return redirect()->route('login.show')->with('success','Your account is successfully created.');
    }


    public function VerifyEmail(string $hash){
        
        [$created_at,$id] = explode('///',base64_decode($hash));
        //findOrfail pour generer exception si existe pas ...
        $profile = User::findOrfail($id);

        //pour securiser
        if ($profile->created_at->toDateTimeString() !== $created_at) {
            abort(403);
        }

        if ($profile->email_verified_at !== NULL) {
            return response('Your already activated');
        }
        
        $name = $profile->name;
        $email = $profile->email;
        $profile->fill([
            'email_verified_at' => time()
        ])->save();
        
        return view('profile.email_verified',compact('name','email'));
    }


    
    public function destroy(User $profile)
    {
        $profile->delete();

        return to_route('admin.profiles')->with('success','The profile has been deleted.');
    }

    public function edit(User $profile)
    {
        return view('profile.edit',compact('profile'));
     }
     public function update(ProfileRequest $request,User $profile)
     {
        $formFields = $request->validated();
        $formFields['image'] = $request->file('image')->store('profile', 'public');
        $profile->fill($formFields)->save();

           return to_route('profile.edit',$profile->id)->with('success','Your account has been modified.');
        
      }




}
