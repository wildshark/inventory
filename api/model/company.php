<?php

class company{

    public static function verification($conn,$request){

        $sql ='SELECT * FROM get_company WHERE email =?';
        $stmt = $conn->prepare($sql);
        $stmt->execute($request);
        $response = $stmt->fetch(PDO::FETCH_ASSOC);
        if($response == false){
            return false;
        }else{
            return true;
        }

    }

    public static function login($conn,$request){

        $sql ='SELECT * FROM `get_company` WHERE `username` = ? AND `password` = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute($request);
        $response = $stmt->fetch(PDO::FETCH_ASSOC);
        if($response == false){
            return array(
                'status'=>5101,
                'msg'=>'invaild login details'
            );
        }else{
            return $response;
        }
    }

    public static function add($conn,$request){

        $sql ='INSERT INTO `company`(`company_name`, `fname`, `lname`, `email`, `username`, `password`) VALUES (?, ?, ?, ?, ?, ?)';
        $stmt = $conn->prepare($sql);
        $response = $stmt->execute($request);
        if($response == false){
            return array(
                'status'=>5102,
                'msg'=>'failed to create account'
            );
        }else{
            return array(
                'status'=>2000,
                'msg'=>'account created successful'
            );
        }
    }

    public static function update($conn,$request){

        $sql ='UPDATE `company` SET `company_name` = ?, `fname` =?, `mname` = ?, `lname` = ?, `address` = ?, `email` = ?, `mobile` = ?, `country` =?, `state` =?, `postal_code` =?, `website` =?, `status_id` =? WHERE `company_id` =?';
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

    public static function fetch($conn,$request){

        $sql ='SELECT * FROM `get_company` WHERE `company_id`=? LIMIT 0,1000';
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

        $sql='DELETE FROM `get_company` WHERE `company_id` =?';
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