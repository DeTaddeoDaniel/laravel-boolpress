@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-1">
            <a href="route('Post.index')">Posts</a>
        </div>

        <div class="col-11">

           <div class="cards d-flex align-content-around flex-wrap">

            <div class="mb-3">
                <button class="btn btn-success">
                    <a class="text-light" href="{{route('post.create')}}" >Crea nuovo post</a>
                </button>
            </div>
            
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                          <th scope="col">Autore</th>
                        <th scope="col">Title</th>
                         <th scope="col">Contenuto</th>
                        <th scope="col">Creato il</th>
                        <th scope="col">Aggiornato il</th>
                    </tr>
                </thead>
                
                <tbody>

                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>{{$post->user->name}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->content}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->updated_at}}</td>
                        </tr>
                        
                </tbody>
            </table>


        </div>
    </div>
</div>
@endsection