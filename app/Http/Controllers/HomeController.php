<?php

namespace App\Http\Controllers;
use IlluminateDatabaseEloquentModelNotFoundException;
use App\Distributor;
use Illuminate\Http\Request;
use App\Package;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;

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
        return view('home');
    }
    public function distributor ()
     {


        $packages= Distributor::orderby('created_at','DESC')->where('distributor_id',Auth::id())->get();
// dd($packages->count());
        return view('distributor.home',['pack'=>$packages]);
    }
//management
    public function management ()
     {
        return view('management.index');
    }

    //admin
    public function admin ()
    {
        $hotels= User::where('role_id',3)->get();
        // dd($hotels);
       return view('admin.hotels.index' ,['hotels'=>$hotels]);
   }

   public function store ()
   {
      return view('store.index');
  }
}
