<h1><?php echo $title;?></h1>
<div class="col-lg-12">
	<div class="table-responsive">
		<table id="example" class="table table-bordered">
			<thead>
				<th width="2%">#</th>
				<th>Capitolo</th>
				<th>Titolo</th>
				<th width="10%">Azione</th>
			</thead>
			<tbody>
				<?php

                error_reporting (E_ALL ^ E_NOTICE);

				$sql = "SELECT * FROM tbllesson WHERE click>0";
				$mydb->setQuery($sql);
				$cur = $mydb->loadResultList();
				foreach ($cur as $result) {
					# code...
					echo '<tr>';
					echo '<td></td>';
					echo '<td>'.$result->LessonChapter.'</td>';
					echo '<td>'.$result->LessonTitle.'</td>';
					echo '<td><a href="index.php?q=question&id='.$result->LessonID.'" class="btn btn-xs btn-info">Fai Esame</a></td>';
					echo '</tr>';
				}
				?>
			</tbody>
		</table>
	</div>
</div>
