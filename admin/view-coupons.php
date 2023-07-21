<?php include("header.php");
    include("connector.php");
    $res= $conn-> getCoupons();

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
                              <th>Validity</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      
                      <tbody>
                          <?php
                            if(mysqli_num_rows($res)){
                                while($row=mysqli_fetch_assoc($res)){
                                    ?>
                                        <tr>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['discount'];?></td>
                                            <td><?php echo $row['validfrom'].'-'.$row['validupto'];?></td>
                                            <td><?php echo ($row['status']==1)? "Active" : "Expired";?></td>
                                            <td>
                                            <a href="update-coupon.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Edit</a>
                                            <a href="function.php?id=<?php echo $row['id'];?>&do=delcoupons" class="btn btn-danger" 
                                            onclick="return confirm('Are You Sure want To Delete?')">Delete</a></td>
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