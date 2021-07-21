<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Members;

class LoginController extends Controller
{
    //

    public function login(Request $request)
    {
        $user = Members::where('member_name',$request->input('member_name'))->first();
        if($user)
        {
            $user = $user->toArray();
            if(Hash::check($request->input('member_pwd'), $user['member_pwd'])){
                return response(json_encode($user),200);
            }
        }

        return response(json_encode(['Msg'=> '使用者或是帳號不對']), 401);
    }
}
