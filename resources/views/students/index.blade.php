@extends('layouts.layout')

@section('main')
<div class="filter">
    <select name="filter" id="filter">
        @foreach ($genders as $gender)
            <option value="{{$gender}}">{{$gender}}</option>
        @endforeach
    </select>
</div>
<div class="students">
    @foreach ($students as $student)
        <div class="student">
            <div class="info">
            <img src="{{$student['img']}}" alt="{{$student['name']}}">
                <div class="text">
                <a href="{{route('student.show', ['slug' => $student['slug']])}}"><h2>{{$student['name']}} ({{$student['age']}} anni)</h2></a>
                    {{-- se gender è == f a altrimenti o --}}
                    <h3>Assunt{{($student['gender'] == 'f') ? 'a' : 'o'}} da {{$student['company']}} come {{$student['role']}}</h3>
                    {{-- <h3>@if($student['gender'] == 'f')Assunta @else Assunto @endif
                    </h3> --}}
                </div>
            </div>
            <p class="description">
                {{$student['description']}}
            </p>
        </div>
    @endforeach
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
@endsection