<?php
 include ("connector.php");
 
 if(isset($_REQUEST['do']) && $_REQUEST['do']=="registeruser"){
     
     $nextid= $conn->getNextID();
     
     $fname= $_POST['fname'];
     $lname= $_POST['lname'];
     $email= $_POST['email'];
     $contact= $_POST['contact'];
     $gender= $_POST['gender'];
     $password= $_POST['password'];
     $cpassword= $_POST['cpassword'];
    
     if(str_starts_with($_POST['sponsorid'], 'DZFR')){
         $franchise= $_POST['sponsorid'];
         $sponsorid='';
     }else{
         $sponsorid= $_POST['sponsorid'];
         $franchise='';
     }
     $userid= "DZ".str_pad($nextid, 8, '0', STR_PAD_LEFT);
     
     if($password==$cpassword){
         
         $insert_id= $conn->registerUser($fname, $lname, $email, md5($password), $contact, $gender, $sponsorid, $franchise,  $userid);
         if(isset($insert_id))
         {
             $conn->emailvarification($email, $contact, $insert_id);
             ?>
             <script>
                //alert("Please Check Your Email To Activate Your Account");
                 window.location.href="verify-contact.php?id=<?php echo $insert_id;?>";
             </script>
             <?php
         }
        }
    }
    
    
if(isset($_POST['action']) && $_POST['action']=="checksponsor"){
    $sponsor= $_POST['sponsor'];
    $res= $conn->checksponsor($sponsor);
    if(!empty($res)){
        echo $res;
    }else{
        echo $msg="";
    }
}

 
 
 
 if(isset($_POST['btnlogin'])){
     $email= mysqli_real_escape_string($conn->conn, stripcslashes($_POST['email']));
     $password= md5(mysqli_real_escape_string($conn->conn, stripcslashes($_POST['password'])));
     
     $conn-> login($email, $password);
        
}

if(isset($_POST['action']) && $_POST['action']=="addcampaign")
{
    $campaignID= $_POST['campid'];
    $campType= $_POST['camptype'];
    $campURL= $_POST['campurl'];
    $influencers= $_POST['infcount'];
    $userid= $_POST['userid'];
    $subscriptionID= $_POST['subscriptionID'];
    
   if($conn->addCampaign($campaignID, $campType, $campURL, $influencers, $userid, $subscriptionID)){
       echo $msg="Campaign Created Successfully. Your Campaign is Under Review.";
   }else{
       echo $msg="Something Went Wrong";
   }

}

if(isset($_REQUEST['do']) && $_REQUEST['do']=="payment"){
    $subsid= $_POST['subs'];
    $name= $_POST['name'];
    $packageid= $_POST['package'];
    $packageprice= $_POST['price'];
    $coupon= $_POST['coupon'];
    $gst= $_POST['gst'];
    $userid= $_POST['user'];
    $ddnumber="";
    $ifsc="";
    $utr="";
    
    if($_POST['mode']=="dd"){
        $ddnumber= $_POST['ddnumber'];
        $bankname= $_POST['ddbankname'];
        $branchname= $_POST['ddbranchname'];
        $issuing_date= $_POST['dddate'];
        $amount= $_POST['ddamount'];
        $mode="dd";
    }
    if($_POST['mode']=="neft")
    {
    $bankname= $_POST['neftbankname'];
    $branchname= $_POST['neftbranchname'];
    $ifsc= $_POST['ifsc'];
    $utr= $_POST['utr'];
    $issuing_date= $_POST['neftdate'];
    $amount= $_POST['neftamount'];
    $mode="neft";
    }
    
    $uploads="uploads/";
    $file= $_FILES['video']['name'];
    $url= $uploads.basename($file);
    $extension = strtolower(pathinfo($url,PATHINFO_EXTENSION));
    $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

    if(in_array($extension, $extensions_arr)){
    move_uploaded_file($_FILES['video']['tmp_name'], $url);
    
        $id= $conn->doSubscription($name, $subsid, $packageid, $packageprice, $coupon, $gst, $amount, $userid, $ddnumber, $bankname, $branchname, $issuing_date, $ifsc, $utr, $mode, $url);
        if(!empty($id)){
            $conn->expireCoupon($userid, $coupon);
           ?>
            <script>
                window.location.href="payment-success.php?id=<?php echo $id;?>"
            </script>
           <?php
        }else{
            echo $id=0;
        }
    }else{
        ?>
            <script>
                alert("Unsupported Video File Format");
                window.location.href="buy-subscription.php";
            </script>
           <?php
    }
}

