<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Subjects;
use Illuminate\Support\Facades\Storage;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // Use the index method to display a list of exams. / Method: GET / URI: /admin/exams
    public function index()
    {
        $subjects = new Subjects();
        $subjects = $subjects->getAllSubjects();

        return view('admin.subjects.lists', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */

    // Use the create method to display a form for creating a new exam. / Method: GET / URI: /admin/exams/create
    public function create()
    {
        $subjects = new Subjects();
        $subjects = $subjects->getAllSubjects();

        return view('admin.subjects.create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */

    // Use the store method to store a newly created exam in the database. / Method: POST / URI: /admin/exams
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('img')) {
            $file = $request->img;
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->storeAs('public', $fileName);
        }

        $data['img'] = $fileName;

        $subjects = new Subjects();
        $subjects = $subjects->createSubject($data);

        return redirect()->route('admin.subjects');
    }

    /**
     * Display the specified resource.
     */

    // Use the show method to display a specific exam. / Method: GET / URI: /admin/exams/{id}
    public function show(string $id)
    {
        $subjects = new Subjects();
        $subjects = $subjects->getSubjectById($id);

        return view('admin.subjects.show', compact('subjects'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    // Use the edit method to display a form for editing a specific exam. / Method: GET / URI: /admin/exams/{id}/edit
    public function edit(string $id)
    {
        $subjects = new Subjects();
        $subjects = $subjects->getSubjectById($id);

        return view('admin.subjects.edit', compact('subjects'));
    }

    /**
     * Update the specified resource in storage.
     */

    // Use the update method to update a specific exam in the database. / Method: PUT/PATCH / URI: /admin/exams/{id}
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $subjects = new Subjects();
        $subjects = $subjects->getSubjectById($id);

        if ($request->hasFile('img')) {
            $file = $request->img;
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->storeAs('public', $fileName);
            $data['img'] = $fileName;
        } else {
            $data['img'] = $subjects[0]->img_subject;
        }

        $subjects = new Subjects();
        $subjects = $subjects->updateSubject($data, $id);

        return redirect()->route('admin.subjects');
    }

    /**
     * Remove the specified resource from storage.
     */

    // Use the destroy method to delete a specific exam from the database. / Method: DELETE / URI: /admin/exams/{id}
    public function destroy(string $id)
    {
        $subjects = new Subjects();
        $subjects = $subjects->deleteSubject($id);

        return redirect()->route('admin.subjects');
    }
}
