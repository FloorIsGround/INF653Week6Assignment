<?php
require_once('model/course_db.php');

// Get the course ID from GET parameters.
$course_id = filter_input(INPUT_GET, 'course_id', FILTER_VALIDATE_INT);
if (!$course_id) {
    $error = "Invalid course ID.";
    include('view/error.php');
    exit();
}

// Retrieve the current course details.
$course = get_course($course_id);
if (!$course) {
    $error = "Course not found.";
    include('view/error.php');
    exit();
}
?>

<?php include('view/header.php'); ?>
<h1>Update Course</h1>

<form action="index.php" method="post">
    <!-- Hidden fields to pass the action and course ID -->
    <input type="hidden" name="action" value="update_course">
    <input type="hidden" name="course_id" value="<?= $course['courseID'] ?>">
    
    <label for="course_name">Course Name:</label>
    <input type="text" id="course_name" name="course_name" value="<?= htmlspecialchars($course['courseName']) ?>" required>
    <br><br>
    
    <button type="submit">Update Course</button>
</form>

<p><a href=".?action=list_courses">Back to Course List</a></p>
<?php include('view/footer.php'); ?>