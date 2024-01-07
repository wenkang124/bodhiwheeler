<?php

namespace App\Http\Controllers\Public;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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

    public function submitContact(Request $request)
    {
        // Google Recaptchat Validation
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('GOOGLE_RECAPTCHA_SECRET_KEY'),
            'response' => $request->get('g-recaptcha-response'),
        ]);

        if (!$response->json()['success']) {
            abort('401');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error', 'Fail submitted Enquiry. ' . $validator->errors()->first());
            return redirect()->back();
        }

        //TODO - Add Validation

        Mail::to('bodhiwheelers@gmail.com')->send(new \App\Mail\ContactUs\Enquiry($request->all()));

        //TODO - Add Alert
        Session::flash('success', 'Successfully submitted Enquiry.');
        return redirect()->back();
    }
}
