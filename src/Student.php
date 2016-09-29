<?php
    class Student
    {
      private $name;
      private $date_enrolled;
      private $id;

      function __construct($name, $date_enrolled, $id = null)
      {
        $this->name = $name;
        $this->date_enrolled = $date_enrolled;
        $this->id = $id;
      }

      function getId()
      {
          return $this->id;
      }

      function getStudentName()
      {
          return $this->name;
      }

      function getDateEnrolled()
      {
          return $this->date_enrolled;
      }

      function setStudentName($new_name)
      {
          $this->name = (string) $new_name;
      }

      function setDateEnrolled($new_date_enrolled)
      {
          $this->date_enrolled = (string) $new_date_enrolled;
      }
    }
?>
