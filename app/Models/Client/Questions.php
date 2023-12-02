<?php

namespace App\Models\Client;

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

    public function getQuestionById($id)
    {
        $question = DB::select('SELECT * FROM questions WHERE id = ?', [$id]);

        return $question;
    }
}
