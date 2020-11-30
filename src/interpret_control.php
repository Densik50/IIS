<?php
    include_once 'php/includes/database_handler.include.php';
?>

<div>

<h1>INTERPRET CONTROL</h1>

<?php
$query = "SELECT * FROM interpret";
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
        <td class="pr-3 py-4 "><span class="border-left border-bottom border-dark rounded px-2 py-2"><a href="interpret.php?interpret=<?=$row['InterpretID']?>"><?=$row['Name']?></a></span></td>
        <td class="pr-3 py-4 "><span class="border-left border-bottom border-dark rounded px-2 py-2"><?=$row['Owner']?></span></td>
        <td class="pr-3 py-4 ">
            <button type="submit" class="btn btn-secondary">
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