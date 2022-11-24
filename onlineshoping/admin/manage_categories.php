<?php

require('top.inc.php');
$msg='';
$categories='';

if(isset($_GET['id']) && $_GET['id']!='')
{
    $id=get_sefe_value($con,$_GET['id']);
    $res=mysqli_query($con,"SELECT * FROM categories where id='$id' ");
    $check=mysqli_num_rows($res);
    if($check>0)
    {
        $row=mysqli_fetch_assoc($res);
        $categories=$row['categories'];
    }
    else {
        header('location:categories.php');
        die();
    }
    
}

if(isset($_POST['submit']))
 {
    $categories=get_sefe_value($con,$_POST['categories']);
    $res=mysqli_query($con,"SELECT * FROM categories where categories='$categories' ");
    $check=mysqli_num_rows($res);
            if($check>0)
            {
                    if(isset($_GET['id']) && $_GET['id']!='')
                    {
                        $getdata=mysqli_fetch_assoc($res);
                        if($id==$getdata['id'])
                        {

                          }else{
                            $msg="categories already exits"; 
                        }
                    }
                    else{
                    $msg="categories already exits";
                    }
            }
   if($msg==''){ 
                        if(isset($_GET['id']) && $_GET['id']!='')
                    {
                        mysqli_query($con,"UPDATE categories set categories='$categories' where id='$id' ");
                    }  
                    else {
                    mysqli_query($con,"INSERT INTO categories (categories,status) Values('$categories','1')");
                        }
                    header('location:categories.php');
                    die();
                    
                 }
}
?>
    
        <div class="addform">
            <div class="addh">
                <strong>categories</strong><small>Form</small>
            </div>
                <form method="post">
                    
                    <div>
                            <label>categories</label>
                            <input type="text" name="categories" placeholder="Enter categories" class="input-group" required value="<?php echo $categories?>" >
                    </div>
                    <div>
                            <button type="submit" name="submit" class="bnt"
                            style="margin-left:100px;
                            width:200px;
                            font-size:22px;
                            border-radius:10px;
                            background:red;"> submit</button>
                    </div>
                    <?php echo $msg?>
                </form>
        </div>
    </div>
<?php
require('footer.inc.php');
?>