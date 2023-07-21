<?php
    session_start();
    class connection{
        
        function __construct(){
            $this->conn = mysqli_connect("localhost", "u641909197_digizeal", "9gS=P?aQR:QT", "u641909197_digizeal");       
            }
        
        function registerUser($fname, $lname, $email, $password){
            $sql= "INSERT INTO `userlog`(`firstname`, `lastname`, `email`, `password`) VALUES ('$fname', '$lname', '$email', '$password')";
            if(mysqli_query($this->conn, $sql)){
                
                return mysqli_insert_id($this->conn);
                
            }
              
        }
        
        function sendEmail($email, $id){
            
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: <info@callcenterssolution.com>' . "\r\n";
            
            $subject="Verify Your Email";
            $message= "<h2>hello</h2>";
            
            
            
            
            mail($email,$subject,$message,$headers);
                
            
            
        }
        
        
        function login($email, $password){
            $sql= "SELECT * FROM adminlog WHERE email='$email' AND password='$password' AND status=1";
            $res= mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($res)==1){
                $row= mysqli_fetch_assoc($res);
                $_SESSION['adminid']= $row['id'];
                $_SESSION['adminname']= $row['username'];
            ?>
            <script>
                window.location.href="index.php";
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
        
        
        function addPackage($packagecode, $packagename, $packageprice, $packageduration, $service, $influencers, $description){
            
           $sql="INSERT INTO `package`(`name`, `code`, `services`, `price`, `description`, `influencers`, `duration`) VALUES ('$packagename', '$packagecode', '$service', '$packageprice', '$description', '$influencers', '$packageduration')";
           return mysqli_query($this->conn, $sql);
        }
        
        function getPackages(){
            $sql="Select * FROM package";
            return mysqli_query($this->conn, $sql);
        }
        
        function getPackagesbyID($id){
            $sql="Select * FROM package WHERE id= '$id'";
            return mysqli_query($this->conn, $sql);
        }
        
        function updatePackage($packagecode, $packagename, $packageprice, $packageduration, $service, $influencers, $description, $id){
            
            $description= mysqli_real_escape_string($this->conn, stripslashes(trim($description)));
            
           $sql="UPDATE `package` SET `name`='$packagename',`code`='$packagecode',`services`='$service',`price`='$packageprice',`description`='$description',`influencers`='$influencers',`duration`='$packageduration' WHERE id='$id'";
            return mysqli_query($this->conn, $sql);
        }
        
        function deletePackage($id){
            $sql= "DELETE FROM package WHERE id='$id'";
            return mysqli_query($this->conn, $sql);
        }
        
        function addCoupon($code, $discount, $validfrom, $validupto, $description, $status){
           $sql="INSERT INTO `coupon`(`name`, `discount`, `validfrom`, `validupto`, `description`, `status`) 
           VALUES ('$code', '$discount', '$validfrom', '$validupto', '$description', '$status')";
           return mysqli_query($this->conn, $sql);
        }
         function getCoupons(){
            $sql="Select * FROM coupon";
            return mysqli_query($this->conn, $sql);
        }
        function getcouponbyId($id){
            $sql="Select * FROM coupon WHERE id= '$id'";
            return mysqli_query($this->conn, $sql);
        }
        
        function updateCoupon($code, $discount, $validfrom, $validupto, $description, $status, $id){
            $sql= "UPDATE `coupon` SET `name`='$code',`discount`='$discount',`validfrom`='$validfrom',`validupto`='$validupto',`description`='$description',`status`='$status' WHERE id= '$id'";
            return mysqli_query($this->conn, $sql);
            
        }
        
        function deleteCoupon($id){
            $sql= "DELETE FROM coupon WHERE id='$id'";
            return mysqli_query($this->conn, $sql);
        }
        
        function getInfluencers(){
            $sql= "SELECT * FROM influencers";
            return mysqli_query($this->conn, $sql);
        }
        
        function getInfluencerById($id){
            $sql= "SELECT * FROM influencers WHERE id= '$id'";
            
            $res= mysqli_query($this->conn, $sql);
            $row= mysqli_fetch_assoc($res);
            return $row;
        }
        
        function getCity($city){
            $sql= "SELECT * FROM cities WHERE id= '$city'";
            $res= mysqli_query($this->conn, $sql);
            $row= mysqli_fetch_assoc($res);
            return $row['city'];
        }
        
        function getState($state){
            $sql= "SELECT * FROM states WHERE id= '$state'";
            $res= mysqli_query($this->conn, $sql);
            $row= mysqli_fetch_assoc($res);
            return $row['name'];
        }
        
        function getKYC($id){
            $sql= "SELECT * FROM kyc WHERE userid= '$id'";
            $res= mysqli_query($this->conn, $sql);
            return $res;
        }
        
        function getUser($id){
            $sql= "SELECT * FROM influencers WHERE id= '$id'";
            $res= mysqli_query($this->conn, $sql);
            return $res;
        }
        
        function getUsers($id){
            $sql= "SELECT * FROM userlog WHERE id= '$id'";
            $res= mysqli_query($this->conn, $sql);
            return $res;
        }
        
        function approveKYC($id){
            $sql= "UPDATE kyc SET status=1 WHERE id= '$id'";
            return mysqli_query($this->conn, $sql);
            
        }
        function rejectKYC($id){
            $sql= "UPDATE kyc SET status=2 WHERE id= '$id'";
            return mysqli_query($this->conn, $sql);
            
        }
        
        function deleteInfluencer($id){
            $sql= "DELETE FROM influencers WHERE id= '$id'";
            return mysqli_query($this->conn, $sql);
        }
        
        function viewAllUsers(){
            $sql= "SELECT * FROM userlog";
            return mysqli_query($this->conn, $sql);
        }
        
        function deleteUser($id){
            $sql= "DELETE FROM userlog WHERE id='$id'";
            return mysqli_query($this->conn, $sql);
        }
        
        function allCampaigns(){
            $sql= "SELECT * FROM campaign";
            return mysqli_query($this->conn, $sql);
        }
        
        function getCampaign($userid){
            $sql= "SELECT * FROM campaign WHERE userid= '$userid'";
            return mysqli_query($this->conn, $sql);
        }
        
        function getCampaignById($id){
            $sql= "SELECT * FROM campaign WHERE id= '$id'";
            return mysqli_query($this->conn, $sql);
        }
        
        function approveCampaign($id, $user){
            $sql= "UPDATE campaign SET status=1 WHERE id= '$id'";
            return mysqli_query($this->conn, $sql);
        }
        
        function disapproveCampaign($id, $user){
            $sql= "UPDATE campaign SET status=2 WHERE id= '$id'";
            return mysqli_query($this->conn, $sql);
    
        }
        
        function shareToInfluencers($id, $user){
           
            $reqres= $this->getTaskRequest();
            while($row= mysqli_fetch_assoc($reqres))
            {
                if(!$this->isalreadyShared($row['influencer_id'])){
                   $sql= "INSERT INTO `sharedcampaign`(`campaign_id`, `user_id`, `influencer_id`) VALUES ('$id','$user', '".$row['influencer_id']."')";
                   if(mysqli_query($this->conn, $sql)){
                       $sql= "UPDATE requestfortask SET status='1'";
                       $ok= mysqli_query($this->conn, $sql);
                      
                   }else{
                       $ok= false;
                   }
                }
            }
            return $ok;
        }
        
        function getTaskRequest(){
            $date= date('Y-m-d');
            $sql= "SELECT * FROM requestfortask WHERE req_date='$date'";
            return mysqli_query($this->conn, $sql);
        }
        
        function isalreadyShared($influencer){
            $date= date('Y-m-d');
            $sql= "SELECT * FROM sharedcampaign WHERE influencer_id= '$influencer' AND date= '$date'";
            $res= mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($res)>0){
                return true;
            }else{
                return false;
            }
        }
        
        function hasCampaign($id){
            $sql= "SELECT * FROM campaign WHERE userid= '$id'";
            $res= mysqli_query($this->conn, $sql);
            return mysqli_num_rows($res);
            
        }
        
        function getSubmittedTask(){
            $date= date("Y-m-d");
            $sql= "SELECT * FROM task ORDER BY id DESC ";
            return mysqli_query($this->conn, $sql);
            
        }
        
        function approveTask($id){
            $sql= "UPDATE task SET task_status='1' WHERE id= '$id'";
            return mysqli_query($this->conn, $sql);
            
        }
        
        function rejectTask($id){
            $sql= "UPDATE task SET task_status='2' WHERE id= '$id'";
            return mysqli_query($this->conn, $sql);
            
        }
        
        
        function deleteTask($id){
            $sql= "DELETE FROM task WHERE id= '$id'";
            return mysqli_query($this->conn, $sql);
            
        }
        
        function getNextFRID(){
            $sql= "SELECT MAX(id) AS id FROM franchise";
            $res= mysqli_query($this->conn, $sql);
            $row= mysqli_fetch_assoc($res);
            return $row['id']+1;
        }
        
        function addFranchise($id, $name, $gst, $pan, $bankname, $branch, $acnumber, $ifsc, $address, $contact, $url1, $url2, $url3, $referral_id, $password){
           $sql= "INSERT INTO `franchise`(`referral_id`, `password`, `name`, `gst`, `pan`, `gst_scan`, `pan_scan`, `bankname`, `bankbranch`,  `ifsccode`, `acnumber`, `passbook_scan`, `address`, `phone`, `franchise_id`) VALUES ('$referral_id', '$password', '$name', '$gst', '$pan', '$url1', '$url2', '$bankname', '$branch', '$ifsc', '$acnumber', '$url3', '$address', '$contact', '$id')";
           return mysqli_query($this->conn, $sql);
        }
        
        function viewFranchise(){
            $sql= "SELECT * FROM franchise";
            return mysqli_query($this->conn, $sql);
        }
        
        function getSMAcoounts($influencer){
            $sql= "SELECT * FROM social WHERE userid= '$influencer'";
            return mysqli_query($this->conn, $sql);
        }
        
        function getSMList(){
            $sql= "SELECT * FROM social";
            return mysqli_query($this->conn, $sql);
        }
        
        function approveSocial($id, $user){
            $sql= "UPDATE social SET status=1 WHERE id= '$id'";
            return mysqli_query($this->conn, $sql);
        
        }
        
         function disapproveSocial($id, $user){
            $sql= "UPDATE social SET status=2 WHERE id= '$id'";
           return mysqli_query($this->conn, $sql);
                
            
        }
        
        function isKYCdone($influencer){
            $sql= "SELECT * FROM kyc WHERE userid='$influencer'";
            $res= mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($res)==1){
                return true;
            }else{
                return false;
            }
                    
        }
        
        function hasSM($influencer){
            $sql= "SELECT * FROM social WHERE userid='$influencer'";
            $res= mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($res)==1){
                return true;
            }else{
                return false;
            }
                    
        }
        
        function displayPaymentDetails(){
            $sql= "SELECT * FROM subscription ORDER BY id DESC";
            return mysqli_query($this->conn, $sql);
        }
        
        function approvePayment($id){
            $sql= "UPDATE subscription SET payment_status=1, status=1 WHERE id= '$id'";
            return mysqli_query($this->conn, $sql);
        }
        
         function rejectPayment($id){
            $sql= "UPDATE subscription SET payment_status=0 WHERE id= '$id'";
            return mysqli_query($this->conn, $sql);
        }
        
        function getreportedTask(){
            $sql= "SELECT * FROM task_complaign";
            return mysqli_query($this->conn, $sql);
            
        }
        
        function getTask($id){
            $sql= "SELECT * FROM task WHERE id='$id'";
            return mysqli_query($this->conn, $sql);
            
        }
        function deleteFranchise($id){
            $sql= "DELETE FROM franchise WHERE id= '$id'";
            return mysqli_query($this->conn, $sql);
        }
        
        
        function displayKYCDetails(){
            $sql= "SELECT * FROM kyc";
            return mysqli_query($this->conn, $sql);
        }
        
        function getFranchiseById($frid){
            $sql= "SELECT * FROM franchise WHERE id= '$frid'";
            return mysqli_query($this->conn, $sql);
        }
        
        function updateFranchise($id, $frid, $name, $gst, $pan, $bankname, $branch, $acnumber, $ifsc, $address, $contact, $url1, $url2, $url3, $referral_id, $password){
            $sql= "UPDATE `franchise` SET `referral_id`='$refferal_id',`password`='$password',`name`='$name',`gst`='$gst',`pan`='$pan',`gst_scan`='$url1',`pan_scan`='$url2',`bankname`='$bankname',`bankbranch`='$branch',`ifsccode`='$ifsc',`acnumber`='$acnumber',`passbook_scan`='$url3',`address`='$address',`phone`='$contact',`franchise_id`='$id' WHERE id= '$frid'";
            return mysqli_query($this->conn, $sql);
        }
        
        function addPayment($taskid, $influencer_id, $amount, $tds, $ddutr, $date){
            $sql= "INSERT INTO taskpayment (taskid, influencer_id, amount, tds, dd_utr, payment_date) VALUES ('$taskid', '$influencer_id', '$amount', '$tds', '$ddutr', '$date')";
            $res= mysqli_query($this->conn, $sql);
            
            if($res){
                $sql2= "UPDATE task SET is_paid=1 WHERE id='$taskid'";
                mysqli_query($this->conn, $sql2);
                return $res;
            }
            
        }
        
        
        
        function taskPaymentDetails(){
            $sql= "SELECT * FROM taskpayment";
            return mysqli_query($this->conn, $sql);
        }
        
        function updateVideo($userid, $path){
            $sql= "UPDATE subscription SET video= '$path' WHERE subscriptionID='$userid'";
            return mysqli_query($this->conn, $sql);
        }
        
        function allSubscriptions(){
            $sql= "SELECT * FROM subscription";
            return mysqli_query($this->conn, $sql);
        }
        
        function displaycouponDiscount($coupon){
        $sql= "SELECT discount FROM coupon WHERE name= '$coupon'";
        $res= mysqli_query($this->conn, $sql);
        return $res;
        }
        
         function getSubscription($user, $sid){
            $sql= "SELECT * FROM subscription WHERE userid= '$user' and id='$sid'";
            return mysqli_query($this->conn, $sql);
        }
         function getPackageByCode($code){
            $sql= "SELECT * FROM package WHERE code= '$code'";
            return mysqli_query($this->conn, $sql);
        }
        
        function deletePayment($id){
            $sql= "DELETE FROM subscription WHERE id= '$id'";
            return mysqli_query($this->conn, $sql);
        }
        
        function displayPendingCampaign(){
          $date=  date('Y-m-d');
        $sql= "SELECT * FROM campaign WHERE status=0";
        return mysqli_query($this->conn, $sql);
            
        }
        
         function displayPendingPayment(){
          $date=  date('Y-m-d');
        $sql= "SELECT * FROM subscription WHERE payment_status=0";
        return mysqli_query($this->conn, $sql);
            
        }
        
        function pendingKYC(){
            $sql= "SELECT * FROM kyc WHERE status=0";
            return mysqli_query($this->conn, $sql);
        }
        
        function pendingapprovalTask(){
             $sql= "SELECT * FROM task WHERE task_status=0";
            return mysqli_query($this->conn, $sql);
        }
        
        function pendingSMProfile(){
            $sql= "SELECT * FROM social WHERE status=0";
            return mysqli_query($this->conn, $sql);
        }
        
        function updatePassword($newpass, $userid, $email){
            $newpass= mysqli_real_escape_string($this->conn, stripcslashes($newpass));
           $sql= "UPDATE adminlog SET password = '$newpass', email='$email' WHERE id='$userid'";
            return mysqli_query($this->conn, $sql);
        }
        
        
        
        
    }
    
    $conn= new connection;


?>