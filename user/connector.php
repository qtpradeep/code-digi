<?php
    session_start();
    class connection{
        
        function __construct(){
            $this->conn = mysqli_connect("localhost", "u641909197_digizeal", "9gS=P?aQR:QT", "u641909197_digizeal");
        }
        
        function getNextID(){
            $sql= "SELECT MAX(id) AS id FROM userlog";
            $res= mysqli_query($this->conn, $sql);
            $row= mysqli_fetch_assoc($res);
            return $row['id'];
        }
        
        function registerUser($fname, $lname, $email, $password, $contact, $gender, $sponsorid, $franchise, $userid){
            $sql= "INSERT INTO `userlog`(`firstname`, `lastname`, `email`, `password`, `contact`, `gender`, `sponsor_id`, `franchise_id`, `userid`) 
            VALUES ('$fname', '$lname', '$email', '$password', '$contact', '$gender', '$sponsorid', '$franchise', '$userid')";
            if(mysqli_query($this->conn, $sql)){
                
                return mysqli_insert_id($this->conn);
            }
              
        }
        
        function sendEmail($email, $id){
            
            $subject="Verify Your Email";
            $message = "Please Click The Link Below To Verify Your Email";
            $headers = 'From: <info@digizeal.biz>' . "\r\n";
            
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            $headers .= 'From: <info@digizeal.biz>' . "\r\n";
           
                       
            return mail($email,$subject,$message,$headers);
               

        }
        
        
        function login($email, $password){
            $sql= "SELECT * FROM userlog WHERE email='$email' AND password='$password' AND status=1";
            $res= mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($res)==1){
                $row= mysqli_fetch_assoc($res);
                $_SESSION['userid']= $row['id'];
                $_SESSION['refid']= $row['userid'];
                $_SESSION['name']= $row['firstname'];
            ?>
            <script>
                window.location.href="edit-profile.php";
            </script>
         <?php
            }else{
                ?>
                <script>
                    alert("Invalid Username Or Password");
                    window.location.href="index.php";
                </script>
                <?php
            }
        }
        
        
        function addCampaign($campaignID, $campType, $campURL, $influencers, $userid, $subscriptionID){
            $sql= "INSERT INTO campaign(type, url, influencers, campaignid, userid, subscriptionID) VALUES('$campType', '$campURL', '$influencers', '$campaignID', '$userid', '$subscriptionID')";
            return mysqli_query($this->conn, $sql);
            
        }
        
        function doSubscription($name, $subsid, $packageid, $packageprice, $coupon, $gst, $amount, $userid, $ddnumber, $bankname, $branchname, $issuing_date, $ifsc, $utr, $mode, $url){
            $sql= "INSERT INTO subscription(name, subscriptionID, package_id, amount,	coupon, gst, net_amount, userid, ddnumber, bankname, branchname, issuing_date, ifsc_code, utr, pay_mode, video)
            VALUES('$name', '$subsid', '$packageid', '$packageprice', '$coupon', '$gst', '$amount', '$userid', '$ddnumber', '$bankname', '$branchname', '$issuing_date', '$ifsc', '$utr', '$mode', '$url')";
            mysqli_query($this->conn, $sql);
            return mysqli_insert_id($this->conn);
        }
        
        function allSubscriptions($userid){
            $sql= "SELECT * FROM subscription WHERE userid= '$userid' AND status='1' ";
            return mysqli_query($this->conn, $sql);
        }
        
        function getSubscription($user, $sid){
            $sql= "SELECT * FROM subscription WHERE userid= '$user' and id='$sid'";
            return mysqli_query($this->conn, $sql);
        }
        
        function allCampaigns(){
            $sql= "SELECT * FROM campaign";
            return mysqli_query($this->conn, $sql);
        }
        
        function userCampaigns($user){
            $sql= "SELECT * FROM campaign WHERE userid= '$user'";
            return mysqli_query($this->conn, $sql);
        }
        
        
        function getUser($user){
           $sql= "SELECT * FROM userlog WHERE id= '$user'";
            return mysqli_query($this->conn, $sql);
        }
        
        function getbyUserid($id){
             $sql= "SELECT * FROM userlog WHERE userid= '$id'";
            return mysqli_query($this->conn, $sql);
        }
        
        function countuserSubscriptions($user){
            $sql= "SELECT COUNT(id) AS Total FROM subscription WHERE userid='$user'";
            $res= mysqli_query($this->conn, $sql);
            $row= mysqli_fetch_assoc($res);
            if(isset($row['Total'])){ $total= $row['Total']; }else{ $total= 0;}
            return $total;
            
        }
        
        function getName($sponsor){
            $sql= "SELECT * FROM userlog WHERE userid= '$sponsor'";
            $res= mysqli_query($this->conn, $sql);
            $row= mysqli_fetch_assoc($res);
            return $row['firstname'].' '.$row['lastname'];
        }
        
        function myrefferals($sponsor){
            $sql= "SELECT * FROM userlog WHERE sponsor_id= '$sponsor'";
            return mysqli_query($this->conn, $sql);
        }
    
        
        function allPackages(){
            $sql= "SELECT * FROM package";
            return mysqli_query($this->conn, $sql);
        }
        function getPackageById($id){
            $sql= "SELECT * FROM package WHERE id= '$id'";
            return mysqli_query($this->conn, $sql);
        }
        function getPackageByCode($code){
            $sql= "SELECT * FROM package WHERE code= '$code'";
            return mysqli_query($this->conn, $sql);
        }
        function updateUser($fname, $lname, $email, $contact, $gender, $dob, $address, $district, $state, $pincode, $userid, $path){
            $sql= "UPDATE userlog SET firstname='$fname', lastname= '$lname', email= '$email', contact= '$contact', gender= '$gender', 
            dob='$dob', address= '$address', district= '$district', state='$state', pincode= '$pincode', pic='$path' WHERE id= '$userid'";
             return mysqli_query($this->conn, $sql);
        }
        
        function getStates(){
            $sql= "SELECT * FROM states";
            return mysqli_query($this->conn, $sql);
        }
        
        function getCity($state){
            $sql= "SELECT * FROM cities WHERE state_id= '$state'";
            return mysqli_query($this->conn, $sql);
        }
        
        function getallCities(){
            $sql= "SELECT * FROM cities";
            return mysqli_query($this->conn, $sql);
        }
        
        function checkInfCount($userid, $subscriptionID){
          $sql= "SELECT package.influencers from package JOIN subscription on package.code = subscription.package_id WHERE subscription.userid='$userid' AND subscription.subscriptionID= '$subscriptionID'" ;
            $res= mysqli_query($this->conn, $sql);
            $row= mysqli_fetch_assoc($res);
            return $row['influencers'];
        }
        
        function updatePassword($newpass, $userid){
            $newpass= mysqli_real_escape_string($this->conn, stripcslashes($newpass));
           $sql= "UPDATE userlog SET password = '$newpass' WHERE id='$userid'";
            return mysqli_query($this->conn, $sql);
        }
        
    function checksponsor($sponsor){
        if(!empty($sponsor)){
            $sql= "SELECT * FROM userlog WHERE userid= '$sponsor'";
            $res= mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($res)>0)
            {
                $row= mysqli_fetch_assoc($res);
                return $row['firstname'].$row['lastname'];
            }
            else
            {
                 $sql= "SELECT * FROM franchise WHERE franchise_id= '$sponsor'";
                 $res2= mysqli_query($this->conn, $sql);
                 
                    if(mysqli_num_rows($res2)>0)
                    {
                        $row2= mysqli_fetch_assoc($res2);
                        return $row2['name'];
                    }
            }
        }else{
            return 0;
        }
    }
    
    function checkNumber($phone){
        $sql= "SELECT * FROM userlog WHERE contact= '$phone'";
        $res= mysqli_query($this->conn, $sql);
        return $res;
    }
    
     function checkEmail($email){
        $sql= "SELECT * FROM userlog WHERE email= '$email'";
        $res= mysqli_query($this->conn, $sql);
        return $res;
    }
    
    function getDiscount($coupon, $user){
        if($this->iscouponUsed($coupon)){
            $sql= "SELECT discount FROM coupon WHERE name= '$coupon' AND userid= '$user'";
            $res= mysqli_query($this->conn, $sql);
            return $res;
        }else{
            return $msg=2;
        }
        
        
    }
    
    function displaycouponDiscount($coupon){
        $sql= "SELECT discount FROM coupon WHERE name= '$coupon'";
        $res= mysqli_query($this->conn, $sql);
        return $res;
    }
    
    function iscouponUsed($coupon){
        $sql= "SELECT * FROM subscription WHERE coupon= '$coupon'";
        $res= mysqli_query($this->conn, $sql);
        if(mysqli_num_rows($res)>0){
            return false;
        }else{
            return true;
        }
    } 
    
    function displayInfluencersCount($id){
    $sql= "SELECT * FROM task WHERE campaign_id= '$id'";
    $res= mysqli_query($this->conn, $sql);
    return mysqli_num_rows($res);    
    
}

