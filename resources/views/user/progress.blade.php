@extends('layouts.user')

@section('content')
    <h1>{{ $userName }}の授業進捗</h1>
    <p>現在の学年：{{ $classroomName }}</p>

    <h2>各学年毎の授業タイトル</h2>
    <ul>
        @foreach ($classes as $classroom)
            <li>{{ $classroom->name }}年生：
                <ul>
                    @foreach ($classroom->curriculums as $curriculum)
                        <li>{{ $curriculum->title }}</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
@endsection('content')
