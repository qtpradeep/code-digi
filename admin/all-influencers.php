<?php include("header.php");
    include("connector.php");
    $res= $conn-> getInfluencers();

?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Influencers List</h1>
            
          </div>
          <div class="section-body">
              <div class="container">
                  <table class="table table-striped table-bordered" id="dt">
                      <thead>
                          <tr>
                              <th>Pic/ID</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Contact</th>
                              <th>Address</th>
                              <th>Reg.Status</th>
                              <th>SM Accounts</th>
                              
                              <th>KYC</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      
                      <tbody>
                          <?php
                            if(mysqli_num_rows($res)){
                                while($row=mysqli_fetch_assoc($res)){
                                    $cityname= $conn->getCity($row['city']);
                                    $statename= $conn->getState($row['state']);
                                    ?>
                                        <tr>
                                            <td>
                                                <img src="https://einfluencer.biz/dashboard/<?php echo $row['pic'];?>" width="100px" height="100px">
                                            </td>
                                            <td><?php echo $row['fname'].' '.$row['lname'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $row['contact'];?></td>
                                            <td><?php echo $row['address']."<br>".$cityname.' ,'.$statename.'<br>'.$row['pincode'];?></td>
                                             <td>
                                                 
                                                 <?php
                                                 if($row['status']==1){ 
                                                 ?>
                                                    <a href="#" class='btn btn-success'>Approved</a> 
                                                        
                                                 <?php }else{
                                                     ?>
                                                     <a href="#" class="btn btn-warning">Pending</a>
                                                     <?php
                                                 }?>
                                            </td>
                                            <td>
                                                 <?php if($conn->hasSM($row['id'])){
                                                    ?>
                                                <a href="social-media-accounts.php?id=<?php echo $row['id'];?>" class="btn btn-warning">View SM</a>
                                                <?php }else{ echo "NA"; }?>
                                            </td>
                                            <td>
                                                <?php if($conn->isKYCdone($row['id'])){
                                                    ?>
                                                    <a href="view-kyc.php?id=<?php echo $row['id'];?>" class="btn btn-primary">KYC</a>
                                                    
                                                <?php }else{echo "NA";}?>
                                            
                                            </td>
                                            
                                            <td>
                                                 <a href="function.php?id=<?php echo $row['id'];?>&do=delinflu" class="btn btn-danger" 
                                            onclick="return confirm('Are You Sure want To Delete?')">Delete</a>
                                            
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
        </section>
 </div>
 
<?php include("footer.php");?>