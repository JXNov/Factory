<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        return view('exam.index');
    }

    public function create()
    {
        return view('exam.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        return view('exam.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
