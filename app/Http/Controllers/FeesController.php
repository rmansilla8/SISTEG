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
use IntelGUA\Sisteg\Http\Requests\FeeRequest;
use Illuminate\Support\Facades\View;
use PDF;
use Illuminate\Support\Facades\Cache;
// use View;


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
            ->select('fees.*', 'fee_types.description', 'affiliates.number', 'employees.nit', 'people.names', 'people.surnames', DB::Raw('date_format(fees.date,\'%d/%m/%Y\') as date'))
            ->get();
        return (compact('fees'));
    }

    public function getFeeType()
    {
        return $fee_types = Cache::remember('fee_types', 30, function () {
            return DB::table('fee_types')->orderby('id', 'DESC')->get();

        });

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
     * @return \Illuminte\Http\Response
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
        $fee = DB::table('fees')
            ->leftJoin('affiliates', 'affiliates.id', '=', 'fees.affiliate_id')
            ->leftJoin('employees', 'employees.id', '=', 'affiliates.employee_id')
            ->leftJoin('people', 'people.id', '=', 'employees.person_id')
            ->leftJoin('fee_types', 'fee_types.id', '=', 'fees.fee_type_id')
            ->where('fees.id', '=', $id)
            ->select('fees.*', 'people.names', 'people.surnames', 'fee_types.description as descripcion', 'fees.amount as cuota', 'fees.date as fecha', 'fees.detail as detalle')
            ->first();
        return view('fees.show', compact('fee'));
        //return(compact('fees'));
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
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {

            $fee = Fee::find($request->id);
            $fee->update($request->all());
            return response($fee);

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
            $fee = Fee::findOrFail($id);
            $fee->delete();
            return redirect('fees')->with('success', 'cuota voluntaria eliminada exitosamente');
        }
        return redirect('fees')->with('fail', 'cuota voluntaria eliminada exitosamente');

        /* if ($request->ajax()) {
            $tooth = Tooth::findOrFail($id);
            $tooth->delete();
            return redirect('teeth')->with('success', 'Cuota voluntaria eliminada exitosamente');
        }
        return redirect('teeth')->with('fail', 'cuota voluntaria eliminada exitosamente');
    } */
        /* if ($request->ajax()) {
            Fee::destroy($request->id);
            return redirect('fees')->with('status', 'Cuota eliminada exitosamente');
        } */

    }

    public function generatePDF($id)
    {
        $fee = DB::table('fees')
            ->leftJoin('affiliates', 'affiliates.id', '=', 'fees.affiliate_id')
            ->leftJoin('employees', 'employees.id', '=', 'affiliates.employee_id')
            ->leftJoin('people', 'people.id', '=', 'employees.person_id')
            ->leftJoin('fee_types', 'fee_types.id', '=', 'fees.fee_type_id')
            ->where('fees.id', '=', $id)
            ->select('fees.*', 'affiliates.number', 'people.names', 'people.surnames', 'fee_types.description as descripcion', 'fees.amount as cuota', 'fees.date as fecha', 'fees.detail as detalle')
            ->first();

        $nombre_comprobante = sprintf('comprobante-%s.pdf', $fee->names . '-' . $fee->surnames . '-' . str_pad($fee->id, 7, '0', STR_PAD_LEFT));
        $pdf = PDF::loadView('fees.pdffee', compact('fee'))->setPaper('legal', 'landscape');
        return $pdf->stream($nombre_comprobante);


    }
}