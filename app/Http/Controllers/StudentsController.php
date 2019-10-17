<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Repositories\UserRepository;

class StudentsController extends Controller
{
    public function index(UserRepository $userRepo)
    {
        $users = $userRepo->getAllStudents();

        return view('students.list', ["studentsList" => $users,
                                            "footerYear" => date("Y"),
                                            "title" => "Moduł studentów"]);
    }

    public function show(UserRepository $userRepo, $id)
    {
        $student = $userRepo->find($id);

        return view('students.show', ["student" => $student,
                                            "footerYear" => date("Y"),
                                            "title" => "Moduł studentów"]);
    }
}
