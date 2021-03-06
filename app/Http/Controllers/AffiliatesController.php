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
use IntelGUA\Sisteg\Employee_school;
use IntelGUA\Sisteg\Level;
use IntelGUA\Sisteg\School_district;
use IntelGUA\Sisteg\Area;
use IntelGUA\Sisteg\Classification;
use IntelGUA\Sisteg\Modality;
use IntelGUA\Sisteg\Plan;
use IntelGUA\Sisteg\Turn;
use IntelGUA\Sisteg\Employee_title;
use IntelGUA\Sisteg\Language_domain;
use IntelGUA\Sisteg\Language;
use IntelGUA\Sisteg\Ethnic_community;
use IntelGUA\Sisteg\Municipality;
use IntelGUA\Sisteg\Employee_type;
use PDF;
use Illuminate\Support\Carbon;

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
        /**
         * Se obtiene el listado de todos los afiliados activos.
         */
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

    public function pdfCensus()
    {
        /**
         * Se obtienen los datos de todos los afiliados para generar el padrón de afiliados en pdf.
         */
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
        /**
         * $fullDate obtiene la fecha actual.
         * $nombre_padron guarda el nombre que se le dara al pdf.
         */
        $fullDate = Carbon::now()->toDateString();
        $nombre_padron = sprintf('Padrón-de-afiliados-%s.pdf', $fullDate);
        $pdf = PDF::loadView('affiliates.pdfcensus', compact('affiliates'))->setPaper('legal', 'landscape');
        return $pdf->stream($nombre_padron);
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
        $affiliate = Affiliate::where('id', '=', $id)->first();
        $employee = Employee::with('ethnic_community')->where('id', '=', $affiliate->employee_id)->first();
        $person = Person::with('gender')->with('civil_status')->with('municipality.department')
            ->where('id', '=', $employee->person_id)->first();
        $employee_school = Employee_school::with('contract')->with('employee_type')->with('work_state')
            ->with('school.level', 'school.area', 'school.classification', 'school.school_district.municipality.department', 'school.modality', 'school.turn', 'school.plan')
            ->where('employee_id', '=', $employee->id)->get();
        $employee_title = Employee_title::with('title')->where('employee_id', '=', $employee->id)->get();
        $language_domain = Language_domain::with('language')->where('employee_id', '=', $employee->id)->get();
        return view('affiliates.show', compact(
            'affiliate',
            'employee',
            'person',
            'employee_school',
            'employee_title',
            'language_domain'
        ));
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
            $affiliates = Affiliate::with(
                'employee',
                'employee.ethnic_community',
                'employee.person',
                'employee.person.civil_status',
                'employee.person.gender',
                'employee.person.municipality',
                'employee.person.municipality.department'
            )->find($request->id);
            return response($affiliates);

        }
    }

    public function editStatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $status = Affiliate::find($request->id);
            return response($status);
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

    }

    public function updateStatus(Request $request, $id)
    {

        if ($request->ajax()) {
            DB::beginTransaction();
            try {

                $affiliate_status = Affiliate::find($request->id);
                $affiliate_status->affiliate_state_id = $request->input('affiliate_state_id');
                $affiliate_status->save();

                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
            }
            return response($request);
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
