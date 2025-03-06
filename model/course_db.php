<?php
require_once('database.php');

function get_courses(){
    global $db;
    $query = 'SELECT * FROM courses ORDER BY courseID';
    $statement = $db->prepare($query);
    $statement->execute();
    $courses = $statement->fetchAll();
    $statement->closeCursor();
    return $courses;
}

function get_course($course_id) {
    global $db;
    $query = 'SELECT * FROM courses WHERE courseID = :courseID';
    $statement = $db->prepare($query);
    $statement->bindValue(':courseID', $course_id);
    $statement->execute();
    $course = $statement->fetch();
    $statement->closeCursor();
    return $course;
}

function get_course_name($course_id){
    global $db;
    $query = 'SELECT courseName FROM courses WHERE courseID = :course_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':course_id', $course_id);
    $statement->execute();
    $courses = $statement->fetch();
    $statement->closeCursor();
    return $course ? $course['courseName'] : "Unknown Course";
}

function add_course($course_name){
    global $db;
    $query = 'INSERT INTO courses (courseName) VALUES (:course_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':course_name', $course_name);
    $statement->execute();
    $statement->closeCursor();
}

function delete_course($course_ID){
    global $db;
    $query = 'DELETE FROM courses WHERE courseID = :course_ID';
    $statement = $db->prepare($query);
    $statement->bindValue(':course_ID', $course_ID);
    $statement->execute();
    $statement->closeCursor();
}
#update function for courses
function update_course($course_id, $course_name) {
    global $db;
    $query = 'UPDATE courses SET courseName = :courseName WHERE courseID = :courseID';
    $statement = $db->prepare($query);
    $statement->bindValue(':courseName', $course_name);
    $statement->bindValue(':courseID', $course_id);
    $statement->execute();
    $statement->closeCursor();
}