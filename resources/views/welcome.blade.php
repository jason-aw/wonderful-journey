@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <h2>You are logged in!</h2>
    <h4>Welcome, {{ Auth::user()->name }}</h4>
</div>
@endsection
