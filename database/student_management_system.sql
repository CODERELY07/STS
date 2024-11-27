-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2024 at 05:26 AM
-- Server version: 8.0.35
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `CourseID` int NOT NULL,
  `CourseName` varchar(255) NOT NULL,
  `CourseDescription` text,
  `units` decimal(3,1) DEFAULT NULL,
  `TF` decimal(3,1) DEFAULT NULL,
  `Laboratory` decimal(3,1) DEFAULT NULL,
  `ProgramID` int DEFAULT NULL,
  `SubjectCode` varchar(50) NOT NULL,
  `popular` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`CourseID`, `CourseName`, `CourseDescription`, `units`, `TF`, `Laboratory`, `ProgramID`, `SubjectCode`, `popular`) VALUES
(1, 'Introduction to Computing', 'Basic principles of programming', '3.0', '3.0', '1.0', 1, 'IT 101', NULL),
(2, 'Introduction to Human Computer Interaction', ' Examines the interaction between users and computer systems.', '3.0', '3.0', '1.0', 1, 'IT 102', NULL),
(3, 'Multimedia Systems', ' Interdisciplinary course on integrating multimedia elements into modern systems.', '3.0', '3.0', '1.0', 1, 'IT 103', NULL),
(4, 'Platform Security', 'Focuses on securing platforms by mitigating risks and protecting systems.', '3.0', '3.0', '1.0', 1, 'IT 104', NULL),
(5, 'Data Management and Databases', 'Basics of database design, SQL, and data modeling.', '3.0', '3.0', '1.0', 2, 'IS 101', NULL),
(6, 'Introduction to Cybersecurity', 'Essentials of securing information systems and managing threats.', '3.0', '3.0', '1.0', 2, 'IS 102', NULL),
(7, 'Mathematics for Computing', 'Foundational math concepts for computer applications.', '3.0', '3.0', '1.0', 2, 'IS 103', NULL),
(8, 'IT Infrastructure and Platform', 'Introduction to hardware, software, and networking essentials.', '3.0', '3.0', '1.0', 2, 'IS 104', NULL),
(9, 'Data Structures and Algorithm', 'Study of data organization and fundamental algorithms for problem-solving.', '3.0', '3.0', '1.0', 3, 'CS 101', NULL),
(10, 'Introduction to Artificial Intelligence', ' Preparing students for careers in AI development.', '3.0', '3.0', '1.0', 3, 'CS 103', NULL),
(11, 'Object-Oriented Programming', 'Principles of OOP, encapsulation, inheritance, and polymorphism.', '3.0', '3.0', '1.0', 3, 'CS 103', NULL),
(12, 'Programming Fundamentals', ' Introduction to programming concepts using a language like Python, Java, or C++.', '3.0', '3.0', '1.0', 3, 'CS 104', NULL),
(13, 'Introduction to Library and Information Science', ' Overview of the field, history, roles, and functions of libraries and information centers.', '3.0', '3.0', '1.0', 4, 'LIS 101', NULL),
(14, 'Library Cataloging and Classification', ' Principles and practices of cataloging and classification systems like Dewey Decimal and Library of Congress.', '3.0', '3.0', '1.0', 4, 'LIS 102', NULL),
(15, 'Library Users and Services', ' Principles and practices of cataloging and classification systems like Dewey Decimal and Library of Congress.', '3.0', '3.0', '1.0', 4, 'LIS 103', NULL),
(16, 'Information Retrieval Systems', ' Techniques for searching, retrieving, and organizing information in library systems and databases.', '3.0', '3.0', '1.0', 4, 'LIS 104', NULL),
(17, 'Biochemistry', 'Study of the chemical processes and substances that occur within living organisms.', '3.0', '3.0', '1.0', 5, 'BIO 101', NULL),
(18, 'Microbiology', ' Introduction to microorganisms and their roles in health, disease, and environmental processes.', '3.0', '3.0', '1.0', 5, 'BIO 102', NULL),
(19, 'Cell Biology', 'Focus on the structure and function of cells, including cellular components like the nucleus, mitochondria, and the endoplasmic reticulum.', '3.0', '3.0', '1.0', 5, 'BIO 103', NULL),
(20, 'Genetics', ' Focus on heredity, genetic variation, and molecular genetics, including inheritance patterns and genetic engineering.', '3.0', '3.0', '1.0', 5, 'BIO 104', NULL),
(21, 'Introduction to Environmental Science', 'Overview of environmental issues, sustainability, and the relationship between humans and the environment.', '3.0', '3.0', '1.0', 6, 'ES 101', NULL),
(22, 'Environmental Impact Assessment', ' Methods for evaluating the potential impacts of human activities on the environment and proposing mitigation strategies.', '3.0', '3.0', '1.0', 6, 'ES 102', NULL),
(23, 'Waste Management', 'Study of methods for managing waste, recycling, and reducing environmental pollution.', '3.0', '3.0', '1.0', 6, 'ES 103', NULL),
(24, 'Geographical Information Systems ', 'Use of GIS tools for mapping and analyzing spatial data related to environmental processes.', '3.0', '3.0', '1.0', 6, 'ES 104', NULL),
(25, 'Introduction to Political Science', 'Overview of political theory, institutions, and practices in both domestic and international contexts.', '3.0', '3.0', '1.0', 7, 'PS 101', NULL),
(26, 'Comparative Politics', ' Study of different political systems, including democracies, authoritarian regimes, and political cultures around the world.', '3.0', '3.0', '1.0', 7, 'PS 102', NULL),
(27, 'Political Theory', 'Examination of classical and contemporary political thought, from Plato to modern political theorists.', '3.0', '3.0', '1.0', 7, 'PS 103', NULL),
(28, 'Constitutional Law', 'Overview of the structure of government, rights, and liberties, as well as the interpretation of constitutions.', '3.0', '3.0', '1.0', 7, 'PS 104', NULL),
(29, 'Real Analysis', 'Study of the properties and behaviors of real numbers, sequences, and functions.', '3.0', '3.0', '1.0', 8, 'M 101', NULL),
(30, 'Differential Equations', ' Focus on methods for solving ordinary differential equations and their applications in science and engineering.', '3.0', '3.0', '1.0', 8, 'M 102', NULL),
(31, 'Linear Algebra', 'Focus on vector spaces, matrices, eigenvalues, and linear transformations.', '3.0', '3.0', '1.0', 8, 'M 103', NULL),
(32, 'Probability and Statistics', 'Study of probability theory and statistical methods for analyzing data and making predictions.', '3.0', '3.0', '1.0', 8, 'M 104', NULL),
(33, 'Food and Beverage Management', 'Study of the management of food service operations, including menu planning, inventory control, and customer service.', '3.0', '3.0', '1.0', 9, 'HM 101', NULL),
(34, 'Hospitality Marketing', 'Techniques and strategies for marketing hospitality services, including customer relationship management and market research.', '3.0', '3.0', '1.0', 9, 'HM 102', NULL),
(35, 'Hospitality Accounting and Finance', 'Focus on financial principles and practices as applied to hospitality operations, including budgeting, cost control, and financial analysis.', '3.0', '3.0', '1.0', 9, 'HM 103', NULL),
(36, 'Hotel and Lodging Operations', 'Focus on the operational aspects of managing hotels and other lodging facilities, such as front office, housekeeping, and guest services.', '3.0', '3.0', '1.0', 9, 'HM 104', NULL),
(37, 'Tourism Planning and Development', 'Principles and practices involved in developing sustainable tourism destinations, including environmental, economic, and social considerations.', '3.0', '3.0', '1.0', 10, 'TM 101', NULL),
(38, 'Tourism Economics', 'Study of the economic impact of tourism on local, national, and global economies, including demand, supply, and pricing strategies.', '3.0', '3.0', '1.0', 10, 'TM 102', NULL),
(39, 'Tourism Marketing', 'Techniques for promoting tourist destinations and services, with an emphasis on digital marketing and customer behavior.', '3.0', '3.0', '1.0', 10, 'TM 103', NULL),
(40, 'Tourism Policy and Law', 'Overview of policies and regulations affecting tourism, including safety standards, environmental protection, and international tourism agreements.', '3.0', '3.0', '1.0', 10, 'TM 104', NULL),
(41, 'Event Marketing and Promotion', 'Techniques and strategies for marketing and promoting events, including social media, public relations, and sponsorships.', '3.0', '3.0', '1.0', 11, 'EM 101', NULL),
(42, 'Venue Management', 'Focus on managing event venues, including logistics, operations, and coordination with vendors and clients.', '3.0', '3.0', '1.0', 11, 'EM 102', NULL),
(43, 'Event Design and Production', 'Study of the creative aspects of event design, including themes, decorations, audiovisual setups, and attendee experience.', '3.0', '3.0', '1.0', 11, 'EM 103', NULL),
(44, 'Catering and Hospitality for Events', 'Study of food and beverage management specifically for events, including menu planning, catering services, and dietary considerations.', '3.0', '3.0', '1.0', 11, 'EM 104', NULL),
(45, 'Tourism and Leisure Marketing', 'Techniques for marketing leisure and travel products and services, including advertising, branding, and customer targeting.', '3.0', '3.0', '1.0', 12, 'TLM 101', NULL),
(46, 'Transportation and Travel Management', 'Study of transportation systems and their role in the travel and tourism industry, including airlines, buses, and railways.', '3.0', '3.0', '1.0', 12, 'TLM 102', NULL),
(47, 'Travel Law and Ethics', 'Study of legal and ethical issues in the travel industry, including contracts, liability, and consumer protection.', '3.0', '3.0', '1.0', 12, 'TLM 103', NULL),
(48, 'Leisure and Recreation Management', 'Focus on managing recreational and leisure activities, including parks, resorts, and leisure centers.', '3.0', '3.0', '1.0', 12, 'TLM 104', NULL),
(49, 'Anatomy and Physiology', 'Study of the human body and its systems, with an emphasis on how physical activity affects physical health and performance.', '3.0', '3.0', '1.0', 13, 'PE 101', NULL),
(50, 'Sports Science', 'Focus on the scientific principles behind sports and physical activities, including biomechanics, exercise physiology, and nutrition.', '3.0', '3.0', '1.0', 13, 'PE 102', NULL),
(51, 'Health and Fitness', 'Study of physical fitness, exercise routines, health promotion, and lifestyle management.', '3.0', '3.0', '1.0', 13, 'PE 103', NULL),
(52, 'Kinesiology', 'Study of human movement, focusing on the mechanical principles of the body during physical activities.', '3.0', '3.0', '1.0', 13, 'PE 104', NULL),
(53, 'Art Appreciation', 'Study of the elements and principles of art, focusing on understanding and appreciating various forms of visual arts.', '3.0', '3.0', '1.0', 14, 'CAE 101', NULL),
(54, 'Music Education', 'Introduction to teaching music in schools, including music theory, history, and practical teaching methods for different age groups.', '3.0', '3.0', '1.0', 14, 'CAE 102', NULL),
(55, 'Theater Arts and Drama', 'Study of theater production, acting, scriptwriting, and drama education in schools.', '3.0', '3.0', '1.0', 14, 'CAE 103', NULL),
(56, 'Teaching Methods in Arts Education', 'Techniques and strategies for teaching art, music, dance, and drama to students at different educational levels.', '3.0', '3.0', '1.0', 14, 'CAE 104', NULL),
(57, 'Inclusive Education', 'Exploration of inclusive educational practices and the integration of students with special needs into general education classrooms.', '3.0', '3.0', '1.0', 15, 'SNE 101', NULL),
(58, 'Assistive Technology in Special Education', 'Study of tools and technologies that assist students with disabilities in learning and communicating effectively.', '3.0', '3.0', '1.0', 15, 'SNE 102', NULL),
(59, 'Assessment and Evaluation in Special Education', 'Focus on methods and tools for assessing the learning needs and progress of students with disabilities.', '3.0', '3.0', '1.0', 15, 'SNE 103', NULL),
(60, 'Behavior Management in Special Education', 'Techniques for managing and modifying behaviors in students with disabilities, including positive reinforcement and behavior interventions.', '3.0', '3.0', '1.0', 15, 'SNE 104', NULL),
(61, 'Assessment and Evaluation in Technical Education', 'Focus on evaluating students\' practical skills, knowledge, and competencies in vocational education programs.', '3.0', '3.0', '3.0', 16, 'VTE 101', NULL),
(62, 'Workshop Management', 'Management of vocational training workshops, including resource management, equipment maintenance, and student supervision.', '3.0', '3.0', '1.0', 16, 'VTE 102', NULL),
(63, 'Technology Integration in Vocational Education', 'Exploration of how technology can be incorporated into vocational training programs to enhance learning and skill development.', '3.0', '3.0', '1.0', 16, 'VTE 103', NULL),
(64, 'Industrial Safety and Health', 'Study of safety standards, regulations, and practices in vocational training and technical work environments.', '3.0', '3.0', '1.0', 16, 'VTE 104', NULL),
(65, 'Engineering Mechanics', 'Study of forces and their effects on structures, including static equilibrium and the behavior of materials under load.', '3.0', '3.0', '1.0', 17, 'CE 101', NULL),
(66, 'Structural Analysis', 'Techniques for analyzing and designing structural elements such as beams, trusses, and frames under various load conditions.', '3.0', '3.0', '1.0', 17, 'CE 102', NULL),
(67, 'Geotechnical Engineering', 'Focus on the properties of soil and rock, foundation design, and the behavior of geotechnical systems under load.', '3.0', '3.0', '1.0', 17, 'CE 103', NULL),
(68, 'Hydraulics and Hydrology', 'Exploration of fluid mechanics in civil engineering applications, including water flow, stormwater management, and flood control systems.', '3.0', '3.0', '1.0', 17, 'CE 104', NULL),
(69, 'Building Materials and Construction', 'Study of construction materials (e.g., concrete, steel, wood) and their properties, selection, and use in architectural design.', '3.0', '3.0', '1.0', 18, 'ARCH 101', NULL),
(70, 'History of Architecture', 'Overview of architectural styles, movements, and significant works of architecture from ancient times to the present.', '3.0', '3.0', '1.0', 18, 'ARCH 102', NULL),
(71, 'Structural Systems for Buildings', 'Study of the structural systems used in buildings, such as load-bearing walls, beams, columns, and roofs.', '3.0', '3.0', '1.0', 18, 'ARCH 103', NULL),
(72, 'Urban Design and Planning', 'Study of the principles and practices in planning and designing urban spaces, focusing on public infrastructure, transportation, and environmental sustainability.', '3.0', '3.0', '1.0', 18, 'ARCH 104', NULL),
(73, 'Circuit Theory and Analysis', 'Study of electrical circuits, including techniques for analyzing resistive, capacitive, and inductive circuits.', '3.0', '3.0', '1.0', 19, 'EE 101', NULL),
(74, 'Power Systems Engineering', 'Focus on the generation, transmission, and distribution of electrical power, as well as the design and analysis of power systems.', '3.0', '3.0', '1.0', 19, 'EE 102', NULL),
(75, 'Control Systems Engineering', 'Study of control theory, feedback systems, and their applications in automatic control systems such as robotics and industrial processes.', '3.0', '3.0', '1.0', 19, 'EE 103', NULL),
(76, 'Renewable Energy Systems', 'Focus on the design and integration of renewable energy systems, including solar, wind, and hydroelectric power.', '3.0', '3.0', '1.0', 19, 'EE 104', NULL),
(77, 'Analog Electronics', 'Study of analog circuit design, including amplifiers, oscillators, and filters.', '3.0', '3.0', '1.0', 20, 'ECE 101', NULL),
(78, 'Digital Electronics', 'Focus on digital circuit design, logic gates, flip-flops, and combinational/sequential circuits, as well as digital systems like microcontrollers.', '3.0', '3.0', '1.0', 20, 'ECE 102', NULL),
(79, 'Signals and Systems', 'Focus on continuous-time and discrete-time signals, system analysis, and signal processing techniques.', '3.0', '3.0', '1.0', 20, 'ECE 103', NULL),
(80, 'Telecommunication Systems', 'Focus on modern telecommunication systems, including wireless communication, fiber optics, and satellite communication.', '3.0', '3.0', '1.0', 20, 'ECE 104', NULL),
(81, 'Fundamentals of Nursing', 'Introduction to nursing practices, including patient care, basic nursing skills, and communication with patients and healthcare teams.', '3.0', '3.0', '1.0', 21, 'NUR 101', NULL),
(82, 'Medical-Surgical Nursing', 'Study of nursing care for patients with medical and surgical conditions, including disease processes, treatments, and nursing interventions.', '3.0', '3.0', '1.0', 21, 'NUR 102', NULL),
(83, 'Mental Health Nursing', 'Focus on the care of patients with mental health disorders, including psychiatric nursing practices and therapeutic communication.', '3.0', '3.0', '1.0', 21, 'NUR 103', NULL),
(84, 'Pediatric Nursing', 'Nursing care for infants, children, and adolescents, addressing growth, development, and common childhood illnesses.', '3.0', '3.0', '1.0', 21, 'NUR 104', NULL),
(85, 'Introduction to Midwifery', 'Overview of midwifery practice, history, and role in maternal and newborn health, including an introduction to the scope of the profession.', '3.0', '3.0', '1.0', 22, 'MM 101', NULL),
(86, 'History of Architecture', 'Overview of architectural styles, movements, and significant works of architecture from ancient times to the present.', '3.0', '3.0', '1.0', 22, 'MM 102', NULL),
(87, 'Structural Systems for Buildings', 'Study of the structural systems used in buildings, such as load-bearing walls, beams, columns, and roofs.', '3.0', '3.0', '1.0', 22, 'MM 103', NULL),
(88, 'Urban Design and Planning', 'Study of the principles and practices in planning and designing urban spaces, focusing on public infrastructure, transportation, and environmental sustainability.', '3.0', '3.0', '1.0', 22, 'MM 104', NULL),
(89, 'Dental Anatomy and Physiology', 'Study of the structure and function of the human teeth, gums, and oral cavity, including the processes of mastication and speech.', '3.0', '3.0', '1.0', 23, 'DEN 101', NULL),
(90, 'Preventive Dentistry', 'Focus on the prevention of oral diseases, including techniques for dental hygiene, patient education, and preventive treatments.', '3.0', '3.0', '1.0', 23, 'DEN 102', NULL),
(91, 'Oral Pathology', 'Study of diseases that affect the oral cavity, including dental caries, periodontal disease, and oral cancer.', '3.0', '3.0', '1.0', 23, 'DEN 103', NULL),
(92, 'Orthodontics', 'Study of the diagnosis and treatment of misaligned teeth and jaws, focusing on braces, aligners, and other orthodontic appliances.', '3.0', '3.0', '1.0', 23, 'DEN 104', NULL),
(93, 'Pharmaceutics', 'Introduction to the formulation and preparation of pharmaceutical products, including drug delivery systems, dosage forms, and packaging.', '3.0', '3.0', '1.0', 24, 'PHAR 101', NULL),
(94, 'Pharmacy Law and Ethics', 'Study of the laws, regulations, and ethical considerations governing pharmacy practice, including the regulation of medications and pharmacy licensure.', '3.0', '3.0', '1.0', 24, 'PHAR 102', NULL),
(95, 'Clinical Pharmacy', 'Focus on the role of pharmacists in clinical settings, including medication therapy management, patient counseling, and drug interactions.', '3.0', '3.0', '1.0', 24, 'PHAR 103', NULL),
(96, 'Medicinal Chemistry', 'Study of the chemical properties of drugs and their relationship to biological activity, focusing on drug design and discovery.', '3.0', '3.0', '1.0', 24, 'PHAR 104', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DepartmentID` int NOT NULL,
  `DepartmentName` varchar(255) NOT NULL,
  `Dean` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentID`, `DepartmentName`, `Dean`) VALUES
(1, 'CCS', 'Lea an H. Tandaan'),
(2, 'CAS', 'Maria C. Santos'),
(3, 'CTHBM', 'John R. Mendoza'),
(4, 'CTDE', 'Anna L. Reyes'),
(5, 'CEA', 'Michael V. Cruz'),
(6, 'CHS', 'Sophia G. Dela Torre');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `InstructorID` int NOT NULL,
  `UserID` int DEFAULT NULL,
  `FirstName` varchar(100) DEFAULT NULL,
  `MiddleName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `ProgramID` int NOT NULL,
  `ProgramName` varchar(255) NOT NULL,
  `DepartmentID` int DEFAULT NULL,
  `ProgramAbbr` varchar(100) NOT NULL,
  `ProgramDescription` text NOT NULL,
  `popular` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`ProgramID`, `ProgramName`, `DepartmentID`, `ProgramAbbr`, `ProgramDescription`, `popular`) VALUES
(1, 'BSIT', 1, 'Bachelor of Science in Information Technology', 'Practical application of technology in business and industry.', 0),
(2, 'BSCS', 1, 'Bachelor of Science in Computer Science', 'More theoretical and mathematical aspects of computing.', 1),
(3, 'BSIS', 1, 'Bachelor of Science in Information Systems', 'The intersection of business and technology, particularly in using IT to manage business operations and decision-making.', NULL),
(4, 'BLIS', 1, 'Bachelor of Library and Information Science', 'Managing information resources in libraries, archives, and information centers.', NULL),
(5, 'BS Bio', 2, 'Bachelor of Science in Biology', 'Prepares students for careers in the life sciences, including medicine, research, or environmental science.', 1),
(6, 'BSES', 2, 'Bachelor of Science in Environmental Science', 'Focuses on the scientific study of the environment and sustainability.', NULL),
(7, 'BSPS', 2, 'Bachelor of Science in Political Science', 'Offers a deep understanding of political theory, systems of government, international relations, and policy-making.', 0),
(8, 'BS Math', 2, 'Bachelor of Science in Mathematics', 'Students study calculus, statistics, and advanced mathematical theories.', 1),
(9, 'BSHM', 3, 'Bachelor of Science in Hospitality Management', 'Focuses on hotel and restaurant operations, event planning, and customer service.', 0),
(10, 'BSTM', 3, 'Bachelor of Science in Tourism Management', 'Focuses on travel planning, tour guiding, tourism marketing, and event management.', 1),
(11, 'BSEM', 3, 'Bachelor of Science in Events Management', 'Specializes in planning and managing events like weddings, conferences, and festivals.', NULL),
(12, 'BSCLO', 3, 'Bachelor of Science in Travel and Leisure Management', 'Focuses on preparing students for careers on cruise ships.', 0),
(13, 'BPE', 4, 'Bachelor of Physical Education', 'This program focuses on preparing students to become professionals in physical fitness, sports science, and education.', NULL),
(14, 'BCAE', 4, 'Bachelor of Culture and Arts Education', 'This program prepares students to teach and promote the appreciation of arts and culture.', 1),
(15, 'BSNE', 4, 'Bachelor of Special Needs Education', 'This degree prepares educators to support students with special needs, including those with physical and learning disabilities.', NULL),
(16, 'BTVTE', 2, 'Bachelor of Technical-Vocational Teacher Education', 'This program is designed for students who want to teach technical and vocational subjects.', NULL),
(17, 'BSCE', 5, 'Bachelor of Science in Civil Engineering', 'This program prepares students for careers in designing, building, and maintaining infrastructure projects such as roads, bridges, buildings, and water systems.', 0),
(18, 'BSA', 5, 'Bachelor of Science in Architecture', 'Program designed to prepare students for a career in the design, planning, and construction of buildings and other physical structures.', 0),
(19, 'BSEE', 5, 'Bachelor of Science in Electrical Engineering', 'This program focuses on the design, development, testing, and supervision of electrical systems and equipment.', 0),
(20, 'BSECE', 5, 'Bachelor of Science in Electronics and Communications Engineering', 'This program emphasizes electronics and communication systems, covering both analog and digital systems, and preparing students to work with complex telecommunications infrastructure.', 0),
(21, 'BSN', 6, 'Bachelor of Science in Nursing', 'Program is designed to prepare students for careers as registered nurses (RNs).', 1),
(22, 'BSM', 6, 'Bachelor of Science in Midwifery', 'Programs prepare students to provide prenatal, delivery, and postnatal care to women.', NULL),
(23, 'BSP', 6, 'Bachelor of Science in Pharmacy', 'Focuses on the study of pharmaceutical sciences, including drug formulation, pharmaceutical chemistry, pharmacology, and patient care.', NULL),
(24, 'BSD', 6, 'Bachelor of Science in Dentistry', 'This program prepares students to become dentists, covering areas such as oral anatomy, dental radiology, periodontology (gum diseases), and restorative dentistry.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studentinformation`
--

