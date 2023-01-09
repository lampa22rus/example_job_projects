@extends('layouts.app')

@section('name')
Добавление 
@endsection

<style>
    body {
        background-color: aquamarine;
    }

    .width {
        width: 50%;
    }

    .widthInp {
        width: 140%;
    }
</style>

@section('content')






@if($param == "book")

<div class="container">
    <div class="row">
        <div class="col-4">
        Добавление книги
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


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <form action="{{route('add',['param'=>'book'])}}" method="POST">
            @method('post')
            @csrf
            
            

            <div class="row mt-3 mb-3 col-9">
                <div class="col">
                    <Label>Название</Label>
                    <input name="title" type="text" class="form-control widthInp" placeholder="Введите имя" aria-label="First name">
                </div>
            </div>

            <div class="row mt-3 mb-3 col-9">
                <div class="col">
                    <Label>Тираж</Label>
                    <input name="edition" type="text" class="form-control widthInp" placeholder="Введите фамилию" aria-label="First name">
                </div>
            </div>

            <div class="row mt-3 mb-3 col-9">
                <div class="col">
                    <Label>Год выпуска</Label>
                    <input name="year" type="text" class="form-control widthInp" placeholder="Введите пароль" aria-label="First name">
                </div>
            </div>

            <div class="row mt-3 mb-3 col-9">
                <div class="col">
                    <Label>Код ISBN</Label>
                    <input name="isbn" type="text" class="form-control widthInp" placeholder="Введите пароль" aria-label="First name">
                </div>
            </div>

            <div class="row mt-3 mb-3 col-9">
                <div class="col">
                    <Label>Выбрать жанры</Label><br>
 
                    <input value='1' style="font-size: 25px; margin-left:10px;"  name="data[]" type="checkbox" class="form-check-input" id="exampleCheck1">
                    <Label style="margin: 6px 0;">Фэнтэзи</Label>
                    
                    <input value='2' style="font-size: 25px; margin-left:10px;"  name="data[]" type="checkbox" class="form-check-input" id="exampleCheck1">
                    <Label>Биография</Label>
                    
                    <input value='3' style="font-size: 25px; margin-left:10px;"  name="data[]" type="checkbox" class="form-check-input" id="exampleCheck1">
                    <Label>Драма</Label>
                    
                    <input value='4' style="font-size: 25px; margin-left:10px;"  name="data[]" type="checkbox" class="form-check-input" id="exampleCheck1">
                    <Label>Роман</Label>
                    
                    <input value='5'  style="font-size: 25px; margin-left:10px;"  name="data[]" type="checkbox" class="form-check-input" id="5_horror">
                    <Label>Ужасы</Label>
                    
                </div>
            </div>

            <button style="margin-bottom: 25px;" type="submit" class="btn btn-primary">Добавить книгу</button>
        </form>

    </div>
@else
<div class="container">
    <div class="row">
        <div class="col-4">
        Добавление автора
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

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <form action="{{route('add')}}" method="POST">
            @method('post')
            @csrf
            
            <div class="row mt-3 mb-3 col-9">
                <div class="col">
                    <Label>Роль</Label>
                    <input name="role" type="mumeric" class="form-control widthInp" placeholder="Выберите роль" aria-label="First name">
                </div>
            </div>

            <div class="row mt-3 mb-3 col-9">
                <div class="col">
                    <Label>Логин</Label>
                    <input name="login" type="text" class="form-control widthInp" placeholder="Введите имя" aria-label="First name">
                </div>
            </div>

            <div class="row mt-3 mb-3 col-9">
                <div class="col">
                    <Label>Имейл</Label>
                    <input name="email" type="text" class="form-control widthInp" placeholder="Введите имя" aria-label="First name">
                </div>
            </div>

            <div class="row mt-3 mb-3 col-9">
                <div class="col">
                    <Label>Имя</Label>
                    <input name="firstName" type="text" class="form-control widthInp" placeholder="Введите имя" aria-label="First name">
                </div>
            </div>

            <div class="row mt-3 mb-3 col-9">
                <div class="col">
                    <Label>Фамилия</Label>
                    <input name="lastName" type="text" class="form-control widthInp" placeholder="Введите фамилию" aria-label="First name">
                </div>
            </div>

            <div class="row mt-3 mb-3 col-9">
                <div class="col">
                    <Label>Пароль</Label>
                    <input name="password" type="text" class="form-control widthInp" placeholder="Введите пароль" aria-label="First name">
                </div>
            </div>

            <button style="margin-bottom: 25px;" type="submit" class="btn btn-primary">Добавить автора</button>
        </form>

    </div>


@endif
    @endsection