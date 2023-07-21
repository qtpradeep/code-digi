<?php include("header.php");
include("connector.php");
if(isset($_REQUEST['id']) && isset($_REQUEST['inf'])){
    $taskid= $_REQUEST['id'];
    $influencer= $_REQUEST['inf'];
    $infres= $conn->getUser($influencer);
    $infrow= mysqli_fetch_assoc($infres);
    
}
?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Add Task Payment</h1>
            
          </div>
          <div class="section-body">
            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Payment</h4>
                  </div>
                  <div class="card-body">
                <form id="packageform" action="function.php" method="post">
                     
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Task ID</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" value="<?php echo "DZTASK".$taskid;?>" placeholder="Task ID" readonly>
                        <input type="hidden" name="taskid" class="form-control" value="<?php echo $taskid;?>">
                      </div>
                    </div>
                    
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Influencer Name</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" value="<?php echo $infrow['fname'].$infrow['lname'];?>" readonly>
                        <input type="hidden" name='influencer_id' class="form-control" value="<?php echo $influencer;?>" readonly>
                      </div>
                    </div>
                    
                      <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Amount</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name='amount' class="form-control" required>
                      </div>
                    </div>
                    
                      <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>TDS</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name='tds' class="form-control" required>
                      </div>
                    </div>
                    
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Payment Date</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="date" name='paymentdate' class="form-control" required>
                      </div>
                    </div>
                    
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>UTR/DD Number</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name='utrdd' class="form-control" placeholder="UTR or DD Number" required>
                      </div>
                    </div>
                    
             
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                         <input type="hidden" name="action" value="addpayment">
                        <button class="btn btn-primary" type="submit">Add Payment</button>
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
