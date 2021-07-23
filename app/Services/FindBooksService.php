<?php

namespace App\Services;
use voku\helper\HtmlDomParser;


class FindBooksService
{
    private $_ISBN;
    public function __construct($ISBN)
    {
        $this->_ISBN = $ISBN;
    }

    public function getBook()
    {
        $check = $check = substr($this->_ISBN,0,4);
        switch ($check)
        {
            case '9789':
                $result = $this->_getBookFromBooks();
                break;
            case '9784':
                $result = $this->_getBookFromAmazonJp();
                break;
        }

        return $result;
    }

    //取得中文代理書
    private function _getBookFromBooks()
    {
        //中文index轉英文
        $arr_index = [
            '書名' => 'books_name',
            '原文名稱' => 'books_ori_name',
            '語言' => 'books_lang',
            'ISBN' => 'books_isbn',
            '出版社' => 'books_publisher',
            '作者' => 'books_author',
            '譯者' => 'books_translator',
            '出版日期' => 'books_var_date',
            '類別' => 'books_type',
            '頁數' => 'books_page'
        ];

        //從ISBN撈出商品代碼
        $url = "https://search.books.com.tw/search/query/key/$this->_ISBN/cat/BKA";
        $item_result = $this->_getFromCurl($url);
        preg_match('/\/\d{10}\//',$item_result,$item_code);
        $item_code = str_replace('/','',$item_code[0]);

        //從商品代碼撈出書籍資訊
        $url = "https://www.books.com.tw/products/$item_code";
        $book_result = $this->_getFromCurl($url);
        preg_match('/name=\"description\".*.>/',$book_result, $match);
        //分割取回資訊
        $match = str_replace(' ','',$match[0]);
        $match = str_replace('">','',str_replace('name="description"content="','', $match));//移除 name="description"content=" ">
        //整理出必要資訊
        $arr_temp = explode('，',$match);
        $books = [];

        foreach ($arr_temp as $item)
        {
            $tmp_arr = explode('：',$item);
            $books[$arr_index[$tmp_arr[0]]] = $tmp_arr[1];
        }

        return $books;
    }

    //取得日文原文書
    private function _getBookFromAmazonJp()
    {
        $url = "https://www.amazon.co.jp/s?k=".$this->_ISBN;
        $books_result = $this->_getFromCurl($url);
        preg_match('/\/dp\/\d{10}/',$books_result,$match);

        $url = "https://www.amazon.co.jp".$match[0];

        $dom = HtmlDomParser::file_get_html($url);
        $books_name = $dom->getElementById('productTitle')->text(); //書名
        $arr_author = $dom->findMulti('#bylineInfo')->find('a')->text();
        if(count($arr_author) > 1)
        {
            unset($arr_author[count($arr_author)-1]);
        }
        $books_author = implode(',', $arr_author); //作者
        $arr_other = $dom->findMulti('.rpi-attribute-value')->text();
        $books_publisher = $arr_other[2]; //出版社
        $books_var_date = $arr_other[3]; //出版日期

        $books = [
            'books_name' => $books_name,
            'books_ori_name' => $books_name,
            'books_author' => $books_author,
            'books_publisher' => $books_publisher,
            'books_var_date' => $books_var_date,
        ];

        return $books;
    }

    private function _getFromCurl($url)
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