if(isset($_POST['action']) && $_POST['action']=="getPackagebyID"){
    $code= $_POST['packageid'];
    $res= $conn->getPackageByCode($code);
    $row= mysqli_fetch_assoc($res);
    echo $row['price'];
}

 if(isset($_POST['action']) && $_POST['action']=="updateprofile"){
     $fname= $_POST['fname'];
     $lname= $_POST['lname'];
     $email= $_POST['email'];
     $contact= $_POST['contact'];
     $gender= $_POST['gender'];
     $dob= $_POST['dob'];
     $address= $_POST['address'];
     $district= $_POST['district'];
     $state= $_POST['state'];
     $pincode= $_POST['pincode'];
     $userid= $_POST['userid'];
     $folder="uploads/";
     $file= $_FILES['pic']['name'];
     if(!empty(basename($file))){
         $path= $folder.basename($file);
         move_uploaded_file($_FILES['pic']['tmp_name'], $path);
     }else{
         $path= $_POST['picdb'];
     }
     
     if($conn->updateUser($fname, $lname, $email, $contact, $gender, $dob, $address, $district, $state, $pincode, $userid, $path)){
         echo "Profile Updated";
     }
    }
    
if(isset($_POST['action']) && $_POST['action']=="getCity"){
    $state= $_POST['state'];
    $res= $conn->getCity($state);
    if(mysqli_num_rows($res)>0){
        echo "<option selected disabled>--Select City--</option>";
        while($row= mysqli_fetch_assoc($res)){
            ?>
            <option value="<?php echo $row['id'];?>"><?php echo $row['city'];?>
            <?php
        }
    }
}

if(isset($_POST['action']) && $_POST['action']=="checkInfCount"){
    $userid= $_POST['userid'];
    $infcount= $_POST['infcount'];
    $subscriptionID=$_POST['subscriptionID'];
    $credit= $conn->checkInfCount($userid, $subscriptionID);
    
    $debitres= $conn->campaignTransactions($userid, $subscriptionID);
    
    $debit=0;
    if(mysqli_num_rows($debitres)>0){
        while($row= mysqli_fetch_assoc($debitres)){
            $debit+= $row['influencers'];
        }
        $balance= $credit-$debit;
    }else{
        $balance= $credit;
    }
    
    if($balance-$infcount<0){
        echo $error= "You are limited to ".$balance." influencers";
    }else{
        echo $error= $balance;
    }
    
}

if(isset($_POST['action']) && $_POST['action']=="checkNumber"){
    $phone= $_POST['contact'];
    $res= $conn->checkNumber($phone);
    if(mysqli_num_rows($res)>0){
        echo $ok=0;
    }else{
        echo $ok=1;
    }
}

if(isset($_POST['action']) && $_POST['action']=="checkEmail"){
    $email= $_POST['email'];
    $res= $conn->checkEmail($email);
    if(mysqli_num_rows($res)>0){
        echo $ok=0;
    }else{
        echo $ok=1;
    }
}

if(isset($_POST['action']) && $_POST['action']=="changepassword"){
    $newpass= md5($_POST['newpass']);
    $userid= $_POST['userid'];
    if($conn->updatePassword($newpass, $userid)){
        echo $msg="OK";
    }else{
     echo $msg="Error";
    }
}

if(isset($_POST['action']) && $_POST['action']=="getDiscount"){
    $coupon= $_POST['coupon'];
    $user= $_POST['user'];
    $res= $conn->getDiscount($coupon, $user);
    if($res==2){
        echo $msg=2;
    }else{
        $row= mysqli_fetch_assoc($res);
        if(mysqli_num_rows($res)>0){
            echo $msg= $row['discount'];
        }else{
           echo $msg=0;
        }
    }
    
}

if(isset($_POST['sendotp'])){
   if($conn->sendOTP()){
       echo $msg= "OK";
   }else{
       echo $msg= "Error";
   }
}

if(isset($_POST['recoverpass'])){
    if($conn->recoverPassword()){
        unset($_SESSION['otp']);
        echo $msg="OK";
    }else{
        echo $msg="Invalid OTP";
    }
}


if(isset($_POST['btnverifycontact'])){
    $inputotp= $_POST['inputotp'];
    $id= $_POST['id'];
    // @session_start();
    $created= $_SESSION['verificationotp'];
    if($inputotp==$created){
        if($conn->approveUser($id)){
        ?>
            <script>
                alert("Your Mobile Number is Verified");
                window.location.href="login.php"
                
            </script>
        <?php }else{
            ?>
                <script>
                    alert("Something Went Wrong");
                    window.location.href="verify-contact.php?id=<?php echo $id;?>"
                </script>
            <?php
        }
    }else{
        ?>
        <script>
                alert("Incorrect OTP");
                window.location.href="verify-email.php?id=<?php echo $id;?>";
                
            </script>
        <?php
    }
    
}


 if(isset($_POST['action']) && $_POST['action']=="reportinf"){
        $campaign= $_POST['campaign'];
        $influencer= $_POST['influencer'];
        $user= $_POST['user'];
        $task= $_POST['task'];
        $reporttext= $_POST['reporttext'];
        if($conn->reportInfluencer($campaign, $influencer, $user, $task, $reporttext)){
            echo $msg=1;
        }else{
            echo $msg=0;
        }
    }
    
    if(isset($_POST['action']) && $_POST['action']=="generatecoupon"){
        $coupon= "DZCP".rand(1001, 9999)*date('s');
        $userid= $_POST['userid'];
        $discount="100";
        if($conn->addCoupon($coupon, $userid, $discount)){
            echo $coupon;
        }
        
        
        
        
        
    }




?>