<?php

namespace IntelGUA\Sisteg\Http\Controllers;

use Illuminate\Http\Request;
use IntelGUA\Sisteg\Employee_type;
use IntelGUA\Sisteg\Employee_school;
use IntelGUA\Sisteg\Work_state;
use IntelGUA\Sisteg\Contract;
use IntelGUA\Sisteg\School;
use IntelGUA\Sisteg\Language;

class EmployeeSchoolsController extends Controller
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

    public function getEmployee_types()
    {
        $employee_types = Employee_type::orderby('id', 'DESC')->get();
        return $employee_types;
    }

    public function getWork_states()
    {
        $work_states = Work_state::orderby('id', 'DESC')->get();
        return $work_states;
    }

    public function getContracts()
    {
        $contracts = Contract::orderby('id', 'DESC')->get();
        return $contracts;
    }

    public function getSchool()
    {
        $schools = School::orderby('id', 'DESC')->get();
        return $schools;
    }

    public function getLanguages()
    {
        $languages = Language::orderby('id', 'DESC')->get();
        return $languages;
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
