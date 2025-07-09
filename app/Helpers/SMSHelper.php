<?php

namespace App\Helpers;

class SMSHelper
{
    public function sendSMS($phone, $message){
        exec('gammu-smsd-inject TEXT '.$phone.' -unicode -text \"'.$message.'\"');
    }

}