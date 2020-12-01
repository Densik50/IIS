<?php
    include_once 'admin.php';
    include_once 'php/includes/database_handler.include.php';
?>

<div style="width:75%; position:relative; left:20%">

<h1>GENRE CONTROL</h1>

<?php
$query = "SELECT * FROM genre";
$stmt = mysqli_query($conn,$query);
$data = array();
while ($row = mysqli_fetch_array($stmt)) {
    $data[] = $row;
}
?>


<table>
<tr>
    <td class="pr-3 py-4 ">
        <button  type="submit" class="btn btn-primary">
            <a href='edit_genre.php?mode=edit'>Edit genres</a>
        </button>
    </td>
</tr>
<?php foreach($data as $row): ?>
    <tr>
        <td class="pr-3 py-4 "><span class="border-left border-bottom border-dark rounded px-2 py-2"><?=$row['GenreID']?></span></td>
        <td class="pr-3 py-4 "><span class="border-left border-bottom border-dark rounded px-2 py-2"><a href="event.php?event=<?=$row['EventID']?>"><?=$row['GenreName']?></a></span></td>
        <td class="pr-3 py-4 ">
            <button  type="submit" class="btn btn-primary">
                <a href='edit_genre.php?mode=delete&id=<?=$row['GenreID']?>'>Delete genre</a>
            </button>
        </td>
        
    </tr>
<?php endforeach ?>
</table>




</div>