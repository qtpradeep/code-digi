<?php include("header.php");
$res= $conn->allSubscriptions($user['id'])
?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Create New Campaign</h1>
            
          </div>
          <div class="section-body"> 
            
            <div class="row">
           <?php if(mysqli_num_rows($res)>0){?>  
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create Campaign</h4>
                  </div>
                  <div class="card-body">
                <form id="campaignform">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Campaign ID</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name='campid' class="form-control" value="<?php echo rand(1000, 9999)*$_SESSION['userid'];?>" readonly>
                         <input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['userid'];?>">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Select Subsciption</strong></label>
                      <div class="col-sm-12 col-md-7">
                     
                            <select class="form-control" name="subscriptionID" id="subscriptionID" required>
                                <option selected disabled>--Select Subscription--</option>
                                    <?php
                                        while($row= mysqli_fetch_assoc($res)){
                                            ?>
                                                <option value="<?php echo $row['subscriptionID'];?>"><?php echo $row['name'];?></option>
                                            <?php
                                        }
                                    
                                
                                ?>
                            </select>
                            
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Influencer Count</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" id="infleft" readonly>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Campaign Type</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="camptype" required>
                            <option value="facebook">Facebook</option>
                            <option value="instagram">Instagram</option>
                            <option value="twitter">Twitter</option>
                            <option value="linkedin">LinkedIn</option>
                            <option value="youtube">YouTube</option>
                        </select>
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Link URL</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="url" class="form-control" name="campurl" placeholder="Type Campaign URL" required>
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>No of Influencers</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" class="form-control" name="infcount" placeholder="Type Number of Influencers" id="infcount" required>
                        <span id="msg"></span>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                         
                         <input type="hidden" name="action" value="addcampaign">
                        <button class="btn btn-primary" id="btncamp" type="submit">Publish</button>
                      </div>
                    </div>
                </form>
                
                  </div>
                </div>
              </div>
            <?php }else{?>
                <div class="alert alert-danger">You don't have any active subscription !!!</div>
            <?php }?>
            </div>
            
          </div>
        </section>
</div>

<?php include("footer.php");?>
<script>
    $(function(){
       
       $("#subscriptionID").change(function(){
            var infcount= 0;
            var userid= $("#userid").val();
            var subscriptionID= $("#subscriptionID").val();
            var action= "checkInfCount"
            $.ajax({
                type: "POST",
                url: "function.php",
                data: {infcount:infcount, userid:userid, subscriptionID:subscriptionID, action:action},
                success:function(res){
                       $("#infleft").val(res)
                    
                }
            })
       });
         
        $("#infcount").on('blur', function(){
            var infleft= $("#infleft").val();
            var infcount= $("#infcount").val();
            if(infcount%15==0){
                if(infleft-infcount<0){
                    alert("You are limited to "+infleft+" influencers only")
                     $("#btncamp").hide()
                }else{
                    $("#btncamp").show();
                }
            }else{
                alert("Please Add Number of Influencers in Multiple of 15");
                $("#btncamp").hide()
            }
        })
            
        
        $("#campaignform").submit(function(e){
            e.preventDefault();
            $("#btncamp").attr('disabled', true);
            $.ajax({
                type: "POST",
                url: "function.php",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(res){
                    alert(res);
                    window.location.href="my-campaign.php";
                }
                
            })
        })
    })
</script>