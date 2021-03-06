-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 06 oct. 2017 à 13:45
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `MyLittleLibrary`
--

-- --------------------------------------------------------

--
-- Structure de la table `Comments`
--

CREATE TABLE `Comments` (
  `CommentsId` int(11) NOT NULL,
  `User` int(11) NOT NULL,
  `Library` int(11) NOT NULL,
  `LibraryProduct` int(11) NOT NULL,
  `Comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Consumn`
--

CREATE TABLE `Consumn` (
  `ConsumnId` int(11) NOT NULL,
  `User` int(11) NOT NULL,
  `Library` int(11) NOT NULL,
  `LibraryProduct` int(11) NOT NULL,
  `Consumn` tinyint(1) NOT NULL,
  `LastConsumn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Favorite`
--

CREATE TABLE `Favorite` (
  `FavoriteId` int(11) NOT NULL,
  `User` int(11) NOT NULL,
  `Library` int(11) DEFAULT NULL,
  `LibraryProduct` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Library`
--

CREATE TABLE `Library` (
  `LibraryId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Library`
--

INSERT INTO `Library` (`LibraryId`, `name`) VALUES
(1, 'movies'),
(2, 'music');

-- --------------------------------------------------------

--
-- Structure de la table `LibraryMovies`
--

CREATE TABLE `LibraryMovies` (
  `LibraryMoviesId` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `genre` int(11) DEFAULT NULL,
  `duration` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `LibraryMovies`
--

INSERT INTO `LibraryMovies` (`LibraryMoviesId`, `user`, `name`, `description`, `genre`, `duration`) VALUES
(1, 1, 'Prison Break', 'Michael Scofield s\'engage dans une véritable lutte contre la montre : son frère Lincoln est dans le couloir de la mort, en attente de son exécution. Persuadé de son innocence mais à court de solutions, Michael décide de se faire incarcérer à son tour dans le pénitencier d\'état de Fox River pour organiser leur évasion...', NULL, NULL),
(2, 2, 'Stargate SG-1', 'Un anneau de trois mètres de diamètre fait d’un métal inconnu sur Terre constitue en fait une porte ouvrant un passage vers d’autres planètes. Des équipes de militaires et de scientifiques explorent ces différentes planètes, cherchant de nouvelles technologies pour combattre notamment les Goa’ulds, une espèce extraterrestre qui parasite des humains. Parmi ces équipes d’exploration, SG-1 devient la plus réputée, avec le colonel O’Neill, l’égyptologue Jackson, le major Carter et Teal’c, un Jaffa venant de Chulak, un autre monde.', NULL, NULL),
(3, 1, 'How I Met Your Mother', 'Ted se remémore ses jeunes années, lorsqu\'il était encore célibataire. Il revoit avec nostalgie ses moments d\'égarements et de troubles, ses rencontres et ses recherches effrénées du Grand Amour.', NULL, NULL),
(4, 1, 'Weeds', 'Dans une banlieue respectable de Los Angeles, les apparences sont parfois trompeuses. Les sales petits secrets des uns et des autres vont peu à peu se faire jour. Nancy Botwin, une mère célibataire, vend de la marijuana depuis la mort subite de son mari. C\'est sa façon à elle de subvenir aux besoins de sa famille...', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `LibraryMoviesGenre`
--

CREATE TABLE `LibraryMoviesGenre` (
  `LibraryMoviesGenreId` int(11) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `LibraryMoviesGenre`
--

INSERT INTO `LibraryMoviesGenre` (`LibraryMoviesGenreId`, `genre`) VALUES
(1, 'comedy'),
(2, 'horror'),
(3, 'family'),
(4, 'thriller'),
(5, 'fantasy'),
(6, 'fiction'),
(7, 'adventure'),
(8, 'musical'),
(9, 'erotic'),
(10, 'drama'),
(11, 'war'),
(12, 'historic'),
(13, 'road movies'),
(14, 'animation'),
(15, 'action');

-- --------------------------------------------------------

--
-- Structure de la table `LibraryMusic`
--

CREATE TABLE `LibraryMusic` (
  `LibraryMusicId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `album` varchar(255) NOT NULL,
  `genre` int(11) NOT NULL,
  `duration` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `LibraryMusicGenre`
--

CREATE TABLE `LibraryMusicGenre` (
  `LibraryMoviesGenreId` int(11) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `LibraryMusicGenre`
--

INSERT INTO `LibraryMusicGenre` (`LibraryMoviesGenreId`, `genre`) VALUES
(1, 'rock'),
(2, 'classic'),
(3, 'metal'),
(4, 'punk'),
(5, 'funk'),
(6, 'electro'),
(7, 'rap'),
(8, 'indies'),
(9, 'vocal'),
(10, 'ambiant');

-- --------------------------------------------------------

--
-- Structure de la table `OrderList`
--

CREATE TABLE `OrderList` (
  `OrderListId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `OrderList`
--

INSERT INTO `OrderList` (`OrderListId`, `name`) VALUES
(1, 'alphabetic'),
(4, 'new'),
(3, 'popularity'),
(2, 'preference'),
(5, 'price');

-- --------------------------------------------------------

--
-- Structure de la table `Order_`
--

CREATE TABLE `Order_` (
  `OrderId` int(11) NOT NULL,
  `User` int(11) NOT NULL,
  `Library` int(11) DEFAULT NULL,
  `OrderList` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `UsersId` int(11) NOT NULL,
  `Pseudo` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Users`
--

INSERT INTO `Users` (`UsersId`, `Pseudo`, `Password`) VALUES
(1, 'pierre', 'aaa'),
(2, 'aurelie', 'coucou');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`CommentsId`),
  ADD KEY `User` (`User`),
  ADD KEY `Movie` (`Library`);

--
-- Index pour la table `Consumn`
--
ALTER TABLE `Consumn`
  ADD PRIMARY KEY (`ConsumnId`),
  ADD KEY `User` (`User`),
  ADD KEY `Movie` (`Library`);

--
-- Index pour la table `Favorite`
--
ALTER TABLE `Favorite`
  ADD PRIMARY KEY (`FavoriteId`),
  ADD KEY `User` (`User`),
  ADD KEY `Movie` (`Library`);

--
-- Index pour la table `Library`
--
ALTER TABLE `Library`
  ADD PRIMARY KEY (`LibraryId`);

--
-- Index pour la table `LibraryMovies`
--
ALTER TABLE `LibraryMovies`
  ADD PRIMARY KEY (`LibraryMoviesId`),
  ADD KEY `Genre` (`genre`);

--
-- Index pour la table `LibraryMoviesGenre`
--
ALTER TABLE `LibraryMoviesGenre`
  ADD PRIMARY KEY (`LibraryMoviesGenreId`);

--
-- Index pour la table `LibraryMusic`
--
ALTER TABLE `LibraryMusic`
  ADD PRIMARY KEY (`LibraryMusicId`);

--
-- Index pour la table `LibraryMusicGenre`
--
ALTER TABLE `LibraryMusicGenre`
  ADD PRIMARY KEY (`LibraryMoviesGenreId`);

--
-- Index pour la table `OrderList`
--
ALTER TABLE `OrderList`
  ADD PRIMARY KEY (`OrderListId`),
  ADD KEY `User` (`name`);

--
-- Index pour la table `Order_`
--
ALTER TABLE `Order_`
  ADD PRIMARY KEY (`OrderId`),
  ADD KEY `User` (`User`),
  ADD KEY `Movie` (`Library`),
  ADD KEY `Music` (`OrderList`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UsersId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `CommentsId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Consumn`
--
ALTER TABLE `Consumn`
  MODIFY `ConsumnId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Favorite`
--
ALTER TABLE `Favorite`
  MODIFY `FavoriteId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Library`
--
ALTER TABLE `Library`
  MODIFY `LibraryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `LibraryMovies`
--
ALTER TABLE `LibraryMovies`
  MODIFY `LibraryMoviesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `LibraryMoviesGenre`
--
ALTER TABLE `LibraryMoviesGenre`
  MODIFY `LibraryMoviesGenreId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `LibraryMusic`
--
ALTER TABLE `LibraryMusic`
  MODIFY `LibraryMusicId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `LibraryMusicGenre`
--
ALTER TABLE `LibraryMusicGenre`
  MODIFY `LibraryMoviesGenreId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `OrderList`
--
ALTER TABLE `OrderList`
  MODIFY `OrderListId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Order_`
--
ALTER TABLE `Order_`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `UsersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `Comment_Library` FOREIGN KEY (`Library`) REFERENCES `Library` (`LibraryId`),
  ADD CONSTRAINT `Comment_User` FOREIGN KEY (`User`) REFERENCES `Users` (`UsersId`);

--
-- Contraintes pour la table `Consumn`
--
ALTER TABLE `Consumn`
  ADD CONSTRAINT `Consumn_Library` FOREIGN KEY (`Library`) REFERENCES `Library` (`LibraryId`),
  ADD CONSTRAINT `Consumn_User` FOREIGN KEY (`User`) REFERENCES `Users` (`UsersId`);

--
-- Contraintes pour la table `Favorite`
--
ALTER TABLE `Favorite`
  ADD CONSTRAINT `Favorite_Library` FOREIGN KEY (`Library`) REFERENCES `Library` (`LibraryId`),
  ADD CONSTRAINT `Favorite_User` FOREIGN KEY (`User`) REFERENCES `Users` (`UsersId`);

--
-- Contraintes pour la table `LibraryMovies`
--
ALTER TABLE `LibraryMovies`
  ADD CONSTRAINT `Genre` FOREIGN KEY (`genre`) REFERENCES `LibraryMoviesGenre` (`LibraryMoviesGenreId`);

--
-- Contraintes pour la table `Order_`
--
ALTER TABLE `Order_`
  ADD CONSTRAINT `Order_List` FOREIGN KEY (`OrderList`) REFERENCES `OrderList` (`OrderListId`),
  ADD CONSTRAINT `Order_user` FOREIGN KEY (`User`) REFERENCES `Users` (`UsersId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
