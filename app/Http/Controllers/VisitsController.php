<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\VisitRepository;
use App\Repositories\UserRepository;
use App\User;
use App\Visit;

class VisitsController extends Controller
{
    public function index(VisitRepository $visitRepo)
    {
       $visits = $visitRepo->getAll();

       return view('visits.list', ["visits" => $visits,
                                         "footerYear" => date("Y"),
                                          "title" => "Moduł wizyt"]);
    }

    public function create()
    {
        $tutors = User::where('role_id', 2)->get();
        $students = User::where('role_id', 3)->get();

        return view('visits.create', ["tutors" => $tutors,
                                            "students" => $students,
                                            "footerYear" => date("Y"),
                                            "title" => "Moduł wizyt"]);
    }

    public function store(Request $request)
    {
        $visit = new Visit;
        $visit->tutor_id = $request->input('tutor');
        $visit->student_id = $request->input('student');
        $visit->date = $request->input('date');
        $visit->save();

        return redirect()->action('VisitsController@index');
    }
}
