-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2023 at 08:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faculty`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `password`) VALUES
(1, 'admin@isp.edu.pk', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `clo_progress`
--

CREATE TABLE `clo_progress` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `clo_id` int(11) DEFAULT NULL,
  `subject_name` varchar(255) NOT NULL,
  `progress` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clo_progress`
--

INSERT INTO `clo_progress` (`id`, `teacher_id`, `subject_id`, `clo_id`, `subject_name`, `progress`) VALUES
(189, 2, 2, 1, 'visual programming', '42.00'),
(190, 2, 2, 2, 'visual programming', '7.00'),
(191, 2, 2, 3, 'visual programming', '20.00'),
(211, 3, 1, 1, 'Web Engineering', '100.00'),
(212, 3, 1, 2, 'Web Engineering', '33.00'),
(213, 3, 1, 3, 'Web Engineering', '0.00'),
(214, 3, 1, 4, 'Web Engineering', '20.00');

-- --------------------------------------------------------

--
-- Table structure for table `clo_table`
--

CREATE TABLE `clo_table` (
  `CLO_ID` int(40) NOT NULL,
  `CLO_Title` varchar(50) NOT NULL,
  `Subject_ID` int(50) NOT NULL,
  `Subject_Counter` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clo_table`
--

INSERT INTO `clo_table` (`CLO_ID`, `CLO_Title`, `Subject_ID`, `Subject_Counter`) VALUES
(1, 'Discuss how web standards impact software developm', 1, 1),
(2, 'Describe the constraints that the web puts on deve', 1, 2),
(3, 'Design and Implement a simple web application', 1, 3),
(4, 'Review an existing web application against a curre', 1, 4),
(5, 'Use the different elements of a visual programming', 2, 1),
(6, 'Program using the fundamental software development', 2, 2),
(7, 'Analyze problems, develop conceptual designs that ', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `content_table`
--

CREATE TABLE `content_table` (
  `Content_ID` int(40) NOT NULL,
  `Content_Details` varchar(500) NOT NULL,
  `CLO_ID` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content_table`
--

INSERT INTO `content_table` (`Content_ID`, `Content_Details`, `CLO_ID`) VALUES
(1, 'Introduction to web Applications Web servers\r\no A brief introduction to the protocols relating to we', 1),
(2, 'Introduction to web Applications Web servers\r\no A brief introduction to the protocols relating to we', 1),
(3, 'TCP/IP Application Services', 1),
(4, 'Web Servers: Basic Operation, Virtual hosting, Chunked transfers, Caching support, Extensibility', 1),
(5, 'Standard Generalized Markup Language(SGML)', 1),
(6, 'Web basic page layout, tags in html and usage of Tags.', 1),
(7, 'Structure of web page.', 1),
(8, 'Designing and creating tables in html.', 1),
(9, 'Designing Principles of web based application', 1),
(10, 'Designing forms in html5', 2),
(11, 'Creating form using table in html', 2),
(12, 'Web Input Validations', 2),
(13, 'Cascading Style Sheets and responsiveness of a Dynamic Integrations using Framework', 2),
(14, 'Introduction to CSS and types of CSS', 2),
(15, 'Box modeling', 2),
(16, 'Margin & Padding in CSS', 2),
(17, 'Attributes in CSS (class & id).', 2),
(18, 'Dynamic behavior at the client side', 2),
(19, 'Brief Introduction to JavaScript\r\n', 2),
(20, 'Why need JavaScript & How we use JavaScript.', 2),
(21, 'Brief Discussion on JavaScript, Advantages of learning JavaScript, JavaScript frameworks and librari', 2),
(22, 'Introduction to JQuery, How JQuery makes hard things easier, JQuery Syntax, JQuery Selectors. CSS an', 3),
(23, 'Web Services\r\no Operations\r\no Processing HTTP Requests,\r\no Processing HTTP Responses,\r\no Cookie Coor', 3),
(24, 'A brief introduction database, Designing database for web application, Getting rid of anomalies, Int', 3),
(25, 'Privacy and P3P\r\no Complex HTTP Interactions\r\no Dynamic Content Delivery', 3),
(26, 'Introduction to PHP, How to program in PHP , Basic programing concept in PHP (conditional statement,', 3),
(27, 'Server Configuration', 3),
(28, 'Server Security', 3),
(29, 'Web Browsers Architecture and Processes', 3),
(30, 'A brief introduction database, Designing database for web application, Getting rid of anomalies, Int', 3),
(31, 'Privacy and P3P\r\no Complex HTTP Interactions\r\no Dynamic Content Delivery', 3),
(32, 'Introduction to PHP, How to program in PHP , Basic programing concept in PHP (conditional statement,', 3),
(33, 'Server Configuration', 3),
(34, 'Server Security', 3),
(35, 'Web Browsers Architecture and Processes', 3),
(36, 'JavaScript, DHTML, AJAX. JSON', 3),
(37, 'Approaches to Web Application Development', 3),
(38, '', 3),
(39, 'Programing in any Scripting language', 4),
(40, 'Search Technologies', 4),
(41, 'Introduction to SQL, How to write and run queries in PHP, retrieve data from database and display da', 4),
(42, 'Data retrieval from database and deletion of record from database using PHP, Introduction to Session', 4),
(43, 'Data retrieval from database and updating record from database using PHP, Security for Web Applicati', 4),
(44, 'Search Engine Optimization', 4),
(45, 'XML Query Language', 4),
(46, 'Semantic Web', 4),
(47, 'Future Web Application Framework', 4),
(48, 'Communication Architecture', 4),
(49, 'Define\r\n1.	Overview of .NET\r\na)	.NET Executables and the CLR\r\nb)	A .NET Testbed for C# Progr\r\nc)	Visual Studio\r\nd)	Overview of Visual Studio\r\ne)	Creating a Console Application\r\nf)	Project Configurations\r\ng)	Debugging\r\nh)	Multiple-Project Solutions\r\n', 5),
(50, '2.	Object-Oriented Programming in C#\r\na)	Classes\r\nb)	Access Control\r\nc)	Methods and Properties\r\nd)	Static Data and Methods\r\ne)	Inheritance\r\nf)	Overriding Methods\r\ng)	Abstract Classes\r\nh)	Sealed Classes\r\ni)	Access Control and Assemblies\r\n\r\n', 5),
(51, 'Identifies\r\n3.	Introduction to Windows Forms\r\na)	What Are Windows Forms?\r\nb)	Windows Forms Class Hierarchy\r\nc)	Building a Form\r\nd)	The Application Class\r\ne)	Trapping Events\r\nf)	Buttons\r\ng)	Labels and Textbox Controls\r\n', 5),
(59, 'Identifies\r\n4.	Visual Studio and the Forms Designer\r\na)	Using the Forms Designer\r\nb)	Code Generated by Forms Designer\r\nc)	Adding Event Handlers\r\nd)	Creating Attractive Forms\r\ne)	Creating Easy to Use Forms', 5),
(66, 'Comprehend\r\n1.	Using Controls<br>\r\na)	Checkbox, Radio Button, and Group Box\r\nb)	Numeric Up/Down\r\nc)	Trackbar\r\nd)	Progress\r\ne)	Month Calendar\r\nf)	DateTimePicker\r\n', 6),
(79, '6.	List Controls\r\na)	List box and Combo box\r\nb)	List View\r\nc)	Storing Objects in List Controls\r\n', 6),
(80, 'Comprhend\r\n7.	Working with Dialogs\r\na)	Modal vs. Modeless Dialogs\r\nb)	Message Boxes\r\nc)	Common Dialogs\r\nd)	Creating a Modal Dialog\r\ne)	Configuring the Dialog Result\r\nf)	Access Data from the Dialog\r\ng)	Validating Data\r\nh)	Error Provider Control\r\ni)	Modal Dialogs\r\nj)	Creating a Modeless Dialog\r\n', 6),
(81, 'Extend\r\n8.	Menus, Toolbars and Status Bars\r\na)	Main Menus\r\nb)	Context Menus\r\nc)	Building a Status Bar\r\nd)	Building a Toolbar\r\ne)	Using the Timer Control\r\n', 6),
(82, 'Generalizes\r\n9.	Advanced Windows Forms Topics\r\na)	Parent/Child Relationships\r\nb)	Owner/Owned Relationships\r\nc)	Top-Most Forms\r\nd)	Multiple Document Interface\r\ne)	Managing Parent/Child Menus\r\nf)	Programming the Clipboard\r\ng)	Visual Inheritance\r\n', 6),
(83, 'Generalizes\r\n10.	Using Advanced Controls\r\na)	Panel\r\nb)	Tree View\r\nc)	Splitter\r\nd)	Tab Control\r\n', 6),
(84, 'Infer\r\n1.	Resources\r\na)	Image Resources\r\nb)	Resource Files\r\nc)	String Resources\r\nd)	Working with Resources in Visual Studio\r\ne)	Resource Managers\r\nf)	Cultures and Internationalization\r\ng)	Building Localizable Forms\r\n', 6),
(85, '12.	Applications and Settings\r\na)	Application Class\r\nb)	Processing and Filtering Windows Messages\r\nc)	Application Lifetime and Events\r\nd)	Configuration Files\r\ne)	Windows Registry\r\n', 7),
(86, '13.	Data Access and Data Binding\r\na)	ADO.NET Overview\r\nb)	.NET Data Providers\r\nc)	Using DataReaders\r\nd)	Data Sets\r\ne)	Data Tables\r\nf)	Data Views\r\ng)	Data Binding\r\nh)	Interacting with XML Data\r\n', 7),
(87, '14.	.NET Windows Forms\r\na)	Tool Strip Control\r\nb)	Split Container Control\r\nc)	Web Browser Control\r\nd)	DataGrid View Control\r\ne)	Other .NET Controls\r\nf)	New Data Binding\r\ng)	Application Settings\r\nh)	Background Worker Component\r\ni)	Click Once Deployment\r\n', 7),
(88, 'Solves\r\n15.	I/O and Serialization\r\na)	Directories\r\nb)	Files\r\nc)	Serialization\r\nd)	Attributes\r\n', 7),
(89, 'Produce.\r\n16.	NET Programming Model\r\na)	Memory Management and Garbage Collection\r\nb)	Threading and Synchronization\r\nc)	Asynchronous Delegates\r\nd)	.NET Background Worker\r\ne)	Application Domains\r\nf)	Marshal by Value\r\ng)	Marshal by Reference\r\nh)	.NET Remoting', 7);

-- --------------------------------------------------------

--
-- Table structure for table `student_feedback`
--

CREATE TABLE `student_feedback` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `clo_id` int(11) DEFAULT NULL,
  `progress` int(11) DEFAULT NULL,
  `completed` tinyint(1) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_feedback`
--

INSERT INTO `student_feedback` (`id`, `student_id`, `subject_id`, `clo_id`, `progress`, `completed`, `status`) VALUES
(60, 2, 1, 1, 100, 1, 'Accepted'),
(61, 2, 1, 2, 33, 1, 'Accepted'),
(62, 2, 1, 3, 0, 0, 'Remaining'),
(63, 2, 1, 4, 20, 0, 'Remaining'),
(64, 2, 2, 1, 42, 1, 'Accepted'),
(65, 2, 2, 2, 7, 0, 'Remaining'),
(66, 2, 2, 3, 20, 1, 'Accepted'),
(67, 3, 1, 1, 100, 1, 'Accepted'),
(68, 3, 1, 2, 33, 1, 'Accepted'),
(69, 3, 1, 3, 0, 0, 'Remaining'),
(70, 3, 1, 4, 20, 0, 'Remaining'),
(71, 3, 2, 1, 42, 1, 'Accepted'),
(72, 3, 2, 2, 7, 0, 'Remaining'),
(73, 3, 2, 3, 20, 0, 'Remaining');

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `pic` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`id`, `name`, `email`, `password`, `pic`) VALUES
(2, 'Ali Mehboob', 'Ali@isp.edu.pk', 'ali12345', ''),
(3, 'Usama ', 'Usama@isp.edu.pk', 'usama12345', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

CREATE TABLE `student_table` (
  `student_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject_table`
--

CREATE TABLE `subject_table` (
  `Subject_ID` int(40) NOT NULL,
  `Subject_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_table`
--

INSERT INTO `subject_table` (`Subject_ID`, `Subject_Name`) VALUES
(1, 'Web Engineering'),
(2, 'visual programming');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_login`
--

CREATE TABLE `teacher_login` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `pic` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_login`
--

INSERT INTO `teacher_login` (`id`, `name`, `email`, `password`, `pic`) VALUES
(2, 'Hafiz Mueez Amin', 'Mueez@isp.edu.pk', 'mueez12345', ''),
(3, 'kanwar kaleem', 'kanwar@isp.edu.pk', 'kanwar12345', ''),
(4, 'Dr Hamid Ghous', 'Drhamid@isp.edu.pk', 'drhamid12345', ''),
(7, 'Meer Hazar Khan', 'Meer@isp.edu.pk', 'meer12345', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subject_assignment`
--

CREATE TABLE `teacher_subject_assignment` (
  `assignment_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `clo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_subject_assignment`
--

INSERT INTO `teacher_subject_assignment` (`assignment_id`, `teacher_id`, `subject_id`, `clo_id`) VALUES
(6, 2, 2, NULL),
(7, 2, 2, NULL),
(8, 3, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `web_engineering_clo`
--

CREATE TABLE `web_engineering_clo` (
  `id` int(11) NOT NULL,
  `clo_number` varchar(50) NOT NULL,
  `clo_heading` varchar(100) NOT NULL,
  `clo_content` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_engineering_clo`
--

INSERT INTO `web_engineering_clo` (`id`, `clo_number`, `clo_heading`, `clo_content`) VALUES
(1, 'CLO 1', 'Discuss how web standards impact software development', 'Introduction to web Applications\r\nWeb servers\r\nA brief introduction to the protocols relating to web\r\nOverview of HTML, CSS, JavaScript, PHP, Frameworks used for web development\r\nClient-side & Server-side Scripting'),
(2, '', '', 'TCP/IP Application Services'),
(3, '', '', 'Web Servers: Basic Operation, Virtual hosting, Chunked transfers, Caching support, Extensibility'),
(4, '', '', 'Standard Generalized Markup Language(SGML)'),
(5, '', '', 'Web basic page layout, tags in html and usage of Tags.'),
(6, '', '', 'Structure of web page'),
(7, '', '', 'Designing and creating tables in html.'),
(8, '', '', 'Designing Principles of web based application'),
(9, 'CLO 2', 'Describe the constraints that the web puts on developers.', 'Designing forms in html5'),
(10, '', '', 'Creating form using table in html'),
(11, '', '', 'Web Input Validations'),
(12, '', '', 'Cascading Style Sheets and responsiveness of a Dynamic Integrations using Framework'),
(13, '', '', 'Introduction to CSS and types of CSS'),
(14, '', '', 'Box modeling'),
(15, '', '', 'Margin & Padding in CSS'),
(16, '', '', 'Attributes in CSS (class & id)'),
(17, '', '', 'Dynamic behavior at the client side'),
(18, '', '', 'Brief Introduction to JavaScript'),
(19, '', '', 'Functions in JavaScript'),
(20, '', '', 'Why need JavaScript & How we use JavaScript.'),
(21, '', '', 'Brief Discussion on JavaScript, Advantages of learning JavaScript, JavaScript frameworks and libraries, Applications of JavaScript Programming, Limitations of JavaScript, Warning for Non-JavaScript Browsers'),
(22, '', '', 'Web Service\r\nSOAP\r\nREST\r\nWML\r\nXSL'),
(23, 'CLO 3', 'Design and Implement a simple web application', 'Introduction to JQuery, How JQuery makes hard things easier, JQuery Syntax, JQuery Selectors. CSS and JQuery functions , Event functions in JQuery. Animations in JQuery, important core features supported by jQuery.'),
(24, '', '', 'Web Services\r\nOperations\r\nProcessing HTTP Requests\r\nrocessing HTTP Responses\r\nCookie Coordination'),
(25, '', '', 'A brief introduction database, Designing database for web application, Getting rid of anomalies, Introduction to webserver, how to create database in web server (xampp, wamp, vertrigo).'),
(26, '', '', 'Privacy and P3P\r\nComplex HTTP Interactions\r\nDynamic Content Delivery'),
(27, '', '', 'Introduction to PHP, How to program in PHP , Basic programing concept in PHP (conditional statement, iteration'),
(28, '', '', 'Server Configuration'),
(29, '', '', 'Server Security'),
(30, '', '', 'Web Browsers Architecture and Processes'),
(31, '', '', 'A brief introduction database, Designing database for web application, Getting rid of anomalies, Introduction to webserver, how to create database in web server (xampp, wamp, vertrigo'),
(32, '', '', 'Privacy and P3P\r\nComplex HTTP Interactions\r\nDynamic Content Delivery\r\n'),
(33, '', '', 'Introduction to PHP, How to program in PHP , Basic programing concept in PHP (conditional statement, iteration'),
(34, '', '', 'Server Configuration'),
(35, '', '', 'Server Security'),
(36, '', '', 'Web Browsers Architecture and Processes'),
(37, '', '', 'JavaScript, DHTML, AJAX. JSON'),
(38, '', '', 'Approaches to Web Application Development'),
(39, 'CLO 4', 'Review an existing web application against a current web standard', 'Database Checks and Integration of Web-Pages with Backend Database, Connection establishment with database and PHP. How to insert data from HTML Form to database using PHP.'),
(40, '', '', 'Programing in any Scripting language'),
(41, '', '', 'Search Technologie'),
(42, '', '', 'Introduction to SQL, How to write and run queries in PHP, retrieve data from database and display data on web page, display data in HTML tables'),
(43, '', '', 'Data retrieval from database and deletion of record from database using PHP, Introduction to Session and Cookies'),
(44, '', '', 'Data retrieval from database and updating record from database using PHP, Security for Web Applications. Web Application Maintenance. login method in web applications.'),
(45, '', '', 'Search Engine Optimization'),
(46, '', '', 'XML Query Language'),
(47, '', '', 'Semantic Web'),
(48, '', '', 'Future Web Application Framework'),
(49, '', '', 'Communication Architecture');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clo_progress`
--
ALTER TABLE `clo_progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `clo_id` (`clo_id`);

--
-- Indexes for table `clo_table`
--
ALTER TABLE `clo_table`
  ADD PRIMARY KEY (`CLO_ID`),
  ADD KEY `FK_CLO_Subject` (`Subject_ID`);

--
-- Indexes for table `content_table`
--
ALTER TABLE `content_table`
  ADD PRIMARY KEY (`Content_ID`),
  ADD KEY `FK_CLO_table` (`CLO_ID`);

--
-- Indexes for table `student_feedback`
--
ALTER TABLE `student_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `clo_id` (`clo_id`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject_table`
--
ALTER TABLE `subject_table`
  ADD PRIMARY KEY (`Subject_ID`);

--
-- Indexes for table `teacher_login`
--
ALTER TABLE `teacher_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `teacher_subject_assignment`
--
ALTER TABLE `teacher_subject_assignment`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `clo_id` (`clo_id`);

--
-- Indexes for table `web_engineering_clo`
--
ALTER TABLE `web_engineering_clo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clo_progress`
--
ALTER TABLE `clo_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `clo_table`
--
ALTER TABLE `clo_table`
  MODIFY `CLO_ID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `content_table`
--
ALTER TABLE `content_table`
  MODIFY `Content_ID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `student_feedback`
--
ALTER TABLE `student_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `student_login`
--
ALTER TABLE `student_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject_table`
--
ALTER TABLE `subject_table`
  MODIFY `Subject_ID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher_login`
--
ALTER TABLE `teacher_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teacher_subject_assignment`
--
ALTER TABLE `teacher_subject_assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `web_engineering_clo`
--
ALTER TABLE `web_engineering_clo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clo_progress`
--
ALTER TABLE `clo_progress`
  ADD CONSTRAINT `clo_progress_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_login` (`id`),
  ADD CONSTRAINT `clo_progress_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject_table` (`Subject_ID`),
  ADD CONSTRAINT `clo_progress_ibfk_3` FOREIGN KEY (`clo_id`) REFERENCES `clo_table` (`CLO_ID`);

--
-- Constraints for table `clo_table`
--
ALTER TABLE `clo_table`
  ADD CONSTRAINT `FK_CLO_Subject` FOREIGN KEY (`Subject_ID`) REFERENCES `subject_table` (`Subject_ID`);

--
-- Constraints for table `content_table`
--
ALTER TABLE `content_table`
  ADD CONSTRAINT `FK_CLO_table` FOREIGN KEY (`CLO_ID`) REFERENCES `clo_table` (`CLO_ID`);

--
-- Constraints for table `student_feedback`
--
ALTER TABLE `student_feedback`
  ADD CONSTRAINT `student_feedback_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_login` (`id`),
  ADD CONSTRAINT `student_feedback_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject_table` (`Subject_ID`),
  ADD CONSTRAINT `student_feedback_ibfk_3` FOREIGN KEY (`clo_id`) REFERENCES `clo_table` (`CLO_ID`);

--
-- Constraints for table `teacher_subject_assignment`
--
ALTER TABLE `teacher_subject_assignment`
  ADD CONSTRAINT `teacher_subject_assignment_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_login` (`id`),
  ADD CONSTRAINT `teacher_subject_assignment_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject_table` (`Subject_ID`),
  ADD CONSTRAINT `teacher_subject_assignment_ibfk_3` FOREIGN KEY (`clo_id`) REFERENCES `clo_table` (`CLO_ID`),
  ADD CONSTRAINT `teacher_subject_assignment_ibfk_4` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_login` (`id`),
  ADD CONSTRAINT `teacher_subject_assignment_ibfk_5` FOREIGN KEY (`subject_id`) REFERENCES `subject_table` (`Subject_ID`),
  ADD CONSTRAINT `teacher_subject_assignment_ibfk_6` FOREIGN KEY (`clo_id`) REFERENCES `clo_table` (`CLO_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
