<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
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

        if (request()->has('image')) {
            request()->validate([
                'image' => 'file|image',
            ]);
            $profile->image = request()->image->store('uploads', 'public');
            
            // Scaling the image
            $image = Image::make(public_path('storage/' . $profile->image))->fit(200, 200);

            // Watermark
            $image->text('BookReviews', 190, 190, function($font) {
                $font->color('#72BCD4');
                $font->align('right');
                $font->valign('bottom');
            });

            $image->save();
        }
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
