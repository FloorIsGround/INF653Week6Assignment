<?php include("header.php")?>
<!-- Display Courses -->
<?php if (!empty($courses)) : ?>
    <section id="list">
        <header>
            <h1>Course List</h1>
        </header>
        <?php foreach ($courses as $course) : ?>
            <div>
                <div>
                    <p>
                        <?= htmlspecialchars($course['courseName']) ?>
                    </p>
                </div>
                <div>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_course">
                        <input type="hidden" name="course_id" value="<?= $course['courseID']?>">
                        <button onclick="return confirm('Are you sure you want to delete this course')">X</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php else : ?>
    <p>No courses exist yet</p>
<?php endif; ?>

<!-- Add Course Form -->
 <section>
    <h2>Add Courses</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="add_course">
        <div>
            <label>Name:</label>
            <input type="text" name="course_name" maxlength="30" placeholder="Name" required>
        </div>
        <div>
            <button class="add-button bold">Add</button>
        </div>
    </form>
 </section>

 <p><a href=".?action=list_assignments">View/Edit Assignments</a></p>
<?php include("footer.php")?>