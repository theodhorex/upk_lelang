<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postingan;
use App\Models\BidData;
use App\Models\Massage;
use App\Models\Activity;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Postingan::latest()->limit(4)->get();
        $activity = Activity::latest()->limit(4)->get();
        return view('pages/home', compact(['data', 'activity']));
    }

    public function perform()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('login');
    }
}