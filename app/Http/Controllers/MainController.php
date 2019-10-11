<?php

namespace App\Http\Controllers;

use App\Address;
use App\Models\About;
use App\Models\Bank;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\HomeSlider;
use App\Models\Offer;
use App\Models\Partner;
use App\Models\PreviousWork;
use App\Models\Service;
use App\Models\Team;
use App\Models\Testimonial;
use Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Cookie;
use Charts;
use Calendar;
use DB;
use App\User;

use Illuminate\Support\Facades\Auth;
use Grimthorr\LaravelToast\Toast;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public  function index(Request $request)
    {
        $homeSliders = HomeSlider::where('status', 'Active')->paginate(1000);
        $services = Service::where('status', 'Active')->paginate(1000);
        $previousWorks = PreviousWork::where('status', 'Active')->paginate(1000);
        $testimonials = Testimonial::where('status', 'Active')->paginate(1000);
        $partners = Partner::where('status', 'Active')->paginate(1000);
        $active = 'home';

        return view('main.landing.home', compact('homeSliders', 'services', 'previousWorks', 'testimonials', 'partners', 'active'));
    }

    public function about(Request $request)
    {
        $abouts = About::where('status', 'Active')->paginate(1000);
        $teams = Team::where('status', 'Active')->paginate(1000);
        $partners = Partner::where('status', 'Active')->paginate(1000);
        $contacts = Contact::all()->first()->paginate(1000);
        $active = 'about';
        return view('main.landing.about', compact('abouts', 'teams', 'partners', 'contacts', 'active'));
    }
    public function contact(Request $request)
    {
        $partners = Partner::where('status', 'Active')->paginate(1000);
        $contacts = Contact::all()->first()->paginate(1000);
        $active = 'contact';
        return view('main.landing.contact', compact('partners', 'contacts', 'active'));
    }

    public function gallery(Request $request)
    {
        $partners = Partner::where('status', 'Active')->paginate(1000);
        $galleries = Gallery::where('status', 'Active')->paginate(1000);
        $active = 'gallery';

        return view('main.landing.gallery', compact('partners', 'galleries', 'active'));
    }
    public function service(Request $request)
    {
        $partners = Partner::where('status', 'Active')->paginate(1000);
        $services = Service::where('status', 'Active')->paginate(1000);
        $offers = Offer::where('status', 'Active')->paginate(1000);
        $active = 'service';

        return view('main.landing.services', compact('partners', 'services', 'offers', 'active'));
    }
}
