<?php

namespace App\Helpers;

class SMSHelper
{
    public function sendSMS($phone, $message){
        $command = 'gammu-smsd-inject TEXT '.$phone.'  -text \"'.$message.'\"';
        $data=exec($command);
        echo var_dump($data);
    }

}