<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse($result, $message, $code = 200, $extraDta = [])
    {
        $response['resultCode'] =  $code;
        $response['time'] =  date('Y-m-d H:i:s');
        $response['success'] =  [
            'title' => 'Success',
            'message' => $message,
        ];
        $response['data'] =  $result;

        if(count($extraDta))
        {
            $response['info'] = $extraDta;
        }


        return response()->json($response, $code);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages, $code = 404)
    {
        $response = [
            'resultCode' => $code,
            'time' => date('Y-m-d H:i:s'),
        ];

        $response['error'] = [
            'title' => $error,
            'message' => $errorMessages,
        ];
        return response()->json($response, $code);
    }


    /**
     * return Unauthorized response.
     *
     * @param $error
     * @param  int  $code
     *
     * @return \Illuminate\Http\Response
     */
    public function unauthorizedResponse($error = 'Forbidden', $code = 403)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        return response()->json($response, $code);
    }
}
