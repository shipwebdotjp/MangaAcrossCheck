<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\BookmarkStoreRequest;

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
        $bookmarks = Bookmark::where('user_id', Auth::id())->get();
        return Inertia::render('Bookmark/Index',['bookmarks' => $bookmarks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return Inertia::render('Bookmark/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookmarkStoreRequest $request) //RequestからFormRequestへ変更
    {
        //
        /*
        //FormRequestを使用しない場合はこのように各々バリデーションする必要がある
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:100']
        ])->validatewithBag('saveBookmark');
        */
        //BookmarkStoreRequestによって既に$requestはバリデート済み
        $bookmark = new Bookmark;
        $bookmark->user_id = Auth::id();
        $bookmark->title = $request->title;
        $bookmark->number = $request->number;
        $bookmark->save();
        return redirect()->route('bookmarks.index', $parameters = [], $status = 303, $headers = []);
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
        return Inertia::render('Bookmark/Edit',['bookmark' => $bookmark]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookmarkStoreRequest $request, $id)
    {
        //
        /*
        //FormRequestを使用しない場合はこのように各々バリデーションする必要がある
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:100']
        ])->validatewithBag('saveBookmark');
        */
        //BookmarkStoreRequestによって既に$requestはバリデート済み
        $bookmark = Bookmark::where([['user_id', Auth::id()],['id',$id]])->firstOrFail();
        $bookmark->title = $request->title;
        $bookmark->number = $request->number;
        $bookmark->completed = $request->boolean('completed');
        $bookmark->save();
        return redirect()->route('bookmarks.index', $parameters = [], $status = 303, $headers = []);
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
        return redirect()->route('bookmarks.index', $parameters = [], $status = 303, $headers = []);
    }
}
