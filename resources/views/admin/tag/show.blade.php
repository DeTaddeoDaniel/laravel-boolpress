@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-1">
            <a href="route('Post.index')">Posts</a>
        </div>

        <div class="col-11">

           <div class="cards d-flex align-content-around flex-wrap">
            
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                          <th scope="col">name</th>
                        <th scope="col">slung</th>
                        <th scope="col">Creato il</th>
                        <th scope="col">Aggiornato il</th>
                    </tr>
                </thead>
                
                <tbody>

                        <tr>
                            <th scope="row">{{$tag->id}}</th>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->slung}}</td>
                            <td>{{$tag->created_at}}</td>
                            <td>{{$tag->updated_at}}</td>
                        </tr>
                        
                </tbody>
            </table>


        </div>
    </div>
</div>
@endsection