<?php include("header.php");
include("connector.php");
 $nextid= $conn->getNextFRID();
 $fr=  "DZFR".str_pad($nextid, 8, '0', STR_PAD_LEFT);
?>



 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Create New Franchise</h1>
            
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
                       <input type="text" class="form-control" name="franchise_id" placeholder="Type 6 Digit Unique ID" value="<?php echo $fr;?>" required>
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
                       <input type="text" class="form-control" name="name" Placeholder="Type Franchise Name" autocomplete="off" required>
                      </div>
                    </div>
                    
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>GST Number (Optional)</strong></label>
                      <div class="col-sm-12 col-md-7">
                       <input type="text" class="form-control" name="gst" autocomplete="off" placeholder="Type GST Number">
                      </div>
                    </div>
                    
                      <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Upload GST Certificate (Optional)</strong></label>
                      <div class="col-sm-12 col-md-7">
                       <input type="file" class="form-control" name="gst_pic">
                       
                      </div>
                    </div>
                    
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>PAN Number</strong></label>
                      <div class="col-sm-12 col-md-7">
                       <input type="text" class="form-control" name="pan" autocomplete="off"  placeholder="Type PAN Number" required>
                       
                      </div>
                    </div>
                    
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Upload PAN</strong></label>
                      <div class="col-sm-12 col-md-7">
                       <input type="file" class="form-control" name="pan_pic" required>
                       
                      </div>
                    </div>
                    
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Bank Details</strong></label>
                      <div class="col-sm-12 col-md-7">
                          
                       <input type="text" class="form-control" name="bankname" placeholder="Bank Name">
                     
                      
                       <input type="text" class="form-control" name="branch" placeholder="Branch Name">
                      
                      
                      
                       <input type="text" class="form-control" name="acnumber" placeholder="Account Number">
                      
                      
                      
                       <input type="text" class="form-control" name="ifsc" placeholder="IFSC Code">
                       
                      </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Upload Passbook</strong></label>
                      <div class="col-sm-12 col-md-7">
                       <input type="file" class="form-control" name="bank_pic" required>
                       
                      </div>
                    </div>
                    
                      <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Address</strong></label>
                      <div class="col-sm-12 col-md-7">
                       <textarea class="form-control" name="address" height=200 placeholder="Type Address"></textarea>
                       
                      </div>
                    </div>
                    
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Contact Number</strong></label>
                      <div class="col-sm-12 col-md-7">
                       <input type="number" class="form-control" name="contact" autocomplete="off" placeholder="Type Contact Number" required>
                       
                      </div>
                    </div>
                    
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="hidden" name="AddFranchize" value="AddFranchize">
                        <input type="submit" id="addbtn" value="Add New Franchise" class="btn btn-primary">
                   
                       
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
            $("#addbtn").prop('disabled', 'true');
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "function.php",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(res){
                    if(res=="OK"){
                        alert("Franchise Added Successfully");
                        window.location.href="add-franchise.php";
                    }else{
                        alert("Something Wrong. Please Try Again");
                        window.location.href="add-franchise.php";
                    }
                   
                }
                
            })
        })
    })
</script>