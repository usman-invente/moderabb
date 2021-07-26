<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Contact;
use App\Models\Course;
use App\Models\Newsletter;
use App\Models\User;
use App\Models\CourseReview;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WebSiteController extends Controller
{
    public function index()
    {
        return view('WebSite.home');
    }
    public function create_newsletter(Request $request)
    {
        $inputs = $request->all();
        Newsletter::create($inputs);
        return redirect()->route('Home')->with('message', 'You have subscribed successfully!');
    }
    public function contact_us()
    {
        return view('WebSite.contact');
    }
    public function create_contact_us(Request $request)
    {
        $inputs = $request->all();
        Contact::create($inputs);
        return redirect()->route('contact_us')->with('message', 'Thank you for Contact Us!');
    }
    public function trainers()
    {
        return view('WebSite.trainer_register');
    }
    public function create_trainers(Request $request)
    {
        // dd($request);
        $pfilename = "";
        $pasfilename = "";
        $idfilename = "";
        $cvfilename = "";
        if ($request->hasFile('avatar_location')) {
            $image = $request->file('avatar_location');
            $path = public_path() . '/upload/personal/';
            $pfilename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $pfilename);
            $request->avatar_location = $pfilename;
        }
        if ($request->hasFile('passport')) {
            $image = $request->file('passport');
            $path = public_path() . '/upload/passport/';
            $pasfilename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $pasfilename);
            $request->passport = $pasfilename;
        }
        if ($request->hasFile('photo_academic_degree')) {
            $image = $request->file('photo_academic_degree');
            $path = public_path() . '/upload/acadamic/';
            $idfilename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $idfilename);
            $request->photo_academic_degree = $idfilename;
        }
        if ($request->hasFile('cv')) {
            $image = $request->file('cv');
            $path = public_path() . '/upload/cv/';
            $cvfilename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $cvfilename);
            $request->cv = $cvfilename;
        }
        $inputs = $request->all();
        $inputs["passport"] = $pasfilename;
        $inputs["avatar_location"] = $pfilename;
        $inputs["photo_academic_degree"] = $idfilename;
        $inputs["cv"] = $cvfilename;
        $inputs["roll_id"] = '0';
        $inputs["password"] = Hash::make($inputs['password']);
        User::create($inputs);
        return redirect()->back()->with('message','Trainer Created Successfully');
    }
    public function accreditation_bodies()
    {
        return view('WebSite.accreditation-bodies');
    }
    public function create_accreditation_bodies(Request $request)
    {
        $inputs = $request->all();
        $inputs["roll_id"] = '3';
        $inputs["password"] = Hash::make($inputs['password']);
        User::create($inputs);
        return redirect()->back()->with('message','Accreditation Bodies Created Successfully');
    }
    public function singleCourse($slug)
    {
        $course = DB::table('courses')
            ->join('users', 'courses.teachers', '=', 'users.id')
            ->join('categories', 'courses.category_id', '=', 'categories.id')
            ->where('courses.slug', $slug)
            ->select('users.title as name', 'users.avatar_location as image', 'courses.title as coursetitle', 'courses.course_image as course_image', 'courses.description as description', 'categories.name as category', 'courses.price as price', 'courses.duration as duration', 'courses.start_date as start_date', 'courses.start_date as start_date', 'courses.level as level', 'courses.voltage as voltage', 'courses.price_certificate as price_certificate','courses.id as id', 'courses.slug as slug')
            ->first();
        $course_reviews = DB::table('course_reviews')
            ->join('courses', 'course_reviews.course_id', '=', 'courses.id')
            ->get();
        return view('WebSite.singlecourse', compact('course','course_reviews'));
    }
    public function checkout($id)
    {
        return view('Website.checkout',compact('id'));
    }
    public function cart(Request $request, $slug)
    {
        
        $course = Course::where('slug', $slug)->first();
        $cart_course = Cart::where('ip_address',$request->ip())->get();
        $sum = 0;
        $certificate_price = 0;
        foreach($cart_course  as $cou){
            $sum+=  $cou->course_price;
            $certificate_price =   $certificate_price + $cou->certificate_price;
        }
        $percentage =  (15 / 100) * $sum;
        $total = $sum +   $certificate_price +  $percentage;
        $request->session()->put('total',$total);
        $request->session()->put('certificate',$certificate_price );
        if (Cart::where('course_id', $course->id)->where('ip_address',$request->ip())->exists()) {
            return view('Website.cart',compact('cart_course','percentage','sum','certificate_price','total'));
        } else {
            $cart = new Cart;
            $cart->course_id = $course->id;
            $cart->course_title = $course->title;
            $cart->course_price = $course->price;
            $cart->ip_address = $request->ip();
            $cart->start_date = $course->start_date;
            $cart->certificate_price = $course->price_certificate;
            $cart->course_image = $course->course_image;
            $cart->save();
            return view('Website.cart',compact('cart_course','percentage','sum','certificate_price'));
        }

    }
    public function deletecartproduct($id){
        try {
            Cart::find($id)->delete();
            return redirect()->back()->with('message','Product Remove From Cart Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','SomeThing Wrong');
        }
        
    }
    public function addReview(Request $request){
        try {
           $review = new CourseReview; 
           $review->course_id = $request->course_id;  
           $review->user_id = Auth::user()->id;
           $review->check_list =  $request->check_list;
           $review->review = $request->review; 
           $review->name =  $request->name;
           $review->email = $request->email;
           $review->save();
           return redirect()->back()->with('message','Course Review Added');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Some Thing Wrong');
        }
    }
    public function trainerJoin()
    {
        return view('Website.trainer_join');
    }

    public function advisoryBoard(){
        $boards = User::where('roll_id',3)->paginate(2);
        return view('Website.advisoryBoard',compact('boards'));
    }

    public function Forum(){
        return view('Website.forum');
    }
    
}
