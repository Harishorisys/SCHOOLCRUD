<?php require "connection.php"; 

if(isset($_POST['complete_task'])){
    $task = $_POST['complete_task'];

    $sql = "UPDATE scldata SET status = 'complete' where id = :id ";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([':id'=>$task]);

    if($result){
        echo "THE REPORT IS COMPLETED TO THE DATABASE";
        header("location:view.php");
        exit(0);
    }
    // else{
    //     echo "NO THERE IS AN ERROR TO COMPLETE THIS REPORT?";
    // }
}

?>