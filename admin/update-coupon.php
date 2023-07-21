<?php include("header.php");
include("connector.php");
if(isset($_REQUEST['id'])){
    $res= $conn->getcouponbyId($_REQUEST['id']);
    $coupon= mysqli_fetch_assoc($res);
}


?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Update Coupon</h1>
            
          </div>
          <div class="section-body">
            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Update Coupon Details</h4>
                  </div>
                  <div class="card-body">
                <form id="packageform">
                     
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Coupon Code</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name='couponcode' class="form-control" value="<?php echo $coupon['name'];?>" required>
                      </div>
                    </div>
                    
             
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Discount Rate</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="rate" value="<?php echo $coupon['discount'];?>" placeholder="Type Discount Rate" required>
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Valid From</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="date" class="form-control" name="validfrom" value="<?php echo $coupon['validfrom'];?>" Required>
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Valid UpTo</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="date" class="form-control" name="validupto" value="<?php echo $coupon['validupto'];?>" required>
                      </div>
                    </div>
                    
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Change Status</strong></label>
                      <div class="col-sm-12 col-md-7">
                          
                          <?php
                          if($coupon['status']==1){$a="checked"; $h="";} else{$a=""; $h="checked";}
                          ?>
                        <input type="radio" name="status" value="1" <?php echo $a;?> required> Activated
                        <input type="radio" name="status" value="0" <?php echo $h;?> > Disabled
                      </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Coupon Description</strong></label>
                      <div class="col-sm-12 col-md-7">
                       <textarea class="form-control" name="description" placeholder="Type Here..." required>
                         <?php echo $coupon['description'];?>
                       </textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                         <input type="hidden" name="action" value="updatecoupon">
                          <input type="hidden" name="id" value="<?php echo $coupon['id'];?>">
                        <button class="btn btn-primary" type="submit">Update Coupon</button>
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
        $("#packageform").submit(function(e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "function.php",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(res){
                    alert(res);
                    window.location.href="view-coupons.php";
                }
                
            })
        })
    })
</script>