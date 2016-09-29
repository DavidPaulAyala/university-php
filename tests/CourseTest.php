<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Course.php";
    require_once 'src/Student.php';
    $server = 'mysql:host=localhost:8889;dbname=university_test';
    $username = 'root';
    $password = 'root';

    class CourseTest extends PHPUnit_Framework_TestCase
    {
        function testGetId()
        {
            //Arrange
            $id = 1;
            $name = "History";
            $course_number = "H101";
            $test_course = new Course($name, $course_number, $id);

            //Act
            $result = $test_course->getId();

            //Assert
            $this->assertEquals(1, $result);
        }

        function testSetCourseName()
        {
            //Arrange
            $name = "History";
            $course_number = "H101";
            $test_course = new Course($name, $course_number);

            //Act
            $test_course->setCourseName("History");
            $result = $test_course->getCourseName();

            //Assert
            $this->assertEquals("History", $result);
        }

        function testSetCourseNumber()
        {
            //Arrange
            $name = "History";
            $course_number = "H101";
            $test_course = new Course($name, $course_number);

            //Act
            $test_course->setCourseNumber("H101");
            $result = $test_course->getCourseNumber();

            //Assert
            $this->assertEquals("H101", $result);
        }

        function test_GetCourseName()
        {
            //Arrange
            $id = 1;
            $name = "History";
            $course_number = "H101";
            $test_course = new Course($name, $course_number, $id);

            //Act
            $result = $test_course->getCourseName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_GetCourseNumber()
        {
            //Arrange
            $id = 1;
            $name = "History";
            $course_number = "H101";
            $test_course = new Course($name, $course_number, $id);

            //Act
            $result = $test_course->getCourseNumber();

            //Assert
            $this->assertEquals($course_number, $result);
        }
    }



?>
