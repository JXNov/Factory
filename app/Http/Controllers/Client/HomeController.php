<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Client\Subjects;

class HomeController extends Controller
{
    public function index()
    {
        $subjects = new Subjects();
        $subjects = $subjects->getAllSubjects();

        return view('clients.home', compact('subjects'));
    }
}
