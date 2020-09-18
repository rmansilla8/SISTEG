<?php

namespace IntelGUA\Sisteg\Http\Controllers;

use Illuminate\Http\Request;
use IntelGUA\Sisteg\Level;
use IntelGUA\Sisteg\School_district;
use IntelGUA\Sisteg\Area;
use IntelGUA\Sisteg\Classification;
use IntelGUA\Sisteg\Modality;
use IntelGUA\Sisteg\Turn;
use IntelGUA\Sisteg\Plan;
use IntelGUA\Sisteg\School;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;


class SchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('schools.index');
    }

    public function getSchools()
    {
        $schools = School::with('level', 'school_district.municipality.department', 'area', 'classification', 'modality', 'turn', 'plan', 'cycle', 'school_status')->get();
        return (compact('schools'));
    }

    public function getCycle()
    {
        return $cycles = Cache::remember('cycles', 30, function(){
            return DB::table('cycles')->orderby('id', 'ASC')->get();
        });
    }

    public function getSchoolStatus()
    {
        return $school_status = Cache::remember('school_statuses', 30, function(){
            return DB::table('school_statuses')->orderby('id', 'ASC')->get();
        });
    }

    public function getLevel()
    {
        return $levels = Cache::remember('levels', 30, function () {
            return DB::table('levels')->orderby('id', 'ASC')->get();

        });
        // $level = Level::orderby('id', 'DESC')->get();
        // return $level;
    }

    public function getDistrict($municipality_id)
    {
        $school_districts = School_district::Where('municipality_id', $municipality_id)->with('municipality.department')->get();
        return $school_districts;
    }

    // public function getDistrict()
    // {
    //     return $school_districts = Cache::remember('school_districts', 1, function () {
    //         return DB::table('school_districts')->orderby('id', 'DESC')->get();
    //     });
    //     // $district = School_district::orderby('id', 'DESC')->get();
    //     // return $district;
    // }

    public function getArea()
    {
        return $areas = Cache::remember('areas', 30, function () {
            return DB::table('areas')->orderby('id', 'ASC')->get();

        });
        // $area = Area::orderby('id', 'DESC')->get();
        // return $area;
    }
    public function getClassification()
    {
        return $classifications = Cache::remember('classifications', 30, function () {
            return DB::table('classifications')->orderby('id', 'ASC')->get();

        });
        // $classification = Classification::orderby('id', 'DESC')->get();
        // return $classification;
    }
    public function getModality()
    {
        return $modalities = Cache::remember('modalities', 30, function () {
            return DB::table('modalities')->orderby('id', 'ASC')->get();

        });
        // $modality = Modality::orderby('id', 'DESC')->get();
        // return $modality;
    }
    public function getTurn()
    {
        return $turns = Cache::remember('turns', 30, function () {
            return DB::table('turns')->orderby('id', 'ASC')->get();

        });
        // $working = Turn::orderby('id', 'DESC')->get();
        // return $working;
    }
    public function getPlan()
    {
        return $plans = Cache::remember('plans', 1, function () {
            return DB::table('plans')->orderby('id', 'ASC')->get();

        });
        // $plan = Plan::orderby('id', 'DESC')->get();
        // return $plan;
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
        if ($request->ajax()) {

            $school = School::create($request->all());
            return $school;

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
    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {

            $schools = School::with(
                'level',
                'school_district.municipality.department',
                'area',
                'classification',
                'modality',
                'turn',
                'plan'

            )->find($request->id);
            return response($schools);
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

            $schools = School::find($request->id);
            $schools->update($request->all());
            return response($schools);

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
            $schols = School::findOrFail($id);
            $schols->delete();
            return redirect('schools')->with('success', 'Afiliado eliminado exitosamente');
        }
        return redirect('schools')->with('fail', 'Afiliado eliminado exitosamente');
    }
}
