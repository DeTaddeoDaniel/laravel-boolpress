@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-1">
            <a href="{{route('post.index')}}">Posts</a>
        </div>

        <div class="col-11">

            <div class="mb-3">
                <h1>Crea un post</h1>
            </div>
            
            <form action="{{route('post.store')}}" method="POST">

                @csrf

                <div class="mb-3">
                    <label for="title-post" class="form-label">Title post</label>
                    <input type="text" class="form-control" id="title-post" placeholder="Titolo del post" name="title">
                </div>
                
                <div class="mb-3">
                    <label for="content-post" class="form-label">Title post</label>
                    <textarea type="textarea" class="form-control" id="content-post" name="content" placeholder="Contenuto del form">
                    </textarea>
                </div>

                <label>Tipologia post</label>
                @foreach ($tags as $tag)

                    @php
                        // dd($tag->id);
                    @endphp
                    
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="tags[]" value="{{$tag->id}}">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{$tag->name}}
                        </label>
                    </div>

                @endforeach
                

                <button type="submit" class="btn btn-success">Crea un nuovo post</button>

            </form>

        </div>
    </div>
</div>
@endsection