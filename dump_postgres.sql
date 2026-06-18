-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 12:08 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19


BEGIN;








--
-- Database: "courseonline"
--



-- --------------------------------------------------------

--
-- Table structure for table "admins"
--

CREATE TABLE "admins" (
  "id" BIGSERIAL PRIMARY KEY,
  "fullname" varchar(255)  NOT NULL,
  "email" varchar(255)  NOT NULL,
  "password" varchar(255)  DEFAULT NULL,
  "phone" varchar(255)  NOT NULL,
  "role" varchar(255)  NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL
);

--
-- Dumping data for table "admins"
--

INSERT INTO "admins" ("id", "fullname", "email", "password", "phone", "role", "created_at", "updated_at") VALUES
(3, 'Tran Nguyen Khang', 'admin@gmail.com', '$2y$10$j4PWgcwLImSBYggU6mTh3.6cW2Bcn3tJa6FlNg4CEpfeehTNl.7Bq', '0839243436', 'Admin', '2021-05-14 20:43:16', '2021-05-21 23:38:56'),
(5, 'Vo Trung Nguyen', 'manager1@gmail.com', '$2y$10$j4PWgcwLImSBYggU6mTh3.6cW2Bcn3tJa6FlNg4CEpfeehTNl.7Bq', '0915897375', 'Manager', '2021-05-15 00:06:26', '2021-05-21 23:48:16'),
(7, 'Ly Thanh Duc', 'manager2@gmail.com', '$2y$10$j4PWgcwLImSBYggU6mTh3.6cW2Bcn3tJa6FlNg4CEpfeehTNl.7Bq', '0916510664', 'Manager', '2021-05-15 02:03:36', '2021-05-15 02:03:36'),
(8, 'Pham Bao Khang', 'manager3@gmail.com', '$2y$10$j4PWgcwLImSBYggU6mTh3.6cW2Bcn3tJa6FlNg4CEpfeehTNl.7Bq', '0915897375', 'Manager', '2021-05-19 07:54:33', '2021-05-19 07:54:33');

-- --------------------------------------------------------

--
-- Table structure for table "class_rooms"
--

CREATE TABLE "class_rooms" (
  "id" BIGSERIAL PRIMARY KEY,
  "course_id" bigint NOT NULL,
  "schedule" varchar(255)  NOT NULL,
  "start" date NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL
);

--
-- Dumping data for table "class_rooms"
--

INSERT INTO "class_rooms" ("id", "course_id", "schedule", "start", "created_at", "updated_at") VALUES
(1, 10, 'Evening 3-5-7', '2021-03-06', '2021-05-15 06:04:25', '2021-05-15 06:12:54'),
(3, 3, 'Evening 2-4-6', '2021-03-06', '2021-05-15 06:05:22', '2021-05-15 06:05:22'),
(4, 4, 'Evening 3-5-7', '2021-03-06', '2021-05-15 06:05:43', '2021-05-15 06:05:43'),
(5, 2, 'Evening 2-4-6', '2021-03-08', '2021-05-15 06:05:58', '2021-05-15 06:05:58'),
(6, 3, 'Afternoon 2-4-6', '2021-07-07', '2021-05-19 07:42:45', '2021-05-21 02:29:51'),
(7, 2, 'Morning 2-4-6', '2021-05-06', '2021-05-22 23:10:25', '2021-05-22 23:10:25'),
(8, 1, 'Evening 3-5-7', '2021-05-28', '2021-05-25 22:02:54', '2021-05-25 22:02:54');

-- --------------------------------------------------------

--
-- Table structure for table "class_user"
--

CREATE TABLE "class_user" (
  "id" BIGSERIAL PRIMARY KEY,
  "user_id" bigint NOT NULL,
  "class_id" bigint NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL
);

--
-- Dumping data for table "class_user"
--

