<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\FindBooksService;
use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Categories;
use App\Models\Publishers;

class BooksController extends Controller
{
    //取得所有書本
    public function index()
    {
        $books = Books::all()->toArray();

        foreach ($books as &$item)
        {
            $categories = json_decode($item['books_category']);
            $item['main_category'] = Categories::find($categories->parent)->book_category_name;
            $item['sub_category'] = Categories::find($categories->children)->book_category_name;
        }

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
            'books_category' => json_encode($category),
            'books_author' => $request->input('books_author'),
            'books_publisher' => $request->input('books_publisher'),
            'books_name' => $request->input('books_name'),
            'books_ori_name' => $request->input('books_ori_name'),
            'books_var_date' => $request->input('books_var_date'),
            'is_adult' => $request->input('is_adult'),
            'is_set' => $request->input('is_set'),
            'set_no' => $request->input('set_no'),
        ]);

        $books->save();

        return response()->json($books);
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
        $book->books_ori_name = $request->input('books_ori_name');
        $book->books_var_date = $request->input('books_var_date');
        $book->is_adult = $request->input('is_adult');
        $book->is_set = $request->input('is_set');
        $book->set_no = $request->input('set_no');

        $book->save();

        return response()->json('書籍修改完成');
    }
    //刪除該本
    public function destory(Request $request)
    {

    }

    //從取得書籍相關資料
    public function getBooksDetail($ISBN)
    {
        $getBooks = new FindBooksService($ISBN);
        $books = $getBooks->getBook();

        return response()->json($books);
    }

    private function _getCurl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        $data = curl_exec($ch);

        curl_close($ch);

        return $data;

    }


}
