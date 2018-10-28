<?php

namespace IntelGUA\Sisteg\Http\Controllers;

use Illuminate\Http\Request;
use IntelGUA\Sisteg\Affiliate;
use IntelGUA\Sisteg\Affiliate_state;
use Illuminate\Support\Facades\DB;
use IntelGUA\Sisteg\Employee;
use IntelGUA\Sisteg\Person;
use IntelGUA\Sisteg\Gender;
use IntelGUA\Sisteg\Title;
use IntelGUA\Sisteg\School;

class AffiliatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('affiliates.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('affiliates.create');
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

            $affiliates = Affiliate::create($request->all());
            return $affiliates;

        }
    }

    public function getAllAffiliates()
    {
        /**join('tablaSecundaria', 'TablaSecundaria.id', '=', 'TablaPrincipal.TablaSecundaria_id') */
        // $affiliates = DB::table('schools', 'titles')
        //     ->join('employee_school', 'schools.id', '=', 'employee_school.school_id')
        //     ->join('employees', 'employees.id', '=', 'employee_school.employee_id')
        //     ->join('employee_title', 'employees.id', '=', 'employee_title.employee_id')
        //     ->join('titles', 'titles.id', '=', 'employee_title.title_id')
        //     ->join('affiliates', 'affiliates.id', '=', 'employees.id')
        //     ->join('people', 'people.id', '=', 'employees.person_id')
        //     ->join('genders', 'genders.id', '=', 'people.gender_id')
        //     ->select('employees.dpi', 'titles.description AS title', 'schools.name AS school', 'affiliates.*', 'people.names', 'people.surnames', 'genders.description AS gender')
        //     ->get();
        $affiliates = DB::table('affiliates')
            ->join('employees', 'employees.id', '=', 'affiliates.employee_id')
            ->join('people', 'people.id', '=', 'employees.person_id')
            ->join('employee_schools', 'employees.id', '=', 'employee_schools.employee_id')
            ->join('schools', 'schools.id', 'employee_schools.school_id')
            ->join('employee_titles', 'employees.id', '=', 'employee_titles.employee_id')
            ->join('titles', 'titles.id', '=', 'employee_titles.title_id')
            ->join('genders', 'genders.id', '=', 'people.gender_id')
            ->select('affiliates.*', 'employees.dpi', 'people.names', 'people.surnames', 'schools.name AS school', 'titles.description AS title', 'genders.description AS gender')
            ->get();
        return (compact('affiliates'));
    }

    public function getAffiliateStates()
    {
        $affiliate_states = Affiliate_state::orderby('id', 'DESC')->get();
        return $affiliate_states;
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
        if ($request->ajax()) {

            $affiliates = Affiliate::find($request->id);
            return response($affiliates);

        }
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
        if ($request->ajax()) {

            $affiliates = Affiliate::find($request->id);
            $affiliates->update($request->all());
            return response($affiliates);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $affiliates = Affiliate::findOrFail($id);
            $affiliates->delete();
            return redirect('affiliates')->with('success', 'Afiliado eliminado exitosamente');
        }
        return redirect('affiliates')->with('fail', 'Afiliado eliminado exitosamente');
    }

}
