<?php

class Workflow extends conn 
{

    private function getAndInsertProductSaleId($ktp, $serial, $date){
        
        $query       = "SELECT * FROM tr_product_sale
                        WHERE ktp = $ktp AND
                              product_serial = $serial
                       ";
        $result      = $this->connection->query($query);
        $rowResult   = mysqli_fetch_array($result);
        $countResult = mysqli_num_rows($result);
        
        if ($countResult > 0) {

            return $rowResult['product_sale_id'];

        } else {

            $mysqli = $this->connection;

            $insert = "INSERT INTO tr_product_sale
            (product_serial, ktp, product_sale_purchase_date) VALUES
            ('$serial', '$ktp', '$date')
             ";

            $mysqli->query($insert);

            return $mysqli->insert_id;
        }
    }

    private function genRowIndex($product_sale_id){
        $query       = "SELECT workflow_index FROM tr_productworkflow
        WHERE product_sale_id = $product_sale_id";

        $result      = $this->connection->query($query);
        $rowResult   = mysqli_fetch_array($result);
        $countResult = mysqli_num_rows($result);
        
        $index = 1;
        
        if ($countResult > 0) {
            $index = $rowResult['workflow_index'] + 1;
        } else {
            $index = 1;
        }

        return $index;
    }

    public function InsertWorkflow (
        $ktp,
        $ws_id, 
        $serial,
        $msg_type,
        $user_id,
        $date
        ) {
        
        $product_sale_id = $this->getAndInsertProductSaleId($ktp, $serial, $date);
        $workflow_index  = $this->genRowIndex($product_sale_id);
        $date = date("Y/m/d");    

        $insert = "INSERT INTO tr_productworkflow
                    (product_sale_id, ws_id, msg_type_id, user_id, workflow_index, creationTime) VALUES
                    ('$product_sale_id', '$ws_id', '$msg_type', 10,  '$workflow_index', '$date')
                  ";
        $insert_result =  $this->connection->query($insert);  

        return $insert_result;
    }

    //TODO
    public function GetListWorkFlow (){
        return 0;
    }

    public function ApproveOrRejectDocument($id, $status){
       
        return true;
    }

    private function InsertDocument ($messages, $status) {
        return true;
    }
}


?>

