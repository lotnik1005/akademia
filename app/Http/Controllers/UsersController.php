<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Repositories\UserRepository;
use App\Repositories\SpecializationRepository;
use App\User;
use App\Post;
use App\Visit;
//use App\City;


class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('user_permission', ['except' => ['show', 'index']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $tutors = User::where('role_id', 3)->get();
        $users = User::all();
        return view('users.index', compact(['tutors', 'users']));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        // $posts = $user->posts()->paginate(10); // niewydajne rozwiązanie
        if(Auth::user()->is_admin) {
            $posts = Post::with('comments.user') // eager loading (optymalizacja zapytań do bazy)
                ->with('comments.likes')
                ->with('likes')
                ->where('user_id', $id)
                ->withTrashed()
                ->paginate(10); 
        } else {
            $posts = Post::with('comments.user') 
                ->with('comments.likes')
                ->with('likes')
                ->where('user_id', $id)
                ->paginate(10); 
        }

        return view('users.show', compact('user', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        return view('users.edit', compact('user'));
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
        $this->validate($request, [
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
        ], [
            'required' => 'Pole jest wymagane',
            'email' => 'Adres e-mail jest niepoprawny',
            'unique' => 'Inny użytkownik ma już taki adres e-mail',
            'min' => 'Pole musi mieć minimum :min',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->role_id = $request->role;

        if ($request->file('avatar')) {
            $user_avatar_path = 'public/users/' . $id . '/avatars';
            $upload_path = $request->file('avatar')->store($user_avatar_path);
            $avatar_filename = str_replace($user_avatar_path . '/', '', $upload_path);
            $user->avatar = $avatar_filename;
        }

        $user->save();

        return back();
    }
}
