<?php
require 'conn.php';
require 'Mpesa.php';
session_start();
    $sql = "SELECT * FROM tbl_mpesatransactions
            WHERE MerchantRequestID='".$_SESSION["MerchantRequestID"]."'
            AND CheckoutRequestID='".$_SESSION["CheckoutRequestID"]."'";
    $result = $conn->query($sql);
    // Destroying session
    session_destroy();
    if ($result->num_rows > 0){
        while($row = $result->fetch_array()){
            $status = $row['status'];
        }
        if ($status === 'success'){
            echo json_encode(['ok'=>true,'msg'=>'Payment Successful']);
        }else{
            echo json_encode(['ok'=>false,'msg'=>'Payment Failed Please Try Again']);
        }
    }else{
        echo json_encode(['ok'=>false,'msg'=>'Payment Failed Please Try Again']);
    }
