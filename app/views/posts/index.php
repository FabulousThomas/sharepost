<?php require APPROOT . '/views/inc/header.php' ?>

<div class="row mb-3">
   <div class="col-md-6">
      <h1>Posts</h1>
   </div>
   <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary pull-left">
         <i class="las la-pen"></i> Add Posts
      </a>
   </div>
</div>

<?php foreach ($data['posts'] as $post) : ?>
   <div class="card card-body mb-3">
      <h4 class="card-title"><?php echo $post->title; ?></h4>
   </div>
<?php endforeach; ?>

<?php require APPROOT . '/views/inc/footer.php' ?>