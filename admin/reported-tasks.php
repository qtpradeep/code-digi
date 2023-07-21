<?php include("header.php");
    include("connector.php");
    $res= $conn->getreportedTask();

?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Reported Task</h1>
            
          </div>
          <div class="section-body">
              <div class="container table-responsive">
                  <table class="table table-bordered" id="dt">
                      <thead>
                          <tr>
                              <th>Issue</th>
                              <th>Task</th>
                              <th>Campaign ID</th>
                              <th>Influencer</th>
                              <th>Reported By</th>
                              <th>Reported Date</th>
                              
                          </tr>
                      </thead>
                      
                      <tbody>
                          <?php
                            if(mysqli_num_rows($res)>0){
                                while($row=mysqli_fetch_assoc($res)){
                                 
                                    $color= ($row['task_status']==0)? "text-danger" : "text-success";
                                    $influencer= $conn->getInfluencerById($row['influencer_id']);
                                    $campaign= mysqli_fetch_assoc($conn->getCampaignById($row['campaign_id']));
                                    
                                    $userres= $conn->getUsers($row['user_id']);
                                    $user= mysqli_fetch_assoc($userres);
                                    
                                    $taskres= $conn->getTask($row['task_id']);
                                    $task= mysqli_fetch_assoc($taskres);
                                    
                                
                                    ?>
                                        <tr>
                                            <th class="text-danger"><?php echo $row['issue'];?></td>
                                            <td><?php echo $task['post_link'];?></td>
                                            <td><?php echo $campaign['campaignid'];?></td>
                                            <td><?php echo $influencer['fname'].' '.$influencer['lname'] ; ?></td>
                                            <td><?php echo $user['userid'];?></td>
                                            
                                            <td><?php echo $row['date'];?></td>
                                           
                                            
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