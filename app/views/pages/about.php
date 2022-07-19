<?php require APPROOT . '/views/inc/header.php'; ?>
   <h1 class="display-4"><?php echo $data['title']; ?></h1>
   <p class="lead"><?php echo $data['description']; ?></p>
   <small>Version: <strong><?php echo APPVERSION; ?></strong></small>
<?php require APPROOT . '/views/inc/footer.php'; ?>