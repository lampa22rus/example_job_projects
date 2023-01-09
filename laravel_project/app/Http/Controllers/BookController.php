<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookGenre;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
      
       

        return view('index', [ 'books' => Book::all(), 'param' => 'book']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request->param);

        // $validated = $request->validate([
        //     'user_id' => 'required|min:1|max:2',
        //     'title' => 'required|string|min:3|max:50',
        //     'edition' => 'required|integer|min:1|max:9',
        //     'year' => 'required|integer|digits:4',
        //     'isbn' => 'required|integer|digits:8'
        // ]);

        return view('create', ['books' => Book::all(), 'users' => User::all(), 'param' => $request->param ]);
    }

    public function add(Request $request,Book $book, User $user)
    {
        // dd($request->data);
        
        $param = $request->param;
        if ($param == "book") {          
              /* Добавление книги */
            //   dd(Book::all()->last()->genres()->find(1)->name);
              $book->insert([
                'user_id' => $request->user_id,
                'title' => $request->title,
                'edition' => $request->edition,
                'year' => $request->year,
                'isbn' => $request->isbn
            ]);
            
            foreach($request->data as $genre){
                $item = Genre::find($genre);
                Book::all()->last()->genres()->save($item);
            };
            
        } else {
            /* Добавление автора */
            $user->insert([
                'role' => $request->role,
                'login' => $request->login,
                'email' => $request->email,
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'password' => bcrypt($request->password)
            ]);
            return redirect(route('users'));
        }

        return redirect(route('index'));
    }

    public function users()
    {
        return view('users', ['users' => User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // 'book' => Book::find(1)
       
        
        return view('show', ['user' => User::find($request->id), 'param' => 'book', 'books' => Book::where('user_id',$request->id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Book $book, User $user, Genre $genre)
    {   
        // dd(Book::find($request->book->id)->genres->attributes);
        if($request->param == 'book'){
            $items = array();
        foreach(Book::find($request->book->id)->genres as $genre){
            $items[] = $genre->name;
        }
        
        //  dd(Book::find($request->book->id)->genres);
        // dd(array_intersect(Book::find($request->book->id)->genres, Genre::all()));
        return view('edit', 
        [
        'items' => $items,
        'book' => Book::find($request->book->id),
        'user' => User::all(),
        'genres' => Genre::all(), 
        'param'=>'book']);
        }
        else
        {
            // dd(User::find($request->book)->first()->id);
            return view('edit', ['user' => User::find($request->book)->first(),'param'=>'user']);
        }

        

        // return view('edit', 
        // ['book' => Book::find($request->book->id), 
        // 'user' => User::find($request->user->id), 
        // 'genres' => Genre::find($request->genre->id), 
        // 'param'=>'book']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book, User $user)
    { 
        // $validated = $request->validate([
        //     'user_id' => 'required|min:1|max:2',
        //     'title' => 'required|string|min:3|max:50',
        //     'edition' => 'required|integer|min:1|max:9',
        //     'year' => 'required|integer|digits:4',
        //     'isbn' => 'required|integer|digits:8'
        // ]);
        

        if($request->param == 'book')
        {
            $book->timestamps = false;
            $book->update([
                'title' => $request->title,
                'edition' => $request->edition,
                'year' => $request->year,
                'isbn' => $request->isbn,
            ]);
            BookGenre::where('book_id',$request->book->id)->delete();
            if($request->data!=null){
                foreach($request->data as $genre){
                    $item = Genre::find($genre);
                    Book::find($request->book->id)->genres()->save($item);
                };
            };

            return redirect(route('index'));
        }
        else
        {
            
            $user = User::find($request->book)->first();
            $user->timestamps = false;
            $user->update([
                'role' => $request->role,
                'login' => $request->login,
                'email' => $request->email,
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'password' => bcrypt($request->password)
            ]);

            return redirect(route('users'));
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Book $book, User $user)
    {
        
        $param = $request->param;
        // dd($param);
        if ($param == "book") {          
            /* Удаление книги */
            $item = $book::find($request->id);
            $item->delete();
            return redirect(route('index'));
        } else {
            /* Удаление автора */
            // dd($request->id);
            foreach(User::find($request->id)->books as $book){
                $book->delete();
            }
            $item = $user::find($request->id);
            $item->delete();
            return redirect(route('users'));
        }
  
        // return redirect(route('index'));
    }
}
