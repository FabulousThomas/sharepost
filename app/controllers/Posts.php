<?php
class Posts extends Controller
{

   public function __construct()
   {
      if (!isLoggedIn()) {
         redirect('users/login');
      }

      $this->postModel = $this->model('Post');
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

   public function show($id) {
      $post = $this->postModel->getPostId($id);

      $data = [
         'post' => $post,
      ];
      $this->view('posts/show', $data);
   }
}
