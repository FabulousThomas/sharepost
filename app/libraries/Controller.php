<?php
/*
 * Base Controller
 * Loads the models and views
 */

class Controller
{
   // Load Models files
   public function model($model)
   {
      require_once '../app/models/' . $model . '.php';
      // Instantiate model
      return new $model;
   }

   // Load Views
   public function view($view, $data = [])
   {
      // Checks if view file exists
      if (file_exists('../app/views/' . $view . '.php')) {
         require_once '../app/views/' . $view . '.php';
      } else {
         die('View does not exists');
      }
   }
}
