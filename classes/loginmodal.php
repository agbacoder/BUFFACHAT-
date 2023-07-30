<?php
class LoginModal extends Connect{

    protected function emailCheck($email){
        $query = $this->conn()->prepare(
            "SELECT email, unique_id FROM usertable WHERE email = ?"
    );
    $query->execute([$email]);
   
    $check = $query->fetch();
      
    if($check){
        return true;
    } else {
        return false;
    }
    }

    protected function signup($fname, $lname, $image, $email, $user_id, $status){
           
                $querydata = $this->conn()->prepare(
                    "INSERT INTO usertable (fname, lname, image, email, unique_id, active_status)
                    VALUES (?,?,?,?,?,?)");
                $querydata->execute(array($fname, $lname, $image, $email, $user_id, $status
                     
                ));
    }

    protected function login($email){
        $query = $this->conn()->prepare(
            "SELECT email, unique_id FROM usertable WHERE email = ?"
    );
    $query->execute([$email]);
   
    $check = $query->fetch();
      
    return $check;

   
    }
    public function updateStatus($status, $email){
        $query = $this->conn()->prepare(
            "UPDATE usertable SET active_status = ? WHERE email = ?"
    );
    $query->execute([$status, $email]);
   
    }
    public function updateImage($image, $email){
        $query = $this->conn()->prepare(
            "UPDATE usertable SET image = ? WHERE email = ?"
    );
    $query->execute([$image, $email]);
}
     

   


   
}


  
            
        

    
     





?>
