@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-1">
            <a href="{{route('post.index')}}">Posts</a>
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
                        <th scope="col">Cover</th>
                        <th scope="col">Title</th>
                        <th scope="col">Autore</th>
                        <th scope="col">Creato il</th>
                        <th scope="col">Aggiornato il</th>
                        <th scope="col">Azione</th>
                    </tr>
                </thead>
                
                <tbody>

                    @foreach ($posts as $post)

                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>
                                @if ($post->cover)
                                    <img src="{{asset('storage/'.$post->cover)}}" alt="cover del post con titolo {{$post->title}}" height="50px">
                                @else
                                    <p>no image</p>
                                @endif
                            </td>
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

                                <form action="{{route('post.destroy', $post->id)}}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                
                    @endforeach
                        
                </tbody>
            </table>

            <div>
                {{ $posts->links() }}
                {{-- <p>
                    Pagina {{$posts->currentPage()}} di {{$posts->total()}}
                </p> --}}
                <p>
                    Risultati da {{$posts->firstItem()}} - {{$posts->LastItem()}} di {{$posts->total()}}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection