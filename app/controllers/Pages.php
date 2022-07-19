<?php
class Pages extends Controller
{
   public function __construct()
   {
      // echo 'Pages Loaded';
   }

   public function index()
   {
      $data = [
         'title' => 'SharePosts',
         'description' => 'Simple social network built on the SharePost-MVC PHP framework',
      ];
      $this->view('pages/index', $data);
   }
   public function about()
   {
      $data = [
         'title' => 'About Us',
         'description' => 'This App is built to share posts with other users',
      ];
      $this->view('pages/about', $data);
   }
}
