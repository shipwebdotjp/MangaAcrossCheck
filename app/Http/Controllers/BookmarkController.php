<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $bookmark = Bookmark::where('user_id', Auth::id())->get();
        //$all = Auth::user()->bookmark();
        return $bookmark->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bookmark.create');
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
        $bookmark = new Bookmark;
        $bookmark->user_id = Auth::id();
        $bookmark->title = $request->title;
        $bookmark->number = $request->number;
        $bookmark->save();
        return $bookmark->toArray();
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
        $bookmark = Bookmark::where([['user_id', Auth::id()],['id',$id]])->first();
        return $bookmark->toArray();
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
        $bookmark = Bookmark::where([['user_id', Auth::id()],['id',$id]])->firstOrFail();
        return view('bookmark.edit',compact('bookmark'));
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
        //
        $bookmark = Bookmark::where([['user_id', Auth::id()],['id',$id]])->firstOrFail();
        //$bookmark->user_id = Auth::id();
        $bookmark->title = $request->title;
        $bookmark->number = $request->number;
        $bookmark->completed = $request->completed ? True : False;
        $bookmark->save();
        return $bookmark->toArray();
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
        $bookmark = Bookmark::where([['user_id', Auth::id()],['id',$id]])->delete();
        return redirect('/bookmarks');
    }
}
