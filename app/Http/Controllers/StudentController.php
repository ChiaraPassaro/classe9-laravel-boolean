<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $students;

    public function __construct()
    {
       $this->students =  [
            [
                'img' => 'https://www.topolino.it/wp-content/uploads/2019/12/pippointera.png',
                'name' => 'Pippo',
                'age' => 30,
                'company' => 'Disney',
                'description' => 'lorem ipsum',
                'role' => 'Web Developer',
                'gender' => 'm',
                'slug' => 'pippo'
            ],
            [
                'img' => 'https://www.cartonionline.com/immagini/topolino/topolino.jpg',
                'name' => 'Topolino',
                'age' => 50,
                'company' => 'Disney',
                'description' => 'lorem ipsum',
                'role' => 'Backend Developer',
                'gender' => 'm',
                'slug' => 'topolino'
            ],
            [
                'img' => 'https://wips.plug.it/cips/supereva/cms/2019/07/104750479_l.jpg?w=850&a=r',
                'name' => 'Minnie',
                'age' => 50,
                'company' => 'Disney',
                'description' => 'lorem ipsum',
                'role' => 'Frontend Developer',
                'gender' => 'f',
                'slug' => 'minnie'
            ]
        ];
    }
    //
    public function index()
    {
        $data = [
                'students' => $this->students,
                'gender' => [
                    'm',
                    'f'
                ]
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
}
