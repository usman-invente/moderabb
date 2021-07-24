<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\User;
use App\Models\Course;
use App\Models\Diploma;
use App\Models\Lesson;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractorController extends Controller
{
    public function ccourses()
    {
        $data = User::join('courses', 'users.id', '=', 'courses.teachers')
        ->where('courses.eccbody_id',Auth::user()->id)
        ->get();
        $catagory = Category::all();
        return view ('contractor.courses.index',compact('data','catagory'));
    }
    // public function cadd_courses()
    // {
    //     $trainer = User::where('roll_id',2)->get();
    //     $catagory = Category::all();
    //     $abody = User::where('roll_id',3)->get();
    //     return view ('contractor.courses.add',compact('trainer','catagory','abody'));
    // }
    // public function ccreate_courses(Request $request)
    // {
    //     $inputs = $request->all();
    //     // dd($inputs);
    //     $user = Auth::user()->id;
    //     $inputs["user_id"]=$user;
    //     // $teacher = serialize($inputs['teachers']);
    //     // $inputs["teachers"] = $teacher;
    //     Course::create($inputs);
    //     return redirect()->route('ccourses')->with('message', 'Data Created Successfully!');
    // }

    public function cedit_courses($id)
    {
        $trainer = User::where('roll_id',2)->get();
        $catagory = Category::all();
        $abody = User::where('roll_id',3)->get();
        $data = Course::find($id);
        // dd($data);
        return view ('contractor.courses.edit',compact('data','trainer','catagory','abody'));
    }
    public function cupdate_courses(Request $request , $id)
    {
        $inputs = $request->except(['_token']);
        // $teacher = serialize($inputs['teachers']);
        // $inputs["teachers"] = $teacher;
        Course::where('id', $id)->update($inputs);
        return redirect()->route('ccourses')->with('message', 'Data Updated Successfully!');
    }
    public function cdestroy_courses($id)
    {
        Course::find($id)->delete();
        return response()->json(array('success' => true));
    }
    public function cfeature_courses($id)
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
    public function cdiploma()
    {
        $data = Diploma::join('categories', 'diplomas.category_id', '=', 'categories.id')
        ->where('diplomas.user_id',Auth::user()->id)
        ->get();
        return view ('contractor.diploma.index',compact('data'));
    }
    // public function cadd_diploma()
    // {
    //     $data = Diploma::join('categories', 'diplomas.category_id', '=', 'categories.id')
    //     ->get();
    //     $catagory = Category::all();
    //     return view ('contractor.diploma.add',compact('data','catagory'));
    // }
    // public function ccreate_diploma(Request $request)
    // {
    //     $inputs = $request->all();
    //     // dd($inputs);
    //     $user = Auth::user()->id;
    //     $inputs["user_id"]=$user;
    //     // $teacher = serialize($inputs['courses']);
    //     // $inputs["courses"] = $teacher;
    //     Diploma::create($inputs);
    //     return redirect()->route('cdiploma')->with('message', 'Data Created Successfully!');
    // }
    public function cedit_diploma($id)
    {
        $cour = Course::all();
        $catagory = Category::all();
        $abody = User::where('roll_id',3)->get();
        $data = Diploma::find($id);
        // dd($data);
        return view ('contractor.diploma.edit',compact('data','cour','catagory','abody'));
    }
    public function cupdate_diploma(Request $request , $id)
    {
        $inputs = $request->except(['_token']);
        // $teacher = serialize($inputs['courses']);
        // $inputs["courses"] = $teacher;
        Diploma::where('id', $id)->update($inputs);
        return redirect()->route('cdiploma')->with('message', 'Data Updated Successfully!');
    }
    public function cdestroy_diploma($id)
    {
        Course::find($id)->delete();
        return response()->json(array('success' => true));
    }

    public function clessons(Request $request)
    {

        $data = $request->all();
        // dd($data);
        $lesson = Course::join('lessons', 'courses.id', '=', 'lessons.course_id')
        ->where('courses.id',$data)
        ->where('lessons.live_lesson', 0)
        ->get();
        //  dd($lesson);
        $course = User::join('courses', 'users.id', '=', 'courses.teachers')
        ->where('courses.eccbody_id',Auth::user()->id)
        ->get();
        return view ('contractor.lesson.index',compact('course','lesson'));
    }
    // public function cadd_lessons()
    // {
    //     $course = Course::all();
    //     return view ('contractor.lesson.add',compact('course'));
    // }
    // public function ccreate_lessons (Request $request)
    // {
    //     $inputs = $request->all();
    //     $user = Auth::user()->id;
    //     $inputs["user_id"] = $user;
    //     Lesson::create($inputs);
    //     return redirect()->route('clessons')->with('message','Data created successfully!');
    // }
    public function cedit_lessons($id)
    {
        $course = Course::all();
        $data = Lesson::find($id);
        // dd($data);
        return view ('contractor.lesson.edit',compact('data','course'));
    }
    public function cupdate_lessons(Request $request , $id)
    {
        $inputs = $request->except(['_token']);
        Lesson::where('id', $id)->update($inputs);
        return redirect()->route('clessons')->with('message', 'Data Updated Successfully!');
    }
    public function cdestroy_lessons($id)
    {
        Lesson::find($id)->delete();
        return response()->json(array('success' => true));
    }
    public function ctests(Request $request)
    {

        $data = $request->all();
        // dd($data);
        $test = Course::join('tests', 'courses.id', '=', 'tests.course_id')
        ->where('courses.id',$data)
        ->get();
        //  dd($lesson);
        $course = User::join('courses', 'users.id', '=', 'courses.teachers')
        ->where('courses.eccbody_id',Auth::user()->id)
        ->get();
        return view ('contractor.test.index',compact('course','test'));
    }
    // public function cadd_test()
    // {
    //     $course = Course::all();
    //     $lesson = Lesson::all();
    //     return view ('contractor.test.add',compact('course','lesson'));
    // }
    // public function ccreate_test (Request $request)
    // {
    //     $inputs = $request->all();
    //     $user = Auth::user()->id;
    //     $inputs["user_id"] = $user;
    //     // dd($inputs);
    //     Test::create($inputs);
    //     return redirect()->route('ctests')->with('message','Data created successfully!');
    // }
    public function cedit_test($id)
    {
        $course = Course::all();
        $lesson = Lesson::all();
        $data = Test::find($id);
        // dd($data);
        return view ('contractor.test.edit',compact('data','course','lesson'));
    }
    public function cupdate_test(Request $request , $id)
    {
        $inputs = $request->except(['_token']);
        Test::where('id', $id)->update($inputs);
        return redirect()->route('ctests')->with('message', 'Data Updated Successfully!');
    }
    public function cdestroy_test($id)
    {
        Test::find($id)->delete();
        return response()->json(array('success' => true));
    }
    
    public function caccount()
    {
        $data = User::where('id',Auth::user()->id)
        ->first();
        return view ('contractor.account.account',compact('data'));
    }
    public function cupdate_account(Request $request , $id)
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

        return redirect()->route('caccount')->with('message', 'Data Updated Successfully!');
    }
    
    
    
}
