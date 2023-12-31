<?php

namespace App\Http\Controllers\Public;


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
        return view('public.home');
    }

    public function aboutUs()
    {
        return view('public.about-us');
    }

    public function services()
    {
        return view('public.services');
    }

    public function booking()
    {
        return view('public.booking');
    }

    public function pricing()
    {
        return view('public.pricing');
    }

    public function faq()
    {
        return view('public.faq');
    }

    public function contact()
    {
        return view('public.contact');
    }
}
