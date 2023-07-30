<?php
class LoginContr extends LoginModal {
    private $fname;
    private $lname;
    private $img;
    private $email;
    private $user_id;
    private $status;
    
   
    
    public function __construct($fname, $lname, $img, $email, $user_id, $status){
    $this->fname = $fname;
    $this->lname = $lname;
    $this->img = $img;
    $this->email = $email;
    $this->user_id = $user_id;
    $this->status =  $status;


   

  }
    public function signinUser(){
            $chk;
           if ($this->emailCheck($this->email) !== true){
            $this->signup($this->fname, $this->lname, $this->img, $this->email, $this->user_id,  $this->status);
              $chk = true;
          

           }else { 
            $this->updateStatus("Active Now", $this->email);
           $chk = false;
           }
           return $chk;
           
    }

    public function loginUser(){
         session_start();
         $data = $this->login($this->email);
         $_SESSION['unique_id'] = $data['unique_id'];
    }
   
    
 
    
   
}


?>
