<?php include("header.php");
if(isset($_SESSION['userid'])){
   $res= $conn->getUser($_SESSION['userid']);
   $user= mysqli_fetch_assoc($res);
   
   if(isset($user['sponsor_id'])){
    $sponsor= $conn->getName($user['sponsor_id']);
    $franchise= $conn->getFranchise($user['sponsor_id']);
   }
}

?>

 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Update Profile</h1>
            
          </div>
          <div class="section-body">
            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Update Profile</h4>
                  </div>
                  <div class="card-body">
                <form id="campaignform" enctype="multipart/form-data">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>User ID</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name='fname' class="form-control" value="<?php echo $user['userid'];?> " readonly>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Sponsor OR Franchise ID</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name='fname' class="form-control" value="<?php echo $user['sponsor_id'];?> " readonly>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Sponsor Or Franchise Name</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name='fname' class="form-control" value="<?php echo $sponsor.$franchise; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>First Name</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name='fname' class="form-control" value="<?php echo $user['firstname'];?> " required>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Last Name</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name='lname' class="form-control" value="<?php echo $user['lastname'];?> ">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Email</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name='email' class="form-control" value="<?php echo $user['email'];?> " required>
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Contact</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" class="form-control" name="contact" value="<?php echo $user['contact'];?>" required>
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Date Of Birth</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="date" class="form-control" name="dob" value="<?php echo $user['dob'];?>">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Gender</strong></label>
                      <div class="col-sm-12 col-md-7">
                         <?php 
                         if($user['gender']=="male"){ $mselected="checked"; $fselected="";}
                         else{$fselected="checked"; $mselected="";}
                         ?> 
                        <input type="radio" name="gender" value="male" <?php echo $mselected;?> > Male
                        <input type="radio" name="gender" value="female" <?php echo $fselected;?> > Female
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Address</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="address" value="<?php echo $user['address'];?>" required>
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>State</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control" name="state" id="state">
                            <option selected disabled>--Select State--</option>
                            <?php
                               $res= $conn->getStates();
                               if(mysqli_num_rows($res)>0){
                                   while($row=mysqli_fetch_assoc($res)){
                                       
                                       if($user['state']==$row['id']) $selected="selected"; else $selected="";
                                       ?>
                                            <option value="<?php echo $row['id'];?>" <?php echo $selected;?> ><?php echo $row['name'];?></option>                                        
                                       <?php
                                   }
                               }
                            ?>
                        </select>
                      </div>
                    </div>
                    
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>District</strong></label>
                      <div class="col-sm-12 col-md-7">
                       <select class="form-control" id="city" name="district">
                             <?php
                               $res= $conn->getallCities();
                               if(mysqli_num_rows($res)>0){
                                    echo "<option selected disabled>--Select City--</option>";
                                   while($row=mysqli_fetch_assoc($res)){
                                      
                                       if($user['district']==$row['id']) $selected="selected"; else $selected="";
                                       ?>
                                            <option value="<?php echo $row['id'];?>" <?php echo $selected;?> ><?php echo $row['city'];?></option>                                        
                                       <?php
                                   }
                               }
                            ?>
                       </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Pincode</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" class="form-control" name="pincode" value="<?php echo $user['pincode'];?>" required>
                      </div>
                    </div>
                    
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><strong>Upload Photo</strong></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="file" class="form-control" name="pic">
                        <input type="hidden" name="picdb" value="<?php echo $user['pic'];?>">
                      </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                          <input type="hidden" name="userid" value="<?php echo $user['id'];?>">
                         <input type="hidden" name="action" value="updateprofile">
                        <button class="btn btn-primary" type="submit">Update Profile</button>
                      </div>
                    </div>
                </form>
                
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </section>
</div>

<?php include("footer.php");?>
<script>
    $(function(){
        $("#campaignform").submit(function(e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "function.php",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(res){
                    alert(res);
                    window.location.href="edit-profile.php";
                }
                
            })
        })
        
        
        $("#state").change(function(){
            var state= $("#state").val();
            var action="getCity";
            $.ajax({
                type: "POST",
                url: "function.php",
                data: {state:state, action:action},
                success: function(res){
                   $("#city").html(res);
                }
                
            })
        })
    })
</script>