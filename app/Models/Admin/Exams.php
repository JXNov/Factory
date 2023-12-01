<?php

namespace App\Models\Admin;

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

    public function createExam(array $data)
    {
        $exam = DB::insert('INSERT INTO exams (exam_title, exam_time_limit, exam_limit_quest, exam_description, id_subject) VALUES (?, ?, ?, ?, ?)', [$data['name'], $data['timeLimit'], $data['limitQuest'], $data['desc'], $data['subject']]);

        return $exam;
    }

    public function updateExam(array $data, string $id)
    {
        $exam = DB::update('UPDATE exams SET exam_title = ?, exam_time_limit = ?, exam_limit_quest = ?, exam_description = ?, id_subject = ? WHERE id_exam = ?', [$data['name'], $data['timeLimit'], $data['limitQuest'], $data['desc'], $data['subject'], $id]);

        return $exam;
    }

    public function deleteExam(string $id)
    {
        $exam = DB::delete('DELETE FROM exams WHERE id_exam = ?', [$id]);

        return $exam;
    }
}
