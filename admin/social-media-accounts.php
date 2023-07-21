<?php include("header.php");
    include("connector.php");
    if(isset($_REQUEST['id'])){
         $res= $conn->getSMAcoounts($_REQUEST['id']);
    }
   

?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
             <div class="row" style="width:100%">
                 <div class="col-lg-6"><h1>Social Media Accounts</h1></div>
                  <div class="col-lg-6"><a href="social-media-account-list.php" class="btn btn-primary" style="float:right">View All Social Media Accounts List</a></div>
             </div> 
        
          </div>
          <div class="section-body">
              <div class="container table-responsive">
                  <table class="table table-bordered">
                      <tbody>
                        
                            <?php
                               while($row= mysqli_fetch_assoc($res)){
                                     $userres= $conn->getUser($row['userid']);
                                   $user= mysqli_fetch_assoc($userres);
                                   ?>
                                   <tr>
                                       <th>Invoice ID :</th>
                                       <th><?php echo $row['invoice_id'];?></th>
                                   </tr>
                                   <tr>
                                       <th>Influencer Name:</th>
                                       <th><?php echo $user['fname'].$user['lastname'];?></th>
                                   </tr>
                                   <tr>
                                       <th>Profile Type :</th>
                                       <th><?php echo $row['profile_type'];?></th>
                                   </tr>
                                    <tr>
                                        
                                        <th>Social Media Profile URL :</th>
                                        <td><?php echo $row['url'];?></td>
                                    </tr>
                                    
                                <tr>
                                <td colspan=2>
                                    <?php
                                    if(isset($row)){
                                        if($row['status']==0){
                                            ?>
                                                <a href="function.php?do=approvesocial&id=<?php echo $row['id'];?>&user=<?php echo $row['userid'];?>" class="btn btn-success">Approve</a> <span style="color:blue"><b>Current Status: Pending For Verification</b></span>
                                            <?php
                                        }else if($row['status']==1){
                                            ?>
                                             <a href="function.php?do=disapprovesocial&id=<?php echo $row['id'];?>&user=<?php echo $row['userid'];?>" class="btn btn-danger">Reject</a> <span class="text-success"><b>Current Status: Approved</b></span>                                          
                                            <?php
                                        }else{?>
                                            <a href="function.php?do=approvesocial&id=<?php echo $row['id'];?>&user=<?php echo $row['userid'];?>" class="btn btn-success">Approve</a> <span class="text-danger"><b>Current Status: Rejected</b></span>
                                        <?php }  
                                    }
                                        
                                    ?>
                                    
                                </td>
                            </tr>
                                   
                                   <?php
                               }
                            
                            ?>
                            
                           
                            
                            
                           
                      
                      </tbody>
                  </table>
              </div>
         </div>
        </section>
 </div>
 
<?php include("footer.php");?>