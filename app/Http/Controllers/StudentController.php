<?php

namespace App\Http\Controllers;

use App\Events\StudentCreate;
use App\Models\Student;
use Illuminate\Http\Request;
use Event;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_name'=>['required'],
            'student_email'=>['required','email','unique:students,email'],
            'phone_number'=>['required','digits:10'],
        ]);

        $student = Student::create([
            'name'=>$request->student_name,
            'email'=>$request->student_email,
            'phone_number'=>$request->phone_number,
            'gender'=>$request->gender
        ]);
        event(new StudentCreate($student));


        
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
