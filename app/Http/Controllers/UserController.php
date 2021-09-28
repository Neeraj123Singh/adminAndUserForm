<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('isAdmin','!=',true)->get();
        return View::make('show')->with('data',$data);
    }

    public function find(Request $request)
    {
        $user = User::where('name',$request['name'])->first();
        if(empty($user))
        {
            return 'User not Found';
        }
        if($user->password == $request['password'])
        {
            if($user->isAdmin== true)
            {
                return view('adminHome');
            }
            else {
                $name = $user['name'];
                return View::make('userHome')->with('name',$name);;
            }
        }
        return 'Invalid Password';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $validate = $request->validate([
                    'image'=>'bail|required|image',
                    'name'=>'required|string',
                    'willing'=>'required|string',
                    'age'=>'required|integer',
                    'gender'=>'required|string',
            ]);
        }
        catch(Throwable $e)
        {
            return $e->getMessage();
        }
        $pic = $request->file('image')->storeAs('public/images',$request['name'].'.jpg');
        $pic=basename($pic);
        $data = [
            'name'=>$request['name'],
            'willing'=>$request['willing'],
            'age'=>$request['age'],
            'gender'=>$request['gender'],
            'imagePath'=>$pic,
            'password'=>'12345',
            'isAdmin'=>false
        ];
        $user= User::where('name',$request['name'])->first();
        if(!empty($user))
        {
            return 'User Already Exists';
        }
        User::create($data);
        return 'User Cretaed Sucessfully';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = User::where('name',$request['name'])->first();
        return View::make('editPage')->with('data',$data);
    }
    public function editSave(Request $request)
    {
        $user = User::where('name',$request['old'])->first();
        $user1 = User::where('name',$request['name'])->first();
        if(!empty($user1))
        {
            return 'User with this name already exists';
        }
        $pic = $request->file('image')->storeAs('public/images',$request['name'].'.jpg');
        $pic=basename($pic);
        $data = [
            'name'=>$request['name'],
            'willing'=>$request['willing'],
            'age'=>$request['age'],
            'gender'=>$request['gender'],
            'imagePath'=>$pic,
            'password'=>'12345',
            'isAdmin'=>false
        ];
        $user->update($data);
       return 'Value Upadted Sucessfully';
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user= User::where('name',$request['name'])->first();
        if(empty($user))
        {
            return 'User not Exists';
        }
        else{
            if($user->isAdmin==true)
            {
                return 'Cannot Delete Admin User';
            }
            
            $user->delete();
            return 'User Deleted Sucessfully';
        }
    }
}
