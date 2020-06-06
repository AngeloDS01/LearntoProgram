<style type="text/css">

  .secondrow > .row {

    /*padding: 5px 30px;*/
    text-align: center;
    margin: 10px;


  }

  .imgstretch img {

    height: 27%;
  }


</style>

<div class="container">
  <h3>Pannello Amministratore: Benvenuto <?php echo $_SESSION['NAME'];?></h3>

  <div class="row">
    <div class="col-md-6 secondrow">
      <div class="row">
        <a href="<?php echo web_root; ?>admin/modules/lesson/index.php" title="Lessons">
        <div class="imgstretch">
           <img src="<?php echo web_root; ?>admin/adminMenu/images/lesson1.jpg">
         </div>
         <label>Lezioni</label>
        </a>
      </div>
    </div>
    <div class="col-md-6 secondrow">
      <div class="row">
        <a href="<?php echo web_root; ?>admin/modules/exercises/index.php" title="Exercises">
        <div class="imgstretch">
          <img src="<?php echo web_root; ?>admin/adminMenu/images/exercices.jpg">
         </div>
         <label>Esami</label>
        </a>
      </div>
    </div>
  </div>
    <div class="row">
       <?php if($_SESSION['TYPE']=="Administrator"){ ?>
    <div class="col-md-6 secondrow">
      <div class="row">
        <a href="<?php echo web_root; ?>admin/modules/user/index.php" title="Manage Users">
        <div class="imgstretch">
           <img src="<?php echo web_root; ?>admin/adminMenu/images/user.png">
         </div>
         <label>Manage Users</label>
        </a>
      </div>
    </div>
  <?php } ?>

  </div>

</div>
