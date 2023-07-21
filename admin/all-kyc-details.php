<?php include("header.php");
    include("connector.php");
    $res= $conn->displayKYCDetails();

?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manage KYC</h1>
            
          </div>
          <div class="section-body">
              <div class="container table-responsive">
                  <table class="table table-striped table-bordered" id="dt">
                      <thead>
                          <tr>
                              <th>Influencer Name</th>
                              <th>Adhar</th>
                              <th>PAN</th>
                              <th>Bank Details</th>
                              <th>KYC Date</th>
                              <th>Status</th>
                              <th>Action</th>
                              
                          </tr>
                      </thead>
                      
                      <tbody>
                          <?php
                            if(mysqli_num_rows($res)){
                                while($row=mysqli_fetch_assoc($res)){
                                    $userres= $conn->getUser($row['userid']);
                                    $user= mysqli_fetch_assoc($userres);
                                    if($row['status']==1){
                                        $status="Approved";
                                        $color="text-success";
                                    }elseif($row['status']=0){
                                        $status="Pending For Approval";
                                        $color="text-danger";
                                    }elseif($row['status']==2){
                                        $status= "Rejected";
                                        $color="text-danger";
                                    }
                                    ?>
                                        <tr>
                                         
                                            <th><?php echo $user['fname'].' '.$user['lname'];?><br><strong class="text-danger"><?php echo "DIGIINF".$row['userid'];?></strong></th>
                                            <th><?php echo $row['adhar'];?><br><a href="https://einfluencer.biz/dashboard/<?php echo $row['adharscan'];?>">View Adhar Card</a></th>
                                            <td><?php echo $row['pan'];?><br><a href="https://einfluencer.biz/dashboard/<?php echo $row['panscan'];?>">View PAN Card</a></td>
                                            <td><?php echo "Bank :".$row['bankname']."<br>Branch :".$row['branch']."<br>IFSC :".$row['ifsc']."<br>A/c Number :".$row['bankaccount'];?><br><a href="https://einfluencer.biz/dashboard/<?php echo $row['passbook'];?>">View Passbook</a></td>
                                            <td><?php echo $row['kyc_date'];?></td>
                                           
                                            <th id="status<?php echo $row['id'];?>" class="<?php echo $color;?>"><?php echo $status ;?></th>
                                            
                                            
                                            <td>
                                                <?php
                                                
                                                 if($row['status']==1){
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
                                                            
                                                            var action= "okkyc";
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
                                                             var action= "rejectkyc";
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
         </div>
        </section>
 </div>
 
<?php include("footer.php");?>