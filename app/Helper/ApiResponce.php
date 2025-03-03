<?php

namespace App\Helper;

class ApiResponce
{

    public static function success($data = null , $message = '', $status = 200)
    {
        return response()->json([
            'message'=>$message,
            'success'=>true,
            'data'=>$data,
        ],$status);
    }


    public static function error($message = '', $status = 500, $errors = null)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors,
        ], $status);
    }
}