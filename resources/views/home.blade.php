@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    {{-- ↓ ここから追加 ↓ --}}
                    <div class="mt-4">
                        <form method="POST" action="{{ route('attendance.start') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">出勤</button>
                        </form>
                    </div>
                    {{-- ↑ ここまで追加 ↑ --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection