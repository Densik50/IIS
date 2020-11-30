<?php
    include_once 'php/includes/database_handler.include.php';
?>

<div>

<h1>EVENT CONTROL</h1>

<?php
$query = "SELECT * FROM events";
$stmt = mysqli_query($conn,$query);
$data = array();
while ($row = mysqli_fetch_array($stmt)) {
    $data[] = $row;
}
?>


<table>
<?php foreach($data as $row): ?>
    <tr>
        <td class="pr-3 py-4 "><span class="border-left border-bottom border-dark rounded px-2 py-2"><?=$row['EventID']?></span></td>
        <td class="pr-3 py-4 "><span class="border-left border-bottom border-dark rounded px-2 py-2"><a href="event.php?event=<?=$row['EventID']?>"><?=$row['Name']?></a></span></td>
        <td class="pr-3 py-4 "><?=$row['Address']?></td>
        <td class="pr-3 py-4 ">
            <button  type="submit" class="btn btn-primary">
                <a href='delete_event.php?id="<?=$row['EventID']?>"'>Delete event</a>
            </button>
        </td>
    </tr>
<?php endforeach ?>
</table>




</div>