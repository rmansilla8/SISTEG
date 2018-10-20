<?php

namespace IntelGUA\Sisteg\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use IntelGUA\Sisteg\Accounting_record;
use IntelGUA\Sisteg\Record_type;

class AccountingRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('accounting_records.index');
    }


    public function getAccountingRecords()
    {
        $accounting_records = Accounting_record::with("record_type")->orderby('id', 'DESC')->get();
        return (compact('accounting_records'));
    }

    public function getRecordTypes()
    {
        $record_types = Record_type::orderby('id', 'DESC')->get();
        return $record_types;
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

            $accounting_records = Accounting_record::create($request->all());
            return $accounting_records;

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

            $accounting_records = Accounting_record::find($request->id);
            return response($accounting_records);

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

            $accounting_record = Accounting_record::find($request->id);
            $accounting_record->update($request->all());
            return response($accounting_record);

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
            $accounting_record = Accounting_record::findOrFail($id);
            $accounting_record->delete();
            return redirect('accounting_records')->with('success', 'Registro contable eliminado exitosamente');
        }
        return redirect('accounting_records')->with('fail', 'Registro contable eliminado exitosamente');
    }
}
