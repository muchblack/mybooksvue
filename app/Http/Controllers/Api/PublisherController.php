<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publishers;

class PublisherController extends Controller
{
    //
    public function index()
    {
        $publishers = Publishers::all()->toArray();

        return array_reverse($publishers);
    }

    public function store(Request $request)
    {
        $publishers = new Publishers([
            'publisher_name' => $request->input('publisher_name'),
        ]);

        $publishers->save();

        return response()->json('已建立新出版社');
    }

    public function show($id)
    {
        $publisher = Publishers::find($id);

        return response()->json($publisher);
    }

    public function update($id, Request $request)
    {
        $publisher = Publishers::find($id);
        $publisher->publisher_name = $request->input('publisher_name');
        $publisher->save();

        return response()->json('出版社已修改');
    }

    public function destory($id)
    {

    }
}
