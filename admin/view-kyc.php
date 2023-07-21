<?php include("header.php");
    include("connector.php");
    if(isset($_REQUEST['id'])){
        $id= $_REQUEST['id'];
        $res= $conn-> getKYC($id);
        if(mysqli_num_rows($res)==1){
            $data= mysqli_fetch_assoc($res);
            $user=  mysqli_fetch_assoc($conn->getUser($data['userid']));           
        }else{
           $kycstatus="Not Found";
        }
    }
   

?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>KYC Details</h1>
    
          </div>
           <?php if($kycstatus!="Not Found"){?>
          <div class="section-body">
              <div class="container table-responsive">
                  <table class="table table-striped table-bordered">
                      <tr>
                          <th>Influencer's Name</th>
                          <td><?php echo $user['fname'].' '.$user['lname'];?></td>
                      </tr>
                      <tr>
                          <th>Date of Birth</th>
                          <td><?php echo $user['dob'];?></td>
                      </tr>
                      <tr>
                          <th>Bank Details</th>
                          <td>
                          Bank Name: <?php echo $data['bankname'];?><br>
                          Branch : <?php echo $data['branch'];?><br>
                          A/C Number: <?php echo $data['bankaccount'];?><br>
                          IFSC: <?php echo $data['ifsc'];?><br>
                          A/C Payee: <?php echo $data['payee'];?>
                          
                          
                          </td>
                      </tr>
                      
                      <tr>
                          <th>Adhar Card</th>
                          <td><?php echo $data['adhar'];?>
                                <a href="#" class="btn btn-primary float-right">View</a>
                          </td>
                      </tr>
                      
                       <tr>
                          <th>PAN Card</th>
                          <td><?php echo $data['pan'];?>
                          <a href="#" class="btn btn-primary float-right">View</a></td>
                      </tr>
                      
                       <tr>
                          <th>KYC Date/Time</th>
                          <td><?php echo $data['kyc_date'];?>
                      </tr>
                      
                       <tr>
                           <td colspan=2>
                          <?php
                            if($data['status']==1){
                                ?>
                                <div class="alert alert-success">KYC is Approved</div>
                                
                                <?php
                            }else{?>
                            
                            <a href="function.php?id=<?php echo $data['id'];?>&do=okkyc" class="btn btn-primary">Approve KYC</a>
                          <?php }?> 
                          </td>
                          
                          
                      </tr>
                  </table>
              </div>
         </div>
         <?php }else{?>
            <div class="section-body">
                <div class="alert alert-warning">KYC Record Not Found</div>
            </div>
         <?php }?>
        </section>
 </div>
 
<?php include("footer.php");?>