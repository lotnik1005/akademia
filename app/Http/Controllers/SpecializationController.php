<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SpecializationRepository;
use Illuminate\Support\Facades\Auth;

use App\Specialization;
use App\User;

class SpecializationController extends Controller
{
    public function index(SpecializationRepository $specializationRepo)
    {
        $tutor = Auth::user();
        $specializations = $specializationRepo->getAll();

        return view('specializations.list', ["specializations"=>$specializations,
                                                  "tutor"=>$tutor,
                                                  "footerYear"=>date("Y"),
                                                  "title"=>"Moduł specjalizacji"]);
    }

    protected function create()
    {
        return view('specializations.create', ["footerYear" => date("Y")]);
    }

    public function store(Request $request)
    {
        $specialization = Specialization::firstOrCreate([
           'name' => $request->input('specializations'),
        ]);

        return redirect()->action('SpecializationController@index');
    }

    public function specializations_tutor(Request $request)
    {
        $tutor = User::find($request->input('userspecializationid'));
        $tutor->save();
        $tutor->specializations()->sync($request->input('specializations'));
    }
}
