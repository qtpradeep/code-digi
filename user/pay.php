<?php include("header.php");
if(isset($_POST['addsubscription'])){
    $subs= $_POST['subscriptID'];
    $name= $_POST['subscriptionname'];
    $package= $_POST['packageID'];
    $price= $_POST['packageprice'];
    $coupon= $_POST['coupon'];
    $gst= $_POST['gst'];
    $amt= $_POST['amount'];
    $user= $_POST['userid'];
    
    
    $res= $conn->getUser($user);
    $data= mysqli_fetch_assoc($res);
    
    $res2= $conn->getPackageByCode($package);
    $pk= mysqli_fetch_assoc($res2);
    $influencers= $pk['influencers'];

}else{
    ?>
    <script>
        window.location.href="all-packages.php";
    </script>
    <?php
}

?>

<div class="main-content">
        <section class="section">
          <div class="section-header d-block">
            <h1>Choose Payment Mode</h1>
          
          
          </div>
          <div class="section-body">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form id="paymentform" method="post" action="function.php?do=payment" onsubmit="payviadd.disabled=true; payvianeft.disabled=true; return true" enctype="multipart/form-data">
                               
                                <input type="hidden" name='subs' value="<?php echo $subs;?>"><br>
                                <input type="hidden" name='name' value="<?php echo $name;?>"><br>
                                <input type="hidden" name='package' value="<?php echo $package;?>"><br>
                                <input type="hidden" name='price' value="<?php echo $price;?>">
                                <input type="hidden" name='coupon' value="<?php echo $coupon;?>">
                                <input type="hidden" name='gst' value="<?php echo $gst;?>">
                                <input type="hidden" name="user" value="<?php echo $user;?>">
                                
                                <div class="form-group">
                                    <strong>Upload Video Undertaking *(Only Video File is Acceptable)</strong>
                                    <input type="file" class="form-control" accept= "video/*" name="video" required>
                                </div>
                                
                                <p>
                                    
                                    मेरा नाम <b><?php echo $data['firstname'].' '.$data['lastname'];?></b> है , मैंने DigiZeal वेबसाइट से <b><?php echo "Rs".$amt;?></b> देकर एक डिजिटल मार्केटिंग पैकेज खरीदा है, जि सकी सब्सक्रिप्शनआईडी <b><?php echo $subs;?></b> है।  जिसके अंतर्गत कंपनी द्वारा मेरे डिजिटल लिंक का <b><?php echo $influencers;?></b> इन्फ्लुएंसर्स द्वारा विज्ञापन कराया जाएगा  
                                </p>
                                <p>
                                    मैंने ये पैकेज बिना किसी के जोर जबरदस्ती के अपने मन से खरीदा है और कंपनी के सभी नियम एवं शर्तों को पढ़ लिया है और समझ लिया है | इस पैकेज के माध्यम से मै कंपनी की इन्फ्लुएंसर वेबसाइट पर अकाउंट क्रिएट करके कुछ पैसे भी कमा सकता हूँ , लेकिन ये इनकम गारंटीड इनकम नहीं है | मुझे इसकी जानकारी है और न ही मैंने ये पैकेज सिर्फ इनकम के लिए ख़रीदा है 
                                </p>
                                <p>
                                    <b><?php echo date('d-m-Y h:i:s');?> | <?php echo $data['firstname'].' '.$data['lastname'];?></b>
                                </p>
                                 <strong>Select Your Mode of Payment</strong>
                                <ul>
                                    <li><input type="radio" id="dd" name="mode" value="dd"> Demand Drafts</li>
                                    <li><input type="radio" id="neft" name="mode" value="neft"> NEFT/IMPS</li>
                                    <li><input type="radio" id="online" name="mode" value="online"> Online Mode</li>
                                </ul>
                                
                                <div id="ddmode">
                                    <div class="form-group">
                                        <strong>DD Number:</strong>
                                        <input type="text" class="form-control" name="ddnumber">
                                    </div>
                                    
                                     <div class="form-group">
                                        <strong>Issue Bank Name:</strong>
                                        <input type="text" class="form-control" name="ddbankname">
                                    </div>
                                    
                                     <div class="form-group">
                                        <strong>Branch Name:</strong>
                                        <input type="text" class="form-control" name="ddbranchname">
                                    </div>
                                    
                                     <div class="form-group">
                                        <strong>Amount:</strong>
                                        <span class="text-danger"><strong>Rs <?php echo $amt;?></strong></span>
                                        <input type="hidden" class="form-control" name="ddamount" value="<?php echo $amt;?>">
                                    </div>
                                    
                                     <div class="form-group">
                                        <strong>Issuing Date:</strong>
                                        <input type="date" class="form-control" name="dddate">
                                    </div>
                                   
                                     <input type="submit" name="payviadd" class="btn btn-primary" value="Pay Now">
                                </div>
                                
                                
                                <div id="neftmode">
                                    <div class="form-group">
                                        <strong>Bank Name:</strong>
                                        <input type="text" class="form-control" name="neftbankname">
                                    </div>
                                    
                                    
                                     <div class="form-group">
                                        <strong>Branch :</strong>
                                        <input type="text" class="form-control" name="neftbranchname">
                                    </div>
                                    
                                     <div class="form-group">
                                        <strong>IFSC Code:</strong>
                                        <input type="text" class="form-control" name="ifsc" >
                                    </div>
                                    
                                     <div class="form-group">
                                        <strong>UTR Number:</strong>
                                        <input type="text" class="form-control" name="utr">
                                    </div>
                                    
                                     <div class="form-group">
                                        <strong>Amount:</strong>
                                        <span class="text-danger"><strong>Rs <?php echo $amt;?></strong></span>
                                        <input type="hidden" class="form-control" name="neftamount" value="<?php echo $amt;?>">
                                    </div>
                                    
                                     <div class="form-group">
                                        <strong>Date:</strong>
                                        <input type="date" class="form-control" name="neftdate">
                                    </div>
                                    
                                     <input type="submit" name="payvianeft" class="btn btn-primary " value="Pay Now">
                                </div>
                                
                               
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
            
            
          </div>
        </section>
        
      </div>

<?php include("footer.php");?>
<script>
    $(function(){
        $("#ddmode").hide();
        $("#neftmode").hide();
            
        $("#dd").click(function(){
            $("#ddmode").show();
            $("#neftmode").hide();
        })
        
         $("#neft").click(function(){
            $("#ddmode").hide();
            $("#neftmode").show();
        })
    })
</script>
