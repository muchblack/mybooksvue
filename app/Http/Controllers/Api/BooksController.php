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
            'is_audit' => $request->input('is_audit'),
            'is_set' => $request->input('is_set'),
            'set_no' => $request->input('set_no'),
        ]);

        $books->save();

        return response()->json('新增書籍完成');
    }

    //顯示單本
    public function show()
    {

    }

    //更新單本
    public function update(Request $request)
    {

    }

    //刪除該本
    public function destory(Request $request)
    {

    }


}
