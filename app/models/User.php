<?php
class User
{
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   // Register user

   public function register($data)
   {
      $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
      // Bind values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);

      // Execute query
      if ($this->db->execute()) {
         return true;
      } else {
         return false;
      }
   }

   // Login user
   public function login($email, $password)
   {
      $this->db->query('SELECT * FROM users WHERE email = :email');
      $this->db->bind(':email', $email);

      $row = $this->db->singleSet();

      $hashed_password = $row->password;
      if (password_verify($password, $hashed_password)) {
         return $row;
      } else {
         return false;
      }
   }
   // Validate User email
   public function findUserEmail($email)
   {
      $this->db->query('SELECT * FROM users WHERE email = :email');
      $this->db->bind(':email', $email);
      $row = $this->db->singleSet();

      // Check row for data
      if ($this->db->rowCount() > 0) {
         return true;
      } else {
         return false;
      }
   }
   // Get User by ID
   public function getUserId($id)
   {
      $this->db->query('SELECT * FROM users WHERE id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->singleSet();

      return $row;
   }
}
