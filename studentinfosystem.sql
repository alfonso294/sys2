

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";




CREATE TABLE IF NOT EXISTS `students` (
`id` int(10) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `studentno` int(10) NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `course` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `yrlevel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `date_joined` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



INSERT INTO `students` (`id`, `username`, `password`, `studentno`, `firstname`, `lastname`, `course`, `yrlevel`, `date_joined`)



ALTER TABLE `students`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `students`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;

