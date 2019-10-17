<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\Specialization;

class FilmsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
    	$films = Film::latest()->get();
    	return view('films.index', ['films' => $films]);
    }

    public function show($id)
    {
    	$film = Film::findOrFail($id);
    	return view('films.show', ['film'=>$film]);
    }

    public function create()
    {
        $specializations = Specialization::get();
    	return view('films.create', ['specializations' => $specializations]);
    }

    public function store(Request $request)
    {
       $films = Film::firstOrCreate([
           'title' => $request->input('tytul'),
           'embed' => $request->input('link'),
           'description' => $request->input('opis'),
           'user_id' => $request->input('user_id'),
        ]);

       return redirect()->action('FilmsController@create');
    }
}
