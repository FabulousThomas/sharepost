<?php 
function redirect($pages) {
   header('Location: ' . URLROOT . '/' . $pages);
}