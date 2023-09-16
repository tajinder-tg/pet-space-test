<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
       try{

            $validator = $request->validate([
                'email'    => 'required|email|unique:user|max:255',
                'password' => 'required',
            ]);
            
            $input = $request->all();
            $user  = User::where('email',$input['email'])->first();
        
            if($user){
                if(Hash::check($input['password'], $user->password)) {
                    return redirect('dashboard')->with('success', 'Login successfull');
                }else{
                    return redirect('/')->with('error', 'Email and password mismatch');
                }
            }else{
                return redirect('/')->with('error', 'Email not registered with us');
            }
            
        
        }catch($e){
            return redirect('/')->with('error', 'Something went wrong');
        }

    
    }

     /**
     * For logout
     *
     * @return \Illuminate\Http\Response
     */

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(test $test)
    {
        //
    }
}
