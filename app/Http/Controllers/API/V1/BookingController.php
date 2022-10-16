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

    public function getBookingHistory()
    {
        try {
            $select = [
                'users.name as user_name',
                'bookings.booking_date',
                'booking_logs.status',
                'time_slots.time_slot_starts',
                'time_slots.time_slot_ends',
                'services.name as service_name',
            ];

            $bookingHistories = $this->booking
                                        ->leftJoin('users', 'users.id', '=', 'bookings.user_id')
                                        ->leftJoin('booking_logs', 'booking_logs.booking_id', '=', 'bookings.id')
                                        ->leftJoin('time_slots', 'time_slots.id', '=', 'booking_logs.time_slot_id')
                                        ->leftJoin('services', 'services.id', '=', 'bookings.service_id')
                                        ->select($select)
                                        ->where('bookings.user_id', auth()->user()->id)
                                        ->orderBy('booking_logs.status', 'asc')
                                        ->get();

            $bookingHistoriesModify = $bookingHistories->map(function ($item) {
                return [
                    'user_name'         =>  $this->stringShortener($item->user_name),
                    'service_name'      =>  $this->stringShortener($item->service_name),
                    'booking_date'      =>  $item->booking_date,
                    'time_slot_starts'  =>  $item->time_slot_starts,
                    'time_slot_ends'    =>  $item->time_slot_ends,
                    'status'            =>  $item->status,
                ];
            });

            return $this->sendResponse($bookingHistoriesModify, 'Booking history data found successfully.', 200);

        } catch (Exception $ex) {
            return $this->sendError('error', 'Operation Failed!', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function stringShortener($data) {
        return (strlen($data) > 20) ? mb_substr($data, 0, 20) . '...' : $data;
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
