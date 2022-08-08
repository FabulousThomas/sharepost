<?php
class Posts extends Controller
{

   public function __construct()
   {
      if (!isLoggedIn()) {
         redirect('users/login');
      }

      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');
   }

   public function index()
   {
      $post = $this->postModel->getPosts();
      // Check for Post Request
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         // die('Post is added');
         // Sanitize post input
         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
         $data = [
            'posts' => $post,
            'title' => trim($_POST['title']),
            'body' => trim($_POST['body']),
            'user_id' => $_SESSION['user_id'],
            'title_err' => '',
            'body_err' => '',
         ];
         // Validate title
         if (empty($data['title'])) {
            $data['title_err'] = 'Please, enter title';
         }
         // Validate body
         if (empty($data['body'])) {
            $data['body_err'] = 'Please, enter body';
         }

         // Make sure error is empty
         if (empty($data['title_err']) && empty($data['body_err'])) {
            // SUCCESS
            if ($this->postModel->addPosts($data)) {
               flash('post_msg', 'Post is Successfully Added');
               redirect('posts');
            } else {
               die('Something went wrong');
            }
         } else {
            // Load views with errors
            $this->view('posts/index', $data);
         }
      } else {
         $data = [
            'posts' => $post,
            'title' => '',
            'body' => '',
            'title_err' => '',
            'body_err' => '',
         ];
         $this->view('posts/index', $data);
      }
   }

   // Show Posts
   public function show($id)
   {
      $post = $this->postModel->getPostId($id);
      $user = $this->userModel->getUserId($post->user_id);

      $data = [
         'post' => $post,
         'user' => $user,
         'title' => $post->title,
         'body' => $post->body,
         'title_err' => '',
         'body_err' => '',
      ];
      $this->view('posts/show', $data);
   }

   // Edit Posts
   public function edit($id)
   {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
         $data = [
            'id' => $id,
            'title' => trim($_POST['title']),
            'body' => trim($_POST['body']),
            'user_id' => $_SESSION['user_id'],
            'title_err' => '',
            'body_err' => '',
         ];

         // Validate title
         if (empty($data['title'])) {
            $data['title_err'] = 'Please, enter title';
         }
         // Validate body
         if (empty($data['body'])) {
            $data['body_err'] = 'Please, enter body';
         }

         // Make sure error is empty
         if (empty($data['title_err']) && empty($data['body_err'])) {
            // SUCCESS
            if ($this->postModel->updatePosts($data)) {
               flash('post_msg', 'Post is Successfully Updated');
               redirect('posts');
            } else {
               die('Something went wrong');
            }
         } else {
            // Load views with errors
            $this->view('posts/edit', $data);
         }
      } else {

         // Check for owner and redirect
         $post = $this->postModel->getPostId($id);

         if ($post->user_id != $_SESSION['user_id']) {
            redirect('posts');
         }

         $data = [
            'id' => $id,
            'title' => $post->title,
            'body' => $post->body,
         ];
         $this->view('posts/edit', $data);
      }
   }

   // Delete Posts
   public function delete($id)
   {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
         // Check for owner
         $post = $this->postModel->getPostId($id);
         if($post->user_id != $_SESSION['user_id']) {
            redirect('posts');
         }
         $delete = $this->postModel->deletePosts($id);
         if($delete) {
            flash('post_msg', 'Post is Successfully Deleted');
            redirect('posts');
         } else {
            die('Something went wrong');
         }
      } else {
         redirect('posts');
      }
   }
}
