@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-1">
            <a href="{{route('tag.index')}}">Tags</a>
        </div>

        <div class="col-11">

            <div class="mb-3">
                <h1>Modifica un tag</h1>
            </div>
            
            <form action="{{route('tag.update',$tag->id)}}" method="POST">
                
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name-tag" class="form-label">Name tag</label>
                    <input type="text" class="form-control" id="name-tag" placeholder="Nome del tag" name="name" value="{{old('name',$tag->name)}}">
                </div>
    
                <button type="submit" class="btn btn-success">Salva modifiche</button>

            </form>

        </div>
    </div>
</div>
@endsection