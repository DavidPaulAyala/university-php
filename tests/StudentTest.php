<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Student.php";
    require_once 'src/Student.php';
    $server = 'mysql:host=localhost:8889;dbname=university_test';
    $username = 'root';
    $password = 'root';

    class StudentTest extends PHPUnit_Framework_TestCase
    {
      function testGetId()
      {
          //Arrange
          $id = 1;
          $name = "Pete Holmes";
          $date_enrolled = "09-15-14";
          $test_student = new Student($name, $date_enrolled, $id);

          //Act
          $result = $test_student->getId();

          //Assert
          $this->assertEquals(1, $result);
      }

      function testSetStudentName()
      {
          //Arrange
          $name = "History";
          $date_enrolled = "09-15-14";
          $test_student = new Student($name, $date_enrolled);

          //Act
          $test_student->setStudentName("History");
          $result = $test_student->getStudentName();

          //Assert
          $this->assertEquals("History", $result);
      }

      function testSetStudentNumber()
      {
          //Arrange
          $name = "History";
          $date_enrolled = "09-15-14";
          $test_student = new Student($name, $date_enrolled);

          //Act
          $test_student->setDateEnrolled("09-15-14");
          $result = $test_student->getDateEnrolled();

          //Assert
          $this->assertEquals("09-15-14", $result);
      }

      function test_GetStudentName()
      {
          //Arrange
          $id = 1;
          $name = "History";
          $date_enrolled = "09-15-14";
          $test_student = new Student($name, $date_enrolled, $id);

          //Act
          $result = $test_student->getStudentName();

          //Assert
          $this->assertEquals($name, $result);
      }

      function test_GetDateEnrolled()
      {
          //Arrange
          $id = 1;
          $name = "History";
          $date_enrolled = "09-15-14";
          $test_student = new Student($name, $date_enrolled, $id);

          //Act
          $result = $test_student->getDateEnrolled();

          //Assert
          $this->assertEquals($date_enrolled, $result);
      }
    }



?>
