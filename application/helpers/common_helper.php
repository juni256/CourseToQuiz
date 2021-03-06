<?php
 if( ! function_exists('jsonPreetify')){
   function jsonPreetify($data){
     return json_encode($data,JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
   }
 }

 if( ! function_exists('jsonReadableHuman')){
    function jsonReadableHuman($json){
      $result      = '';
    $pos         = 0;
    $strLen      = strlen($json);
    $indentStr   = '  ';
    $newLine     = "\n";
    $prevChar    = '';
    $outOfQuotes = true;

    for ($i=0; $i<=$strLen; $i++) {

        // Grab the next character in the string.
        $char = substr($json, $i, 1);

        // Are we inside a quoted string?
        if ($char == '"' && $prevChar != '\\') {
            $outOfQuotes = !$outOfQuotes;

        // If this character is the end of an element,
        // output a new line and indent the next line.
        } else if(($char == '}' || $char == ']') && $outOfQuotes) {
            $result .= $newLine;
            $pos --;
            for ($j=0; $j<$pos; $j++) {
                $result .= $indentStr;
            }
        }

        // Add the character to the result string.
        $result .= $char;

        // If the last character was the beginning of an element,
        // output a new line and indent the next line.
        if (($char == ',' || $char == '{' || $char == '[') && $outOfQuotes) {
            $result .= $newLine;
            if ($char == '{' || $char == '[') {
                $pos ++;
            }

            for ($j = 0; $j < $pos; $j++) {
                $result .= $indentStr;
            }
        }

        $prevChar = $char;
    }

    return $result;
    }
 }

 if( ! function_exists('time_stamp')){
   function time_stamp($session_time)
    {

    $time_difference = time() - $session_time ;
    $seconds = $time_difference ;
    $minutes = round($time_difference / 60 );
    $hours = round($time_difference / 3600 );
    $days = round($time_difference / 86400 );
    $weeks = round($time_difference / 604800 );
    $months = round($time_difference / 2419200 );
    $years = round($time_difference / 29030400 );
    // Seconds
    if($seconds <= 60)
    {
    echo "$seconds seconds ago";
    }
    //Minutes
    else if($minutes <=60)
    {

        if($minutes==1)
       {
        echo "one minute ago";
        }
        else
        {
         echo "$minutes minutes ago";
        }

    }
    //Hours
    else if($hours <=24)
    {

      if($hours==1)
     {
      echo "one hour ago";
     }
     else
     {
      echo "$hours hours ago";
     }

    }
    //Days
    else if($days <= 7)
    {

     if($days==1)
     {
      echo "one day ago";
     }
     else
     {
      echo "$days days ago";
      }

    }
    //Weeks
    else if($weeks <= 4)
    {

      if($weeks==1)
     {
      echo "one week ago";
      }
     else
     {
      echo "$weeks weeks ago";
     }

    }
    //Months
    else if($months <=12)
    {

      if($months==1)
     {
      echo "one month ago";
      }
     else
     {
      echo "$months months ago";
      }

    }
    //Years
    else
    {

      if($years==1)
      {
       echo "one year ago";
      }
      else
     {
       echo "$years years ago";
      }

    }

   }

 }

 if( ! function_exists('getStatusName')){
    function getStatusName($statusId){
      $ci = get_instance();
      $ci->load->model('crud_model');
      return $ci->crud_model->getOneRecord('status',['id' => $statusId])[0]['status_name'];
    }
 }



if( ! function_exists('imageSearch')){
    include APPPATH . "libraries/simplehtmldom/simple_html_dom.php";
 function imageSearch($word){
   $search_keyword=str_replace(' ','+',$word);
   $newhtml =file_get_html("https://www.google.com/search?q=".$search_keyword."&tbm=isch");
   $result_image_source = $newhtml->find('img',0)->src;
   return $result_image_source;
 }
}

if( ! function_exists('getStatusBgClassName')){
    function getStatusBgClassName($statusId){
       if($statusId == 1 || $statusId == 4){
          return "bg-success";
       }elseif($statusId == 3 || $statusId == 6 || $statusId == 0){
          return "bg-danger";
       }elseif($statusId == 5 || $statusId == 2){
          return "bg-warning";
       }
    }
}

if( ! function_exists('isCourseQuizAvailable')){
   function isCourseQuizAvailable($courseId){
     $ci = get_instance();
     $ci->load->model('quiz_model');
     return $ci->quiz_model->isCourseQuizAvailable($courseId);
   }
}

if( ! function_exists('browseCourse')){
   function browseCourse(){
     $ci = get_instance();
     $ci->load->model('report_model');
     return [
       'total_course' => $ci->report_model->total_course(),
       'total_quiz'   => $ci->report_model->total_quiz()
     ];
   }
}

if( ! function_exists('getNoOfQuizInsideCategory')){
   function getNoOfQuizInsideCategory($categoryId){
     $ci = get_instance();
     $ci->load->model('report_model');
     return $ci->report_model->getNoOfQuizInsideCategory($categoryId);
   }
}

if( ! function_exists('getNoOfCourseInsideCategory')){
   function getNoOfCourseInsideCategory($categoryId){
     $ci = get_instance();
     $ci->load->model('report_model');
     return $ci->report_model->getNoOfCourseInsideCategory($categoryId);
   }
}

if( ! function_exists('courseSubscribers')){
  function courseSubscribers($courseName){
    $ci = get_instance();
    $ci->load->model('report_model');
    return $ci->quiz_model->courseSubscribers($courseName);
  }
}

 ?>
