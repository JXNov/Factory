<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Client\Exams;
use App\Models\Client\Subjects;
use App\Models\Client\Questions;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $exams = new Exams();
        $exams = $exams->getAllExams();

        $subjects = new Subjects();
        $subjects = $subjects->getAllSubjects();

        $questions = new Questions();
        $questions = $questions->getAllQuestions();

        return view('clients.exams.lists', compact('exams', 'subjects', 'questions'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $subjects = new Subjects();
        $subjects = $subjects->getAllSubjects();

        return view('clients.exams.create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $data = $request->all();

        $exams = new Exams();
        $exams = $exams->createExam($data);

        return redirect()->route('clients.exams');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $exams = new Exams();
        $exams = $exams->getExamById($id);

        $subjects = new Subjects();
        $subjects = $subjects->getAllSubjects();

        $questions = new Questions();
        $questions = $questions->getAllQuestions();

        return view('clients.exams.show', compact('exams', 'subjects', 'questions'));
    }
}
