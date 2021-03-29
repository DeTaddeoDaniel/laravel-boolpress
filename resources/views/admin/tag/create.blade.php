@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-1">
            <a href="{{route('tag.index')}}">Tag</a>
        </div>

        <div class="col-11">

            <div class="mb-3">
                <h1>Modifica un tag</h1>
            </div>
            
            <form action="{{route('tag.store')}}" method="POST">

                @csrf

                <div class="mb-3">
                    <label for="name-tag" class="form-label">name tag</label>
                    <input type="text" class="form-control" id="name-tag" placeholder="nome del tag" name="name">
                </div>

                <button type="submit" class="btn btn-success">Crea un nuovo tag</button>

            </form>

        </div>
    </div>
</div>
@endsection