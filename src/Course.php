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

      function save()
      {
        $GLOBALS['DB']->exec("INSERT INTO courses (name, course) VALUES ('{$this->getCourseName()}', '{$this->getCourseNumber()}');");
        $this->id = $GLOBALS['DB']->lastInsertId();
      }

      static function getAll()
      {
          $returned_courses = $GLOBALS['DB']->query("SELECT * FROM courses;");
          $courses = array();
          foreach($returned_courses as $course) {
              $name = $course['name'];
              $course_number = $course['course'];
              $id = $course['id'];
              $new_course = new Course($name, $course_number, $id);
              array_push($courses, $new_course);
          }
          return $courses;
      }

      static function deleteAll()
      {
        $GLOBALS['DB']->exec("DELETE FROM courses;");
      }

      static function find($search_id)
      {
          $found_course = null;
          $courses = Course::getAll();
          foreach($courses as $course) {
              $course_id = $course->getId();
              if ($course_id == $search_id) {
                $found_course = $course;
              }
          }
          return $found_course;
      }

      function update($new_name)
      {
          $GLOBALS['DB']->exec("UPDATE courses SET name = '{$new_name}' WHERE id = {$this->getId()};");
          $this->setCourseName($new_name);
      }

      function delete()
      {
          $GLOBALS['DB']->exec("DELETE FROM courses WHERE id = {$this->getId()};");
      }

    }
?>
