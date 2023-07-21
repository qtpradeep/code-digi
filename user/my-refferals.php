<?php include("header.php");
if(isset($_SESSION['userid']) && isset( $_SESSION['refid'])){
    $res= $conn->myrefferals($_SESSION['refid']);
}
?>

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <div><h1>My Refferals</h1></div>
            <div style="margin-left:auto"><a href="view-coupons.php" class="btn btn-primary">View Coupons</a></div>
          
          </div>
          <div class="section-body">
            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Campaign Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                        
                      <table class="table table-bordered" id="dt">
                        <thead>
                          <tr>
               
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Total Subscriptions</th>
                            <th>Signup Date</th>
                            
                            <th>Status</th>
                            <th>Generate Coupon</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                            
                          <?php if(mysqli_num_rows($res)>0){
                                    while($row= mysqli_fetch_assoc($res)){
                                        $userres= $conn->getbyUserid($row['userid']);
                                        $userrow= mysqli_fetch_assoc($userres);
                                        
                                        $count= $conn->countuserSubscriptions($userrow['id']);
                                        
                                        
                                        ?><tr>
                                            <td><?php echo $row['userid'];?></td>
                                            <td><?php echo $row['firstname'].' '.$row['lastname'];?></td>
                                            <td><?php echo $row['contact'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $count;?></td>
                                            <td><?php echo $row['reg_date'];?></td>
                                            <td><?php echo ($row['status']==1)? "Active" : "Pending";?></td>
                                            <td>
                                            <?php
                                                $no_of_coupons= $conn->countCoupons($row['userid']);
                                                if($no_of_coupons==0){
                                                    $ratio= $count/($no_of_coupons+1);
                                                }else{
                                                    $ratio= $count/$no_of_coupons;
                                                }
                                                if($count%3==0 && ($no_of_coupons==0 || $ratio!=3 )){
                                                  ?>
                                                    <input type="hidden" id="user" value="<?php echo $_SESSION['userid'];?>"> 
                                                    <button type="button" id="generatecoupon" class="btn btn-primary ml-auto">Generate Coupon</button>
                                                  <?php
                                              }  
                                            ?>
                                            </td>
                                            
                                        </tr>
                                        <?php
                                    }
                                }
                            ?>
                        </tbody>
                      </table>
                    </div>
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
    $("#coupon").hide();
     $("#generatecoupon").click(function(){
         var userid= $("#user").val();
         $.ajax({
             type: "POST",
             url: "function.php",
             data: {action: "generatecoupon", userid: userid},
             success: function(res){
                 $("#coupon").show();
                 $("#generatecoupon").hide();
                 $("#coupon").html(res)
             }
         })
     })
})
   
</script>