<?php

class category{

    public static function check($conn,$request){

        $sql ='SELECT * FROM get_category WHERE company_id =? AND category_name = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute($request);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function add($conn,$request){

        $sql ='INSERT INTO `category`(`company_id`, `category_name`) VALUES (?,?)';
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
        
        $sql ='UPDATE `category` SET `category_name` = ?, `status_id` =? WHERE `category_id` =?';
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
        
        $sql ='SELECT * FROM `get_category` WHERE `company_id`=? LIMIT 0,1000';
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

        $sql ='SELECT * FROM `get_category` WHERE `category_id`=? LIMIT 0,1000';
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

        $sql ='DELETE FROM `category` WHERE `category_id` =?';
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