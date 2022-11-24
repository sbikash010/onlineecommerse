<?php

require('top.inc.php');
if(isset($_GET['type']) && $_GET['type']!='')
{
    $type=get_sefe_value($con,$_GET['type']);
    

    if($type=='delete')
    {
        $id=get_sefe_value($con,$_GET['id']);
        
        $delete_status="delete from  users where id='$id'";
        mysqli_query($con,$delete_status);
    }
}
$sql="select * from users order by id desc";
$res=mysqli_query($con,$sql);
?>

                                                                            
                       <div class="body">
                           <div class="order">
                               <h2 class="add">users</h2>
                            </div>
                            
                                <table>
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>number</th>
                                            <th>fname</th>
                                            <th>mname</th>
                                            <th>lname</th>
                                            <th>password</th>
                                            <th>email</th>
                                            <th>gender</th>
                                            <th>p_address</th>
                                            <th>T_address</th>
                                            <th>date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        while($row=mysqli_fetch_assoc($res)) {?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['number'] ?></td>
                                            <td><?php echo $row['fname'] ?></td>
                                            <td><?php echo $row['mname'] ?></td>
                                            <td><?php echo $row['lname'] ?></td>
                                            <td><?php echo $row['password'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['gender'] ?></td>
                                            <td><?php echo $row['address1'] ?></td>
                                            <td><?php echo $row['address2'] ?></td>
                                            <td><?php echo $row['add_on'] ?></td>
                                            <td>
                                                <?php
                                                 
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