CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `t_fixe` varchar(255) NOT NULL,
  `t_mobile` varchar(255) NOT NULL,
  `t_fixe_2` varchar(255) NOT NULL,
  `batiment` varchar(255) NOT NULL,
  `bureau` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `autre` text NOT NULL,
  `matricule` varchar(255) NOT NULL
);
-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `service` varchar(255) NOT NULL
);

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL
);
