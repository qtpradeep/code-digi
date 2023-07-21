<?php
 include ("connector.php");
 
 if(isset($_REQUEST['do']) && $_REQUEST['do']=='registerfranchise'){
     $fname= $_POST['fname'];
     $lname= $_POST['lname'];
     $email= $_POST['email'];
     $password= $_POST['password'];
     $contact= $_POST['contact'];
     $gender= $_POST['gender'];
     
        $insert_id= $conn-> registerUser($fname, $lname, $email, md5($password), $contact, $gender);
         if(isset($insert_id)){
            //$conn->sendEmail($email, $insert_id);
             ?>
                <script>
                    alert("Please Check Your Email To Activate Your Account");
                    window.location.href="login.php";
                </script>
             <?php
            
         }
     }
 
 
 
 if(isset($_POST['btnlogin'])){
     $frid= mysqli_real_escape_string($conn->conn, stripcslashes($_POST['frid']));
     $password= mysqli_real_escape_string($conn->conn, stripcslashes($_POST['password']));
     
     $conn-> login($frid, $password);
        
}

if(isset($_POST['updateprofile'])){
    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $email= $_POST['email'];
    $contact= $_POST['contact'];
    $address= $_POST['address'];
    $state= $_POST['state'];
    $city= $_POST['city'];
    $pincode= $_POST['pincode'];
    $dob= $_POST['dob'];
    
    
    // $fb= $_POST['fb'];
    // $ln= $_POST['ln'];
    // $twtr= $_POST['twtr'];
    // $insta= $_POST['insta'];
    // $youtube= $_POST['youtube'];
    $folder="uploads/";
    $file= $_FILES['pic']['name'];
    if(!empty(basename($file))){
        $url= $folder.$file;
        move_uploaded_file($_FILES['pic']['tmp_name'], $url);
    }else{
        $url= $_POST['pic_db'];
    }
    $user= $_POST['userid'];
    
   if ($conn->updateProfile($fname, $lname, $email, $contact, $address, $state, $city, $pincode, $dob, $url, $user)){
       echo $msg= "Profile Update Successfully";
   }
}
   
   if(isset($_POST['action']) && $_POST['action']=="checkNumber"){
    $phone= $_POST['contact'];
    $res= $conn->checkNumber($phone);
    if(mysqli_num_rows($res)>0){
        echo $msg= 'y';
    }else{
        echo $msg= 'n';
    }
}

if(isset($_POST['action']) && $_POST['action']=="checkEmail"){
    $email= $_POST['email'];
    $res= $conn->checkEmail($email);
    if(mysqli_num_rows($res)>0){
        echo $msg= 'y';
    }else{
        echo $msg='n';
    }
}

if(isset($_POST['action']) && $_POST['action']=="getCity"){
    $state= $_POST['state'];
    $res= $conn->getCity($state);
    if(mysqli_num_rows($res)>0){
        while($row= mysqli_fetch_assoc($res)){
              if($user['city']==$row['id']) $selected="selected"; else $selected="";
            ?>
                <option value="<?php echo $row['id'];?>" <?php echo $selected;?> ><?php echo $row['city'];?></option>
            <?php
        }
    }
}

if(isset($_POST['action']) && $_POST['action']=="updatesocial"){
    $fb= $_POST['fb'];
    $insta= $_POST['insta'];
    $tw= $_POST['tw'];
    $li= $_POST['li'];
    $quora= $_POST['quora'];
    $user= $_POST['userid'];
    if($conn->updatesocialProfile($fb, $insta, $tw, $li, $quora, $user)){
        echo $msg="Your Social Media Accounts Are Under Review...";
    }else{
        echo $msg= "Error";
    }
}

if(isset($_POST['action']) && $_POST['action']=="updatekyc"){
    $folder= "uploads/";
    $file1= $_FILES['adharpic']['name'];
    if(!empty(basename($file1))){
        $adharurl= $folder.basename($file1);
        move_uploaded_file($_FILES['adharscan']['tmp_name'], $adharurl);
    }else{
        $adharurl= $_POST['adhardb'];
    }
    
    $file2= $_FILES['panscan']['name'];
    if(!empty(basename($file2))){
        $panurl= $folder.basename($file2);
        move_uploaded_file($_FILES['panpic']['tmp_name'], $panurl);
    }else{
        $panurl= $_POST['pandb'];
    }
    
    $adhar= $_POST['adhar'];
    $pan= $_POST['pan'];
    $bank= $_POST['bankname'];
    $branch= $_POST['branch'];
    $ifsc= $_POST['ifsc'];
    $payee= $_POST['payee'];
    $account= $_POST['account'];
    $user= $_POST['userid'];
    
    if($conn->updateKYC($user, $adharurl, $panurl, $adhar, $pan, $bank, $branch, $ifsc, $payee, $account)){
        echo $msg="Your KYC is Under Review...";
    }else{
        echo $msg="";
    }
    
}

if(isset($_POST['btnRequest'])){
    $influencer= $_POST['id'];
    if($conn->sendRequest($influencer)){
        ?>
            <script>
                alert("Request Send");
                window.location.href="request-for-task.php";
            </script>
        <?php
    }
}

if(isset($_POST['submittask'])){
    $influencer_id= $_POST['influencer_id'];
    $campaignid= $_POST['campaignid'];
    $postURL= $_POST['postURL'];
    if($conn->submitTask($influencer_id, $campaignid, $postURL)){
      echo $msg= "Task Submitted Successfully And Under Review.";
    }
    
}
?>