<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $exists = false;
        if(auth()->check() && Portfolio::query()->where('user_id',auth()->id())->exists()){
            $exists  = true;
        }
        $page = Portfolio::query()->where('user_id',auth()->id())->paginate(15);
        return view('index',compact('exists','page'));
    }

    public function master($username){
        $data = User::query()->where('name',$username)->with('portfolio')->first();
        return view('_master',compact('data'));
    }
}
