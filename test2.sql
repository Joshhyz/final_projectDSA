-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2025 at 04:51 PM
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
-- Database: `test2`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `studentID` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `studentID`, `name`, `email`, `contact`) VALUES
(1, '2023-09483-MN-0', 'ABNE, VANESSA MAE BALMERA', 'vanessaabne19@gmail.com', '09474272988'),
(2, '2023-11272-MN-0', 'ADVIENTO, IAN PAUL CAASI', 'ianp.adviento@gmail.com', '09292178712'),
(3, '2023-10494-MN-0', 'ANTOLIHAO, KATHLEEN LAGUIDAO', 'kathleenlaguidao@gmail.com', '09692385765'),
(4, '2023-10280-MN-0', 'ARDALES, CARL KENNETH ARGOSO', 'carlkennethardales16@gmail.com', '09817442888'),
(5, '2023-10108-MN-0', 'BAUTISTA, RAMON JR. MATIAS', 'ramonbautista016@gmail.com', '09218379511'),
(6, '2023-11140-MN-0', 'BAUTISTA, JOHN STEPHEN LOPEZ', 'johnstephenbautista722@gmail.com', '09952693806'),
(7, '2023-12559-MN-0', 'CALISIN, MARIA ANDREA INOCENCIO', 'mariaandreacal28@gmail.com', ''),
(8, '2023-13980-MN-0', 'CASTRO, BARON JAMES JULIAN', 'baron2003castro@gmail.com', '09552036107'),
(9, '2023-13534-MN-0', 'CENETA, AERON LINUS CAMARA', 'aeronlinus23@gmail.com', '09992207736'),
(10, '2023-08569-MN-0', 'CONDESA, TED HARVEY NAVARRO', 'teddddd098@gmail.com', '09957115180'),
(11, '2023-12555-MN-0', 'CONDEZ, CARYLLE JANE PELAYO', 'caryllejane.condez@gmail.com', '09938465025'),
(12, '2023-10487-MN-0', 'DE GUZMAN, MICHELLE FRANCISCO', 'michelledeguzman343@gmail.com', '09948081762'),
(13, '2023-12603-MN-0', 'DEASIO, MARK LORENCE RODRIGUEZ', 'marklorencedeasio23@gmail.com', '09093606545'),
(14, '2023-10594-MN-0', 'DELOS REYES, CYDNEY BALDOZA', 'cydneng99@gmail.com', '09947017058'),
(15, '2023-11760-MN-0', 'ESPALDON, TRISHIA MAE RAZ', 'trishiaespaldon0@gmail.com', '09614819285'),
(16, '2023-10055-MN-0', 'ESTEBAN, JAMES HARLEY DIZON', 'estebanjames67@gmail.com', '09079761661'),
(17, '2023-12802-MN-0', 'FECUNDO, ELTHAN ZOHN CABURAL', 'elthan.zohn04@gmail.com', '09087769179'),
(18, '2023-11064-MN-0', 'GUERRERO, MARK GERALD VIRIDIANO', 'markgeraldguerrero123@gmail.com', '09457289450'),
(19, '2023-10885-MN-0', 'ILLUSTRISIMO, AIROS CABANTE', 'airosillustrisimo05@gmail.com', ''),
(20, '2023-10041-MN-0', 'JAMOT, JOHN VINCENT SORIANO', 'JVincentsoriano027@gmail.com', '09363035016'),
(21, '2023-14057-MN-0', 'LACTAO, JIGS CELINO', 'Jigs02lactao@gmail.com', '09671357815'),
(22, '2023-14061-MN-0', 'LACTAO, MARK ANDREI', 'markandreilactao@gmail.com', '09952658423'),
(23, '2023-08022-MN-0', 'LAMONTE, DANIEL MATHEW GABRINAO', 'mathewlamonte@gmail.com', '09555170818'),
(24, '2023-13856-MN-0', 'MANALASTAS, JUSTIN BUSTAMANTE', 'manalastasjustin22@gmail.com', '09610822436'),
(25, '2023-07976-MN-0', 'MANATO, MARIEM OLLANO', 'manato.mariem17@gmail.com', '09682168538'),
(26, '2023-10557-MN-0', 'MANILE, MANIEYLENE	ARANETA', 'm.manile28@gmail.com', '09938764137'),
(27, '2023-16436-MN-0', 'MECEDA, SEAN MARTEN PHARELL HOMOL', 'seanmeceda19@gmail.com', '09063535928'),
(28, '2023-07965-MN-0', 'MESA, AUDREY NICOLE QUITQUITAN', 'auni.mesa@gmail.com', '09980418368'),
(29, '2023-10947-MN-0', 'NAMIAS, MARY NORELLE PARTIBLE', 'norellenamias103004@gmail.com', ''),
(30, '2023-13898-MN-0', 'PAGHUBASAN, NORMAE BADAO', 'maebadao@gmail.com', '09996860752'),
(31, '2023-11094-MN-0', 'PALALLOS, IAN LAMESA', 'pupmcpalallosian@gmail.com', '09264357674'),
(32, '2023-10307-MN-0', 'PEDROSA, MARCUS CEDRIC SALVADOR', 'pedrosamarcuscedric@gmail.com', '09294889404'),
(33, '2023-10148-MN-0', 'PETELOS, KRISHA MAE AMBROCIO', 'krishapetelos20@gmail.com', '09565596270'),
(34, '2023-07140-MN-0', 'PINEDA, MA. ANGELICA LOUISSE ANTONIO', 'mangelpineda34@gmail.com', '09702131044'),
(35, '2023-11124-MN-0', 'PINEDA, QUINN HARVEY GUBA', 'adenipquinnyevrah@gmail.com', '09398428449'),
(36, '2023-09072-MN-0', 'POLICARPIO, CRAESHA REIGNE OAFERICUA', 'craeshareignepolicarpio@gmail.com', '09317839882'),
(37, '2023-09671-MN-0', 'RESTERIO, SOPHIA ELLENA MAE DOINOG', 'sophiaresterio02@gmail.com', '09393805255'),
(38, '2023-14013-MN-0', 'ROJO, MATTHEW QUIÑO', 'rojomattmatt@gmail.com', ''),
(39, '2023-13549-MN-0', 'SANTIAGO, JOHN MICHAEL BUIZA', 'jmsantiago1004@gmail.com', '09163689280'),
(40, '2023-09335-MN-0', 'STA. ANA, MARCK NELSON CARLENGGA', 'marcknelsoncarlenggastaana@gmail.com', '09352414903'),
(41, '2023-12553-MN-0', 'TEMPLO, AMITHAI VITERBO', 'amithai100405gmail.com', '09516049329'),
(42, '2023-16728-MN-0', 'URRIZA, JAMARIC JES SERANDON', 'jamaricjes@gmail.com', '09617435820'),
(43, '2023-09743-MN-0', 'VILLANUEVA, SHANIA JARRISSE SALIDO', 'shaniajarrissevillanueva@gmail.com', '09078270504');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