INSERT INTO "class_user" ("id", "user_id", "class_id", "created_at", "updated_at") VALUES
(3, 6, 1, NULL, NULL),
(4, 6, 5, NULL, NULL),
(5, 6, 4, NULL, NULL),
(7, 8, 3, NULL, NULL),
(8, 8, 1, NULL, NULL),
(10, 8, 8, NULL, NULL),
(11, 10, 8, NULL, NULL),
(12, 6, 8, NULL, NULL),
(14, 10, 5, NULL, NULL),
(15, 10, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table "courses"
--

CREATE TABLE "courses" (
  "id" BIGSERIAL PRIMARY KEY,
  "admin_id" bigint NOT NULL,
  "name" varchar(255)  NOT NULL,
  "total_time" integer NOT NULL,
  "url_image" varchar(255)  NOT NULL,
  "price" bigint NOT NULL,
  "description" text  NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL
);

--
-- Dumping data for table "courses"
--

INSERT INTO "courses" ("id", "admin_id", "name", "total_time", "url_image", "price", "description", "created_at", "updated_at") VALUES
(1, 5, 'Java Core Programming', 5, 'uploads/image_course/1621954769.jpg', 399, 'This Core Java Specialization is part of a series of programming specializations, derived from LearnQuest''s private Java Bootcamps, designed to provide the skill set necessary to be hired as an IT developer using Java in many corporate environments.

To be successful in this specialization, we recommend you have an understanding of the fundamentals of software development in any language. LearnQuest offers a beginning programmer specialization that can help you prepare.

In the four courses of this specialization, you’ll quickly master the Java programming language and the packages that constitute its rich set of core libraries. We’ll provide hands-on exercises so you can practice your new skills. 

 In Course 1, we’ll introduce you to the basic fundamentals of the Java language. 

Course 2 provides a refresher on object-oriented programming, and how you can apply OO to Java. We’ll introduce Java classes, instances and packaging.

By the time you get to course 3, you’ll be ready to go deeper into applying OOP concepts in Java, including inheritance and polymorphism.

In course 4 you’ll learn how to use selected parts of the Java SE Class LIbrary, including Generics, Collections, Java Streams, I/O, Exceptions, Annotations and Enums.

While we''ll touch on other important Java topics, such as database connectivity, Java EE and Spring, those topics are covered in greater detail in other LearnQuest Java Specializations.', '2021-05-25 07:59:29', '2021-05-25 07:59:29'),
(2, 5, 'IOS – Swift Programming', 5, 'uploads/image_course/1621074992.jpg', 349, 'The iOS Programming course equips you with the knowledge and skills to become a professional programmer on the basis of Apple devices such as iPhone, iPad, iWatch, Macbook... software companies today.', '2021-05-15 03:36:32', '2021-05-17 23:49:03'),
(3, 5, 'Android -Kotlin Programming', 5, 'uploads/image_course/1621075040.jpg', 299, 'The Android Programming course equips you with knowledge, skills in programming languages, how to build applications, and working methods to help you become a professional Android Developer ready to work at software companies. ', '2021-05-15 03:37:20', '2021-05-17 23:49:17'),
(4, 5, 'Software Testing', 4, 'uploads/image_course/1621075269.jpg', 299, 'Professional Software Testing course aims to help students approach software testing quickly and effectively. The course will not only help you get a job but also develop a good career later.', '2021-05-15 03:41:09', '2021-05-17 23:49:25'),
(10, 5, 'New Front-End Programming', 4, 'uploads/image_course/1621079723.png', 399, 'Front end Programming course aims to train professional Front end programmers, meeting the work needs of today''s software companies. Front end programmers are people who use languages ​​such as HTML, CSS, and JavaScript to create Web application interfaces that meet the increasing requirements of user interaction.', '2021-05-15 03:02:40', '2021-05-19 07:34:42');

-- --------------------------------------------------------

--
-- Table structure for table "exams"
--

CREATE TABLE "exams" (
  "id" BIGSERIAL PRIMARY KEY,
  "course_id" bigint NOT NULL,
  "name" varchar(255)  NOT NULL,
  "total_time" integer NOT NULL,
  "status" varchar(255)  DEFAULT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL
);

--
-- Dumping data for table "exams"
--

INSERT INTO "exams" ("id", "course_id", "name", "total_time", "status", "created_at", "updated_at") VALUES
(1, 10, 'Mid-term test', 2, 'Lock', '2021-05-17 23:48:44', '2021-05-26 01:57:34'),
(2, 10, 'Final exam test', 20, 'Lock', '2021-05-17 23:48:44', '2021-05-20 21:21:21'),
(3, 2, 'Mid-term test', 20, 'Lock', '2021-05-17 23:49:03', '2021-05-26 01:57:44'),
(4, 2, 'Final exam test', 20, 'Lock', '2021-05-17 23:49:03', '2021-05-20 21:57:02'),
(5, 3, 'Mid-term test', 20, 'Lock', '2021-05-17 23:49:17', '2021-05-26 01:57:36'),
(6, 3, 'Final exam test', 20, 'Lock', '2021-05-17 23:49:17', '2021-05-20 21:52:39'),
(7, 4, 'Mid-term test', 20, 'Lock', '2021-05-17 23:49:25', '2021-05-26 01:57:39'),
(8, 4, 'Final exam test', 20, 'Lock', '2021-05-17 23:49:25', '2021-05-20 21:52:43'),
(13, 1, 'Mid-term test', 20, 'UnLock', '2021-05-25 07:59:29', '2021-05-26 01:57:54'),
(14, 1, 'Final exam test', 20, 'Lock', '2021-05-25 07:59:29', '2021-05-26 00:26:21');

-- --------------------------------------------------------

--
-- Table structure for table "failed_jobs"
--

CREATE TABLE "failed_jobs" (
  "id" BIGSERIAL PRIMARY KEY,
  "connection" text  NOT NULL,
  "queue" text  NOT NULL,
  "payload" text  NOT NULL,
  "exception" text  NOT NULL,
  "failed_at" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- --------------------------------------------------------

--
-- Table structure for table "lessons"
--

CREATE TABLE "lessons" (
  "id" BIGSERIAL PRIMARY KEY,
  "course_id" bigint NOT NULL,
  "title" varchar(255)  NOT NULL,
  "description" varchar(255)  NOT NULL,
  "link_video" text  NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL
);

--
-- Dumping data for table "lessons"
--

INSERT INTO "lessons" ("id", "course_id", "title", "description", "link_video", "created_at", "updated_at") VALUES
(3, 1, 'Java Tutorial For Beginners 1 - Introduction and Installing the java (JDK) Step by Step Tutorial', 'Introduction and Installing the java (JDK) Step by Step Tutorial', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/r59xYe3Vyks?list=PLS1QulWo1RIbfTjQvTdj8Y6yyq4R7g-Al\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-05-25 21:57:29', '2021-05-25 21:57:29'),
(4, 1, 'Java Tutorial For Beginners 2 - Installing Eclipse IDE and Setting up Eclipse', 'Installing Eclipse IDE and Setting up Eclipse', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/gzlhm0jco0g?list=PLS1QulWo1RIbfTjQvTdj8Y6yyq4R7g-Al\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-05-25 21:58:02', '2021-05-25 21:58:02'),
(5, 1, 'Java Tutorial For Beginners 3 - Creating First Java Project in Eclipse IDE', 'Creating First Java Project in Eclipse IDE', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/U8wrZRYAnmI?list=PLS1QulWo1RIbfTjQvTdj8Y6yyq4R7g-Al\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-05-25 21:58:28', '2021-05-25 21:58:28'),
(6, 1, 'Java Tutorial For Beginners 4 - Variables and Types in Java', 'Variables and Types in Java', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/4ekASokneGU?list=PLS1QulWo1RIbfTjQvTdj8Y6yyq4R7g-Al\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-05-25 21:58:50', '2021-05-25 21:58:50'),
(7, 1, 'Java Tutorial For Beginners 5 - Getting User Input using Java', 'Getting User Input using Java', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/qgMH6jOOFOE?list=PLS1QulWo1RIbfTjQvTdj8Y6yyq4R7g-Al\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-05-25 21:59:10', '2021-05-25 21:59:10'),
(8, 1, 'Java Tutorial For Beginners 6 - Math and Arithmetic Operators in Java', 'Math and Arithmetic Operators in Java', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/ss7BtLrbxp4?list=PLS1QulWo1RIbfTjQvTdj8Y6yyq4R7g-Al\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-05-25 21:59:34', '2021-05-25 21:59:34'),
(9, 1, 'Java Tutorial For Beginners 7 - Increment Operator and Assignment Operator', 'Increment Operator and Assignment Operator', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/f5YdkIzNmfM?list=PLS1QulWo1RIbfTjQvTdj8Y6yyq4R7g-Al\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-05-25 21:59:54', '2021-05-25 21:59:54'),
(10, 1, 'Java Tutorial For Beginners 8 - IF ... ELSE Statements and Relational Operators', 'IF ... ELSE Statements and Relational Operators', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/WZXq5_9_JDs?list=PLS1QulWo1RIbfTjQvTdj8Y6yyq4R7g-Al\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-05-25 22:00:23', '2021-05-25 22:00:23');

-- --------------------------------------------------------

--
-- Table structure for table "migrations"
--

CREATE TABLE "migrations" (
  "id" SERIAL PRIMARY KEY,
  "migration" varchar(255)  NOT NULL,
  "batch" integer NOT NULL
);

--
-- Dumping data for table "migrations"
--

INSERT INTO "migrations" ("id", "migration", "batch") VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_14_014930_create_admins_table', 2),
(5, '2021_05_14_043325_create_courses_table', 3),
(6, '2021_05_14_043407_create_exams_table', 3),
(7, '2021_05_14_043806_create_scores_table', 3),
(8, '2021_05_14_043934_create_questions_table', 3),
(9, '2021_05_14_044019_create_question_choices_table', 3),
(10, '2021_05_14_044103_create_course_user_table', 3),
(11, '2021_05_14_151804_create_class_rooms_table', 4),
(12, '2021_05_14_154043_create_class_user_table', 4),
(13, '2021_05_17_074250_create_note_privates_table', 5),
(14, '2021_05_17_074259_create_note_generals_table', 5),
(15, '2021_05_17_162953_create_questions_table', 6),
(16, '2021_05_20_060754_create_lessons_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table "note_generals"
--

CREATE TABLE "note_generals" (
  "id" BIGSERIAL PRIMARY KEY,
  "class_id" bigint NOT NULL,
  "admin_id" bigint NOT NULL,
  "title" varchar(255)  NOT NULL,
  "content" text  NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL
);

--
-- Dumping data for table "note_generals"
--

INSERT INTO "note_generals" ("id", "class_id", "admin_id", "title", "content", "created_at", "updated_at") VALUES
(3, 8, 5, 'Learn to prepare for the test next week', 'Learn to prepare for the test next week
Chapter1-5', '2021-05-17 05:35:42', '2021-05-25 23:53:51'),
(4, 5, 5, 'Learn to prepare for the test next month', 'Chapter 1-6', '2021-05-19 07:29:13', '2021-05-26 00:01:28');

-- --------------------------------------------------------

--
-- Table structure for table "note_privates"
--

CREATE TABLE "note_privates" (
  "id" BIGSERIAL PRIMARY KEY,
  "user_id" bigint NOT NULL,
  "admin_id" bigint NOT NULL,
  "title" varchar(255)  NOT NULL,
  "content" text  NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL
);

--
-- Dumping data for table "note_privates"
--

INSERT INTO "note_privates" ("id", "user_id", "admin_id", "title", "content", "created_at", "updated_at") VALUES
(1, 6, 5, 'Your result of final exam', 'Well done! You passed the final exam with the mark of 8.7', '2021-05-17 02:23:17', '2021-05-25 23:59:58'),
(2, 8, 5, 'Your result of final exam', 'Well done! You passed the final exam with the mark of 8.7', '2021-05-19 07:29:40', '2021-05-26 00:01:52'),
(3, 10, 5, 'Your result of final exam', 'Well done! You passed the final exam with the mark of 8.7', '2021-05-19 07:30:45', '2021-05-26 00:01:56');

-- --------------------------------------------------------

--
-- Table structure for table "password_resets"
--

CREATE TABLE "password_resets" (
  "email" varchar(255)  NOT NULL,
  "token" varchar(255)  NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL
);

--
-- Dumping data for table "password_resets"
--

INSERT INTO "password_resets" ("email", "token", "created_at") VALUES
('hvd.03.12.99@gmail.com', '$2y$10$mjKFsWM.l8PZJyL5Vjy0PeCrumtRdphQWtAo05bQgqiNXOOx5d92K', '2021-05-21 22:25:18');

-- --------------------------------------------------------

--
-- Table structure for table "questions"
--

CREATE TABLE "questions" (
  "id" BIGSERIAL PRIMARY KEY,
  "exam_id" bigint NOT NULL,
  "name" text  NOT NULL,
  "answer_1" text  NOT NULL,
  "answer_2" text  NOT NULL,
  "answer_3" text  NOT NULL,
  "answer_4" text  NOT NULL,
  "answer_right" text  NOT NULL,
  "level" varchar(255)  NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL
);

--
-- Dumping data for table "questions"
--

INSERT INTO "questions" ("id", "exam_id", "name", "answer_1", "answer_2", "answer_3", "answer_4", "answer_right", "level", "created_at", "updated_at") VALUES
(1, 13, 'Which of the following option leads to the portability and security of Java?', 'Bytecode is executed by the JVM.', 'The applet makes the Java code secure and portable', 'Use of exception handling', 'Dynamic binding between objects', 'Bytecode is executed by the JVM.', 'Easy', '2021-05-26 02:40:23', '2021-05-26 02:40:23'),
(2, 13, 'Which of the following is not a Java features?', 'Dynamic', 'Architecture Neutral', 'Use of pointers', 'Object-oriented', 'Use of pointers', 'Easy', '2021-05-26 02:40:23', '2021-05-26 02:40:23'),
(3, 13, 'The \\u0021 article referred to as a', 'Unicode escape sequence', 'Octal escape', 'Hexadecimal', 'Line feed', 'Unicode escape sequence', 'Easy', '2021-05-26 02:40:23', '2021-05-26 02:40:23'),
(4, 13, '_____ is used to find and fix bugs in the Java programs.', 'JVM', 'JRE', 'JDK', 'JDB', 'JDB', 'Easy', '2021-05-26 02:40:23', '2021-05-26 02:40:23'),
(5, 13, 'Which of the following is a valid declaration of a char?', 'char ch = ''\\utea'';', 'char ca = ''tea'';', 'char cr = \\u0223;', 'char cc = ''\\itea'';', 'char ch = ''\\utea'';', 'Easy', '2021-05-26 02:40:23', '2021-05-26 02:40:23'),
(6, 13, 'What is the return type of the hashCode() method in the Object class?', 'Object', 'int', 'long', 'void', 'int', 'Easy', '2021-05-26 02:40:23', '2021-05-26 02:40:23'),
(7, 13, 'Which of the following is a valid long literal?', 'ABH8097', 'L990023', '904423', '0xnf029L', '0xnf029L', 'Easy', '2021-05-26 02:40:23', '2021-05-26 02:40:23'),
(8, 13, 'What does the expression float a = 35 / 0 return?', '0', 'Not a Number', 'Infinity', 'Run time exception', 'Infinity', 'Easy', '2021-05-26 02:40:23', '2021-05-26 02:40:23'),
(9, 13, 'Evaluate the following Java expression, if x=3, y=5, and z=10: ++z + y - y + z + x++', '24', '23', '20', '25', '24', 'Easy', '2021-05-26 02:40:23', '2021-05-26 02:40:23'),
(10, 13, 'Which of the following tool is used to generate API documentation in HTML format from doc comments in source code?', 'javap tool', 'javaw command', 'Javadoc tool', 'javah command', 'Javadoc tool', 'Easy', '2021-05-26 02:40:23', '2021-05-26 02:40:23'),
(11, 13, 'Which of the following creates a List of 3 visible items and multiple selections abled?', 'new List(false, 3)', 'new List(3, true)', 'new List(true, 3)', 'new List(3, false)', 'new List(true, 3)', 'Medium', '2021-05-26 02:40:23', '2021-05-26 02:40:23'),
(12, 13, 'Which of the following for loop declaration is not valid?', 'for ( int i = 99; i >= 0; i / 9 )', 'for ( int i = 7; i <= 77; i += 7 )', 'for ( int i = 20; i >= 2; - -i )', 'for ( int i = 2; i <= 20; i = 2* i )', 'for ( int i = 99; i >= 0; i / 9 )', 'Medium', '2021-05-26 02:40:23', '2021-05-26 02:40:23'),
(13, 13, 'Which method of the Class.class is used to determine the name of a class represented by the class object as a String?', 'getClass()', 'intern()', 'getName()', 'toString()', 'getName()', 'Medium', '2021-05-26 02:40:23', '2021-05-26 02:40:23'),
(14, 13, 'In which process, a local variable has the same name as one of the instance variables?', 'Serialization', 'Variable Shadowing', 'Abstraction', 'Multi-threading', 'Variable Shadowing', 'Medium', '2021-05-26 02:40:23', '2021-05-26 02:40:23'),
(15, 13, 'Which of the following is true about the anonymous inner class?', 'It has only methods', 'Objects can''t be created', 'It has a fixed class name', 'It has no class name', 'It has no class name', 'Medium', '2021-05-26 02:40:23', '2021-05-26 02:40:23'),
(16, 13, 'Which package contains the Random class?', 'java.util package', 'java.lang package', 'java.awt package', 'java.io package', 'java.util package', 'Medium', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(17, 13, 'What do you mean by nameless objects?', 'An object created by using the new keyword.', 'An object of a superclass created in the subclass.', 'An object without having any name but having a reference.', 'An object that has no reference.', 'An object that has no reference.', 'Medium', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(18, 13, 'An interface with no fields or methods is known as a ______.', 'Runnable Interface', 'Marker Interface', 'Abstract Interface', 'CharSequence Interface', 'Marker Interface', 'Medium', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(19, 13, 'Which Set class should be most popular in a multi-threading environment, considering performance constraint?', 'HashSet', 'ConcurrentSkipListSet', 'LinkedHashSet', 'CopyOnWriteArraySet', 'ConcurrentSkipListSet', 'Hard', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(20, 13, 'Which Map class should be most popular in a multi-threading environment, considering performance constraint?', 'Hashtable', 'CopyOnWriteMap', 'ConcurrentHashMap', 'ConcurrentMap', 'ConcurrentHashMap', 'Hard', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(21, 13, 'Which allows the removal of elements from a collection?', 'Enumeration', 'Iterator', 'Both', 'None of the above', 'None of the above', 'Hard', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(22, 14, 'Which of the following is an immediate subclass of the Panel class?', 'Applet class', 'Window class', 'Frame class', 'Dialog class', 'Applet class', 'Easy', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(23, 14, 'Which option is false about the final keyword?', 'A final method cannot be overridden in its subclasses.', 'A final class cannot be extended.', 'A final class cannot extend other classes.', 'A final method can be inherited.', 'A final class cannot extend other classes.', 'Easy', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(24, 14, 'Which of these classes are the direct subclasses of the Throwable class?', 'RuntimeException and Error class', 'Exception and VirtualMachineError class', 'Error and Exception class', 'IOException and VirtualMachineError class', 'Error and Exception class', 'Easy', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(25, 14, 'What do you mean by chained exceptions in Java?', 'Exceptions occurred by the VirtualMachineError', 'An exception caused by other exceptions', 'Exceptions occur in chains with discarding the debugging information', 'None of the above', 'An exception caused by other exceptions', 'Easy', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(26, 14, 'In which memory a String is stored, when we create a string using new operator?', 'Stack', 'String memory', 'Heap memory', 'Random storage space', 'Heap memory', 'Easy', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(27, 14, 'What is the use of the intern() method?', 'It returns the existing string from memory', 'It creates a new string in the database', 'It modifies the existing string in the database', 'None of the above', 'It returns the existing string from memory', 'Easy', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(28, 14, 'Which of the following is a marker interface?', 'Runnable interface', 'Remote interface', 'Readable interface', 'Result interface', 'Remote interface', 'Easy', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(29, 14, 'Which of the following is a reserved keyword in Java?', 'object', 'strictfp', 'main', 'system', 'strictfp', 'Easy', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(30, 14, 'Which keyword is used for accessing the features of a package?', 'package', 'import', 'extends', 'export', 'import', 'Easy', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(31, 14, 'In java, jar stands for_____.', 'Java Archive Runner', 'Java Application Resource', 'Java Application Runner', 'None of the above', 'None of the above', 'Easy', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(32, 14, 'Which of the following is false?', 'The rt.jar stands for the runtime jar', 'It is an optional jar file', 'It contains all the compiled class files', 'All the classes available in rt.jar is known to the JVM', 'It is an optional jar file', 'Medium', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(33, 14, 'What is the use of \\w in regex?', 'Used for a whitespace character', 'Used for a non-whitespace character', 'Used for a word character', 'Used for a non-word character', 'Used for a word character', 'Medium', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(34, 14, 'Which of the given methods are of Object class?', 'notify(), wait( long msecs ), and synchronized()', 'wait( long msecs ), interrupt(), and notifyAll()', 'notify(), notifyAll(), and wait()', 'sleep( long msecs ), wait(), and notify()', 'notify(), notifyAll(), and wait()', 'Medium', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(35, 14, 'Which of the following is a valid syntax to synchronize the HashMap?', 'Map m = hashMap.synchronizeMap();', 'HashMap map =hashMap.synchronizeMap();', 'Map m1 = Collections.synchronizedMap(hashMap);', 'Map m2 = Collection.synchronizeMap(hashMap);', 'Map m1 = Collections.synchronizedMap(hashMap);', 'Medium', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(36, 14, 'Which of the following is a mutable class in java?', 'java.lang.String', 'java.lang.Byte', 'java.lang.Short', 'java.lang.StringBuilder', 'java.lang.StringBuilder', 'Medium', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(37, 14, 'What is meant by the classes and objects that dependents on each other?', 'Tight Coupling', 'Cohesion', 'Loose Coupling', 'None of the above', 'Tight Coupling', 'Medium', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(38, 14, 'Which of the following code segment would execute the stored procedure \"getPassword()\" located in a database server?', 'CallableStatement cs = connection.prepareCall(\"{call.getPassword()}\");
cs.executeQuery();', 'CallabledStatement callable = conn.prepareCall(\"{call getPassword()}\");
callable.executeUpdate();', 'CallableStatement cab = con.prepareCall(\"{call getPassword()}\");
cab.executeQuery();', 'Callablestatement cstate = connect.prepareCall(\"{call getpassword()}\");
cstate.executeQuery();', 'CallableStatement cs = connection.prepareCall(\"{call.getPassword()}\");
cs.executeQuery();', 'Medium', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(39, 14, 'How many threads can be executed at a time?', 'Only one thread', 'Multiple threads', 'Only main (main() method) thread', 'Two threads', 'Multiple threads', 'Medium', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(40, 14, 'Which of these is the most popularly used class as a key in a HashMap?', 'String', 'Integer', 'Double', ' All of the above', 'String', 'Hard', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(41, 14, 'If three threads trying to share a single object at the same time, which condition will arise in this scenario?', 'Time-Lapse', 'Critical situation', 'Race condition', 'Recursion', 'Race condition', 'Hard', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(42, 14, 'If a thread goes to sleep', 'It releases all the locks it has.', 'It does not release any locks.', 'It releases half of its locks.', 'It releases all of its lock except one.', 'It does not release any locks.', 'Hard', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(43, 14, ' Which of the following modifiers can be used for a variable so that it can be accessed by any thread or a part of a program?', 'global', 'transient', 'volatile', 'default', 'volatile', 'Hard', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(44, 14, 'In character stream I/O, a single read/write operation performs _____.', 'Two bytes read/write at a time.', 'Eight bytes read/write at a time.', 'One byte read/write at a time.', 'Five bytes read/ write at a time.', 'Two bytes read/write at a time.', 'Hard', '2021-05-26 02:40:24', '2021-05-26 02:40:24'),
(45, 14, 'What is the default encoding for an OutputStreamWriter?', 'UTF-8', 'Default encoding of the host platform', 'UTF-12', 'None of the above', 'Default encoding of the host platform', 'Hard', '2021-05-26 02:40:24', '2021-05-26 02:40:24');

-- --------------------------------------------------------

--
-- Table structure for table "scores"
--

CREATE TABLE "scores" (
  "id" BIGSERIAL PRIMARY KEY,
  "user_id" bigint NOT NULL,
  "exam_id" bigint NOT NULL,
  "score" double precision NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL
);

--
-- Dumping data for table "scores"
--

INSERT INTO "scores" ("id", "user_id", "exam_id", "score", "created_at", "updated_at") VALUES
(23, 10, 13, 10.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table "users"
--

CREATE TABLE "users" (
  "id" BIGSERIAL PRIMARY KEY,
  "fullname" varchar(255)  NOT NULL,
  "email" varchar(255)  NOT NULL,
  "phone" varchar(255)  NOT NULL,
  "birthday" date NOT NULL,
  "url_avatar" varchar(255)  NOT NULL,
  "status" varchar(255)  NOT NULL,
  "email_verified_at" timestamp NULL DEFAULT NULL,
  "password" varchar(255)  DEFAULT NULL,
  "remember_token" varchar(100)  DEFAULT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL
);

--
-- Dumping data for table "users"
--

INSERT INTO "users" ("id", "fullname", "email", "phone", "birthday", "url_avatar", "status", "email_verified_at", "password", "remember_token", "created_at", "updated_at") VALUES
(6, 'Nguyen Van An', 'user1@gmail.com', '0916510664', '1999-03-12', '/storage/uploads/image_avatar/1622006809.png', 'Active', NULL, '$2y$10$j4PWgcwLImSBYggU6mTh3.6cW2Bcn3tJa6FlNg4CEpfeehTNl.7Bq', 'I66pPJQfgXMmvEi0AplbqFMUnhn2fy0D51BI3I3FbD9Fsoc6omD5dzHXy2E0', '2021-05-16 01:51:09', '2021-05-25 22:26:49'),
(8, 'Huynh Thanh Loi', 'user2@gmail.com', '0839243436', '1999-04-12', '/storage/uploads/image_avatar/1621480983.jpg', 'Active', NULL, '$2y$10$j4PWgcwLImSBYggU6mTh3.6cW2Bcn3tJa6FlNg4CEpfeehTNl.7Bq', 'DH4LM1PZI7cle9rSvAMNSA5xDdS5uTz0mCWPaXaKPh6EnJzTUxT6yAoWIWH0', '2021-05-19 07:24:25', '2021-05-22 05:50:48'),
(10, 'Tran Phuong Thao', 'user3@gmail.com', '0374682316', '1998-02-05', 'https://ui-avatars.com/api/?name=Tran Phuong Thao', 'Active', NULL, '$2y$10$j4PWgcwLImSBYggU6mTh3.6cW2Bcn3tJa6FlNg4CEpfeehTNl.7Bq', NULL, '2021-05-25 23:13:06', '2021-05-25 23:17:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table "admins"
--

--
-- Indexes for table "class_rooms"
--
CREATE INDEX "class_rooms_course_id_foreign" ON "class_rooms" ("course_id");

--
-- Indexes for table "class_user"
--
CREATE INDEX "class_user_user_id_foreign" ON "class_user" ("user_id");
CREATE INDEX "class_user_class_id_foreign" ON "class_user" ("class_id");

--
-- Indexes for table "courses"
--
CREATE INDEX "courses_admin_id_foreign" ON "courses" ("admin_id");

--
-- Indexes for table "exams"
--
CREATE INDEX "exams_course_id_foreign" ON "exams" ("course_id");

--
-- Indexes for table "failed_jobs"
--

--
-- Indexes for table "lessons"
--
CREATE INDEX "lessons_course_id_foreign" ON "lessons" ("course_id");

--
-- Indexes for table "migrations"
--

--
-- Indexes for table "note_generals"
--
CREATE INDEX "note_generals_class_id_foreign" ON "note_generals" ("class_id");
CREATE INDEX "note_generals_admin_id_foreign" ON "note_generals" ("admin_id");

--
-- Indexes for table "note_privates"
--
CREATE INDEX "note_privates_user_id_foreign" ON "note_privates" ("user_id");
CREATE INDEX "note_privates_admin_id_foreign" ON "note_privates" ("admin_id");

--
-- Indexes for table "password_resets"
--
CREATE INDEX "password_resets_email_index" ON "password_resets" ("email");

--
-- Indexes for table "questions"
--
CREATE INDEX "questions_exam_id_foreign" ON "questions" ("exam_id");

--
-- Indexes for table "scores"
--
CREATE INDEX "scores_user_id_foreign" ON "scores" ("user_id");
CREATE INDEX "scores_exam_id_foreign" ON "scores" ("exam_id");

--
-- Indexes for table "users"
--
ALTER TABLE "users" ADD CONSTRAINT "users_email_unique" UNIQUE ("email");

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table "admins"
--

--
-- AUTO_INCREMENT for table "class_rooms"
--

--
-- AUTO_INCREMENT for table "class_user"
--

--
-- AUTO_INCREMENT for table "courses"
--

--
-- AUTO_INCREMENT for table "exams"
--

--
-- AUTO_INCREMENT for table "failed_jobs"
--

--
-- AUTO_INCREMENT for table "lessons"
--

--
-- AUTO_INCREMENT for table "migrations"
--

--
-- AUTO_INCREMENT for table "note_generals"
--

--
-- AUTO_INCREMENT for table "note_privates"
--

--
-- AUTO_INCREMENT for table "questions"
--

--
-- AUTO_INCREMENT for table "scores"
--

--
-- AUTO_INCREMENT for table "users"
--

--
-- Constraints for dumped tables
--

--
-- Constraints for table "class_rooms"
--
ALTER TABLE "class_rooms" ADD CONSTRAINT "class_rooms_course_id_foreign" FOREIGN KEY ("course_id") REFERENCES "courses" ("id");

--
-- Constraints for table "class_user"
--
ALTER TABLE "class_user" ADD CONSTRAINT "class_user_class_id_foreign" FOREIGN KEY ("class_id") REFERENCES "class_rooms" ("id");
ALTER TABLE "class_user" ADD CONSTRAINT "class_user_user_id_foreign" FOREIGN KEY ("user_id") REFERENCES "users" ("id");

--
-- Constraints for table "courses"
--
ALTER TABLE "courses" ADD CONSTRAINT "courses_admin_id_foreign" FOREIGN KEY ("admin_id") REFERENCES "admins" ("id");

--
-- Constraints for table "exams"
--
ALTER TABLE "exams" ADD CONSTRAINT "exams_course_id_foreign" FOREIGN KEY ("course_id") REFERENCES "courses" ("id");

--
-- Constraints for table "lessons"
--
ALTER TABLE "lessons" ADD CONSTRAINT "lessons_course_id_foreign" FOREIGN KEY ("course_id") REFERENCES "courses" ("id");

--
-- Constraints for table "note_generals"
--
ALTER TABLE "note_generals" ADD CONSTRAINT "note_generals_admin_id_foreign" FOREIGN KEY ("admin_id") REFERENCES "admins" ("id");
ALTER TABLE "note_generals" ADD CONSTRAINT "note_generals_class_id_foreign" FOREIGN KEY ("class_id") REFERENCES "class_rooms" ("id");

--
-- Constraints for table "note_privates"
--
ALTER TABLE "note_privates" ADD CONSTRAINT "note_privates_admin_id_foreign" FOREIGN KEY ("admin_id") REFERENCES "admins" ("id");
ALTER TABLE "note_privates" ADD CONSTRAINT "note_privates_user_id_foreign" FOREIGN KEY ("user_id") REFERENCES "users" ("id");

--
-- Constraints for table "questions"
--
ALTER TABLE "questions" ADD CONSTRAINT "questions_exam_id_foreign" FOREIGN KEY ("exam_id") REFERENCES "exams" ("id");

--
-- Constraints for table "scores"
--
ALTER TABLE "scores" ADD CONSTRAINT "scores_exam_id_foreign" FOREIGN KEY ("exam_id") REFERENCES "exams" ("id");
ALTER TABLE "scores" ADD CONSTRAINT "scores_user_id_foreign" FOREIGN KEY ("user_id") REFERENCES "users" ("id");
SELECT setval(pg_get_serial_sequence('admins', 'id'), coalesce(max(id), 1)) FROM admins;
SELECT setval(pg_get_serial_sequence('class_rooms', 'id'), coalesce(max(id), 1)) FROM class_rooms;
SELECT setval(pg_get_serial_sequence('class_user', 'id'), coalesce(max(id), 1)) FROM class_user;
SELECT setval(pg_get_serial_sequence('courses', 'id'), coalesce(max(id), 1)) FROM courses;
SELECT setval(pg_get_serial_sequence('exams', 'id'), coalesce(max(id), 1)) FROM exams;
SELECT setval(pg_get_serial_sequence('failed_jobs', 'id'), coalesce(max(id), 1)) FROM failed_jobs;
SELECT setval(pg_get_serial_sequence('lessons', 'id'), coalesce(max(id), 1)) FROM lessons;
SELECT setval(pg_get_serial_sequence('migrations', 'id'), coalesce(max(id), 1)) FROM migrations;
SELECT setval(pg_get_serial_sequence('note_generals', 'id'), coalesce(max(id), 1)) FROM note_generals;
SELECT setval(pg_get_serial_sequence('note_privates', 'id'), coalesce(max(id), 1)) FROM note_privates;
SELECT setval(pg_get_serial_sequence('questions', 'id'), coalesce(max(id), 1)) FROM questions;
SELECT setval(pg_get_serial_sequence('scores', 'id'), coalesce(max(id), 1)) FROM scores;
SELECT setval(pg_get_serial_sequence('users', 'id'), coalesce(max(id), 1)) FROM users;
COMMIT;




