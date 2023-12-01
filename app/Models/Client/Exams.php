<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Exams extends Model
{
    use HasFactory;

    public function getAllExams()
    {
        $exams = DB::select('SELECT * FROM exams');

        return $exams;
    }

    public function getExamById(string $id)
    {
        $exam = DB::select('SELECT * FROM exams WHERE id_exam = ?', [$id]);

        return $exam;
    }
}
