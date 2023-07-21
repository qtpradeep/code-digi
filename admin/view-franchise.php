<?php include("header.php");
    include("connector.php");
    $res= $conn->viewFranchise();

?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>View Franchise</h1>
            
          </div>
          <div class="section-body">
              <div class="container table-responsive">
                  <table class="table table-striped table-bordered" id="dt">
                      <thead>
                          <tr>
                              <th>Franchise ID</th>
                              <th>Name</th>
                              <th>Address</th>
                              <th>Bank Details</th>
                              <th>Contact Number</th>
                              <th>Entry Date/Time</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      
                      <tbody>
                          <?php
                            if(mysqli_num_rows($res)){
                                while($row=mysqli_fetch_assoc($res)){
                                    ?>
                                        <tr>
                                            <td><?php echo $row['franchise_id'];?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['address'];?></td>
                                            <td><?php echo "<b>Bank Name : </b>".$row['bankname']."<br><b>Branch :</b>".$row['bankbranch']."<br><b>IFSC :</b>".$row['ifsccode']."<br><b>A/C Number :</b>".$row['acnumber'];?></td>
                                            <td><?php echo $row['phone'];?></td>
                                            <td><?php echo $row['entry_date'];?></td>
                                            
                                            <td>
                                            <a href="update-franchise.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Update</a>
                                            <a href="function.php?id=<?php echo $row['id'];?>&do=delfr" class="btn btn-danger" 
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