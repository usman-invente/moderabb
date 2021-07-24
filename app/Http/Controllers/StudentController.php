<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\User;
use App\Models\TrainingNeed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function strainings()
    {
        $data = TrainingNeed::where('user_id',Auth::user()->id)->get();
        return view ('student.trainingNeed.index',compact('data'));
    }
    public function sadd_trainings()
    {
        $data = Category::all();
        return view ('student.trainingNeed.add',compact('data'));
    }
    public function screate_trainings(Request $request)
    {
        $inputs = $request->all();
        $user = Auth::user()->id;
        $inputs["user_id"]=$user;
        TrainingNeed::create($inputs);
        return redirect()->route('strainings')->with('message', 'Data Created Successfully!');
    }
    public function sdestroy_trainings($id)
    {
        TrainingNeed::find($id)->delete();
        return response()->json(array('success' => true));
    }
    public function sedit_trainings(Request $request , $id)
    {
        $data = TrainingNeed::find($id);
        $cata = Category::all();
        return view('student.trainingNeed.edit',compact('data','cata'));
    }
    public function supdate_trainings(Request $request , $id)
    {
                    $inputs = $request->except(['_token']);
                    // dd($inputs);
                    TrainingNeed::where('id', $id)->update($inputs);
        return redirect()->route('strainings')->with('message', 'Data Updated Successfully!');
    }
    public function saccount()
    {
        $data = User::where('id',Auth::user()->id)
        ->first();
        return view ('student.account.account',compact('data'));
    }
    public function supdate_account(Request $request , $id)
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

        return redirect()->route('saccount')->with('message', 'Data Updated Successfully!');
    }
}
