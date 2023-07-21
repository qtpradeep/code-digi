<?php include("header.php");
    include("connector.php");
    $res= $conn->getSubmittedTask();

?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manage Task By Influencer</h1>
            
          </div>
          <div class="section-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dt">
                      <thead>
                          <tr>
                              <th>Influencer ID</th>
                              <th>Influencer Name</th>
                              <th>Campaign ID</th>
                              <th>Submission Date</th>
                              <th>Shared URL</th>
                              <th>Status</th>
                              <th>Payment</th>
                              <th>Action</th>
                              <th>Delete</th>
                          </tr>
                      </thead>
                      
                      <tbody>
                          <?php
                            if(mysqli_num_rows($res)>0){
                                while($row=mysqli_fetch_assoc($res)){
                                 
                                    if($row['task_status']==1){
                                        $status="Approved";
                                        $color="text-success";
                                    }elseif($row['task_status']==0){
                                        $status="Pending For Approval";
                                        $color="text-danger";
                                    }elseif($row['task_status']==2){
                                        $status= "Rejected";
                                        $color="text-danger";
                                    }
                                    $influencer= $conn->getInfluencerById($row['influencer_id']);
                                    $campaign= mysqli_fetch_assoc($conn->getCampaignById($row['campaign_id']));
                                
                                    ?>
                                        <tr>
                                            <td><?php echo "DIGIINF".$row['influencer_id'];?></td>
                                            <td><?php echo $influencer['fname'].' '.$influencer['lname'] ; ?></td>
                                            <td><?php echo $campaign['campaignid'];?></td>
                                            <td><?php echo $row['submit_date'];?></td>
                                            <td><a href="<?php echo $row['post_link'];?>" target="__blank">Click Here</a></td>
                                            <th id="status<?php echo $row['id'];?>" class="<?php echo $color;?>"><?php echo $status ;?></th>
                                            
                                            <td>
                                                <?php if($row['task_status']==1 && $row['is_paid']==0){
                                                    ?>
                                                        <a href="add-task-payment.php?id=<?php echo $row['id'];?>&inf=<?php echo $row['influencer_id'];?>" class="btn btn-primary btn-sm" target="_blank">Add Payment</a>
                                                    <?php
                                                }?>
                                            </td>
                                           
                                            <td>
                                                <?php
                                                
                                                 if($row['task_status']==1){
                                                        $class1="display:block"; $class2="display:none";
                                                    }else{
                                                        $class1="display:none"; $class2="display:block";
                                                    }
                                                ?>
                                                 <input type="hidden" id="id<?php echo $row['id'];?>" value="<?php echo $row['id'];?>">    
                                                 
                                                <button type="button" id="disapprove<?php echo $row['id'];?>" class="btn btn-danger" style="<?php echo $class1;?>">Disapprove</button>
                                                    
                                                  
                                                <button type="button" id="approve<?php echo $row['id'];?>" class="btn btn-success" style="<?php echo $class2;?>">Approve</button>
                                             
                                                
                                               
                                            </td>
                                            
                                            <script>
                                                    $(function(){
                                                        $("#approve<?php echo $row['id'];?>").click(function(){
    
                                                            var id= $("#id<?php echo $row['id'];?>").val();
                                                            
                                                            var action= "approveTask";
                                                            $.ajax({
                                                                url: "function.php",
                                                                method: "POST",
                                                                data: {id:id, action:action},
                                                                success: function(res){
                                                                    alert(res);
                                                                    $("#status<?php echo $row['id'];?>").html("Approved");
                                                                    $("#status<?php echo $row['id'];?>").removeClass("text-danger");
                                                                     $("#status<?php echo $row['id'];?>").addClass("text-success");
                                                                    
                                                                    $("#approve<?php echo $row['id'];?>").hide();
                                                                    $("#disapprove<?php echo $row['id'];?>").show();
                                                                }
                                                            })
                                                           
                                                        })
                                                        
                                                         $("#disapprove<?php echo $row['id'];?>").click(function(){
                                                            var id= $("#id<?php echo $row['id'];?>").val();
                                                             var action= "rejectTask";
                                                                $.ajax({
                                                                    url: "function.php",
                                                                    method: "POST",
                                                                    data: {id:id, action:action},
                                                                    success: function(res){
                                                                        alert(res);
                                                                        $("#status<?php echo $row['id'];?>").html("Disapproved");
                                                                         $("#status<?php echo $row['id'];?>").removeClass("text-success");
                                                                        $("#status<?php echo $row['id'];?>").addClass("text-danger");
                                                                        
                                                                        $("#approve<?php echo $row['id'];?>").show();
                                                                        $("#disapprove<?php echo $row['id'];?>").hide();
                                                                    }
                                                                })
                                                        })
                                                    })
                                                </script>
                                                
                                                <td>
                                                     <a href="function.php?id=<?php echo $row['id'];?>&do=deltask" class="btn btn-primary" 
                                                onclick="return confirm('Are You Sure want To Delete?')"><i class="fa fa-trash"></i></a>
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