<?php

namespace App\Http\Controllers\API\V1;

use App\Models\TimeSlot;
use Illuminate\Http\Request;

class TimeSlotController extends BaseController
{
    protected $timeslot = '';

    public function __construct(TimeSlot $timeslot)
    {
        $this->middleware('auth:api');
        $this->timeslot = $timeslot;
    }

    protected function getTimeSlot() {

        $timeslots = $this->timeslot
                    ->select(['id', 'time_slot_starts', 'time_slot_ends'])
                    ->get();

        return $this->sendResponse($timeslots, "Time slots list.");
    }


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
     * @param  \App\Models\timeSlot  $timeSlot
     * @return \Illuminate\Http\Response
     */
    public function show(timeSlot $timeSlot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\timeSlot  $timeSlot
     * @return \Illuminate\Http\Response
     */
    public function edit(timeSlot $timeSlot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\timeSlot  $timeSlot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, timeSlot $timeSlot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\timeSlot  $timeSlot
     * @return \Illuminate\Http\Response
     */
    public function destroy(timeSlot $timeSlot)
    {
        //
    }
}
