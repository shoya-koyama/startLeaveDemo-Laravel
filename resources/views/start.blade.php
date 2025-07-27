@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Start Work</div>

                    <div class="card-body">
                        @if(isset(
                            $latestAttendance) && $latestAttendance)
                            <div class="mb-3">
                                <strong>最新の出勤日時：</strong>
                                {{ $latestAttendance->started_at }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('attendance.start') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">出勤</button>
                        </form>
                        @if(isset($latestAttendance) && $latestAttendance && is_null($latestAttendance->leaved_at))
                            <form method="POST" action="{{ route('attendance.leave') }}" class="mt-2">
                                @csrf
                                <button type="submit" class="btn btn-danger">退勤</button>
                            </form>
                        @endif
                        @if(isset($latestAttendance) && $latestAttendance && $latestAttendance->leaved_at)
                            <div class="mt-3">
                                <strong>最新の退勤日時：</strong>
                                {{ $latestAttendance->leaved_at }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
