<?php require APPROOT . '/views/inc/header.php' ?>
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="las la-backward"></i> Back</a>
<br>

<div class="modal-dialog modal-dialog">
   <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title" id="staticBackdropLabel">Edit Post</h5>
      </div>
      <div class="modal-body">
         <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">

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
               <button type="submit" class="btn btn-success btn-sm"><i class="las la-plus"></i> Post</button>
            </div>
         </form>
      </div>
   </div>
</div>

<?php require APPROOT . '/views/inc/footer.php' ?>