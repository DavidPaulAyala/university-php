<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Course.php";
    require_once 'src/Student.php';
    $server = 'mysql:host=localhost;dbname=university_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class CourseTest extends PHPUnit_Framework_TestCase
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

        function testGetCourseName()
        {
            //Arrange
            $name = "History";
            $course_number = "H101";
            $test_course = new Course($name, $course_number, $id=null);

            //Act
            $result = $test_course->getCourseName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function testGetCourseNumber()
        {
            //Arrange
            $name = "History";
            $course_number = "H101";
            $test_course = new Course($name, $course_number, $id=null);

            //Act
            $result = $test_course->getCourseNumber();

            //Assert
            $this->assertEquals($course_number, $result);
        }

        function testSave()
        {
            //Arrange
            $name = "History";
            $course_number = "H101";
            $test_course = new Course($name, $course_number, $id=null);

            //Act
            $test_course->save();

            //Assert
            $result = Course::getAll();
            $this->assertEquals($test_course, $result[0]);
        }

        function testGetAll()
        {
            //Arrange
            $name = "History";
            $course_number = "H101";
            $test_course = new Course($name, $course_number, $id=null);
            $test_course->save();

            $name2 = "Art";
            $course_number2 = "AR201";
            $test_course2 = new Course($name2, $course_number2, $id2=null);
            $test_course2->save();

            //Act
            $result = Course::getAll();

            //Assert
            $this->assertEquals([$test_course, $test_course2], $result);
        }

        function testDeleteAll()
        {
            //Arrange
            $name = "History";
            $course_number = "H101";
            $test_course = new Course($name, $course_number, $id=null);
            $test_course->save();

            $name2 = "Water the lawn";
            $course_number2 = "AR201";
            $test_course2 = new Course($name2, $course_number2, $id2=null);
            $test_course2->save();

            //Act
            Course::deleteAll();

            //Assert
            $result = Course::getAll();
            $this->assertEquals([], $result);
        }
    }



?>
