<?php require APPROOT . '/views/inc/header.php' ?>
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="las la-backward"></i> Back</a>
<br>
<?php flash('post_msg'); ?>
<h3 class="mt-3"><?php echo $data['post']->title; ?></h3>
<div class="bg-secondary text-white p-2 mb-3">
   Written by <?php echo $data['user']->name; ?> on <?php echo $data['post']->created_at; ?>
</div>
<p><?php echo $data['post']->body; ?></p>

<?php if ($data['post']->user_id == $_SESSION['user_id']) : ?>
   <hr>
   <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-dark btn-sm float-left"><i class="las la-edit"></i></i> Edit</a>

   <form class="float-right d-inline" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id ?>" method="post">
      <button type="submit" class="btn btn-danger btn-sm"><i class="la la-trash" aria-hidden="true"></i> Delete</button>
   </form>

<?php endif; ?>

<?php require APPROOT . '/views/inc/footer.php' ?>