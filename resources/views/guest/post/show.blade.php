@extends('layouts.app')

@section('title', 'Elenco post')

@section('content')
    <div class="container">

        <h1>Show elemento blog</h1>   
                
                <div class="card w-50">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->content}}</p>
                        <h6 class="card-subtitle mb-2 text-muted">Autore: {{$post->user->name}}</h6>
                        <h6 class="card-subtitle mb-2 text-muted">Data: {{$post->updated_at}}</h6>

                        {{-- <a href="#" class="card-link">Another link</a> --}}
                    </div>
                </div>

    </div>
@endsection