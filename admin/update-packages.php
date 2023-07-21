<?php include("header.php");
include("connector.php");
if(isset($_REQUEST['id'])){
    $res= $conn-> getPackages($_REQUEST['id']);
    $package= mysqli_fetch_assoc($res);
}
?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Update Package : <?php echo $package['code'];?> </h1>
            
          </div>
          <div class="section-body">
            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Update Package Details</h4>
                  </div>
                  <div class="card-body">
                <form id="packageform">
                     <div class="form-group row mb-4">
                      <label class="text-md-right col-12 col-md-3 col-lg-3"><strong>Choose Service</strong></label>
                      <div class="col-sm-12 col-md-7">
                       <select class="form-control" name="pkgservice" required>
                           <option disabled selected>--Select One--</option>
                           <option value="dm">Digital Marketing</option>
                           <option value="smm">Social Media Marketing</option>
                       </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="text-md-right col-12 col-md-3 col-lg-3"><strong>Package Code</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name='pkgcode' class="form-control" value="<?php echo $package['code'];?>" required>
                      </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                      <label class="text-md-right col-12 col-md-3 col-lg-3"><strong>Package Name</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name='pkgname' class="form-control" value="<?php echo $package['name'];?>" placeholder="Type Package Name" required>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="text-md-right col-12 col-md-3 col-lg-3"><strong>Package Duration</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="pkgduration" value="<?php echo $package['duration'];?>" placeholder="Type Package Duration" required>
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="text-md-right col-12 col-md-3 col-lg-3"><strong>Package Price</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" class="form-control" name="pkgprice" value="<?php echo $package['price'];?>" placeholder="Type Package Price">
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="text-md-right col-12 col-md-3 col-lg-3"><strong>Influencers Count</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" class="form-control" name="influencerscount" value="<?php echo $package['influencers'];?>" placeholder="Number of Estimated Influencers" required>
                      </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                      <label class="text-md-right col-12 col-md-3 col-lg-3"><strong>Package Description</strong></label>
                      <div class="col-sm-12 col-md-7">
                       <textarea class="form-control" name="description" placeholder="Type Here..." required>
                           <?php echo $package['description'];?></textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                          <input type="hidden" name="pkgid" value="<?php echo $package['id'];?>">
                         <input type="hidden" name="action" value="updatepackage">
                        <button class="btn btn-primary" type="submit">Update Package</button>
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
                    window.location.href="view-packages.php";
                }
                
            })
        })
    })
</script>