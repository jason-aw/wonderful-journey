@extends('layouts.app')

@section('content')
<div class="container">
    @isset ($category)
    <h2>Category {{$category->name}}</h2>
    @else
    <h2>Blogs</h2>
    @endisset
    @auth
    <p>Welcome, {{ Auth::user()->name }}</p>
    @endauth
    <hr>
    @foreach($articles as $article)
        @if($loop->index % 3 === 0)
            <div class="row row-cols-4 my-2">
        @endif
        <div class="col-4 p-2" style="width: 19vw;">
            <div class="card" style="width: 100%">
            
                <a href="{{ url('articles/'.$article->id) }}">
                    <img src="{{ asset('storage/images/'.$article->image) }}" class="card-img-top" style="height:250px" onerror="this.style.display='none'">
                </a>

                <div class="card-body">
                    <a style="width: 100%; font-size:24pt" href="{{ url('articles/'.$article->id) }}" >{{ $article->title }}</a>
                    <p style="font-size: 10pt;">by {{$article->user->name}}</p>
                    <p class="card-text">
                        {{ \Illuminate\Support\Str::limit($article->description, 50, $end='') }}
                        <a href="{{ url('articles/'.$article->id) }}">{{ __('...full story') }}</a>
                    </p>
                    @if(!\Illuminate\Support\Str::contains(Request::url(), 'categories'))
                    <p>Category : <a href = "{{ url('categories/'.$article->category->id) }}">{{$article->category->name}}</a></p>
                    @endif
                </div>
            
            </div>
        </div>
        @if($loop->iteration % 3 === 0 || $loop->last)
            </div>
        @endif
    @endforeach
</div>
@endsection