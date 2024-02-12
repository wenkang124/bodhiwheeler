<?php

namespace App\Http\Controllers\Public;


use App\Models\Booking;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Services\BookingPriceCalculation;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $bookingPriceCalculator;

    public function __construct(BookingPriceCalculation $bookingPriceCalculator)
    {
        $this->bookingPriceCalculator = $bookingPriceCalculator;
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
        $packages = Package::all();
        return view('public.booking', compact('packages'));
    }
    public function submitBooking(Request $request)
    {
        // Google Recaptchat Validation
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('GOOGLE_RECAPTCHA_SECRET_KEY'),
            'response' => $request->get('g-recaptcha-response'),
        ]);

        if (!$response->json()['success']) {
            abort('401');
        }

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string',
                'phone' => ['required', 'string', 'max:20', 'regex:/^[0-9]+$/'],
                'pick_up_date' => 'required|date|after_or_equal:today',
                'pick_up_time' => 'required|date_format:H:i',
                'return_time' => $request->input('active_tab') === "Return" ? 'required|date_format:H:i|after:pick_up_time' : 'nullable|date_format:H:i',
                'no_of_charter_hours' => $request->input('active_tab') === "Charter" ? 'required|integer|min:3' : 'nullable|integer',
                'pick_up_address' => 'required|string',
                'drop_off_address' => 'required|string',
                'no_of_passenger' => 'required|integer',
                'no_of_wheelchair_pax' => 'required|integer',
                'package_id' => 'required|exists:packages,id',
            ],
            [
                'return_time.after' => "Return time must be a time after pick up time.",
                 'no_of_charter_hours.min' => 'The number of charter hours must be at least 3.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, $request->package_id)
                ->withInput();
        }

        $package = Package::find($request->package_id);

        $booking = new Booking([
            'name' => $request->name,
            'phone' => $request->phone,
            'pick_up_date' => $request->pick_up_date,
            'pick_up_time' => $request->pick_up_time,
            'return_time' => $request->return_time,
            'no_of_charter_hours' => $request->no_of_charter_hours,
            'pick_up_address' => $request->pick_up_address,
            'drop_off_address' => $request->drop_off_address,
            'no_of_passenger' => $request->no_of_passenger,
            'no_of_wheelchair_pax' => $request->no_of_wheelchair_pax,
            'package_name' => $package->name,
            'medical_escort' => $request->has('medical_escort') && $request->input('medical_escort') == '1',
            //Tempo Variable
            'distance' => 10,
        ]);

        $booking->package()->associate($package);

        $booking->save();

        //Booking Total Price Calculation
       $this->bookingPriceCalculator->calculatePrice($package->id, $booking);

        return view('public.booking-confirmation', ['booking' => $booking]);
    }

    public function bookingConfirmation(Request $request)
    {
        // Google Recaptchat Validation
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('GOOGLE_RECAPTCHA_SECRET_KEY'),
            'response' => $request->get('g-recaptcha-response'),
        ]);

        if (!$response->json()['success']) {
            abort('401');
        }

        $validator = Validator::make(
            $request->all(),
            [
                'booking_id' => 'required|exists:bookings,id',
            ],
        );

        if ($validator->fails()) {
            Session::flash('error', 'Fail submitted Enquiry. ' . $validator->errors()->first());
        }

        $booking = Booking::find($request->booking_id);
        $booking->status = "submitted";
        $booking->update();

        if (env('APP_ENV') === 'production') {
            Mail::to('bodhiwheelers@gmail.com')->send(new \App\Mail\Booking\BookingConfirmation($booking));
        }

        return view('public.success-booking');
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

        if (env('APP_ENV') === 'production') {
            Mail::to('bodhiwheelers@gmail.com')->send(new \App\Mail\ContactUs\Enquiry($request->all()));
        }


        Session::flash('success', 'Successfully submitted Enquiry.');
        return redirect()->back();
    }
}