CREATE TABLE `studentinformation` (
  `StudentID` int NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Gender` enum('Male','Female','Other') DEFAULT NULL,
  `Nationality` varchar(50) NOT NULL,
  `ContactNumber` int NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `StreetAddress` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Province` varchar(50) NOT NULL,
  `Baranggay` varchar(50) NOT NULL,
  `PostalCode` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `studentinformation`
--

INSERT INTO `studentinformation` (`StudentID`, `FirstName`, `MiddleName`, `LastName`, `Gender`, `Nationality`, `ContactNumber`, `EmailAddress`, `StreetAddress`, `City`, `Province`, `Baranggay`, `PostalCode`) VALUES
(1, 'John', 'Doe', 'Smith', 'Male', 'American', 1234567890, 'john.smith@example.com', '123 Elm St', 'Springfield', 'IL', 'Downtown', 62701),
(2, 'Jane', 'A.', 'Doe', 'Female', 'Canadian', 987654321, 'jane.doe@example.com', '456 Maple Ave', 'Toronto', 'ON', 'Central', 23);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dateofbirth` date DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `yearlevel` int DEFAULT NULL,
  `section` varchar(50) DEFAULT NULL,
  `status` enum('pass','fail','enrolled','registered') DEFAULT NULL,
  `formerschoolname` varchar(100) NOT NULL,
  `formerschooladdress` varchar(255) NOT NULL,
  `graduationyear` date NOT NULL,
  `department` varchar(100) NOT NULL,
  `program` varchar(100) NOT NULL,
  `studID` int DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `userID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('student','instructor','admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `role`) VALUES
(53, 'admin', '$2y$10$F8jzOIeiUjup8xJXh9hrp.nQt7Ak96lYMsrbUX0AQZ12gMVz8BbAC', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`CourseID`),
  ADD KEY `ProgramID` (`ProgramID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`InstructorID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`ProgramID`),
  ADD KEY `DepartmentID` (`DepartmentID`);

--
-- Indexes for table `studentinformation`
--
ALTER TABLE `studentinformation`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studentinformation`
--
ALTER TABLE `studentinformation`
  MODIFY `StudentID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`ProgramID`) REFERENCES `program` (`ProgramID`);

--
-- Constraints for table `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `instructors_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`userID`) ON DELETE SET NULL;

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`DepartmentID`) REFERENCES `department` (`DepartmentID`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
