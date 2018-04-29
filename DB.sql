CREATE DATABASE `course`;   	
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_Id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `course_name` varchar(20) CHARACTER SET latin1 NOT NULL,
  `course_type` varchar(20) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `course_Id` (`course_Id`)
);
