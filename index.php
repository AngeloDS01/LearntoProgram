<?php
require_once("include/initialize.php");
if (!isset($_SESSION['StudentID'])) {
  # code...
  redirect('login.php');
}
$content='home.php';
$view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';
switch ($view) {
  case 'lesson':
    $title = "Lezioni";
    $content = 'lesson.php';
   # code...
   break;
  case 'exercises':
    $title = "Esami";
    $content = 'exercises.php';
   # code...
   break;
  case 'download':
    $title = "Download";
    $content = 'download.php';
   # code...
   break;
   case 'certificazioni':
     $title = "Certificazioni";
     $content = 'certificazioni.php';
   # code...
   break;
  case 'playvideo':
    $title = "Play Video";
    $content = 'playvideo.php';
   # code...
   break;
  case 'viewpdf':
    $title = "Visualizza ";
    $content = 'viewpdf.php';
   # code...
   break;
  case 'question':
    $title = "Domande";
    $content = 'question.php';
   # code...
   break;
  case 'quizresult':
    $title = "Risultato";
    $content = 'quizresult.php';
   # code...
   break;
   case 'about':
     $title = "About";
     $content = 'about.php';
  default :
    $title = "Home";
    $content    = 'home.php';
}
require_once("navigation/navigations.php");
?>
