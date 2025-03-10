<?php include("header.php")?>
<section>
    <h2>Assignments</h2>
    <form action="." method="get">
        <select name="course_id">
            <option value="0">View All</option>
            <?php foreach ($courses as $course) : ?>
                <option value="<?= $course['courseID']?>"<?=$course_id == $course['courseID'] ? 'selected': '' ?>>
                    <?= htmlspecialchars($course['courseName']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Go</button>
    </form>
    <?php if(!empty($assignments)) : ?>
        <?php foreach ($assignments as $assignment) :?>
            <div>
                <p><strong><?= htmlspecialchars($assignment['courseName']) ?></strong></p>
                <p><?= htmlspecialchars($assignment['Description']) ?></p>

                <!-- Update link that sends the assignment id to update_assignment.php -->
                <p><a href="update_assignment.php?assignment_id=<?= $assignment['ID'] ?>">Update</a></p>

                <form action="." method="post">
                    <input type="hidden" name ="action" value="delete_assignment">
                    <input type="hidden" name ="assignment_id" value="<?= $assignment['ID'] ?>">
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this assignment?')">X</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>No assignments exist <?= $course_id ? 'for this course': ''?> yet.</p>
    <?php endif; ?>
</section>
<section>
    <h2>Add Assignment</h2>
    <form action="." method="post">
        <select name="course_id" required>
            <option value="">Please Select</option>
            <?php foreach ($courses as $course) : ?>
                <option value="<?= $course['courseID'] ?>">
                    <?=htmlspecialchars($course['courseName']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="description" maxlength="120" placeholder="Description" required>
        <button type="submit" name="action" value="add_assignment">Add</button>
    </form>
</section>
<p><a href=".?action=list_courses">View/Edit Courses</a></p>
<?php include("footer.php")?>
