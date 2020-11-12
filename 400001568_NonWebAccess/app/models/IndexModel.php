<?php 

class IndexModel extends Model
{
	use MyTrait;

	public function makeConnection():void
	{
		$dbconnect = new MyDatabase();
		$this->databaseConnection = $dbconnect->createConnection();
	}
	public function findAll(): array
	{
		$stmt = $this->databaseConnection->prepare("SELECT * FROM courses");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
	}

	public function findRecord(string $id):array
	{
		return array();
	}

	public function findMostPopular():array
	{
		$sql = "SELECT courses.course_name, courses.course_description, courses.course_image, instructors.instructor_name 
				FROM courses 
				INNER JOIN course_instructor ON courses.course_id = course_instructor.course_id 
				INNER JOIN instructors ON course_instructor.instructor_id = instructors.instructor_id 
				ORDER BY courses.course_access_count DESC
				LIMIT 8";
		$stmt = $this->databaseConnection->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
	}

	public function findRecommended():array
	{
		$sql = "SELECT courses.course_name, courses.course_description, courses.course_image, instructors.instructor_name 
				FROM courses 
				INNER JOIN course_instructor ON courses.course_id = course_instructor.course_id 
				INNER JOIN instructors ON course_instructor.instructor_id = instructors.instructor_id 
				ORDER BY courses.course_recommendation_count DESC
				LIMIT 8";
		$stmt = $this->databaseConnection->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
	}

	public function findCourses():array
	{
		$sql = "SELECT courses.course_name, faculty_department.faculty_dept_name, courses.course_image, instructors.instructor_name 
				FROM faculty_department, courses 
                INNER JOIN faculty_dept_courses ON courses.course_id = faculty_dept_courses.course_id
				INNER JOIN course_instructor ON courses.course_id = course_instructor.course_id 
				INNER JOIN instructors ON course_instructor.instructor_id = instructors.instructor_id
				ORDER BY courses.course_access_count DESC
				LIMIT 21";
		$stmt = $this->databaseConnection->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
	}
	
}

?>