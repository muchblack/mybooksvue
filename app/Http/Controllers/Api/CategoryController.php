<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{
    //取得所有分類
    public function index()
    {
        $category = Categories::all()->toArray();

        foreach($category as &$item)
        {
            $item['parent_name'] = '本目錄為最上層目錄';
            //把上層目錄名稱撈出來
            if($item['book_category_parent_id'] != 0 )
            {
                $parent = Categories::find($item['book_category_parent_id']);
                $item['parent_name'] = $parent->book_category_name;
            }
        }

        return array_reverse($category);
    }

    //取得所有母層級分類
    public function getParentCategory()
    {
        $parent = Categories::where('book_category_parent_id',0)->get()->toArray();
        return $parent;
    }

    //取得該母層級下的所有分類
    public function getChildrenCategory($id)
    {
        $children = Categories::where('book_category_parent_id',$id)->get()->toArray();

        return $children;
    }

    //新增分類-動作
    public function store(Request $request)
    {
        $parent_check = $request->input('parent_check');
        $parent = 0;

        if($parent_check != 1 )
        {
            $parent = $request->input('parent_id');
        }

        $catagory = new Categories([
            'book_category_id' => $request->input('id'),
            'book_category_name' => $request->input('name'),
            'book_category_parent_id' => $parent
        ]);

        $catagory->save();

        return response()->json('已建立新分類');
    }

    //顯示單一分類
    public function show($id)
    {
        $category = Categories::find($id);
        return response()->json($category);
    }

    //更新單一分類
    public function update($id,Request $request)
    {
        $category = Categories::find($id);
        $parent_check = $request->input('parent_check');
        $parent_id = 0;
        if($parent_check != 1 )
        {
            $parent_id = $request->input('book_category_parent_id');
        }

        $category->book_category_id = $request->input('book_category_id');
        $category->book_category_name = $request->input('book_category_name');
        $category->book_category_parent_id = $parent_id;

        $category->save();

        return response()->json('分類更新成功');
    }

    //刪除該分類
    public function destory(Request $request)
    {

    }
}
