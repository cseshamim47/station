<?php
include_once("../controller/admin_homeCheck.php");
include_once("../models/userModel.php");
$users = getAllUser();

?>


<center>
    home.php
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <td colspan="4" align="CENTER">Users</td>
        </tr>

        <tr>
            <td>ID</td>
            <td>NAME</td>
            <td>USER TYPE</td>
        </tr>
        <?php for ($i = 0; $i < count($users); $i++) { ?>
            <tr>
                <td><?= $users[$i]['id'] ?></td>
                <td><?= $users[$i]['name'] ?></td>
                <td><?= $users[$i]['type'] ?></td>
            </tr>


        <?php } ?>


        <tr>
            <td colspan="3" align="right">
                <a href="admin_home.php">Go Home</a>
            </td>
        </tr>
    </table>
</center>