<?php
 require('top.php');
 
 
 if(isset($_POST['submit']))
 {
     $number=get_sefe_value($con,$_POST['number']);
     $password=get_sefe_value($con,$_POST['password']);
     $sql="select * from users where number='$number' and password='$password' ";
     $res=mysqli_query($con,$sql);
     print_r($res);
     $count=mysqli_num_rows($res);
     if($count>0)
      {
        $row=mysqli_fetch_assoc($res);
         $_SESSION['USER_LOGIN']='yes';
         $_SESSION['USER_ID']=$row['id'];
         $_SESSION['USER_NAME']=$row['fname'];
         header('location:top.php');
        die();
        }
      else
      {
          echo "wrong";
      }
 }

?>
<div class="userinfo">
                <div class="login">
                    <h2 class="header">login user<h2>
                            <form method="post" onsubmit="return validlogin()">
                                <p> <label>username</label></p>
                                    <input type="text" name="number" id="number23" class="info" placeholder=" Enter number" >
                                    <span  id="number1" style="font-size:20px;color:red;"></span>
                                <p> <label>password</label></p>
                                    <input type="password" name="password" id="paassword"  placeholder=" Enter password">
                                    <span class="field_error" id="password1" style=" font-size:20px;color:red;"></span>
                                    
                                    <button type="submit" name="submit" class="bnt"> login</button>
                                
                                <a href="update.php" class="forget"> Forget password?</a>
                                     <hr>
                                <a href="resistration.php" class="signup">create new account </a>
                            </form>
                </div>
        
</div>
<script>
    function validlogin()
    {
                    var number= document.getElementById('number23').value;
                    var password= document.getElementById('paassword').value;
                    if(number=='')
            {
                document.getElementById('number1').innerHTML="** please the fill the number field..";
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
          else if((password.length <=5) || (password.length >10))
                  {
                document.getElementById('password1').innerHTML="** password length must be between 5 and 10..";
                return false;
                  }
    }
 
</script>
</body>
</html>