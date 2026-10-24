<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact');
    }

    public function submitForm(ContactRequest $request)
    {
        $data = $request->validated();
        try {
            Mail::to(env('ADMIN_EMAIL'))->send(new ContactMail($data));
        } catch (\Exception $e) {
            \Log::error('メール送信エラー: ' . $e->getMessage());
            return back()->with('error', 'メール送信に失敗しました。もう一度お試しください。');
        }
        return redirect()->route('index')->with('success', 'お問い合わせが送信されました！');
    }
}
