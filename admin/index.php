<?php include("header.php");
include("connector.php");
?>

<!--<div class="main-content">-->
<!--        <section class="section">-->
<!--          <div class="section-header">-->
<!--            <h1>Dashboard</h1>-->
<!--          </div>-->
          <!--<div class="row">-->
          <!--  <div class="col-xl-3 col-lg-6">-->
          <!--    <div class="card">-->
          <!--      <div class="card-body card-type-3">-->
          <!--        <div class="row">-->
          <!--          <div class="col">-->
          <!--            <h6 class="text-muted mb-0">Orders</h6>-->
          <!--            <span class="fw-bold mb-0">450</span>-->
          <!--          </div>-->
          <!--          <div class="col-auto">-->
          <!--            <div class="card-circle l-bg-orange text-white">-->
          <!--              <i class="fas fa-book-open"></i>-->
          <!--            </div>-->
          <!--          </div>-->
          <!--        </div>-->
          <!--        <p class="mt-3 mb-0 text-muted text-sm">-->
          <!--          <span class="text-success me-2"><i class="fa fa-arrow-up"></i> 10%</span>-->
          <!--          <span class="text-nowrap">Since last month</span>-->
          <!--        </p>-->
          <!--      </div>-->
          <!--    </div>-->
          <!--  </div>-->
          <!--  <div class="col-xl-3 col-lg-6">-->
          <!--    <div class="card">-->
          <!--      <div class="card-body card-type-3">-->
          <!--        <div class="row">-->
          <!--          <div class="col">-->
          <!--            <h6 class="text-muted mb-0">New Booking</h6>-->
          <!--            <span class="fw-bold mb-0">1,562</span>-->
          <!--          </div>-->
          <!--          <div class="col-auto">-->
          <!--            <div class="card-circle l-bg-cyan text-white">-->
          <!--              <i class="fas fa-briefcase"></i>-->
          <!--            </div>-->
          <!--          </div>-->
          <!--        </div>-->
          <!--        <p class="mt-3 mb-0 text-muted text-sm">-->
          <!--          <span class="text-success me-2"><i class="fa fa-arrow-up"></i> 7.8%</span>-->
          <!--          <span class="text-nowrap">Since last month</span>-->
          <!--        </p>-->
          <!--      </div>-->
          <!--    </div>-->
          <!--  </div>-->
          <!--  <div class="col-xl-3 col-lg-6">-->
          <!--    <div class="card">-->
          <!--      <div class="card-body card-type-3">-->
          <!--        <div class="row">-->
          <!--          <div class="col">-->
          <!--            <h6 class="text-muted mb-0">Inquiry</h6>-->
          <!--            <span class="fw-bold mb-0">7,897</span>-->
          <!--          </div>-->
          <!--          <div class="col-auto">-->
          <!--            <div class="card-circle l-bg-green text-white">-->
          <!--              <i class="fas fa-phone"></i>-->
          <!--            </div>-->
          <!--          </div>-->
          <!--        </div>-->
          <!--        <p class="mt-3 mb-0 text-muted text-sm">-->
          <!--          <span class="text-success me-2"><i class="fa fa-arrow-up"></i> 15%</span>-->
          <!--          <span class="text-nowrap">Since last month</span>-->
          <!--        </p>-->
          <!--      </div>-->
          <!--    </div>-->
          <!--  </div>-->
          <!--  <div class="col-xl-3 col-lg-6">-->
          <!--    <div class="card">-->
          <!--      <div class="card-body card-type-3">-->
          <!--        <div class="row">-->
          <!--          <div class="col">-->
          <!--            <h6 class="text-muted mb-0">Earning</h6>-->
          <!--            <span class="fw-bold mb-0">$8,965</span>-->
          <!--          </div>-->
          <!--          <div class="col-auto">-->
          <!--            <div class="card-circle l-bg-purple text-white">-->
          <!--              <i class="fas fa-dollar-sign"></i>-->
          <!--            </div>-->
          <!--          </div>-->
          <!--        </div>-->
          <!--        <p class="mt-3 mb-0 text-muted text-sm">-->
          <!--          <span class="text-success me-2"><i class="fa fa-arrow-up"></i> 5.4%</span>-->
          <!--          <span class="text-nowrap">Since last month</span>-->
          <!--        </p>-->
          <!--      </div>-->
          <!--    </div>-->
          <!--  </div>-->
          <!--</div>-->
         
        <!--</section>-->
        <!--<div class="settingSidebar">-->
        <!--  <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>-->
        <!--  </a>-->
        <!--  <div class="settingSidebar-body ps-container ps-theme-default">-->
        <!--    <div class=" fade show active">-->
        <!--      <div class="setting-panel-header">Setting Panel-->
        <!--      </div>-->
        <!--      <div class="p-15 border-bottom">-->
        <!--        <h6 class="font-medium m-b-10">Select Layout</h6>-->
        <!--        <div class="selectgroup layout-color w-50">-->
        <!--          <label class="selectgroup-item">-->
        <!--            <input type="radio" name="value" value="1" class="selectgroup-input select-layout" checked>-->
        <!--            <span class="selectgroup-button">Light</span>-->
        <!--          </label>-->
        <!--          <label class="selectgroup-item">-->
        <!--            <input type="radio" name="value" value="2" class="selectgroup-input select-layout">-->
        <!--            <span class="selectgroup-button">Dark</span>-->
        <!--          </label>-->
        <!--        </div>-->
        <!--      </div>-->
        <!--      <div class="p-15 border-bottom">-->
        <!--        <h6 class="font-medium m-b-10">Sidebar Color</h6>-->
        <!--        <div class="selectgroup selectgroup-pills sidebar-color">-->
        <!--          <label class="selectgroup-item">-->
        <!--            <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">-->
        <!--            <span class="selectgroup-button selectgroup-button-icon" data-bs-toggle="tooltip"-->
        <!--              data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>-->
        <!--          </label>-->
        <!--          <label class="selectgroup-item">-->
        <!--            <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>-->
        <!--            <span class="selectgroup-button selectgroup-button-icon" data-bs-toggle="tooltip"-->
        <!--              data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>-->
        <!--          </label>-->
        <!--        </div>-->
        <!--      </div>-->
        <!--      <div class="p-15 border-bottom">-->
        <!--        <h6 class="font-medium m-b-10">Color Theme</h6>-->
        <!--        <div class="theme-setting-options">-->
        <!--          <ul class="choose-theme list-unstyled mb-0">-->
        <!--            <li title="white" class="active">-->
        <!--              <div class="white"></div>-->
        <!--            </li>-->
        <!--            <li title="cyan">-->
        <!--              <div class="cyan"></div>-->
        <!--            </li>-->
        <!--            <li title="black">-->
        <!--              <div class="black"></div>-->
        <!--            </li>-->
        <!--            <li title="purple">-->
        <!--              <div class="purple"></div>-->
        <!--            </li>-->
        <!--            <li title="orange">-->
        <!--              <div class="orange"></div>-->
        <!--            </li>-->
        <!--            <li title="green">-->
        <!--              <div class="green"></div>-->
        <!--            </li>-->
        <!--            <li title="red">-->
        <!--              <div class="red"></div>-->
        <!--            </li>-->
        <!--          </ul>-->
        <!--        </div>-->
        <!--      </div>-->
        <!--      <div class="p-15 border-bottom">-->
        <!--        <div class="theme-setting-options">-->
        <!--          <label>-->
        <!--            <span class="control-label p-r-20">Mini Sidebar</span>-->
        <!--            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"-->
        <!--              id="mini_sidebar_setting">-->
        <!--            <span class="custom-switch-indicator"></span>-->
        <!--          </label>-->
        <!--        </div>-->
        <!--      </div>-->
        <!--      <div class="p-15 border-bottom">-->
        <!--        <div class="theme-setting-options">-->
        <!--          <div class="disk-server-setting m-b-20">-->
        <!--            <p>Disk Space</p>-->
        <!--            <div class="sidebar-progress">-->
        <!--              <div class="progress" data-height="5">-->
        <!--                <div class="progress-bar l-bg-green" role="progressbar" data-width="80%" aria-valuenow="80"-->
        <!--                  aria-valuemin="0" aria-valuemax="100"></div>-->
        <!--              </div>-->
        <!--              <span class="progress-description">-->
        <!--                <small>26% remaining</small>-->
        <!--              </span>-->
        <!--            </div>-->
        <!--          </div>-->
        <!--          <div class="disk-server-setting">-->
        <!--            <p>Server Load</p>-->
        <!--            <div class="sidebar-progress">-->
        <!--              <div class="progress" data-height="5">-->
        <!--                <div class="progress-bar l-bg-orange" role="progressbar" data-width="58%" aria-valuenow="25"-->
        <!--                  aria-valuemin="0" aria-valuemax="100"></div>-->
        <!--              </div>-->
        <!--              <span class="progress-description">-->
        <!--                <small>Highly Loaded</small>-->
        <!--              </span>-->
        <!--            </div>-->
        <!--          </div>-->
        <!--        </div>-->
        <!--      </div>-->
        <!--      <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">-->
        <!--        <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">-->
        <!--          <i class="fas fa-undo"></i> Restore Default-->
        <!--        </a>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
      <!--</div>-->
      
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
              <div class="col-xl-3 col-lg-6">
              <div class="card">
                <div class="card-body card-type-3">
                  <div class="row">
                    <div class="col">
                      <h6 class="text-muted mb-0">Digizeal User</h6>
                    
                    </div>
                    <div class="col-auto">
                      <!--<div class="card-circle l-bg-cyan text-white">-->
                          <div class="">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/2048px-User_icon_2.svg.png" style="width:50px; height:50px;"/>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <a href="view-users.php" class="btn btn-primary">Digizeal User</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card">
                <div class="card-body card-type-3">
                  <div class="row">
                    <div class="col">
                      <h6 class="text-muted mb-0">Subscriptions</h6>
                      <span class="fw-bold mb-0"></span>
                    </div>
                    <div class="col-auto">
                      <!--<div class="card-circle l-bg-orange text-white">-->
                      <div class="">
                        <img src="https://cdn-icons-png.flaticon.com/128/1165/1165674.png" style="width:50px; height:50px;"/>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <a href="all-subscriptions.php" class="btn btn-primary">All Subscriptions</a>
                  </p>
                </div>
              </div>
            </div>
             <div class="col-xl-3 col-lg-6">
              <div class="card">
                <div class="card-body card-type-3">
                  <div class="row">
                    <div class="col">
                      <h6 class="text-muted mb-0">Campaign</h6>
                      <!--<span class="fw-bold mb-0">7,897</span>-->
                    </div>
                    <div class="col-auto">
                      <!--<div class="card-circle l-bg-green text-white">-->
                       <div class="">
                       <img src="https://cdn-icons-png.flaticon.com/128/1998/1998087.png"style="width:50px; height:50px;"/>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <a href="all-campaigns.php" class="btn btn-primary">View Campaigns</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card">
                <div class="card-body card-type-3">
                  <div class="row">
                    <div class="col">
                      <h6 class="text-muted mb-0">EInfluencers</h6>
                      <!--<span class="fw-bold mb-0">7,897</span>-->
                    </div>
                    <div class="col-auto">
                      <!--<div class="card-circle l-bg-green text-white">-->
                       <div class="">
                       <img src="https://cdn-icons-png.flaticon.com/128/1324/1324926.png"style="width:50px; height:50px;"/>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <a href="all-influencers.php" class="btn btn-primary">All EInfluencers</a>
                  </p>
                </div>
              </div>
            </div>
            
            </div>
            
            
            <div class="container card">
                <div class="card-body">
                <strong class="text-danger">Campaign Pending For Approval</strong>
                
                <table class='table table-bordered' id="dt">
                   <thead>
                       <tr>
                           <th>Campaign ID</th>
                           <th>Type</th>
                           <th>URL</th>
                           <th>Req. Influencers</th>
                           <th>Name</th>
                           <th>Subscription ID</th>
                           <th>Date/Time</th>
                           <th>Status</th>
                           <th>Action</th>
                       </tr>
                   </thead>
                   
                   <tbody>
                    
                     <?php
                            $res= $conn->displayPendingCampaign();
                            if(mysqli_num_rows($res)){
                                while($row=mysqli_fetch_assoc($res)){
                                    $user= $conn->getUsers($row['userid']);
                                    $data= mysqli_fetch_assoc($user);
                                    
                                    if($row['status']==0){
                                        $status="Pending for Verification";
                                        $color="text-danger";
                                    }else if($row['status']==1){
                                        $status= "Running";
                                        $color="text-success";
                                    }else if($row['status']==2){
                                        $status="Rejected";
                                        $color= "text-danger";
                                    }elseif($row['status']==3){
                                        $status="Completed";
                                        $color="text-success";
                                    }
                                    
                                    ?>
                                        <tr>
                                            <th><?php echo $row['campaignid'];?></th>
                                            <td><?php echo $row['type'];?></td>
                                            <td><a href="<?php echo $row['url'];?>" target="_blank" class="btn btn-primary">View</a></td>
                                            <td><?php echo $row['influencers'];?></td>
                                            <th><?php echo $data['firstname'].' '.$data['lastname']."<br>".$data['userid'];?></th>
                                            <th><?php echo $row['subscriptionID'];?></th>
                                            <td><?php echo $row['campaign_date'];?></td>
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
                                                            var action= "okcamp";
                                                            $.ajax({
                                                                url: "function.php",
                                                                method: "POST",
                                                                data: {id:id, action:action},
                                                                success: function(res){
                                                                    alert(res);
                                                                    $("#status<?php echo $row['id'];?>").html("Running");
                                                                    $("#status<?php echo $row['id'];?>").removeClass("text-danger");
                                                                     $("#status<?php echo $row['id'];?>").addClass("text-success");
                                                                    
                                                                    $("#approve<?php echo $row['id'];?>").hide();
                                                                    $("#disapprove<?php echo $row['id'];?>").show();
                                                                }
                                                            })
                                                           
                                                        })
                                                        
                                                         $("#disapprove<?php echo $row['id'];?>").click(function(){
                                                            var id= $("#id<?php echo $row['id'];?>").val();
                                                             var action= "discamp";
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
            
            
            <div class="container card">
                <div class="card-body">
                <strong class="text-danger">Payments Pending For Approval</strong>
                
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
                          $res2= $conn->displayPendingPayment();
                            if(mysqli_num_rows($res2)){
                                while($row2=mysqli_fetch_assoc($res2)){
                                    $userres= $conn->getUsers($row2['userid']);
                                    $userrow= mysqli_fetch_assoc($userres);
                                    ?>
                                        <tr id="row<?php echo $row2['id'];?>">
                                            <th><?php echo $userrow['firstname'].' '.$userrow['lastname'].'<br>'.$userrow['userid'];?></th>
                                            <td><?php echo $row2['pay_mode'];?></td>
                                            <th><?php if(!empty($row2['ddnumber'])){
                                                echo "DD No :".$row2['ddnumber'];
                                            }else{
                                                echo "IFSC :".$row2['ifsc_code']."<br>UTR :".$row2['utr'];
                                            }?></th>
                                            <td><?php echo $row2['net_amount'];?></td>
                                            <td><?php echo $row2['bankname'];?></td>
                                            <td><?php echo $row2['branchname'];?></td>
                                            <td><?php echo $row2['issuing_date'];?></td>
                                            <td><a href="../user/<?php echo $row2['video'];?>" target="__blank">View Video</a></td>
                                            <th id="status<?php echo $row2['id'];?>" class="<?php echo ($row2['payment_status']==1)? "text-success" : "text-danger";?>"><?php echo ($row2['payment_status']==1)? "Approved" : "Disapproved";?></th>
                                            
                                            <td>
                                               
                                                <input type="hidden" id="id<?php echo $row2['id'];?>" value="<?php echo $row2['id'];?>">
                                                <?php 
                                                    if($row2['payment_status']==1){
                                                        $class1="display:block"; $class2="display:none";
                                                    }else{
                                                        $class1="display:none"; $class2="display:block";
                                                    }
                                                    ?>
                                                  
                                                 <button type="button" id="disapprove<?php echo $row2['id'];?>" class="btn btn-danger" style="<?php echo $class1;?>">Disapprove</button>
                                                    
                                                  
                                                <button type="button" id="approve<?php echo $row2['id'];?>" class="btn btn-success" style="<?php echo $class2;?>">Approve</button>
                                                
                                                
                                               
                                                   
                                                
                                                
                                                <script>
                                                    $(function(){
                                                        $("#approve<?php echo $row2['id'];?>").click(function(){
    
                                                            var id= $("#id<?php echo $row2['id'];?>").val();
                                                            var action= "approvePayment";
                                                            $.ajax({
                                                                url: "function.php",
                                                                method: "POST",
                                                                data: {id:id, action:action},
                                                                success: function(res){
                                                                    alert(res);
                                                                    $("#status<?php echo $row2['id'];?>").html("Approved");
                                                                    $("#status<?php echo $row2['id'];?>").removeClass("text-danger");
                                                                     $("#status<?php echo $row2['id'];?>").addClass("text-success");
                                                                    
                                                                    $("#approve<?php echo $row2['id'];?>").hide();
                                                                    $("#disapprove<?php echo $row2['id'];?>").show();
                                                                }
                                                            })
                                                           
                                                        })
                                                        
                                                         $("#disapprove<?php echo $row2['id'];?>").click(function(){
                                                            var id= $("#id<?php echo $row2['id'];?>").val();
                                                             var action= "rejectPayment";
                                                                $.ajax({
                                                                    url: "function.php",
                                                                    method: "POST",
                                                                    data: {id:id, action:action},
                                                                    success: function(res){
                                                                        alert(res);
                                                                        $("#status<?php echo $row2['id'];?>").html("Disapproved");
                                                                         $("#status<?php echo $row2['id'];?>").removeClass("text-success");
                                                                        $("#status<?php echo $row2['id'];?>").addClass("text-danger");
                                                                        
                                                                        $("#approve<?php echo $row2['id'];?>").show();
                                                                        $("#disapprove<?php echo $row2['id'];?>").hide();
                                                                    }
                                                                })
                                                        })
                                                    })
                                                </script>
                                             
                                               
                                                
                                          </td>
                                          <td>
                                               <button type="button" id="deletebtn<?php echo $row2['id'];?>" class="btn btn-primary"><i class="fa fa-trash"></i></button>
                                               
                                               <script>
                                                   $('#deletebtn<?php echo $row2['id'];?>').click(function(){
                                                       
                                                       if(confirm("Are you sure want to delete record")){
                                                           var id= $("#id<?php echo $row2['id'];?>").val();
                                                                 var action= "deletePayment";
                                                                    $.ajax({
                                                                        url: "function.php",
                                                                        method: "POST",
                                                                        data: {id:id, action:action},
                                                                        success: function(res){
                                                                            alert(res);
                                                                            $("#row<?php echo $row2['id'];?>").hide(1000);
                                                                            
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
            
            
            <div class="container card">
                <div class="card-body">
                    <strong class="text-danger">KYC Pending for Approval</strong>
                    
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
                          $res=$conn->pendingKYC();
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
            
            <div class="container card">
                <div class="card-body">
                    <strong class="text-danger">Task Pending for Approval</strong>
                    
                   <table class="table table-bordered" id="dt">
                      <thead>
                          <tr>
                              <th>Influencer ID</th>
                              <th>Influencer Name</th>
                              <th>Campaign ID</th>
                              <th>Submission Date</th>
                              <th>Shared URL</th>
                              <th>Status</th>
                              <th>Payment</th>
                              <th>Action</th>
                              <th>Delete</th>
                          </tr>
                      </thead>
                      
                      <tbody>
                          <?php
                          $res= $conn->pendingapprovalTask();
                            if(mysqli_num_rows($res)>0){
                                while($row=mysqli_fetch_assoc($res)){
                                 
                                    if($row['task_status']==1){
                                        $status="Approved";
                                        $color="text-success";
                                    }elseif($row['task_status']==0){
                                        $status="Pending For Approval";
                                        $color="text-danger";
                                    }elseif($row['task_status']==2){
                                        $status= "Rejected";
                                        $color="text-danger";
                                    }
                                    $influencer= $conn->getInfluencerById($row['influencer_id']);
                                    $campaign= mysqli_fetch_assoc($conn->getCampaignById($row['campaign_id']));
                                
                                    ?>
                                        <tr>
                                            <td><?php echo "DIGIINF".$row['influencer_id'];?></td>
                                            <td><?php echo $influencer['fname'].' '.$influencer['lname'] ; ?></td>
                                            <td><?php echo $campaign['campaignid'];?></td>
                                            <td><?php echo $row['submit_date'];?></td>
                                            <td><a href="<?php echo $row['post_link'];?>" target="__blank">Click Here</a></td>
                                            <th id="status<?php echo $row['id'];?>" class="<?php echo $color;?>"><?php echo $status ;?></th>
                                            
                                            <td>
                                                <?php if($row['task_status']==1 && $row['is_paid']==0){
                                                    ?>
                                                        <a href="add-task-payment.php?id=<?php echo $row['id'];?>&inf=<?php echo $row['influencer_id'];?>" class="btn btn-primary btn-sm" target="_blank">Add Payment</a>
                                                    <?php
                                                }?>
                                            </td>
                                           
                                            <td>
                                                <?php
                                                
                                                 if($row['task_status']==1){
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
                                                            
                                                            var action= "approveTask";
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
                                                             var action= "rejectTask";
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
                                                
                                                <td>
                                                     <a href="function.php?id=<?php echo $row['id'];?>&do=deltask" class="btn btn-primary" 
                                                onclick="return confirm('Are You Sure want To Delete?')"><i class="fa fa-trash"></i></a>
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
            
            <div class="container card">
                
                <div class="card-body">
                    <strong class="text-danger">Pending Social Media Profiles For Approval</strong>
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
                            $res=$conn->pendingSMProfile();
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
                                       
                                       <th class="text-danger"><?php echo "DIGIINF".$user['id'];?></th>
                                       <th><?php echo $row['invoice_id'];?></th>
                                       <th><?php echo $user['fname'].$user['lname'] ;?></th>
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
            
           
          <!--  <div class="col-xl-3 col-lg-6">-->
              
          <!--</div>-->
         
        </section>
      
      <?php include("footer.php");?>