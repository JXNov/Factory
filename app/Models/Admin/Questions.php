<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Questions extends Model
{
    use HasFactory;

    public function getAllQuestions()
    {
        $questions = DB::select('SELECT * FROM questions');

        return $questions;
    }

    public function getQuestionById(string $id)
    {
        $question = DB::select('SELECT * FROM questions WHERE id_question = ?', [$id]);

        return $question;
    }

    public function createQuestion(array $data)
    {
        $question = DB::insert('INSERT INTO questions (title_question, choice1_question, choice2_question, choice3_question, choice4_question, correct_answer, id_exam) VALUES (?, ?, ?, ?, ?, ?, ?)', [$data['question'], $data['choice1'], $data['choice2'], $data['choice3'], $data['choice4'], $data['correct'], $data['exam']]);

        return $question;
    }

    public function updateQuestion(array $data, string $id)
    {
        $question = DB::update('UPDATE questions SET title_question = ?, choice1_question = ?, choice2_question = ?, choice3_question = ?, choice4_question = ?, correct_answer = ?, id_exam = ? WHERE id_question = ?', [$data['question'], $data['choice1'], $data['choice2'], $data['choice3'], $data['choice4'], $data['correct'], $data['exam'], $id]);

        return $question;
    }

    public function deleteQuestion(string $id)
    {
        $question = DB::delete('DELETE FROM questions WHERE id_question = ?', [$id]);

        return $question;
    }
}
