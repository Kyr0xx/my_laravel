<?php

namespace App\Http\Controllers;


use App\Models\studentinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stud = studentinfo::all();
        $stud = studentinfo::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return view('home', compact('stud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student_create');
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
            'name' => 'required|string|max:255',
            'section' => 'required|string|max:25',
            'mobile' => 'required|string',
        ]);

        $stud = new studentinfo;
        $stud->name = $request->input('name');
        $stud->section = $request->input('section');
        $stud->mobile = $request->input('mobile');

        $stud->user_id = Auth::user()->id;
        $stud->save();

        return back()->with('success', 'Successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stud = studentinfo::find($id);
        return view('student_show')->with('stud',$stud);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stud = studentinfo::find($id);
        return view('student_edit')->with('stud', $stud);
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
        $stud = studentinfo::find($id);
        $input = $request->all();
        $stud->update($input);
        return redirect('student')->with('flash_message', 'Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        studentinfo::destroy($id);
        return redirect('student')->with('flasg_message', 'Student Successfully Deleted!');
    }
}
