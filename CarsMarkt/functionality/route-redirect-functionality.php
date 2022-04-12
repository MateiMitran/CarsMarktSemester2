<?php

   if (isset($_SESSION['user'])) {
      if ($page != 'buy-car' && $page != 'buy-car-result' && $page!='create-listing' && $page!='listing' && $page!='own-listing' && $page!='account-preferences') {
          redirect_to('/buy-car');
      }
   }
   else if (!isset($_SESSION['user'])) {
      if (isset($_SESSION['admin'])) {
         if ($page=='login' || $page=='register' || $page=='index' || $page=='account-preferences' || $page=='buy-car-result' || $page=='buy-car' || $page=='create-listing' || $page=='listing' || $page=='own-listing') {
            redirect_to('/admin-home');
        }
      }
      else if (!isset($_SESSION['admin'])) {
         if ($page != 'login' && $page != 'register' && $page != 'index')
         {
            redirect_to('login');
         }
      }
   } 
   
?>
