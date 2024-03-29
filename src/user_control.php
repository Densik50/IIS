<?php
    include_once 'admin.php';
    include_once 'php/includes/database_handler.include.php';
?>



<div style="width:75%; position:relative; left:20%">

<h1>USER CONTROL</h1>
<?php
$query = "SELECT * FROM USERS";
$stmt = mysqli_query($conn,$query);
$data = array();
while ($row = mysqli_fetch_array($stmt)) {
    $data[] = $row;
}
?>


<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Fullname</th>
        <th>Email</th>
        <th>Type</th>
        <th>Ban</th>
        <th>Set privileges</th>
        <th>Exterminate</th>
    </tr>
<?php foreach($data as $row): ?>  
    <tr class="">
        <td id="idtd" class="pr-3 py-4 "><span class="border-left border-bottom border-dark rounded px-2 py-2"><?=$row['UserID']?></span></td>
        <td class="pr-3 py-4 "><span class="border-left border-bottom border-dark rounded px-2 py-2"><a href="profile.php?user=<?=$row['Username']?>"><?=$row['Username']?></a></span></td>
        <td class="pr-3 py-4 "><span class="border-left border-bottom border-dark rounded px-2 py-2"><?=$row['Fullname']?></span></td>
        <td class="pr-3 py-4 "><span class="border-left border-bottom border-dark rounded px-2 py-2"><?=$row['Email']?></span></td>
        <td class="pr-2 py-4"><span class="border-left border-bottom border-dark rounded px-2 py-2">
            <?php
                $is_user_admin = 2;
                if($row['is_admin']==1){
                    $is_user_admin = "Admin";
                }
                else
                {
                    $is_user_admin = "Regular";
                }
                echo $is_user_admin;
                ?></span></td>
        <td class="pr-2 py-4">
            <button type="submit" class="btn btn-secondary abtn">
            <?php 
                    if($row['is_banned']==0){
                        echo "<a href='php/includes/ban_user.php?id=",$row['UserID'],"'>Ban user</a>";
                    }
                    else{
                        echo "<a href='php/includes/ban_user_no.php?id=",$row['UserID'],"'>Unban user</a>";
                    }
                ?>
            </button>
        </td>
        <td class="pr-3 py-4">
            <button type="button" class="btn btn-secondary abtn" data-toggle="modal" data-target="#exampleModal">
                <?php 
                    if($row['is_admin']==0){
                        echo "<a href='php/includes/set_admin.php?id=",$row['UserID'],"'>Set as admin</a>";
                    }
                    else{
                        echo "<a href='php/includes/set_regular.php?id=",$row['UserID'],"'>Set as regular</a>";
                    }
                ?>
            </button>     
        </td>
        <td class="pr-3 py-4">
            <button type="button" class="btn btn-primary abtn" data-toggle="modal" data-target="#exampleModal">
                <a href='php/includes/delete_user.php?id="<?=$row['UserID']?>"'>Delete user</a>
            </button>     
        </td>
    </tr>
<?php endforeach ?>
</table>
</div>

<!-- jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
    
</html>