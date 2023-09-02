<?php

namespace App\Http\Controllers;

use App\Models\PRAStatus;
use Illuminate\Http\Request;

class PRAStatusController extends Controller
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

        return view('welcome', [
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
        $data = $request->except('_token');
        PRAStatus::create($data);
        // return $request->application_number;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PRAStatus  $pRAStatus
     * @return \Illuminate\Http\Response
     */
    public function show(Request $pRAStatus)
    {
        $action = $pRAStatus->view;
        if($action != NULL) {
            return redirect('/myimms/PRAStatus');
        }else {
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

            $identification = $pRAStatus->MAD_ROC_NO;
            if($identification != NULL) {
                $praStatus = $praStatus->where('identification', $identification);
            }

            $employee = $pRAStatus->MAD_ROC_NO1;
            if($employee != NULL) {
                $praStatus = $praStatus->where('identification', $employee);
            }

            $application_number = $pRAStatus->MAD_APPL_NO;
            if($application_number != NULL) {
                $praStatus = $praStatus->where('application_number', $application_number);
            }   

            $praStatus = $praStatus->paginate(15);
            
            return view('welcome', [
                'praStatuses'=>$praStatus, 
                'identification' => $identification,
                'employee' => $employee,
                'application_number' => $application_number,
                'date' => $dateString
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PRAStatus  $pRAStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(PRAStatus $pRAStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PRAStatus  $pRAStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PRAStatus $pRAStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PRAStatus  $pRAStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PRAStatus::find($id)->delete($id);
  
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
