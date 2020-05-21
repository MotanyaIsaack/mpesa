<?php

require 'Mpesa.php';
require 'conn.php';


//$conn = new mysqli("localhost", "root", "", "mpesa");
try {
    $post_data = Mpesa::get_data_from_callback();
    $processed_response = Mpesa::process_stkpush_request_callback($post_data);
    $status = $processed_response->ResultCode === 0 ? 'success' : 'fail';
    //Update the field status in the database
    $sql = "UPDATE tbl_mpesatransactions 
    SET status='".$status."' 
    WHERE MerchantRequestID='".$processed_response->MerchantRequestID."'
    AND CheckoutRequestID='".$processed_response->CheckoutRequestID."'";
    $conn->query($sql);
    Mpesa::finish_transaction();
} catch (Exception $e) {
    Mpesa::finish_transaction(false);
//    return (['ok'=>true,'msg'=>$e->getMessage()]);

}