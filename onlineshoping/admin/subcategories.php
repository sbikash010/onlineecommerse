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
        $update_status="UPDATE `subcategories` set status='$status' where id='$id'";
        mysqli_query($con,$update_status);
    }

    if($type=='delete')
    {
        $id=get_sefe_value($con,$_GET['id']);
        
        $delete_status="delete `subcategories`,product from  `subcategories` inner join  product 
        on `subcategories`.id=product.subcategories_id	 
        where (`subcategories`.id='$id' and product.subcategories_id='$id') ";
        mysqli_query($con,$delete_status);
    }
}

$sql="select `subcategories`.*,`categories`.categories from `subcategories`,`categories` where `subcategories`.categories_id=`categories`.id  order by `subcategories`.subcategories desc";
$res=mysqli_query($con,$sql);
?>

                                                                            
                       <div class="body">
                           <div>
                                    <form action="subcatesearch.php" method="get">
                                        <div class="info">
                                            <input  placeholder="search categories here......." type="text" name="str" class="inp" style="padding-left:100px;margin-bottom:5px; margin-left:20px;width:500px;height:50px;"><button type="submit" ></button></input>
                                            
                                        </div>
                                        
                                    </form>
                
                            </div>
                           <div class="order">
                               <h2> sub categories</h2>
                               <h2 class="add"><a href="manage_subcategories.php">add sub categories</a></h2>
                            </div>
                            
                                <table>
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>categories</th>
                                            <th>sub categories</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        while($row=mysqli_fetch_assoc($res)) {
                                            ?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['categories'] ?></td>
                                            <td><?php echo $row['subcategories'] ?></td>
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
                                                echo "<span class='edit'> &nbsp;<a href='manage_subcategories.php?id=".$row['id']." '>edit </a></span>&nbsp";
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