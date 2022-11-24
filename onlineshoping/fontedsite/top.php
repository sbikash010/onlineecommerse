<?php
require('connection.inc.php');
require('function.inc.php');
$cat_id='';

if(isset($_GET['id']) && $_GET['id']!='')
{
    $cat_id=get_sefe_value($con,$_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="navi.css">
</head>

<body>
    <div class="first">
        <h2>connect with us</h2>
        <a href="#"><img src="facebook.png"></a>
        <a href="#"><img src="viber.png"></a>
    </div>
    <hr>
    <div class="second">
        <div class="container">
            <div class="items">
                <a href="top.php">ACME <span>SHOP</span>.COM</a>
            </div>
            <div class="items">

                <form action="#" method="get">
                    <div class="info">
                        <input placeholder="Search in Acme Shop" type="text" name="str" class="inp">
                        <button type="submit" class="submit"><img src="search.png" ></button>
                        </input>

                    </div>
                </form>

            </div>
            <div class="items" id="itemnasted">
                <div class="nasted">
                    <div class="nasted1">
                        <a href="login.php"><img src="login.png"></a>
                    </div>
                    <div class="nasted2">
                        <div class="nasted3">Namaste<a href="login.php">
                        <?php 
                                    if(isset($_SESSION['USER_LOGIN']))
                                    {
                                        echo $_SESSION['USER_NAME'];
                                    }else
                                    {
                                        echo 'login';
                                    }
                        ?>
                        </a></div>
                        <div class="nasted4">
                            <ul class="drop">
                                <li class="dropli"><a href="#">
                                <?php 
                                    if(isset($_SESSION['USER_LOGIN']))
                                    {
                                        echo '<a href=logout.php style="margin-top:5px;">log out</a>';
                                    }else
                                    {
                                        echo 'My accout';
                                        echo '<ul class="dropmenu">
                                        <li class="dropmenuli"><a href="login.php" style="margin-top:0px;">login</a></li>
                                        <li class="dropmenuli"><a href="resistration.php">sign up</a></li>
                                    </ul>';
                                    }
                                 ?>
                                </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="nasted4"><a href="#"><span style="font-size:18px;margin-top:18px;">My cart<img src="cart.png"></span></a></div>
            </div>

        </div>
    </div>
    <div class="sidebarmenu">

        <div class="sidebar">
            <ul class="drop">
            <?php
             $cat_res=mysqli_query($con,"SELECT * from categories where status=1 order by categories asc");
                   while($row=mysqli_fetch_assoc($cat_res)){?>
                <li class="dropli"><a href="categories.php?id=<?php echo $row['id']?>"><?php echo $row['categories']?></a>
                                        <?php
                                            $sub_cat_res=mysqli_query($con,"SELECT * from subcategories where 
                                            ( status='1' and categories_id='$cat_id' )");
                                            
                                    
                                                if(mysqli_num_rows($sub_cat_res)>0){
                                        ?>
                    <ul class="dropmenu">
                    <?php 
                                                    while($sub_cat_rows=mysqli_fetch_assoc($sub_cat_res)){?>
                        <li class="dropmenuli"><a href="categories.php?id=<?php echo $sub_cat_rows['categories_id'].
                                                            '&sub_categories='. $sub_cat_rows['id'] ?> ">
                                                            <?php echo $sub_cat_rows['subcategories'].'&nbsp&nbsp&nbsp'?></a></li>
                        <li class="dropmenuli"><a href="#">china</a></li><?php }
                                                    ?>
                    </ul>  <?php } ?>  
                </li><?php } ?>
            </ul>
        </div>
        <div class="slider">
            <a href="hello.php"><img src="jacketlogo.jpg" id="slideimage"></a>
        </div>
    </div>
    <script>
        function first() {
            document.getElementById("slideimage").src = "camera.jpg";
        }

        function second() {
            document.getElementById("slideimage").src = "wintercollection.jpg";
        }

        function third() {
            document.getElementById("slideimage").src = "makeup.jpg";
        }

        function four() {
            document.getElementById("slideimage").src = "jacketlogo.jpg";
        }
        setInterval(first, 2000);
        setInterval(second, 4000);
        setInterval(third, 6000);
        setInterval(four, 8000);
    </script>