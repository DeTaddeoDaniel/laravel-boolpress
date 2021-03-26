@extends('layouts.app')

@section('title', 'Elenco post')

@section('content')
    <div class="container">

        <h1>Lista dei post</h1>

        <div class="cards">
            
            @foreach ($posts as $post)
                
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->content}}</p>
                        <h6 class="card-subtitle mb-2 text-muted">Autore: {{$post->user->name}}</h6>
                        <h6 class="card-subtitle mb-2 text-muted">Data: {{$post->updated_at}}</h6>
                        <a href="{{route('guest.post.show', $post->slung)}}" class="card-link">Show</a>
                        {{-- <a href="#" class="card-link">Another link</a> --}}
                    </div>
                </div>

            @endforeach

        </div>
    </div>
@endsection