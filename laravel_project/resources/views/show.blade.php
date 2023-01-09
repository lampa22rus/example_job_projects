@extends('layouts.app')

@section('name')

@endsection

@section('content')



<div class="container">
    <div class="row">
        <div class="col-4">
            Просмотр книг автора
            <h3 style="margin-left: 100px;">Автор - <strong> {{$user->firstName}} {{$user->lastName}} <br> </strong> Роль - <strong> {{$user->role}} </strong></h3>
            <h1 style="float: left;"></h1>
        </div>
        <div class="col-4">

        </div>
        <div class="col-4">
            <a style="width: 180px;" class="btn btn-success" href="/">Назад</a>
        </div>
        
        @foreach($user->books as $book)
        
        <div class="col-6">
         <div class="card margT">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        Автор id<br>
                        {{$book->user_id}}
                        <br>
                        <br>
                        Название<br>
                        {{$book->title}}
                        <br>
                        <br>
                        Тираж<br>
                        {{$book->edition}}
                        <br>
                        <br>
                        Год выпуска<br>
                        {{$book->year}}
                        <br>
                        <br>
                        Код ISBN<br>
                        {{$book->isbn}}
                    </div>
                </div>
            </div>
         </div>
        </div>
        @endforeach

    </div>

    @endsection