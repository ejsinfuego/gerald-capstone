-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2023 at 08:51 AM
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
-- Database: `kkbn`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievement`
--

CREATE TABLE `achievement` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `achievement_name` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `completion_date` date NOT NULL,
  `goal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `achievement`
--

INSERT INTO `achievement` (`id`, `user_id`, `achievement_name`, `description`, `completion_date`, `goal_id`) VALUES
(1, 4, 'workout', 'Jogging\n01:00:00\nlow', '0000-00-00', 0),
(6, 2, 'meal', 'breakfast\n3 slices Raisin wheat bread \r\n2 pcs scrambled egg coffee with sugar ', '2023-10-25', 2),
(18, 2, 'meal', 'lunch', '2023-10-26', 2),
(28, 9, 'meal', 'lunch', '2023-10-26', 18),
(32, 9, 'meal', 'breakfast', '2023-10-26', 21);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Underweight'),
(2, 'Normal'),
(4, 'Overweight'),
(5, 'Obese');

-- --------------------------------------------------------

--
-- Table structure for table `exercise_activity`
--

CREATE TABLE `exercise_activity` (
  `id` int(11) NOT NULL,
  `activity_name` varchar(100) NOT NULL,
  `intensity_level` varchar(10) NOT NULL,
  `duration` time NOT NULL,
  `calories_burned` float NOT NULL,
  `category_id` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exercise_activity`
--

INSERT INTO `exercise_activity` (`id`, `activity_name`, `intensity_level`, `duration`, `calories_burned`, `category_id`) VALUES
(1, 'Jogging', 'low', '01:00:00', 250, 1),
(2, 'Jogging', 'normal', '02:00:00', 300, NULL),
(3, 'Jogging', 'high', '00:00:03', 500, NULL),
(4, 'Push Up', 'normal', '00:00:00', 0, NULL),
(5, 'squat', 'low', '00:30:00', 200, 2);

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `type` varchar(8) DEFAULT NULL,
  `target_metrics` varchar(50) DEFAULT NULL,
  `target_date` date NOT NULL,
  `progress_tracking` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`id`, `user_id`, `type_id`, `type`, `target_metrics`, `target_date`, `progress_tracking`) VALUES
(1, 4, 37, 'meal', NULL, '2023-10-20', NULL),
(2, 4, 26, 'meal', NULL, '2023-10-23', NULL),
(3, 4, 31, 'meal', NULL, '2023-10-27', NULL),
(4, 4, 2, 'meal', NULL, '2023-10-25', NULL),
(5, 2, 37, 'meal', NULL, '2023-10-30', NULL),
(9, 2, 26, 'meal', NULL, '2023-10-26', NULL),
(16, 2, 31, 'meal', NULL, '2023-10-28', NULL),
(18, 9, 26, 'meal', NULL, '2023-10-28', NULL),
(21, 9, 37, 'meal', NULL, '2023-10-29', NULL),
(22, 9, 31, 'meal', NULL, '2023-10-28', NULL),
(23, 9, 2, 'meal', NULL, '2023-10-31', NULL),
(24, 9, 2, 'meal', NULL, '2023-10-30', NULL),
(25, 9, 2, 'meal', NULL, '2023-10-29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `health_metrics`
--

CREATE TABLE `health_metrics` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `age` int(3) DEFAULT NULL,
  `bmi` float NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `health_metrics`
--

INSERT INTO `health_metrics` (`id`, `user_id`, `height`, `weight`, `age`, `bmi`, `category_id`) VALUES
(2, 2, 165, 45, 24, 16.53, 1),
(3, 4, 165, 45, 22, 16.53, 1),
(4, 9, 165, 45, NULL, 16.5289, 1),
(5, 10, 165, 45, NULL, 16.5289, 1),
(6, 11, 165, 45, NULL, 16.5289, 1),
(7, 12, 165, 45, NULL, 16.5289, 1);

-- --------------------------------------------------------

--
-- Table structure for table `meal_plans`
--

CREATE TABLE `meal_plans` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `plan_name` varchar(50) NOT NULL,
  `daily_meal_schedule` varchar(100) NOT NULL,
  `portion_sizes` varchar(100) NOT NULL,
  `category_id` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meal_plans`
--

INSERT INTO `meal_plans` (`id`, `user_id`, `plan_name`, `daily_meal_schedule`, `portion_sizes`, `category_id`) VALUES
(1, 0, 'breakfast', 'day1', '1 serving overnight oats. ', 5),
(2, 0, 'breakfast', 'day2', '1 cup rice Tomato Omelette (2 eggs)', 5),
(3, NULL, 'breakfast', 'day3', '3 pcs pandesal\r\n3 slices cheddar cheese', 5),
(4, NULL, 'breakfast', 'day4', '3 slices wheat bread\r\n2 slices cheddar cheese', 5),
(5, NULL, 'breakfast', 'day5', '1 pc peanut butter sandwich\r\n1 cup low fat milk', 5),
(6, NULL, 'lunch', 'day1', '1 cup plain rice 90 grams roast chicken\r\n1 cup broccoli/carrots', 5),
(7, NULL, 'lunch', 'day2', '1 cup pasta in tomato sauce\r\n120g fish 1/2 cup canned mushrooms', 5),
(8, NULL, 'lunch', 'day3', '1 cup rice\r\n90 match-box size beef(nilaga)\r\n1 cup veggies', 5),
(9, NULL, 'lunch', 'day4', '1 cup rice\r\n120g grilled tilapia\r\n1 cup cucumbers', 5),
(10, NULL, 'lunch', 'day5', '1 cup rice\r\n90g lean pork adobo\r\n1 cup carrots', 5),
(11, NULL, 'snack', 'day1', '1pc cheddar cheese sandwich\r\n1pc banana', 5),
(12, NULL, 'snack', 'day1', '3pcs pandesal\r\n3 slices cheddar cheese', 5),
(13, NULL, 'snack', 'day4', '1 cup noodles with egg\r\n1 cup grapes', 5),
(14, NULL, 'snack', 'day5', '2pcs white bread \r\n1pc large apple', 5),
(16, NULL, 'dinner', 'day1', '1 cup plain rice\r\n90 grams roast chicken\r\n1 cup broccoli / carrots\r\n', 5),
(17, NULL, 'dinner', 'day2', '1 cup pasta in tomato sauce\r\n120g fish 1/2 cup canned mushrooms', 5),
(18, NULL, 'dinner', 'day3', '1 cup rice\r\n90 match-box size beef(nilaga)\r\n1 cup veggies', 5),
(19, NULL, 'dinner', 'day4', '1 cup rice\r\n60g grilled tilapia\r\n1 cup cucumber', 5),
(20, NULL, 'dinner', 'day5', '1 cup rice\r\n60g lean pork adobo \r\n1/2 cup carrots', 5),
(22, NULL, 'breakfast', 'day2', '1 cup rice pcs ponkan tea with suger\r\n1/2 corned beef', 1),
(23, NULL, 'breakfast', 'day3', '2 pcs large pandesal \r\n2 slices cheese\r\n1 large apple coffee with sugar', 1),
(24, NULL, 'breakfast', 'day4\r\n', '3 slices raisin wheat bread\r\n3 tbsp peanut butter water\r\ntea with sugar', 1),
(25, NULL, 'breakfast', 'day5', '1 cup fried rice \r\n4 pcs sardines\r\n1 large banana coffee with sugar', 1),
(26, NULL, 'lunch', 'day1', '1 cup rice\r\n1.5 ginisang amplaya with egg', 1),
(27, NULL, 'lunch ', 'day2', '1 cup rice \r\n1 cup crispy dilis\r\n1 cup ensaladang kamatis', 1),
(28, NULL, 'lunch', 'day3', '1 cup rice \r\n1/2 canned tuna in oil\r\n1 cup pipino salad', 1),
(29, NULL, 'lunch', 'day4', '1 cup rice\r\n1/2 cup ginisang sayote with ground posk', 1),
(30, NULL, 'lunch', 'day5', '1 cup rice\r\n2 servings chicken liver\r\n1 cup steamed bokchoy', 1),
(31, NULL, 'snack', 'day1', '2pcs banana cue\r\n4 tbsp peanut\r\n1 cup rice', 1),
(32, NULL, 'dinner', 'day1', '1/2 leftover ginisang amplaya with egg\r\n3 pcs fried fish (galunggong)', 1),
(33, NULL, 'breakfast', 'day1', 'brown rice\r\nTomato omelette\r\nTea', 2),
(34, NULL, 'lunch', 'day1', 'rice \r\nchicked tinola with veggies', 2),
(35, NULL, 'snack', 'day1', 'wheat bread\r\npeanun butter\r\ngrapes', 2),
(36, NULL, 'dinner', 'day1', 'brown rice\r\nginisang monggo with amplaya', 2),
(37, NULL, 'breakfast', 'day1', '3 slices Raisin wheat bread \r\n2 pcs scrambled egg coffee with sugar ', 1),
(39, NULL, 'breakfast', 'day5', '1 egg\r\n1 rice', 4),
(40, NULL, 'breakfast', 'day6', '1 rice\r\n1 potato', 2),
(41, NULL, 'breakfast', 'day7', '1 rice\r\n1 peace', 4);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `recipe_name` varchar(200) NOT NULL,
  `ingredients` varchar(1000) NOT NULL,
  `nutritional_information` varchar(500) NOT NULL,
  `category_id` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `age` int(3) DEFAULT NULL,
  `gender` varchar(20) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` bigint(11) DEFAULT NULL,
  `password` varchar(16) NOT NULL,
  `goal_id` int(11) DEFAULT NULL,
  `user_type` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `age`, `gender`, `date_of_birth`, `email`, `address`, `phone_number`, `password`, `goal_id`, `user_type`) VALUES
(2, 'Edzel John', 'Sinfuego', 25, 'male', NULL, 'ej@mail.com', 'Sample Address', 2147483647, 'password', NULL, 1),
(4, 'Test ', 'User', NULL, 'male', NULL, 'test@mail.com', NULL, NULL, 'password', NULL, 1),
(5, 'admin', 'test', NULL, 'male', '2023-10-31', 'admin@mail.com', NULL, NULL, 'password', NULL, 0),
(9, 'Maria', 'Mercedes', 22, 'female', NULL, 'maria@mail.com', '                                        sample address', 987654321, 'password', NULL, 1),
(10, 'Ej', 'Sinfuego', NULL, 'male', NULL, 'ej@mail.com', 'sample address', NULL, 'password', NULL, 1),
(11, 'Sample', 'User', 45, 'male', NULL, 'sample@mail.com', '                                                                                                                                                                                                        sample', 2147483647, 'password', NULL, 1),
(12, 'New', 'User', 45, 'male', NULL, 'new@mail.com', 'smaple ddress', 9123459879, 'password', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_activity_id`
--

CREATE TABLE `user_activity_id` (
  `user_activity_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_activity_id`
--

INSERT INTO `user_activity_id` (`user_activity_id`, `activity_id`, `user_id`, `date_start`, `date_end`) VALUES
(1, 1, 4, '2023-10-28 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 2, '2023-10-28 00:00:00', '2023-10-26 00:00:00'),
(4, 2, 9, '2023-10-26 00:00:00', '2023-10-26 00:00:00'),
(14, 1, 9, '2023-10-26 00:00:00', '2023-10-26 00:00:00'),
(15, 3, 9, '2023-10-26 00:00:00', '2023-10-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `workout_plans`
--

CREATE TABLE `workout_plans` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `plan_name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `exercise_id` int(11) DEFAULT NULL,
  `category_id` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workout_plans`
--

INSERT INTO `workout_plans` (`id`, `user_id`, `plan_name`, `description`, `duration`, `exercise_id`, `category_id`) VALUES
(1, 9, '', '', '', 2, NULL),
(2, 9, '', '', '', 1, NULL),
(3, 9, '', '', '', 3, NULL),
(4, 9, '', '', '', 5, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `goal_id_achievement` (`goal_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercise_activity`
--
ALTER TABLE `exercise_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health_metrics`
--
ALTER TABLE `health_metrics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_health_metrics` (`user_id`);

--
-- Indexes for table `meal_plans`
--
ALTER TABLE `meal_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_index_meals` (`user_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_index_id` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `health_goal_id` (`goal_id`);

--
-- Indexes for table `user_activity_id`
--
ALTER TABLE `user_activity_id`
  ADD UNIQUE KEY `user_activity_index` (`user_activity_id`);

--
-- Indexes for table `workout_plans`
--
ALTER TABLE `workout_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exercise_index_workout` (`exercise_id`),
  ADD KEY `category_index` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievement`
--
ALTER TABLE `achievement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exercise_activity`
--
ALTER TABLE `exercise_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `health_metrics`
--
ALTER TABLE `health_metrics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `meal_plans`
--
ALTER TABLE `meal_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_activity_id`
--
ALTER TABLE `user_activity_id`
  MODIFY `user_activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `workout_plans`
--
ALTER TABLE `workout_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
