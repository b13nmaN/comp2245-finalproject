<?php
// Any helper methods you may need to use across
// pages.

function getStudents() {
    connectDb();
    // query students table
    $students = ['Joel', 'Blenman'];
    // return students
    return $students;
}

function connectDb() {
    // connected to the database
}