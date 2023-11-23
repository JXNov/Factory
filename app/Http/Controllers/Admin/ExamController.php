<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // Use the index method to display a list of exams. / Method: GET / URI: /admin/exams
    public function index()
    {
        return view('admin.home');
    }

    /**
     * Show the form for creating a new resource.
     */

    // Use the create method to display a form for creating a new exam. / Method: GET / URI: /admin/exams/create
    public function create()
    {
        //
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

    // Use the show method to display a specific exam. / Method: GET / URI: /admin/exams/{id}
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    // Use the edit method to display a form for editing a specific exam. / Method: GET / URI: /admin/exams/{id}/edit
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    // Use the update method to update a specific exam in the database. / Method: PUT/PATCH / URI: /admin/exams/{id}
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    // Use the destroy method to delete a specific exam from the database. / Method: DELETE / URI: /admin/exams/{id}
    public function destroy(string $id)
    {
        //
    }
}
