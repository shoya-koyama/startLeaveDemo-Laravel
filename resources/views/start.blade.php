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
                        <form method="POST" action="{{ route('attendance.start') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">出勤</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
