<?php include("header.php");
    include("connector.php");
    $res= $conn-> getPackages();

?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>View Packages</h1>
            
          </div>
          <div class="section-body">
              <div class="container table-responsive">
                  <table class="table table-striped table-bordered" id="dt">
                      <thead>
                          <tr>
                              <th>Package Code</th>
                              <th>Name</th>
                              <th>Price</th>
                              <th>Influencers</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      
                      <tbody>
                          <?php
                            if(mysqli_num_rows($res)){
                                while($row=mysqli_fetch_assoc($res)){
                                    ?>
                                        <tr>
                                            <td><?php echo $row['code'];?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['price'];?></td>
                                            <td><?php echo $row['influencers'];?></td>
                                            <td>
                                            <a href="update-packages.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Edit</a>
                                            <a href="function.php?id=<?php echo $row['id'];?>&do=delpack" class="btn btn-danger" 
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