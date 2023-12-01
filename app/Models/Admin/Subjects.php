<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Subjects extends Model
{
    use HasFactory;

    public function getAllSubjects()
    {
        $subjects = DB::select('SELECT * FROM subjects');

        return $subjects;
    }

    public function getSubjectById(string $id)
    {
        $subject = DB::select('SELECT * FROM subjects WHERE id_subject = ?', [$id]);

        return $subject;
    }

    public function createSubject(array $data)
    {
        $subject = DB::insert('INSERT INTO subjects (name_subject, img_subject, detail_subject) VALUES (?, ?, ?)', [$data['name'], $data['img'], $data['detail']]);

        return $subject;
    }

    public function updateSubject(array $data, string $id)
    {
        $subject = DB::update('UPDATE subjects SET name_subject = ?, img_subject = ?, detail_subject = ? WHERE id_subject = ?', [$data['name'], $data['img'], $data['detail'], $id]);

        return $subject;
    }

    public function deleteSubject(string $id)
    {
        $subject = DB::delete('DELETE FROM subjects WHERE id_subject = ?', [$id]);

        return $subject;
    }
}
