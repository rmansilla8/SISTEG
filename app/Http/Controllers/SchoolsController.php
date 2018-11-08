<?php

namespace IntelGUA\Sisteg\Http\Controllers;

use Illuminate\Http\Request;
use IntelGUA\Sisteg\Level;
use IntelGUA\Sisteg\School_district;
use IntelGUA\Sisteg\Area;
use IntelGUA\Sisteg\Classification;
use IntelGUA\Sisteg\Modality;
use IntelGUA\Sisteg\Working_day;
use IntelGUA\Sisteg\Plan;
use IntelGUA\Sisteg\School;


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
        $schools = School::with('level', 'school_district', 'area', 'classification', 'modality', 'working_day','plan')->get();
        // return $schools;
        return (compact('schools'));
    }

     public function getLevel()
    {
        $level = Level::orderby('id', 'DESC')->get();
        return $level;
    }

      public function getDistrict()
    {
        $district = School_district::orderby('id', 'DESC')->get();
        return $district;
    }
      public function getArea()
    {
        $area = Area::orderby('id', 'DESC')->get();
        return $area;
    }
      public function getClassification()
    {
        $classification = Classification::orderby('id', 'DESC')->get();
        return $classification;
    }
        public function  getModality()
    {
        $modality = Modality::orderby('id', 'DESC')->get();
        return $modality;
    }
        public function getWorkingDay()
    {
        $working = Working_day::orderby('id', 'DESC')->get();
        return $working;
    }
        public function getPlan()
    {
        $plan = Plan::orderby('id', 'DESC')->get();
        return $plan;
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
