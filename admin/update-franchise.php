<?php include("header.php");
include("connector.php");
if(isset($_REQUEST['id'])){
    $res= $conn->getFranchiseById($_REQUEST['id']);
    $row= mysqli_fetch_assoc($res);
}
?>



 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Update Franchise</h1>
            
          </div>
          <div class="section-body">
            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create Franchise</h4>
                  </div>
                  <div class="card-body">
                <form id="franchiseform" enctype="multipart/form-data">
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Franchise ID</strong></label>
                      <div class="col-sm-12 col-md-7">
                       <input type="text" class="form-control" name="franchise_id" placeholder="Type 6 Digit Unique ID" value="<?php echo $row['franchise_id'];?>" readonly>
                      </div>
                    </div>
                    
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Referral ID (Optional)</strong></label>
                      <div class="col-sm-12 col-md-7">
                       <input type="text" class="form-control" name="referral_id" placeholder="Enter Referral ID" value="<?php echo $row['referral_id'];?>">
                      </div>
                    </div>
                    
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Password</strong></label>
                      <div class="col-sm-12 col-md-7">
                       <input type="password" class="form-control" name="password" placeholder="Enter Password" value="<?php echo $row['password'];?>" required>
                      </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Franchise Name</strong></label>
                      <div class="col-sm-12 col-md-7">
                       <input type="text" class="form-control" name="name" Placeholder="Type Franchise Name" autocomplete="off"  value="<?php echo $row['name'];?>"required>
                      </div>
                    </div>
                    
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>GST Number (Optional)</strong></label>
                      <div class="col-sm-12 col-md-7">
                       <input type="text" class="form-control" name="gst" autocomplete="off" placeholder="Type GST Number" value="<?php echo $row['gst'];?>">
                      </div>
                    </div>
                    
                      <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Upload GST Certificate (Optional)</strong></label>
                      <div class="col-sm-12 col-md-7">
                       <input type="file" class="form-control" name="gst_pic">
                       <input type="hidden" name="gstdb" value="<?php echo $row['gst_scan'];?>">
                       
                      </div>
                    </div>
                    
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>PAN Number</strong></label>
                      <div class="col-sm-12 col-md-7">
                       <input type="text" class="form-control" name="pan" autocomplete="off"  placeholder="Type PAN Number" value="<?php echo $row['pan'];?>" required>
                       
                      </div>
                    </div>
                    
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Upload PAN</strong></label>
                      <div class="col-sm-12 col-md-7">
                       <input type="file" class="form-control" name="pan_pic">
                       <input type="hidden" name="pandb" value="<?php echo $row['pan_scan'];?>">
                       
                      </div>
                    </div>
                    
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Bank Details</strong></label>
                      <div class="col-sm-12 col-md-7">
                          
                       <input type="text" class="form-control" name="bankname" placeholder="Bank Name" value="<?php echo $row['bankname'];?>">
                     
                      
                       <input type="text" class="form-control" name="branch" placeholder="Branch Name" value="<?php echo $row['bankbranch'];?>">
                      
                      
                      
                       <input type="text" class="form-control" name="acnumber" placeholder="Account Number" value="<?php echo $row['acnumber'];?>">
                      
                      
                      
                       <input type="text" class="form-control" name="ifsc" placeholder="IFSC Code" value="<?php echo $row['ifsccode'];?>">
                       
                      </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Upload Passbook</strong></label>
                      <div class="col-sm-12 col-md-7">
                       <input type="file" class="form-control" name="bank_pic">
                       <input type="hidden" name="passbookdb" value="<?php echo $row['passbook_scan'];?>">
                       
                      </div>
                    </div>
                    
                      <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Address</strong></label>
                      <div class="col-sm-12 col-md-7">
                       <textarea class="form-control" name="address" height=200 placeholder="Type Address"><?php echo $row['address'];?>"</textarea>
                       
                      </div>
                    </div>
                    
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Contact Number</strong></label>
                      <div class="col-sm-12 col-md-7">
                       <input type="number" class="form-control" name="contact" autocomplete="off" placeholder="Type Contact Number" value="<?php echo $row['phone'];?>" required>
                       
                      </div>
                    </div>
                    
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                         <input type="hidden" name="frid" value="<?php echo $row['id'];?>"> 
                        <input type="hidden" name="UpdateFranchize" value="updateFranchize">
                        <input type="submit" id="updatebtn" value="Update Franchise" class="btn btn-primary">
                   
                       
                      </div>
                    </div>
                     
                </form>
                
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </section>
</div>

<?php include("footer.php");?>
<script>
    $(function(){
        $("#franchiseform").submit(function(e){
            $("#updatebtn").prop('disabled', 'true');
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "function.php",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(res){
                    if(res=="OK"){
                        alert("Franchise updated Successfully");
                        window.location.href="update-franchise.php?id=<?php echo $row['id'];?>";
                    }else{
                        alert("Something Wrong. Please Try Again");
                        window.location.href="update-franchise.php?id=<?php echo $row['id'];?>";
                    }
                   
                }
                
            })
        })
    })
</script>