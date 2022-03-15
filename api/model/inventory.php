<?php

class inventory{

    public static function check($conn,$request){

        $sql='SELECT * FROM get_stock WHERE company_id =? AND item_id =? AND inv_date =? AND ref =?';
        $stmt = $conn->prepare($sql);
        $stmt->execute($request);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function verify_qty_avalibe($conn,$request){

        $sql ='SELECT * FROM `get_summary` WHERE `company_id`=? AND `item_id`=? LIMIT 0,1000';
        $stmt = $conn->prepare($sql);
        $stmt->execute($request);
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($response == false){
            return false;
        }else{
            return $response;
        }
    }
    
    public static function purchase($conn,$request){

        $sql='INSERT INTO `stock_inventory`(`company_id`, `item_id`, `inv_date`, `ref`, `details`, `price`, `qty_in`,`status_id`) VALUES (?,?,?,?,?,?,?,?)';
        $stmt = $conn->prepare($sql);
        $response = $stmt->execute($request);
        if($response == false){
            return array(
                'status'=>5000,
                'msg'=>'submit failed'
            );
        }else{
            return array(
                'status'=>2000,
                'msg'=>'submit succesful'
            );
        }
    }

    public static function issued($conn,$request){

        $sql='INSERT INTO `stock_inventory`(`company_id`, `item_id`, `inv_date`, `ref`, `details`, `price`, `qty_out`,`status_id`) VALUES (?,?,?,?,?,?,?,?)';
        $stmt = $conn->prepare($sql);
        $response = $stmt->execute($request);
        if($response == false){
            return array(
                'status'=>5000,
                'msg'=>'submit failed'
            );
        }else{
            return array(
                'status'=>2000,
                'msg'=>'submit succesful'
            );
        }
    }

    public static function returns($conn,$request){

        $sql='INSERT INTO `stock_inventory`(`company_id`, `item_id`, `inv_date`, `ref`, `details`, `price`, `qty_return`,`status_id`) VALUES (?,?,?,?,?,?,?,?)';
        $stmt = $conn->prepare($sql);
        $response = $stmt->execute($request);
        if($response == false){
            return array(
                'status'=>5000,
                'msg'=>'submit failed'
            );
        }else{
            return array(
                'status'=>2000,
                'msg'=>'submit succesful'
            );
        }
    }

    public static function update($conn,$request){

        $sql='UPDATE `stock_inventory` SET `item_id` =?, `inv_date` =?, `ref` = ?, `details` = ?, `price` =?, `qty_in` =?  WHERE `inventory_id` =?';
        $stmt = $conn->prepare($sql);
        $response = $stmt->execute($request);
        if($response == false){
            return array(
                'status'=>5000,
                'msg'=>'update failed'
            );
        }else{
            return array(
                'status'=>2000,
                'msg'=>'update successful'
            );
        }
    }

    public static function stock_summary_fetch($conn,$request){
        
        $sql='SELECT * FROM `get_stock_summary` WHERE `company_id`=? LIMIT 0,1000';
        $stmt = $conn->prepare($sql);
        $stmt->execute($request);
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($response == false){
            return array(
                'status'=>5103,
                'msg'=>'query record failed'
            );
        }else{
            return $response;
        }
    }

    public static function stock_summary($conn,$request){

        $sql ='SELECT * FROM `get_summary` WHERE `company_id`=? LIMIT 0,1000';
        $stmt = $conn->prepare($sql);
        $stmt->execute($request);
        $response = $stmt->fetch(PDO::FETCH_ASSOC);
        if($response == false){
            return array(
                'status'=>5103,
                'msg'=>'query record failed'
            );
        }else{
            return $response;
        }

    }

    public static function stock_details_fetch($conn,$request){

        $sql='SELECT * FROM `get_stock_details` WHERE `company_id`=? AND `item_id`=? LIMIT 0,1000';
        $stmt = $conn->prepare($sql);
        $stmt->execute($request);
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($response == false){
            return array(
                'status'=>5103,
                'msg'=>'query record failed'
            );
        }else{
            return $response;
        }
    }

    public static function stock_current_fetch($conn,$request){

        $sql='SELECT * FROM `get_stock` WHERE `company_id`=? ORDER BY `inventory_id` DESC LIMIT 0,100';
        $stmt = $conn->prepare($sql);
        $stmt->execute($request);
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($response == false){
            return array(
                'status'=>5103,
                'msg'=>'query record failed'
            );
        }else{
            return $response;
        }

    }

    public static function fetch_purchase($conn,$request){
        
        $sql='SELECT * FROM `get_purchase` WHERE `company_id`=? LIMIT 0,1000';
        $stmt = $conn->prepare($sql);
        $stmt->execute($request);
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($response == false){
            return array(
                'status'=>5103,
                'msg'=>'query record failed'
            );
        }else{
            return $response;
        }
    }

    public static function fetch_issued($conn,$request){
        
        $sql='SELECT * FROM `get_issued` WHERE `company_id`=? LIMIT 0,1000';
        $stmt = $conn->prepare($sql);
        $stmt->execute($request);
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($response == false){
            return array(
                'status'=>5103,
                'msg'=>'query record failed'
            );
        }else{
            return $response;
        }
    }

    public static function fetch_returns($conn,$request){
        
        $sql='SELECT * FROM `get_returns` WHERE `company_id`=? LIMIT 0,1000';
        $stmt = $conn->prepare($sql);
        $stmt->execute($request);
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($response == false){
            return array(
                'status'=>5103,
                'msg'=>'query record failed'
            );
        }else{
            return $response;
        }
    }


    public static function view($conn,$request){
        
        $sql='SELECT * FROM `get_stock` WHERE `inventory_id`=? LIMIT 0,1000';
        $stmt = $conn->prepare($sql);
        $stmt->execute($request);
        $response = $stmt->fetch(PDO::FETCH_ASSOC);
        if($response == false){
            return array(
                'status'=>5103,
                'msg'=>'query record failed'
            );
        }else{
            return $response;
        }
    }

    public static function delete($conn,$request){
        
        $sql='DELETE FROM `stock_inventory` WHERE `inventory_id` = ?';
        $stmt = $conn->prepare($sql);
        $response = $stmt->execute($request);
        if($response == false){
            return array(
                'status'=>5105,
                'msg'=>'delete failed'
            );
        }else{
            return array(
                'status'=>2000,
                'msg'=>'delete successful'
            );
        }
    }
}
?>