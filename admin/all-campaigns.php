<?php include("header.php");
    include("connector.php");
    $res= $conn->allCampaigns();

?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manage Campaigns</h1>
            
          </div>
          <div class="section-body">
             
                  <table class="table table-striped table-bordered" id="dt">
                      <thead>
                          <tr>
                              <th>Campaign ID</th>
                              <th>Type</th>
                              <th>URL</th>
                              <th>Req. Influencers</th>
                              <th>User Name</th>
                              <th>Subscription ID</th>
                              <th>Date/Time</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      
                      <tbody>
                          <?php
                            if(mysqli_num_rows($res)){
                                while($row=mysqli_fetch_assoc($res)){
                                    $user= $conn->getUsers($row['userid']);
                                    $data= mysqli_fetch_assoc($user);
                                    
                                    if($row['status']==0){
                                        $status="Pending for Verification";
                                        $color="text-danger";
                                    }else if($row['status']==1){
                                        $status= "Running";
                                        $color="text-success";
                                    }else if($row['status']==2){
                                        $status="Rejected";
                                        $color= "text-danger";
                                    }elseif($row['status']==3){
                                        $status="Completed";
                                        $color="text-success";
                                    }
                                    
                                    ?>
                                        <tr>
                                            <th><?php echo $row['campaignid'];?></th>
                                            <td><?php echo $row['type'];?></td>
                                            <td><a href="<?php echo $row['url'];?>" target="_blank" class="btn btn-primary">View</a></td>
                                            <td><?php echo $row['influencers'];?></td>
                                            <th><?php echo $data['firstname'].' '.$data['lastname']."<br>".$data['userid'];?></th>
                                            <th><?php echo $row['subscriptionID'];?></th>
                                            <td><?php echo $row['campaign_date'];?></td>
                                            <th id="status<?php echo $row['id'];?>" class="<?php echo $color;?>"><?php echo $status;?></th>
                                            <td>
                                                 <input type="hidden" id="id<?php echo $row['id'];?>" value="<?php echo $row['id'];?>">
                                                 <input type="hidden" id="user<?php echo $row['id'];?>" value="<?php echo $row['userid'];?>">
                                            <?php  
                                            
                                                if($row['status']==1){
                                                        $class1="display:block"; $class2="display:none";
                                                    }else{
                                                        $class1="display:none"; $class2="display:block";
                                                    }
                                                ?>
                                                
                                             
                                             <button type="button" id="disapprove<?php echo $row['id'];?>" class="btn btn-danger" style="<?php echo $class1;?>">Disapprove</button>
                                                    
                                                  
                                                <button type="button" id="approve<?php echo $row['id'];?>" class="btn btn-success" style="<?php echo $class2;?>">Approve</button>
                                               
                                          
                                            </td>
                                            
                                            <script>
                                                    $(function(){
                                                        $("#approve<?php echo $row['id'];?>").click(function(){
    
                                                            var id= $("#id<?php echo $row['id'];?>").val();
                                                            var user= $("#user<?php echo $row['id'];?>").val();
                                                            var action= "okcamp";
                                                            $.ajax({
                                                                url: "function.php",
                                                                method: "POST",
                                                                data: {id:id, action:action},
                                                                success: function(res){
                                                                    alert(res);
                                                                    $("#status<?php echo $row['id'];?>").html("Running");
                                                                    $("#status<?php echo $row['id'];?>").removeClass("text-danger");
                                                                     $("#status<?php echo $row['id'];?>").addClass("text-success");
                                                                    
                                                                    $("#approve<?php echo $row['id'];?>").hide();
                                                                    $("#disapprove<?php echo $row['id'];?>").show();
                                                                }
                                                            })
                                                           
                                                        })
                                                        
                                                         $("#disapprove<?php echo $row['id'];?>").click(function(){
                                                            var id= $("#id<?php echo $row['id'];?>").val();
                                                             var action= "discamp";
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
                                             
                                              
                                        </tr>
                                    
                                    <?php
                                }
                            }
                          ?>
                      </tbody>
                  </table>
              </div>
         
        </section>
        </div>
 
 
<?php include("footer.php");?>