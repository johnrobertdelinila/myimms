<?php

namespace App\Http\Controllers;

use App\Models\PRAStatus;
use Illuminate\Http\Request;

class INQAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $months = array(
            1 => 'Januari', 'Februari', 'Mac', 'April', 'Mei', 'Jun',
            'Julai', 'Ogos', 'September', 'Oktober', 'November', 'Disember'
        );
        
        $dayOfWeekNames = array(
            'Ahad', 'Isnin', 'Selasa', 'Rabu', 'Khamis', 'Jumaat', 'Sabtu'
        );
        
        $dayOfWeek = date('w'); // 0 (Sunday) through 6 (Saturday)
        $dayOfMonth = date('j'); // Day of the month without leading zeros
        $month = date('n'); // Month as a number from 1 to 12
        $year = date('Y'); // Full year
        
        $dateString = $dayOfWeekNames[$dayOfWeek] . ', ' . $dayOfMonth . ' ' . $months[$month] . ' ' . $year;

        return view('inqApplEmpPassSts', [
            'date' => $dateString
        ]);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\INQApp  $iNQApp
     * @return \Illuminate\Http\Response
     */
    public function show(Request $iNQApp)
    {
        $months = array(
            1 => 'Januari', 'Februari', 'Mac', 'April', 'Mei', 'Jun',
            'Julai', 'Ogos', 'September', 'Oktober', 'November', 'Disember'
        );
        $dayOfWeekNames = array(
            'Ahad', 'Isnin', 'Selasa', 'Rabu', 'Khamis', 'Jumaat', 'Sabtu'
        );
        
        $dayOfWeek = date('w'); // 0 (Sunday) through 6 (Saturday)
        $dayOfMonth = date('j'); // Day of the month without leading zeros
        $month = date('n'); // Month as a number from 1 to 12
        $year = date('Y'); // Full year
        
        $dateString = $dayOfWeekNames[$dayOfWeek] . ', ' . $dayOfMonth . ' ' . $months[$month] . ' ' . $year;

        $praStatus = PRAStatus::query();

        $identification = $iNQApp->registration;
        if($identification != NULL AND TRIM($identification) != "") {
            $praStatus = $praStatus->where('identification', $identification);
        }

        $document_number = $iNQApp->document;
        if($document_number != NULL AND TRIM($document_number) != "") {
            $praStatus = $praStatus->where('document_number', $document_number);
        }

        $application_number = $iNQApp->application;
        if($application_number != NULL AND TRIM($application_number) != "") {
            $praStatus = $praStatus->where('application_number', $application_number);
        }

        if((($identification == NULL OR TRIM($identification) == "") AND 
        ($document_number == NULL OR TRIM($document_number) == "") AND 
        ($application_number == NULL OR TRIM($application_number) == ""))) {
            $praStatus = $praStatus->where('identification', '');
        }

        $praStatus = $praStatus->paginate(15);
        
        return view('inqApplEmpPassSts', [
            'praStatuses'=> $praStatus,
            'identification' => $identification,
            'document_number' => $document_number,
            'application_number' => $application_number,
            'date' => $dateString
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\INQApp  $iNQApp
     * @return \Illuminate\Http\Response
     */
    public function edit(PRAStatus $iNQApp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\INQApp  $iNQApp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PRAStatus $iNQApp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\INQApp  $iNQApp
     * @return \Illuminate\Http\Response
     */
    public function destroy(PRAStatus $iNQApp)
    {
        //
    }
}
