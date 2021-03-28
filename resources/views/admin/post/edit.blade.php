@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-1">
            <a href="{{route('post.index')}}">Posts</a>
        </div>

        <div class="col-11">

            <div class="mb-3">
                <h1>Modifica un post</h1>
            </div>
            
            <form>

                <div class="mb-3">
                    <label for="title-post" class="form-label">Title post</label>
                    <input type="text" class="form-control" id="title-post" placeholder="Titolo del post" value="{{$post->title}}">
                </div>
                
                <div class="mb-3">
                    <label for="content-post" class="form-label">Title post</label>
                    <textarea type="textarea" class="form-control" id="content-post" placeholder="Contenuto del form">{{$post->content}}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Salva modifiche</button>

            </form>

        </div>
    </div>
</div>
@endsection