function creditInfluencers($subscription){
    $sql= "SELECT package.influencers, subscription.subscription_date FROM package JOIN subscription ON subscription.package_id= package.code WHERE subscription.subscriptionID= '$subscription'";
    return mysqli_query($this->conn, $sql);
    
}

function campaignTransactions($user, $subscriptionID){
    $sql= "SELECT * FROM campaign WHERE userid= '$user' AND subscriptionID='$subscriptionID'";
    return mysqli_query($this->conn, $sql);
}

function getsharedcampaignfromInfluecners($id){
    $sql= "SELECT * FROM task WHERE campaign_id= '$id'";
    return mysqli_query($this->conn, $sql);
}

function getInfluencer($id){
   $sql= "SELECT * FROM influencers WHERE id= '$id'";
    return mysqli_query($this->conn, $sql);
}

function getCampaignID($id){
    $sql= "SELECT * FROM campaign WHERE id= '$id'";
    $res= mysqli_query($this->conn, $sql);
    $campaign= mysqli_fetch_assoc($res);
    return $campaign['campaignid'];
    
}

function totalInfluencers($user){
    $sql="SELECT SUM(influencers) AS TOTAL FROM campaign WHERE userid= '$user'";
    $res= mysqli_query($this->conn, $sql);
    $row= mysqli_fetch_assoc($res);
    return $row['TOTAL'];
}

