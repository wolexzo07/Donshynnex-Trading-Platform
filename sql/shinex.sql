-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 05:51 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shinex`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminbank`
--

CREATE TABLE `adminbank` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `companyNum` varchar(200) NOT NULL,
  `companyNum_two` varchar(200) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `base_url` text NOT NULL,
  `company_logo_path` text NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `acct_name` varchar(100) NOT NULL,
  `acct_numb` varchar(100) NOT NULL,
  `btc_addr` text NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminbank`
--

INSERT INTO `adminbank` (`id`, `email`, `companyNum`, `companyNum_two`, `company_name`, `base_url`, `company_logo_path`, `bank_name`, `acct_name`, `acct_numb`, `btc_addr`, `status`) VALUES
(1, 'support@cryptabuy.com', '<p>Mobile : +2347066811576</p>', '', 'CRYPTOMONK', 'https://cryptabuy.c2rgroup.com', 'realapp/img/cryptlogo.png', 'SUNTRUST BANK', 'CRYPTABUY ENTERPRISE', '0001570840', '1GcWNDyu36Wpnd9wJdfRKp3fTsKcR457Wu', '1');

-- --------------------------------------------------------

--
-- Table structure for table `adminbanklist`
--

CREATE TABLE `adminbanklist` (
  `id` int(11) NOT NULL,
  `type` enum('','bankwallet','btcwallet') NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `acct_name` varchar(100) NOT NULL,
  `acct_numb` varchar(100) NOT NULL,
  `btc_addr` text NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminbanklist`
--

INSERT INTO `adminbanklist` (`id`, `type`, `company_name`, `bank_name`, `acct_name`, `acct_numb`, `btc_addr`, `status`) VALUES
(1, 'bankwallet', 'CRYPTABUY', 'SUNTRUST BANK', 'CRYPTABUY ENTERPRISE', '0001570840', '1GcWNDyu36Wpnd9wJdfRKp3fTsKcR457Wu', '1');

-- --------------------------------------------------------

--
-- Table structure for table `alertus`
--

CREATE TABLE `alertus` (
  `id` int(11) NOT NULL,
  `tranx_id` varchar(255) NOT NULL,
  `paid_into` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `amount` double NOT NULL,
  `bankname` varchar(255) NOT NULL,
  `acctname` varchar(255) NOT NULL,
  `transfer_date` date NOT NULL,
  `date_time` datetime NOT NULL,
  `timereal` varchar(255) NOT NULL,
  `type` enum('topup','withdraw') NOT NULL,
  `status` enum('0','1') NOT NULL,
  `token` text NOT NULL,
  `os` varchar(100) NOT NULL,
  `br` varchar(100) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `note` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alertus`
--

INSERT INTO `alertus` (`id`, `tranx_id`, `paid_into`, `userid`, `amount`, `bankname`, `acctname`, `transfer_date`, `date_time`, `timereal`, `type`, `status`, `token`, `os`, `br`, `ip`, `note`) VALUES
(1, 'CRTP114100060211212', 'SUNTRUST BANK', 1, 1400000, 'Zenith Bank', 'Biobaku Oluwole Timothy', '2021-01-01', '2021-01-01 06:14:12', '2021-01-01 06:14:12 am', 'topup', '1', '4f4b69f259616d571cb929d0a5c6307b9a7fe2636de7154be777ec925fde72c82f9c73a8', 'Windows 7', 'Firefox', '127.0.0.1', 'Please credit me as soon as possible'),
(2, 'CRTP172010291112012', 'SUNTRUST BANK', 1, 431257, 'Access Bank', 'Biobaku Oluwole', '2021-01-12', '2021-01-12 01:19:27', '2021-01-12 01:19:27 am', 'topup', '1', 'a5030f6e07e3ee607ed4c6c59f42726afe2373c8a3f793371179e080b449965d80fbf440', 'Windows 7', 'Firefox', '127.0.0.1', 'Credit sharply'),
(4, 'CRTP102220155361011', 'SUNTRUST BANK', 1, 50000, 'Access Bank', 'Biobaku oluwole', '2021-01-12', '2021-01-12 01:35:56', '2021-01-12 01:35:56 am', 'topup', '1', '21a7370faf9ffc51b605348be5f5f118c9a81ef211b414b9e42be2420236e4bb11052948', 'Windows 7', 'Firefox', '127.0.0.1', 'Yes boss'),
(5, 'CRTP101229102201012', 'SUNTRUST BANK', 1, 6000, 'Access Bank', 'Biobaku Oluwole', '2021-01-12', '2021-01-12 02:01:29', '2021-01-12 02:01:29 am', 'topup', '1', 'd67baf1ec0fd450ab871751fb3ca9c46547ada986fb8debc68e33690cbaaa81cd2801c76', 'Windows 7', 'Firefox', '127.0.0.1', 'cool'),
(6, 'CRTP100002214201215', 'SUNTRUST BANK', 1, 12000, 'Zenith Bank', 'Biobaku Oluwole', '2021-01-12', '2021-01-12 02:04:50', '2021-01-12 02:04:50 am', 'topup', '1', '555335aeeaf40a2d055e28a0c62432b582a908a203a66e10abef472aed20b0ea2746f991', 'Windows 7', 'Firefox', '127.0.0.1', '');

-- --------------------------------------------------------

--
-- Table structure for table `buying_transactions`
--

CREATE TABLE `buying_transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tranx_id` varchar(255) NOT NULL,
  `wallet_used` enum('','NGN','USD') NOT NULL,
  `wallet_type` enum('','internal','external') NOT NULL,
  `naira_usd_rate` double NOT NULL,
  `amount_in_btc` double NOT NULL,
  `amount_in_usd` double NOT NULL,
  `amount_in_naira` double NOT NULL,
  `btc_wallet_balance` double NOT NULL,
  `naira_wallet_balance` double NOT NULL,
  `btc_recieve_status` enum('0','1','2') NOT NULL,
  `os` varchar(50) NOT NULL,
  `br` varchar(50) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `date_time` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buying_transactions`
--

INSERT INTO `buying_transactions` (`id`, `user_id`, `tranx_id`, `wallet_used`, `wallet_type`, `naira_usd_rate`, `amount_in_btc`, `amount_in_usd`, `amount_in_naira`, `btc_wallet_balance`, `naira_wallet_balance`, `btc_recieve_status`, `os`, `br`, `ip`, `date_time`) VALUES
(1, 1, 'CRBY126220126091013', 'NGN', 'internal', 495, 0.01972499, 500.12, 247559.4, 0.75407221, 752440.6, '1', 'iPhone', 'Handheld Browser', '127.0.0.1', '2020-12-26 04:09:31 pm'),
(2, 1, 'CRBY102216406628121', 'NGN', 'internal', 495, 0.00393443, 100, 49500, 0.75800664, 702940.6, '1', 'Windows 7', 'Firefox', '127.0.0.1', '2020-12-26 04:16:48 pm'),
(3, 1, 'CRBY162262020121112', 'NGN', 'internal', 495, 0.03939078, 1000, 495000, 0.79739742, 207940.6, '1', 'Windows 7', 'Firefox', '127.0.0.1', '2020-12-26 04:22:11 pm'),
(4, 1, 'CRBY176225002216121', 'NGN', 'internal', 495, 0.00786905, 200, 99000, 0.80526647, 108940.6, '1', 'Windows 7', 'Firefox', '127.0.0.1', '2020-12-26 04:27:51 pm'),
(5, 2, 'CRBY202342822120400', 'NGN', 'internal', 495, 0.00184217, 49.96, 24730.2, 0.00184217, 27269.8, '1', 'iPhone', 'Handheld Browser', '127.0.0.1', '2020-12-28 04:03:42 am'),
(6, 1, 'CRBY131295502020311', 'NGN', 'internal', 495, 0.013, 379.31, 187758.45, 0.45321282, 168742.15, '1', 'Windows 7', 'Firefox', '127.0.0.1', '2020-12-31 01:59:35 am'),
(7, 1, 'CRBY112231085410011', 'NGN', 'internal', 495, 0.00279921, 100, 49500, 0.45601203, 2018499.15, '1', 'Windows 7', 'Firefox', '127.0.0.1', '2021-01-15 06:41:30 pm');

-- --------------------------------------------------------

--
-- Table structure for table `controlmailer`
--

CREATE TABLE `controlmailer` (
  `id` int(11) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `status` enum('sandbox','live') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `controlmailer`
--

INSERT INTO `controlmailer` (`id`, `subject`, `status`) VALUES
(1, 'Mailer', 'sandbox');

-- --------------------------------------------------------

--
-- Table structure for table `createusers`
--

CREATE TABLE `createusers` (
  `id` int(11) NOT NULL,
  `fiat` enum('','USD','NGN','GHS','KSH') NOT NULL,
  `btc_wallet` double NOT NULL,
  `usdt_wallet` double NOT NULL,
  `eth_wallet` double NOT NULL,
  `naira_wallet` double NOT NULL,
  `cedis_wallet` double NOT NULL,
  `cephas_wallet` double NOT NULL,
  `dollar_wallet` double NOT NULL,
  `photo_path` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passkey` text NOT NULL,
  `bank_name` varchar(150) NOT NULL,
  `acct_number` varchar(50) NOT NULL,
  `acct_name` varchar(255) NOT NULL,
  `token` text NOT NULL,
  `os` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `br` varchar(100) NOT NULL,
  `date_time` varchar(200) NOT NULL,
  `role` enum('0','1','2') NOT NULL,
  `status` enum('0','1','2') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `createusers`
--

INSERT INTO `createusers` (`id`, `fiat`, `btc_wallet`, `usdt_wallet`, `eth_wallet`, `naira_wallet`, `cedis_wallet`, `cephas_wallet`, `dollar_wallet`, `photo_path`, `name`, `mobile`, `email`, `passkey`, `bank_name`, `acct_number`, `acct_name`, `token`, `os`, `ip`, `br`, `date_time`, `role`, `status`) VALUES
(1, 'NGN', 12.95321585, 25.8, 1500, 55018499.15, 22000, 68000, 2000, 'photo-keeper/23894088b4d1cdc69395ca1b5e96a62c38d9be88d65959b1356ddfccfa42815e960e2841fc18f872.jpg', 'Biobaku Oluwole', '08169452139', 'webmastertitus@gmail.com', '1474047fb00b2d8d95646f7436837ed03ccafca5f3b7006982d89818f9d52ae4', 'Zenith Bank', '2177989214', 'Biobaku Oluwole', '057a2b4b9e3228d0252f6117132ecbf9711b7d2d061e6b808497303e9cb0bb8ab4c31b03', 'Windows 7', '127.0.0.1', 'Firefox', '2020-12-18 12:31:06 pm', '0', '1'),
(2, '', 0.00184217, 0, 0, 27269.8, 0, 0, 0, 'photo-keeper/7388d77049ed11fcfc196199610507c01e55ef18accf102caaa970ce65d217b9ae9a8e9a57caa67c.jpg', 'Racheal Adeyemo Queen', '08109456534', 'queen@gmail.com', '1474047fb00b2d8d95646f7436837ed03ccafca5f3b7006982d89818f9d52ae4', 'Zenith Bank', '2251260035', 'Adeyemo Queen', '7e322c21d529a584708d3e6b773dc2d428d7bd4dd337252c49fcf0fd3adba3dbcbd9d8da', 'Windows 7', '127.0.0.1', 'Firefox', '2020-12-18 12:44:12 pm', '0', '1'),
(3, '', 0, 0, 0, 0, 0, 0, 0, '', 'Dotun Titus Oludotun', '08065751579', 'biobaku2017@gmail.com', '1474047fb00b2d8d95646f7436837ed03ccafca5f3b7006982d89818f9d52ae4', '', '', '', '486eea3ce68bf004bab6af20d89c1006b8452720c8c9711596c99ea0481ca1553840c732', 'Windows 7', '127.0.0.1', 'Firefox', '2020-12-18 12:46:11 pm', '0', '1'),
(4, '', 0, 0, 0, 0, 0, 0, 0, '', 'Oku Samuel Ekpeyeong', '08091882277', 'samuel@gmail.com', '1474047fb00b2d8d95646f7436837ed03ccafca5f3b7006982d89818f9d52ae4', '', '', '', '70eed0153f322a5c022c5bcdef5a0dee8efab48dfa44af6ffd9f9f10a5154086f8ae83a7', 'Windows 7', '127.0.0.1', 'Firefox', '2020-12-18 09:51:35 pm', '0', '0'),
(5, '', 0, 0, 0, 0, 0, 0, 0, '', 'Super Admin', '09061975683', 'admin@gmail.com', '1474047fb00b2d8d95646f7436837ed03ccafca5f3b7006982d89818f9d52ae4', '', '', '', '4aa2ca07aafb1c70c842969e288fa50ea56f55e3e92ed160a8ca708ab6a113efde552549', 'Windows 7', '127.0.0.1', 'Firefox', '2021-01-02 03:48:04 am', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mediacontrol`
--

CREATE TABLE `mediacontrol` (
  `id` int(11) NOT NULL,
  `file_type` enum('','video','photo','document','audio','tag_a_friend','feeling','checkin','poll','youtube','vimeo','sound','short_text','other_link','postcontent_link') NOT NULL,
  `allowed_upload_count` int(11) NOT NULL,
  `allowed_upload_size` varchar(255) NOT NULL,
  `allowed_format` text NOT NULL,
  `allowed_format_second` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mediacontrol`
--

INSERT INTO `mediacontrol` (`id`, `file_type`, `allowed_upload_count`, `allowed_upload_size`, `allowed_format`, `allowed_format_second`, `status`) VALUES
(1, 'video', 4, '62914560', '.mp4,.avi,.3gp,.mov', 'mp4,avi,3gp,mov', '1'),
(2, 'audio', 4, '62914560', '.mp3,.wav', 'mp3,wav', '1'),
(3, 'photo', 20, '1048576', '.png,.jpg,.jpeg,.gif', 'png,jpg,jpeg,gif', '1'),
(4, 'document', 10, '31457280', '.doc,.docx,.pdf,.ppt,.pptx,.xls,.xlsx', 'doc,docx,pdf,ppt,pptx,xls,xlsx', '1');

-- --------------------------------------------------------

--
-- Table structure for table `nigeriabanklisting`
--

CREATE TABLE `nigeriabanklisting` (
  `id` int(11) NOT NULL,
  `banks` text NOT NULL,
  `description` text NOT NULL,
  `status` enum('0','1') NOT NULL,
  `bankcode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nigeriabanklisting`
--

INSERT INTO `nigeriabanklisting` (`id`, `banks`, `description`, `status`, `bankcode`) VALUES
(1, 'Access Bank', '', '1', '044'),
(2, 'Citibank', '', '1', '023'),
(3, 'Diamond Bank', '', '1', '063'),
(4, 'Suntrust Bank', '', '1', ''),
(5, 'Ecobank Nigeria', '', '1', '050'),
(6, 'Fidelity Bank Nigeria', '', '1', '070'),
(7, 'First Bank of Nigeria', '', '1', '011'),
(8, 'First City Monument Bank', '', '1', '214'),
(9, 'Guaranty Trust Bank', '', '1', '058'),
(10, 'Heritage Bank Plc', '', '1', '030'),
(11, 'Keystone Bank Limited ', '', '1', '082'),
(12, 'Enterprise Bank', '', '1', '084'),
(13, 'Polaris Bank', '', '1', '076'),
(14, 'Stanbic IBTC Bank', '', '1', '221'),
(15, 'Standard Chartered Bank', '', '1', '068'),
(16, 'Sterling Bank', '', '1', '232'),
(17, 'Main Street Bank', '', '1', '014'),
(18, 'Union Bank of Nigeria', '', '1', '032'),
(19, 'United Bank for Africa', '', '1', '033'),
(20, 'Unity Bank Plc.', '', '1', '215'),
(21, 'Wema Bank', '', '1', '035'),
(22, 'Zenith Bank', '', '1', '057'),
(23, 'Providus Bank', '', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `type` enum('p','all','admin') NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `date_time` varchar(200) NOT NULL,
  `time_stamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `type`, `title`, `message`, `status`, `date_time`, `time_stamp`) VALUES
(1, '1', 'p', '<b>NGN 50,000.00</b> WAS CREDITED TO YOUR WALLET.', '<p>Hi <b>Timothy Biobaku Oluwole</b>,</p>Your wallet has been credited with the amount (<b>NGN 50,000.00</b>).You can now start buying bitcoin. Thank you.<br/><br/><b>CRYPTABUY TEAM</b>', '1', '2020-12-28 03:38:31 am', '2020-12-28 03:38:31'),
(2, '1', 'p', '<b>NGN 6,660.00</b> WAS CREDITED TO YOUR WALLET.', '<p>Hi <b>Timothy Biobaku Oluwole</b>,</p>Your wallet has been credited with the amount (<b>NGN 6,660.00</b>).You can now start buying bitcoin. Thank you.<br/><br/><b>CRYPTABUY TEAM</b>', '1', '2020-12-28 03:39:32 am', '2020-12-28 03:39:32'),
(3, '1', 'p', '<b>NGN 900.00</b> WAS CREDITED TO YOUR WALLET.', '<p>Hi <b>Timothy Biobaku Oluwole</b>,</p>Your wallet has been credited with the amount (<b>NGN 900.00</b>).You can now start buying bitcoin. Thank you.<br/><br/><b>CRYPTABUY TEAM</b>', '1', '2020-12-28 03:41:16 am', '2020-12-28 03:41:16'),
(4, '1', 'p', '<b>NGN 30,500.00</b> WAS CREDITED TO YOUR WALLET.', '<p>Hi <b>Timothy Biobaku Oluwole</b>,</p>Your wallet has been credited with the amount (<b>NGN 30,500.00</b>).You can now start buying bitcoin. Thank you.<br/><br/><b>CRYPTABUY TEAM</b>', '1', '2020-12-28 03:42:51 am', '2020-12-28 03:42:51'),
(5, '1', 'p', '<b>NGN 15,000.00</b> WAS CREDITED TO YOUR WALLET.', '<p>Hi <b>Timothy Biobaku Oluwole</b>,</p>Your wallet has been credited with the amount (<b>NGN 15,000.00</b>).You can now start buying bitcoin. Thank you.<br/><br/><b>CRYPTABUY TEAM</b>', '1', '2020-12-28 03:43:45 am', '2020-12-28 03:43:45'),
(6, '2', 'p', '<b>NGN 12,000.00</b> WAS CREDITED TO YOUR WALLET.', '<p>Hi <b>Racheal Adeyemo Queen</b>,</p>Your wallet has been credited with the amount (<b>NGN 12,000.00</b>).You can now start buying bitcoin. Thank you.<br/><br/><b>CRYPTABUY TEAM</b>', '0', '2020-12-28 04:02:12 am', '2020-12-28 04:02:12'),
(7, '2', 'p', '<b>NGN 40,000.00</b> WAS CREDITED TO YOUR WALLET.', '<p>Hi <b>Racheal Adeyemo Queen</b>,</p>Your wallet has been credited with the amount (<b>NGN 40,000.00</b>).You can now start buying bitcoin. Thank you.<br/><br/><b>CRYPTABUY TEAM</b>', '0', '2020-12-28 04:02:49 am', '2020-12-28 04:02:49'),
(8, '1', 'p', '<b>NGN 1,400,000.00</b> WAS CREDITED TO YOUR WALLET.', '<p>Hi <b>Timothy Biobaku Oluwole</b>,</p>Your wallet has been credited with the amount (<b>NGN 1,400,000.00</b>) you paid.You can now start buying bitcoin. Thank you.<br/><br/><b>CRYPTABUY TEAM</b>', '1', '2021-01-12 12:25:04 am', '2021-01-12 00:25:04'),
(9, '1', 'p', '<b>NGN 431,257.00</b> WAS CREDITED TO YOUR WALLET.', '<p>Hi <b>Timothy Biobaku Oluwole</b>,</p>Your wallet has been credited with the amount (<b>NGN 431,257.00</b>) you paid.You can now start buying bitcoin. Thank you.<br/><br/><b>CRYPTABUY TEAM</b>', '1', '2021-01-12 01:27:16 am', '2021-01-12 01:27:16'),
(10, '1', 'p', '<b>NGN 50,000.00</b> WAS CREDITED TO YOUR WALLET.', '<p>Hi <b>Timothy Biobaku Oluwole</b>,</p>Your wallet has been credited with the amount (<b>NGN 50,000.00</b>) you paid.You can now start buying bitcoin. Thank you.<br/><br/><b>CRYPTABUY TEAM</b>', '1', '2021-01-12 01:36:35 am', '2021-01-12 01:36:35'),
(11, '1', 'p', '<b>NGN 6,000.00</b> WAS CREDITED TO YOUR WALLET.', '<p>Hi <b>Timothy Biobaku Oluwole</b>,</p>Your wallet has been credited with the amount (<b>NGN 6,000.00</b>) you paid.You can now start buying bitcoin. Thank you.<br/><br/><b>CRYPTABUY TEAM</b>', '1', '2021-01-12 02:02:27 am', '2021-01-12 02:02:27'),
(12, '1', 'p', '<b>NGN 12,000.00</b> WAS CREDITED TO YOUR WALLET.', '<p>Hi <b>Timothy Biobaku Oluwole</b>,</p>Your wallet has been credited with the amount (<b>NGN 12,000.00</b>) you paid.You can now start buying bitcoin. Thank you.<br/><br/><b>CRYPTABUY TEAM</b>', '1', '2021-01-12 02:06:28 am', '2021-01-12 02:06:28'),
(13, '1', 'p', 'PAYMENT OF <b>NGN 15,000.00</b> WAS CANCELLED.', '<p>Hi <b>Timothy Biobaku Oluwole</b>,</p>Your payment of (<b>NGN 15,000.00</b>) was cancelled because we could not verify your payment.You can reach us for more clarification on this transaction (Tranx ID : <b>CRTP127112102220811</b>). Ensure you have the transaction ID ready incase you want to reach us. Thank you.<br/><br/><b>CRYPTABUY TEAM</b>', '1', '2021-01-12 05:43:46 pm', '2021-01-12 17:43:46');

-- --------------------------------------------------------

--
-- Table structure for table `paymentkeys`
--

CREATE TABLE `paymentkeys` (
  `id` int(11) NOT NULL,
  `statustype` enum('test','live') NOT NULL,
  `secretkey` text NOT NULL,
  `publickey` text NOT NULL,
  `status` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentkeys`
--

INSERT INTO `paymentkeys` (`id`, `statustype`, `secretkey`, `publickey`, `status`) VALUES
(1, 'live', 'sk_live_436f3f366aa592829d704081580a7247eac26281', 'pk_live_b9c30616d4d03f8df62155416116b32968adb0af', 'No'),
(2, 'test', 'sk_test_71355934aa2bccb5aea17779b914f804f038ff22', 'pk_test_6879990671d19258584e3fcd2f0a89af5e221453', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `fiat_type` enum('','USD','NGN','GHS','KSH') NOT NULL,
  `buy_rate` double NOT NULL,
  `sell_rate` double NOT NULL,
  `btc_current_rate` double NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `fiat_type`, `buy_rate`, `sell_rate`, `btc_current_rate`, `status`) VALUES
(1, 'NGN', 1400, 1490, 0, '1'),
(2, 'GHS', 480, 550, 0, '1'),
(4, 'KSH', 1500, 1700, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `selling_transactions`
--

CREATE TABLE `selling_transactions` (
  `id` int(11) NOT NULL,
  `btcpaymentproof` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `tranx_id` varchar(255) NOT NULL,
  `wallet_type` enum('','internal','external') NOT NULL,
  `naira_usd_rate` double NOT NULL,
  `amount_in_btc` double NOT NULL,
  `amount_in_usd` double NOT NULL,
  `amount_in_naira` double NOT NULL,
  `sender_btcaddress` text NOT NULL,
  `company_btc_address` text NOT NULL,
  `btc_wallet_balance` double NOT NULL,
  `btc_recieve_status` enum('0','1','2') NOT NULL,
  `transfer_money_status` enum('0','1') NOT NULL,
  `os` varchar(50) NOT NULL,
  `br` varchar(50) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `date_time` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selling_transactions`
--

INSERT INTO `selling_transactions` (`id`, `btcpaymentproof`, `user_id`, `tranx_id`, `wallet_type`, `naira_usd_rate`, `amount_in_btc`, `amount_in_usd`, `amount_in_naira`, `sender_btcaddress`, `company_btc_address`, `btc_wallet_balance`, `btc_recieve_status`, `transfer_money_status`, `os`, `br`, `ip`, `date_time`) VALUES
(1, '', 1, 'CRSL132216505022712', 'internal', 470, 0.01945365, 500, 235000, '', '', 0.78581282, '1', '0', 'Windows 7', 'Firefox', '127.0.0.1', '2020-12-26 05:32:55 pm'),
(2, '', 1, 'CRSL152180035212401', 'internal', 470, 0.3456, 10110.25, 4751817.5, '', '', 0.44021282, '1', '0', 'Windows 7', 'Firefox', '127.0.0.1', '2020-12-31 01:55:48 am'),
(3, '', 1, 'CRSL100051428521511', 'internal', 470, 0.00279618, 99.69, 46854.3, '', '', 0.45321585, '1', '0', 'Windows 7', 'Firefox', '127.0.0.1', '2021-01-15 06:50:45 pm'),
(4, 'btcpaymentproof/9623ee2b0e97267ad086ae8eb6b1c6f501a9028f14951b93849649ea3b26adda1753dc9fb5199104.jpg', 1, 'CRSL101421310933210', 'external', 470, 2.45, 82874.75, 38951132.5, '1CR4xyZip5Ni2S4RC8am3aQzHnrzJZtzxR', '1GcWNDyu36Wpnd9wJdfRKp3fTsKcR457Wu', 0, '0', '0', 'Windows 7', 'Firefox', '127.0.0.1', '2021-01-30 02:20:56 pm');

-- --------------------------------------------------------

--
-- Table structure for table `topup_transaction`
--

CREATE TABLE `topup_transaction` (
  `id` int(11) NOT NULL,
  `type` enum('','online','offline') NOT NULL,
  `paystack_id` varchar(200) NOT NULL,
  `paystack_verify` enum('no','yes') NOT NULL,
  `paystack_charge` double NOT NULL,
  `owner` varchar(200) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `amount` double NOT NULL,
  `wallet_credited` varchar(20) NOT NULL,
  `balance_after` double NOT NULL,
  `status` enum('pending','approved','cancelled') NOT NULL,
  `comment` text NOT NULL,
  `os` varchar(100) NOT NULL,
  `br` varchar(220) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `paydate` varchar(100) NOT NULL,
  `token` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topup_transaction`
--

INSERT INTO `topup_transaction` (`id`, `type`, `paystack_id`, `paystack_verify`, `paystack_charge`, `owner`, `currency`, `amount`, `wallet_credited`, `balance_after`, `status`, `comment`, `os`, `br`, `ip`, `paydate`, `token`) VALUES
(5, 'online', 'CRTP82600232012012', 'no', 476, '1', 'NGN', 23500, 'naira wallet', 241440.6, 'approved', '', 'Android', 'Handheld Browser', '127.0.0.1', '2020-12-28 03:16:16 am', 'ff53b745fb4bcecf83a24fbac2b44eba4721263c'),
(2, 'online', 'CRTP82518200082022', 'no', 644, '1', 'NGN', 34000, 'naira wallet', 162940.6, 'approved', '', 'Windows 7', 'Firefox', '127.0.0.1', '2020-12-28 02:58:20 am', '4d710d0540d79a406eb8890c381ad085acfcbe7d'),
(3, 'online', 'CRTP02208622030210', 'no', 900, '1', 'NGN', 50000, 'naira wallet', 212940.6, 'approved', '', 'Windows 7', 'Firefox', '127.0.0.1', '2020-12-28 03:06:30 am', 'e185d8b7bf2e433ae1f8f45312e79e10192652bc'),
(4, 'online', 'CRTP20022103112812', 'no', 180, '1', 'NGN', 5000, 'naira wallet', 217940.6, 'approved', '', 'Windows 7', 'Firefox', '127.0.0.1', '2020-12-28 03:11:21 am', '3f3be77f43cbfaceea66569d7aa2a9245e343872'),
(6, 'online', 'CRTP32281302570202', 'no', 292, '1', 'NGN', 12000, 'naira wallet', 253440.6, 'approved', '', 'Windows 7', 'Firefox', '127.0.0.1', '2020-12-28 03:24:07 am', 'b44812caef5143dc2559c0a930072efb7748d15a'),
(7, 'online', 'CRTP28131202083220', 'no', 900, '1', 'NGN', 50000, 'naira wallet', 303440.6, 'approved', '', 'Windows 7', 'Firefox', '127.0.0.1', '2020-12-28 03:38:31 am', '9885b8d54f4d56bb5dd5eca277abbe074e9e7a5f'),
(8, 'online', 'CRTP22332920230801', 'no', 206.56, '1', 'NGN', 6660, 'naira wallet', 310100.6, 'approved', '', 'Windows 7', 'Firefox', '127.0.0.1', '2020-12-28 03:39:32 am', '6e07b9c92186f6e618221e42396cdc48c5945251'),
(9, 'online', 'CRTP02234610020128', 'no', 14.4, '1', 'NGN', 900, 'naira wallet', 311000.6, 'approved', '', 'Android', 'Handheld Browser', '127.0.0.1', '2020-12-28 03:41:16 am', 'a05539906e4bc9e30d789e33abc6662aba29d10b'),
(10, 'online', 'CRTP00244802321222', 'no', 588, '1', 'NGN', 30500, 'naira wallet', 341500.6, 'approved', '', 'iPad', 'Handheld Browser', '127.0.0.1', '2020-12-28 03:42:51 am', '602f1457afb7b66fa5bb2faa069ea4068e4bee91'),
(11, 'online', 'CRTP10020322483253', 'no', 340, '1', 'NGN', 15000, 'naira wallet', 356500.6, 'approved', '', 'iPhone', 'Handheld Browser', '127.0.0.1', '2020-12-28 03:43:45 am', '533b9f640c8d33c047dc8142034ef43e405ae728'),
(12, 'online', 'CRTP12282470050012', 'no', 292, '2', 'NGN', 12000, 'naira wallet', 12000, 'approved', '', 'iPhone', 'Handheld Browser', '127.0.0.1', '2020-12-28 04:02:12 am', '66fe4a83637feef7c7f9b1570001087a2513b9f4'),
(13, 'online', 'CRTP40202120428020', 'no', 740, '2', 'NGN', 40000, 'naira wallet', 52000, 'approved', '', 'iPhone', 'Handheld Browser', '127.0.0.1', '2020-12-28 04:02:49 am', 'e6694104f64f3f527d628acc03ba1de5e1259e52');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `tranx_id` varchar(255) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `wallet_type` enum('','ngn','btc','usd') NOT NULL,
  `type` enum('','topup','withdraw','sellbtc-internal','buybtc','sellbtc-external') NOT NULL,
  `topup_type` enum('','offline','online') NOT NULL,
  `amount` double NOT NULL,
  `wallet_balance_after` double NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `token` text NOT NULL,
  `os` varchar(100) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `br` varchar(100) NOT NULL,
  `date_time` varchar(200) NOT NULL,
  `time_stamp` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `tranx_id`, `user_id`, `wallet_type`, `type`, `topup_type`, `amount`, `wallet_balance_after`, `status`, `token`, `os`, `ip`, `br`, `date_time`, `time_stamp`) VALUES
(1, 'CRSL114202702210602', '1', 'btc', 'sellbtc-external', '', 0.06445342, 0, '2', '356a192b7913b04c54574d18c28d46e6395428ab27a5ce26bb1208c2f54e975ea3ae3c01', 'Windows 7', '127.0.0.1', 'Firefox', '2020-12-26 04:07:24 am', '2020-12-26 04:07:24'),
(2, 'CRSL162200010502249', '1', 'btc', 'sellbtc-external', '', 0.22535122, 0, '2', '356a192b7913b04c54574d18c28d46e6395428abd6d9b4216d4d0622411fc90294577cb8', 'Windows 7', '127.0.0.1', 'Firefox', '2020-12-26 04:09:52 am', '2020-12-26 04:09:52'),
(3, 'CRSL120242026426110', '1', 'btc', 'sellbtc-external', '', 8, 0, '2', '356a192b7913b04c54574d18c28d46e6395428abb7747f6d99fd443fb9c12a87515c1b42', 'Windows 7', '127.0.0.1', 'Firefox', '2020-12-26 04:14:29 am', '2020-12-26 04:14:29'),
(4, 'CRSL140282628021102', '1', 'btc', 'sellbtc-external', '', 0.21715113, 0, '0', '356a192b7913b04c54574d18c28d46e6395428aba4dff11efd77509a457d1b63ed144263', 'Windows 7', '127.0.0.1', 'Firefox', '2020-12-26 04:18:45 am', '2020-12-26 04:18:45'),
(5, 'CRSL100160126421222', '1', 'btc', 'sellbtc-internal', '', 0.01206052, 0.77454033, '0', '356a192b7913b04c54574d18c28d46e6395428abf761f1bda2f6c3e612954178b860314b', 'Windows 7', '127.0.0.1', 'Firefox', '2020-12-26 02:21:06 pm', '2020-12-26 14:21:06'),
(6, 'CRSL160112942512220', '1', 'btc', 'sellbtc-internal', '', 0.04019311, 0.73434722, '0', '356a192b7913b04c54574d18c28d46e6395428ab6e3803544393061ba881872c9ec31f7f', 'Windows 7', '127.0.0.1', 'Firefox', '2020-12-26 02:21:59 pm', '2020-12-26 14:22:00'),
(7, 'CRBY126220126091013', '1', 'btc', 'buybtc', '', 0.01972499, 0.75407221, '1', '356a192b7913b04c54574d18c28d46e6395428ab03b62eb8578c2775f8635ca4b043cb6b', 'iPhone', '127.0.0.1', 'Handheld Browser', '2020-12-26 04:09:31 pm', '2020-12-26 16:09:31'),
(8, 'CRBY102216406628121', '1', 'btc', 'buybtc', '', 0.00393443, 0.75800664, '1', '356a192b7913b04c54574d18c28d46e6395428ab3f32ebc4291103057c079331b52f4e1d', 'Windows 7', '127.0.0.1', 'Firefox', '2020-12-26 04:16:48 pm', '2020-12-26 16:16:48'),
(9, 'CRBY162262020121112', '1', 'btc', 'buybtc', '', 0.03939078, 0.79739742, '1', '356a192b7913b04c54574d18c28d46e6395428abf8c0d19de97d761da9913d8926836d03', 'Windows 7', '127.0.0.1', 'Firefox', '2020-12-26 04:22:11 pm', '2020-12-26 16:22:11'),
(10, 'CRBY176225002216121', '1', 'btc', 'buybtc', '', 0.00786905, 0.80526647, '1', '356a192b7913b04c54574d18c28d46e6395428aba87d2685014c2563f840f4103acd0bca', 'Windows 7', '127.0.0.1', 'Firefox', '2020-12-26 04:27:51 pm', '2020-12-26 16:27:51'),
(11, 'CRSL132216505022712', '1', 'btc', 'sellbtc-internal', '', 0.01945365, 0.78581282, '1', '356a192b7913b04c54574d18c28d46e6395428ab8b5caf9266f9b724b62c825a9216b7fa', 'Windows 7', '127.0.0.1', 'Firefox', '2020-12-26 05:32:55 pm', '2020-12-26 17:32:55'),
(12, 'CRTP82518200082022', '1', 'ngn', 'withdraw', '', 34000, 162940.6, '1', '4d710d0540d79a406eb8890c381ad085acfcbe7d', 'Windows 7', '127.0.0.1', 'Firefox', '2020-12-28 02:58:20 am', '2020-12-28 02:58:20'),
(13, 'CRTP02208622030210', '1', 'ngn', 'topup', 'online', 50000, 212940.6, '1', 'e185d8b7bf2e433ae1f8f45312e79e10192652bc', 'Windows 7', '127.0.0.1', 'Firefox', '2020-12-28 03:06:30 am', '2020-12-28 03:06:30'),
(14, 'CRTP20022103112812', '1', 'ngn', 'topup', 'online', 5000, 217940.6, '1', '3f3be77f43cbfaceea66569d7aa2a9245e343872', 'Windows 7', '127.0.0.1', 'Firefox', '2020-12-28 03:11:21 am', '2020-12-28 03:11:21'),
(15, 'CRTP82600232012012', '1', 'ngn', 'topup', 'online', 23500, 241440.6, '1', 'ff53b745fb4bcecf83a24fbac2b44eba4721263c', 'Android', '127.0.0.1', 'Handheld Browser', '2020-12-28 03:16:16 am', '2020-12-28 03:16:16'),
(16, 'CRTP32281302570202', '1', 'ngn', 'topup', 'online', 12000, 253440.6, '1', 'b44812caef5143dc2559c0a930072efb7748d15a', 'Windows 7', '127.0.0.1', 'Firefox', '2020-12-28 03:24:07 am', '2020-12-28 03:24:07'),
(17, 'CRTP28131202083220', '1', 'ngn', 'topup', 'online', 50000, 303440.6, '1', '9885b8d54f4d56bb5dd5eca277abbe074e9e7a5f', 'Windows 7', '127.0.0.1', 'Firefox', '2020-12-28 03:38:31 am', '2020-12-28 03:38:31'),
(18, 'CRTP22332920230801', '1', 'ngn', 'topup', 'online', 6660, 310100.6, '1', '6e07b9c92186f6e618221e42396cdc48c5945251', 'Windows 7', '127.0.0.1', 'Firefox', '2020-12-28 03:39:32 am', '2020-12-28 03:39:32'),
(19, 'CRTP02234610020128', '1', 'ngn', 'topup', 'online', 900, 311000.6, '1', 'a05539906e4bc9e30d789e33abc6662aba29d10b', 'Android', '127.0.0.1', 'Handheld Browser', '2020-12-28 03:41:16 am', '2020-12-28 03:41:16'),
(20, 'CRTP00244802321222', '1', 'ngn', 'topup', '', 30500, 341500.6, '2', '602f1457afb7b66fa5bb2faa069ea4068e4bee91', 'iPad', '127.0.0.1', 'Handheld Browser', '2020-12-28 03:42:51 am', '2020-12-28 03:42:51'),
(21, 'CRTP10020322483253', '1', 'ngn', 'topup', '', 15000, 356500.6, '2', '533b9f640c8d33c047dc8142034ef43e405ae728', 'iPhone', '127.0.0.1', 'Handheld Browser', '2020-12-28 03:43:45 am', '2020-12-28 03:43:45'),
(22, 'CRTP12282470050012', '2', 'ngn', 'topup', 'online', 12000, 12000, '1', '66fe4a83637feef7c7f9b1570001087a2513b9f4', 'iPhone', '127.0.0.1', 'Handheld Browser', '2020-12-28 04:02:12 am', '2020-12-28 04:02:12'),
(23, 'CRTP40202120428020', '2', 'ngn', 'topup', '', 40000, 52000, '2', 'e6694104f64f3f527d628acc03ba1de5e1259e52', 'iPhone', '127.0.0.1', 'Handheld Browser', '2020-12-28 04:02:49 am', '2020-12-28 04:02:49'),
(24, 'CRBY202342822120400', '2', 'btc', 'buybtc', '', 0.00184217, 0.00184217, '1', 'da4b9237bacccdf19c0760cab7aec4a8359010b0a38aea405a4e97f38c4f0892920cfc4b', 'iPhone', '127.0.0.1', 'Handheld Browser', '2020-12-28 04:03:42 am', '2020-12-28 04:03:42'),
(25, 'CRSL152180035212401', '1', 'btc', 'sellbtc-internal', '', 0.3456, 0.44021282, '1', '356a192b7913b04c54574d18c28d46e6395428ab8235c7d884b1cbef006d9893bd566f57', 'Windows 7', '127.0.0.1', 'Firefox', '2020-12-31 01:55:48 am', '2020-12-31 01:55:48'),
(26, 'CRBY131295502020311', '1', 'btc', 'buybtc', '', 0.013, 0.45321282, '1', '356a192b7913b04c54574d18c28d46e6395428ab8d39b8866f0fd31bccea08289067f365', 'Windows 7', '127.0.0.1', 'Firefox', '2020-12-31 01:59:35 am', '2020-12-31 01:59:35'),
(27, 'CRTP114100060211212', '1', 'ngn', 'topup', 'offline', 1400000, 1568742.15, '1', '4f4b69f259616d571cb929d0a5c6307b9a7fe2636de7154be777ec925fde72c82f9c73a8', 'Windows 7', '127.0.0.1', 'Firefox', '2021-01-01 06:14:12', '2021-01-01 06:14:12'),
(28, 'CRTP172010291112012', '1', 'ngn', 'topup', 'offline', 431257, 1999999.15, '1', 'a5030f6e07e3ee607ed4c6c59f42726afe2373c8a3f793371179e080b449965d80fbf440', 'Windows 7', '127.0.0.1', 'Firefox', '2021-01-12 01:19:27', '2021-01-12 01:19:27'),
(29, 'CRTP102220155361011', '1', 'ngn', 'topup', 'offline', 50000, 2049999.15, '1', '21a7370faf9ffc51b605348be5f5f118c9a81ef211b414b9e42be2420236e4bb11052948', 'Windows 7', '127.0.0.1', 'Firefox', '2021-01-12 01:35:56', '2021-01-12 01:35:56'),
(30, 'CRTP101229102201012', '1', 'ngn', 'topup', 'offline', 6000, 2055999.15, '1', 'd67baf1ec0fd450ab871751fb3ca9c46547ada986fb8debc68e33690cbaaa81cd2801c76', 'Windows 7', '127.0.0.1', 'Firefox', '2021-01-12 02:01:29', '2021-01-12 02:01:29'),
(31, 'CRTP100002214201215', '1', 'ngn', 'topup', 'offline', 12000, 2067999.15, '1', '555335aeeaf40a2d055e28a0c62432b582a908a203a66e10abef472aed20b0ea2746f991', 'Windows 7', '127.0.0.1', 'Firefox', '2021-01-12 02:04:50', '2021-01-12 02:04:50'),
(33, 'CRBY112231085410011', '1', 'btc', 'buybtc', '', 0.00279921, 0.45601203, '1', '356a192b7913b04c54574d18c28d46e6395428ab02c4000037ac62ca1767a628410be393', 'Windows 7', '127.0.0.1', 'Firefox', '2021-01-15 06:41:30 pm', '2021-01-15 18:41:31'),
(34, 'CRSL100051428521511', '1', 'btc', 'sellbtc-internal', '', 0.00279618, 0.45321585, '0', '356a192b7913b04c54574d18c28d46e6395428aba578b9fab996d042ec582b822e3006d1', 'Windows 7', '127.0.0.1', 'Firefox', '2021-01-15 06:50:45 pm', '2021-01-15 18:50:45'),
(35, 'CRSL101421310933210', '1', 'btc', 'sellbtc-external', '', 2.45, 0, '0', '356a192b7913b04c54574d18c28d46e6395428abf6526622805d214536d92bd1a6aacd20', 'Windows 7', '127.0.0.1', 'Firefox', '2021-01-30 02:20:56 pm', '2021-01-30 14:20:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminbank`
--
ALTER TABLE `adminbank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminbanklist`
--
ALTER TABLE `adminbanklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alertus`
--
ALTER TABLE `alertus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buying_transactions`
--
ALTER TABLE `buying_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `controlmailer`
--
ALTER TABLE `controlmailer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `createusers`
--
ALTER TABLE `createusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mediacontrol`
--
ALTER TABLE `mediacontrol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nigeriabanklisting`
--
ALTER TABLE `nigeriabanklisting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentkeys`
--
ALTER TABLE `paymentkeys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selling_transactions`
--
ALTER TABLE `selling_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topup_transaction`
--
ALTER TABLE `topup_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminbank`
--
ALTER TABLE `adminbank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adminbanklist`
--
ALTER TABLE `adminbanklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alertus`
--
ALTER TABLE `alertus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `buying_transactions`
--
ALTER TABLE `buying_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `controlmailer`
--
ALTER TABLE `controlmailer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `createusers`
--
ALTER TABLE `createusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mediacontrol`
--
ALTER TABLE `mediacontrol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nigeriabanklisting`
--
ALTER TABLE `nigeriabanklisting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `paymentkeys`
--
ALTER TABLE `paymentkeys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `selling_transactions`
--
ALTER TABLE `selling_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `topup_transaction`
--
ALTER TABLE `topup_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
