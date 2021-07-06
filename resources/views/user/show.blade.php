@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    User Profile
                </div>

                <div class="card-body">
                    <label for="name" class="col-md-12 col-form-label"><b>Name:</b></label>
                    <label for="name" class="col-md-12 col-form-label">{{ $user->name }}</label>

                    <label for="email" class="col-md-12 col-form-label"><b>E-Mail:</b></label>
                    <label for="name" class="col-md-12 col-form-label">{{ $user->email }}</label>

                    <label for="phone" class="col-md-12 col-form-label"><b>Phone:</b></label>
                    <label for="name" class="col-md-12 col-form-label">{{ $user->phone }}</label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection