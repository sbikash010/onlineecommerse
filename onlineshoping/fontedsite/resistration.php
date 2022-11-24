<?php
 require('top.php');
 $number='';
 $fname='';
 $mname='';
 $lname='';
 $password='';
 $compassword='';
 $email='';
 $gender='';
 $address1='';
 $address2='';

 if (isset($_POST["resister"]))  {

    $number =get_sefe_value($con,$_POST["number"]); 
    $fname=get_sefe_value($con,$_POST["fname"]); 
    $mname =get_sefe_value($con,$_POST["mname"]);
    $lname =get_sefe_value($con,$_POST["lname"]);
    $password =get_sefe_value($con,$_POST["password"]); 
    $compassword =get_sefe_value($con,$_POST["compassword"]); 
    $email =get_sefe_value($con,$_POST["email"]); 
    $gender =get_sefe_value($con,$_POST["gen"]);
    $address1 =get_sefe_value($con,$_POST["address1"]);
    $address2 =get_sefe_value($con,$_POST["address2"]);

    $add_on=date('Y-m-d h:i:s');


    mysqli_query($con,"INSERT INTO users(number,fname,mname,lname,password,email,gender,address1,address2,add_on) Values('$number','$fname','$mname','$lname','$password','$email','$gender','$address1','$address2','$add_on')");

}
?>
<div class="adregist">
      <h2 class="head">registration<h2>

                <form method="post" onsubmit="return validation()" >

                    <div class="input-group">
                        <label>Mobile*</label>
                        <select class="selected">
                            <option>+977</option>
                            <option>+81</option>
                            <option>+29</option>
                            <option>+83</option>
                            <option>+79</option>
                        </select><input type="number" name="number" id="number" placeholder="mobile number" class="mobile">
                        <span class="field_error" id="number1" style="
                            font-size:20px;
                            color:red;
                        "></span>
                    </div>
            
            
                    <div class="input-group">
                        <label>First Name*</label>
                        <input type="text" name="fname" placeholder="first name" class="fname" id="fname">
                        <span id="firname"   style="
                            font-size:20px;
                            color:red;"></span>
                    </div>
                    <div class="input-group">
                        <label>middle Name</label>
                        <input type="text" name="mname" placeholder="middle name" class="mname">
                        <span class="field_error" id="name_error" style="
                            font-size:20px;
                            color:red;
                        "></span>
                    <div>
                    <div class="input-group">
                        <label>last Name*</label>
                        <input type="text" name="lname" placeholder="last name" class="lname" id="lname" >
                        <span id="lname1" style="
                            font-size:20px;
                            color:red;
                        "></span>
                    <div>
                    <div class="input-group">
                        <label>password*:</label>
                        <input type="password" name="password" placeholder="password" class="password" class="password"  id="password">
                        <span class="field_error" id="password1" style="
                            font-size:20px;
                            color:red;
                        "></span>
                    </div>
                    <div class="input-group">
                        <label>comfirm password*:</label>
                        <input type="password" name="compassword" placeholder="comfirm password" class="conp" id="compassword">
                        <span class="field_error" id="compassword1" style="
                            font-size:20px;
                            color:red;
                        "></span>
                    </div>
                    <div class="input-group">

                        <label>Email*:</label>
                        <input type="text" name="email" placeholder="Email" class="email" id="email">
                        <span class="field_error" id="email1" style="
                            font-size:20px;
                            color:red;
                        "></span>
                    </div>
                    <div class="radiotag">
                        <label>Gender*:</label> <p style="font-size:25px;display:inline;"> Male:</P> 
                        <input type="radio" name="gen" value="male" > 
                        <p style="font-size:25px;
                        display:inline;">Female:</P>
                        <input type="radio" name="gen" value="female">
                    </div>
                    <div class="input-group">
                        <label>Permanent address*:</label><input type="text" name="address1" id="address1" placeholder="permanent address" class="paddress">
                        <span class="field_error" id="adddress1" style="
                            font-size:20px;
                            color:red;
                        "></span> 
                    </div>
                    <div class="input-group">
                        <label>Temporary address*:</label><input type="text" name="address2" id="address2" placeholder="Temporary address" class="taddress"> 
                        <span class="field_error" id="adddress2" style="
                            font-size:20px;
                            color:red;
                        "></span>
                  </div>

                <div class="input-group">
                <button type="submit" name="resister" class="bnt"> Resister</button>
                </div>
                <p>
                    <a href="login.php">sign in </a>
                </p>
                
            </form>

        </div>
</div>
<script>
    
 function validation()
{
    
   var number= document.getElementById('number').value;
   var fname= document.getElementById('fname').value;
   var lname= document.getElementById('lname').value;
   var password= document.getElementById('password').value;
   var compassword= document.getElementById('compassword').value;
   var email= document.getElementById('email').value;
   var address1= document.getElementById('address1').value;
   var address2= document.getElementById('address2').value;
     if(number=='')
   {
       document.getElementById('number1').innerHTML="** please the fill the number field..";
       return false;
   }
   if(isNaN(number))
   {
       document.getElementById('number1').innerHTML="** only number not character..";
       return false;
   }
   if(number.length !=10)
   {
       document.getElementById('number1').innerHTML="** mobile number must be 10 digit only.";
       return false;
   }
   if(fname=='')
   {
       document.getElementById('firname').innerHTML="** please the fill the first name field..";
       return false;
   }
   if(lname=='')
   {
       document.getElementById('lname1').innerHTML="** please the fill the last name field..";
       return false;
   }
   if(password=='')
   {
       document.getElementById('password1').innerHTML="** please the fill the password  field..";
       return false;
   }
   if(isNaN(password))
   {
       document.getElementById('number1').innerHTML="** only number not character..";
       return false;
   }
   if((password.length <=5) || (password.length >10))
   {
       document.getElementById('password1').innerHTML="** password lenth must be between 5 and 10..";
       return false;
   }
   if(password !=compassword )
   {
       document.getElementById('password1').innerHTML="** password are not matching";
       return false;
   }
   if(compassword=='')
   {
       document.getElementById('compassword1').innerHTML="** please the fill the password  field..";
       return false;
   }
   if(email=='')
   {
       document.getElementById('email1').innerHTML="** please the fill the email field.";
       return false;
   }
   if(email.indexOf('@')<=0)
   {
       document.getElementById('email1').innerHTML="**@  invalid position in email..";
       return false;
   }
   if((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.'))
   {
       document.getElementById('email1').innerHTML="** . invalid position in  email ..";
       return false;
   }
   if(address1=='')
   {
       document.getElementById('adddress1').innerHTML="** please the fill the permanent address field..";
       return false;
   }
   if(address2=='')
   {
       document.getElementById('adddress2').innerHTML="** please the fill the temporary address field..";
       return false;
   }
   

}
</script>