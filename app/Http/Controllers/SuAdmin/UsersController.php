<?php

namespace App\Http\Controllers\SuAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User ;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('is.suadmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=user::all();
        return view('suadmin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('suadmin.users.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(Request $request)
    {

            $this->validate($request,[
                'name'      => ['required', 'string', 'max:100'],
                'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password'  => ['required', 'string', 'min:8'],
                'photo'     => ['mimes:jpg,jpeg,png','max:600'],
            ]);
        //dd($request->all());

        if($request->hasFile('photo')){
            $file=$request->photo;
            $new_file = time().$file->getClientOriginalName();
            $file-> move('storage/users/userphoto/',$new_file);
        }
        if($request->active=null){
            $request['active']='2';
        }

        User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "photo"=>'storage/users/userphoto/'.$new_file,
            "active"=>$request->active,
            "password"=>Hash::make($request->password),
            "role"=>$request->role,
        ]);
         return redirect()-> route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $users = User::find($id);
        return view('suadmin.users.edit',compact('users'));

        
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
        //
        $this->validate($request,[
            'name'      => ['required', 'string', 'max:100'],
            'email'     => ['required', 'string', 'email', 'max:255'],
            'password'  => ['required', 'string', 'min:8'],
            'photo'     => ['mimes:jpg,jpeg,png','max:600'],
        ]);
        $users = User::find($id);

        if($request->hasFile('photo')){
            $file=$request->photo;
            $new_file = time().$file->getClientOriginalName();
            $file-> move('storage/users/userphoto/',$new_file);
            $users->photo ='storage/users/userphoto/'.$new_file;
            
        }
        $users->name = $request ->name;
        $users->email = $request ->email;
        $users->password = Hash::make($request ->password);
        $users->active=$request->active;
        $users->role=$request->role;


        $users->update();
        return redirect()-> route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $users = User::find($id);
        $users->destroy($id);
        return redirect() ->route('users.index');
    }
}
