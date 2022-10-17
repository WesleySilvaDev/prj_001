<?php
define(ACCESS_KEY, "XXXXXXXXXXXXX"); // ACCESS_KEY AWS
define(SECRET_KEY, "XXXXXXXXXXXXXXXXXXXXXXXXXXXX"); // SECRET_KEY AWS

require '../vendor/autoload.php';

use Aws\Sns\SnsClient;
use Aws\Exception\AwsException;

function phone($cel){
    $cel = str_replace(str_split('-() '),"",$cel);

    if (strlen($cel) == 10 && is_numeric($cel) && implode("", array_unique(str_split($cel)))>9) {
        $tel_ddd = substr($cel, -10, 2);
        $tel = substr($cel, -8, 8);
        return "+55".$tel_ddd."9".$tel;
    } elseif (strlen($cel) == 11 && is_numeric($cel) && implode("", array_unique(str_split($cel)))>9) {
        $tel_ddd = substr($cel, -11, 2);
        $tel = substr($cel, -9, 9);
        return "+55".$tel_ddd.$tel;
    } else {
        return 0;
    }
}

function send_message($phone, $message) {
    $client = new SnsClient([
        'version'     => 'latest', // 2010-03-31
        'region'      => 'us-west-2', // us-east-1
        'credentials' => [
            'key'    => ACCESS_KEY,
            'secret' => SECRET_KEY
        ],
    ]);
    $client_alt = new SnsClient([
        'version'     => 'latest', // 2010-03-31
        'region'      => 'us-east-1', // us-east-1
        'credentials' => [
            'key'    => ACCESS_KEY,
            'secret' => SECRET_KEY
        ],
    ]);
    $client_alt2 = new SnsClient([
        'version'     => 'latest', // 2010-03-31
        'region'      => 'eu-west-1', // us-east-1
        'credentials' => [
            'key'    => ACCESS_KEY,
            'secret' => SECRET_KEY
        ],
    ]);
    $client_alt3 = new SnsClient([
        'version'     => 'latest', // 2010-03-31
        'region'      => 'eu-central-1', // us-east-1
        'credentials' => [
            'key'    => ACCESS_KEY,
            'secret' => SECRET_KEY
        ],
    ]);
    $client_alt4 = new SnsClient([
        'version'     => 'latest', // 2010-03-31
        'region'      => 'ap-southeast-2', // us-east-1
        'credentials' => [
            'key'    => ACCESS_KEY,
            'secret' => SECRET_KEY
        ],
    ]);
    $options = array(
        'MessageAttributes' => array(
            'AWS.SNS.SMS.SenderID' => array(
                'DataType' => 'String',
                'StringValue' =>  'REMETENTE' // NOME DE REMETENTE PARA O SMS (11 DÍGITOS)
            ),
            'AWS.SNS.SMS.SMSType' => array(
                'DataType' => 'String',
                'StringValue' =>  'Transactional' // Transactional/Promotional
            )
        ),
        'Message' => $message,
        'PhoneNumber' => $phone
    );

    try {
        $result = $client->publish($options);
        return $result;
    } catch (AwsException $e) {
        try {
            $result = $client_alt->publish($options);
            return $result;
        } catch (AwsException $er) {
            try {
                $result = $client_alt2->publish($options);
                return $result;
            } catch (AwsException $err) {
                try {
                    $result = $client_alt3->publish($options);
                    return $result;
                } catch (AwsException $err2) {
                    try {
                        $result = $client_alt4->publish($options);
                        return $result;
                    } catch (AwsException $err3) {
                        error_log($err3->getMessage());
                    }
                }
            }
        }
    }
}