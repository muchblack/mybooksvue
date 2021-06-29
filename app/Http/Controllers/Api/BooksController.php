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

    //新增書本-界面
    public function create()
    {

    }

    //新增書本-動作
    public function store(Request $request)
    {

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