function totalCampaigns($user){
    $sql="SELECT COUNT(id) AS TOTAL FROM campaign WHERE userid= '$user'";
    $res= mysqli_query($this->conn, $sql);
    $row= mysqli_fetch_assoc($res);
    return $row['TOTAL'];
}

function totalSubscriptions($user){
    $sql="SELECT COUNT(id) AS TOTAL FROM subscription WHERE userid= '$user'";
    $res= mysqli_query($this->conn, $sql);
    $row= mysqli_fetch_assoc($res);
    return $row['TOTAL'];
}

function totalReferals($user){
    $sql= "SELECT COUNT(id) AS TOTAL FROM userlog WHERE sponsor_id= '$user'";
    $res= mysqli_query($this->conn, $sql);
    $row= mysqli_fetch_assoc($res);
    return $row['TOTAL'];
    
}

function emailvarification($email, $contact, $insert_id){
    //$email= $_POST['email'];
    $otp= rand(100000, 999999);
    @session_start();
    $_SESSION['verificationotp']= $otp;
    $message= "Dear customer, Your OTP to verify your account is".$otp."please ignore if not requested. Thanks and Regards DIGIZEAL INFOSOLUTIONS PRIVATE LIMITED";
    if($this->sendmailtoverify($email, $otp) && $this->sendOTPonMobile($contact, $message, $otp)){
      return true;
    }else{
      return false;
    }
}

function sendOTPonMobile($contact, $otp){

$curl = curl_init();

$data = array();

$data['api_id'] = "APIZAT8b734115344";

$data['api_password'] = "APIZAT8b734115344";
    
$data['sms_type'] = "OTP";
        
$data['sms_encoding'] = "text";

$data['sender'] = "DIGIZL";

$data['number'] = $contact;

$data['message'] = "";

$data['template_id'] = "141681";

$data_string = json_encode($data);

$ch = curl_init('https://www.bulksmsplans.com/api/send_sms');

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(

    'Content-Type: application/json',

    'Content-Length: ' . strlen($data_string))

);
$result = curl_exec($ch);
return $result;
}

