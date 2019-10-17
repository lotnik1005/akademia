<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Specialization;
use App\Film;
use App\Relation;
use App\Repositories\UserRepository;

class TutorsController extends Controller
{


    public function index()
    {
        $tutors = User::where('role_id', 3)->get();

        return view('tutors.index', compact('tutors'));
    }

    public function create()
    {
        $specializations = Specialization::all();

        return view('tutors.create', ['specializations' => $specializations,
                                            'footerYear' => date('Y')]);
    }

    public function show($id)
    {
        /*$films = Film::latest()->get();
        $users = User::where('id', $id)->first();
        $relations = Relation::get();
        return view('tutors.show', ['users'=>$users, 'films'=>$films, 'relations'=>$relations]);*/

        /*$users = User::where('id', $id)->first();
        $specializations = Specialization::get();
        $films = Film::get();

        return view('tutors.show', ['users'=>$users, 'specializations'=>$specializations, 'films'=>$films]);*/

        $relations = Relation::where('users_id', $id)->get();
        $users = User::where('id', $id)->first();
        return view('tutors.show', ['relations'=>$relations, 'users'=>$users]);
    }

    public function store(Request $request)
    {
        $tutor = User::find($request->input('userid'));
        $tutor->specializations()->sync($request->input('specializations'));
        $tutor->save();
        return redirect('specializations');
    }

    public function search()
    {
        //$searchSubject = Input::get('subject');
        //$users = User::whereHas('specialization')->get();
        //return $searchSubject;

        $tutors_specializations = User::whereHas('specializations', function($q) {
            $q->where('name', '=', Input::get('subject'));
        })->get();
        return view('tutors.specialization', ['tutors_specializations'=>$tutors_specializations]);
    }
}
