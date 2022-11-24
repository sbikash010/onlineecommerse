<?php

require('top.inc.php');
if(isset($_GET['type']) && $_GET['type']!='')
{
    $type=get_sefe_value($con,$_GET['type']);
    if($type=='status')
    {
        $operation=get_sefe_value($con,$_GET['operation']);
        $id=get_sefe_value($con,$_GET['id']);
        if($operation=='active')
        {
            $status='1';
        }
        else{
            $status='0';
        }
        $update_status="UPDATE product set status='$status' where id='$id'";
        mysqli_query($con,$update_status);
    }

    if($type=='delete')
    {
        $id=get_sefe_value($con,$_GET['id']);
        
        $delete_status="delete product from product where id='$id' ";
         mysqli_query($con,$delete_status);
    }
}

$sql="select product. *,categories.categories,`subcategories`.subcategories from product,categories,`subcategories` where product.categories_id=categories.id and product.subcategories_id	=`subcategories`.id order by product.id desc";
$res=mysqli_query($con,$sql);
?>

                                                                            
                       <div class="body">
                            <div>
                                    <form action="prodsearch.php" method="get">
                                        <div class="info">
                                            <input  placeholder="search product name here......." type="text" name="str" class="inp" style="padding-left:100px;margin-bottom:5px; margin-left:20px;width:500px;height:50px;"><button type="submit" ></button></input>
                                            
                                        </div>
                                        
                                    </form>
                
                            </div>
                           <div class="order">
                               <h2>product</h2>
                               <h2 class="add"><a href="manage_product.php">add product</a></h2>
                            </div>
                            
                                <table>
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>categories</th>
                                            <th>sub categories</th>
                                            <th>Name</th>
                                            <th>image</th>
                                            <th>mrp</th>
                                            <th>price</th>
                                            <th>Qty</th>
                                             <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        while($row=mysqli_fetch_assoc($res)) {?>

                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['categories'] ?></td>
                                            <td><?php echo $row['subcategories'] ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td class="proimg"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"/>  </td>
                                            <td><?php echo $row['mrp'] ?></td>
                                            <td><?php echo $row['price'] ?></td>
                                            <td><?php echo $row['qty'] ?></td>
                                            <td>
                                                <?php
                                                if($row['status']==1)
                                                {

                                                    echo " <span class='cate'><a href='?type=status&operation=deactive&id=".$row['id']." '> active </a></span>&nbsp";
                                                }
                                                else
                                                {
                                                    echo "<span class='cate'> <a href='?type=status&operation=active&id=".$row['id']." '>deactive </a></span>&nbsp";
                                                }
                                                echo "<span class='edit'> &nbsp;<a href='manage_product.php?id=".$row['id']." '>edit </a></span>&nbsp";
                                                echo "<span class='dele'> <a href='?type=delete&id=".$row['id']." '>delete </a></span>&nbsp";
                                                
                                                ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                     </tbody>

                                </table>


<?php
require('footer.inc.php')
?> 