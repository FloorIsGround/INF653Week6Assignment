<?php
require_once('model/assignment_db.php');
require_once('model/course_db.php');

// Get the assignment ID from the query string
$assignment_id = filter_input(INPUT_GET, 'assignment_id', FILTER_VALIDATE_INT);
if (!$assignment_id) {
    $error = "Invalid assignment ID.";
    include('view/error.php');
    exit();
}

// Fetch the current assignment details
$assignment = get_assignment($assignment_id);
if (!$assignment) {
    $error = "Assignment not found.";
    include('view/error.php');
    exit();
}

// Fetch the list of courses for the dropdown
$courses = get_courses();
?>

<?php include('view/header.php'); ?>
<h1>Update Assignment</h1>

<form action="index.php" method="post">
    <!-- Hidden field to trigger update_assignment in index.php -->
    <input type="hidden" name="action" value="update_assignment">
    <input type="hidden" name="assignment_id" value="<?= $assignment['ID'] ?>">

    <label for="description">Description:</label>
    <input type="text" id="description" name="description"
           value="<?= htmlspecialchars($assignment['Description']) ?>" required>
    <br><br>

    <label for="course_id">Course:</label>
    <select name="course_id" id="course_id" required>
        <option value="">Select a Course</option>
        <?php foreach ($courses as $course) : ?>
            <option value="<?= $course['courseID'] ?>"
                <?= ($assignment['courseID'] == $course['courseID']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($course['courseName']) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <button type="submit">Update Assignment</button>
</form>

<p><a href=".?action=list_assignments">Cancel</a></p>

<?php include('view/footer.php'); ?>