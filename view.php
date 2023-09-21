<?php require "connection.php"; 

$sql = "SELECT * from scldata";
$stmt = $conn->prepare($sql);
$stmt->execute();
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php require "header.php"; ?>

<div class="container">
    <div class="mt-5 "><h4>RECORD LIST OF STUDENTS</h4></div>
    <div class="mt-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>RECORD-ID</th>
                    <th>ASSIGNMENT</th>
                    <th>COMPLETED REPORT</th>
                    <th>DELETE REPORT</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($user as $record):?>
                    <tr>
                    <td><?php echo $record['record_id']; ?></td>
                    <td><?php echo $record['assignment']; ?></td>
                    
                        <form action="complete.php" method="post">
                        <td>
                            <input type="hidden"  name="complete_task" value="<?php echo $record['id'];?>">
                            <button  class="btn btn-success" ><?php echo ($record['status'] == 'complete')? 'Completed': 'Uncompleted'; ?></button>
                        </td> 
                        </form>
                        <form action="delete.php" method="post">
                        <td>
                            <button class="btn btn-danger " name="delete" onclick="return confirm('ARE YOU SURE TO DELETE THIS STUDENT REPORT!!!')" value="<?php echo $record['id']; ?>">DELETE</button>
                        </td>    
                        </form>
                    
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div class="mt-5"><a href="index.php" class="btn btn-primary text-dark">BACK TO YOUR PAGE</a></div>
</div>

<?php require "footer.php"; ?>