@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{$article->title}}</h3>
    <p>Article by {{$article->user->name}}</p>
    <hr>
    <img src="{{ asset('storage/images/'.$article->image) }}" onerror="this.style.display='none'" class="img-fluid rounded mx-auto d-block">
    <p class="mt-3">{{$article->description}}</p>
    <p>Category : <a href = "{{ url('categories/'.$article->category->id) }}">{{$article->category->name}}</a></p>
    <a class= "btn btn-light text-primary" href="{{ url()->previous() }}"><i class="fas fa-chevron-left"></i> Back</a>
</div>
@endsection