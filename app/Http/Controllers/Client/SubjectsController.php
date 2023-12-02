<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Client\Subjects;
use App\Models\Client\Exams;
use App\Models\Client\Questions;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // Use the index method to display a list of exams. / Method: GET / URI: /admin/exams
    public function index()
    {
        return view('client.subjects.lists');
    }

    /**
     * Show the form for creating a new resource.
     */

    // Use the create method to display a form for creating a new exam. / Method: GET / URI: /admin/exams/create
    public function create()
    {
        return view('client.subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    // Use the store method to store a newly created exam in the database. / Method: POST / URI: /admin/exams
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

    // Use the show method to display the details of a specific exam. / Method: GET / URI: /admin/exams/{id}
    public function show($id)
    {
        $subjects = new Subjects();
        $subjects = $subjects->getSubjectById($id);

        $exams = new Exams();
        $exams = $exams->getAllExams();

        return view('clients.subjects.show', compact('subjects', 'exams'));
    }
}
