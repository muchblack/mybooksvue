<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Books;

class BooksController extends Controller
{
    //取得所有書本
    public function index()
    {
        $books = Books::all()->toArray();

        return array_reverse($books);
    }

    //新增書本-動作
    public function store(Request $request)
    {
        $category = [
            'parent' => $request->input('main_category'),
            'children' => $request ->input('sub_category')
        ];
        $books = new Books([
            'books_ISBN' => $request->input('books_ISBN'),
            'books_ISBN13' => $request->input('books_ISBN13'),
            'books_category' => json_encode($category),
            'books_author' => $request->input('books_author'),
            'books_publisher' => $request->input('books_publisher'),
            'books_name' => $request->input('books_name'),
            'books_sub_title' => $request->input('books_sub_title'),
            'books_desc' => $request->input('books_desc'),
            'books_ver' => $request->input('books_ver'),
            'books_var_date' => $request->input('books_var_date'),
            'is_adult' => $request->input('is_adult'),
            'is_set' => $request->input('is_set'),
            'set_no' => $request->input('set_no'),
        ]);

        $books->save();

        return response()->json('新增書籍完成');
    }

    //顯示單本
    public function show($id)
    {
        $book = Books::find($id);
        $category = json_decode($book->books_category);
        $book->main_category = $category->parent;
        $book->sub_category = $category->children;

        return response()->json($book);
    }

    //更新單本
    public function update($id,Request $request)
    {
        $book = Books::find($id);

        $category = [
            'parent' => $request->input('main_category'),
            'children' => $request->input('sub_category')
        ];

        $book->books_category = json_encode($category);
        $book->books_author = $request->input('books_author');
        $book->books_publisher = $request->input('books_publisher');
        $book->books_name = $request->input('books_name');
        $book->books_sub_title = $request->input('books_sub_title');
        $book->books_desc = $request->input('books_desc');
        $book->books_ver = $request->input('books_ver');
        $book->books_var_date = $request->input('books_var_date');
        $book->is_adult = $request->input('is_adult');
        $book->is_set = $request->input('is_set');
        $book->set_no = $request->input('set_no');

        $book->save();

        return response()->json('書籍更新完成');
    }
    //刪除該本
    public function destory(Request $request)
    {

    }


}
