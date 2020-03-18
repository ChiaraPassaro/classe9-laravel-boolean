<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $students;
    private $genders;

    public function __construct()
    {
       $this->students = config('students.students');
       $this->genders = config('students.genders');
    }
    //
    public function index()
    {
        $data = [
            'students' => $this->students,
            'genders' => $this->genders
        ];

        // return view('students.index', compact('students'));
        return view('students.index', $data);
    }

    public function show($slug = null) 
    {
        // [
        //     'img' => 'https://wips.plug.it/cips/supereva/cms/2019/07/104750479_l.jpg?w=850&a=r',
        //     'name' => 'Minnie',
        //     'age' => 50,
        //     'company' => 'Disney',
        //     'description' => 'lorem ipsum',
        //     'role' => 'Frontend Developer',
        //     'gender' => 'f',
        //     'slug' => 'minnie'
        // ]
        // $find = false;
        // $thisStudent = [];
        // foreach ($this->students as $studente) {
        //     if($studente['slug'] == $slug) {
        //         $find = true;
        //         $thisStudent = $studente;
        //     }
        // }

        // if($find) {
        //     return view('students.show', ['student' => $thisStudent]);
        // } else {
        //     abort('404');
        // }
        
        foreach ($this->students as $studente) {
            if($studente['slug'] == $slug) {
                return view('students.show', ['student' => $studente]);
            }
        }

        return abort('404');

    }

    public function getById($id) {
        // foreach ($this->students as $key => $student) {
        //     if($key == $id) {
        //         return
        //     }
        // }
        // return abort('404');

        if(!array_key_exists( $id , $this->students)) {
            return abort('404');
        }

        return view('students.show', ['student' => $this->students[$id]]);


    }
}
