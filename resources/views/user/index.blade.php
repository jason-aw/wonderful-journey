@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <h3>Users List</h3>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th style="width:45%">Name</th>
                        <th style="width:45%">Email</th>
                        <th style="width:10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td style="vertical-align:middle;">
                            <a href="{{ url('users/'.$user->id) }}">{{ $user->name }}</a>
                        </td>
                        <td style="vertical-align:middle;">
                            {{ $user->email }}
                        </td>
                        <td style="vertical-align:middle;">
                            <form method="POST" action="{{ url('users/'.$user->id) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete user?')">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection