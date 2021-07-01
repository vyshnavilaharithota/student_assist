<?php
include('connection.php');
$sql = "CREATE TABLE IF NOT EXISTS ForeignUniversity (
    name VARCHAR(255) NOT NULL,
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    area VARCHAR(255) NOT NULL,
    picture LONGBLOB NOT NULL,
    phone INT(10) NOT NULL,
    email VARCHAR(50),
    description TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (mysqli_query($conn, $sql)) {
//        echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS ForeignBranch (
    name VARCHAR(255) NOT NULL,
    intake INT(20) NOT NULL,
    collegeid INT(6) UNSIGNED,
    FOREIGN KEY (collegeid) REFERENCES ForeignUniversity(id) on delete cascade,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (mysqli_query($conn, $sql)) {
//        echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS Ambassador (
    name VARCHAR(255) NOT NULL,
    phone BIGINT(30) NOT NULL,
    collegeid INT(6) UNSIGNED,
    FOREIGN KEY (collegeid) REFERENCES ForeignUniversity(id) on delete cascade,
    email VARCHAR(50),
    course VARCHAR(255),
    gpa VARCHAR(5),
    PRIMARY KEY(collegeid,course),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (mysqli_query($conn, $sql)) {
//        echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS LocalUniversity (
    name VARCHAR(255) NOT NULL,
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    area VARCHAR(255) NOT NULL,
    picture LONGBLOB NOT NULL,
    branches VARCHAR(255) NOT NULL, 
    phone INT(10) NOT NULL,
    email VARCHAR(50),
    description TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (mysqli_query($conn, $sql)) {
//        echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS Users (
        branch VARCHAR(255) NOT NULL,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        college VARCHAR(255) NOT NULL,
        collegeid INT(6) UNSIGNED,
        FOREIGN KEY (collegeid) REFERENCES LocalUniversity(id) ON DELETE CASCADE ,
        phone INT(10) NOT NULL,
        score VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        picture LONGBLOB NOT NULL
    )";

if (mysqli_query($conn, $sql)) {
//        echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS LocalBranch (
    name VARCHAR(255) NOT NULL,
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (mysqli_query($conn, $sql)) {
//        echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS foreignuniversitylogin(
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    collegeid INT(6) UNSIGNED,
    FOREIGN KEY (collegeid) REFERENCES ForeignUniversity(id) on delete cascade , 
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (mysqli_query($conn, $sql)) {
    //        echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS chat(
    question text NOT NULL,
    answer text,
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid INT(6) UNSIGNED,
    collegeid INT(6) UNSIGNED,
    course VARCHAR(255) NOT NULL,
    FOREIGN KEY (collegeid,course) REFERENCES ambassador(collegeid,course) on delete cascade , 
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (mysqli_query($conn, $sql)) {
    //        echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>