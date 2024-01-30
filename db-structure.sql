CREATE DATABASE IF NOT EXISTS `school`;

USE `school`;

-- TEACHERS TABLE
CREATE TABLE IF NOT EXISTS `teachers` (
            id INT                    PRIMARY KEY,
    first_name VARCHAR(50)  NOT NULL,
     last_name VARCHAR(50)  NOT NULL,
         email VARCHAR(100) NOT NULL
);

-- SUBJECTS TABLE
CREATE TABLE IF NOT EXISTS `subjects` (
      id INT                   PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);


-- CLASSES TABLE
CREATE TABLE IF NOT EXISTS `classes` (
            id INT                   PRIMARY KEY,
          name VARCHAR(50) NOT NULL,
    teacher_id INT,
    subject_id INT,

    FOREIGN KEY (teacher_id) REFERENCES teachers(id),
    FOREIGN KEY (subject_id) REFERENCES subjects(id)
);

-- STUDENTS TABLE
CREATE TABLE IF NOT EXISTS `students` (
            id INT                    PRIMARY KEY,
    first_name VARCHAR(50)  NOT NULL,
     last_name VARCHAR(50)  NOT NULL,
           dob DATE         NOT NULL,
         email VARCHAR(100) NOT NULL,
      class_id INT,

    FOREIGN KEY (class_id) REFERENCES classes(id)
);
