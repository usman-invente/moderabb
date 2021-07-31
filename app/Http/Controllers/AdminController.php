<?php

namespace App\Http\Controllers;

use App\Models\Advisory;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Coupon;
use App\Models\Course;
use App\Models\Diploma;
use App\Models\Faq;
use App\Models\Lesson;
use App\Models\News;
use App\Models\Newsletter;
use App\Models\Ourpartner;
use App\Models\Pagemanager;
use App\Models\Quesstion;
use App\Models\Reason;
use App\Models\Schedule;
use App\Models\Slider;
use App\Models\Tax;
use App\Models\BlogTopic;
use App\Models\BlogCategory;
use App\Models\Test;
use App\Models\Testimonial;
use App\Models\TrainingNeed;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function newsletter()
    {
        // dd($data);
        return view('admin.news-letter.index');
    }
    public function  get_news_data(Request $request)
    {
        $columns = array(
            0 => 'email',
        );

        $totalData = Newsletter::all()->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = Newsletter::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts = Newsletter::
                where('email', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Newsletter::
                where('email', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['number'] = $post->id;
                $nestedData['email'] = $post->email;
                $nestedData['expires_at'] = $post->expires_at;  $nestedData['actions'] = "&emsp;
                    <a href= ''class='btn btn-primary' data-id='{$post->id}'>Message</a>
                    ";
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
    public function teacher_courses(Request $request, $id)
    {
        $data = User::join('courses', 'users.id', '=', 'courses.teachers')
        ->where('courses.teachers', $id)
        ->get();
    $trainer = User::all();
    $catagory = Category::all();
    return view('admin.courses.index', compact('data', 'trainer', 'catagory'));
    }
    public function categories()
    {
        $data = Category::all();
        return view('admin.section.index', compact('data'));
    }

    public function  getcategories(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'name',
        );

        $totalData = Category::all()->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = Category::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts = Category::
                where('id', 'LIKE', "%{$search}%")
                ->orwhere('name', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Category::
                where('id', 'LIKE', "%{$search}%")
                ->orwhere('name', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $edit = route('edit_categories',$post->id);
                $show = route('show_courses_categories',$post->id);
                $nestedData['number'] = $post->id;
                $nestedData['name'] = $post->name;
                $nestedData['expires_at'] = $post->expires_at;  $nestedData['actions'] = "&emsp;
                <a href='{$edit}' class='btn btn-xs btn-info mb-1'><i class='fas fa-edit'></i></a>
                <a href='' class='btn btn-xs btn-danger text-white mb-1'><i  data-id='{$post->id}' class='fa fa-trash delete fa-fw'></i></a>
                <a href='{$show}' class='btn btn-warning mb-1'>Courses</a>  
                ";
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

    public function add_categories()
    {
        return view('admin.section.add');
    }
    public function create_categories(Request $request)
    {

        $name='';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $path = public_path() . '/upload/courseimage/';
            $image->move($destinationPath, $name);
        }

        $category = new Category;
        $category->name = $request->name;
        $category->image = $name;
        $category->icon = $request->icon?$request->icon:NULL;
        $category->user_id = Auth::user()->id;
        $category->save();
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

    public function destroy_categories(Request $request)
    {
        Category::find($request->id)->delete();
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

    public function  getTrainer(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'title',
        );

        $totalData = TrainingNeed::all()->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = TrainingNeed::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts = TrainingNeed::
                where('id', 'LIKE', "%{$search}%")
                ->orwhere('title', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = TrainingNeed::
                where('id', 'LIKE', "%{$search}%")
                ->orwhere('title', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $edit =  route('edit_trainings',$post->id);
                $nestedData['number'] = $post->id;
                $nestedData['title'] = $post->title;
                $nestedData['categorie_id'] = $post->categorie_id;
                $nestedData['course_field'] = $post->course_field;
                $nestedData['idea'] = $post->idea;
                $nestedData['axes'] = $post->axes;
                $nestedData['expires_at'] = $post->expires_at;  $nestedData['actions'] = "&emsp;
                <a href='{$edit}' class='btn btn-xs btn-info mb-1'><i class='fas fa-edit'></i></a>
                <a href='' class='btn btn-xs btn-danger text-white mb-1'><i  data-id='{$post->id}' class='fa fa-trash delete fa-fw'></i></a>
                    ";
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
    public function destroy_trainings(Request $request)
    {
        TrainingNeed::find($request->id)->delete();
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
        return view('admin.accreditation-bodies.index');
    }

    public function  getAcbody(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'email',
        );

        $totalData =User::where('roll_id', 3)->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = User::where('roll_id', 3)->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts = User::where('roll_id', 3)->
                where('name', 'LIKE', "%{$search}%")
                ->orwhere('email', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = User::where('roll_id', 3)->
                where('name', 'LIKE', "%{$search}%")
                ->orwhere('email', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $edit = route('edit_accreditation_bodies',$post->id);
                $show = route('show_courses_accreditation_bodies',$post->id);
                $nestedData['number'] = $post->id;
                $nestedData['name'] = $post->name;
                $nestedData['c_person'] = $post->c_person;
                $nestedData['email'] = $post->email;
                $nestedData['expires_at'] = $post->expires_at;
                if ($post->status == 1) {
                    $nestedData['status'] = '<p><span class="right badge badge-success">Enabled</span></p>';
                } else {
                    $nestedData['status'] = '<p><span class="right badge badge-danger">Disable</span></p>';
                }  
                $nestedData['actions'] = "&emsp;
                <a href='{$edit}' class='btn btn-xs btn-info mb-1'><i class='fas fa-edit'></i></a>
                <a href='' class='btn btn-xs btn-danger text-white mb-1'><i  data-id='{$post->id}' class='fa fa-trash delete fa-fw'></i></a>
                <a href='{$show}' class='btn btn-warning mb-1'>Courses</a>  
                ";
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
    public function destroy_accreditation_bodies(Request $request)
    {
        User::find($request->id)->delete();
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


    public function  getContact(Request $request)
    {
        $columns = array(
            0 => 'name',
            1 => 'email',
            2 => 'phone',
        );

        $totalData = Contact::all()->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = Contact::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts = Contact::
                where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('phone', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Contact::
                where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('phone', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['number'] = $post->id;
                $nestedData['name'] = $post->name;
                $nestedData['email'] = $post->email;
                $nestedData['phone'] = $post->phone;
                $nestedData['message'] = $post->message;
                $nestedData['created_at'] = date('d-m-Y', strtotime($post->created_at));
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

    public function courses()
    {
        // $data = User::join('courses', 'users.id', '=', 'courses.teachers')
        //     ->get();
        // $data = Course::join('users', 'courses.teachers', '=', 'users.id')
        // ->join('categories', 'courses.category_id', '=', 'categories.id')
        // ->select('courses.*', 'users.name', 'users.title','categories.name')
        // ->get();
        // dd($data);
        // $catagory = Category::all();
        return view('admin.courses.index');
    }

    public function  getCourses(Request $request)
    {
        $columns = array(
            0 => 'title',
            1 => 'name',
            2 => 'ctitle',
        );

        $totalData =Course::join('users', 'courses.teachers', '=', 'users.id')
        ->join('categories', 'courses.category_id', '=', 'categories.id')
        ->select('courses.*', 'users.name', 'users.title','categories.name')->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = Course::join('users', 'courses.teachers', '=', 'users.id')
            ->join('categories', 'courses.category_id', '=', 'categories.id')
            ->select('courses.*', 'users.name', 'users.title','categories.name')->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts = Course::join('users', 'courses.teachers', '=', 'users.id')
            ->join('categories', 'courses.category_id', '=', 'categories.id')
            ->where('name', 'LIKE', "%{$search}%")
                ->orWhere('ctitle', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
            ->select('courses.*', 'users.name', 'users.title','categories.name')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Course::join('users', 'courses.teachers', '=', 'users.id')
            ->join('categories', 'courses.category_id', '=', 'categories.id')
            ->where('name', 'LIKE', "%{$search}%")
                ->orWhere('ctitle', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
            ->select('courses.*', 'users.name', 'users.title','categories.name')
                ->count();
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $edit = route('edit_courses',$post->id);
                $nestedData['number'] = $post->id;
                $nestedData['title'] = $post->title;
                $nestedData['ctitle'] = $post->ctitle;
                $nestedData['name'] = $post->name;
                $nestedData['price'] = $post->price;
                if ($post->featured == 1) {
                    $nestedData['featured'] = '<p><span class="right badge badge-success">Featured</span></p>';
                } else {
                    $nestedData['featured'] = '<p><span class="right badge badge-danger">Not featured</span></p>';
                }
                $nestedData['actions'] = "&emsp;
                <a href='{$edit}' class='btn btn-xs btn-info mb-1'><i class='fas fa-edit'></i></a>
                <a href='' class='btn btn-xs btn-danger text-white mb-1'><i  data-id='{$post->id}' class='fa fa-trash delete fa-fw'></i></a>
                <a href='' class='btn btn-xs btn-dark mb-1 status' data-id='{$post->id}'><i class='fa fa fa-upload'></i></a>  
                ";
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
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/image/courses');
            $image->move($destinationPath, $name);
            $inputs['course_image'] = $name;

        }
        if ($request->hasFile('certificate')) {
            $image = $request->file('certificate');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/image/certificate');
            $image->move($destinationPath, $name);
            $inputs['certificate'] = $name;

        }
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
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
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/image/courses');
            $image->move($destinationPath, $name);
            $inputs['course_image'] = $name;

        }
        if ($request->hasFile('certificate')) {
            $image = $request->file('certificate');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/image/certificate');
            $image->move($destinationPath, $name);
            $inputs['certificate'] = $name;

        }
        Course::where('id', $id)->update($inputs);
        return redirect()->route('courses')->with('message', 'Data Updated Successfully!');
    }
    public function destroy_courses(Request $request)
    {
        Course::find($request->id)->delete();
        return response()->json(array('success' => true));
    }
    public function feature_courses(Request $request)
    {
        $data = Course::where('id', $request->id)->first();
        // dd($data);
        if (isset($data) && $data->featured == 0) {
            Course::where('id', $request->id)->update(['featured' => 1]);
        } else {
            Course::where('id', $request->id)->update(['featured' => 0]);
        }
        return response()->json(array('success' => true));
    }
    public function diploma()
    {

        $data = Diploma::join('categories', 'diplomas.category_id', '=', 'categories.id')
            ->get();
        return view('admin.diploma.index', compact('data'));
    }


    public function  getbundles(Request $request)
    {
        $columns = array(
            0 => 'title',
            1 => 'name',
        );

        $totalData =  Diploma::join('categories', 'diplomas.category_id', '=', 'categories.id')->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts =  Diploma::join('categories', 'diplomas.category_id', '=', 'categories.id')->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts =  Diploma::join('categories', 'diplomas.category_id', '=', 'categories.id')
            ->where('name', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered =  Diploma::join('categories', 'diplomas.category_id', '=', 'categories.id')
            ->where('name', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $edit = route('edit_diploma',$post->id);
                $nestedData['number'] = $post->id;
                $nestedData['title'] = $post->title;
                $nestedData['name'] = $post->name;
                $nestedData['price'] = $post->price;
                if ($post->published == 1) {
                    $nestedData['published'] = '<p><span class="right badge badge-success">published</span></p>';
                } else {
                    $nestedData['published'] = '<p><span class="right badge badge-danger">Not published</span></p>';
                }
                $nestedData['actions'] = "&emsp;
                <a href='{$edit}' class='btn btn-xs btn-info mb-1'><i class='fas fa-edit'></i></a>
                <a href='' class='btn btn-xs btn-danger text-white mb-1'><i  data-id='{$post->id}' class='fa fa-trash delete fa-fw'></i></a>
                ";
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
        $inputs["user_id"] = $user;
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
    public function destroy_diploma(Request $request)
    {
        Diploma::find($request->id)->delete();
        return response()->json(array('success' => true));
    }

    public function lessons(Request $request)
    {

        $data = $request->all();
        // dd($data);
        $lesson = Course::join('lessons', 'courses.id', '=', 'lessons.course_id')
            ->where('courses.id', $data)
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
            ->where('courses.id', $data)
            ->where('lessons.live_lesson', 1)
            ->get();
        //  dd($lesson);
        $course = Course::all();
        return view('admin.livelesson.index', compact('course', 'lesson'));
    }
    public function add_live_lessons()
    {
        $course = Course::all();
        return view('admin.livelesson.add', compact('course'));
    }
    public function create_live_lessons(Request $request)
    {
        $inputs = $request->all();
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        $inputs["live_lesson"] = 1;
        Lesson::create($inputs);
        return redirect()->route('live_lessons')->with('message', 'Data created successfully!');
    }
    public function edit_live_lessons($id)
    {
        $course = Course::all();
        $data = Lesson::find($id);
        // dd($data);
        return view('admin.livelesson.edit', compact('data', 'course'));
    }
    public function update_live_lessons(Request $request, $id)
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
            ->where('lessons.id', $data)
            ->get();
        //  dd($lesson);
        $getlesson = Lesson::all();
        return view('admin.schedulelesson.index', compact('getlesson', 'lesson'));
    }
    public function add_live_lesson_slots()
    {
        $course = Lesson::all();
        return view('admin.schedulelesson.add', compact('course'));
    }
    public function create_live_lesson_slots(Request $request)
    {
        $inputs = $request->all();
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        $inputs["password"] = Hash::make($inputs['password']);
        Schedule::create($inputs);
        return redirect()->route('live_lesson_slots')->with('message', 'Data created successfully!');
    }
    public function edit_live_lesson_slots($id)
    {
        // dd($id);
        $getlesson = Lesson::all();
        $data = Schedule::find($id);
        // dd($data);
        return view('admin.schedulelesson.edit', compact('data', 'getlesson'));
    }
    public function update_live_lesson_slots(Request $request, $id)
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
            ->where('courses.id', $data)
            ->get();
        //  dd($lesson);
        $course = Course::all();
        return view('admin.test.index', compact('course', 'test'));
    }
    public function add_test()
    {
        $course = Course::all();
        $lesson = Lesson::all();
        return view('admin.test.add', compact('course', 'lesson'));
    }
    public function create_test(Request $request)
    {
        $inputs = $request->all();
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        // dd($inputs);
        Test::create($inputs);
        return redirect()->route('tests')->with('message', 'Data created successfully!');
    }
    public function edit_test($id)
    {
        $course = Course::all();
        $lesson = Lesson::all();
        $data = Test::find($id);
        // dd($data);
        return view('admin.test.edit', compact('data', 'course', 'lesson'));
    }
    public function update_test(Request $request, $id)
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
        return view('admin.tax.index');
    }

    public function getTax(Request $request)
    {
        $columns = array(
            0 => 'name',
            1 => 'rate',
            2 => 'status',
        );

        $totalData = Tax::all()->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = Tax::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts = Tax::
                where('name', 'LIKE', "%{$search}%")
                ->orWhere('rate', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Tax::
                where('name', 'LIKE', "%{$search}%")
                ->orWhere('rate', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $edit =  route('edit_tax',$post->id);
                $nestedData['number'] = $post->id;
                $nestedData['name'] = $post->name;
                $nestedData['rate'] = $post->rate;
                if ($post->status == 1) {
                    $nestedData['status'] = '<p class="text-white mb-1 font-weight-bold text-center bg-warning p-1 mr-1">published</p>';
                } else {
                    $nestedData['status'] = '<p class="text-white mb-1 font-weight-bold text-center bg-dark p-1 mr-1"> not published</p>';
                }
                    $nestedData['actions'] = "&emsp;
                    <a href= ''class='btn mb-1 btn-success'><i data-id='{$post->id}' class='fa fa-power-off status'></i></a>
                    <a href='' class='btn btn-xs btn-danger text-white mb-1'><i  data-id='{$post->id}' class='fa fa-trash delete fa-fw'></i></a>
                    <a href='{$edit}' class='btn btn-xs btn-info mb-1'><i class='fas fa-edit'></i></a>

                    ";

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

    public function add_tax()
    {
        return view('admin.tax.add');
    }
    public function create_tax(Request $request)
    {
        $inputs = $request->all();
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        // dd($inputs);
        Tax::create($inputs);
        return redirect()->route('tax')->with('message', 'Data created successfully!');
    }
    public function edit_tax($id)
    {
        $data = Tax::find($id);
        // dd($data);
        return view('admin.tax.edit', compact('data'));
    }
    public function update_tax(Request $request, $id)
    {
        $inputs = $request->except(['_token']);
        Tax::where('id', $id)->update($inputs);
        return redirect()->route('tax')->with('message', 'Data Updated Successfully!');
    }
    public function destroy_tax(Request $request)
    {
        Tax::find($request->id)->delete();
        return response()->json(array('success' => true));
    }
    public function tax_status(Request $request)
    {
        $data = Tax::where('id', $request->id)->first();
        // dd($data);
        if (isset($data) && $data->status == 0) {
            Tax::where('id',$request->id )->update(['status' => 1]);
        } else {
            Tax::where('id', $request->id)->update(['status' => 0]);
        }
        return response()->json(array('success' => true));
    }
    public function coupon(Request $request)
    {
        return view('admin.coupon.index');
    }

    public function  getCoupon(Request $request)
    {
        $columns = array(
            0 => 'name',
            1 => 'code',
            2 => 'status',
            3 => 'type',
        );

        $totalData = Coupon::all()->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = Coupon::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts = Coupon::
                where('name', 'LIKE', "%{$search}%")
                ->orWhere('code', 'LIKE', "%{$search}%")
                ->orWhere('type', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Coupon::
                where('name', 'LIKE', "%{$search}%")
                ->orWhere('code', 'LIKE', "%{$search}%")
                ->orWhere('type', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $edit =  route('edit_coupon',$post->id);
                $nestedData['number'] = $post->id;
                $nestedData['name'] = $post->name;
                $nestedData['code'] = $post->code;
                $nestedData['type'] = $post->type;
                $nestedData['amount'] = $post->amount;
                $nestedData['advert_perce'] = $post->advert_perce;
                $nestedData['expires_at'] = $post->expires_at;
                if ($post->status == 1) {
                    $nestedData['status'] = '<p class="text-white mb-1 font-weight-bold text-center bg-warning p-1 mr-1">published</p>';
                } else {
                    $nestedData['status'] = '<p class="text-white mb-1 font-weight-bold text-center bg-dark p-1 mr-1"> not published</p>';
                }
                    $nestedData['actions'] = "&emsp;
                    <a href= ''class='btn mb-1 btn-success'><i data-id='{$post->id}' class='fa fa-power-off status'></i></a>
                    <a href='' class='btn btn-xs btn-danger text-white mb-1'><i  data-id='{$post->id}' class='fa fa-trash delete fa-fw'></i></a>
                    <a href='{$edit}' class='btn btn-xs btn-info mb-1'><i class='fas fa-edit'></i></a>

                    ";

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


    public function add_coupon()
    {
        return view('admin.coupon.add');
    }
    public function create_coupon(Request $request)
    {
        // dd($request);
        $inputs = $request->all();
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        // dd($inputs);
        Coupon::create($inputs);
        return redirect()->route('coupon')->with('message', 'Data created successfully!');
    }
    public function edit_coupon($id)
    {
        $data = Coupon::find($id);
        // dd($data);
        return view('admin.coupon.edit', compact('data'));
    }
    public function update_coupon(Request $request, $id)
    {
        $inputs = $request->except(['_token']);
        Coupon::where('id', $id)->update($inputs);
        return redirect()->route('coupon')->with('message', 'Data Updated Successfully!');
    }
    public function destroy_coupon(Request $request)
    {
        Coupon::find($request->id)->delete();
        return response()->json(array('success' => true));
    }
    public function coupon_status(Request $request)
    {
        $data = Coupon::where('id', $request->id)->first();
        // dd($data);
        if (isset($data) && $data->status == 0) {
            Coupon::where('id', $request->id)->update(['status' => 1]);
        } else {
            Coupon::where('id', $request->id)->update(['status' => 0]);
        }
        return response()->json(array('success' => true));
    }
    public function account()
    {
        $data = User::where('id', Auth::user()->id)
            ->first();
        return view('admin.account.account', compact('data'));
    }
    public function update_account(Request $request, $id)
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
        return view('admin.question.index', compact('gettest', 'quest'));
    }
    public function add_question(Request $request)
    {
        //  if(isset($request))
        //  {
        // dd($request->all());
        // }
        if (isset($request->course_id)) {
            $lesson = Lesson::join('courses', 'lessons.course_id', '=', 'courses.id')
                ->where('lessons.course_id', $request->course_id)
                ->select('lessons.title', 'lessons.id')
                ->get();

            return response()->json($lesson);
        } elseif (isset($request->lesson_id)) {
            $test = Test::join('lessons', 'tests.lesson_id', '=', 'lessons.id')
                ->where('tests.lesson_id', $request->lesson_id)
                ->select('tests.title', 'tests.id')
                ->get();

            return response()->json($test);
        }
        $course = Course::all();
        return view('admin.question.add', compact('course'));
    }
    public function create_question(Request $request)
    {

        $filename = "";

        if ($request->hasFile('question_image')) {
            $image = $request->file('question_image');
            $path = public_path() . '/upload/qimage/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $request->question_image = $filename;
        }
        $inputs = $request->all();
        $inputs["question_image"] = $filename;
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        // $test = serialize($inputs['tests']);
        // $inputs["tests"] = $test;
        // dd($inputs);
        Quesstion::create($inputs);

        return redirect()->route('questions')->with('message', 'Data created successfully!');
    }
    public function edit_question(Request $request, $id)
    {
        if (isset($request->course_id)) {
            $lesson = Lesson::join('courses', 'lessons.course_id', '=', 'courses.id')
                ->where('lessons.course_id', $request->course_id)
                ->select('lessons.title', 'lessons.id')
                ->get();

            return response()->json($lesson);
        } elseif (isset($request->lesson_id)) {
            $test = Test::join('lessons', 'tests.lesson_id', '=', 'lessons.id')
                ->where('tests.lesson_id', $request->lesson_id)
                ->select('tests.title', 'tests.id')
                ->get();

            return response()->json($test);
        }
        $quest = Quesstion::find($id);
//    dd($quest);
        $course = Course::all();
        return view('admin.question.edit', compact('course', 'quest'));
    }
    public function update_question(Request $request, $id)
    {
        $filename = "";

        if ($request->hasFile('question_image')) {
            $image = $request->file('question_image');
            $path = public_path() . '/upload/qimage/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $request->question_image = $filename;
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

    public function sponsors(Request $request)
    {
        $sponsor = Ourpartner::all();
        return view('admin.our-partners.index', compact('sponsor'));
    }

    public function getSponsors(Request $request)
    {
        $columns = array(
            0 => 'name',
            1 => 'link',
            2 => 'status',
        );

        $totalData = Ourpartner::all()->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = Ourpartner::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts = Ourpartner::
                where('name', 'LIKE', "%{$search}%")
                ->orWhere('link', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Ourpartner::
                where('name', 'LIKE', "%{$search}%")
                ->orWhere('link', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $edit =  route('edit_sponsors',$post->id);
                $picture = '/upload/partner/'.$post->featured_image;
                $nestedData['number'] = $post->id;
                $nestedData['name'] = $post->name;
                $nestedData['link'] = $post->link;
                $nestedData['logo'] = "<img src='{$picture}' height='30' width='60' style='margin-top: 10px'>";
                if ($post->status == 1) {
                    $nestedData['status'] = '<p class="text-white mb-1 font-weight-bold text-center bg-warning p-1 mr-1">published</p>';
                } else {
                    $nestedData['status'] = '<p class="text-white mb-1 font-weight-bold text-center bg-dark p-1 mr-1"> not published</p>';
                }
                    $nestedData['actions'] = "&emsp;
                    <a href= ''class='btn mb-1 btn-success'><i data-id='{$post->id}' class='fa fa-power-off status'></i></a>
                    <a href='' class='btn btn-xs btn-danger text-white mb-1'><i  data-id='{$post->id}' class='fa fa-trash delete fa-fw'></i></a>
                    <a href='{$edit}' class='btn btn-xs btn-info mb-1'><i class='fas fa-edit'></i></a>

                    ";

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

    public function create_sponsors(Request $request)
    {

        $filename = "";

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $path = public_path() . '/upload/partner/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $request->logo = $filename;
        }
        $inputs = $request->all();
        $inputs["logo"] = $filename;
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        // dd($inputs);
        Ourpartner::create($inputs);

        return redirect()->route('sponsors')->with('message', 'Data created successfully!');
    }
    public function edit_sponsors(Request $request, $id)
    {
        $data = Ourpartner::find($id);
//    dd($data);
        $sponsor = Ourpartner::all();
        return view('admin.our-partners.edit', compact('sponsor', 'data'));
    }
    public function update_sponsors(Request $request, $id)
    {
        $filename = "";

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $path = public_path() . '/upload/partner/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $request->logo = $filename;
            $inputs = $request->except(['_token']);
            $inputs["logo"] = $filename;
            Ourpartner::where('id', $id)->update($inputs);
        } else {
            $inputs = $request->except(['_token']);
            // dd($inputs);
            Ourpartner::where('id', $id)->update($inputs);
        }
        return redirect()->route('sponsors')->with('message', 'Data Updated Successfully!');
    }
    public function destroy_sponsors(Request $request)
    {
        Ourpartner::find($request->id)->delete();
        return response()->json(array('success' => true));
    }
    public function feature_sponsor(Request $request)
    {
        $data = Ourpartner::where('id', $request->id)->first();
        // dd($data);
        if (isset($data) && $data->status == 0) {
            Ourpartner::where('id', $request->id)->update(['status' => 1]);
        } else {
            Ourpartner::where('id', $request->id)->update(['status' => 0]);
        }
        return response()->json(array('success' => true));
    }

    public function advisoryboards(Request $request)
    {
        return view('admin.advisory-board.index');
    }

    public function getAdvisoryboards(Request $request)
    {
        $columns = array(
            0 => 'name',
            1 => 'web_link',
            2 => 'status',
            2 => 'position',
        );

        $totalData = Advisory::all()->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = Advisory::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts = Advisory::
                where('name', 'LIKE', "%{$search}%")
                ->orWhere('web_link', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
                ->orWhere('position', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Advisory::
                where('name', 'LIKE', "%{$search}%")
                ->orWhere('web_link', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
                ->orWhere('position', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $edit =  route('edit_advisoryboards',$post->id);
                $picture = '/upload/advisory/'.$post->featured_image;
                $nestedData['number'] = $post->id;
                $nestedData['name'] = $post->name;
                $nestedData['position'] = $post->position;
                $nestedData['web_link'] = $post->web_link;
                $nestedData['logo'] = "<img src='{$picture}' height='30' width='60' style='margin-top: 10px'>";
                if ($post->status == 1) {
                    $nestedData['status'] = '<p class="text-white mb-1 font-weight-bold text-center bg-warning p-1 mr-1">published</p>';
                } else {
                    $nestedData['status'] = '<p class="text-white mb-1 font-weight-bold text-center bg-dark p-1 mr-1"> not published</p>';
                }
                    $nestedData['actions'] = "&emsp;
                    <a href= ''class='btn mb-1 btn-success'><i data-id='{$post->id}' class='fa fa-power-off status'></i></a>
                    <a href='' class='btn btn-xs btn-danger text-white mb-1'><i  data-id='{$post->id}' class='fa fa-trash delete fa-fw'></i></a>
                    <a href='{$edit}' class='btn btn-xs btn-info mb-1'><i class='fas fa-edit'></i></a>

                    ";

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

    public function create_advisoryboards(Request $request)
    {

        $filename = "";

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $path = public_path() . '/upload/advisory/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $request->logo = $filename;
        }
        $inputs = $request->all();
        $inputs["logo"] = $filename;
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        // dd($inputs);
        Advisory::create($inputs);

        return redirect()->route('advisoryboards')->with('message', 'Data created successfully!');
    }
    public function edit_advisoryboards(Request $request, $id)
    {
        $data = Advisory::find($id);
//    dd($data);
        $sponsor = Advisory::all();
        return view('admin.advisory-board.edit', compact('sponsor', 'data'));
    }
    public function update_advisoryboards(Request $request, $id)
    {
        $filename = "";

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $path = public_path() . '/upload/advisory/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $request->logo = $filename;
            $inputs = $request->except(['_token']);
            $inputs["logo"] = $filename;
            Advisory::where('id', $id)->update($inputs);
        } else {
            $inputs = $request->except(['_token']);
            // dd($inputs);
            Advisory::where('id', $id)->update($inputs);
        }
        return redirect()->route('advisoryboards')->with('message', 'Data Updated Successfully!');
    }
    public function destroy_advisoryboards(Request $request)
    {
        Advisory::find($request->id)->delete();
        return response()->json(array('success' => true));
    }
    public function feature_advisoryboards(Request $request)
    {
        $data = Advisory::where('id', $request->id)->first();
        // dd($data);
        if (isset($data) && $data->status == 0) {
            Advisory::where('id', $request->id)->update(['status' => 1]);
        } else {
            Advisory::where('id', $request->id)->update(['status' => 0]);
        }
        return response()->json(array('success' => true));
    }

    public function pages(Request $request)
    {
        return view('admin.page-manager.index');
    }

    public function getPage(Request $request)
    {
        $columns = array(
            0 => 'title',
             1 => 'published',
            // 2 => 'email',
        );

        $totalData = Pagemanager::all()->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = Pagemanager::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts = Pagemanager::
                where('title', 'LIKE', "%{$search}%")
                ->orWhere('published', 'LIKE', "%{$search}%")
                // ->orWhere('email', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Pagemanager::
                where('title', 'LIKE', "%{$search}%")
                ->orWhere('published', 'LIKE', "%{$search}%")
                // ->orWhere('title', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $edit =  route('edit_pages',$post->id);
                $nestedData['number'] = $post->id;
                $nestedData['title'] = $post->title;
                if ($post->published == 1) {
                    $nestedData['published'] = '<p class="text-white mb-1 font-weight-bold text-center bg-warning p-1 mr-1">published</p>';
                } else {
                    $nestedData['published'] = '<p class="text-white mb-1 font-weight-bold text-center bg-dark p-1 mr-1"> not published</p>';
                }
                    $nestedData['actions'] = "&emsp;
                    <a href='' class='btn btn-xs btn-danger text-white mb-1'><i  data-id='{$post->id}' class='fa fa-trash delete fa-fw'></i></a>
                    <a href='{$edit}' class='btn btn-xs btn-info mb-1'><i class='fas fa-edit'></i></a>

                    ";

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

    public function add_pages(Request $request)
    {
        return view('admin.page-manager.add');
    }
    public function create_pages(Request $request)
    {

        $filename = "";

        if ($request->hasFile('page_image')) {
            $image = $request->file('page_image');
            $path = public_path() . '/upload/pages/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $request->page_image = $filename;
        }
        $inputs = $request->all();
        $inputs["page_image"] = $filename;
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        // dd($inputs);
        Pagemanager::create($inputs);

        return redirect()->route('pages')->with('message', 'Data created successfully!');
    }
    public function edit_pages(Request $request, $id)
    {
        $data = Pagemanager::find($id);
//    dd($data);
        return view('admin.page-manager.edit', compact('data'));
    }
    public function update_pages(Request $request, $id)
    {
        $filename = "";

        if ($request->hasFile('page_image')) {
            $image = $request->file('page_image');
            $path = public_path() . '/upload/pages/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $request->page_image = $filename;
            $inputs = $request->except(['_token']);
            $inputs["page_image"] = $filename;
            Pagemanager::where('id', $id)->update($inputs);
        } else {
            $inputs = $request->except(['_token']);
            // dd($inputs);
            Pagemanager::where('id', $id)->update($inputs);
        }
        return redirect()->route('pages')->with('message', 'Data Updated Successfully!');
    }
    public function destroy_pages(Request $request)
    {
        Pagemanager::find($request->id)->delete();
        return response()->json(array('success' => true));
    }

    public function news(Request $request)
    {
        return view('admin.news.index');
    }

    public function getNews(Request $request)
    {
        $columns = array(
            0 => 'title',
            // 1 => 'name',
            // 2 => 'email',
        );

        $totalData = News::all()->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = News::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts = News::
                where('title', 'LIKE', "%{$search}%")
                // ->orWhere('title', 'LIKE', "%{$search}%")
                // ->orWhere('email', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = News::
                where('title', 'LIKE', "%{$search}%")
                // ->orWhere('email', 'LIKE', "%{$search}%")
                // ->orWhere('title', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $edit =  route('edit_news',$post->id);
                $picture = '/upload/slider/'.$post->featured_image;
                $nestedData['number'] = $post->id;
                $nestedData['title'] = $post->title;
                $nestedData['featured_image'] = "<img src='{$picture}' height='30' width='60' style='margin-top: 10px'>";
                $nestedData['actions'] = "&emsp;
                    <a href='' class='btn btn-xs btn-danger text-white mb-1'><i  data-id='{$post->id}' class='fa fa-trash delete fa-fw'></i></a>
                    <a href='{$edit}' class='btn btn-xs btn-info mb-1'><i class='fas fa-edit'></i></a>

                    ";

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

    public function add_news(Request $request)
    {
        $catagory = Category::all();
        return view('admin.news.add', compact('catagory'));
    }
    public function create_news(Request $request)
    {

        $filename = "";

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $path = public_path() . '/upload/news/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $request->featured_image = $filename;
        }
        $inputs = $request->all();
        $inputs["featured_image"] = $filename;
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        // dd($inputs);
        News::create($inputs);

        return redirect()->route('news')->with('message', 'Data created successfully!');
    }
    public function edit_news(Request $request, $id)
    {
        $data = News::find($id);
        $catagory = Category::all();
//    dd($data);
        return view('admin.news.edit', compact('data', 'catagory'));
    }
    public function update_news(Request $request, $id)
    {
        $filename = "";

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $path = public_path() . '/upload/news/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $request->featured_image = $filename;
            $inputs = $request->except(['_token']);
            $inputs["featured_image"] = $filename;
            News::where('id', $id)->update($inputs);
        } else {
            $inputs = $request->except(['_token']);
            // dd($inputs);
            News::where('id', $id)->update($inputs);
        }
        return redirect()->route('news')->with('message', 'Data Updated Successfully!');
    }
    public function destroy_news(Request $request)
    {
        News::find($request->id)->delete();
        return response()->json(array('success' => true));
    }

    public function faqs(Request $request)
    {
       
        return view('admin.Faqs.index');
    }

    public function getFaqs(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'question',
            2 => 'answer',
            3 => 'status',
        );

        $totalData = Faq::all()->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = Faq::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts = Faq::
                where('question', 'LIKE', "%{$search}%")
                ->orWhere('answer', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Faq::
            where('question', 'LIKE', "%{$search}%")
            ->orWhere('answer', 'LIKE', "%{$search}%")
            ->orWhere('status', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $edit =  route('edit_faqs',$post->id);
                $nestedData['number'] = $post->id;
                $nestedData['question'] = $post->question;
                $nestedData['answer'] = $post->answer;
                if ($post->status == 1) {
                    $nestedData['status'] = '<p><span class="right badge badge-success">Enabled</span></p>';
                } else {
                    $nestedData['status'] = '<p><span class="right badge badge-danger">Disable</span></p>';
                }
                    $nestedData['actions'] = "&emsp;
                    <a href= ''class='btn mb-1 btn-success'><i data-id='{$post->id}' class='fa fa-power-off status'></i></a>
                    <a href='' class='btn btn-xs btn-danger text-white mb-1'><i  data-id='{$post->id}' class='fa fa-trash delete fa-fw'></i></a>
                    <a href='{$edit}' class='btn btn-xs btn-info mb-1'><i class='fas fa-edit'></i></a>

                    ";

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

    public function add_faqs(Request $request)
    {
        $catagory = Category::all();
        return view('admin.Faqs.add', compact('catagory'));
    }
    public function create_faqs(Request $request)
    {
        $inputs = $request->all();
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        // dd($inputs);
        Faq::create($inputs);

        return redirect()->route('faqs')->with('message', 'Data created successfully!');
    }
    public function edit_faqs(Request $request, $id)
    {
        $data = Faq::find($id);
        $catagory = Category::all();
//    dd($data);
        return view('admin.Faqs.edit', compact('data', 'catagory'));
    }
    public function update_faqs(Request $request, $id)
    {
        $inputs = $request->except(['_token']);
        // dd($inputs);
        Faq::where('id', $id)->update($inputs);
        return redirect()->route('faqs')->with('message', 'Data Updated Successfully!');
    }
    public function destroy_faqs(Request $request)
    {
        Faq::find($request->id)->delete();
        return response()->json(array('success' => true));
    }
    public function feature_faqs(Request $request)
    {
        $data = Faq::where('id', $request->id)->first();
        // dd($data);
        if (isset($data) && $data->status == 0) {
            Faq::where('id', $request->id)->update(['status' => 1]);
        } else {
            Faq::where('id', $request->id)->update(['status' => 0]);
        }
        return response()->json(array('success' => true));
    }

    public function testimonials(Request $request)
    {
        $testi = Testimonial::all();
        return view('admin.testimonials.index', compact('testi'));
    }


    public function getTestimonials(Request $request)
    {
        $columns = array(
            0 => 'id',
            0 => 'name',
            1 => 'title',
            2 => 'content',
            3 => 'status',
        );

        $totalData = Testimonial::all()->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = Testimonial::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts = Testimonial::
                where('name', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->orWhere('content', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Testimonial::
            where('name', 'LIKE', "%{$search}%")
            ->orWhere('title', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%")
            ->orWhere('status', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $edit =  route('edit_testimonials',$post->id);
                $nestedData['number'] = $post->id;
                $nestedData['name'] = $post->name;
                $nestedData['title'] = $post->title;
                $nestedData['content'] = $post->content;
                if ($post->status == 1) {
                    $nestedData['status'] = '<p><span class="right badge badge-success">Enabled</span></p>';
                } else {
                    $nestedData['status'] = '<p><span class="right badge badge-danger">Disable</span></p>';
                }
                    $nestedData['actions'] = "&emsp;
                    <a href= ''class='btn mb-1 btn-success'><i data-id='{$post->id}' class='fa fa-power-off status'></i></a>
                    <a href='' class='btn btn-xs btn-danger text-white mb-1'><i  data-id='{$post->id}' class='fa fa-trash delete fa-fw'></i></a>
                    <a href='{$edit}' class='btn btn-xs btn-info mb-1'><i class='fas fa-edit'></i></a>

                    ";

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


    public function add_testimonials(Request $request)
    {
        $catagory = Category::all();
        return view('admin.testimonials.add', compact('catagory'));
    }
    public function create_testimonials(Request $request)
    {

        $filename = "";

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = public_path() . '/upload/testimonials/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $request->image = $filename;
        }
        $inputs = $request->all();
        $inputs["image"] = $filename;
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        //  dd($inputs);
        Testimonial::create($inputs);

        return redirect()->route('testimonials')->with('message', 'Data created successfully!');
    }
    public function edit_testimonials(Request $request, $id)
    {
        $data = Testimonial::findOrFail($id);
//    dd($data);
        return view('admin.testimonials.edit', compact('data'));
    }
    public function update_testimonials(Request $request, $id)
    {
        $filename = "";

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = public_path() . '/upload/testimonials/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $request->image = $filename;
            $inputs = $request->except(['_token']);
            $inputs["image"] = $filename;
            Testimonial::where('id', $id)->update($inputs);
        } else {
            $inputs = $request->except(['_token']);
            // dd($inputs);
            Testimonial::where('id', $id)->update($inputs);
        }
        return redirect()->route('testimonials')->with('message', 'Data Updated Successfully!');
    }
    public function destroy_testimonials(Request $request)
    {
        Testimonial::find($request->id)->delete();
        return response()->json(array('success' => true));
    }
    public function feature_testimonials(Request $request)
    {
        $data = Testimonial::where('id', $request->id)->first();
        // dd($data);
        if (isset($data) && $data->status == 0) {
            Testimonial::where('id', $request->id)->update(['status' => 1]);
        } else {
            Testimonial::where('id', $request->id)->update(['status' => 0]);
        }
        return response()->json(array('success' => true));
    }

    public function reasons(Request $request)
    {
        return view('admin.Why-a-language-trainer.index');
    }

    public function getReasons(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'title',
            2 => 'content',
            3 => 'status',
        );

        $totalData = Reason::all()->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = Reason::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts = Reason::
                where('title', 'LIKE', "%{$search}%")
                ->orWhere('content', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Reason::
            where('title', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%")
            ->orWhere('status', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $edit =  route('edit_reasons',$post->id);
                $nestedData['number'] = $post->id;
                $nestedData['title'] = $post->title;
                $nestedData['content'] = $post->content;
                if ($post->status == 1) {
                    $nestedData['status'] = '<p><span class="right badge badge-success">Enabled</span></p>';
                } else {
                    $nestedData['status'] = '<p><span class="right badge badge-danger">Disable</span></p>';
                }
                    $nestedData['actions'] = "&emsp;
                    <a href= ''class='btn mb-1 btn-success'><i data-id='{$post->id}' class='fa fa-power-off status'></i></a>
                    <a href='' class='btn btn-xs btn-danger text-white mb-1'><i  data-id='{$post->id}' class='fa fa-trash delete fa-fw'></i></a>
                    <a href='{$edit}' class='btn btn-xs btn-info mb-1'><i class='fas fa-edit'></i></a>

                    ";

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

    public function add_reasons(Request $request)
    {
        return view('admin.Why-a-language-trainer.add');
    }
    public function create_reasons(Request $request)
    {
        $inputs = $request->all();
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        // dd($inputs);
        Reason::create($inputs);

        return redirect()->route('reasons')->with('message', 'Data created successfully!');
    }
    public function edit_reasons(Request $request, $id)
    {
        $data = Reason::find($id);
//    dd($data);
        return view('admin.Why-a-language-trainer.edit', compact('data'));
    }
    public function update_reasons(Request $request, $id)
    {
        $inputs = $request->except(['_token']);
        // dd($inputs);
        Reason::where('id', $id)->update($inputs);
        return redirect()->route('reasons')->with('message', 'Data Updated Successfully!');
    }
    public function destroy_reasons(Request $request)
    {
        Reason::find($request->id)->delete();
        return response()->json(array('success' => true));
    }
    public function feature_reasons(Request $request)
    {
        $data = Reason::where('id', $request->id)->first();
        // dd($data);
        if (isset($data) && $data->status == 0) {
            Reason::where('id', $request->id)->update(['status' => 1]);
        } else {
            Reason::where('id', $request->id)->update(['status' => 0]);
        }
        return response()->json(array('success' => true));
    }

    public function sliders(Request $request)
    {
        $testi = Slider::all();
        return view('admin.animated-slide.index', compact('testi'));
    }

    public function getSlider(Request $request)
    {
        $columns = array(
            0 => 'name',
            // 1 => 'title',
            // 2 => 'email',
        );

        $totalData = Slider::all()->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = Slider::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts = Slider::
                where('name', 'LIKE', "%{$search}%")
                // ->orWhere('title', 'LIKE', "%{$search}%")
                // ->orWhere('email', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Slider::
                where('name', 'LIKE', "%{$search}%")
                // ->orWhere('email', 'LIKE', "%{$search}%")
                // ->orWhere('title', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $edit =  route('edit_sliders',$post->id);
                $picture = '/upload/slider/'.$post->image;
                $nestedData['number'] = $post->id;
                $nestedData['name'] = $post->name;
                $nestedData['image'] = "<img src='{$picture}' height='30' width='60' style='margin-top: 10px'>";
                if ($post->status == 1) {
                    $nestedData['status'] = '<p><span class="right badge badge-success">Enabled</span></p>';
                } else {
                    $nestedData['status'] = '<p><span class="right badge badge-danger">Disable</span></p>';
                }
                    $nestedData['actions'] = "&emsp;
                    <a href= ''class='btn mb-1 btn-success'><i data-id='{$post->id}' class='fa fa-power-off status'></i></a>
                    <a href='' class='btn btn-xs btn-danger text-white mb-1'><i  data-id='{$post->id}' class='fa fa-trash delete fa-fw'></i></a>
                    <a href='{$edit}' class='btn btn-xs btn-info mb-1'><i class='fas fa-edit'></i></a>

                    ";

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

    public function add_sliders(Request $request)
    {
        return view('admin.animated-slide.add');
    }
    public function create_sliders(Request $request)
    {

        $filename = "";

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = public_path() . '/upload/slider/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $request->image = $filename;
        }
        $inputs = $request->all();
        $inputs["image"] = $filename;
        $user = Auth::user()->id;
        $inputs["user_id"] = $user;
        //  dd($inputs);
        Slider::create($inputs);

        return redirect()->route('sliders')->with('message', 'Data created successfully!');
    }
    public function edit_sliders(Request $request, $id)
    {
        $data = Slider::findOrFail($id);
//    dd($data);
        return view('admin.animated-slide.edit', compact('data'));
    }
    public function update_sliders(Request $request, $id)
    {
        $filename = "";

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = public_path() . '/upload/slider/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $request->image = $filename;
            $inputs = $request->except(['_token']);
            $inputs["image"] = $filename;
            Slider::where('id', $id)->update($inputs);
        } else {
            $inputs = $request->except(['_token']);
            // dd($inputs);
            Slider::where('id', $id)->update($inputs);
        }
        return redirect()->route('sliders')->with('message', 'Data Updated Successfully!');
    }
    public function destroy_sliders(Request $request)
    {
        Slider::find($request->id)->delete();
        return response()->json(array('success' => true));
    }
    public function status_slider(Request $request)
    {
        $data = Slider::where('id', $request->id)->first();
        // dd($data);
        if (isset($data) && $data->status == 0) {
            Slider::where('id', $request->id)->update(['status' => 1]);
        } else {
            Slider::where('id', $request->id)->update(['status' => 0]);
        }
        return response()->json(array('success' => true));
    }

    public function getTeacher(Request $request)
    {
        $columns = array(
            0 => 'name',
            1 => 'title',
            2 => 'email',
        );

        $totalData = User::where('roll_id', 2)->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = User::where('roll_id', 2)->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts = User::where('roll_id', 2)->where('name', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = User::where('roll_id', 2)->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $show =  route('teacher_courses',$post->id);
                $edit =  route('edit_teacher',$post->id);
                $nestedData['number'] = $post->id;
                $nestedData['name'] = $post->name;
                $nestedData['title'] = $post->email;
                $nestedData['email'] = $post->email;
                if ($post->status == 1) {
                    $nestedData['status'] = '<p><span class="right badge badge-success">Enabled</span></p>';
                } else {
                    $nestedData['status'] = '<p><span class="right badge badge-danger">Disable</span></p>';
                }
                    $nestedData['actions'] = "&emsp;
                    <a href='{$edit}' class='btn btn-xs btn-info mb-1'><i class='fas fa-edit'></i></a>
                    <a href='' class='btn btn-xs btn-danger text-white mb-1'><i  data-id='{$post->id}' class='fa fa-trash delete fa-fw'></i></a>
                    <a href='{$show}' class='btn btn-warning mb-1'>Courses</a>
                    

                    ";

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

    public function blogCategory(){
        return view('admin.forum.blogcategory');
    }

    public function add_blogcategory(){
        return view('admin.forum.addblogcateory');
    }

    public function create_blogcategory( Request $request){
         $caregory =  new BlogCategory;
         $caregory->name = $request->name;
         $caregory->maincategory = $request->maincategory;
         $caregory->color = $request->color;
         $caregory->order = $request->order;
         $caregory->status = 1;
         $caregory->save();
         return redirect()->back()->with('message','Category Added');
    }
    public function blogTopic(){
        return view('admin.blogtopic.index');
    }
    public function getBlogTopic(Request $request){
        $columns = array(
            0 => 'category',
            1 => 'title',
            2 => 'subject',
            3 => 'comments',
        );

        $totalData = BlogTopic::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = BlogTopic::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts = BlogTopic::where('name', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->orWhere('category', 'LIKE', "%{$search}%")
                ->orWhere('subject', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = BlogTopic::where('name', 'LIKE', "%{$search}%")
               ->orWhere('title', 'LIKE', "%{$search}%")
                ->orWhere('category', 'LIKE', "%{$search}%")
                ->orWhere('subject', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $delete =  route('delete-blogtopic',$post->id);
                $edit =  route('edit_blogtopic',$post->id);
                $nestedData['category'] = $post->category;
                $nestedData['title'] = $post->title;
                $nestedData['subject'] = $post->subject;
                $nestedData['comments'] = $post->comments;
                if ($post->status == 1) {
                    $nestedData['status'] = '<p><span class="right badge badge-success">Enabled</span></p>';
                } else {
                    $nestedData['status'] = '<p><span class="right badge badge-danger">Disable</span></p>';
                }
                if ($post->status == 1) {
                    $nestedData['actions'] = "&emsp;
                    <a href='{$edit}' class='btn btn-xs btn-info mb-1'><i class='fas fa-edit'></i></a>
                    <a href='' class='btn btn-xs btn-danger text-white mb-1'><i  data-id='{$post->id}' class='fa fa-trash delete fa-fw'></i></a>
                   
                    ";
                } else {
                    $nestedData['actions'] = "&emsp;
                    <a href='{$edit}' class='btn btn-xs btn-info mb-1'><i class='fas fa-edit'></i></a>
                    <a href='' class='btn btn-xs btn-danger text-white mb-1'><i  data-id='{$post->id}' class='fa fa-trash delete fa-fw'></i></a>
                  
                    ";
                }

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

    public function deleteblogtopic($id){
        BlogTopic::find($id)->delete();
        return redirect()->back()->with('message','Bog Topic Deleted Successfully');
    }
    public function editblogTopic($id){
       $topic =  BlogTopic::find($id);
       return view('admin.blogtopic.edit');
    }
    public function getBlogCategory(Request $request){
        $columns = array(
            0 => 'name',
            1 => 'maincategory',
            2 => 'color',
            3 => 'order',
        );

        $totalData = BlogCategory::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = BlogCategory::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts = BlogCategory::where('name', 'LIKE', "%{$search}%")
                ->orWhere('maincategory', 'LIKE', "%{$search}%")
                ->orWhere('color', 'LIKE', "%{$search}%")
                ->orWhere('order', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = BlogCategory::where('name', 'LIKE', "%{$search}%")
            ->orWhere('maincategory', 'LIKE', "%{$search}%")
            ->orWhere('color', 'LIKE', "%{$search}%")
            ->orWhere('order', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $delete =  route('delete-blogcategory',$post->id);
                $edit =  route('edit_blogcategory',$post->id);
                $nestedData['name'] = $post->name;
                $nestedData['maincategory'] = $post->maincategory;
                $nestedData['color'] = $post->color;
                $nestedData['order'] = $post->order;
              
                if ($post->status == 1) {
                    $nestedData['actions'] = "&emsp;
                    <a href='{$edit}' class='btn btn-xs btn-info mb-1'><i class='fas fa-edit'></i></a>
                    <a href='{$delete}' class='btn btn-xs btn-danger text-white mb-1'><i  data-id='{$post->id}' class='fa fa-trash delete fa-fw'></i></a>
                   
                    ";
                } else {
                    $nestedData['actions'] = "&emsp;
                    <a href='{$edit}' class='btn btn-xs btn-info mb-1'><i class='fas fa-edit'></i></a>
                    <a href='' class='btn btn-xs btn-danger text-white mb-1'><i  data-id='{$post->id}' class='fa fa-trash delete fa-fw'></i></a>
                  
                    ";
                }

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
}
