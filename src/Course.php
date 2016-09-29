<?php
    class Course
    {
      private $name;
      private $course_number;
      private $id;

      function __construct($name, $course_number, $id = null)
      {
          $this->name = $name;
          $this->course_number = $course_number;
          $this->id = $id;
      }

      function getId()
      {
          return $this->id;
      }

      function getCourseName()
      {
          return $this->name;
      }

      function getCourseNumber()
      {
          return $this->course_number;
      }

      function setCourseName($new_name)
      {
          $this->name = (string) $new_name;
      }

      function setCourseNumber($new_course_number)
      {
          $this->course_number = (string) $new_course_number;
      }
    }
?>
