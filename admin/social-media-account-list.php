<?php include("header.php");
    include("connector.php");
   
         $res= $conn->getSMList();
   

?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Social Media Accounts Of Influencer</h1>
            
          </div>
          <div class="section-body">
              <div class="container table-responsive">
                  <table class="table table-bordered" id="dt">
                      <thead>
                          <tr>
                              <th>UserID</th>
                               <th>Invoice ID</th>
                              <th>UserName</th>
                              <th>Profile Type</th>
                              <th>Profile Link</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        
                            <?php
                               while($row= mysqli_fetch_assoc($res)){
                                   $userres= $conn->getUser($row['userid']);
                                   $user= mysqli_fetch_assoc($userres);
                                    
                                    if($row['status']==0){
                                        $status="Pending for Verification";
                                        $color="text-danger";
                                    }else if($row['status']==1){
                                        $status= "Approved";
                                        $color="text-success";
                                    }else if($row['status']==2){
                                        $status="Rejected";
                                        $color= "text-danger";
                                    }
                                   ?>
                                   <tr>
                                       <th class="text-danger"><?php echo "DZINF".$row['id'];?></th>
                                       <th><?php echo $row['invoice_id'];?></th>
                                       <th><?php echo $user['fname'].$user['lastname'] ;?></th>
                                       <td><?php echo $row['profile_type'];?></td>
                                    <td><a href="<?php echo $row['url'];?>" class="btn btn-primary" target="__blank">View <i class="fa fa-eye"></i></a></td>
                                    
                                    
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
                                                            var action= "approvesocial";
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
                                                             var action= "disapprovesocial";
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
                            
                            ?>
                            
                           
                            
                            
                           
                      
                      </tbody>
                  </table>
              </div>
         </div>
        </section>
 </div>
 
<?php include("footer.php");?>