<?php 
class User {
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   // Validate User email
   public function findUserEmail($email) {
      $this->db->query('SELECT * FROM users WHERE email = :email');
      $this->db->bind(':email', $email);
      $row = $this->db->singleSet();

      // Check row for data
      if($this->db->rowCount() > 0) {
         return true;
      } else {
         return false;
      }
   }
}