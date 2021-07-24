<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Course;
use App\Models\Diploma;
use App\Models\Lesson;
use App\Models\Quesstion;
use App\Models\Schedule;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainerController extends Controller
{
    public function tcourses()
    {
        $data = User::join('courses', 'users.id', '=', 'courses.teachers')
        ->where('courses.teachers',Auth::user()->id)
        ->orwhere('courses.user_id',Auth::user()->id)
        ->get();
        $catagory = Category::all();
        return view ('trainer.courses.index',compact('data','catagory'));
    }
    public function tadd_courses()
    {
        $catagory = Category::all();
        return view ('trainer.courses.add',compact('catagory'));
    }
    public function tcreate_courses(Request $request)
    {
        $inputs = $request->all();
        // dd($inputs);
        $user = Auth::user()->id;
        $inputs["user_id"]=$user;
        $inputs["teachers"]=$user;
        Course::create($inputs);
        return redirect()->route('tcourses')->with('message', 'Data Created Successfully!');
    }

    public function tedit_courses($id)
    {
        
        $catagory = Category::all();
        $data = Course::find($id);
        // dd($data);
        return view ('trainer.courses.edit',compact('data','catagory',));
    }
    public function tupdate_courses(Request $request , $id)
    {
        $inputs = $request->except(['_token']);
        Course::where('id', $id)->update($inputs);
        return redirect()->route('tcourses')->with('message', 'Data Updated Successfully!');
    }
    public function tdestroy_courses($id)
    {
        Course::find($id)->delete();
        return response()->json(array('success' => true));
    }
    public function tfeature_courses($id)
    {
        $data = Course:: where('id',$id)->first();
        // dd($data);
        if(isset($data) && $data->published == 0)
        {
            Course::where('id', $id)->update(['published' => 1]);
        }
        else{
        Course::where('id', $id)->update(['published' => 0]);
    }
        return response()->json(array('success' => true));
    }
    public function tdiploma()
    {
        $data = User::join('diplomas', 'users.id', '=', 'diplomas.user_id')
        ->orwhere('diplomas.user_id',Auth::user()->id)
        ->get();
        $catagory = Category::all();
        return view ('trainer.diploma.index',compact('data','catagory'));
    }
    public function tadd_diploma()
    {
        $courses = Course::all();
        $catagory = Category::all();
        $abody = User::where('roll_id',3)->get();
        return view ('trainer.diploma.add',compact('courses','catagory','abody'));
    }
    public function tcreate_diploma(Request $request)
    {
        $inputs = $request->all();
        // dd($inputs);
        $user = Auth::user()->id;
        $inputs["user_id"]=$user;
        Diploma::create($inputs);
        return redirect()->route('tdiploma')->with('message', 'Data Created Successfully!');
    }
    public function tedit_diploma($id)
    {
        $cour = Course::all();
        $catagory = Category::all();
        $abody = User::where('roll_id',3)->get();
        $data = Diploma::find($id);
        // dd($data);
        return view ('trainer.diploma.edit',compact('data','cour','catagory','abody'));
    }
    public function tupdate_diploma(Request $request , $id)
    {
        $inputs = $request->except(['_token']);
        Diploma::where('id', $id)->update($inputs);
        return redirect()->route('tdiploma')->with('message', 'Data Updated Successfully!');
    }
    public function tdestroy_diploma($id)
    {
        Course::find($id)->delete();
        return response()->json(array('success' => true));
    }

    public function tlessons(Request $request)
    {

        $data = $request->all();
        // dd($data);
        $lesson = Course::join('lessons', 'courses.id', '=', 'lessons.course_id')
        ->where('lessons.course_id',$data)
        ->where('lessons.live_lesson', 0)
        ->get();
        // dd($lesson);
        $course = User::join('courses', 'users.id', '=', 'courses.teachers')
        ->where('courses.teachers',Auth::user()->id)
        ->orwhere('courses.user_id',Auth::user()->id)
        ->get();
        return view ('trainer.lesson.index',compact('course','lesson'));
    }
    public function tadd_lessons()
    {
        $course = User::join('courses', 'users.id', '=', 'courses.teachers')
        ->where('courses.teachers',Auth::user()->id)
        ->orwhere('courses.user_id',Auth::user()->id)
        ->get();
        return view ('trainer.lesson.add',compact('course'));
    }
    public function tcreate_lessons (Request $request)
    {
        $inputs = $request->all();
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        Lesson::create($inputs);
        return redirect()->route('tlessons')->with('message','Data created successfully!');
    }
    public function tedit_lessons($id)
    {
        $course = User::join('courses', 'users.id', '=', 'courses.teachers')
        ->where('courses.teachers',Auth::user()->id)
        ->orwhere('courses.user_id',Auth::user()->id)
        ->get();
        $data = Lesson::find($id);
        // dd($data);
        return view ('trainer.lesson.edit',compact('data','course'));
    }
    public function tupdate_lessons(Request $request , $id)
    {
        $inputs = $request->except(['_token']);
        Lesson::where('id', $id)->update($inputs);
        return redirect()->route('tlessons')->with('message', 'Data Updated Successfully!');
    }
    public function tdestroy_lessons($id)
    {
        Lesson::find($id)->delete();
        return response()->json(array('success' => true));
    }
    public function tlive_lessons(Request $request)
    {

        $data = $request->all();
        // dd($data);
        $lesson = Course::join('lessons', 'courses.id', '=', 'lessons.course_id')
        ->where('courses.id',$data)
        ->where('lessons.live_lesson', 1)
        ->get();
        //  dd($lesson);
        $course = User::join('courses', 'users.id', '=', 'courses.teachers')
        ->where('courses.teachers',Auth::user()->id)
        ->orwhere('courses.user_id',Auth::user()->id)
        ->get();
        return view ('trainer.livelesson.index',compact('course','lesson'));
    }
    public function tadd_live_lessons()
    {
        $course = User::join('courses', 'users.id', '=', 'courses.teachers')
        ->where('courses.teachers',Auth::user()->id)
        ->orwhere('courses.user_id',Auth::user()->id)
        ->get();
        return view ('trainer.livelesson.add',compact('course'));
    }
    public function tcreate_live_lessons (Request $request)
    {
        $inputs = $request->all();
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        $inputs["live_lesson"] = 1;
        Lesson::create($inputs);
        return redirect()->route('tlive_lessons')->with('message','Data created successfully!');
    }
    public function tedit_live_lessons($id)
    {
        $course = User::join('courses', 'users.id', '=', 'courses.teachers')
        ->where('courses.teachers',Auth::user()->id)
        ->orwhere('courses.user_id',Auth::user()->id)
        ->get();
        $data = Lesson::find($id);
        // dd($data);
        return view ('trainer.livelesson.edit',compact('data','course'));
    }
    public function tupdate_live_lessons(Request $request , $id)
    {
        $inputs = $request->except(['_token']);
        Lesson::where('id', $id)->update($inputs);
        return redirect()->route('tlive_lessons')->with('message', 'Data Updated Successfully!');
    }
    public function tdestroy_live_lessons($id)
    {
        Lesson::find($id)->delete();
        return response()->json(array('success' => true));
    }
    public function tlive_lesson_slots(Request $request)
    {

        $data = $request->all();
        // dd($data);
        $lesson = Lesson::join('schedules', 'lessons.id', '=', 'schedules.lesson_id')
        ->where('lessons.id',$data)
        ->where('lessons.live_lesson', 1)
        ->get();
        //  dd($lesson);
         $getlesson = User::join('lessons', 'users.id', '=', 'lessons.user_id')
        ->where('lessons.user_id',Auth::user()->id)
        ->orwhere('lessons.user_id',Auth::user()->id)
        ->get();
        return view ('trainer.schedulelesson.index',compact('getlesson','lesson'));
    }
    public function tadd_live_lesson_slots()
    {
        $course = User::join('lessons', 'users.id', '=', 'lessons.user_id')
        ->where('lessons.user_id',Auth::user()->id)
        ->orwhere('lessons.user_id',Auth::user()->id)
        ->get();
        return view ('trainer.schedulelesson.add',compact('course'));
    }
    public function tcreate_live_lesson_slots (Request $request)
    {
        $inputs = $request->all();
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        $inputs["password"]=Hash::make($inputs['password']);
        Schedule::create($inputs);
        return redirect()->route('tlive_lesson_slots')->with('message','Data created successfully!');
    }
    public function tedit_live_lesson_slots($id)
    {
        // dd($id);
         $getlesson = User::join('lessons', 'users.id', '=', 'lessons.user_id')
        ->where('lessons.user_id',Auth::user()->id)
        ->orwhere('lessons.user_id',Auth::user()->id)
        ->get();
        $data = Schedule::find($id);
        // dd($data);
        return view ('trainer.schedulelesson.edit',compact('data','getlesson'));
    }
    public function tupdate_live_lesson_slots(Request $request , $id)
    {
        $inputs = $request->except(['_token']);
        Schedule::where('id', $id)->update($inputs);
        return redirect()->route('tlive_lesson_slots')->with('message', 'Data Updated Successfully!');
    }
    public function tdestroy_live_lesson_slots($id)
    {
        Schedule::find($id)->delete();
        return response()->json(array('success' => true));
    }
    public function ttests(Request $request)
    {

        $data = $request->all();
        // dd($data);
        $test = Course::join('tests', 'courses.id', '=', 'tests.course_id')
        ->where('courses.id',$data)
        ->where('tests.user_id', Auth::user()->id)
        ->get();
        //  dd($lesson);
        $course = User::join('courses', 'users.id', '=', 'courses.teachers')
        ->where('courses.teachers',Auth::user()->id)
        ->orwhere('courses.user_id',Auth::user()->id)
        ->get();
        return view ('trainer.test.index',compact('course','test'));
    }
    public function tadd_test()
    {
        $course = User::join('courses', 'users.id', '=', 'courses.teachers')
        ->where('courses.teachers',Auth::user()->id)
        ->orwhere('courses.user_id',Auth::user()->id)
        ->get();
         $lesson = User::join('lessons', 'users.id', '=', 'lessons.user_id')
        ->where('lessons.user_id',Auth::user()->id)
        ->orwhere('lessons.user_id',Auth::user()->id)
        ->get();
        // $lesson = Lesson::all();
        return view ('trainer.test.add',compact('course','lesson'));
    }
    public function tcreate_test (Request $request)
    {
        $inputs = $request->all();
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        // dd($inputs);
        Test::create($inputs);
        return redirect()->route('ttests')->with('message','Data created successfully!');
    }
    public function tedit_test($id)
    {
        $course = User::join('courses', 'users.id', '=', 'courses.teachers')
        ->where('courses.teachers',Auth::user()->id)
        ->orwhere('courses.user_id',Auth::user()->id)
        ->get();
        $lesson = User::join('lessons', 'users.id', '=', 'lessons.user_id')
        ->where('lessons.user_id',Auth::user()->id)
        ->orwhere('lessons.user_id',Auth::user()->id)
        ->get();
        $data = Test::find($id);
        // dd($data);
        return view ('trainer.test.edit',compact('data','course','lesson'));
    }
    public function tupdate_test(Request $request , $id)
    {
        $inputs = $request->except(['_token']);
        Test::where('id', $id)->update($inputs);
        return redirect()->route('ttests')->with('message', 'Data Updated Successfully!');
    }
    public function tdestroy_test($id)
    {
        Test::find($id)->delete();
        return response()->json(array('success' => true));
    }
    
    public function taccount()
    {
        $data = User::where('id',Auth::user()->id)
        ->first();
        return view ('trainer.account.account',compact('data'));
    }
    public function tupdate_account (Request $request , $id)
    {
        $pfilename = "";
        $pasfilename = "";
        $idfilename = "";
        $cvfilename = "";
        if( $request->hasFile('avatar_location') && $request->hasFile('passport') && $request->hasFile('photo_academic_degree') && $request->hasFile('cv'))
                {
                    $image = $request->file('avatar_location');
                    $path = public_path(). '/upload/personal/';
                    $pfilename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move($path, $pfilename);
                    $request->avatar_location = $pfilename ;
                    // dd($pfilename);

                    $image = $request->file('passport');
                    $path = public_path(). '/upload/passport/';
                    $pasfilename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move($path, $pasfilename);
                    $request->passport = $pasfilename ;
                    // dd($pasfilename);

                    $image = $request->file('photo_academic_degree');
                    $path = public_path(). '/upload/acadamic/';
                    $idfilename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move($path, $idfilename);
                    $request->photo_academic_degree = $idfilename ;

                    $image = $request->file('cv');
                    $path = public_path(). '/upload/cv/';
                    $cvfilename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move($path, $cvfilename);
                    $request->cv = $cvfilename ;

                    $inputs = $request->except(['_token']);
                    $inputs["passport"] = $pasfilename;
                    $inputs["avatar_location"] = $pfilename;
                    $inputs["photo_academic_degree"] = $idfilename;
                    $inputs["cv"] = $cvfilename;
                    // dd($inputs);
                    User::where('id',$id)->update($inputs);
                }
        elseif( $request->hasFile('passport') && $request->hasFile('photo_academic_degree') && $request->hasFile('cv') )
                {
                    $image = $request->file('passport');
                    $path = public_path(). '/upload/passport/';
                    $pasfilename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move($path, $pasfilename);
                    $request->passport = $pasfilename ;
                    // dd($pfilename);

                    $image = $request->file('photo_academic_degree');
                    $path = public_path(). '/upload/acadamic/';
                    $idfilename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move($path, $idfilename);
                    $request->photo_academic_degree = $idfilename ;
                    // dd($pasfilename);

                    $image = $request->file('cv');
                    $path = public_path(). '/upload/id/';
                    $cvfilename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move($path, $cvfilename);
                    $request->cv = $cvfilename ;

                    $inputs = $request->except(['_token']);
                    $inputs["passport"] = $pasfilename;
                    $inputs["photo_academic_degree"] = $idfilename;
                    $inputs["cv"] = $cvfilename;
                    // dd($inputs);
                    User::where('id',$id)->update($inputs);
                }
        elseif( $request->hasFile('photo_academic_degree') && $request->hasFile('passport'))
                {
                    $image = $request->file('photo_academic_degree');
                    $path = public_path(). '/upload/acadamic/';
                    $idfilename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move($path, $idfilename);
                    $request->photo_academic_degree = $idfilename ;
                    // dd($pfilename);

                    $image = $request->file('passport');
                    $path = public_path(). '/upload/passport/';
                    $pasfilename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move($path, $pasfilename);
                    $request->passport = $pasfilename ;
                    // dd($pasfilename);

                    $inputs = $request->except(['_token']);
                    $inputs["passport"] = $pasfilename;
                    $inputs["photo_academic_degree"] = $pfilename;
                    // dd($inputs);
                    User::where('id',$id)->update($inputs);
                }
        elseif( $request->hasFile('passport') && $request->hasFile('cv'))
                {
                    $image = $request->file('passport');
                    $path = public_path(). '/upload/passport/';
                    $pasfilename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move($path, $pasfilename);
                    $request->passport = $pasfilename ;

                    $image = $request->file('cv');
                    $path = public_path(). '/upload/cv/';
                    $cvfilename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move($path, $cvfilename);
                    $request->cv = $cvfilename ;

                    $inputs = $request->except(['_token']);
                    $inputs["passport"] = $pasfilename;
                    $inputs["cv"] = $cvfilename;
                    // dd($inputs);
                    User::where('id',$id)->update($inputs);
                }
        elseif( $request->hasFile('passport'))
                {
                    $image = $request->file('passport');
                    $path = public_path(). '/upload/passport/';
                    $pasfilename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move($path, $pasfilename);
                    $request->passport = $pasfilename ;
                    // dd($pasfilename);
                    $inputs = $request->except(['_token']);
                    $inputs["passport"] = $pasfilename;
        //  dd($inputs);
        User::where('id',$id)->update($inputs);
                }
        elseif( $request->hasFile('avatar_location'))
                {
                    $image = $request->file('avatar_location');
                    $path = public_path(). '/upload/personal/';
                    $pfilename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move($path, $pfilename);
                    $request->avatar_location = $pfilename ;
                    // dd($pfilename);
                    $inputs = $request->except(['_token']);
                    $inputs["avatar_location"] = $pfilename;
        //  dd($inputs);
                    User::where('id',$id)->update($inputs);
                }
        elseif( $request->hasFile('photo_academic_degree'))
                {
                    $image = $request->file('photo_academic_degree');
                    $path = public_path(). '/upload/acadamic/';
                    $idfilename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move($path, $idfilename);
                    $request->photo_academic_degree = $idfilename ;
                    // dd($idfilename);
                    $inputs = $request->except(['_token']);
                    $inputs["photo_academic_degree"] = $idfilename;
        //  dd($inputs);
                    User::where('id',$id)->update($inputs);
                }
        elseif( $request->hasFile('cv'))
                {
                    $image = $request->file('cv');
                    $path = public_path(). '/upload/cv/';
                    $cvfilename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move($path, $cvfilename);
                    $request->cv = $cvfilename ;
                    // dd($cvfilename);
                    $inputs = $request->except(['_token']);
                    $inputs["cv"] = $cvfilename;
        //  dd($inputs);
                     User::where('id',$id)->update($inputs);
                }
        else
                {
                    $inputs = $request->except(['_token']);
                    User::where('id',$id)->update($inputs);
                }

        return redirect()->route('taccount')->with('message', 'Data Updated Successfully!');
    }
    public function tquestions(Request $request)
    {

        $data = $request->all();
        // dd($data);
        $quest = Quesstion::join('tests', 'tests.id', '=', 'quesstions.test')
        ->where('quesstions.test',$data)
        ->orwhere('quesstions.user_id',Auth::user()->id)
        ->get();
        //  dd($lesson);
        // $quest = Quesstion::all();
        $gettest = User::join('tests', 'users.id', '=', 'tests.user_id')
        ->where('tests.user_id',Auth::user()->id)
        ->get();
        // $gettest = Test::all();
        return view ('trainer.question.index',compact('gettest','quest'));
    }
    public function tadd_question(Request $request)
    {
          //  if(isset($request))
   //  {
        // dd($request->all());
   // }
   if(isset($request->course_id))
   {
    $lesson = Lesson::join('courses', 'lessons.course_id', '=', 'courses.id')
   ->where('lessons.course_id',$request->course_id)
   ->select('lessons.title','lessons.id')
   ->get();

   return response()->json($lesson) ;
   }
   elseif(isset($request->lesson_id))
   {
   $test = Test::join('lessons', 'tests.lesson_id', '=', 'lessons.id')
   ->where('tests.lesson_id',$request->lesson_id)
   ->select('tests.title','tests.id')
   ->get();

   return response()->json($test) ;
   }
   $course = User::join('courses', 'users.id', '=', 'courses.teachers')
        ->where('courses.teachers',Auth::user()->id)
        ->orwhere('courses.user_id',Auth::user()->id)
        ->get();
   return view ('trainer.question.add',compact('course'));
    }
    public function tcreate_question (Request $request)
    {

        $filename = "";

        if( $request->hasFile('question_image'))
                {
                    $image = $request->file('question_image');
                    $path = public_path(). '/upload/qimage/';
                    $filename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move($path, $filename);
                    $request->question_image = $filename ;
                }
        $inputs = $request->all();
        $inputs["question_image"] = $filename;
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        // dd($inputs);
        Quesstion::create($inputs);

        return redirect()->route('tquestions')->with('message','Data created successfully!');
    }
    public function tedit_question(Request $request ,$id)
    {
        if(isset($request->course_id))
   {
    $lesson = Lesson::join('courses', 'lessons.course_id', '=', 'courses.id')
   ->where('lessons.course_id',$request->course_id)
   ->select('lessons.title','lessons.id')
   ->get();

   return response()->json($lesson) ;
   }
   elseif(isset($request->lesson_id))
   {
   $test = Test::join('lessons', 'tests.lesson_id', '=', 'lessons.id')
   ->where('tests.lesson_id',$request->lesson_id)
   ->select('tests.title','tests.id')
   ->get();

   return response()->json($test) ;
   }
   $quest = Quesstion::find($id);
//    dd($quest);
   $course = Course::all();
   return view ('trainer.question.edit',compact('course','quest'));
    }
    public function tupdate_question(Request $request , $id)
    {
        $filename = "";

        if( $request->hasFile('question_image'))
                {
                    $image = $request->file('question_image');
                    $path = public_path(). '/upload/qimage/';
                    $filename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move($path, $filename);
                    $request->question_image = $filename ;
                }
        $inputs = $request->except(['_token']);
        $inputs["question_image"] = $filename;
        // dd($inputs);
        Quesstion::where('id', $id)->update($inputs);
        return redirect()->route('tquestions')->with('message', 'Data Updated Successfully!');
    }
    public function tdestroy_question($id)
    {
        Quesstion::find($id)->delete();
        return response()->json(array('success' => true));
    }

}
