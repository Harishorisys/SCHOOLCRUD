<?php require "connection.php";

$msg = "";

if(isset($_POST['add'])){
    $record_id = $_POST['record_id'];
    $assign = $_POST['assign'];
    $subject = $_POST['subject'];

    $sql = "SELECT * from scldata where  record_id = :record_id limit 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':record_id'=>$record_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user){
        $msg =  "THE ID IS ALREADY EXISTED";
    }else{
        $sql1 = "INSERT into scldata (record_id,assignment,subject,status) values(:record_id,:assignment,:subject,'Uncompleted')";
        $stmt1 = $conn->prepare($sql1);
        $result = $stmt1->execute([':record_id'=>$record_id,':assignment'=>$assign,':subject'=>$subject]);
        if($result){
            $msg =  "THE TASK IS ADDED SUCCESSFULLY";
        }else{
            $msg =  "THERE IS AN ERROR BY ADDING THE DATA RECORD";
        }

    }

}

?>
<?php require "header.php "; ?>

<div class="container mt-5">
    <form action="" method="post">
    
    <div class="mb-5"><h4>SCHOOL STUDENT REPORT</h4></div>
    <div class="mb-5"><?php echo $msg; ?></div>
    <div class="mb-5">
        <input type="text" placeholder="ID" class="form-control" name="record_id">
    </div>
    <div class="mb-5">
        <input type="text" placeholder="ASSIGNMENT"  class="form-control" name="assign">
    </div>
    <div class="mb-5">
        <select class="form-control" name="subject">
        <option>SUBJECTS</option>        
        <option>ENGLISH</option>
        <option>PHYSICS</option>
        <option>CHEMISTRY</option>
        <option>MATHS</option>
        <option>SPORTS</option>
        </select>
    </div>
    <div class="mb-5">
        <button type="submit" class="btn btn-primary text-dark " name="add">ADD TASK</button>
    </div>
    <div>
        <a href="view.php" type="submit" class="btn btn-success" >VIEW RECORD PAGE</a>
    </div>
    </form>
</div>

<?php require "footer.php "; ?>