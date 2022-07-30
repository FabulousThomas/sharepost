<?php require APPROOT . '/views/inc/header.php' ?>

<div class="row mb-3">
   <div class="col-md-6">
      <h1>Posts</h1>
   </div>
   <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/posts" type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
         <i class="las la-pen"></i> Add Posts
      </a>
   </div>
</div>

<?php flash('post_msg'); ?>

<?php foreach ($data['posts'] as $post) : ?>
   <div class="card card-body mb-3">
      <h4 class="card-title"><?php echo $post->title; ?></h4>
      <div class="bg-light p-2 mb-3">
         Writen by <?php echo $post->name ?> on <?php echo $post->postCreated ?>
      </div>
      <p class="card-text"><?php echo $post->body; ?></p>
      <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-dark">Read More</a>
   </div>
<?php endforeach; ?>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Add Post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
         </div>
         <div class="modal-body">
            <form action="<?php echo URLROOT; ?>/posts" method="POST" enctype="multipart/form-data">

               <div class="form-group mb-2">
                  <label for="title">Title:</label>
                  <input type="text" name="title" class="form-control <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" placeholder="Post Title" value="<?php echo $data['title']; ?>">
                  <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
               </div>

               <div class="form-group mb-2">
                  <label for="body">Content:</label>
                  <textarea name="body" class="form-control <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" placeholder="Post Content"><?php echo $data['body']; ?></textarea>
                  <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
               </div>

               <div class="modal-footer border-0">
                  <button type="submit" class="btn btn-success btn-sm">Add Post</button>
                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
               </div>
            </form>
         </div>

      </div>
   </div>
</div>

<?php require APPROOT . '/views/inc/footer.php' ?>