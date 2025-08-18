-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2023 at 08:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thebooklog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'Elias', 'eliasfsdev@gmail.com', '$2y$10$Nqq/y251QX2Ccvb1Ax7hUuMqQSkG3yRLCxN2KPdetnSP3oaXVH70a'),
(2, 'Kalpesh', 'Kalpesh6@gmail.com', '$2y$10$Nqq/y251QX2Ccvb1Ax7hUuMqQSkG3yRLCxN2KPdetnSP3oaXVH70a'),
(3, 'Fatoodi', 'Fatoo@gmail.com', '$2y$10$Xc3d3XChSLr0H5BJv5.dre9n41/cjcjr8eKNmmZnl9T/mw4F3QQ36'),
(4, 'Admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(1, 'Collen Hoover'),
(10, 'Ana Huang'),
(11, 'HG Wells'),
(12, 'Michelle Obama'),
(13, 'Anne Frank'),
(14, 'R F Kaung'),
(15, 'Ian McEwan'),
(16, 'Sun Tzu'),
(17, 'J L Carrell'),
(18, 'Max GladStone Amal El Mohtar'),
(19, 'Harper Lee'),
(20, 'Ashlesha');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `cover` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author_id`, `description`, `category_id`, `cover`) VALUES
(7, 'It ends with us', 1, 'Sometimes it is the one who loves you who hurts you the most.  Lily hasn’t always had it easy, but that’s never stopped her from working hard for the life she wants. She’s come a long way from the small town in Maine where she grew up—she graduated from college, moved to Boston, and started her own business. So when she feels a spark with a gorgeous neurosurgeon named Ryle Kincaid, everything in Lily’s life suddenly seems almost too good to be true.  Ryle is assertive, stubborn, maybe even a little arrogant. He’s also sensitive, brilliant, and has a total soft spot for Lily. And the way he looks in scrubs certainly doesn’t hurt. Lily can’t get him out of her head. But Ryle’s complete aversion to relationships is disturbing. Even as Lily finds herself becoming the exception to his “no dating” rule, she can’t help but wonder what made him that way in the first place.', 1, '644769d9709895.05094585.jpg'),
(8, 'Ugly Love', 1, 'When Tate Collins meets airline pilot Miles Archer, she doesn’t think it’s love at first sight. They wouldn’t even go so far as to consider themselves friends. The only thing Tate and Miles have in common is an undeniable mutual attraction. Once their desires are out in the open, they realize they have the perfect set-up. He doesn’t want love, she doesn’t have time for love, so that just leaves the sex. Their arrangement could be surprisingly seamless, as long as Tate can stick to the only two rules Miles has for her.  Never ask about the past. Don’t expect a future.  They think they can handle it, but realize almost immediately they can’t handle it at all.', 1, '644769c103d926.36107986.jpeg'),
(9, 'Confess', 1, 'From #1 New York Times bestselling author Colleen Hoover, a novel about risking everything for love—and finding your heart somewhere between the truth and lies.  At age twenty-one, Auburn Reed has already lost everything important to her. In her fight to rebuild her shattered life, she has her goals in sight and there is no room for mistakes. But when she walks into a Dallas art studio in search of a job, she doesn’t expect to find a deep attraction to the enigmatic artist who works there, Owen Gentry.  For once, Auburn takes a chance and puts her heart in control, only to discover that Owen is keeping a major secret from coming out. The magnitude of his past threatens to destroy everything important to Auburn, and the only way to get her life back on track is to cut Owen out of it.  To save their relationship, all Owen needs to do is confess. But in this case, the confession could be much more destructive than the actual sin.', 1, '6447a50d3cc0a9.73530299.jpg'),
(10, 'November9', 1, 'You’ll never be able to find yourself if you’re lost in someone else.  Fallon meets Ben, an aspiring novelist, the day before her scheduled cross-country move. Their untimely attraction leads them to spend Fallon’s last day in L.A. together, and her eventful life becomes the creative inspiration Ben has always sought for his novel. Over time and amidst the various relationships and tribulations of their own separate lives, they continue to meet on the same date every year. Until one day Fallon becomes unsure if Ben has been telling her the truth or fabricating a perfect reality for the sake of the ultimate plot twist.', 1, '6491868a990da9.94920530.jpeg'),
(11, 'Regretting You', 1, 'Morgan Grant and her sixteen-year-old daughter, Clara, would like nothing more than to be nothing alike.  Morgan is determined to prevent her daughter from making the same mistakes she did. By getting pregnant and married way too young, Morgan put her own dreams on hold. Clara doesn’t want to follow in her mother’s footsteps. Her predictable mother doesn’t have a spontaneous bone in her body.  With warring personalities and conflicting goals, Morgan and Clara find it increasingly difficult to coexist. The only person who can bring peace to the household is Chris—Morgan’s husband, Clara’s father, and the family anchor. But that peace is shattered when Chris is involved in a tragic and questionable accident. The heartbreaking and long-lasting consequences will reach far beyond just Morgan and Clara.', 1, '64918de3e53e64.18327718.jpg'),
(12, 'Twisted Games', 10, 'Regal, strong-willed, and bound by the chains of duty, Princess Bridget dreams of the freedom to live and love as she chooses.  But when her brother abdicates, she\'s suddenly faced with the prospect of a loveless, politically expedient marriage and a throne she never wanted.  And as she navigates the intricacies-and treacheries-of her new role, she must also hide her desire for a man she can\'t have.  Her bodyguard.  Her protector.  Her ultimate ruin.  Unexpected and forbidden, theirs is a love that could destroy a kingdom...and doom them both.  Do not become emotionally involved. Ever.', 10, '644956e9e680f9.12430184.jpg'),
(13, 'The Time Machine', 11, 'So begins the Time Traveller’s astonishing firsthand account of his journey 800,000 years beyond his own era—and the story that launched H.G. Wells’s successful career and earned him his reputation as the father of science fiction. With a speculative leap that still fires the imagination, Wells sends his brave explorer to face a future burdened with our greatest hopes...and our darkest fears. A pull of the Time Machine’s lever propels him to the age of a slowly dying Earth.  There he discovers two bizarre races—the ethereal Eloi and the subterranean Morlocks—who not only symbolize the duality of human nature, but offer a terrifying portrait of the men of tomorrow as well.  Published in 1895, this masterpiece of invention captivated readers on the threshold of a new century. Thanks to Wells’s expert storytelling and provocative insight, The Time Machine will continue to enthrall readers for generations to come.', 16, '6464072fdaa8d5.26689610.jpg'),
(14, 'Becoming', 12, 'In a life filled with meaning and accomplishment, Michelle Obama has emerged as one of the most iconic and compelling women of our era. As First Lady of the United States of America—the first African American to serve in that role—she helped create the most welcoming and inclusive White House in history, while also establishing herself as a powerful advocate for women and girls in the U.S. and around the world, dramatically changing the ways that families pursue healthier and more active lives, and standing with her husband as he led America through some of its most harrowing moments. Along the way, she showed us a few dance moves, crushed Carpool Karaoke, and raised two down-to-earth daughters under an unforgiving media glare.', 8, '64645e0d01ecd5.24762242.jpeg'),
(15, 'Babel', 14, 'Babel: Or the Necessity of Violence: An Arcane History of the Oxford Translators\' Revolution is a 2022 novel by R. F. Kuang. It debuted at the first spot on The New York Times Best Seller list,[1] and won Blackwell\'s Books of the Year for Fiction in 2022 and the 2022 Nebula Award for Best Novel. Thematically similar to The Poppy War, Kuang\'s first book series, the book criticizes British imperialism, capitalism, and the complicity of academia in perpetuating and enabling them. Kuang drew heavily from history and her own experiences as both a translator and an Oxford graduate.', 11, '6491844c9cdc17.10633678.jpg'),
(16, 'Antonement', 15, 'Atonement is a 2001 British metafictional novel written by Ian McEwan. Set in three time periods, 1935 England, Second World War England and France, and present-day England, it covers an upper-class girl\'s half-innocent mistake that ruins lives, her adulthood in the shadow of that mistake, and a reflection on the nature of writing.Widely regarded as one of McEwan\'s best works, it was shortlisted for the 2001 Booker Prize for fiction.In 2010, Time magazine named Atonement in its list of the 100 greatest English-language novels since 1923.', 11, '649184fb79ca23.09424726.jpg'),
(17, 'The Art of War', 16, 'The Art of War (Chinese: 孫子兵法; lit. \'Sun Tzu\'s Military Method\', pinyin: Sūnzǐ bīngfǎ) is an ancient Chinese military treatise dating from the Late Spring and Autumn Period (roughly 5th century BC). The work, which is attributed to the ancient Chinese military strategist Sun Tzu (\"Master Sun\"), is composed of 13 chapters. Each one is devoted to a different set of skills or art related to warfare and how it applies to military strategy and tactics. For almost 1,500 years it was the lead text in an anthology that was formalized as the Seven Military Classics by Emperor Shenzong of Song in 1080. The Art of War remains the most influential strategy text in East Asian warfare[1] and has influenced both East Asian and Western military theory and thinking and has found a variety of applications in a myriad of competitive non-military endeavors across the modern world including espionage,[2] culture, politics, business, and sports', 12, '64918621aa05d0.51256512.jpg'),
(18, 'The Light We carry', 12, 'There may be no tidy solutions or pithy answers to life\'s big challenges, but Michelle Obama believes that we can all locate and lean on a set of tools to help us better navigate change and remain steady within flux. In The Light We Carry, she opens a frank and honest dialogue with readers, considering the questions many of us wrestle with: How do we build enduring and honest relationships? How can we discover strength and community inside our differences? What tools do we use to address feelings of self-doubt or helplessness? What do we do when it all starts to feel like too much?  Michelle Obama offers readers a series of fresh stories and insightful reflections on change, challenge, and power, including her belief that when we light up for others, we can illuminate the richness and potential of the world around us, discovering deeper truths and new pathways for progress. Drawing from her experiences as a mother, daughter, spouse, friend, and First Lady, she shares the habits and principles she has developed to successfully adapt to change and overcome various obstacles--the earned wisdom that helps her continue to \"become.\" She details her most valuable practices, like \"starting kind,\" \"going high,\" and assembling a \"kitchen table\" of trusted friends and mentors. With trademark humor, candor, and compassion, she also explores issues connected to race, gender, and visibility, encouraging readers to work through fear, find strength in community, and live with boldness.', 17, '6491874ae02d31.12787283.jpg'),
(19, 'The Shakespeare Secret', 17, 'A modern serial killer - hunting an ancient secret.  A woman is left to die as the rebuilt Globe theatre burns. Another woman is drowned like Ophelia, skirts swirling in the water. A professor has his throat slashed open on the steps of Washington\'s Capitol building.  A deadly serial killer is on the loose, modelling his murders on Shakespeare\'s plays. But why is he killing? And how can he be stopped?  A gripping, shocking page turner, The Shakespeare Secret masterfully combines modern murder and startling true revelations from the life of Shakespeare. It has been acclaimed as one of the most compulsively readable thrillers of recent years.', 18, '6491880ecbc374.68075128.jpg'),
(20, 'This Is How You Loose A Time War', 18, 'As agents Red and Blue travel back and forth through time, altering the history of multiple universes on behalf of their warring empires, they leave each other secret messages — at first taunting, but gradually developing into flirtation and then love. When Red\'s commanding officer detects the interaction between Red and Blue, she forces Red to send Blue a message that will kill Blue when it is read — even though she is warned of the danger, Blue reads the message anyway. After Blue is killed, Red time-travels to Blue\'s childhood to give her immunity to the poisoned message, allowing her to survive. This time travel is then discovered and Red is arrested by her own empire; Blue is then able to help facilitate Red\'s escape from jail, and it is implied that they both are able to be free.', 16, '649188a407c3d7.36817748.jpg'),
(21, 'To Kill A Mockingbird', 19, 'To Kill a Mockingbird is a novel by the American author Harper Lee. It was published in 1960 and was instantly successful. In the United States, it is widely read in high schools and middle schools. To Kill a Mockingbird has become a classic of modern American literature; a year after its release, it won the Pulitzer Prize. The plot and characters are loosely based on Lee\'s observations of her family, her neighbors and an event that occurred near her hometown of Monroeville, Alabama, in 1936, when she was ten.  Despite dealing with the serious issues of rape and racial inequality, the novel is renowned for its warmth and humor. Atticus Finch, the narrator\'s father, has served as a moral hero for many readers and as a model of integrity for lawyers. The historian Joseph Crespino explains, \"In the twentieth century, To Kill a Mockingbird is probably the most widely read book dealing with race in America, and its main character, Atticus Finch, the most enduring fictional image of racial heroism.', 15, '649189402bbc29.23286259.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Romance'),
(8, 'Autobiography'),
(10, 'Contemporary'),
(11, 'History'),
(12, 'Philosophy'),
(15, 'Classics'),
(16, 'Science Fiction'),
(17, 'Self Help'),
(18, 'Mystery');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `queries` varchar(350) NOT NULL,
  `name` varchar(100) NOT NULL,
  `answer` varchar(500) NOT NULL DEFAULT 'Pending...'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `email`, `queries`, `name`, `answer`) VALUES
(21, 'ashlesha@gmail.com', 'How many books do you have in stock??', 'Ashlesha', 'Which one you\'re looking for?'),
(37, 'kush@mail.com', 'Please give review about \"The Summer we never had\".\r\n', 'Kush', 'Sure'),
(38, 'kush@mail.com', 'I want to know about sample copies of books', 'Kush', 'Pending...'),
(39, 'ashlesha@gmail.com', 'I wanted to know more about history books. Please uplaod', 'Ashlesha', 'Sure. Uploading ASAP\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(15) NOT NULL,
  `u_name` varchar(150) NOT NULL,
  `u_email` varchar(250) NOT NULL,
  `u_pass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_email`, `u_pass`) VALUES
(13, 'Ashlesha', 'ashlesha@gmail.com', 'Ashlesha30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
