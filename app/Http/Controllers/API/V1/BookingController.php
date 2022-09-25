<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Booking;
use App\Models\BookingLog;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingController extends BaseController
{
    protected $booking = '';

    public function __construct(Booking $booking)
    {
        $this->middleware('auth:api');
        $this->booking = $booking;
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
        // dd($request->toArray());
        // dd(Auth()->user()->id);
        
        $validator = Validator::make($request->all(),
            ['booking_date' => 'required', 'booking_time' => 'required', 'selected_service' => 'required'],
            ['booking_date.required' => 'Select a booking date.', 'booking_time.required' => 'Select booking time.', 'selected_service.required' => 'Select a service.']
        );

        if ($validator->fails()) {
            $error  = $validator->errors()->first();
            return $this->sendError('FIELDS_VALIDATION_ERROR', $error, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            if(count($request->booking_time) > 0) {

                $response = $this->booking->create(
                    [
                        'user_id'        =>  Auth()->user()->id,
                        'service_id'     =>  $request->selected_service['id'],
                        'booking_date'   =>  $request->booking_date,
                    ]
                );
    
                foreach ($request->booking_time as $time) {
                    BookingLog::create(
                        [
                            'booking_id'    =>  $response->id,
                            'time_slot_id'  =>  $time,
                        ]
                    );
                }
                
                return $this->sendResponse($response, 'Time slot booked successfully.', 200);
            }
        } catch (Exception $ex) {
            return $this->sendError('error', 'Operation Failed!', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
