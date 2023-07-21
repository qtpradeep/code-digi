<?php include("header.php");
    include("connector.php");
    $res= $conn-> getTaskRequest();

?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manage Requests For Task</h1>
            
          </div>
          <div class="section-body">
              <div class="container table-responsive">
                  <table class="table table-bordered" id="dt">
                      <thead>
                          <tr>
                              <th>Influencer ID</th>
                              <th>Influencer Name</th>
                              <th>Request Date</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      
                      <tbody>
                          <?php
                            if(mysqli_num_rows($res)){
                                while($row=mysqli_fetch_assoc($res)){
                                    $color= ($row['status']==0)? "text-danger" : "text-success";
                                    $influencer= $conn->getInfluencerById($row['influencer_id']);
                                
                                    ?>
                                        <tr>
                                            <td><?php echo "DIGIINF".$row['influencer_id'];?></td>
                                            <td><?php echo $influencer['fname'].' '.$influencer['lname'] ; ?></td>
                                            <td><?php echo $row['req_date'];?></td>
                                            <td class="<?php echo $color;?>">
                                                <?php echo ($row['status']==1)? "Processed" : "Pending"; ?>
                                            </td>
                                           
                                            <td>
                                           
                                            <a href="function.php?id=<?php echo $row['id'];?>&do=delreq" class="btn btn-danger" 
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