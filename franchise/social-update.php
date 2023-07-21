<?php include("header.php");
$res= $conn->getSocial($user['id']);
if(mysqli_num_rows($res)>0){
    $social= mysqli_fetch_assoc($res);
}
?>

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Social Media Accounts</h1>
          </div>
          
          <div class="row">
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
                  <?php
                    if($social['status']==0){
                        ?><div class="alert alert-danger">Your Social Media Accounts Are Under Review...</div><?php
                    }else if($social['status']==1){?>
                        <div class="alert alert-success">Your Social Media Accounts Are Approoved</div>
                    <?php }
                  
                  ?>
                  
                  <div class="card">
                      <div class="card-header"><h5>Social Media Accounts</h5></div>
                      
                      <div class="card-body">
                          
                          <form id="accountform" enctype="multipart/form-data">
                              
                                       <div class="form-group">
                                  <strong>Facebook</strong>
                                  <input type="url" class="form-control" name="fb" placeholder="Enter Facebook Page URL" value="<?php echo $social['fb'];?>" Required>
                              </div>
                              
                              <div class="form-group">
                                  <strong>Instagram</strong>
                                  <input type="url" class="form-control" name="insta" placeholder="Enter Instagram Page URL" value="<?php echo $social['insta'];?>">
                              </div>
                              
                               <div class="form-group">
                                  <strong>Twitter</strong>
                                  <input type="url" class="form-control" name="tw" placeholder="Enter Twitter Page URL" value="<?php echo $social['tw'];?>">
                              </div>
                              
                               <div class="form-group">
                                  <strong>LinkedIN</strong>
                                  <input type="url" class="form-control" name="li" placeholder="Enter LinkedIN Page URL" value="<?php echo $social['li'];?>">
                              </div>
                              
                              
                             <div class="form-group">
                                  <strong>Quora</strong>
                                  <input type="url" class="form-control" name="quora" placeholder="Enter Quora Profile URL"  value="<?php echo $social['quora'];?>">
                              </div>
                              
                            
                             <div class="form-group">
                                <input type="hidden" name="userid" value="<?php echo $user['id'];?>">
                                <input type="hidden" name="action" value="updatesocial">
                                  <input type="submit" class="form-control btn btn-primary" name="btnsocial" value="Update" required>
                            </div>
                      </form>
                  </div>
                  
                  </div>
              </div>
              <div class="col-lg-2"></div>
          </div>
</div>

<?php include("footer.php");?>

<script>
    $(function(){
        $("#reviewmsg").hide();
        $("#accountform").submit(function(e){
            
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "function.php",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(res){
                    $("#reviewmsg").show();
                    $("#reviewmsg").text(res);
                }
            })
        })
    })
</script>
          