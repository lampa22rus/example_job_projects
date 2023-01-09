@extends('layouts.app')

@section('title')
Список книг
@endsection

@section('content')


<div class="container">
    <div class="row">
        <div class="col-5">
        </div>
        <div class="col-5">
            <a style="width: 150px;" class="btn btn-success" href="{{route('create',['param'=>'book'])}}">Добавить книгу</a>
        </div>
        <div class="col-2">
            <a style="width: 150px;" class="btn btn-primary" href="{{ route('users') }}">Список авторов</a>
        </div>
    </div>
</div>



<div class="container mt-4">
    <div class="row">
        @foreach ($books as $book)
        <div class="col-6">
            <div class="card margT">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            Автор<br>
                            {{$book->user->firstName}}
                            {{$book->user->lastName}}
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
                            <br>
                            <br>
                            Жанры:<br>
                            @foreach($book->genres as $item)
                                #{{$item->name}}
                            @endforeach
                        </div>

                        <div class="col-4">
                            <div class="mb-4">
                                <a class="btn btn-info btnWidth margL margT" href="{{route('show', ['id'=>$book->id])}}">Книги автора</a>
                            </div>
                            <div class="mb-4">
                                <a class="btn btn-warning btnWidth margL margT" href="{{route('edit',['book'=>$book->id,'param'=>'book'])}}">Изменить</a>
                            </div>
                            <form action="{{ route('destroy',['id'=>$book->id])  }}" method="POST">
                                @method('delete')
                                @csrf
                                <input value="book" name="param" style="display:none ;">
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-danger btnWidth margL margT" value="Удалить">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

