@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <h3>Blogs List</h3>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(Auth::user()->role == 'user')
                <a href="{{ url('articles/create') }}" class="btn btn-light text-primary">+ Create Blog</a>
            @endif
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th style="width:70%">Title</th>
                        <th style="width:30%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                    <tr>
                        <td style="vertical-align:middle">
                            <a href="{{ url('articles/'.$article->id) }}">{{ $article->title }}</a>
                        </td>
                        <td style="vertical-align:middle">
                            <form method="POST" action="{{ url('articles/'.$article->id) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete article?')">
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