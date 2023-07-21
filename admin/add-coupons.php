<?php include("header.php");?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Create New Coupon</h1>
            
          </div>
          <div class="section-body">
            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create Coupon</h4>
                  </div>
                  <div class="card-body">
                <form id="packageform">
                     
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Coupon Code</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name='couponcode' class="form-control" value="" placeholder="Type Coupon Code" required>
                      </div>
                    </div>
                    
             
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Discount Rate</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="rate" placeholder="Type Discount Rate" required>
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Valid From</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="date" class="form-control" name="validfrom" Required>
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Valid UpTo</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="date" class="form-control" name="validupto" required>
                      </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Coupon Description</strong></label>
                      <div class="col-sm-12 col-md-7">
                       <textarea class="form-control" name="description" placeholder="Type Here..." required></textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                         <input type="hidden" name="action" value="addcoupon">
                        <button class="btn btn-primary" type="submit">Create Now</button>
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
                    window.location.href="add-coupons.php";
                }
                
            })
        })
    })
</script>