<?php

namespace App\Http\Controllers;
use Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard_layouts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard_view.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create($request->all());

        return redirect('/Dashboard/User/Create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = User::get()->all();
        return view('dashboard_view.user.index', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {


        return view('dashboard_view.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'user_type' => $request->user_type,

        ]);

        return redirect('/Dashboard/User/Show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

    }
    public function delete_user(Request $request)
    {
        $booking = DB::table('users')->where('id', $request->id)->delete();
        return response()->json(
            [
                'success' => true,
                'message' => 'Data Deleted'
            ]
        );
        return redirect('/Dashboard/User/Create');
    }
    public function showprofessor(User $user)
    {
        $user = DB::table('users')
        ->where('user_type', '=', 'professor')
        ->get();
        //$user = User::get()->all();
        return view('dashboard_view.professor.index', compact('user'));
    }
    public function showadmin(User $user)
    {
        $user = DB::table('users')
        ->where('user_type', '=', 'admin')
        ->get();
        //$user = User::get()->all();
        return view('dashboard_view.professor.index', compact('user'));
    }
     public function showstudent(User $user)
    {
        $user = DB::table('users')
        ->where('user_type', '=', 'student')
        ->get();
        //$user = User::get()->all();
        return view('dashboard_view.professor.index', compact('user'));
    }


    public function index2()
    {
        return view('auth.login');
    }
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }


    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }
    public function create2(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => ($data['password'])
      ]);
    }


    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function signOut() {
        // Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function showpup(User $user)
    {
        $user = User::findOrFail($user);
     $user = User::get()->all();
       // return view('layouts.partials.navbar', compact('user'));
        return view('home.profile', compact('user'));
    }


    public function editpup(User $user)
    {

        $user = Auth::user();

        return view('home.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updatepup(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'password' => $request->password,
            'user_type' => $request->user_type,

        ]);
        if($request->hasfile('img'))
        {
            $destination = 'uploads/user/'.$user->img;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('img');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/user/', $filename);
            $user->img = $filename;
        }
       // return redirect()->route('posts.index')->with('success','Post updated successfully');

        return redirect('/profile');
    }


    public function open($id)
    {
        $user = User::find($id);

        return view('home.profileprofessor', compact('user'));
    }

}
