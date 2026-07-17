-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Creato il: Lug 16, 2026 alle 14:12
-- Versione del server: 8.0.46
-- Versione PHP: 8.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `articles`
--



CREATE TABLE `articles` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('draft','published','archived') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `views_count` int UNSIGNED NOT NULL DEFAULT '0',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `excerpt`, `content`, `featured_image`, `status`, `views_count`, `is_featured`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'The Artificial Intelligence Approach to Different Types of Prompts', 'ai-approach-prompt-types', 'An in-depth analysis of how Large Language Models process and tackle user inputs, distinguishing between informational, creative, logical, and programming tasks.', '\r\n## The Architecture of Artificial Thought\r\n\r\nEvery time a user enters an input into a language model\'s chat, a complex neural processing workflow is activated. Artificial Intelligence does not \"think\" like a human being; instead, it maps probabilistic relationships between words. However, the strategic approach to the response changes radically depending on the nature of the prompt received.\r\n\r\nWe can divide interactions with AI into three macro-categories, each of which requires a different balance between logical rigor and creative flexibility.\r\n\r\n---\r\n\r\n### 1. Factual and Informational Requests\r\nIn this scenario, the user is looking for precise data, definitions, historical summaries, or explanations of complex concepts.\r\n\r\n* **How the AI behaves:** The model minimizes \"creativity\" (to avoid data hallucination) and acts as an advanced semantic search engine.\r\n* **Response structure:** It prefers the use of bullet points, comparative tables, and clear definitions at the top of the text.\r\n* **Main objective:** Maximum accuracy and text scannability.\r\n\r\n> **Golden rule for the user:** To get the most out of these requests, it is essential to specify the context and the desired depth of detail (e.g., \"Explain it to me like I\'m a beginner\").\r\n\r\n---\r\n\r\n### 2. Creative Generation and Brainstorming\r\nWhen asking the AI to write a story, design a brand payoff, or generate ideas for a blog, the approach changes completely.\r\n\r\n* **How the AI behaves:** The model expands probabilistic connections, drawing from seemingly distant contexts to create original analogies. The algorithmic \"temperature\" parameter is utilized to obtain less predictable outputs.\r\n* **Response structure:** Fluid text, narrative paragraphs, and lists of highly diversified options.\r\n* **Main objective:** Variety, stylistic fluidity, and originality.\r\n\r\n---\r\n\r\n### 3. Logic, Coding, and Problem Solving\r\nThis is the most rigid and deterministic domain, which includes writing software code, debugging, or solving complex mathematical problems.\r\n\r\n* **How the AI behaves:** The model applies a sequential and rigorous approach (often guided by *Chain-of-Thought* logic), analyzing syntactic dependencies and the structural constraints of the programming language or logical rules requested.\r\n* **Response structure:** Isolated code blocks, line-by-line comments, and a final explanation of the logic used.\r\n* **Main objective:** Functionality, absence of bugs, and performance optimization.\r\n\r\n---\r\n\r\n## Conclusions: The Importance of Prompt Engineering\r\n\r\nUnderstanding how AI segments and processes tasks allows developers and content creators to design better prompts. Artificial Intelligence adapts to the user\'s style: a vague input will generate a generic response, while a structured, clear, and contextualized input will unlock the model\'s true potential.', 'https://png.pngtree.com/thumb_back/fh260/background/20250423/pngtree-futuristic-ai-technology-source-and-related-content-image_17208471.jpg', 'published', 0, 1, '2026-07-15 13:18:23', '2026-07-15 13:18:23', '2026-07-15 17:05:39'),
(2, 'Is AI Political? Bias, Power, and Algorithmic Neutrality', 'is-ai-political-bias-power', 'An in-depth analysis of whether artificial intelligence can ever be truly neutral, exploring how training data, human choices, and systemic power shape algorithmic outputs.', '\r\n## The Myth of Algorithmic Neutrality\r\n\r\nFor a long time, software was viewed as a neutral tool. A calculator does not have a political stance, and a spreadsheet does not take sides. However, as artificial intelligence becomes deeply integrated into society, a crucial question arises: Is AI political? \r\n\r\nThe short answer is yes. AI is not merely a collection of impartial mathematical formulas. It is a product of human decisions, cultural contexts, and historical data, making it inherently tied to power dynamics and political outcomes.\r\n\r\n---\r\n\r\n### 1. The Data Dilemma: Inheriting Human History\r\nMachine learning models do not learn in a vacuum; they are trained on massive datasets generated by humans, mostly from the internet.\r\n\r\n* **The Feedback Loop:** If historical data contains systemic biases, unfair stereotypes, or unequal representation, the AI will learn and replicate those patterns.\r\n* **An Unjust Mirror:** When an algorithm is trained on past hiring decisions or judicial outcomes, it does not invent neutrality. Instead, it codifies past biases into a seemingly objective score.\r\n\r\n> **Key Concept:** AI does not predict the future; it predicts a version of the past that has been optimized by creators.\r\n\r\n---\r\n\r\n### 2. The Gatekeepers: Who Builds the Models?\r\nThe development of leading AI models is concentrated in a few massive technology corporations and well-funded research institutions. \r\n\r\n* **Value Alignment:** The engineers, executives, and researchers who build AI must make choices about what is safe, helpful, or harmful. These boundaries are defined by human values, which are fundamentally political.\r\n* **Content Moderation:** Deciding what kind of speech an AI should block, filter, or encourage is one of the most highly debated political issues of our time. There is no neutral position when defining hate speech or misinformation.\r\n\r\n---\r\n\r\n### 3. AI as an Instrument of Power\r\nTechnology has always shifted power, and AI is accelerating this shift on a global scale.\r\n\r\n* **Surveillance and Control:** Governments and corporations use computer vision and predictive analytics to monitor citizens, manage labor, and control resources.\r\n* **Information Ecosystems:** Algorithmic recommendation engines shape what news we see, influencing democratic elections and public discourse worldwide.\r\n\r\n---\r\n\r\n## Conclusion: Navigating the Political Future of AI\r\n\r\nAI is not a neutral observer. It is a powerful lens that reflects, amplifies, and sometimes distorts the values of its creators and the societies that host it. Recognizing that AI is political is the first step toward building systems that are transparent, accountable, and designed to serve the collective good rather than concentrated interests.', 'https://cps.org.uk/wp-content/uploads/2024/10/GettyImages-1659403360-scaled.jpg', 'published', 0, 1, '2026-07-15 14:16:36', '2026-07-15 14:16:36', '2026-07-15 17:05:59'),
(4, 'The Power of Self-Taught Programming and Hobbyist Development', 'power-self-taught-programming-hobbyist-development', 'An in-depth analysis of the journey of learning to code independently, balancing personal passions, real-world projects, and building a practical learning methodology.', '\r\n## Learning by Doing: The Philosophy of Practical Growth\r\n\r\nIn the digital era, democratic access to information has transformed the role of the programmer. A traditional academic path is no longer strictly necessary to build valuable software. Hobbyist programming and self-taught learning represent one of the most fertile and exciting paths to enter the world of web development and computer science today.\r\n\r\n---\r\n\r\n### 1. Curiosity as the Primary Engine\r\nThose who approach programming out of passion are not guided by a school curriculum or an exam, but by the desire to solve a concrete problem or bring an idea to life.\r\n\r\n* **The Practical Approach:** It often begins by modifying a small script, setting up a local server, or trying to build a web application as a hobby.\r\n* **Managing Failure:** Self-taught developers quickly learn to coexist with errors. Reading compiler logs, searching for solutions in developer forums, and debugging are activities that build strong mental resilience.\r\n\r\n> **A Key Concept:** Learning to program on your own does not mean having no teachers, but rather knowing how to critically choose your sources through official documentation and online communities.\r\n\r\n---\r\n\r\n### 2. The Value of Personal Projects\r\nA portfolio of real projects is worth more than many theoretical certifications. Building a web app to archive movies, configuring a local database, or automating a daily routine are fundamental milestones.\r\n\r\n* **The Big Picture:** Developing an application entirely on your own forces you to understand the complete software lifecycle: from database design to backend logic and user interface implementation.\r\n* **Technological Autonomy:** Free from academic constraints, the hobbyist developer can experiment openly with Docker, modern frameworks, or new programming languages based entirely on interest.\r\n\r\n---\r\n\r\n### 3. From Hobbyist Development to the Profession\r\nMany of the best software engineers started as hobbyist programmers. Transitioning to professional environments requires integrating practice with a solid methodological foundation.\r\n\r\n* **Code Craftsmanship:** Moving from code that simply works to clean, maintainable code by adopting version control systems such as Git.\r\n* **Teamwork:** Adapting personal skills to team dynamics, learning to document your work, and contributing to open-source projects.\r\n\r\n---\r\n\r\n## Conclusions: A Solution-Oriented Mindset\r\n\r\nSelf-taught programming is not just a set of technical skills; it is a mindset. It teaches you to break down complex problems into small logical steps and stay constantly updated in an industry that changes daily. The hobbyist of today is the innovator of tomorrow.', 'https://secure.chasingnext.com/blog/images/2025/09/chasingnext-vibecoding-1.png', 'published', 0, 1, '2026-07-15 14:24:28', '2026-07-15 14:24:28', '2026-07-15 17:06:28');

-- --------------------------------------------------------

--
-- Struttura della tabella `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `cellulare` varchar(20) DEFAULT NULL,
  `messaggio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `cellulare`, `messaggio`) VALUES
(1, 'ff@gmail.com', '', 'a'),
(2, 'ff@gmail.com', '', 'aza'),
(3, '', '', ''),
(4, '', '', ''),
(5, '', '', ''),
(6, '', '', ''),
(7, '', '', ''),
(8, '', '', ''),
(9, '', '', ''),
(10, '', '', ''),
(11, '', '', ''),
(12, '', '', ''),
(13, '', '', ''),
(14, '', '', ''),
(15, '', '', ''),
(16, 'ff@gmail.com', '', 'a'),
(17, 'ff@gmail.com', '', 'jjj');

-- --------------------------------------------------------

--
-- Struttura della tabella `timeline_events`
--

CREATE TABLE `timeline_events` (
  `id` int NOT NULL,
  `event_date` varchar(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `caption` varchar(255) NOT NULL,
  `shape_type` enum('fumetto','nastro','pillola','inclinata') DEFAULT 'fumetto',
  `quadrant` enum('above','below') DEFAULT 'above',
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `timeline_events`
--

INSERT INTO `timeline_events` (`id`, `event_date`, `title`, `description`, `image_path`, `caption`, `shape_type`, `quadrant`, `order_date`) VALUES
(1, '2021-2026', 'ITT Panetti Pitagora - High School Education', 'I studied for 5 years at a technical high school, earning a diploma in Computer Science and Telecommunications with the maximum score of 100/100 cum laude.', 'https://www.panettipitagora.edu.it/wp/wp-content/uploads/2023/07/cropped-panetti-pitagora-squared.png', 'Secondary education and academics', 'fumetto', 'above', '2025-07-01'),
(2, '06/2025', 'Erasmus+ International Mobility - Crete', 'I spent a month in Greece (Rethymno) thanks to the Erasmus+ project, working at local IT companies and refining both my technical and language skills.', 'https://images.seeklogo.com/logo-png/32/1/erasmus-logo-png_seeklogo-321107.png', 'Professional and multicultural learning', 'nastro', 'below', '2026-03-01'),
(3, '07/2025', 'CAE English Preparation & Certification – Birmingham', 'Completed an intensive one-month language program at Bournville College in Birmingham, England, successfully earning the Cambridge certificate.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTY6H2MuL0GEoQCKtjyVC8jvU0O0wF4HoTD-ft51rw1v3-1Mm_k9Aa8mm_S&s=10', 'Cambridge CAE Achieved!', 'nastro', 'above', '2026-03-01'),
(4, '2026', 'Politecnico di Milano - Computer Engineering', 'I began my Bachelor\'s degree in Computer Engineering at PoliMi, aiming to build upon the foundations laid during my 5 years of high school.', 'https://cities.confcommercio.it/wp-content/uploads/2025/09/Politecnico.jpg', 'Academic and professional learning', 'pillola', 'below', '2026-07-01');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`),
  ADD KEY `articles_status_published_at_idx` (`status`,`published_at`);

--
-- Indici per le tabelle `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `timeline_events`
--
ALTER TABLE `timeline_events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT per la tabella `timeline_events`
--
ALTER TABLE `timeline_events`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
