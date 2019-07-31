@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    <div class="justify-content-center">
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in! beeee
            </div>
        </div>
    </div>
</div>
@endsection
