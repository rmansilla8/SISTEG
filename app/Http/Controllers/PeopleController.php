<?php

namespace IntelGUA\Sisteg\Http\Controllers;

use Illuminate\Http\Request;
use IntelGUA\Sisteg\Municipality;
use IntelGUA\Sisteg\Department;
use IntelGUA\Sisteg\Gender;
use IntelGUA\Sisteg\Civil_state;
use IntelGUA\Sisteg\Person;
use IntelGUA\Sisteg\Employee;
use IntelGUA\Sisteg\Affiliate;
use Illuminate\Support\Facades\DB;

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
        //if ($request->ajax()) {
            // $person = new Person();
            // $people = $request->all();
            // $people->save();
            // return $people;
       // }
        if ($request->ajax()) {
            DB::beginTransaction();
            try {
                $person = new Person();
                $person->names = $request->input('names');
                $person->surnames = $request->input('surnames');
                $person->email = $request->input('email');
                $person->phone = $request->input('phone');
                $person->address = $request->input('address');
                $person->municipality_id = $request->input('municipality_id');
                $person->gender_id = $request->input('gender_id');
                $person->birthdate = $request->input('birthdate');
                $person->civil_state_id = $request->input('civil_state_id');
                $person->save();


                $employee = new Employee();
                $employee->dpi = $request->input('dpi');
                $employee->nit = $request->input('nit');
                $employee->scale_register = $request->input('scale_register');
                $employee->person_id = $person->id;
                $employee->ethnic_community_id = $request->input('ethnic_community_id');
                $employee->employee_type_id = $request->input('employee_type_id');
                $employee->save();

                $affiliate = new Affiliate();
                $affiliate->number = str_random(4);
                $affiliate->employee_id = $employee->id;
                $affiliate->affiliate_state_id = $request->input('affiliate_state_id');
                $affiliate->save();

                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
            }




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
