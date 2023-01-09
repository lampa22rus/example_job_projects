@extends('layouts.app')

@section('title')
Список авторов
@endsection

@section('content')



<div class="container">
    <div class="row">
        <div class="col-5">
        </div>
        <div class="col-5">
            <a style="width: 150px;" class="btn btn-success" href="{{route('create',['param'=>'book'])}}">Добавить автора</a>
        </div>
        <div class="col-2">
            <a style="width: 150px;" class="btn btn-primary" href="{{route('index')}}">Список книг</a>
        </div>
    </div>
</div>


<div class="container mt-4">
    <div class="row">
        @foreach ($users as $user)
        <div class="col-6">
            <div class="card margT">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            Роль<br>
                            {{$user->role}}
                            <br>
                            <br>
                            Логин<br>
                            {{$user->login}}
                            <br>
                            <br>
                            Имейл<br>
                            {{$user->email}}
                            <br>
                            <br>
                            Имя<br>
                            {{$user->firstName}}
                            <br>
                            <br>
                            Фамилия<br>
                            {{$user->lastName}}
                            <br>
                            <br>
                            
                        </div>

                        <div class="col-4">
                            <div class="mb-4">
                                <a style="width: 150px;" class="btn btn-info margL margT" href="{{route('show', ['id'=>$user->id])}}">Книги автора</a>
                            </div>
                            <div class="mb-4">
                                <a style="width: 150px;" class="btn btn-warning margL margT" href="{{route('edit', ['book'=>$user->id,'param'=>'user'])}}">Изменить</a>
                            </div>
                            <div class="mb-4">
                                <form action="{{ route('destroy',['id'=>$user->id])  }}" method="POST">
                                @method('delete')
                                @csrf
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-danger btnWidth margL margT" value="Удалить">
                                </div>
                            </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection