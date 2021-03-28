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

            @if(session('status')) 
                <div class="alert alert-success">
                    {{ session('status')}}
                </div>
            @endif

            @if(session('error')) 
                <div class="alert alert-danger">
                    {{ session('error')}}
                </div>
            @endif
            
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Creato il</th>
                        <th scope="col">Aggiornato il</th>
                        <th scope="col">Azione</th>
                    </tr>
                </thead>
                
                <tbody>

                    @foreach ($posts as $post)

                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>{{$post->title}}</td>
                            <td>{{$post->user->name}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->updated_at}}</td>
                            <td>
                                <button class="btn btn-info">
                                    <a class="text-light" href="{{route('post.show', $post->id)}}" >View</a>
                                </button>

                                <button class="btn btn-secondary">
                                    <a class="text-light" href="{{route('post.edit', $post->id)}}" >Edit</a>
                                </button>

                                <form action="{{route('post.destroy', $post)}}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
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