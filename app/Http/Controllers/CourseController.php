<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $departments = Department::with('courses')->get();
        return view('pages.courses-offered', compact('departments'));
    }
}
