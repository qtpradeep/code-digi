<?php include("header.php");
$res= $conn->getkyc($user['id']);
if(mysqli_num_rows($res)>0){
    $kyc= mysqli_fetch_assoc($res);
}
?>

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Update KYC Details</h1>
          </div>
          
          <div class="row">
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
                  <?php
                    if(!empty($kyc) && $kyc['status']==0){
                        ?><div class="alert alert-danger">Your KYC is Under Review...</div><?php
                    }else if($kyc['status']==1){?>
                        <div class="alert alert-success">Your KYC Details Are Approved</div>
                    <?php }
                  
                  ?>
                  
                  <div class="card">
                      <div class="card-header"><h5>KYC Details</h5></div>
                     
                      <div class="card-body">
                          
                          <form id="accountform" enctype="multipart/form-data">
                              
                            <div class="form-group">
                                  <strong>Adhar Card Number</strong>
                                  <input type="number" class="form-control" name="adhar" placeholder="Enter Adhar Number" value="<?php echo $kyc['adhar'];?>" required>
                              </div>
                              
                              <div class="form-group">
                                  <strong>Upload Adhar</strong>
                                  <input type="file" class="form-control" name="adharpic" required>
                                  <input type="hidden" class="form-control" name="adhardb" value="<?php echo $kyc['adharscan'];?>">
                              </div>
                              
                               <div class="form-group">
                                  <strong>PAN Card Number</strong>
                                  <input type="text" class="form-control" name="pan" placeholder="Enter PAN Number" value="<?php echo $kyc['pan'];?>" required>
                              </div>
                              
                               <div class="form-group">
                                  <strong>Upload PAN</strong>
                                  <input type="file" class="form-control" name="panpic" required>
                                  <input type="hidden" class="form-control" name="pandb" value="<?php echo $kyc['panscan'];?>">
                              </div>
                              
                               <div class="form-group">
                                  <strong>Bank Name</strong>
                                  <input type="text" class="form-control" name="bankname" placeholder="Enter Bank Name" value="<?php echo $kyc['bankname'];?>" required>
                              </div>
                              
                              <div class="form-group">
                                  <strong>Branch Name</strong>
                                  <input type="text" class="form-control" name="branch" placeholder="Enter Branch Name" value="<?php echo $kyc['branch'];?>" required>
                              </div>
                              
                               <div class="form-group">
                                  <strong>IFS Code</strong>
                                  <input type="text" class="form-control" name="ifsc" placeholder="Enter IFSC" value="<?php echo $kyc['ifsc'];?>" required>
                              </div>
                              
                               <div class="form-group">
                                  <strong>Bank Account Number</strong>
                                  <input type="number" class="form-control" name="account" placeholder="Enter Account Number" value="<?php echo $kyc['bankaccount'];?>" required>
                              </div>
                              
                               <div class="form-group">
                                  <strong>Account Payee Name</strong>
                                  <input type="text" class="form-control" name="payee" placeholder="Enter Account Payee Name" value="<?php echo $kyc['bankaccount'];?>" required>
                              </div>
                              
                            
                             <div class="form-group">
                                <input type="hidden" name="userid" value="<?php echo $user['id'];?>">
                                <input type="hidden" name="action" value="updatekyc">
                                <input type="submit" class="form-control btn btn-primary" value="Update">
                            </div>
                      </form>
                  </div>
                  
                  </div>
              </div>
              <div class="col-lg-2"></div>
          </div>
</div>

<?php include("footer.php");?>

<script>
    $(function(){
        $("#reviewmsg").hide();
        $("#accountform").submit(function(e){
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "function.php",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(res){
                    $("#reviewmsg").show();
                    window.location.href="update-kyc.php";
                }
            })
        })
    })
</script>
          