<?php

namespace IntelGUA\Sisteg\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use IntelGUA\Sisteg\Fee;
use IntelGUA\Sisteg\Fee_type;
use IntelGUA\Sisteg\Affiliate;
use IntelGUA\Sisteg\Employee;
use IntelGUA\Sisteg\AffiliatePerson;
use IntelGUA\Sisteg\Person;



class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fees.index');
    }

    public function getFees()
    {
        /*$fees = Fee::with("fee_type")->with("affiliate")->orderby('id', 'DESC')->get();
        return (compact('fees'));
         */
        $fees = DB::table('fees')
            ->join('fee_types', 'fee_types.id', '=', 'fees.fee_type_id')
            ->join('affiliates', 'affiliates.id', '=', 'fees.affiliate_id')
            ->join('employees', 'employees.id', '=', 'affiliates.employee_id')
            ->join('people', 'people.id', '=', 'employees.person_id')
            ->select('fees.*', 'fee_types.description', 'affiliates.number', 'employees.nit', 'people.first_name', 'people.second_name', 'people.third_name', 'people.first_surname', 'people.second_surname')
            ->get();
        return (compact('fees'));
    }

    public function getFeeType()
    {
        $fee_types = Fee_type::orderby('id', 'DESC')->get();
        return $fee_types;
    }

    public function getAffiliate()
    {
        $listPeople = [];
        $person = new AffiliatePerson();
        $affiliates = Affiliate::with('employee')->get();
        $people = Person::all();
        foreach ($affiliates as $afi) {
            foreach ($people as $per) {
                if ($per->id == $afi->employee->person_id) {
                    $listPeople[] = array(
                        "id" => $afi->id,
                        "name" => $per->full_name
                    );
                }
            }
        };

        return $listPeople;
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

            $fees = Fee::create($request->all());
            return $fees;

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
    public function edit(Request $request)
    {
        if ($request->ajax()) {

            $fees = Fee::find($request->id);
            return response($fees);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {

            $fees = Fee::find($request->id);
            $fees->update($request->all());
            return response($fees);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            Fee::destroy($request->id);
            return redirect('fees')->with('status', 'Cuota eliminada exitosamente');
        }
    }
}
