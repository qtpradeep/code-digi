<?php include("header.php");
    include("connector.php");
    $res= $conn->viewAllUsers();
    
   
   

?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Users List</h1>
    
          </div>
          
          <div class="section-body">
              <div class="container table-responsive">
                  <table class="table table-striped table-bordered" id="dt">
                    <thead>
                        <tr>
                            
                            <th>Pic</th>
                            <th width="40%">Name</th>
                            <th>Sponsor's ID/Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Reg. Status</th>
                            <th>View Campaign</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(mysqli_num_rows($res)>0){
                                $sn=1;
                                while($row= mysqli_fetch_assoc($res)){
                                    $statename= $conn->getState($row['state']);
                                    $cityname= $conn->getCity($row['district']);
                                    ?>
                                    <tr>
                                       
                                        <td><img src="../user/<?php echo $row['pic'];?>" width="50px" height="50px"><br><br>
                                      </td>
                                       
                                        <th><?php echo $row['firstname'].' '.$row['lastname'];?><br>
                                         ( <?php echo $row['userid'];?>) </th>
                                         <th class="text-danger"><?php echo $row['sponsor_id'];?></th>
                                        <td><?php echo $row['email'];?></td>
                                        <td><?php echo $row['contact'];?></td>
                                        <td><?php echo $row['address'].'<br>'.$statename.','.$cityname.'-'.$row['pincode'];?></td>
                                        <td><?php if($row['status']==1){?>
                                            <a class="btn btn-success" href="#">Approved</a>
                                        <?php }else{?>
                                            
                                            <a class="btn btn-danger" href="#">Pending</a>
                                        
                                        <?php }?>
                                        </td>
                                        
                                        <td>
                                           <?php if($conn->hasCampaign($row['id'])>0){?>
                                                <a href="view-campaign.php?user=<?php echo $row['id'];?>" class="btn btn-info"> Campaign</a>
                                            <?php }?>
                                        </td>
                                        <td>
                                            <a href="function.php?id=<?php echo $row['id'];?>&do=deluser" class="btn btn-danger" onclick="return confirm('Are You Sure Want To Delete User')">Delete</a>
                                            
                                           
                                        </td>
                                    </tr>
                                    <?php
                               $sn++; }
                            }
                        
                        ?>
                        
                    </tbody>
                  </table>
              </div>
         </div>
        
        </section>
 </div>
 
<?php include("footer.php");?>