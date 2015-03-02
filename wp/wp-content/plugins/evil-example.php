<?php
   /*
   Plugin Name: Bad Example
   Plugin URI: http://wordpress.org/#
   Description: Showing what NOT to do.
   Author: Everett's Twin from an Evil Parallel Universe
   Version: 0.666
   Author URI: http://goo.gl/us9i
   */
   // Worst plugin ever
   //header('Content-type: text/plain');
   //print " -------- I think I'm getting a clue!";
   function safePrint()
   {
      return "-------- I think I'm getting a clue!";
   }

   add_action('admin-notices', 'safePrint');

   /* End of File */