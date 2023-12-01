<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Exams;
use App\Models\Admin\Subjects;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        // Search exams
        $exams = Exams::where('exam_title', 'LIKE', "%{$search}%")
            ->orWhere('exam_description', 'LIKE', "%{$search}%")
            ->paginate(10); // Adjust the pagination size as needed

        // Search subjects
        $subjects = Subjects::where('name_subject', 'LIKE', "%{$search}%")
            ->paginate(10); // Adjust the pagination size as needed

        // Return view with results or a message
        return view('admin.blocks.search', compact('exams', 'subjects', 'search'));
    }
}
