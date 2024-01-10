<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Subjects;
use App\Models\Exams;
use App\Models\User;
use App\Models\UsersSubjects;
use App\Models\UsersExams;
use App\Models\Comments;
use Egulias\EmailValidator\Parser\Comment;

class SubjectsController extends Controller
{
    public function index()
    {
        $listSubjects = Subjects::all();

        return view('clients.subjects.lists', compact('listSubjects'));
    }

    public function show(string $id)
    {
        $getSubject = Subjects::findOrFail($id);

        $listExams = Exams::all();

        $checkRegister = $this->checkRegisterSubject($id);

        $getUser = Comments::join('users', 'comments.user_id', '=', 'users.id')
            ->where('comments.subject_id', $id)
            ->select('comments.*', 'users.name', 'users.id', 'users.role')
            ->first();

        $getExam = Exams::where('subject_id', $id)->first();

        $listComments = Comments::join('users', 'comments.user_id', '=', 'users.id')
            ->where('comments.subject_id', $id)
            ->select('comments.*', 'users.name')
            ->get();

        return view('clients.subjects.show', compact('getSubject', 'listExams', 'checkRegister', 'listComments', 'getUser', 'getExam'));
    }

    public function registerSubject(string $id)
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;

            $register = User::join('users_subjects', 'users.id', '=', 'users_subjects.user_id')
                ->where('users_subjects.user_id', $user_id)
                ->where('users_subjects.subject_id', $id)
                ->first();

            $register = UsersSubjects::insert([
                'user_id' => $user_id,
                'subject_id' => $id
            ]);

            if ($register) {
                return redirect()->route('subjects.show', ['id' => $id])->with('success', 'Đăng ký thành công');
            } else {
                return redirect()->route('subjects.show', ['id' => $id])->with('error', 'Đăng ký thất bại');
            }
        } else {
            return redirect()->route('subjects.show', ['id' => $id])->with('error', 'Bạn cần đăng nhập để đăng ký');
        }
    }

    public function checkRegisterSubject(string $id)
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;

            $check = User::join('users_subjects', 'users.id', '=', 'users_subjects.user_id')
                ->where('users_subjects.user_id', $user_id)
                ->where('users_subjects.subject_id', $id)
                ->first();

            $check = UsersSubjects::where('user_id', $user_id)
                ->where('subject_id', $id)
                ->first();

            return $check;
        } else {
            return false;
        }
    }

    public function comment(Request $request, string $subject_id, string $user_id)
    {
        $comment = Comments::insert([
            'text' => $request->content,
            'user_id' => $user_id,
            'subject_id' => $subject_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        if ($comment) {
            return redirect()->route('subjects.show', ['id' => $subject_id])->with('success', 'Bình luận thành công');
        } else {
            return redirect()->route('subjects.show', ['id' => $subject_id])->with('error', 'Bình luận thất bại');
        }
    }
}
