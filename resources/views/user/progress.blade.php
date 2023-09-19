@extends('layouts.user')

@section('content')
    <h1>{{ $userName }}の授業進捗</h1>
    <p>現在の学年：{{ $classroomName }}</p>

    <h2>各学年毎の授業タイトル</h2>
    <ul>
        @foreach ($classes as $classroom)
            <li>{{ $classroom->name }}
                <ul>
                    @foreach ($classroom->curriculums as $curriculum)
                        @php
                        $progress = App\Models\CurriculumProgress::where('users_id', $userId)
                            ->where('curriculums_id', $curriculum->id)->first();
                        @endphp
                        <li>
                            @if ($progress && $progress->clear_flag === 1)
                                {{ $curriculum->title }}（受講済）
                            @else
                                {{ $curriculum->title }}
                            @endif
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
@endsection('content')
