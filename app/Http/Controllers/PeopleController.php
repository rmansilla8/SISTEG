<?php

namespace IntelGUA\Sisteg\Http\Controllers;

use Illuminate\Http\Request;
use IntelGUA\Sisteg\Municipality;
use IntelGUA\Sisteg\Department;
use IntelGUA\Sisteg\Gender;
use IntelGUA\Sisteg\Civil_state;
use IntelGUA\Sisteg\Person;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function getMunicipalities($department_id)
    {
        $municipalities = Municipality::Where('department_id', $department_id)->get();
        return $municipalities;
    }

    public function getDepartments()
    {
        $departments = Department::orderby('id', 'DESC')->get();
        return $departments;
    }

    public function getGenders()
    {
        $genders = Gender::orderby('id', 'DESC')->get();
        return $genders;
    }

    public function getCivilStates()
    {
        $civil_states = Civil_state::orderby('id', 'DESC')->get();
        return $civil_states;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $people = Person::create($request->all());
            return $people;
        }
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
    }
}
