<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UsersRequest;
use App\Models\Users;


class UsersController extends Controller
{
    // アカウント編集画面　ーーーーーーーーーーーーーーーーーーーーーーー
    public function edit($id)
    {
        $user = Users::findOrFail($id);

        return view('account_edit', compact('user'));
    }

    public function update(UsersRequest $request, $id)
    {
        $validatedData = $request->validated();

        $user = Users::findOrFail($id);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->name_kanji = $validatedData['name_kanji'];
        $user->name_kana = $validatedData['name_kana'];

        $user->save();

        return redirect()->route('mypage')->with('souccess', 'アカウント情報を更新しました。');
    }
}
