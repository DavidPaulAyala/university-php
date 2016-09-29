<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Student.php";
    require_once 'src/Student.php';
    $server = 'mysql:host=localhost;dbname=university_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StudentTest extends PHPUnit_Framework_TestCase
    {
      protected function tearDown()
      {
        Course::deleteAll();
        Student::deleteAll();
      }

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
          $name = "Pete Holmes";
          $date_enrolled = "09-15-14";
          $test_student = new Student($name, $date_enrolled);

          //Act
          $test_student->setStudentName("Pete Holmes");
          $result = $test_student->getStudentName();

          //Assert
          $this->assertEquals("Pete Holmes", $result);
      }

      function testSetStudentNumber()
      {
          //Arrange
          $name = "Pete Holmes";
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
          $name = "Pete Holmes";
          $date_enrolled = "09-15-14";
          $test_student = new Student($name, $date_enrolled, $id=null);

          //Act
          $result = $test_student->getStudentName();

          //Assert
          $this->assertEquals($name, $result);
      }

      function test_GetDateEnrolled()
      {
          //Arrange
          $name = "Pete Holmes";
          $date_enrolled = "09-15-14";
          $test_student = new Student($name, $date_enrolled, $id=null);

          //Act
          $result = $test_student->getDateEnrolled();

          //Assert
          $this->assertEquals($date_enrolled, $result);
      }

      function test_save()
      {
          //Arrange
          $name = "Pete Holmes";
          $date_enrolled = "09-15-14";
          $test_student = new Student($name, $date_enrolled, $id=null);
          //Act
          $test_student->save();
          //Assert
          $result = Student::getAll();
          $this->assertEquals($test_student, $result[0]);
      }
      function test_getAll()
      {
          //Arrange
          $name = "Pete Holmes";
          $date_enrolled = "09-15-14";
          $test_student = new Student($name, $date_enrolled, $id=null);
          $test_student->save();

          $name2 = "Bill Simmons";
          $date_enrolled2 = "08-20-15";
          $test_student2 = new Student($name2, $date_enrolled2, $id2=null);
          $test_student2->save();

          //Act
          $result = Student::getAll();

          //Assert
          $this->assertEquals([$test_student, $test_student2], $result);
      }

      function testDeleteAll()
      {
          //Arrange
          $name = "Pete Holmes";
          $date_enrolled = "09-15-14";
          $test_student = new Student($name, $date_enrolled, $id=null);
          $test_student->save();

          $name2 = "Bill Simmons";
          $date_enrolled2 = "08-20-15";
          $test_student2 = new Student($name2, $date_enrolled2, $id2=null);
          $test_student2->save();

          //Act
          Student::deleteAll();

          //Assert
          $result = Student::getAll();
          $this->assertEquals([], $result);
      }
    }



?>
