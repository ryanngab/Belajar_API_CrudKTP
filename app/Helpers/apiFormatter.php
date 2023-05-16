<?php
namespace App\Helpers;

use Symfony\Component\HttpKernel\Event\ResponseEvent;

class apiFormatter {
    protected static $response = [
        'code' => NULL,
        'massage' => NULL,
        'data' => NULL,
    ];

    public static function createApi($code = NULL, $message = NULL, $data = NUll){
        Self::$response['code'] = $code;
        Self::$response['message'] = $message;
        Self::$response['data'] = $data;
        return response()->json(self::$response, self::$response['code']);
    }
}
