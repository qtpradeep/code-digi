<?php
 include ("connector.php");
 
 if(isset($_POST['btnregister'])){
     $fname= $_POST['fname'];
     $lname= $_POST['lname'];
     $email= $_POST['email'];
     $password= $_POST['password'];
     $cpassword= $_POST['cpassword'];
     if($password==$cpassword){
         $insert_id= $conn-> registerUser($fname, $lname, $email, md5($password));
         if(isset($insert_id)){
            $conn->sendEmail($email, $insert_id);
             ?>
                <script>
                    alert("Please Check Your Email To Activate Your Account");
                    window.location.href="login.php";
                </script>
             <?php
            
         }
     }
 }
 
 
 if(isset($_POST['btnlogin'])){
     $email= mysqli_real_escape_string($conn->conn, stripcslashes($_POST['email']));
     $password= md5(mysqli_real_escape_string($conn->conn, stripcslashes($_POST['password'])));
     
     $conn-> login($email, $password);
        
     }
     
if(isset($_POST['action']) && $_POST['action']=="addpackage"){
    $packagecode= $_POST['pkgcode'];
    $packagename= $_POST['pkgname'];
    $packageprice= $_POST['pkgprice'];
    $packageduration= $_POST['pkgduration'];
    $service= $_POST['pkgservice'];
    $influencers= $_POST['influencerscount'];
    $description= $_POST['description'];
    if($conn-> addPackage($packagecode, $packagename, $packageprice, $packageduration, $service, $influencers, $description)){
        echo $msg="Package Added";
    }
    
}

if(isset($_POST['action']) && $_POST['action']=="updatepackage"){
    $packagecode= $_POST['pkgcode'];
    $packagename= $_POST['pkgname'];
    $packageprice= $_POST['pkgprice'];
    $packageduration= $_POST['pkgduration'];
    $service= $_POST['pkgservice'];
    $influencers= $_POST['influencerscount'];
    $description= $_POST['description'];
    $id= $_POST['pkgid'];
    if($conn-> updatePackage($packagecode, $packagename, $packageprice, $packageduration, $service, $influencers, $description, $id)){
        echo $msg="Package Updated";
    }
    
}

if(isset($_REQUEST['do']) && $_REQUEST['do']=="delpack" && isset($_REQUEST['id'])){
        if($conn->deletePackage($_REQUEST['id'])){
            ?>
                <script>
                    alert("Package Deleted");
                    window.location.href="view-packages.php";
                </script>
            <?php
        }
}

if(isset($_POST['action']) && $_POST['action']=="addcoupon"){
    $code= $_POST['couponcode'];
    $discount= $_POST['rate'];
    $validfrom= $_POST['validfrom'];
    $validupto= $_POST['validupto'];
    $description= $_POST['description'];
    if($validfrom== date('m-d-Y')){
        $status=1;
    }else{
        $status=0;
    }
    if($conn->addCoupon($code, $discount, $validfrom, $validupto, $description, $status)){
        echo $msg="Coupon Added Successfully";
    }else{
        echo $msg="Internal Server Error";
    }
    
    
}

if(isset($_POST['action']) && $_POST['action']=="updatecoupon"){
    $code= $_POST['couponcode'];
    $discount= $_POST['rate'];
    $validfrom= $_POST['validfrom'];
    $validupto= $_POST['validupto'];
    $description= $_POST['description'];
    $id= $_POST['id'];
    $status= $_POST['status'];
    if($conn->updateCoupon($code, $discount, $validfrom, $validupto, $description, $status, $id)){
        echo $msg="Coupon Updated Successfully";
    }else{
        echo $msg="Internal Server Error";
    }
}

if(isset($_REQUEST['do']) && $_REQUEST['do']=="delcoupons" && isset($_REQUEST['id'])){
    $id= $_REQUEST['id'];
    if($conn->deleteCoupon($id)){
       ?><script>alert("Coupon Deleted Successfully"); window.location.href="view-coupons.php";</script><?php
    }else{
       ?><script>alert("Error While Deleting Coupon"); window.location.href="view-coupons.php";</script><?php
    }
}

