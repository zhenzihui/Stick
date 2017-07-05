<?php

namespace App\Http\Controllers;

use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    protected $userRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->userRepository=new UserRepository();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=$this->userRepository->getRelations();
        return view('home',compact('users'));
    }
    public function allStick()
    {
        return view('all');
    }
    public function setInfo(Request $request)
    {
        Auth::user()->firstlogin='F';
        Auth::user()->save();
        $uri=$request->session()->get("intent");
       return redirect(url($uri));
    }
}
