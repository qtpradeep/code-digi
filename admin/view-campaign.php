<?php include("header.php");
    include("connector.php");
    if(isset($_REQUEST['user'])){
        $userid= $_REQUEST['user'];
        $res= $conn-> getCampaign($userid);
        // if(mysqli_num_rows($res)==1){
        //     $data= mysqli_fetch_assoc($res);
        //     $user=  mysqli_fetch_assoc($conn->getUsers($userid));           
        // }else{
        //   $campaignstatus="Not Found";
        // }
    }
   

?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Campaign Details</h1>
    
          </div>
          <?php if(mysqli_num_rows($res)>0){?>
          <div class="section-body">
              <div class="container table-responsive">
                 
                  <table class="table table-striped table-bordered">
                      <?php
                                while($data= mysqli_fetch_assoc($res)){
                                   $user=  mysqli_fetch_assoc($conn->getUsers($userid));  
                      ?>
                      <tr>
                          <th>User's Name</th>
                          <th><?php echo strtoupper($user['firstname'].' '.$user['lastname']);?></th>
                      </tr>
                      
                      <tr>
                          <th>Campaign Details</th>
                          <td>
                          <strong>Campaign ID:</strong> <?php echo $data['campaignid'];?><br>     
                          <strong>Campaign Type:</strong> <?php echo $data['type'];?><br>
                          <strong>URL :</strong> <a href="<?php echo $data['url'];?>"><?php echo $data['url'];?></a><br>
                          <strong>Requested Influencers:</strong> <?php echo $data['influencers'];?><br>
                         
                          
                          
                          </td>
                      </tr>
                      
                     
                       <tr>
                          <th>Campaign Creation Date/Time</th>
                          <th><?php echo $data['campaign_date'];?></th>
                      </tr>
                      
                       <tr>
                           <td colspan=2>
                            <a href="function.php?id=<?php echo $data['id'];?>&do=okcamp&user=<?php echo $userid;?>" class="btn btn-primary">Approve & Share </a>
                           
                          </td>
                          
                          
                      </tr>
                      <?php } ?>
                  </table>
              </div>
         </div>
         <?php }else{?>
            <div class="section-body">
                <div class="alert alert-warning">Campaign Record Not Found</div>
            </div>
         <?php }?>
        </section>
 </div>
 
<?php include("footer.php");?>