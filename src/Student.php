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

      function save()
      {
        $GLOBALS['DB']->exec("INSERT INTO students (name, date_enrolled) VALUES ('{$this->getStudentName()}', '{$this->getDateEnrolled()}');");
        $this->id = $GLOBALS['DB']->lastInsertId();
      }

      static function getAll()
      {
          $returned_students = $GLOBALS['DB']->query("SELECT * FROM students;");
          $students = array();
          foreach($returned_students as $student) {
              $name = $student['name'];
              $date_enrolled = $student['date_enrolled'];
              $id = $student['id'];
              $new_student = new Student($name, $date_enrolled, $id);
              array_push($students, $new_student);
          }
          return $students;
      }

      static function deleteAll()
      {
        $GLOBALS['DB']->exec("DELETE FROM students;");
      }

      static function find($search_id)
      {
          $found_student = null;
          $students = Student::getAll();
          foreach($students as $student) {
              $student_id = $student->getId();
              if ($student_id == $search_id) {
                $found_student = $student;
              }
          }
          return $found_student;
      }

      function update($new_name)
      {
          $GLOBALS['DB']->exec("UPDATE students SET name = '{$new_name}' WHERE id = {$this->getId()};");
          $this->setStudentName($new_name);
      }

      function delete()
      {
          $GLOBALS['DB']->exec("DELETE FROM students WHERE id = {$this->getId()};");
      }
    }
?>
