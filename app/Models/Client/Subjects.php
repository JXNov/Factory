<?php

namespace App\Models\Client;

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
}
