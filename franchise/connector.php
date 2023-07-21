<?php
    session_start();
    class connection{
        
        function __construct(){
           $this->conn = mysqli_connect("localhost", "u641909197_digizeal", "9gS=P?aQR:QT", "u641909197_digizeal");
        }
        
        function registerUser($fname, $lname, $email, $password, $contact, $gender){
            $sql= "INSERT INTO `influencers`(`fname`, `lname`, `email`, `password`, `contact`, `gender`) VALUES ('$fname', '$lname', '$email', '$password', '$contact', '$gender')";
            if(mysqli_query($this->conn, $sql)){
                
                return mysqli_insert_id($this->conn);
                
            }
              
        }
        
        function sendEmail($email, $id){
            
            
            
        }
        
        function salesData($userid){
           //$sql= "SELECT subscription.subscriptionID, subscription.net_amount,subscription.subscription_date, userlog.firstname, userlog.lastname, userlog.sponsor_id FROM subscription JOIN userlog ON subscription.userid=userlog.id WHERE userlog.sponsor_id='$frid' AND subscription.payment_status=1";
           $sql= "SELECT * FROM subscription WHERE userid='$userid' and payment_status=1";
           $res= mysqli_query($this->conn, $sql);
           if(mysqli_num_rows($res)>0){
               $row= mysqli_fetch_assoc($res);
               return $row;
           }
          
            
        }
        
        
        function login($frid, $password){
            $sql= "SELECT * FROM franchise WHERE franchise_id='$frid' AND password='$password' AND status=1";
            $res= mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($res)==1){
                $row= mysqli_fetch_assoc($res);
                $_SESSION['userid']= $row['id'];
                $_SESSION['name']= $row['fname'];
                $_SESSION['frid']= $row['franchise_id'];
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
    
       function getUser($user){
            $sql= "SELECT * FROM franchise WHERE id= '$user'";
            return mysqli_query($this->conn, $sql);
        }
        
        function getSubscriber($id){
            $sql= "SELECT * FROM userlog WHERE id='$id'";
            return mysqli_query($this->conn, $sql);
        }
        
        function updateProfile($fname, $lname, $email, $contact, $address, $state, $city, $pincode, $dob, $url, $user){
            $sql= "UPDATE influencers SET fname='$fname', lname='$lname', email='$email', contact= '$contact', address='$address', city='$city', state='$state', pincode='$pincode', dob='$dob', pic='$url' WHERE id= '$user'";
            return mysqli_query($this->conn, $sql);
        }
        
    function checkNumber($phone){
        $sql= "SELECT * FROM influencers WHERE contact= '$phone'";
        $res= mysqli_query($this->conn, $sql);
        return $res;
    }
    
     function checkEmail($email){
        $sql= "SELECT * FROM influencers WHERE email= '$email'";
        $res= mysqli_query($this->conn, $sql);
        return $res;
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
        
        function updatesocialProfile($fb, $insta, $tw, $li, $quora, $user){
        
            $sql= "SELECT * FROM social WHERE userid= '$user'";
            $res= mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($res)==1)
            {
              $sql= "UPDATE social SET fb='$fb', insta='$insta', tw='$tw', li='$li', quora='$quora', status='0' WHERE userid='$user'";
              return mysqli_query($this->conn, $sql);
            }
            else
            {
            $sql= "INSERT INTO `social`(`userid`, `fb`, `insta`, `tw`, `li`, `quora`) 
            VALUES ('$user','$fb','$insta','$tw','$li','$quora')";
            return mysqli_query($this->conn, $sql);
            }
        }
        
        function getSocial($user){
             $sql= "SELECT * FROM social WHERE userid= '$user'";
            return mysqli_query($this->conn, $sql);
        }
        
        function getkyc($user){
            $sql= "SELECT * FROM kyc WHERE userid= '$user'";
            return mysqli_query($this->conn, $sql);
        }
        
        function updateKYC($user, $adharurl, $panurl, $adhar, $pan, $bank, $branch, $ifsc, $payee, $account){
            $sql= "SELECT * FROM kyc WHERE userid= '$user'";
            $res= mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($res)==1)
            {
              echo $sql= "UPDATE kyc SET adharscan='$adharurl', panscan='$panurl', adhar='$adhar', pan='$pan', bankname='$bank', bankaccount= '$account', ifsc='$ifsc', payee='$payee', branch='$branch', status= 0 WHERE userid='$user'";
              return mysqli_query($this->conn, $sql);
            }
            else
            {
            $sql= "INSERT INTO `kyc`(`userid`, `adharscan`, `panscan`, `adhar`, `pan`, `bankname`, `bankaccount`, `ifsc`, `payee`, `branch`, `status`) VALUES ('$user', '$adharurl', '$panurl', '$adhar','$pan','$bank','$account', '$ifsc', '$payee', '$branch', 0)";
                return mysqli_query($this->conn, $sql);
            }
        }
        
        function getSharedCampaign($id){
            $date= date("Y-m-d");
            $sql= "SELECT * FROM sharedcampaign WHERE date= '$date' AND influencer_id= '$id' AND status=0";
            return mysqli_query($this->conn, $sql);
        }
        
        function getUsers($id){
            $sql= "SELECT * FROM userlog WHERE id= '$id'";
            return mysqli_query($this->conn, $sql);
            
        }
         function getCampaign($id){
             $sql= "SELECT * FROM campaign WHERE id= '$id'";
            return mysqli_query($this->conn, $sql);
         }
         
         function sendRequest($influencer){
             $sql= "INSERT INTO requestfortask(influencer_id) VALUES('$influencer')";
              return mysqli_query($this->conn, $sql);
         }
         
         function isRequestedToday($id){
             $date= date('Y-m-d');
             $sql= "SELECT * FROM requestfortask WHERE influencer_id='$id' AND req_date= '$date'";
             $res= mysqli_query($this->conn, $sql);
             return mysqli_num_rows($res);
         }
         
         function submitTask($influencer, $campaignid, $postURL){
             $date= date('Y-m-d');
             $sql= "INSERT INTO `task`(`influencer_id`, `campaign_id`, `post_link`) VALUES ('$influencer', '$campaignid', '$postURL')";
             mysqli_query($this->conn, $sql);
             
             $sql2= "UPDATE sharedcampaign SET status=1 WHERE influencer_id='$influencer' AND campaign_id= '$campaignid' and date='$date'";
             return mysqli_query($this->conn, $sql2);
             
         }
         
         function myReferrals($frid){
              $sql= "SELECT * FROM userlog WHERE franchise_id= '$frid'";
              return mysqli_query($this->conn, $sql);
         }
         
         
         function nextLevel($user){
             $data=array();
             $sql= "SELECT * FROM userlog WHERE sponsor_id= '$user' AND status=1";
              $res= mysqli_query($this->conn, $sql);
              if(mysqli_num_rows($res)>0){
                  while($row= mysqli_fetch_assoc($res)){
                      $data[]=$row;
                      $this->nextLevel($row['userid']);
                  }
                  
                 return $data;
              }
              
              
         }
         
         function mySales($id){
             $data=array();
             $sql= "SELECT * FROM userlog WHERE franchise_id= '$id'";
             $res= mysqli_query($this->conn, $sql);
             if(mysqli_num_rows($res)>0){
                 while($row= mysqli_fetch_assoc($res)){
                    
                     $data= $this->nextLevel($row['userid']);
                     
                 }
             }
             
             return json_encode($data);
             
         }
         
         function displayReferralSales($id){
            $sql= "SELECT * FROM subscription WHERE userid= '$id'";
             return mysqli_query($this->conn, $sql);
         }
        
        
       
        
       
    }
    
    $conn= new connection;


?>