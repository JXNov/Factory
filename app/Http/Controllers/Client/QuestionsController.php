<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Client\Subjects;
use App\Models\Client\Exams;
use App\Models\Client\Questions;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $exams = new Exams();
        $exams = $exams->getExamById($id);

        $questions = new Questions();
        $questions = $questions->getAllQuestions();

        return view('clients.questions.show', compact('exams', 'questions'));
    }

    public function point(Request $request, string $id)
    {
        $answers = $request->all();

        $exams = new Exams();
        $exams = $exams->getExamById($id);

        $questions = new Questions();
        $questions = $questions->getAllQuestions();

        $userAnswers = $answers['answers'];

        $point = 0;

        foreach ($exams as $exam) {
            $limitQuest = $exam->exam_limit_quest;

            foreach ($questions as $question) {
                if ($exam->id_exam == $question->id_exam) {
                    foreach ($userAnswers as $key => $userAnswer) {
                        if ($question->id_question == $key) {
                            if ($question->correct_answer == $userAnswer) {
                                $point++;
                            }
                        }
                    }
                }
            }
        }

        $point = $point / $limitQuest * 10;

        return view('clients.questions.point', compact('exams', 'questions', 'point'));
    }
}
