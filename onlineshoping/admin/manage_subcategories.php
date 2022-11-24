<?php

require('top.inc.php');
$msg='';
$categories='';
$subcategories='';

if(isset($_GET['id']) && $_GET['id']!='')
{
    $id=get_sefe_value($con,$_GET['id']);
    $res=mysqli_query($con,"SELECT * FROM subcategories where id='$id' ");
    $check=mysqli_num_rows($res);
    if($check>0)
    {
        $row=mysqli_fetch_assoc($res);
        $subcategories=$row['subcategories'];
        $categories_id=$row['categories_id'];
    }
    else {
        header('location:subcategories.php');
        die();
    }
    
}

if(isset($_POST['submit']))
 {
    $categories=get_sefe_value($con,$_POST['categories_id']);
    $subcategories=get_sefe_value($con,$_POST['subcategories']);
    $res=mysqli_query($con,"SELECT * FROM subcategories where categories_id='$categories' and subcategories='$subcategories'  ");
    $check=mysqli_num_rows($res);
            if($check>0)
            {
                    if(isset($_GET['id']) && $_GET['id']!='')
                    {
                        $getdata=mysqli_fetch_assoc($res);
                        if($id==$getdata['id'])
                        {

                          }else{
                            $msg="subcategories already exits"; 
                        }
                    }
                    else{
                    $msg="subcategories already exits";
                    }
            }
   if($msg==''){ 
                        if(isset($_GET['id']) && $_GET['id']!='')
                    {
                        mysqli_query($con,"UPDATE subcategories set categories_id='$categories',subcategories='$subcategories' where id='$id' ");
                    }  
                    else {
                    mysqli_query($con,"INSERT INTO subcategories (categories_id,subcategories,status) Values('$categories','$subcategories','1')");
                        }
                    header('location:subcategories.php');
                    die();
                    
                 }
}
?>
    
        <div class="addform">
            <div class="addh">
                <strong>sub categories</strong><small>Form</small>
            </div>
                <form method="post">
                    
                    <div>
                            <label>categories</label>
                            <select name="categories_id" required>
                                <option>select categories</option>
                                <?php
                                
                                $res=mysqli_query($con,"SELECT * from `categories` where status='1'");
                                while($row=mysqli_fetch_assoc($res)){
                                    if($row['id']==$categories){ 
                                echo "<option value=".$row['id']." selected >".$row['categories']."</option>";
                                }else
                                {
                                    echo "<option value=".$row['id'].">".$row['categories']."</option>";
                                }  
                                }
                                 ?>
                                
                    </div>
                   <hr>
                    <div>
                    <label>sub categories</label>
                       <input type="text" name="subcategories" placeholder="Enter sub categories" class="input-group"  value="<?php echo $subcategories;?>" >
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