if(isset($_POST['id']) && isset($_POST['action']) && $_POST['action']=="okkyc"){
    $id= $_POST['id'];
    if($conn->approveKYC($id)){
       echo $msg="KYC is Approved";
    }
}
if(isset($_POST['id']) && isset($_POST['action']) && $_POST['action']=="rejectkyc"){
    $id= $_POST['id'];
    if($conn->rejectKYC($id)){
       echo $msg="KYC is Rejected";
    }
}

if(isset($_REQUEST['id']) && isset($_REQUEST['do']) && $_REQUEST['do']=="delinflu"){
    if($conn->deleteInfluencer($_REQUEST['id'])){
        ?>
        <script>alert("Record Deleted"); window.location.href="all-influencers.php";</script>
        <?php
    }
}

if(isset($_REQUEST['id']) && isset($_REQUEST['do']) && $_REQUEST['do']=="deluser"){
    if($conn->deleteUser($_REQUEST['id'])){
        ?>
        <script>alert("Record Deleted"); window.location.href="view-users.php";</script>
        <?php
    }
}

if(isset($_POST['id']) && isset($_POST['action']) && $_POST['action']=="okcamp"){
    $id= $_POST['id'];
    $user= $_POST['user'];
    if($conn->approveCampaign($id, $user)){
       echo $msg="Campaign Approved";
    }
}

if(isset($_POST['id']) && isset($_POST['action']) && $_POST['action']=="discamp"){
    $id= $_POST['id'];
    $user= $_POST['user'];
    if($conn->disapproveCampaign($id, $user)){
       echo $msg="Campaign Rejected";
    }
}

if(isset($_POST['id']) && isset($_POST['action']) && $_POST['action']=="approveTask"){
    $id= $_POST['id'];
    if($conn->approveTask($id)){
        echo $msg="Task is Approved";
    }
}

if(isset($_POST['id']) && isset($_POST['action']) && $_POST['action']=="rejectTask"){
    $id= $_POST['id'];
    if($conn->rejectTask($id)){
       echo $msg="Task is Rejected";
    }
}

if(isset($_REQUEST['id']) && isset($_REQUEST['do']) && $_REQUEST['do']=="deltask"){
    if($conn->deleteTask($_REQUEST['id'])){
        ?>
        <script>alert("Task Deleted"); window.location.href="view-submitions.php";</script>
        <?php
    }
}

if(isset($_POST['AddFranchize'])){

    $id= $_POST['franchise_id'];
    
    $referral= $_POST['referral_id'];
    $password= $_POST['password'];
    
    $name= $_POST['name'];
    $gst= $_POST['gst'];
    $pan= $_POST['pan'];
    $bankname= $_POST['bankname'];
    $branch= $_POST['branch'];
    $acnumber= $_POST['acnumber'];
    $ifsc= $_POST['ifsc'];
    $address= $_POST['address'];
    $contact= $_POST['contact'];
    $uploads= "Uploads/";
    $file1= $_FILES['gst_pic']['name'];
    $file2= $_FILES['pan_pic']['name'];
    $file3= $_FILES['bank_pic']['name'];
    
    $url1=$uploads.basename($file1);
    $url2=$uploads.basename($file2);
    $url3=$uploads.basename($file3);
    
    move_uploaded_file($_FILES['gst_pic']['tmp_name'], $url1);
    move_uploaded_file($_FILES['pan_pic']['tmp_name'], $url2);
    move_uploaded_file($_FILES['bank_pic']['tmp_name'], $url3);
    
    if($conn->addFranchise($id, $name, $gst, $pan, $bankname, $branch, $acnumber, $ifsc, $address, $contact, $url1, $url2, $url3, $referral_id, $password)){
        echo $msg="OK";
    }else{
        echo $msg="Error";
    }
    
    
    
}


