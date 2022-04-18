<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Product;
class HomeController extends Controller
{
    public function index()
    {
        //return view('home.index');

        $data = product::all();
        return view('home.index', compact('data'));
    }
    public function about()
    {
        return view('home.about');
    }

    public function professor()
    {
        $professor= DB::table('users')
        ->where('user_type', '=', 'professor')

        ->get();
        return view('home.professor',compact('professor'));
    }
}
