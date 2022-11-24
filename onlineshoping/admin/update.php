<?php
 require('connection.inc.php');
 require('function.inc.php');

 $number='';
 $password='';
 $compassword='';


 if(isset($_POST['submit'])){

    $number =get_sefe_value($con,$_POST["number"]); 
    
    $password =get_sefe_value($con,$_POST["password"]); 
    $compassword =get_sefe_value($con,$_POST["compassword"]); 
    


mysqli_query($con,"UPDATE admin_users SET password=$password where number=$number");
  }
?>
<html>
<head>  
     <title>user registration system using php and mysql</title>
     <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>


<div class="userinfo">
                <div class="login">
                    <h2 class="header">Reset password<h2>
                            <form method="post" onsubmit="return validlogin()">
                                    <p> <label>username</label></p>
                                    <input type="text" name="number" id="number23" class="info" placeholder=" Enter number" >
                                    <span  id="number1" style="
                                                   font-size:20px;
                                                       color:red;
                                                      "></span>
                                   <p> <label>password</label></p>
                                    <input type="password" name="password" id="paassword"  placeholder=" Enter password">
                                    <span class="field_error" id="password1" style="
                                                                 font-size:20px;
                                                                  color:red;
                                                                  "></span>
                                    
                                    
                                    <p> <label>comfirm password*:</label></p>
                                        <input type="password" name="compassword" placeholder="comfirm password" class="conp" id="compassword">
                                        <span class="field_error" id="compassword1" style="
                                            font-size:20px;
                                            color:red;
                                        "></span>
                    
                                    <button type="submit" name="submit" class="bnt"> login</button>
                                
                                <a href="login.php">sign in </a> 
                            </form>
                </div>
        
</div>
<script>
    function validlogin()
    {
                    var number= document.getElementById('number23').value;
                    var password= document.getElementById('paassword').value;
                    var compassword= document.getElementById('compassword').value;
                    if(number=='')
                    {
                        document.getElementById('number1').innerHTML="** please the fill the number field..";
                        return false;
                    }
                    else if(isNaN(number))
                    {
                        document.getElementById('number1').innerHTML="** only number not character..";
                        return false;
                    }
                    else if(number.length !=10)
                    {
                        document.getElementById('number1').innerHTML="** mobile number must be 10 digit only.";
                        return false;
                    }
                    else if(password=='')
                        {
                            document.getElementById('password1').innerHTML="** please the fill the password  field..";
                            return false;
                        }
                        else if(isNaN(password))
                        {
                            document.getElementById('number1').innerHTML="** only number not character..";
                            return false;
                        }
                       else if((password.length <=5) || (password.length >10))
                        {
                            document.getElementById('password1').innerHTML="** password lenth must be between 5 and 10..";
                            return false;
                        }
                        else if(password !=compassword )
                        {
                            document.getElementById('password1').innerHTML="** password are not matching";
                            return false;
                        }
                        else if(compassword=='')
                        {
                            document.getElementById('compassword1').innerHTML="** please the fill the password  field..";
                            return false;
                        }
                    
    }
 
</script>
</body>
</html>