function sendOTP(){
    $email= $_POST['email'];
    $otp= rand(100000, 999999);
    $_SESSION['otp']= $otp;
    if($this->sendmail($email, $otp)){
       return true;
    }else{
       return false;
    }
}

function sendmail($email, $otp){
$to = $email;
$subject = "Change Password- DigiZeal.biz";

$message = "
<html>
<head>
<title>Change Password- DigiZeal.biz</title>
</head>
<body>
<h3 style=color:green> Change Your Password </h3>
<hr>
<p>We have received a password change request from your DigiZeal account. Please Copy the code and paste while changing your password.</p>
<div style='font-size: 20px; font-family: fantasy;'>".$otp."</div>
<p>If you didn't ask to change your password, please ignore this email. Your password will not be changed.</p>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <noreply@digizeal.biz>' . "\r\n";


if(mail($to,$subject,$message,$headers)){
    return true;
}else{
    return false;
}
}

function sendmailtoverify($email, $otp){
$to = $email;
$subject = "Email Verification- DigiZeal.biz";

$message = "
<html>
<head>
<title>Email Verification- DigiZeal.biz</title>
</head>
<body>
<h3 style=color:green>Verify Your Email</h3>
<hr>
<p>Thank You !!! for your interest in DigiZeal. We have just received your signup request details. <u>Please Verify Your Email</u>. Copy and paste below 6 digit code</p>
<div style='font-size: 20px; font-family: fantasy;'>".$otp."</div>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <noreply@digizeal.biz>' . "\r\n";


if(mail($to,$subject,$message,$headers)){
    return true;
}else{
    return false;
}
}


function recoverPassword(){
    $email= $_POST['email'];
    $password= md5($_POST['password']);
    $otp= $_POST['otp'];
    if($otp==$_SESSION['otp'])
    {
        $sql= "UPDATE userlog SET `password`= '$password' WHERE `email`= '$email'";
        $res= mysqli_query($this->conn, $sql);
        if($res){
           return true;
        }else{
            return false;
        }
        
    }else{
        echo $msg="Invalid OTP";
    }
    
}

function getFranchise($id){
    $sql="SELECT * FROM franchise WHERE franchise_id= '$id'";
    $res= mysqli_query($this->conn, $sql);
    $row= mysqli_fetch_assoc($res);
    return $row['name'];
}

function approveUser($id){
    $sql= "UPDATE userlog SET status=1 WHERE id='$id'";
    if(mysqli_query($this->conn, $sql)){
        return true;
    }else{
        return false;
    }
}

function reportInfluencer($campaign, $influencer, $user, $task, $reporttext){
    $sql= "INSERT INTO `task_complaign`(`task_id`, `campaign_id`, `influencer_id`, `user_id`, `issue`) VALUES ('$task', '$campaign', '$influencer', '$user', '$reporttext')";
    if(mysqli_query($this->conn, $sql)){
        if($this->taskreported($task)){
            return true;
        }
    }
}

function taskreported($task){
$sql= "UPDATE task SET is_reported='1' WHERE id='$task'";
return mysqli_query($this->conn, $sql);
}

function addCoupon($coupon, $userid, $discount){
    
    $sql= "INSERT INTO `coupon`(`userid`, `name`, `discount`) VALUES ('$userid', '$coupon', $discount)";
    return mysqli_query($this->conn, $sql);
}

function expireCoupon($userid, $coupon){
    $sql= "UPDATE coupon SET status=0 WHERE userid='$userid' AND coupon='$coupon'";
    return mysqli_query($this->conn, $sql);
}

function countCoupons($userid){
    $sql= "SELECT COUNT(id) as TOTAL FROM coupon WHERE userid='$userid' AND status=1";
    $res= mysqli_query($this->conn, $sql);
    $row= mysqli_fetch_assoc($res);
    return $row['TOTAL'];
}

function getCoupons($userid){
    $sql= "SELECT * FROM coupon WHERE userid= '$userid'";
    return mysqli_query($this->conn, $sql);
}



        
       
    }
    
    $conn= new connection;


?>