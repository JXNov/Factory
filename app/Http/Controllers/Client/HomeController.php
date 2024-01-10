<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Exams;
use App\Models\Subjects;
use App\Models\UsersExams;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $listSubjects = Subjects::all();

        return view('clients.home', compact('listSubjects'));
    }

    public function score(Request $request, string $id)
    {
        $listExams = Exams::all();

        $usersExams = UsersExams::join('exams', 'users_exams.exam_id', '=', 'exams.id')
            ->join('subjects', 'exams.subject_id', '=', 'subjects.id')
            ->where('users_exams.user_id', '=', $id)
            ->select('users_exams.score', 'users_exams.created_at', 'exams.name as exam_name', 'subjects.name as subject_name')
            ->get();

        return view('clients.info.score', compact('listExams', 'usersExams'));
    }

    public function dashboard(Request $request, string $id)
    {
        $request->session()->put('user_id', $id);

        $user = User::find($id);

        return view('clients.info.dashboard', compact('user'));
    }

    public function update(Request $request)
    {
        $id = session('user_id');
        $data = $request->all();

        $user = User::find($id);

        $hashedPassword = Hash::make($data['new_password']);

        if (!Hash::check($data['old_password'], $user->password)) {
            return redirect()->route('info.dashboard', $id)->with('error', 'Mật khẩu cũ không đúng');
        }

        $request->validate([
            'name' => 'required',
            'old_password' => 'required',
            'new_password' => 'required|min:8|not_in:' . $data['old_password'],
            'confirm_password' => 'required|same:new_password',
        ], [
            'name.required' => 'Tên không được để trống',
            'old_password.required' => 'Mật khẩu cũ không được để trống',
            'new_password.required' => 'Mật khẩu mới không được để trống',
            'new_password.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự',
            'new_password.not_in' => 'Mật khẩu mới không được trùng với mật khẩu cũ',
            'confirm_password.required' => 'Xác nhận mật khẩu không được để trống',
            'confirm_password.same' => 'Xác nhận mật khẩu không khớp',
        ]);

        $updateUser = $user->update([
            'name' => $data['name'],
            'password' => $hashedPassword,
        ]);

        if ($updateUser) {
            return redirect()->route('info.dashboard', $id)->with('success', 'Cập nhật thông tin thành công');
        } else {
            return redirect()->route('info.dashboard', $id)->with('error', 'Cập nhật thông tin thất bại');
        }
    }

    public function registeredSubjects()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;

            $listSubjects = Subjects::join('users_subjects', 'subjects.id', '=', 'users_subjects.subject_id')
                ->where('users_subjects.user_id', $user_id)
                ->select('subjects.*')
                ->get();

            return view('clients.info.registered', compact('listSubjects'));
        } else {
            return redirect()->route('subjects')->with('error', 'Bạn cần đăng nhập để xem');
        }
    }
}
