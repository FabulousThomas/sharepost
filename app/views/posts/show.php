<?php require APPROOT . '/views/inc/header.php' ?>
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="las la-backward"></i> Back</a>
<br>
<h3 class="mt-3"><?php echo $data['post']->title; ?></h3>
<?php require APPROOT . '/views/inc/footer.php' ?>