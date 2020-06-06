<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbcaiwl";

// Create connection
$conn = new mysqli($servername, $username, $password ,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: <br>" . $conn->connect_error);
}

  @$id = $_GET['id'];
    if($id==''){
  redirect("index.php");
}
  $lesson = New Lesson();
  $res = $lesson->single_lesson($id);
  $click="update tbllesson set click=click + 1 where LessonID= ?; ";
  $stmt=$conn->prepare($click);
            $stmt->bind_param("i",$id);
            $stmt->execute();
?>
<h2>View PDF File</h2>
<p style="font-size: 18px;font-weight: bold;">Chapter : <?php echo $res->LessonChapter;?> | Title : <?php echo $res->LessonTitle;?></p>
<div class="container">
	<embed src="<?php echo web_root.'admin/modules/lesson/'.$res->FileLocation; ?>" type="application/pdf" width="100%" height="400px" />
</div>
