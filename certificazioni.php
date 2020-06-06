<h1><?php echo $title;?></h1>
<?php  $servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbcaiwl";

error_reporting (E_ALL ^ E_NOTICE);
// Create connection
$conn = new mysqli($servername, $username, $password ,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: <br>" . $conn->connect_error);
} ?>
<div class="col-lg-12">
	<h3>PDF</h3>
	<div class="table-responsive">
		<table id="example" class="table table-bordered">
			<thead>
				<th width="2%">#</th>
				<th>Capitolo</th>
				<th>Titolo</th>
				<th width="2%">Azione</th>
			</thead>
			<tbody>
				<?php
                $studentid=$_SESSION['StudentID'];
                $control="SELECT DISTINCT LessonID FROM  tblscore WHERE StudentID='$studentid' ";
                $result5 = $conn->query($control);
                if ($result5-> num_rows > 0) {
                    while($row = $result5->fetch_assoc()) {
                        $lessonid=$row['LessonID'];
                    }
                }

                $sum = "SELECT SUM(Score) as 'SCORE' FROM tblscore  WHERE LessonID='$lessonid' and StudentID='$studentid'";
                $result3 = $conn->query($sum);
                $row = $result3->fetch_assoc();
                $score  = $row['SCORE'];
                if($score>1){

                $control="SELECT DISTINCT LessonID FROM  tblscore WHERE StudentID='$studentid' ";
                $result5 = $conn->query($control);
                if ($result5-> num_rows > 0) {
                    while($row = $result5->fetch_assoc()) {
                        $lessonid=$row['LessonID'];
                        $sql = "SELECT * FROM tbllesson WHERE Category='Docs' AND LessonID='$lessonid'";
        				$mydb->setQuery($sql);
        				$cur = $mydb->loadResultList();
        				foreach ($cur as $result) {
        					# code...
        					echo '<tr>';
        					echo '<td></td>';
        					echo '<td>'.$result->LessonChapter.'</td>';
        					echo '<td>'.$result->LessonTitle.'</td>';
        					echo '<td><a href="about.php?id='.$result->LessonID.'&ids='.$studentid.'" class="btn btn-xs btn-info"><i class="fa fa-info"></i> Scarica</a></td>';
        					echo '</tr>';
        				}
                    }}
                }
				?>
			</tbody>
		</table>
	</div>
</div>
