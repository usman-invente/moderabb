<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Coupon;
use App\Models\Course;
use App\Models\Diploma;
use App\Models\Lesson;
use App\Models\Quesstion;
use App\Models\Schedule;
use App\Models\Tax;
use App\Models\User;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function newsletter()
    {
        $data = Newsletter::all();
        // dd($data);
        return view('admin.news-letter.index', compact('data'));
    }
    public function get_news_data(Request $request)
    {
        $columns = array(
            0 => 'ID',
            1 => 'Email',
            2 => 'Created_at',
        );
        $totalData = Newsletter::all();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        if (empty($request->input('search.value'))) {
            $posts = Newsletter::all()
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');
            $posts = Newsletter::all()
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Newsletter::all()
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->count();
        }
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                // $edit = route('site_edit_news', $post->id);
                //  $delete =  route('site_delete_news',$post->id);
                $nestedData['id'] = $post->id;
                $nestedData['email'] = $post->email;
                // $nestedData['status'] = $post->status;
                // $nestedData['name'] = $post->name;
                $nestedData['created_at'] = date('d-m-Y', strtotime($post->created_at));
                /* $nestedData['industry'] = $post->industry;*/
                // $nestedData['created_at'] = date('d-m-Y', strtotime($post->created_at));
                // $nestedData['action'] = "&emsp;
                // <a class='mr-1 delcomp'  href='{$delete}'> <i class='feather icon-trash text-primary'></i><a>
                // <a class='mr-1 delcomp'  href='{$edit}'> <i class='m-1 feather icon-edit-2 text-primary'></i><a>
                //  ";
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );
        echo json_encode($json_data);

    }

    public function teacher()
    {
        $data = User::where('roll_id', 2)->get();
        // dd($data);
        return view('admin.teacher.index', compact('data'));
    }
    public function add_teacher()
    {
        return view('admin.teacher.add');
    }
    public function create_teacher(Request $request)
    {
        $request->validate([
            'email' => 'unique:users',
            'passport' => 'image|mimes:jpeg,png,jpg',
            'photo_academic_degree' => 'image|mimes:jpeg,png,jpg',
            'cv' => 'mimes:doc,docx,pdf',

        ]);
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
        $inputs["password"] = Hash::make($inputs['password']);
        $inputs["roll_id"] = '2';
        User::create($inputs);
        return redirect()->route('teacher')->with('message', 'Teacher Created Successfully!');
    }

    public function edit_teacher($id)
    {
        $data = User::find($id);
        // dd($data);
        return view('admin.teacher.edit', compact('data'));
    }
    public function update_teacher(Request $request, $id)
    {
        $pfilename = "";
        $pasfilename = "";
        $idfilename = "";
        $cvfilename = "";
        if ($request->hasFile('avatar_location') && $request->hasFile('passport') && $request->hasFile('photo_academic_degree') && $request->hasFile('cv')) {
            $image = $request->file('avatar_location');
            $path = public_path() . '/upload/personal/';
            $pfilename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $pfilename);
            $request->avatar_location = $pfilename;
            // dd($pfilename);

            $image = $request->file('passport');
            $path = public_path() . '/upload/passport/';
            $pasfilename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $pasfilename);
            $request->passport = $pasfilename;
            // dd($pasfilename);

            $image = $request->file('photo_academic_degree');
            $path = public_path() . '/upload/acadamic/';
            $idfilename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $idfilename);
            $request->photo_academic_degree = $idfilename;

            $image = $request->file('cv');
            $path = public_path() . '/upload/cv/';
            $cvfilename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $cvfilename);
            $request->cv = $cvfilename;

            $inputs = $request->except(['_token']);
            $inputs["passport"] = $pasfilename;
            $inputs["avatar_location"] = $pfilename;
            $inputs["photo_academic_degree"] = $idfilename;
            $inputs["cv"] = $cvfilename;
            // dd($inputs);
            User::where('id', $id)->update($inputs);
        } elseif ($request->hasFile('passport') && $request->hasFile('photo_academic_degree') && $request->hasFile('cv')) {
            $image = $request->file('passport');
            $path = public_path() . '/upload/passport/';
            $pasfilename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $pasfilename);
            $request->passport = $pasfilename;
            // dd($pfilename);

            $image = $request->file('photo_academic_degree');
            $path = public_path() . '/upload/acadamic/';
            $idfilename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $idfilename);
            $request->photo_academic_degree = $idfilename;
            // dd($pasfilename);

            $image = $request->file('cv');
            $path = public_path() . '/upload/id/';
            $cvfilename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $cvfilename);
            $request->cv = $cvfilename;

            $inputs = $request->except(['_token']);
            $inputs["passport"] = $pasfilename;
            $inputs["photo_academic_degree"] = $idfilename;
            $inputs["cv"] = $cvfilename;
            // dd($inputs);
            User::where('id', $id)->update($inputs);
        } elseif ($request->hasFile('photo_academic_degree') && $request->hasFile('passport')) {
            $image = $request->file('photo_academic_degree');
            $path = public_path() . '/upload/acadamic/';
            $idfilename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $idfilename);
            $request->photo_academic_degree = $idfilename;
            // dd($pfilename);

            $image = $request->file('passport');
            $path = public_path() . '/upload/passport/';
            $pasfilename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $pasfilename);
            $request->passport = $pasfilename;
            // dd($pasfilename);

            $inputs = $request->except(['_token']);
            $inputs["passport"] = $pasfilename;
            $inputs["photo_academic_degree"] = $pfilename;
            // dd($inputs);
            User::where('id', $id)->update($inputs);
        } elseif ($request->hasFile('passport') && $request->hasFile('cv')) {
            $image = $request->file('passport');
            $path = public_path() . '/upload/passport/';
            $pasfilename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $pasfilename);
            $request->passport = $pasfilename;

            $image = $request->file('cv');
            $path = public_path() . '/upload/cv/';
            $cvfilename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $cvfilename);
            $request->cv = $cvfilename;

            $inputs = $request->except(['_token']);
            $inputs["passport"] = $pasfilename;
            $inputs["cv"] = $cvfilename;
            // dd($inputs);
            User::where('id', $id)->update($inputs);
        } elseif ($request->hasFile('passport')) {
            $image = $request->file('passport');
            $path = public_path() . '/upload/passport/';
            $pasfilename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $pasfilename);
            $request->passport = $pasfilename;
            // dd($pasfilename);
            $inputs = $request->except(['_token']);
            $inputs["passport"] = $pasfilename;
            //  dd($inputs);
            User::where('id', $id)->update($inputs);
        } elseif ($request->hasFile('avatar_location')) {
            $image = $request->file('avatar_location');
            $path = public_path() . '/upload/personal/';
            $pfilename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $pfilename);
            $request->avatar_location = $pfilename;
            // dd($pfilename);
            $inputs = $request->except(['_token']);
            $inputs["avatar_location"] = $pfilename;
            //  dd($inputs);
            User::where('id', $id)->update($inputs);
        } elseif ($request->hasFile('photo_academic_degree')) {
            $image = $request->file('photo_academic_degree');
            $path = public_path() . '/upload/acadamic/';
            $idfilename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $idfilename);
            $request->photo_academic_degree = $idfilename;
            // dd($idfilename);
            $inputs = $request->except(['_token']);
            $inputs["photo_academic_degree"] = $idfilename;
            //  dd($inputs);
            User::where('id', $id)->update($inputs);
        } elseif ($request->hasFile('cv')) {
            $image = $request->file('cv');
            $path = public_path() . '/upload/cv/';
            $cvfilename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $cvfilename);
            $request->cv = $cvfilename;
            // dd($cvfilename);
            $inputs = $request->except(['_token']);
            $inputs["cv"] = $cvfilename;
            //  dd($inputs);
            User::where('id', $id)->update($inputs);
        } else {
            $inputs = $request->except(['_token']);
            User::where('id', $id)->update($inputs);
        }

        return redirect()->route('teacher')->with('message', 'Data updated Successfully!');
    }
    public function destroy_teacher(Request $request)
    {
        User::find($request->id)->delete();
        return response()->json(array('success' => true));
    }
    public function teacher_courses($id)
    {
        $data = User::join('courses', 'users.id', '=', 'courses.teachers')
            ->where('users.id', $id)
            ->get();
        // dd($data);
        return response()->json(array('success' => true));
    }
    public function categories()
    {
        $data = Category::all();
        return view('admin.section.index', compact('data'));
    }
    public function add_categories()
    {
        return view('admin.section.add');
    }
    public function create_categories(Request $request)
    {
        $filename = "";
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = public_path() . '/upload/courseimage/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $request->image = $filename;
        }
        $inputs = $request->all();
        $inputs["image"] = $filename;
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        // dd($inputs);
        Category::create($inputs);
        return redirect()->route('categories')->with('message', 'Data Created Successfully!');
    }
    public function edit_categories(Request $request, $id)
    {
        $data = Category::find($id);
        // dd($organization);
        return view('admin.section.edit', compact('data'));
    }
    public function update_categories(Request $request, $id)
    {
        $filename = "";
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = public_path() . '/upload/courseimage/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $request->image = $filename;

            $inputs = $request->except(['_token']);
            $inputs["image"] = $filename;
            // dd($inputs);
            Category::where('id', $id)->update($inputs);
        } else {
            $inputs = $request->except(['_token']);
            // dd($inputs);
            Category::where('id', $id)->update($inputs);
        }
        return redirect()->route('categories')->with('message', 'Data Updated Successfully!');
    }

    public function destroy_categories($id)
    {
        Category::find($id)->delete();
        return response()->json(array('success' => true));
    }

    public function show_courses_categories(Request $request, $id)
    {
        // $data = Category::find($id);
        $data = Category::join('courses', 'categories.id', '=', 'courses.category_id')
            ->where('courses.category_id', $id)
            ->get();
        $trainer = User::where('roll_id', 2)->get();
        $catagory = Category::all();
        return view('admin.courses.index', compact('data', 'trainer', 'catagory'));
    }
    public function trainings()
    {
        $data = TrainingNeed::all();
        return view('admin.trainingNeed.index', compact('data'));
    }
    public function add_trainings()
    {
        $data = Category::all();
        return view('admin.trainingNeed.add', compact('data'));
    }
    public function create_trainings(Request $request)
    {
        $inputs = $request->all();
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        TrainingNeed::create($inputs);
        return redirect()->route('trainings')->with('message', 'Data Created Successfully!');
    }
    public function destroy_trainings($id)
    {
        TrainingNeed::find($id)->delete();
        return response()->json(array('success' => true));
    }
    public function edit_trainings(Request $request, $id)
    {
        $data = TrainingNeed::find($id);
        $cata = Category::all();
        return view('admin.trainingNeed.edit', compact('data', 'cata'));
    }
    public function update_trainings(Request $request, $id)
    {
        $inputs = $request->except(['_token']);
        // dd($inputs);
        TrainingNeed::where('id', $id)->update($inputs);
        return redirect()->route('trainings')->with('message', 'Data Updated Successfully!');
    }

    public function accreditation_bodies()
    {
        $data = User::where('roll_id', 3)->get();
        return view('admin.accreditation-bodies.index', compact('data'));
    }
    public function add_accreditation_bodies()
    {
        return view('admin.accreditation-bodies.add');
    }
    public function create_accreditation_bodies(Request $request)
    {
        $inputs = $request->all();
        $inputs["password"] = Hash::make($inputs['password']);
        $inputs["roll_id"] = '3';
        User::create($inputs);
        return redirect()->route('accreditation_bodies')->with('message', 'Data Created Successfully!');
    }
    public function edit_accreditation_bodies(Request $request, $id)
    {
        $data = User::find($id);
        return view('admin.accreditation-bodies.edit', compact('data'));
    }
    public function update_accreditation_bodies(Request $request, $id)
    {
        $filename = "";
        if ($request->hasFile('avatar_location')) {
            $image = $request->file('avatar_location');
            $path = public_path() . '/upload/personal/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $request->avatar_location = $filename;

            $inputs = $request->except(['_token']);
            $inputs["avatar_location"] = $filename;
            // dd($inputs);
            User::where('id', $id)->update($inputs);
        } else {
            $inputs = $request->except(['_token']);
            // dd($inputs);
            User::where('id', $id)->update($inputs);
        }
        return redirect()->route('accreditation_bodies')->with('message', 'Data Updated Successfully!');
    }
    public function destroy_accreditation_bodies($id)
    {
        User::find($id)->delete();
        return response()->json(array('success' => true));
    }
    public function show_courses_accreditation_bodies(Request $request, $id)
    {
        // $data = Category::find($id);
        $data = User::join('courses', 'users.id', '=', 'courses.eccbody_id')
            ->where('courses.eccbody_id', $id)
            ->get();
        $trainer = User::all();
        $catagory = Category::all();
        return view('admin.courses.index', compact('data', 'trainer', 'catagory'));
    }

    public function contact()
    {
        $data = Contact::all();
        return view('admin.contact.index', compact('data'));
    }
    public function courses()
    {
        $data = User::join('courses', 'users.id', '=', 'courses.teachers')
        ->get();
        // $data = Course::join('users', 'courses.teachers', '=', 'users.id')
        // ->join('categories', 'courses.category_id', '=', 'categories.id')
        // ->select('courses.*', 'users.name', 'users.title','categories.name')
        // ->get();
        $catagory = Category::all();
        return view ('admin.courses.index',compact('data','catagory'));
    }
    public function add_courses()
    {
        $trainer = User::where('roll_id', 2)->get();
        $catagory = Category::all();
        $abody = User::where('roll_id', 3)->get();
        return view('admin.courses.add', compact('trainer', 'catagory', 'abody'));
    }
    public function create_courses(Request $request)
    {
        $inputs = $request->all();
        if ($request->hasFile('course_image')) {
            $image = $request->file('course_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/image/courses');
            $image->move($destinationPath, $name);
            $inputs['course_image'] = $name;
    
        } 
        if ($request->hasFile('certificate')) {
            $image = $request->file('certificate');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/image/certificate');
            $image->move($destinationPath, $name);
            $inputs['certificate'] = $name;
    
        }      
        $user = Auth::user()->id;
        $inputs["user_id"]=$user;
        // $teacher = serialize($inputs['teachers']);
        // $inputs["teachers"] = $teacher;
        Course::create($inputs);
        return redirect()->route('courses')->with('message', 'Data Created Successfully!');
    }

    public function edit_courses($id)
    {
        $trainer = User::where('roll_id', 2)->get();
        $catagory = Category::all();
        $abody = User::where('roll_id', 3)->get();
        $data = Course::find($id);
        // dd($data);
        return view('admin.courses.edit', compact('data', 'trainer', 'catagory', 'abody'));
    }
    public function update_courses(Request $request, $id)
    {
        $inputs = $request->except(['_token']);
        if ($request->hasFile('course_image')) {
            $image = $request->file('course_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/image/courses');
            $image->move($destinationPath, $name);
            $inputs['course_image'] = $name;
    
        } 
        if ($request->hasFile('certificate')) {
            $image = $request->file('certificate');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/image/certificate');
            $image->move($destinationPath, $name);
            $inputs['certificate'] = $name;
    
        } 
        $teacher = serialize($inputs['teachers']);
        $inputs["teachers"] = $teacher;
        Course::where('id', $id)->update($inputs);
        return redirect()->route('courses')->with('message', 'Data Updated Successfully!');
    }
    public function destroy_courses($id)
    {
        Course::find($id)->delete();
        return response()->json(array('success' => true));
    }
    public function feature_courses($id)
    {
        $data = Course::where('id', $id)->first();
        // dd($data);
        if (isset($data) && $data->published == 0) {
            Course::where('id', $id)->update(['published' => 1]);
        } else {
            Course::where('id', $id)->update(['published' => 0]);
        }
        return response()->json(array('success' => true));
    }
    public function diploma()
    {
        
        $data = Diploma::join('categories', 'diplomas.category_id', '=', 'categories.id')
        ->get();
        return view ('admin.diploma.index',compact('data'));
    }
    public function add_diploma()
    {
        $courses = Course::all();
        $catagory = Category::all();
        $abody = User::where('roll_id', 3)->get();
        return view('admin.diploma.add', compact('courses', 'catagory', 'abody'));
    }
    public function create_diploma(Request $request)
    {
        $inputs = $request->all();
        // dd($inputs);
        $user = Auth::user()->id;
        $inputs["user_id"]=$user;
        // $teacher = serialize($inputs['courses']);
        // $inputs["courses"] = $teacher;
        Diploma::create($inputs);
        return redirect()->route('diploma')->with('message', 'Data Created Successfully!');
    }
    public function edit_diploma($id)
    {
        $cour = Course::all();
        $catagory = Category::all();
        $abody = User::where('roll_id', 3)->get();
        $data = Diploma::find($id);
        // dd($data);
        return view('admin.diploma.edit', compact('data', 'cour', 'catagory', 'abody'));
    }
    public function update_diploma(Request $request, $id)
    {
        $inputs = $request->except(['_token']);
        // $teacher = serialize($inputs['courses']);
        // $inputs["courses"] = $teacher;
        Diploma::where('id', $id)->update($inputs);
        return redirect()->route('diploma')->with('message', 'Data Updated Successfully!');
    }
    public function destroy_diploma($id)
    {
        Course::find($id)->delete();
        return response()->json(array('success' => true));
    }

    public function lessons(Request $request)
    {

        $data = $request->all();
        // dd($data);
        $lesson = Course::join('lessons', 'courses.id', '=', 'lessons.course_id')
        ->where('courses.id',$data)
        ->where('lessons.live_lesson', 0)
        ->get();
        //  dd($lesson);
        $course = Course::all();
        return view('admin.lesson.index', compact('course', 'lesson'));
    }
    public function add_lessons()
    {
        $course = Course::all();
        return view('admin.lesson.add', compact('course'));
    }
    public function create_lessons(Request $request)
    {
        $inputs = $request->all();
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        Lesson::create($inputs);
        return redirect()->route('lessons')->with('message', 'Data created successfully!');
    }
    public function edit_lessons($id)
    {
        $course = Course::all();
        $data = Lesson::find($id);
        // dd($data);
        return view('admin.lesson.edit', compact('data', 'course'));
    }
    public function update_lessons(Request $request, $id)
    {
        $inputs = $request->except(['_token']);
        Lesson::where('id', $id)->update($inputs);
        return redirect()->route('lessons')->with('message', 'Data Updated Successfully!');
    }
    public function destroy_lessons($id)
    {
        Lesson::find($id)->delete();
        return response()->json(array('success' => true));
    }
    public function live_lessons(Request $request)
    {

        $data = $request->all();
        // dd($data);
        $lesson = Course::join('lessons', 'courses.id', '=', 'lessons.course_id')
        ->where('courses.id',$data)
        ->where('lessons.live_lesson', 1)
        ->get();
        //  dd($lesson);
        $course = Course::all();
        return view ('admin.livelesson.index',compact('course','lesson'));
    }
    public function add_live_lessons()
    {
        $course = Course::all();
        return view ('admin.livelesson.add',compact('course'));
    }
    public function create_live_lessons (Request $request)
    {
        $inputs = $request->all();
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        $inputs["live_lesson"] = 1;
        Lesson::create($inputs);
        return redirect()->route('live_lessons')->with('message','Data created successfully!');
    }
    public function edit_live_lessons($id)
    {
        $course = Course::all();
        $data = Lesson::find($id);
        // dd($data);
        return view ('admin.livelesson.edit',compact('data','course'));
    }
    public function update_live_lessons(Request $request , $id)
    {
        $inputs = $request->except(['_token']);
        Lesson::where('id', $id)->update($inputs);
        return redirect()->route('live_lessons')->with('message', 'Data Updated Successfully!');
    }
    public function destroy_live_lessons($id)
    {
        Lesson::find($id)->delete();
        return response()->json(array('success' => true));
    }
    public function live_lesson_slots(Request $request)
    {

        $data = $request->all();
        // dd($data);
        $lesson = Lesson::join('schedules', 'lessons.id', '=', 'schedules.lesson_id')
        ->where('lessons.id',$data)
        ->get();
        //  dd($lesson);
        $getlesson = Lesson::all();
        return view ('admin.schedulelesson.index',compact('getlesson','lesson'));
    }
    public function add_live_lesson_slots()
    {
        $course = Lesson::all();
        return view ('admin.schedulelesson.add',compact('course'));
    }
    public function create_live_lesson_slots (Request $request)
    {
        $inputs = $request->all();
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        $inputs["password"]=Hash::make($inputs['password']);
        Schedule::create($inputs);
        return redirect()->route('live_lesson_slots')->with('message','Data created successfully!');
    }
    public function edit_live_lesson_slots($id)
    {
        // dd($id);
        $getlesson = Lesson::all();
        $data = Schedule::find($id);
        // dd($data);
        return view ('admin.schedulelesson.edit',compact('data','getlesson'));
    }
    public function update_live_lesson_slots(Request $request , $id)
    {
        $inputs = $request->except(['_token']);
        Schedule::where('id', $id)->update($inputs);
        return redirect()->route('live_lesson_slots')->with('message', 'Data Updated Successfully!');
    }
    public function destroy_live_lesson_slots($id)
    {
        Schedule::find($id)->delete();
        return response()->json(array('success' => true));
    }
    public function tests(Request $request)
    {

        $data = $request->all();
        // dd($data);
        $test = Course::join('tests', 'courses.id', '=', 'tests.course_id')
        ->where('courses.id',$data)
        ->get();
        //  dd($lesson);
        $course = Course::all();
        return view ('admin.test.index',compact('course','test'));
    }
    public function add_test()
    {
        $course = Course::all();
        $lesson = Lesson::all();
        return view ('admin.test.add',compact('course','lesson'));
    }
    public function create_test (Request $request)
    {
        $inputs = $request->all();
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        // dd($inputs);
        Test::create($inputs);
        return redirect()->route('tests')->with('message','Data created successfully!');
    }
    public function edit_test($id)
    {
        $course = Course::all();
        $lesson = Lesson::all();
        $data = Test::find($id);
        // dd($data);
        return view ('admin.test.edit',compact('data','course','lesson'));
    }
    public function update_test(Request $request , $id)
    {
        $inputs = $request->except(['_token']);
        Test::where('id', $id)->update($inputs);
        return redirect()->route('tests')->with('message', 'Data Updated Successfully!');
    }
    public function destroy_test($id)
    {
        Test::find($id)->delete();
        return response()->json(array('success' => true));
    }
    public function tax(Request $request)
    {
        $tax = Tax::all();
        return view ('admin.tax.index',compact('tax'));
    }
    public function add_tax()
    {
        return view ('admin.tax.add');
    }
    public function create_tax(Request $request)
    {
        $inputs = $request->all();
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        // dd($inputs);
        Tax::create($inputs);
        return redirect()->route('tax')->with('message','Data created successfully!');
    }
    public function edit_tax($id)
    {
        $data = Tax::find($id);
        // dd($data);
        return view ('admin.tax.edit',compact('data'));
    }
    public function update_tax(Request $request , $id)
    {
        $inputs = $request->except(['_token']);
        Tax::where('id', $id)->update($inputs);
        return redirect()->route('tax')->with('message', 'Data Updated Successfully!');
    }
    public function destroy_tax($id)
    {
        Tax::find($id)->delete();
        return response()->json(array('success' => true));
    }
    public function tax_status($id)
    {
        $data = Tax:: where('id',$id)->first();
        // dd($data);
        if(isset($data) && $data->status == 0)
        {
            Tax::where('id', $id)->update(['status' => 1]);
        }
        else{
            Tax::where('id', $id)->update(['status' => 0]);
    }
        return response()->json(array('success' => true));
    }
    public function coupon(Request $request)
    {
        $tax = Coupon::all();
        return view ('admin.coupon.index',compact('tax'));
    }
    public function add_coupon()
    {
        return view ('admin.coupon.add');
    }
    public function create_coupon(Request $request)
    {
        // dd($request);
        $inputs = $request->all();
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        // dd($inputs);
        Coupon::create($inputs);
        return redirect()->route('coupon')->with('message','Data created successfully!');
    }
    public function edit_coupon($id)
    {
        $data = Coupon::find($id);
        // dd($data);
        return view ('admin.coupon.edit',compact('data'));
    }
    public function update_coupon(Request $request , $id)
    {
        $inputs = $request->except(['_token']);
        Coupon::where('id', $id)->update($inputs);
        return redirect()->route('coupon')->with('message', 'Data Updated Successfully!');
    }
    public function destroy_coupon($id)
    {
        Coupon::find($id)->delete();
        return response()->json(array('success' => true));
    }
    public function coupon_status($id)
    {
        $data = Coupon:: where('id',$id)->first();
        // dd($data);
        if(isset($data) && $data->status == 0)
        {
            Coupon::where('id', $id)->update(['status' => 1]);
        }
        else{
            Coupon::where('id', $id)->update(['status' => 0]);
    }
        return response()->json(array('success' => true));
    }
    public function account()
    {
        $data = User::where('id',Auth::user()->id)
        ->first();
        return view ('admin.account.account',compact('data'));
    }
    public function update_account(Request $request , $id)
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

        return redirect()->route('account')->with('message', 'Data Updated Successfully!');
    }
    public function questions(Request $request)
    {

        // $data = $request->all();
        // // dd($data);
        // $lesson = Lesson::join('schedules', 'lessons.id', '=', 'schedules.lesson_id')
        // ->where('lessons.id',$data)
        // ->get();
        //  dd($lesson);
        $quest = Quesstion::all();
        $gettest = Test::all();
        return view ('admin.question.index',compact('gettest','quest'));
    }
    public function add_question(Request $request)
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
   $course = Course::all();
   return view ('admin.question.add',compact('course'));
    }
    public function create_question (Request $request)
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
        // $test = serialize($inputs['tests']);
        // $inputs["tests"] = $test;
        // dd($inputs);
        Quesstion::create($inputs);

        return redirect()->route('questions')->with('message','Data created successfully!');
    }
    public function edit_question(Request $request ,$id)
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
   return view ('admin.question.edit',compact('course','quest'));
    }
    public function update_question(Request $request , $id)
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
        // $test = serialize($inputs['tests']);
        // $inputs["tests"] = $test;
        // dd($inputs);
        Quesstion::where('id', $id)->update($inputs);
        return redirect()->route('questions')->with('message', 'Data Updated Successfully!');
    }
    public function destroy_question($id)
    {
        Quesstion::find($id)->delete();
        return response()->json(array('success' => true));
    }
}
