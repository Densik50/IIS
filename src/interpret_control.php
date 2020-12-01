<?php
    include_once 'admin.php';
    include_once 'php/includes/database_handler.include.php';
?>

<div style="width:75%; position:relative; left:20%">

<h1>INTERPRET CONTROL</h1>

<?php
$query = "SELECT * FROM INTERPRET";
$stmt = mysqli_query($conn,$query);
$data = array();
while ($row = mysqli_fetch_array($stmt)) {
    $data[] = $row;
}
?>


<table>
<?php foreach($data as $row): ?>
    <tr>
        <td class="pr-3 py-4 "><span class="border-left border-bottom border-dark rounded px-2 py-2"><?=$row['InterpretID']?></a></span></td>
        <td class="pr-3 py-4 "><span class="border-left border-bottom border-dark rounded px-2 py-2"><a href="interpret.php?id=<?=$row['InterpretID']?>"><?=$row['Name']?></a></span></td>
        <td class="pr-3 py-4 "><span class="border-left border-bottom border-dark rounded px-2 py-2"><?=$row['Owner']?></span></td>
        <td class="pr-3 py-4 ">
            <button type="submit" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">
                <a href='ban_interpret.php?id="<?=$row['InterpretID']?>"'>Ban interpret</a>
            </button>
        </td>
        <td class="pr-3 py-4 ">
            <button  type="submit" class="btn btn-primary">
                <a href='php/includes/delete_interpret.php?id="<?=$row['InterpretID']?>"'>Delete interpret</a>
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