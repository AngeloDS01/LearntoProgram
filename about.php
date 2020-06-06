<?php

require_once 'dompdf/dompdf/autoload.inc.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbcaiwl";

session_start();
$lessonid=$_REQUEST['id'];
$studentid=$_REQUEST['ids'];
// Create connection
$conn = new mysqli($servername, $username, $password ,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: <br>" . $conn->connect_error);
}





use Dompdf\Dompdf;
$pdf = new Dompdf();


ob_start();
?>
<?php
$stud="SELECT * FROM tblstudent WHERE StudentID='$studentid'";
$result = $conn->query($stud);
if ($result-> num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $nome=$row['Fname'];
        $cognome=$row['Lname'];
    }}



    $lez="SELECT * FROM tbllesson WHERE LessonID='$lessonid'";
    $result2 = $conn->query($lez);
    if ($result2-> num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
            $lesson=$row['LessonChapter'];
            $lessont=$row['LessonTitle'];
        }}

$sum = "SELECT SUM(Score) as 'SCORE' FROM tblscore  WHERE LessonID='$lessonid' and StudentID='$studentid'";
$result3 = $conn->query($sum);
$row = $result3->fetch_assoc();
$score  = $row['SCORE'];
        ?>

        <html>
        <head>
        <style type="text/css">


        span.cls_057{font-family:Arial, Helvetica, sans-serif;font-size:50.0px;color:rgb(0,0,0);font-weight:bold;font-style:normal;;text-decoration: none }
        div.cls_057{font-family:Arial, Helvetica, sans-serif;font-size:50.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
        span.cls_058{font-family:Arial,serif;font-size:25.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
        div.cls_058{font-family:Arial,serif;font-size:25.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
        span.cls_059{font-family:"Times New Roman", Times, serif;font-size:35.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
        div.cls_059{font-family:"Times New Roman", Times, serif;font-size:35.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
        span.cls_060{font-family:Arial,serif;font-size:25.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
        div.cls_060{font-family:Arial,serif;font-size:25.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}



        </style>
        <style>
        body{
            background-image: url(C:\xampp\htdocs\LearntoProgram\background1.png);
            background-size: contain;
        }
        div{
            margin-left:30%;
            margin-top:90px;
        }
    </style>


        </head>
        <body>

        <div style="position:absolute;top:212.20px" class="cls_057"><span class="cls_057"><?php echo $nome.'&nbsp;'.$cognome; ?></span></div>
        <div style="position:absolute;top:280.14px" class="cls_059"><span class="cls_059"><?php echo $lessont; ?></span></div>
        <div style="position:absolute;top:330.53px" class="cls_058"><span class="cls_058"><?php echo $lesson; ?></span></div>
        <div style="position:absolute;top:380.90px" class="cls_060"><span class="cls_060">Punteggio <?php echo $score ?></span></div>




        </body>
        </html>


        <?php


        $html=ob_get_clean();
        $pdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $pdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $pdf->render();

        // Output the generated PDF to Browser
        $pdf->stream('result.pdf', Array('Attachment'=>0));

    ?>
