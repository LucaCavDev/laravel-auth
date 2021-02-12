<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Mail\TestMail;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function sendMail(Request $request) {

        $data = $request -> validate([
    
            'text' => 'required|min:5'
        ]);

        Mail::to(Auth::user() -> email)
            -> send(new TestMail($data['text']));
        return redirect() -> back();


    }

    public function sendEmptyMail(Request $request) {


        Mail::to(Auth::user() -> email)
            -> send(new TestMail());

        return redirect() -> back();


    }

    public function updateUserIcon(Request $request) {

        $request -> validate([
            'icon' => 'required|file'
        ]);

        $image = $request -> file('icon');

        $ext = $image -> getClientOriginalExtension();
        $name = rand(100000, 9999999) . '_' . time(); 
        $destFile = $name . '.' . $ext;

        $file = $image -> storeAs('icon', $destFile, 'public');

        $user = Auth::user();
        $user -> icon = $destFile;
        $user -> save();

        //dd($image, $ext, $name, $destFile);
        return redirect() -> back();

    }


}
