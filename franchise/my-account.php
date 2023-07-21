<?php include("header.php");?>

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>My Account</h1>
          </div>
          
          <div class="row">
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
                  <div class="card">
                      <div class="card-header"><h5>Complete Your Profile</h5></div>
                      
                      <div class="card-body">
                          
                          <form id="accountform" enctype="multipart/form-data">
                              <div class="row">
                                  <div class="col-lg-12 col-12">
                                       <div class="form-group">
                                  <strong>First Name</strong>
                                  <input type="text" class="form-control" name="fname" placeholder="Type Name" value="<?php echo $user['fname'];?>" readonly>
                              </div>
                              
                              <div class="form-group">
                                  <strong>Last Name</strong>
                                  <input type="text" class="form-control" name="lname" placeholder="Type Name" value="<?php echo $user['lname'];?>" readonly>
                              </div>
                              
                               <div class="form-group">
                                  <strong>Email</strong>
                                  <input type="email" class="form-control" name="email" placeholder="Type Email" value="<?php echo $user['email'];?>" readonly>
                              </div>
                              
                               <div class="form-group">
                                  <strong>Contact Number</strong>
                                  <input type="text" class="form-control" name="contact" placeholder="Type Contact Number" value="<?php echo $user['contact'];?>" readonly>
                              </div>
                              
                              
                             <div class="form-group">
                                  <strong>Date of Birth</strong>
                                  <input type="date" class="form-control" name="dob"  value="<?php echo $user['dob'];?>">
                              </div>
                              
                               <div class="form-group">
                                  <strong>Address</strong>
                                  <input type="text" class="form-control" name="address" placeholder="Type Address" value="<?php echo $user['address'];?>">
                              </div>
                              
                               <div class="form-group">
                                  <strong>State</strong>
                                  <select class="form-control" id="state" name="state" >
                                      <option selected disabled>--Select State--</option>
                                      <?php $res= $conn->getStates();
                                            if(mysqli_num_rows($res)>0){
                                                while($row= mysqli_fetch_assoc($res)){
                                                    if($row['id']==$user['state']){ $selected="selected"; }
                                                    else{$selected="";}
                                                    ?>
                                                        <option value="<?php echo $row['id'];?>" <?php echo $selected;?> ><?php echo $row['name'];?></option>
                                                    
                                                    <?php
                                                }
                                            }
                                      ?>
                                  </select>
                              </div>
                              
                               <div class="form-group">
                                  <strong>City</strong>
                                  <select class="form-control" id="city" name="city" >
                                      <?php
                                        $res= $conn->getallcities();
                                         if(mysqli_num_rows($res)>0){
                                            while($row= mysqli_fetch_assoc($res)){
                                                  if($user['city']==$row['id']) $selected="selected"; else $selected="";
                                                ?>
                                                    <option value="<?php echo $row['id'];?>" <?php echo $selected;?> ><?php echo $row['city'];?></option>
                                                <?php
                                            }
                                        }
                                      
                                      ?>
                                  </select>
                              </div>
                              
                               <div class="form-group">
                                  <strong>Pincode</strong>
                                   <input type="number" class="form-control" name="pincode" placeholder="Type pincode" value="<?php echo $user['pincode'];?>">
                                 
                              </div>
                              
                               <div class="form-group">
                                  <strong>Upload Photo</strong>
                                   <input type="file" class="form-control" name="pic">
                                   <input type="hidden" name="pic_db" value="<?php echo $user['pic'];?>"
                                 
                              </div>
                             
                            </div>
                                  
                                
                        </div>
                    </div>
                             
                             
                              <div class="form-group">
                                <input type="hidden" name="userid" value="<?php echo $user['id'];?>">
                                <input type="hidden" name="updateprofile" value="updateprofile">
                                  <input type="submit" class="form-control btn btn-primary" name="btnprofile" value="Update Profile" required>
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
        
        $("#accountform").submit(function(e){
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "function.php",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(res){
                    alert(res);
                }
            })
        })
    })
</script>
          