<?php include("header.php");
if(isset($_SESSION['userid'])){
    $res= $conn->getCoupons($_SESSION['userid']);
}

?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>View Coupons</h1>
            
          </div>
          <div class="section-body">
              <div class="container table-responsive">
                  <table class="table table-striped table-bordered" id="dt">
                      <thead>
                          <tr>
                              <th>Coupon Code</th>
                              <th>Discount Rate</th>
                             
                              <th>Status</th>
                            
                          </tr>
                      </thead>
                      
                      <tbody>
                          <?php
                            if(mysqli_num_rows($res)){
                                while($row=mysqli_fetch_assoc($res)){
                                    ?>
                                        <tr>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['discount'].'%';?></td>
                                            <td><?php echo ($row['status']==1)? "Active" : "Expired";?></td>
                                           
                                        </tr>
                                    
                                    <?php
                                }
                            }
                          ?>
                      </tbody>
                  </table>
              </div>
         </div>
        </section>
 </div>
 
<?php include("footer.php");?>