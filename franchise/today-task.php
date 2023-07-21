<?php include("header.php");
   
        $res= $conn-> getSharedCampaign($_SESSION['userid']);
        if(mysqli_num_rows($res)>0){
            $data= mysqli_fetch_assoc($res);
            $campaign= mysqli_fetch_assoc($conn->getCampaign($data['campaign_id'])); 
            $user=  mysqli_fetch_assoc($conn->getUsers($data['user_id']));           
        }else{
           $taskstatus="Not Found";
        }
    
   

?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Task Details</h1>
    
          </div>
           <?php if($taskstatus!="Not Found"){?>
          <div class="section-body">
              <div class="container table-responsive">
                  <table class="table table-striped table-bordered">
                      <tr>
                          <th>User's Name</th>
                          <th><?php echo strtoupper($user['firstname'].' '.$user['lastname']);?></th>
                      </tr>
                      
                      <tr>
                          <th>Campaign Details</th>
                          <td>
                        <strong>Campaign ID:</strong> <?php echo $campaign['campaignid'];?><br>    
                          <strong>Campaign Type:</strong> <?php echo $campaign['type'];?><br>
                          <strong>URL :</strong> <a href="<?php echo $campaign['url'];?>" target="__blank" class="btn btn-primary">View Campaign</a><br>
                          
                         
                          
                          
                          </td>
                      </tr>
                      
                     
                       <tr>
                          <th>Task For Date</th>
                          <th><?php echo $data['date'];?></th>
                      </tr>
                      
                  </table>
              </div>
              
             <form method="post" id="taskupdate">
                 <div class='form-group'>
                    <b>Update Your Work Status</b>
                    <input type="hidden" name="campaignid" value="<?php echo $campaign['id'];?>">
                    <input type="hidden" name="influencer_id" value="<?php echo $_SESSION['userid'];?>">
                    <input type="hidden" name="submittask" value="submittask">
                    <input type="url" class="form-control" name="postURL" autofocus="true" required>
                 </div>
                 
                 <button type="submit" class="btn btn-primary">Submit Task</button>
             </form>
              
              
         </div>
         <?php }else{?>
            <div class="section-body">
                <div class="alert alert-warning">No Task For Today</div>
            </div>
         <?php }?>
        </section>
 </div>
 
<?php include("footer.php");?>
<script>
    $(function(){
        $("#taskupdate").submit(function(e){
            e.preventDefault()
            
            $.ajax({
                url: "function.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(res){
                    alert(res);
                    window.location.reload();
                }
            })
        })
    })
</script>