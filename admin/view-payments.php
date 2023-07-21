
  
<?php include("header.php");
    include("connector.php");
    $res= $conn->displayPaymentDetails();

?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manage Payment Details</h1>
            
          </div>
          <div class="section-body">
              <div class="container table-responsive">
                  <table class="table table-striped table-bordered" id="dt">
                      <thead>
                          <tr>
                              <th>User Name/ID</th>
                              <th>Payment Mode</th>
                              <th>DD Number/IFSC Code</th>
                              <th>Amount</th>
                              <th>Bank Name</th>
                              <th>Branch</th>
                              <th>Issue Date</th>
                              <th>Video</th>
                              <th>Status</th>
                              <th>Action</th>
                              <th>Delete</th>
                          </tr>
                      </thead>
                      
                      <tbody>
                          <?php
                            if(mysqli_num_rows($res)){
                                while($row=mysqli_fetch_assoc($res)){
                                    $userres= $conn->getUsers($row['userid']);
                                    $userrow= mysqli_fetch_assoc($userres);
                                    ?>
                                        <tr id="row<?php echo $row['id'];?>">
                                            <th><?php echo $userrow['firstname'].' '.$userrow['lastname'].'<br>'.$userrow['userid'];?></th>
                                            <td><?php echo $row['pay_mode'];?></td>
                                            <th><?php if(!empty($row['ddnumber'])){
                                                echo "DD No :".$row['ddnumber'];
                                            }else{
                                                echo "IFSC :".$row['ifsc_code']."<br>UTR :".$row['utr'];
                                            }?></th>
                                            <td><?php echo $row['net_amount'];?></td>
                                            <td><?php echo $row['bankname'];?></td>
                                            <td><?php echo $row['branchname'];?></td>
                                            <td><?php echo $row['issuing_date'];?></td>
                                            <td><a href="../user/<?php echo $row['video'];?>" target="__blank">View Video</a></td>
                                            <th id="status<?php echo $row['id'];?>" class="<?php echo ($row['payment_status']==1)? "text-success" : "text-danger";?>"><?php echo ($row['payment_status']==1)? "Approved" : "Disapproved";?></th>
                                            
                                            <td>
                                               
                                                <input type="hidden" id="id<?php echo $row['id'];?>" value="<?php echo $row['id'];?>">
                                                <?php 
                                                    if($row['payment_status']==1){
                                                        $class1="display:block"; $class2="display:none";
                                                    }else{
                                                        $class1="display:none"; $class2="display:block";
                                                    }
                                                    ?>
                                                  
                                                 <button type="button" id="disapprove<?php echo $row['id'];?>" class="btn btn-danger" style="<?php echo $class1;?>">Disapprove</button>
                                                    
                                                  
                                                <button type="button" id="approve<?php echo $row['id'];?>" class="btn btn-success" style="<?php echo $class2;?>">Approve</button>
                                                
                                                
                                               
                                                   
                                                
                                                
                                                <script>
                                                    $(function(){
                                                        $("#approve<?php echo $row['id'];?>").click(function(){
    
                                                            var id= $("#id<?php echo $row['id'];?>").val();
                                                            var action= "approvePayment";
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
                                                             var action= "rejectPayment";
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
                                             
                                               
                                                
                                          </td>
                                          <td>
                                               <button type="button" id="deletebtn<?php echo $row['id'];?>" class="btn btn-primary"><i class="fa fa-trash"></i></button>
                                               
                                               <script>
                                                   $('#deletebtn<?php echo $row['id'];?>').click(function(){
                                                       
                                                       if(confirm("Are you sure want to delete record")){
                                                           var id= $("#id<?php echo $row['id'];?>").val();
                                                                 var action= "deletePayment";
                                                                    $.ajax({
                                                                        url: "function.php",
                                                                        method: "POST",
                                                                        data: {id:id, action:action},
                                                                        success: function(res){
                                                                            alert(res);
                                                                            $("#row<?php echo $row['id'];?>").hide(1000);
                                                                            
                                                                        }
                                                                    })
                                                            }
                                                        })
                                                  
                                               </script>
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

