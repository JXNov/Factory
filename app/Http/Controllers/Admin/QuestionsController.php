<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Subjects;
use App\Models\Admin\Exams;
use App\Models\Admin\Questions;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('exam');

        $subjects = new Subjects();
        $subjects = $subjects->getAllSubjects();

        $exams = new Exams();
        $exams = $exams->getAllExams();

        $questions = new Questions();
        $questions = $questions->getAllQuestions();

        return view('admin.questions.lists', compact('subjects', 'exams', 'questions', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $exams = new Exams();
        $exams = $exams->getAllExams();

        return view('admin.questions.create', compact('exams'));
    }

    public function createByExam(string $id)
    {
        $exams = new Exams();
        $exams = $exams->getExamById($id);

        return view('admin.questions.createByExam', compact('exams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $questions = new Questions();
        $questions = $questions->createQuestion($data);

        return redirect()->route('admin.questions');
    }

    public function storeByExam(Request $request, string $id)
    {
        $data = $request->all();

        $questions = new Questions();
        $questions = $questions->createQuestion($data);

        return redirect()->route('admin.exams.show', $id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $questions = new Questions();
        $questions = $questions->getQuestionById($id);

        return view('admin.questions.show', compact('questions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $questions = new Questions();
        $questions = $questions->getQuestionById($id);

        $exams = new Exams();
        $exams = $exams->getAllExams();

        return view('admin.questions.edit', compact('questions', 'exams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $questions = new Questions();
        $questions = $questions->updateQuestion($data, $id);

        return redirect()->route('admin.questions');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $questions = new Questions();
        $questions = $questions->deleteQuestion($id);

        return redirect()->route('admin.questions');
    }
}
