@extends('layouts.app')

@section('name')
Изменение
@endsection


@section('content')



@if($param == "book")

<div class="container">
    <div class="row">
        <div class="col-4">
            Изменение книги
        </div>
        <div class="col-4">

        </div>
        <div class="col-4">
            <a style="width: 180px;" class="btn btn-success" href="{{ route('index') }}">Назад</a>
        </div>
    </div>
</div>

<div class="container col-6">
    <div class="row">
        
        <form action="{{route('update', ['book' => $book->id, 'param'=>'book'])}}" method="POST">
            @method('put')
            @csrf

            <div class="row mt-3 mb-3 col-9">
                <div class="col">
                    <Label>User_id</Label>
                    <input value="{{$book->user_id}}" name="user_id" type="mumeric" class="form-control widthInp" placeholder="Выберите роль" aria-label="First name" disabled>
                </div>
            </div>

            <div class="row mt-3 mb-3 col-9">
                <div class="col">
                    <Label>Название</Label>
                    <input value="{{$book->title}}" name="title" type="text" class="form-control widthInp" placeholder="Введите имя" aria-label="First name">
                </div>
            </div>

            <div class="row mt-3 mb-3 col-9">
                <div class="col">
                    <Label>Тираж</Label>
                    <input value="{{$book->edition}}" name="edition" type="text" class="form-control widthInp" placeholder="Введите фамилию" aria-label="First name">
                </div>
            </div>

            <div class="row mt-3 mb-3 col-9">
                <div class="col">
                    <Label>Год выпуска</Label>
                    <input value="{{$book->year}}" name="year" type="text" class="form-control widthInp" placeholder="Введите пароль" aria-label="First name">
                </div>
            </div>

            <div class="row mt-3 mb-3 col-9">
                <div class="col">
                    <Label>Код ISBN</Label>
                    <input  value="{{$book->isbn}}" name="isbn" type="text" class="form-control widthInp" placeholder="Введите пароль" aria-label="First name">
                </div>
            </div>

            <div class="row mt-3 mb-3 col-9">
                <div class="col">
                    <Label>Изменить жанры</Label><br>

                    @foreach($genres as $genre)
                    @if(in_array($genre->name,$items))
                    <input checked value='{{$genre->id}}' style="font-size: 25px; margin-left:10px;" name="data[]" type="checkbox" class="form-check-input" id="exampleCheck1">
                    <Label style="margin: 6px 0;">{{ $genre->name }}</Label>
                    @else
                    <input  value='{{$genre->id}}' style="font-size: 25px; margin-left:10px;" name="data[]" type="checkbox" class="form-check-input" id="exampleCheck1">
                    <Label  style="margin: 6px 0;">{{ $genre->name }}</Label>
                    @endif
                    @endforeach


                </div>
            </div>

            <button style="margin-bottom: 25px;" type="submit" class="btn btn-primary">Изменить книгу</button>
        </form>

    </div>
    @else
    <div class="container">
        <div class="row">
            <div class="col-4">
                Изменение автора
            </div>
            <div class="col-4">

            </div>
            <div class="col-4">
                <a style="width: 180px;" class="btn btn-success" href="{{ route('index') }}">Назад</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row ">
            <form action="{{route('update',['book' => $user->id,'param'=>'user'])}}" method="POST">
                @method('put')
                @csrf

                <div class="row mt-3 mb-3 col-9">
                    <div class="col">
                        <Label>Роль</Label>
                        <input value="{{$user->role}}" name="role" type="mumeric" class="form-control widthInp" placeholder="Выберите роль" aria-label="First name">
                    </div>
                </div>

                <div class="row mt-3 mb-3 col-9">
                    <div class="col">
                        <Label>Логин</Label>
                        <input value="{{$user->login}}" name="login" type="text" class="form-control widthInp" placeholder="Введите имя" aria-label="First name">
                    </div>
                </div>

                <div class="row mt-3 mb-3 col-9">
                    <div class="col">
                        <Label>Имейл</Label>
                        <input value="{{$user->email}}" name="email" type="text" class="form-control widthInp" placeholder="Введите имя" aria-label="First name">
                    </div>
                </div>

                <div class="row mt-3 mb-3 col-9">
                    <div class="col">
                        <Label>Имя</Label>
                        <input value="{{$user->firstName}}" name="firstName" type="text" class="form-control widthInp" placeholder="Введите имя" aria-label="First name">
                    </div>
                </div>

                <div class="row mt-3 mb-3 col-9">
                    <div class="col">
                        <Label>Фамилия</Label>
                        <input value="{{$user->lastName}}" name="lastName" type="text" class="form-control widthInp" placeholder="Введите фамилию" aria-label="First name">
                    </div>
                </div>

                <div class="row mt-3 mb-3 col-9">
                    <div class="col">
                        <Label>Пароль</Label>
                        <input value="" name="password" type="text" class="form-control widthInp" placeholder="Введите пароль" aria-label="First name">
                    </div>
                </div>

                <button style="margin-bottom: 25px;" type="submit" class="btn btn-primary">Изменить автора</button>
            </form>

        </div>


        @endif
        @endsection