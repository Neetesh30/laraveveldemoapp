-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2021 at 04:03 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctorappointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagepath` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applogoimagepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applogofaviconimagepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_doctorapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_contactno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phoneno`, `imagepath`, `appname`, `applogoimagepath`, `applogofaviconimagepath`, `about_doctorapp`, `app_contactno`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'adminneetesh', 'admin@admin.com', '9999999999', 'admin_id_1_1626696306.jpg', 'Doctor Cure', 'admin_id_logo_1630844118.jpg', 'admin_id_favlogo_1630844118.png', NULL, '9768300737', '2021-07-18 05:42:28', '$2y$10$Jsh8Kyhd0fsNBcZQZcjKVOdjae3U4TmITwfULmGXiLwJ6NpnRvJPm', 'M2ick0Rv7XceiCt8WktXjARsxK62v1n9bW6IhK2QKitAEfud5YvJlSxwpjB6', '2021-07-18 05:42:28', '2021-09-05 06:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `booked_appointments`
--

CREATE TABLE `booked_appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patientid` bigint(20) NOT NULL,
  `doctorid` bigint(20) NOT NULL,
  `appointment_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_dayoftheweek` enum('sunday','monday','tuesday','wednesday','thursday','friday','saturday') COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_type` enum('Walk In','Video Call') COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_status` enum('Confirmed','Cancelled','Re Scheduled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_paidon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` enum('Paid','Not Paid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `doctor_action` enum('Not Completed','Completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Completed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booked_appointments`
--

INSERT INTO `booked_appointments` (`id`, `patientid`, `doctorid`, `appointment_date`, `appointment_time`, `appointment_dayoftheweek`, `appointment_purpose`, `appointment_type`, `appointment_status`, `payment_amount`, `payment_paidon`, `payment_status`, `created_at`, `updated_at`, `doctor_action`) VALUES
(1, 1, 1, '2021-09-04', '03:20 pm - 03:30 pm', 'saturday', 'I have fever', 'Walk In', 'Confirmed', '100', '2021-09-04 17:29:10', 'Paid', '2021-09-04 06:29:10', '2021-09-04 06:29:10', 'Not Completed');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneno` bigint(20) NOT NULL,
  `dateofbirth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aboutme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialityid` int(11) NOT NULL,
  `imagepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clinic_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clinic_addr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clinic_imagepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_fees` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu_degree` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu_college` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu_yearcompleted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp_hospitalname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp_fromtime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp_totime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp_designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `awards_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `awards_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adminid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `email`, `password`, `phoneno`, `dateofbirth`, `aboutme`, `gender`, `status`, `specialityid`, `imagepath`, `clinic_name`, `clinic_addr`, `clinic_imagepath`, `address`, `city`, `state`, `zipcode`, `country`, `doctor_fees`, `services`, `specialization`, `edu_degree`, `edu_college`, `edu_yearcompleted`, `exp_hospitalname`, `exp_fromtime`, `exp_totime`, `exp_designation`, `awards_name`, `awards_year`, `membership_name`, `adminid`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Neetesh Singh', 'doctor1@doctor.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 9768300737, '1992-11-30', 'Hello I am Doctor Neetesh and I am a Surgeon', 'male', 'active', 2, 'doctor_id_1_1630506616.png', 'Nitesh Dental DB Dummy Clinic', 'DB Jangid estate, thane India', 'doctor_id_1_16306707590.jpg,doctor_id_1_16306707591.jpg,doctor_id_1_16306707592.jpg,doctor_id_1_16306706560.jpg', 'My DB address Estate', 'Mira Bhayandar', 'Maharashtra', 401107, 'India', '200', 'Tooth Service, Heart Surgeon', 'Child Care, Heart Surgeon', 'Bachelor Db Degree', 'Medical College', '1980', 'cure hospital', '2001-06-06', '2021-06-24', 'Senior Doctor', 'Humanitarian Award', '2010', 'Doctor union Club', '1', NULL, NULL, '2021-07-22 11:50:17', '2021-09-03 06:35:59'),
(2, 'Vijay Chauhan', 'doctor2@doctor.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 9999999999, '', NULL, 'male', 'active', 6, 'doctor_id_2_1628595451.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, '2021-08-10 05:52:28', '2021-08-10 06:13:55'),
(3, 'Malini Sharma', 'doctor3@doctor.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 9999999999, '', NULL, 'female', 'active', 7, 'doctor_id_3_1628595517.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, '2021-08-10 06:05:10', '2021-08-10 06:12:59'),
(4, 'doctor surgeon two', 'doctor4@doctor.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 9999999999, NULL, NULL, 'male', 'active', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, '2021-08-11 03:10:20', '2021-08-11 03:10:20'),
(5, 'doctor physician two', 'doctor5@doctor.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 9999999999, NULL, NULL, 'male', 'active', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, '2021-08-11 03:10:52', '2021-08-11 03:10:52'),
(6, 'doctor earnose one', 'doctor6@doctor.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 9999999999, NULL, NULL, 'male', 'active', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, '2021-08-11 03:11:50', '2021-08-11 03:11:50'),
(7, 'doctor earnose two', 'doctor7@doctor.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 9999999999, NULL, NULL, 'male', 'active', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, '2021-08-11 03:12:59', '2021-08-11 03:12:59'),
(8, 'doctor gastro two', 'doctor8@doctor.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 9999999999, NULL, NULL, 'male', 'active', 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, '2021-08-11 03:13:32', '2021-08-11 03:13:32'),
(9, 'doctor pediatrician two', 'doctor9@doctor.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 9999999999, NULL, NULL, 'male', 'active', 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, '2021-08-11 03:14:30', '2021-08-11 03:14:30'),
(10, 'doctor physician one', 'doctor10@doctor.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 9999999999, NULL, NULL, 'male', 'active', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, '2021-08-11 03:17:08', '2021-08-11 03:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2021_07_16_172031_create_admins_table', 1),
(9, '2021_07_20_101212_create_specialities_table', 2),
(14, '2021_07_21_165323_create_doctors_table', 3),
(15, '2021_07_23_161510_create_scheduledocappts_table', 4),
(19, '2021_08_02_105725_create_patients_table', 5),
(20, '2021_08_06_132145_rename_datatype_in_patient_table', 6),
(22, '2021_08_14_074833_add_booking_column_schedule', 7),
(28, '2021_08_16_105749_create_booked_appointments_table', 8),
(30, '2021_08_18_164657_create_payment_records_table', 9),
(31, '2021_08_21_093501_add_column_in_bookingappointment', 10),
(32, '2021_09_01_081947_add_date_column_in_scheduledocaapts', 11),
(35, '2021_09_01_114919_add_more_column_in_doctors', 12),
(37, '2021_09_04_170443_add_more_column_in_admin_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneno` bigint(20) NOT NULL,
  `dateofbirth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bloodgrp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `email`, `password`, `phoneno`, `dateofbirth`, `bloodgrp`, `gender`, `imagepath`, `address`, `city`, `state`, `zipcode`, `country`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Neetesh Singh', 'neetesh652@gmail.com', '$2y$10$OsT5Y/LdNu6yl8E/2ViT0OuUG4fiowNyuKI6f0Pw4PCDjYuBwtYbe', 9768300737, '1992-11-30', 'B+', 'male', 'patient_id_1_1628158175.jpg', 'Jangid Complex Rd', 'Mira Bhayandar', 'Maharashtra', 401107, 'India', '2021-08-05 04:06:37', 'fE0LMbzQqVlH311Aw2q8GsHXSBKSsC6XgdV5k1derUwEmB470p1X36jrG3ZG', '2021-08-05 04:06:37', '2021-08-08 04:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `payment_records`
--

CREATE TABLE `payment_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patientid` bigint(20) NOT NULL,
  `payment_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_paidon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_records`
--

INSERT INTO `payment_records` (`id`, `patientid`, `payment_amount`, `payment_paidon`, `payment_method`, `created_at`, `updated_at`) VALUES
(1, 1, '100', '2021-08-21 12:49:33', 'Debit Card', '2021-08-21 01:49:33', '2021-08-21 01:49:33'),
(2, 1, '100', '2021-08-21 12:53:49', 'Debit Card', '2021-08-21 01:53:49', '2021-08-21 01:53:49'),
(3, 1, '100', '2021-08-21 12:55:17', 'Debit Card', '2021-08-21 01:55:17', '2021-08-21 01:55:17'),
(4, 1, '100', '2021-08-21 12:57:58', 'Debit Card', '2021-08-21 01:57:58', '2021-08-21 01:57:58'),
(5, 1, '100', '2021-08-21 13:00:27', 'Debit Card', '2021-08-21 02:00:27', '2021-08-21 02:00:27'),
(6, 1, '100', '2021-08-23 21:32:07', 'Debit Card', '2021-08-23 10:32:07', '2021-08-23 10:32:07'),
(7, 1, '100', '2021-08-23 21:32:38', 'Debit Card', '2021-08-23 10:32:38', '2021-08-23 10:32:38'),
(8, 1, '100', '2021-08-30 17:58:55', 'Debit Card', '2021-08-30 06:58:55', '2021-08-30 06:58:55'),
(9, 1, '100', '2021-09-01 13:42:23', 'Debit Card', '2021-09-01 02:42:23', '2021-09-01 02:42:23'),
(10, 1, '100', '2021-09-01 13:55:11', 'Debit Card', '2021-09-01 02:55:11', '2021-09-01 02:55:11'),
(11, 1, '100', '2021-09-01 16:43:35', 'Debit Card', '2021-09-01 05:43:35', '2021-09-01 05:43:35'),
(12, 1, '100', '2021-09-01 16:45:18', 'Debit Card', '2021-09-01 05:45:18', '2021-09-01 05:45:18'),
(13, 1, '100', '2021-09-04 17:29:10', 'Debit Card', '2021-09-04 06:29:10', '2021-09-04 06:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `scheduledocappts`
--

CREATE TABLE `scheduledocappts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorid` int(11) NOT NULL,
  `dayoftheweek` enum('sunday','monday','tuesday','wednesday','thursday','friday','saturday') COLLATE utf8mb4_unicode_ci NOT NULL,
  `slotduration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starttime` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `endtime` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_status` enum('unbooked','booked') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unbooked',
  `booking_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scheduledocappts`
--

INSERT INTO `scheduledocappts` (`id`, `doctorid`, `dayoftheweek`, `slotduration`, `starttime`, `endtime`, `booking_status`, `booking_date`, `created_at`, `updated_at`) VALUES
(92, 1, 'sunday', '10', '09:20 am - 09:30 am', '09:20 am - 09:30 am', 'unbooked', '', '2021-08-14 03:55:53', '2021-08-14 03:55:53'),
(93, 1, 'sunday', '10', '09:30 am - 09:40 am', '09:30 am - 09:40 am', 'unbooked', '', '2021-08-14 03:55:53', '2021-09-01 02:55:11'),
(94, 1, 'sunday', '10', '09:40 am - 09:50 am', '09:40 am - 09:50 am', 'unbooked', '', '2021-08-14 03:55:53', '2021-08-14 03:55:53'),
(96, 1, 'monday', '10', '10:00 am - 10:10 am', '10:00 am - 10:10 am', 'unbooked', '', '2021-08-14 04:05:31', '2021-08-21 01:49:33'),
(97, 1, 'monday', '10', '10:10 am - 10:20 am', '10:10 am - 10:20 am', 'unbooked', '', '2021-08-14 04:05:31', '2021-08-14 04:05:31'),
(98, 1, 'monday', '10', '10:20 am - 10:30 am', '10:20 am - 10:30 am', 'unbooked', '', '2021-08-14 04:05:31', '2021-08-23 10:32:07'),
(99, 1, 'monday', '10', '10:30 am - 10:40 am', '10:30 am - 10:40 am', 'unbooked', '', '2021-08-14 04:05:31', '2021-09-01 05:43:35'),
(100, 1, 'monday', '10', '10:40 am - 10:50 am', '10:40 am - 10:50 am', 'unbooked', '', '2021-08-14 04:05:31', '2021-08-30 06:58:55'),
(101, 1, 'monday', '10', '10:50 am - 11:00 am', '10:50 am - 11:00 am', 'unbooked', '', '2021-08-14 04:05:31', '2021-08-14 04:05:31'),
(102, 1, 'tuesday', '10', '11:00 am - 11:10 am', '11:00 am - 11:10 am', 'unbooked', '', '2021-08-14 04:12:59', '2021-08-21 01:55:17'),
(103, 1, 'tuesday', '10', '11:10 am - 11:20 am', '11:10 am - 11:20 am', 'unbooked', '', '2021-08-14 04:12:59', '2021-08-14 04:12:59'),
(104, 1, 'tuesday', '10', '11:20 am - 11:30 am', '11:20 am - 11:30 am', 'unbooked', '', '2021-08-14 04:12:59', '2021-08-14 04:12:59'),
(105, 1, 'tuesday', '10', '11:30 am - 11:40 am', '11:30 am - 11:40 am', 'unbooked', '', '2021-08-14 04:12:59', '2021-08-14 04:12:59'),
(106, 1, 'tuesday', '10', '11:40 am - 11:50 am', '11:40 am - 11:50 am', 'unbooked', '', '2021-08-14 04:12:59', '2021-08-14 04:12:59'),
(107, 1, 'tuesday', '10', '11:50 am - 12:00 pm', '11:50 am - 12:00 pm', 'unbooked', '', '2021-08-14 04:12:59', '2021-08-14 04:12:59'),
(108, 1, 'wednesday', '10', '12:00 pm - 12:10 pm', '12:00 pm - 12:10 pm', 'unbooked', '', '2021-08-14 04:17:59', '2021-08-14 04:17:59'),
(109, 1, 'wednesday', '10', '12:10 pm - 12:20 pm', '12:10 pm - 12:20 pm', 'unbooked', '', '2021-08-14 04:17:59', '2021-09-01 05:45:18'),
(110, 1, 'wednesday', '10', '12:20 pm - 12:30 pm', '12:20 pm - 12:30 pm', 'unbooked', '', '2021-08-14 04:17:59', '2021-08-14 04:17:59'),
(111, 1, 'wednesday', '10', '12:30 pm - 12:40 pm', '12:30 pm - 12:40 pm', 'unbooked', '', '2021-08-14 04:17:59', '2021-08-23 10:32:38'),
(112, 1, 'wednesday', '10', '12:40 pm - 12:50 pm', '12:40 pm - 12:50 pm', 'unbooked', '', '2021-08-14 04:17:59', '2021-08-14 04:17:59'),
(113, 1, 'wednesday', '10', '12:50 pm - 01:00 pm', '12:50 pm - 01:00 pm', 'unbooked', '', '2021-08-14 04:17:59', '2021-08-14 04:17:59'),
(114, 1, 'thursday', '10', '01:00 pm - 01:10 pm', '01:00 pm - 01:10 pm', 'unbooked', '', '2021-08-14 04:20:10', '2021-08-14 04:20:10'),
(115, 1, 'thursday', '10', '01:10 pm - 01:20 pm', '01:10 pm - 01:20 pm', 'unbooked', '', '2021-08-14 04:20:10', '2021-08-14 04:20:10'),
(116, 1, 'thursday', '10', '01:20 pm - 01:30 pm', '01:20 pm - 01:30 pm', 'unbooked', '', '2021-08-14 04:20:10', '2021-08-21 01:57:58'),
(117, 1, 'thursday', '10', '01:30 pm - 01:40 pm', '01:30 pm - 01:40 pm', 'unbooked', '', '2021-08-14 04:20:10', '2021-08-14 04:20:10'),
(118, 1, 'thursday', '10', '01:40 pm - 01:50 pm', '01:40 pm - 01:50 pm', 'unbooked', '', '2021-08-14 04:20:10', '2021-08-14 04:20:10'),
(119, 1, 'thursday', '10', '01:50 pm - 02:00 pm', '01:50 pm - 02:00 pm', 'unbooked', '', '2021-08-14 04:20:10', '2021-08-14 04:20:10'),
(120, 1, 'friday', '10', '08:00 am - 08:10 am', '08:00 am - 08:10 am', 'unbooked', '', '2021-08-14 04:20:52', '2021-08-14 04:20:52'),
(121, 1, 'friday', '10', '08:10 am - 08:20 am', '08:10 am - 08:20 am', 'unbooked', '', '2021-08-14 04:20:52', '2021-08-14 04:20:52'),
(122, 1, 'friday', '10', '08:20 am - 08:30 am', '08:20 am - 08:30 am', 'unbooked', '', '2021-08-14 04:20:52', '2021-08-14 04:20:52'),
(123, 1, 'friday', '10', '08:30 am - 08:40 am', '08:30 am - 08:40 am', 'unbooked', '', '2021-08-14 04:20:52', '2021-08-21 02:00:27'),
(124, 1, 'friday', '10', '08:40 am - 08:50 am', '08:40 am - 08:50 am', 'unbooked', '', '2021-08-14 04:20:52', '2021-08-14 04:20:52'),
(125, 1, 'friday', '10', '08:50 am - 09:00 am', '08:50 am - 09:00 am', 'unbooked', '', '2021-08-14 04:20:52', '2021-08-14 04:20:52'),
(126, 1, 'saturday', '10', '03:00 pm - 03:10 pm', '03:00 pm - 03:10 pm', 'unbooked', '', '2021-08-14 04:21:24', '2021-08-14 04:21:24'),
(127, 1, 'saturday', '10', '03:10 pm - 03:20 pm', '03:10 pm - 03:20 pm', 'unbooked', '', '2021-08-14 04:21:24', '2021-08-14 04:21:24'),
(128, 1, 'saturday', '10', '03:20 pm - 03:30 pm', '03:20 pm - 03:30 pm', 'booked', '2021-09-04', '2021-08-14 04:21:24', '2021-09-04 06:29:10'),
(129, 1, 'saturday', '10', '03:30 pm - 03:40 pm', '03:30 pm - 03:40 pm', 'unbooked', '', '2021-08-14 04:21:24', '2021-08-14 04:21:24'),
(130, 1, 'saturday', '10', '03:40 pm - 03:50 pm', '03:40 pm - 03:50 pm', 'unbooked', '', '2021-08-14 04:21:24', '2021-08-14 04:21:24'),
(131, 1, 'saturday', '10', '03:50 pm - 04:00 pm', '03:50 pm - 04:00 pm', 'unbooked', '', '2021-08-14 04:21:24', '2021-08-14 04:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `specialities`
--

CREATE TABLE `specialities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagepath` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialities`
--

INSERT INTO `specialities` (`id`, `name`, `imagepath`, `adminid`, `created_at`, `updated_at`) VALUES
(2, 'Surgeon', 'speciality_Surgeon_1626795955.jpg', '1', '2021-07-20 10:15:55', '2021-07-20 10:15:55'),
(3, 'physician', 'speciality_physician_1626796475.jpg', '1', '2021-07-20 10:24:35', '2021-07-20 10:24:35'),
(4, 'earnose', 'speciality_earnose_1626796555.jpg', '1', '2021-07-20 10:25:55', '2021-07-20 10:25:55'),
(6, 'gastronologist', 'speciality_gastronologist_1628594437.jpg', '1', '2021-08-10 05:50:37', '2021-08-10 05:50:37'),
(7, 'pediatrician', 'speciality_pediatrician_1628594469.jpg', '1', '2021-08-10 05:51:09', '2021-08-10 05:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user1@user.com', NULL, '$2y$10$jprj22c7eNkC9PWQSr2KF.0ry84RhsSAt2ZC/brGXoJHDnI0RAguK', NULL, '2021-08-08 03:58:35', '2021-08-08 03:58:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `booked_appointments`
--
ALTER TABLE `booked_appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_email_unique` (`email`);

--
-- Indexes for table `payment_records`
--
ALTER TABLE `payment_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scheduledocappts`
--
ALTER TABLE `scheduledocappts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booked_appointments`
--
ALTER TABLE `booked_appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_records`
--
ALTER TABLE `payment_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `scheduledocappts`
--
ALTER TABLE `scheduledocappts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
