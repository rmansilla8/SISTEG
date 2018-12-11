<?php

namespace IntelGUA\Sisteg\Http\Controllers;

use Illuminate\Http\Request;
use IntelGUA\Sisteg\Ethnic_community;
use IntelGUA\Sisteg\Employee_type;
use IntelGUA\Sisteg\Title;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
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

    public function getEthnic_communities()
    {
        return $ethnic_communities = Cache::remember('ethnic_communities', 30, function () {
            return DB::table('ethnic_communities')->orderby('id', 'DESC')->get();

        });
        // $ethnic_community = Ethnic_community::orderby('id', 'DESC')->get();
        // return $ethnic_community;
    }



    public function getTitles()
    {
        return $titles = Cache::remember('titles', 30, function () {
            return DB::table('titles')->orderby('id', 'DESC')->get();

        });
        // $titles = Title::orderby('id', 'DESC')->get();
        // return $titles;
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
