<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Http\Requests\StoreChildRequest;
use App\Http\Requests\UpdateChildRequest;
use Illuminate\Http\Request;
use App\Models\Group;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$children = Child::orderBy('child_surname')->paginate(20);
		$groups = Group::all();
		return view('children.index', ['children'=>$children],['groups'=>$groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$groups = Group::all();
        return view('children.create',['groups'=>$groups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChildRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $child = new Child;
		$child->child_name = $request->child_name;
		$child->child_surname = $request->child_surname;
		$child->child_group_id = $request->child_group_id;
		$child->child_parents_email = $request->child_parents_email;
		$child->child_parents_telno = $request->child_parents_telno;
		$child->child_birthdate = $request->child_birthdate;
		$child->deleted_at = null;
		
		$child->save();
		return redirect()->route('child.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function show(Child $child)
    {
		$groups = Group::all();
        return view('children.show', ['child'=>$child],['groups'=>$groups]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function edit(Child $child)
    {
		$groups = Group::all();
        return view('children.edit', ['child'=>$child],['groups'=>$groups]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChildRequest  $request
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Child $child)
    {
		
		$child->child_name = $request->child_name;
		$child->child_surname = $request->child_surname;
		$child->child_group_id = $request->child_group_id;
		$child->child_parents_email = $request->child_parents_email;
		$child->child_parents_telno = $request->child_parents_telno;
		$child->child_birthdate = $request->child_birthdate;
		$child->deleted_at = null;
		
		$child->save();
		return redirect()->route('child.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function destroy(Child $child)
    {
        $child->delete();
		return redirect()->route('child.index')->with('success_message', 'Sėkmingai ištrinta');
    }
}
