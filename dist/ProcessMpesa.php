<?php
require 'conn.php';
require 'Mpesa.php';
session_start();
date_default_timezone_set('Africa/Nairobi');
    $amount = $_POST['amount'];
    $phone = $_POST['phone'];


    $callbackurl = "http://10a9d720.ngrok.io/Development/mpesa/dist/Payment.php";
    $timestamp = date('Ymdhis');
    $account_ref = 'Mpesa Test';
    $transaction_desc = 'Semester application fees';

    try {
        $mpesa_response = Mpesa::STKPush_processrequest($timestamp, $account_ref, $transaction_desc, $amount, $phone, $callbackurl);
        if(!isset($mpesa_response)) throw new Exception("Request Failed Please Try Again");
        $_SESSION["MerchantRequestID"] = $mpesa_response->MerchantRequestID;
        $_SESSION["CheckoutRequestID"] = $mpesa_response->CheckoutRequestID;
        $sql = "INSERT INTO tbl_mpesatransactions (MerchantRequestID, CheckoutRequestID)
                VALUES ('".$mpesa_response->MerchantRequestID."', '".$mpesa_response->CheckoutRequestID."')";
        if (!$conn->query($sql)) throw new Exception('Error with database insertion');
        header('Content-type: application/json');
        echo json_encode(['ok'=>true,'msg'=>'Check your phone for the STK Push and enter your pin']);
    }catch (Exception $e){
        echo json_encode(['ok'=>false,'msg'=>$e->getMessage()]);
    }


