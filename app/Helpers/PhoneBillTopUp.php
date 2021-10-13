<?php


namespace App\Helpers;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class PhoneBillTopUp
{
    private $companyId = "31313131";
    /*private $companyId = "77777777";*/
    private $mpssUsername = "upgpainting";
    private $mpssPasswords = "upg@2019#";
    private $topupURL = "https://api.myanmarpaymenttopup.com/campaign/xurltopupaction/";
    private $encKey = "oo2ndkQCMgKUS2SLb5cZVgOF";
    private $_iv = array(0, 0, 0, 0, 0, 0, 0, 0);
    private $OPENSSL_CIPHER_NAME = "des-ede3-cbc";
    private $max_amounts = [
        1 => 30000,//mpt
        2 => 50000, //ooredoo
        3 => 100000, //telenor
        4 => 30000, //MEC
        5 => 30000 //Mytel
    ];
    private $min_amount = 1000;


    public function makeTopUp($phoneNumber, $total_amount)
    {

        if ($total_amount < $this->min_amount) {
            return;
        }
        $phoneNumber = $this->changePhNoTopupFormat($phoneNumber);
        $data = [
            'phone_number' => $phoneNumber,
            'operator' => $this->getCheckOperator($phoneNumber),
            'header' => $this->getHeader(),
        ];

        $max_amount = $this->max_amounts[$data['operator']];

        $billsToTopUp = $this->getTopUpArray($total_amount, $max_amount);
        $gClient = new Client();

        $responses = collect();

        foreach ($billsToTopUp as $bill) {
            if ($bill >= $this->min_amount) {
                //todo: uncomment in production
                  $data['ref_id'] = $this->getReferenceId($phoneNumber);
                         $encryptedString = $this->encryptStringForMPSS($bill, $data);
                         $response = $this->makeRequest($gClient, $bill, $encryptedString, $data);
                         $responsedBody = $response->getBody();
                         $arrResponse = json_decode($responsedBody, true);
                         $arrResponse['amount'] = $bill;



               /* //this block is for testing
                $arrResponse = [
                    'id' => 'upg1570680118007696736728',
                    'resultcode' => '1000',
                    'status' => rand(0, 1) == 0 ? 'success' : 'fail',
                    'amount' => $bill,
                    'description' => 'Some Description'
                ];*/

                $responses->add($arrResponse);
            }
        }

        return $responses;
    }

    public function getTopUpArray($amount, $max_amount)
    {
        $amountsToFill = collect();
        while ($amount > $max_amount) {
            $amount -= $max_amount;
            $amountsToFill->add($max_amount);
            $max_amount -= $this->min_amount;
        }
        $amountsToFill->add($amount);

        return $amountsToFill;
    }

    private function makeRequest($gClient, $amount, $encryptedString, $data)
    {

        return $gClient->request('POST', $this->topupURL, [
            'auth' => [$this->mpssUsername, $this->mpssPasswords],
            'headers' => $this->getHeader(),
            'timeout' => 50.0,
            'verify' => false,
            'form_params' => [
                'id' => $data['ref_id'],
                'phNo' => $data['phone_number'],
                'amount' => $amount,
                'operator' => $data['operator'],
                'encryptedString' => $encryptedString,
                'companyId' => $this->companyId
            ]
        ]);
    }

    private function getReferenceId($phoneNumber)
    {
        /*$timeDigit = date('YmdHis');*/
        $milliseconds = round(microtime(true) * 1000);
        return "upg" . $milliseconds . $phoneNumber;
    }

    private function getHeader()
    {
        return [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'cache-control' => 'no-cache',
        ];
    }

    private function getCheckOperator($phoneNo)
    {
        $operator = 0;

        $prefix = substr($phoneNo, 2, 2);

        if ($prefix >= '74' && $prefix <= '79') {
            $operator = 3;  //TELENOR
        } elseif ($prefix >= '90' && $prefix <= '99') {
            if ($prefix == '93') {
                $operator = 4; //MEC
            } else {
                $operator = 2;  //OOREDOO
            }
        } elseif ($prefix >= '30' && $prefix <= '39') {
            $operator = 4; //MeC
        } elseif ($prefix >= '66' && $prefix <= '69') {
            $operator = 5; //MyTel
        } else {
            $operator = 1; //MPT
        }


        return $operator;
    }

    private function encryptStringForMPSS($amount, $data)
    {
        $refId = $data['ref_id'];
        $phoneNumber = $data['phone_number'];
        $operator = $data['operator'];

        $dataToEnc = $refId . "|" . $phoneNumber . "|" . $amount . "|" . $operator;
        $encryption_key = $this->encKey;
        $iv = $this->binaryArrayToByte($this->_iv);


        $encryptedstring = openssl_encrypt($dataToEnc, $this->OPENSSL_CIPHER_NAME, $encryption_key, OPENSSL_RAW_DATA, $iv);

        return utf8_encode(base64_encode($encryptedstring));
    }

    private function changePhNoTopupFormat($phoneNumber)
    {
        $phoneNumber = "09" . $phoneNumber;
        return $phoneNumber;
    }

    private function pkcs5_pad($text, $blocksize)
    {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }


    private function decryptStringForMPSS($string)
    {

        $encryption_key = $this->encKey;
        $iv = $this->binaryArrayToByte($this->_iv);


        $dataToDec = base64_decode($string);
        $decryptedstring = openssl_decrypt($dataToDec, $this->OPENSSL_CIPHER_NAME, $encryption_key, OPENSSL_RAW_DATA, $iv);


        return $decryptedstring;
    }

    private function binaryArrayToByte($arrData)
    {
        $byteData = "";

        for ($i = 0; $i < count($arrData); $i++) {
            $byteData .= pack('c', $arrData[$i]);
        }

        return $byteData;
    }
}
