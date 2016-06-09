<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;

use App\Http\Requests;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();

        return response()->json(['lessons' => $lessons]);
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
        $this->validate($request, [
            'category' => 'required',
            'title' => 'required',
            'content' => 'required',
            'grade' => 'required'
        ]);

        $lesson = new Lesson();
        $lesson->category_id = $request['category'];
        $lesson->title = $request['title'];
        $lesson->author = $request['author'];
        $lesson->content = $request['content'];
        $lesson->grade = $request['grade'];
        $lesson->save();

        return response()->json(['lesson' => $lesson]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);

        return response()->json(['lesson' => $lesson]);
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
            'category' => 'required',
            'title' => 'required',
            'content' => 'required',
            'grade' => 'required'
        ]);

        $lesson = Lesson::find($id);
        $lesson->category_id = $request['category'];
        $lesson->title = $request['title'];
        $lesson->content = $request['content'];
        $lesson->grade = $request['grade'];
        $lesson->save();

        return response()->json(['lesson' => $lesson]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();

        return response()->json(['message' => 'Потребител успешно изтрит']);
    }
}
