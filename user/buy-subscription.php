<?php include("header.php");
if(isset($_REQUEST['id'])){
    $res= $conn->getPackageById($_REQUEST['id']);
    $row= mysqli_fetch_assoc($res);
}else{
    $res2= $conn->allPackages();
}
?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Purchase New Subscription</h1>
            
          </div>
          <div class="section-body">
            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Subscription Details</h4>
                  </div>
                  <div class="card-body">
                <form id="subscriptionform" method="post" action="pay.php">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Subscription ID</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name='subscriptID' class="form-control" value="DIGIZEAL<?php echo rand(1000, 9999)*$_SESSION['userid'];?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Subscription Name</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name='subscriptionname' class="form-control" Placeholder= "Type Subscription Name" required>
                      </div>
                    </div> 
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Subscription Details</strong></label>
                      
                      <div class="col-sm-12 col-md-7">
                        
                        <?php if(empty($row)){?>
                        
                            <select class="form-control" name="packageID" id="packageID">
                                <option selected disabled>--Select Package--</option>
                                <?php if(mysqli_num_rows($res2)>0){
                                    while($package= mysqli_fetch_assoc($res2)){
                                        ?>
                                        <option value="<?php echo $package['code'];?>"><?php echo $package['name']." By ". $package['influencers']. ' Influencers ';?></option>
                                        <?php
                                    }
                                }?>
                            </select>
                            
                       <?php  }else{?>
                       
                        <input type="hidden" name="packageID" value="<?php echo (isset($row)) ? $row['code'] :'';?>">
                        <?php echo $row['description'];?>
                        <?php }?>
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Amount</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="hidden" name="packageprice" id="packageprice" value="<?php echo (isset($row)) ? $row['price'] : '';?>">
                      <span id="fixamount"><strong><?php echo (isset($row)) ? $row['price'] :'';?></strong></span>
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Discount Coupon</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="coupon" id="coupon">
                        <div id="couponError"></div>
                        
                      </div>
                    </div>
                    
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Discount Amount</strong></label>
                      <div class="col-sm-12 col-md-7">
                        
                        <div id="disAmt"></div>
                        
                      </div>
                    </div>
                    
                    
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>GST</strong></label>
                      <div class="col-sm-12 col-md-7">
                         <input type="hidden" name="gst" value="18%">
                      <strong>18%</strong>
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Net Amount</strong></label>
                      <div class="col-sm-12 col-md-7">
                          <input type="hidden" name="amount" id="amount" value=" <?php echo (isset($row)) ? $row['price']+$row['price']*0.18 :'';?>">
                         <span id="displayamount"><b><?php echo (isset($row)) ? $row['price']+$row['price']*0.18 :'';?></b></span>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                            <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['userid'];?>">
                         <!--<input type="hidden" name="action" value="addsubscription">-->
                        <button class="btn btn-primary" type="submit" name="addsubscription">Proceed To Pay</button>
                        <button class="btn btn-primary" type="button">Cancel</button>
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
        $("#packageID").change(function(){
            var packageid= $("#packageID").val();
           
            var action="getPackagebyID";
             $.ajax({
                type: "POST",
                url: "function.php",
                data: {packageid:packageid, action:action},
                success: function(res){
                    
                    $('#amount').val(parseInt(res)+parseInt(res*0.18));
                    $("#displayamount").html(parseInt(res)+parseInt(res*0.18));
                    $("#fixamount").html(res);
                    $("#packageprice").val(res);
                    
                    //window.location.href="my-campaigns.php";
                }
                
            })
            
        })
        
        $("#coupon").on("keyup", function(){
            var coupon= $("#coupon").val();
            var action="getDiscount";
            var amount= $("#amount").val();
            var fixamount= $("#packageprice").val();
            var user= $("#userid").val()

            
                $.ajax({
                    type: "POST",
                    url: "function.php",
                    data: {coupon:coupon, user: user, action:action},
                    success: function(res){
                        if(res==0){
                            $("#couponError").text("Invalid Coupon");
                            $("#couponError").css("color", "red");
                            $("#coupon").css("border", "1px solid red");
                            $("#disAmt").html("");
                            $("#displayamount").html(parseInt(fixamount)+parseInt(fixamount*0.18));
                            $("#amount").val(parseInt(fixamount)+parseInt(fixamount*0.18));
                            
                        }else if(res==2){
                            $("#couponError").text("Coupon Already Used");
                            $("#couponError").css("color", "red");
                            $("#disAmt").html("");
                            $("#displayamount").html(parseInt(fixamount)+parseInt(fixamount*0.18));
                            $("#amount").val(parseInt(fixamount)+parseInt(fixamount*0.18));
                        }
                        else{
                            $("#couponError").text("Coupon Applied");
                            $("#couponError").css("color", "Green");
                            $("#coupon").css("border", "1px solid green");
                            $("#disAmt").html(amount*res/100);
                            $("#amount").val(amount-amount*res/100);
                            $("#displayamount").css("font-weight", "bold");
                            $("#displayamount").html(amount-amount*res/100);
                            
                        }
                    }
                })
            
        })
        
        
        
        // $("#subscriptionform").submit(function(e){
        //     e.preventDefault();
        //     $.ajax({
        //         type: "POST",
        //         url: "function.php",
        //         data: new FormData(this),
        //         contentType: false,
        //         processData: false,
        //         success: function(res){
        //             if(res>0){
        //                 window.location.href="payment-success.php?id="+res;
        //             }else{
        //                 alert("Something Wrong");
        //                 location.reload();
        //             }
        //         }
                
        //     })
        // })
    })
</script>