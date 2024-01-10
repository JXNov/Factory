<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Exams;
use App\Models\Subjects;
use App\Models\UsersExams;

class HomeController extends Controller
{

    public function index()
    {
        $listExams = Exams::all();

        $usersExams = UsersExams::join('exams', 'users_exams.exam_id', '=', 'exams.id')
            ->join('subjects', 'exams.subject_id', '=', 'subjects.id')
            ->join('users', 'users_exams.user_id', '=', 'users.id')
            ->select('users_exams.*', 'exams.name as exam_name', 'subjects.name as subject_name', 'users.name as user_name', 'users.email as user_email')
            ->orderBy('users_exams.score', 'desc')
            ->get();


        return view('admin.home', compact('usersExams', 'listExams'));
    }

    public function search(Request $request)
    {
        $exam = $request->input('exam_id');

        $name = $request->input('user_name');

        $listExams = Exams::all();

        $usersExams = UsersExams::join('exams', 'users_exams.exam_id', '=', 'exams.id')
            ->join('subjects', 'exams.subject_id', '=', 'subjects.id')
            ->join('users', 'users_exams.user_id', '=', 'users.id')
            ->select('users_exams.*', 'exams.name as exam_name', 'subjects.name as subject_name', 'users.name as user_name', 'users.email as user_email')
            ->where('users.name', 'like', '%' . $name . '%')
            ->where('exams.id', 'like', '%' . $exam . '%')
            ->orderBy('users_exams.score', 'desc')
            ->limit(1)
            ->get();

        return view('admin.blocks.search', compact('usersExams', 'listExams'));
    }
}
