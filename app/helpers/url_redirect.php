<?php

// Url redirect
function redirect($pages)
{
   header('Location: ' . URLROOT . '/' . $pages);
}
