<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Helpers\SMSHelper;
use CodeIgniter\HTTP\ResponseInterface;

class SMSController extends BaseController
{
    public function index()
    {
        $data= file_get_contents('php://input');
        $json  = null;
        $smsHelper = new SMSHelper();
        if($data != null ){
            $json  = json_decode($data);
        }
        if($this->request->hasHeader('Authorization')){
            $token = $this->request->header('Authorization');
            if($token->getValue() == "123"){
                    if(isset($json->phone) && isset($json->message)){
                        $smsHelper->sendSMS($json->phone,$json->message);
                        return json_encode(['message' => 'wiadmosc wysłana']);
                    }
                    else{
                        return json_encode(['message' => 'Brak wymaganych parametrów']);
                    }//
            }
        }
        else{
            return json_encode(['message' => 'Brak uprawnień do wykonania akcji']);
        }
    }
}
