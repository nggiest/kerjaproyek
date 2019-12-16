<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $user = DB::table('users')
        ->join('status', 'status.id','=', 'users.status_id')
        ->select('users.*','status.nama_status as statuses')
        ->get();

        return view('users.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::all();
        $user->password = Hash::make('password');

        $request->validate([
            'name' => 'required|string|min:8|max:128',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'nim' => 'required',
            'status_id' => 'required',
            'role' => 'required',
            //'photo' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        // $uploadphoto = $request->file('photo');
        // $destinationPath = ('public/files');
        // $extension = $uploadphoto->getClientOriginalExtension();
        // $photo = Uuid::generate(4).'.'.$extension;
        $user = User::create([
            'name' => $request['name'],
            'email'=> $request['email'],
            'password' => bcrypt($request['password']),
            'nim' => $request['nim'],
            'status_id'=> $request['status_id'],
            'role'=> $request['role'],
            //'photo' => $photo,
        ]);
        //$uploadphoto->storeAs($destinationPath,$photo);

        //Alert::message('User save successfully','Success');
        return redirect()->route('user.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Users::findOrFail($id);
        $user = $request->session()->get('login');
        return view('user.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if (Auth::check())
        // {
            $user=User::findOrFail($id);
            return view('users.edit', compact('user'));
        // }
        // else {
        //     return redirect()->route('login');
        // }
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|min:8|max:128',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'nim' => 'required|string',
            'status_id' => 'requied',
            'role' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png'
        ]);
        
        $user = User::findOrFail($id);
        $user->password = Hash::make('password');
        $user->name = $request->name;
        $user->nim = $request->nim;
        $user->status_id = $request->status_id;
        $user->role = $request->role;
        $user->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $projectmember = ProjectMember::where('user_id',$id);
        $projectmember->delete();
        $user->delete();
        Alert::success('Deleted Success', 'Success');
        return redirect()->route('user.index');
    }

    public function changepassword($id)
    {
        $user = User::findOrFail($id);
        return view('users.changepassword', compact('user'));

    }

    public function gantipwd(Request $request, $id){
        $user = User::findOrFail($id);
        $this->validate($request,[
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user->update([
            'password' => bcrypt($request['password']),
        ]);
        // dd($request);
        
        Alert::message('Password changed successfully','Success');
        
        return redirect()->route('home');

    }
}
