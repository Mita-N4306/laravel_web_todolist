<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
  public function create() {
    return view('contact.create');
  }

  public function store() {
    $inputs = request()->validate([
        'title' => 'required|max:255',
        'email' => 'required|email|max:255',
        'body' => 'required|max:1000',
    ]);
    Contact::create($inputs);  //Contactテーブルに$inputs情報を元に作成する
    return back()->with('message','メールを送信しました');
  }
}
