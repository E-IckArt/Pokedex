-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 22 juil. 2022 à 15:03
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pokedex`
--

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `name`, `path`) VALUES
(1, 'Bulbizarre.png', 'uploads/Bulbizarre.png'),
(4, 'Salameche.png', 'uploads/Salameche.png'),
(7, 'Carapuce.png', 'uploads/Carapuce.png'),
(16, 'Roucool.png', 'uploads/Roucool.png'),
(25, 'Pikachu.png', 'uploads/Pikachu.png');

-- --------------------------------------------------------

--
-- Structure de la table `pokemon`
--

CREATE TABLE `pokemon` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type1` int(11) NOT NULL,
  `type2` int(11) DEFAULT NULL,
  `image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pokemon`
--

INSERT INTO `pokemon` (`id`, `number`, `name`, `description`, `type1`, `type2`, `image`) VALUES
(22, 25, 'Pikachu', 'Pikachu (anglais : Pikachu ; japonais : ピカチュウ Pikachu[1]) est un Pokémon Souris de type Électrik apparu dès la première génération. En tant que partenaire de Sacha, héros du dessin animé tiré du jeu, il est le plus célèbre des Pokémon et la mascotte officielle de la licence.', 3, NULL, 25),
(31, 4, 'Salamèche', 'Salamèche (anglais: Charmander ; japonais: ヒトカゲ Hitokage) est le Pokémon de départ de type Feu offert par le Professeur Chen dans la région de Kanto et par le Professeur Platane dans la région de Kalos.\r\n\r\nSalamèche est un Pokémon bipède et reptilien avec un corps orange tandis que son ventre et la plante de ses pieds sont beiges. Ses bras et ses jambes sont courts, avec respectivement quatre doigts et trois griffes chacune. Une flamme brûle au bout de la svelte queue de Salamèche, et elle flamboie depuis sa naissance. La flamme peut servir d\'indication quant à la santé et à l\'humeur de Salamèche : elle brûle fièrement quand le Pokémon est en pleine forme, doucement si le Pokémon est faible ou triste, ondoie quand il est heureux et flamboie quand il est en colère. Il est dit qu\'un Salamèche meurt si sa flamme s\'éteint.\r\n\r\nSalamèche peut être trouvé dans les chaudes aires montagneuses. Cependant, il est trouvé encore plus fréquemment sous la propriété d\'un Dresseur.\r\n\r\n', 4, NULL, 4),
(33, 7, 'Carapuce', 'Carapuce (anglais : Squirtle ; japonais : ゼニガメ Zenigame) est le Pokémon de départ de type Eau offert par le Professeur Chen dans la région de Kanto.\r\n\r\nCarapuce est une petite tortue bipède de couleur bleue. Il possède une carapace brune au pourtour blanc, beige au niveau du ventre. Ses yeux sont grands et violacés. Il a une queue enroulée sur elle-même formant une spirale. Il possède quatre pattes avec chacune trois doigts.\r\n\r\nSa carapace, molle à la naissance, durcit avec le temps et lui sert à se protéger pour lancer ensuite des jets d\'eau ou d\'écume, mais aussi à améliorer son hydrodynamisme.', 8, NULL, 7),
(34, 16, 'Roucool', 'Roucool (anglais : Pidgey ; japonais : ポッポ Poppo) est un Pokémon de type Normal et Vol de la première génération.\r\n\r\nRoucool est un petit Pokémon aviaire au corps dodu. Il est principalement marron avec un visage, un ventre et quelques plumes de couleur crème. Ses serres et son bec sont gris rosâtre. Il a des marquages noirs angulaires autour des yeux et une petite crête aux plumes marron et crème sur le dessus de la tête.\r\n\r\nRoucool a un sens de l\'orientation extrêmement aiguisé, surtout pour rentrer chez lui. Il peut localiser son nid même s\'il a été déplacé. C\'est un Pokémon docile, et il préfère s\'enfuir en volant devant ses ennemis plutôt que de les combattre. En agitant rapidement ses ailes, il peut soulever des nuages de poussière et créer des tourbillons pour se protéger et faire fuir son potentiel ennemi. Roucool est un Pokémon très commun, et peut être trouvé dans les prés et les forêts.', 6, 5, 16);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `name`, `color`) VALUES
(1, 'Herbe', '#7AC74C'),
(2, 'Poison', '#A33EA1'),
(3, 'Electrique', '#F7D02C'),
(4, 'Feu', '#EE8130'),
(5, 'Vol', '#C22E28'),
(6, 'Normal', '#A8A77A'),
(7, 'Glace', '#96D9D6'),
(8, 'Eau', '#8199FD');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type1` (`type1`),
  ADD KEY `image_id` (`image`),
  ADD KEY `pokemon_ibfk_2` (`type2`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `pokemon`
--
ALTER TABLE `pokemon`
  ADD CONSTRAINT `pokemon_ibfk_2` FOREIGN KEY (`type2`) REFERENCES `type` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
