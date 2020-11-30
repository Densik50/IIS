<?php
    include_once 'php/includes/database_handler.include.php';
?>



<div>

<h1>USER CONTROL</h1>
<?php
$query = "SELECT * FROM users";
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
        <td class="pr-3 py-4 "><span class="border-left border-bottom border-dark rounded px-2 py-2"><a href="user.php?user=<?=$row['Username']?>"><?=$row['Username']?></a></span></td>
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


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Delete user</button>
      </div>
    </div>
  </div>
</div>

<?php
   
    
?>

</div>