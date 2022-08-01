-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2022 at 11:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
use aqdimmeh_wiki;
-- SET time_zone = "+00:00";

-- /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
-- /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
-- /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
-- SET NAMES 'utf8';

--
-- Database: `pti_wiki`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`username`, `password`, `role`) VALUES
('admin', '$2y$10$fwhEr0UoHlQl3fbBDYSsFOw2znoISEGyRa7.THboVZ12/4de.ie2i', 'admin'),
('user1', '$2y$10$8WwswHFSlraSGUW6k6czsue/GLXZiIaCEd.5cw1ptByOlEQXouiNy', 'user'),
('user2', '$2y$10$G.F2M13wQQiNtEESR/rPCec9Sq2p6saU1Z.3sEt3iHV5YIsge8/5m', 'user'),
('user3', '$2y$10$sEjDND6NUkufSKCibZHJVutdqgTFgEzwTvlML4E3PRoGjjivFqgOy', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--
INSERT INTO `pages` (`title`, `content`) VALUES
('ClaudeBerge', '# Claude Berge\r\n\r\nClaude Berge, né le 5 juin 1926 et mort le 30 juin 2002, était un mathématicien et artiste français. \r\n\r\nSur le plan mathématique, il a été un des créateurs de la théorie des graphes telle que nous la connaissons actuellement, notamment grâce à son livre **Théorie des Graphes et ses Applications** publié en 1958. Il est également l\'auteur d\'ouvrages majeurs en topologie et en analyse combinatoire, qui seront plus tard traduits en anglais et restent actuellement des références incontournables en ces matières. \r\n\r\nEn 1995 le prix Euler lui est décerné — conjointement avec le Professeur R.L. Graham — par l\'Institute for Combinatorics.\r\n\r\nSur le plan artistique, il a été l\'un des fondateurs de l\'OuLiPo en 1960 et est l\'auteur d\'ouvrages littéraires. Mais il était aussi sculpteur et collectionneur d\'arts, notamment d\'art asmat de Nouvelle-Guinée.'),
('FrancoisLeLionnais', '# François Le Lionnais\r\n\r\nFrançois Le Lionnais (3 octobre 1901 à Paris - 13 mars 1984 à Boulogne-Billancourt, France) est un ingénieur chimiste mathématicien épris de littérature, doublé d’un écrivain passionné de sciences.\r\n\r\nAprès une approche professionnelle dans l\'industrialisation de la téléphonie automatique, il devint un résistant lyonnais de la première heure (du groupe Front National), puis fut déporté à Dora durant deux ans sur les chaînes de montage des circuits de guidage des fusées V2… parfois « modifiés » par ses soins.\r\n\r\nNommé par la suite Directeur des Études Générales à l\'École Supérieure de Guerre, il devint Chef de la Division d\'Enseignement et de Diffusion des Sciences à l\'UNESCO au début des années 1950.\r\n\r\nCélèbre à la fois pour son livre sur les Nombres remarquables et la fondation de l’OuLiPo, ingénieur et chimiste de formation, il fut régent du Collège de ’Pataphysique, grand spécialiste du jeu d\'échecs et producteur-animateur d’une émission de radio diffusée régulièrement tout au long des années 60, *La Science en marche* (sur France Culture), alors qu\'il est membre du Comité des sciences de la R.T.F.\r\n'),
('GeorgesPerec', '# Geroges Perec\r\n\r\n\r\n**Georges Perec** est un écrivain et verbicruciste français né le 7 mars 1936 à Paris et décédé le 3 mars 1982 à Ivry-sur-Seine (Val-de-Marne). Membre de l\'Oulipo à partir de 1967, ses œuvres sont fondées sur l\'utilisation de contraintes formelles littéraires ou mathématiques qui marquent son style1.\r\n\r\nGeorges Perec s\'est fait connaître dès son premier roman, *Les Choses*. Une histoire des années soixante (Prix Renaudot 1965) qui restitue l\'air du temps à l\'orée de la société de consommation. \r\nSuivent entre autres:\r\n- *Un Homme qui dort*, portrait d\'une solitude urbaine\r\n- *La Disparition*, où il reprend aussi son obsession de l\'absence douloureuse. Ce premier roman oulipien de Perec est aussi un roman lipogrammatique (il ne comporte aucun « e »)\r\n- *W ou le souvenir d\'enfance* qui alterne fiction olympique fascisante et écriture autobiographique fragmentaire.\r\n- *Vie mode d\'emploi* (Prix Médicis 1978) dans lequel Georges Perec explore de façon méthodique et contrainte la vie des différents habitants d\'un immeuble lui apporte la consécration.\r\n'),
('ONU', '# O N U\r\n\r\nL’Organisation des Nations unies (ONU) est une organisation internationale regroupant en juin 2022 193 États membres. Elle a été instituée le 24 octobre 1945 par la ratification de la CharteDesNationsUnies signée le 26 juin 1945 par les représentants de 51 États. Elle remplace alors la Société des Nations.\r\n\r\nLes objectifs premiers de l\'organisation sont le maintien de la paix et la sécurité internationale. Pour les accomplir, elle promeut la protection des droits de l\'homme, la fourniture de l\'aide humanitaire, le développement durable et la garantie du droit international et dispose de pouvoirs spécifiques tels que l\'établissement de sanctions internationales et l\'intervention militaire.\r\n\r\nLa CharteDesNationsUnies définit six organes principaux : l\'Assemblée générale, le Conseil de sécurité, le Conseil économique et social, le Conseil de tutelle, la Cour internationale de justice et le Secrétariat. Le système des Nations unies inclut plus largement des programmes, fonds, institutions spécialisées et apparentées.\r\n\r\nLes six langues officielles de l\'ONU sont l\'anglais, l\'arabe, l\'espagnol, le français, le mandarin et le russe. Le Secrétariat des Nations unies ne reconnait que l\'anglais et le français comme langue de travail, le Conseil économique et social des Nations unies reconnait l\'anglais, l\'espagnol et le français, et le reste des organes de l\'ONU utilise les six langues officielles.\r\n\r\nDepuis le 1er janvier 2017, le secrétaire général des Nations unies, nommé par l\'Assemblée générale sur recommandation du Conseil de sécurité, est le Portugais António Guterres.\r\n\r\nLe siège des Nations unies est à New York et bénéficie du régime d\'extraterritorialité. Les 193 États membres y sont représentés par un ambassadeur permanent auprès de l\'ONU. '),
('OuLiPo', '# Présentation de l\'Oulipo\r\n\r\nCe groupe comprend des écrivains, dont les plus célèbres sont RaymondQueneau, Italo Calvino ou GeorgesPerec, mais aussi des personnalités ayant une double compétence comme le compositeur de mathématique et de poésie Jacques Roubaud ou de (presque) purs mathématiciens comme ClaudeBerge (développeur de la Théorie des graphes). \r\n\r\nConsidérant que les contraintes formelles sont un puissant stimulant pour l\'imagination, l\'Oulipo s\'est fixé plusieurs directions de travail :\r\n-un travail synthétique (synthoulipisme), qui consiste en l\'invention et l\'expérimentation de contraintes littéraires nouvelles, avec éventuellement un exemple de texte pour chaque proposition.\r\n-un travail analytique (anoulipisme), qui consiste en la recherche de ceux qui sont appelés, avec humour, les « plagiaires par anticipation », soit un recensement de tous les écrivains qui ont travaillé avec des contraintes, de façon plus ou moins consciente, avant la création de l\'Oulipo.\r\n\r\nLes recherches en synthoulipisme constituent la face la plus connue du grand public et surtout la plus spectaculaire. Sont célèbres aujourd\'hui par exemple la méthode S plus n (à partir de la « méthode S + 7 » mise au point par Jean Lescure dès 1961), la littérature combinatoire, qui permit à Raymond Queneau d\'écrire Cent Mille Milliards de Poèmes mais aussi des poèmes booléens basés sur l\' algèbre de Boole ou des « poèmes à métamorphoses pour rubans de Möbius ».\r\n'),
('PageAccueil', '# Ouvroir de littérature potentielle\r\n\r\nL\'**Ouvroir de littérature potentielle**, généralement désigné par son acronyme OuLiPo (ou Oulipo), est un groupe international de littéraires et de mathématiciens se définissant comme des « rats qui construisent eux-mêmes le labyrinthe dont ils se proposent de sortir ». \r\n\r\nOn prête cette définition à RaymondQueneau:\r\n\r\nL\'OuLiPo se définit d\'abord par ce qu\'il n\'est pas :\r\n- Ce n\'est pas un mouvement littéraire.\r\n- Ce n\'est pas un séminaire scientifique.\r\n- Ce n\'est pas de la littérature aléatoire.\r\n\r\n## Quelques membres:\r\n- GeorgesPerec\r\n- FrancoisLeLionnais\r\n- ClaudeBerge\r\n\r\n## Pages nouvellement crées:\r\n- UNESCO\r\n- ONU\r\n\r\n## Pages pas encore crées:\r\n- SecondeGuerreMondiale\r\n- CharteDesNationsUnies\r\n\r\n\r\n*Les textes de cet exemple sont tirées d\'informations disponibles à partir de [l\'article Oulipo de Wikipedia](http://fr.wikipedia.org/wiki/Oulipo)*\r\n\r\n'),
('RaymondQueneau', '# Raymond Queneau\r\n\r\nRaymond Queneau, né au Havre (Seine-Inférieure, aujourd’hui Seine-Maritime) le 21 février 1903 et mort à Paris le 25 octobre 1976, est un romancier, poète, dramaturge français, cofondateur du groupe littéraire OuLiPo.\r\n\r\nC’est en 1933 qu’il publie son premier roman, Le Chiendent, qu’il construisit selon ses dires comme une illustration littéraire du Discours de la méthode de René Descartes. Ce roman lui vaudra la reconnaissance de quelques amateurs qui lui décernent le premier prix des Deux-Magots de l\'histoire. Suivront quatre romans d’inspiration autobiographique : Les Derniers Jours, Odile, Les Enfants du limon et Chêne et Chien, ce dernier entièrement écrit en vers.\r\n\r\nC’est avec *Pierrot mon ami*, paru en 1942, qu’il connaît son premier succès. En 1947 paraît **Exercices de style**, un court récit décliné en une centaine de styles. Ces *Exercices de style* lui furent inspirés par *L’Art de la fugue* de Johann Sebastian Bach, lors d’un concert auquel il avait assisté, en compagnie de son ami Michel Leiris, et qui avait fait naître en lui l’envie de développer différents styles d’écriture. '),
('UNESCO', '# U N E S C O\r\n\r\nL\'Organisation des Nations unies pour l\'éducation, la science et la culture (en anglais : United Nations Educational, Scientific and Cultural Organization, UNESCO, parfois écrit Unesco) est une institution spécialisée internationale de l\'Organisation des Nations unies (ONU), créée le 16 novembre 1945 à la suite des dégâts et des massacres de la SecondeGuerreMondiale.\r\n\r\nSelon son acte constitutif, l\'UNESCO a pour objectif de « contribuer au maintien de la paix et de la sécurité en resserrant, par l’éducation, la science et la culture, la collaboration entre nations, afin d’assurer le respect universel de la justice, de la loi, des droits de l\'Homme et des libertés fondamentales pour tous, sans distinction de race, de sexe, de langue ou de religion, que la CharteDesNations unies reconnaît à tous les peuples ».\r\n\r\nLe siège de l\'UNESCO est situé à Paris (France), au 7/9, place de Fontenoy – UNESCO, dans le quartier de l\'École-Militaire du 7e arrondissement. Sont rattachés au siège plus de cinquante bureaux, plusieurs instituts et centres dans le monde entier, comme l’Institut de statistique à Montréal ou le Bureau international d\'éducation à Genève. ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`title`);
COMMIT;

-- /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
-- /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
-- /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
