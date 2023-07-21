<!DOCTYPE html>
<html lang="en">
    
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Ality - Admin Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
              <div class="text-center">
                <img src="https://digizeal.biz/images/dznewlogo.png" width="160">
              </div>
            <div class="card card-primary">
              <div class="card-header">
                <h4>Register</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="function.php?do=registeruser" onsubmit="btnregister.disabled=true; return true">
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="frist_name"><strong>First Name<span> * </span></strong></label>
                      <input id="frist_name" type="text" class="form-control" name="fname" autofocus required>
                    </div>
                    <div class="form-group col-12">
                      <label for="last_name"><strong>Last Name <span> * </span></strong></label>
                      <input id="last_name" type="text" class="form-control" name="lname">
                    </div>
                  </div>
                  
                   <div class="row">
                   <div class="form-group col-12">
                    <label for="gender"><strong>Gender<span> * </span></strong></label>
                    <input id="gender1" type="radio" name="gender" value="male" required> Male
                    <input id="gender2" type="radio" name="gender" value="female" required> Female
                    
                  </div>
                  
                  <div class="form-group col-12">
                    <label for="email"><strong>Email(Will be verified by email)<span> * </span></strong></label>
                    <input id="email" type="email" class="form-control" name="email" required>
                    <div id="emailError">
                    </div>
                  </div>
                  </div>
                  
                  <div class="row">
                      <div class="form-group col-12">
                    <label for="contact"><strong>Contact Number(Will be verified by OTP)<span> * </span></strong></label>
                    <input id="phone" type="number" class="form-control" name="contact" required>
                    <div id="contactError">
                    </div>
                  </div>
                  <div class="form-group col-12">
                    <label for="sponsorid"><strong>Sponsor ID OR Franchise ID<span> * </span></strong></label>
                    <input id="sponsorid" name="sponsorid" type="text" class="form-control" required>
                    <input type="text" id="msg" class="form-control">
                   
                  </div>
                  </div>
                  
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="password" class="d-block"><strong>Password <span> * </span></strong></label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                        name="password" required>
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-12">
                      <label for="password2" class="d-block"><strong>Password Confirmation <span> * </span></strong></label>
                      <input id="password2" type="password" class="form-control" name="cpassword" required>
                      <div id="passmsg"></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree" required>
                      <label class="custom-control-label" for="agree">I have read and understand <a href="https://digizeal.biz/terms-and-conditions.php">terms and conditions </a>for using this website and i am voluntarily accepting the same</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="btnregister" id="btnreg" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
              <div class="mb-4 text-muted text-center">
                Already Registered? <a href="login.php">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/auth-register.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
  
  <script>
  $(function(){
      
      $("#msg").attr('readonly', 'true');
      
      $("#password2").on("keyup", function(){
          var pass= $("#password").val();
          var pass2= $("#password2").val();
          if(pass!=pass2){
            $("#passmsg").html("Passwords Didn't Match");
            $("#passmsg").css("color", "red");
            $("#btnreg").hide();
          }else{
              $("#passmsg").html("");
              $("#btnreg").show();
          }
      })
      
     $("#phone").on("keyup", function(){
            var contact= $("#phone").val();
            $("#contactError").html("");
            $("#btnreg").show();
        
            if(contact.match("[0-9]{10}") && contact.length==10){
                // $("#contactError").html(" ");
                 
                $.ajax({
                    type: "POST",
                    url: "function.php",
                    data: {contact:contact, action:"checkNumber"},
                    success: function(res){
                        if(res==0){
                            $("#contactError").html("Contact Number Already Exist");
                            $("#contactError").css("color", "red");
                           
                            $("#btnreg").hide()
                        }else{
                            // $("#contactError").html("OK");
                            // $("#contactError").css("color", "green");
                            $("#btnreg").show();
                        }
                        
                    }
                    
                })
                
            
            }else{
                $("#contactError").html("Invalid Contact Number");
                $("#contactError").css("color", "red");
                $("#contact").css("border", "1px solid red");
                $("#btnreg").hide()
            }
        })
        
        
        $("#email").on("keyup", function(){
            var email= $("#email").val();
            $("#emailError").html("");
            $("#btnreg").show();
        
            if(email.length>0){
        
                $.ajax({
                    type: "POST",
                    url: "function.php",
                    data: {email:email, action:"checkEmail"},
                    success: function(res){
                        if(res==0){
                            $("#emailError").html("Email Already Exist");
                            $("#emailError").css("color", "red");
                           
                            $("#btnreg").hide()
                        }else{
                            // $("#emailError").html("OK");
                            // $("#emailError").css("color", "green");
                            $("#btnreg").show();
                        }
                        
                    }
                    
                })
                
            
            }else{
                $("#emailError").html("Email is Required");
                $("#emailError").css("color", "red");
                $("#email").css("border", "1px solid red");
                $("#btnreg").hide()
            }
        })
        
        
        
      
      $("#sponsorid").on('blur', function(){
         var sponsor = $("#sponsorid").val();
         var action = "checksponsor";
         $.ajax({
             type: "POST",
             url: "function.php",
             data: {sponsor:sponsor, action:action},
             success: function(res){
                if(res==""){
                    $("#msg").val("Invalid Sponsor OR Franchise ID");
                    $("#msg").css("color", "red");
                    $("#btnreg").hide();
                    
                }else{
                    $("#msg").val(res);
                    $("#msg").css("color", "green");
                    $("#btnreg").show();
                } 
                
             }
         })
      })
  })
      
  </script>
</body>

</html>