if(isset($_POST["UpdateFranchize"])){

    $id= $_POST['franchise_id'];
    $frid= $_POST['frid'];
    
    $referral= $_POST['referral_id'];
    $password= $_POST['password'];
    
    $name= $_POST['name'];
    $gst= $_POST['gst'];
    $pan= $_POST['pan'];
    $bankname= $_POST['bankname'];
    $branch= $_POST['branch'];
    $acnumber= $_POST['acnumber'];
    $ifsc= $_POST['ifsc'];
    $address= $_POST['address'];
    $contact= $_POST['contact'];
    $uploads= "Uploads/";
    
    $file1= $_FILES['gst_pic']['name'];
   
    $file2= $_FILES['pan_pic']['name'];
    $file3= $_FILES['bank_pic']['name'];
    
    $url1=$uploads.basename($file1);
    
    if(!empty(basename($file2))){
         $url2=$uploads.basename($file2);
          move_uploaded_file($_FILES['pan_pic']['tmp_name'], $url2);
    }else{
        $url2= $_POST['pandb'];
    }
   
   if(!empty(basename($file3))){
     $url3=$uploads.basename($file3);
     move_uploaded_file($_FILES['bank_pic']['tmp_name'], $url3);
   }else{
       $url3= $_POST['passbookdb'];
   }
    
    move_uploaded_file($_FILES['gst_pic']['tmp_name'], $url1);
   
   
    
    if($conn->updateFranchise($id, $frid, $name, $gst, $pan, $bankname, $branch, $acnumber, $ifsc, $address, $contact, $url1, $url2, $url3, $referral_id, $password)){
        echo $msg="OK";
    }else{
        echo $msg="Error";
    }
    
    
    
}

if(isset($_POST['action']) && $_POST['action']=="approvesocial"){
    if($conn->approveSocial($_POST['id'], $_POST['user'])){
        echo $msg="Social Media Account is Approved";
    }
}

if(isset($_POST['action']) && $_POST['action']=="disapprovesocial"){
    if($conn->disapproveSocial($_POST['id'], $_POST['user'])){
        echo $msg= "Social Media Account is Disapproved";
    }
}

if(isset($_POST['action']) && $_POST['action']=="approvePayment"){
    if($conn->approvePayment($_POST['id'])){
        echo $msg= "Payment Details Approved";
    }
}

if(isset($_POST['action']) && $_REQUEST['action']=="rejectPayment"){
    if($conn->rejectPayment($_POST['id'])){
         echo $msg= "Payment Details Rejected";
    }
}

if(isset($_REQUEST['do']) && $_REQUEST['do']=="delfr"){
    if($conn-> deleteFranchise($_REQUEST['id'])){
         ?>
        <script>alert("Franchise Deleted"); 
        window.location.href="view-franchise.php";
        </script>
        <?php
    }
}

if(isset($_POST['action']) && $_POST['action']=="addpayment"){
    $taskid= $_POST['taskid'];
    $influencer= $_POST['influencer_id'];
    $amount= $_POST['amount'];
    $tds= $_POST['tds'];
    
    $ddutr= $_POST['utrdd'];
    $date= $_POST['paymentdate'];
    if($conn->addPayment($taskid, $influencer, $amount, $tds, $ddutr, $date)){
       ?>
        <script>alert("Payment Added"); 
        window.location.href="view-task-payments.php";
        </script>
        <?php
    }
}

if(isset($_POST['updatevideo'])){
    $subsid= $_POST['subsid'];
    $video= $_FILES['video']['name'];
    $folder="uploads/";
    $path= $folder.basename($video);
    if(move_uploaded_file($_FILES['video']['tmp_name'] , $path)){
        if($conn->updateVideo($subsid, $path)){
            ?>
                  <script>alert("Video Uploaded"); 
                    window.location.href="upload-video-undertaking.php";
        </script>
            <?php
        }
    }
}

if(isset($_POST['action']) && $_POST['action']=='deletePayment'){
    $id= $_POST['id'];
    if($conn->deletePayment($id)){
        echo $msg="Record Deleted";
    }
}


if(isset($_POST['action']) && $_POST['action']=="changepassword"){
    $newpass= md5($_POST['newpass']);
    $userid= $_POST['userid'];
    $email= $_POST['newemail'];
    if($conn->updatePassword($newpass, $userid, $email)){
        echo $msg="OK";
    }else{
     echo $msg="Error";
    }
}






?>