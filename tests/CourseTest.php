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

        function testFindCourses()
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
            $result = Course::find($test_course->getId());

            //Assert
            $this->assertEquals($test_course, $result);

        }

        function testUpdate()
        {
            //Arrange
            $name = "History";
            $course_number = "H101";
            $test_course = new Course($name, $course_number, $id=null);
            $test_course->save();

            $new_name = "Math";

            //Act
            $test_course->update($new_name);

            //Assert
            $this->assertEquals ("Math", $test_course->getCourseName());

        }

        function testDeleteCourse()
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

            $test_course->delete();

            //Assert

            $this->assertEquals([$test_course2], Course::getAll());

        }

        function testAddStudent()
        {
            //Arrange
            $name = "Pete Holmes";
            $date_enrolled = "09-15-14";
            $test_student = new Course($name, $date_enrolled, $id=null);
            $test_student->save();

            $name = "History";
            $course_number = "H101";
            $test_course = new Student($name, $course_number, $id=null);
            $test_course->save();

            //Act
            $test_student->addStudent($test_course);

            //Assert
            $this->assertEquals($test_student->getStudents(), [$test_course]);
        }

        function testGetStudents()
        {
            //Arrange
            $name = "History";
            $course_number = "H101";
            $id = 1;
            $test_course = new Course($name, $course_number, $id);
            $test_course->save();

            $name = "Pete Holmes";
            $date_enrolled = "09-15-14";
            $id2 = 2;
            $test_student = new Student($name, $date_enrolled, $id2);
            $test_student->save();

            $name = "Billy West";
            $date_enrolled = "09-15-14";
            $id3 = 3;
            $test_student2 = new Student($name, $date_enrolled, $id3);
            $test_student2->save();

            //Act
            $test_course->addStudent($test_student);
            $test_course->addStudent($test_student2);

            //Assert
            $this->assertEquals($test_course->getStudents(), [$test_student, $test_student2]);
        }
    }

?>
