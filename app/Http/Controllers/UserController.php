<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles=\App\User::paginate(10);
        return view('profiles/index',compact('profiles'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = \App\User::find($id);
        return view('profiles/show', compact('profile', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Auth::user();
        return view('/profiles/edit', ['profile' => $profile]);
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
        $profile = Auth::user();

        $profile->name = $request->get('name');
        $profile->email = $request->get('mail');
        $profile->save();

        return view('/profiles/show', compact('profile', 'id'));
    }

    public function makeAdmin(Request $request, $id) {

        $profile = \App\User::find($id);

        if ($profile->isAdmin == false) {
            $profile->isAdmin = true;
        }
        else {
            $profile->isAdmin = false;
        }
        $profile->save();

        return redirect('/profiles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = \App\User::find($id);

        $profile->delete();
        return redirect('/profiles');
    }
}
