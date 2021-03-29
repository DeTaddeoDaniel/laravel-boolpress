@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-1">
            <a href="{{route('tag.index')}}">tags</a>
        </div>

        <div class="col-11">

           <div class="cards d-flex align-content-around flex-wrap">

            <div class="mb-3">
                <button class="btn btn-success">
                    <a class="text-light" href="{{route('tag.create')}}" >Crea nuovo tag</a>
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
                        <th scope="col">Name</th>
                        <th scope="col">Slung</th>
                        <th scope="col">Creato il</th>
                        <th scope="col">Aggiornato il</th>
                        <th scope="col">Azione</th>
                    </tr>
                </thead>
                
                <tbody>

                    @foreach ($tags as $tag)

                        <tr>
                            <th scope="row">{{$tag->id}}</th>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->slung}}</td>
                            <td>{{$tag->created_at}}</td>
                            <td>{{$tag->updated_at}}</td>
                            <td>
                                <button class="btn btn-info">
                                    <a class="text-light" href="{{route('tag.show', $tag->id)}}" >View</a>
                                </button>

                                <button class="btn btn-secondary">
                                    <a class="text-light" href="{{route('tag.edit', $tag->id)}}" >Edit</a>
                                </button>

                                <form action="{{route('tag.destroy', $tag->id)}}" method="POST" class="d-inline-block">
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
                {{ $tags->links() }}
                {{-- <p>
                    Pagina {{$tags->currentPage()}} di {{$tags->total()}}
                </p> --}}
                <p>
                    Risultati da {{$tags->firstItem()}} - {{$tags->LastItem()}} di {{$tags->total()}}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection