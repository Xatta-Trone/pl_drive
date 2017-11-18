<?php
    /**
    * Format Class
    */
    class Format{
     public function formatDate($date){
      return date('F j, Y, g:i a', strtotime($date));
     }

     public function textShorten($text, $limit = 400){
      $text = $text. " ";
      $text = substr($text, 0, $limit);
      $text = substr($text, 0, strrpos($text, ' '));
      $text = $text.".....";
      return $text;
     }

     public function validation($data){
      $data = trim($data);
      $data = stripcslashes($data);
      $data = htmlspecialchars($data);
      return $data;
     }

     public function title(){
      $path = $_SERVER['SCRIPT_FILENAME'];
      $title = basename($path, '.php');
      //$title = str_replace('_', ' ', $title);
      if ($title == 'index') {
       $title = 'home';
      }elseif ($title == 'contact') {
       $title = 'contact';
      }
      return $title = ucfirst($title);
     }

     public function Activity($activityId){
      /*Activity params
        view 1
        download 2
        like 3
        dislike 4
        love 5
        download 
        system admin upload 6
        search 7 */

        switch ($activityId) {
          case '1':
            # code...
          $activity = "Viewed";
          return $activity;
            break;
          case '2':
            # code...
          $activity = "downloaded";
          return $activity;
            break;
          case '3':
            # code...
          $activity = "Liked";
          return $activity;
            break;
          case '4':
            # code...
          $activity = "Unliked";
          return $activity;
            break;
          case '5':
            # code...
          $activity = "Loved";
          return $activity;
            break;
          case '6':
            # code...
          $activity = "Uploaded";
          return $activity;
            break;
          case '7':
            # code...
          $activity = "Searched for";
          return $activity;
            break;
          default:
            $activity = "Unknown";
            return $activity;
            break;

          //return $activity;
     }
   }



}//end of class
    ?>