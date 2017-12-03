
CREATE TABLE IF NOT EXISTS `auteur` (
  `id_auteur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_auteur` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_auteur`),
  UNIQUE KEY `nom_auteur` (`nom_auteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

INSERT INTO `auteur` (`id_auteur`, `nom_auteur`) VALUES
(4, 'Alexandre Dumas'),
(3, 'Herman Melville'),
(5, 'Ion Creanga'),
(6, 'James, E.l.'),
(2, 'Margaret Mitchell'),
(1, 'Orwell');

CREATE TABLE IF NOT EXISTS `livre` (
  `id_livre` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(25) CHARACTER SET utf8 NOT NULL,
  `annee` int(4) NOT NULL,
  `resume` text CHARACTER SET utf8,
  `auteur_livre` int(11) NOT NULL,
  PRIMARY KEY (`id_livre`),
  KEY `auteur_livre` (`auteur_livre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

INSERT INTO `livre` (`id_livre`, `titre`, `annee`, `resume`, `auteur_livre`) VALUES
(2, 'Autant en emporte le vent', 1936, 'Best-seller absolu depuis sa parution en 1936 ! En pleine guerre de Sécession, la ravissante et très déterminée Scarlett O''Hara voit le bel avenir qui lui était réservé à jamais ravagé. Douée d''une énergie peu commune, elle va se battre sur tous les fronts, dans la Géorgie en feu, pour sauver la terre et le domaine paternels : Tara. Ses amours ? Le fragile et distingué Ashley Wilkes et Rhett Butler, forceur de blocus et séduisante canaille, attiré par Scarlett parce qu''elle n''a pas plus de scrup', 2),
(3, 'Moby Dick', 1851, 'Avec Moby Dick, Melville a donné naissance à un livre-culte et inscrit dans la mémoire des hommes un nouveau mythe : celui de la baleine blanche. Fort de son expérience de marin, qui a nourri ses romans précédents et lui a assuré le succès, l''écrivain américain, alors en pleine maturité, raconte la folle quête du capitaine Achab et sa dernière rencontre avec le grand cachalot. Véritable encyclopédie de la mer, nouvelle Bible aux accents prophétiques, parabole chargée de thèmes universels, Moby D', 3),
(4, 'Les 3 mousquetaires', 1887, 'Aux trois gentilshommes mousquetaires Athos, Porthos et Aramis, toujours prêts à en découdre avec les gardes du Cardinal de Richelieu, s''associe le jeune gascon d''Artagnan fraîchement débarqué de sa province avec pour ambition de servir le roi Louis XIII.\r\nEngagé dans le corps des mousquetaires, d''Artagnan s''éprend de l''angélique Constance Bonacieux.\r\nEn lutte contre la duplicité et l''intrigue politique, les quatre compagnons trouveront en face d''eux une jeune anglaise démoniaque et très belle, Mi', 4),
(5, '100 ans de solitudes', 1967, 'Cent Ans de solitude. Epopée de la fondation, de la grandeur et de la décadence du village de Macondo, et de sa plus illustre famille de pionniers, aux prises avec l''histoire cruelle et dérisoire d''une de ces républiques latino-américaines tellement invraisemblables qu''elles nous paraissent encore en marge de l''Histoire. Cent Ans de solitude est ce théâtre géant où les mythes engendrent les hommes qui à leur tour engendrent les mythes, comme chez Homère, Cervantes ou Rabelais. Chronique universe', 1),
(8, 'Capra cu trei iezi', 1896, 'Este o poveste pentru copii foarte buna !', 5),
(9, 'Cinquante nuances de grey', 2012, 'Romantique, libérateur et totalement addictif, ce roman vous obsédera, vous possédera et vous marquera à jamais. Lorsqu''Anastasia Steele, étudiante en littérature, interviewe le richissime jeune chef d''entreprise Christian Grey, elle le trouve très séduisant mais profondément intimidant. Convaincue que leur rencontre a été désastreuse, elle tente de l''oublier - jusqu''à ce qu''il débarque dans le magasin où elle travaille et l''invite à un rendez-vous en tête-à-tête. Naïve et innocente, Ana ne se reconnait pas dans son désir pour cet homme.', 6);

CREATE TABLE IF NOT EXISTS `statut` (
  `id_statut` int(11) NOT NULL,
  `nom_statut` varchar(15) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_statut`),
  UNIQUE KEY `id_statut` (`id_statut`),
  UNIQUE KEY `nom_statut` (`nom_statut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `statut` (`id_statut`, `nom_statut`) VALUES
(1, 'admin'),
(2, 'rédacteur'),
(3, 'usager');

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(16) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(32) CHARACTER SET utf8 NOT NULL,
  `nom_user` varchar(50) CHARACTER SET utf8 NOT NULL,
  `statut_user` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `login` (`login`),
  KEY `statut_user` (`statut_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

INSERT INTO `user` (`id_user`, `login`, `pass`, `nom_user`, `statut_user`) VALUES
(3, 'elena', 'ec5756e56853635ecaf9f4418f1689ed', 'Elena Birnaz', 1),
(6, 'ion', 'ec5756e56853635ecaf9f4418f1689ed', 'Ion Cozma', 2),
(8, 'admin', '0bceb24182d9d42c8ff2a00f8d5c247e', 'Denis Birnaz', 1),
(9, 'maxim', '7f992291af85c56a7bcdcdc5a0948a9b', 'Maxim', 2),
(11, 'giti', 'ec5756e56853635ecaf9f4418f1689ed', 'Chita Boamba', 3),
(12, 'jerome', 'ec5756e56853635ecaf9f4418f1689ed', 'Jerome Pascal', 1);

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_comm` int(11) NOT NULL AUTO_INCREMENT,
  `date_comm` date NOT NULL,
  `text_comm` text CHARACTER SET utf8 NOT NULL,
  `auteur_comm` int(11) NOT NULL,
  `livre_comm` int(11) NOT NULL,
  PRIMARY KEY (`id_comm`),
  KEY `auteur_comm` (`auteur_comm`),
  KEY `livre_comm` (`livre_comm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

INSERT INTO `commentaire` (`id_comm`, `date_comm`, `text_comm`, `auteur_comm`, `livre_comm`) VALUES
(1, '2017-04-04', 'Se la premier comaintaire', 6, 3),
(19, '2017-04-13', 'loloioloi lio o loi lol oil oi loil', 8, 5),
(20, '2017-04-13', 'f gdf gdf gerg erg er', 8, 3),
(25, '2017-04-13', 'fd gdf gdf gdf gdf gdf', 8, 5),
(26, '2017-04-13', 'Trala la la la Cent Ans de solitude. Epopée de la fondation, de la grandeur et de la décadence du village de Macondo, et de sa plus illustre famille de pionniers, aux prises avec l''histoire cruelle et dérisoire d''une de ces républiques latino-américaines tellement invraisemblables qu''elles nous paraissent encore en marge de l''Histoire. Cent Ans de solitude est ce théâtre géant où les mythes engendrent les hommes qui à leur tour engendrent les mythes, comme chez Homère, Cervantes ou Rabelais. Chronique universe', 8, 5),
(28, '2017-04-13', 'Comentariu ecrire par Chita Boamba', 11, 5),
(29, '2017-04-14', 'Trei iezi cucuezi''a mam"iii usa deàè;^ç^pé., deschide?i î?â?, ??  ???????? ??? ??? ????? ????', 3, 8),
(33, '2017-04-14', 'Tralala la lal''aaa "jxjh kljé.,èà;ç^p xzasd оо ьбтол ывлойц  овдлцйо вй у аукаук ук ук ке ке р гнл гшлшщжзщ г н', 3, 8),
(34, '2017-04-14', 'Je dévore ce livre avec attention...', 3, 9);
