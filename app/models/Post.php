<?php
class Post extends Controller
{
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   public function getPosts()
   {
      $this->db->query('SELECT *,
                        posts.id as postId,
                        users.id as userId,
                        posts.created_at as postCreated,
                        users.created_at as userCreated
                        FROM posts
                        INNER JOIN users
                        ON posts.user_id = users.id
                        ORDER BY posts.created_at DESC
                        ');
      $result = $this->db->resultSet();
      return $result;
   }

   public function addPosts($data) {
      $this->db->query('INSERT INTO posts (user_id, title, body) VALUES (:user_id, :title, :body)');
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);

      if($this->db->execute()) {
         return true;
      } else {
         return false;
      }
      
   }
}
