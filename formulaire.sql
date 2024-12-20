-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 13 déc. 2024 à 08:59
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `formulaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `Agent`
--

CREATE TABLE `Agent` (
  `nom` varchar(100) NOT NULL,
  `postnom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `sexe` varchar(100) NOT NULL,
  `dateNaissance` date NOT NULL,
  `numCarteIdentite` varchar(50) NOT NULL,
  `diplome` varchar(100) NOT NULL,
  `anneeObtention` year(4) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `adresseMailBTC` varchar(100) NOT NULL,
  `numAvenue` varchar(50) NOT NULL,
  `quartier` varchar(100) NOT NULL,
  `commune` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `matricule` varchar(50) NOT NULL,
  `poste` varchar(100) NOT NULL,
  `dateContrat` date NOT NULL,
  `etudes` varchar(100) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `typeContrat` varchar(50) NOT NULL,
  `direction` varchar(100) NOT NULL,
  `provinceAffectation` varchar(100) NOT NULL,
  `division` varchar(100) NOT NULL,
  `bureau` varchar(100) NOT NULL,
  `superieurHierarchique` varchar(100) NOT NULL,
  `nomContactUrgence` varchar(100) NOT NULL,
  `lienAvecEmploye` varchar(100) NOT NULL,
  `telephoneContactUrgence` varchar(20) NOT NULL,
  `etatCivil` varchar(50) DEFAULT NULL,
  `nombreEnfants` int(11) DEFAULT 0,
  `numCNSS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE `personnel` (
  `matricule` varchar(20) NOT NULL,
  `nom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`matricule`, `nom`) VALUES
('BTC/102/02', 'MAFWANKADI KIMBENI'),
('BTC/104/02', 'TSHIYOYO MANGA Léon'),
('BTC/109/02', 'NGALALA MPIA Alain'),
('BTC/110/02', 'KIYIKA DIAZOLA'),
('BTC/111/02', 'KATAMBWE MUTOMBO Charles'),
('BTC/114/03', 'TULUENGA WEDIENA Didier'),
('BTC/118/03', 'KALONDA MUKEBA James'),
('BTC/120/03', 'MBOMA MAKASI Baudouin'),
('BTC/122/03', 'ILUNGA TSHIANGALA Jean-Felix'),
('BTC/127/03', 'MONDA TONA Willy'),
('BTC/129/04', 'KAZADI LONJI Matthieu'),
('BTC/130/04', 'MWANZA MAKANGU Nzube'),
('BTC/133/04', 'GUMBELO SOMOLA Nadine'),
('BTC/135/04', 'ABEYASI MBUSA Thotho'),
('BTC/138/04', 'OMADJELA LOPATSHA Matthieu'),
('BTC/144/04', 'LUTUMBA LUWAWU Atou'),
('BTC/150/05', 'ILUME ASANI Jérôme'),
('BTC/151/05', 'NAKONYEGO NGITO Mathurin'),
('BTC/153/05', 'LELO NGOMA Guy-Serge'),
('BTC/154/05', 'KANDI SOBA Aimerance'),
('BTC/158/05', 'TUENZEMUNYI TUAKABIANGANA Claude'),
('BTC/160/05', 'NIMI UMBA Jean de Dieu'),
('BTC/161/05', 'KANGUNDU MPASSY Eric'),
('BTC/162/05', 'NDELE NGOMBITI Martin'),
('BTC/163/05', 'BABESE GIDI Martin'),
('BTC/165/05', 'MWAMBA TSHIPAMA Bénoît'),
('BTC/166/06', 'KINGOTOLO LUNIANGA Christophe'),
('BTC/170/06', 'TUWIZANA WANGIKA Edouard'),
('BTC/176/06', 'MBILA ESONG'),
('BTC/179/06', 'VALU MUKISHI Delly'),
('BTC/186/06', 'NTELA NTEMO Jacques'),
('BTC/189/06', 'SABI NGABIEM Guylain'),
('BTC/199/06', 'MUGARUKA ZIHALIRWA Crispin'),
('BTC/200/06', 'MOUKWA NDOLOMO Florent'),
('BTC/201/06', 'MUKWANGA MPIB\'EWI Joel'),
('BTC/202/06', 'MBILA ESONG Patrick'),
('BTC/203/07', 'BAKABANA MABIALA Charles'),
('BTC/204/07', 'AMUNDALA MUKWA Félicien'),
('BTC/205/07', 'AKIM RAMADHAN Akim'),
('BTC/208/07', 'KABENGELE KABALA Nicolas'),
('BTC/210/08', 'NDJABU MATESO Freddy'),
('BTC/211/08', 'MWA ILANGA Patou'),
('BTC/212/08', 'BUETSIA KHONDE Vigor'),
('BTC/214/08', 'NGANDU NGANDU'),
('BTC/215/08', 'NKIERE NANA NONO Nono'),
('BTC/216/08', 'MUKENDI KABONGO Ley'),
('BTC/219/09', 'HOKOKO LUHUMBU Sylvain'),
('BTC/220/09', 'ONDIYO LOFUFA Jules'),
('BTC/221/09', 'MWERWE ZIHALIRWA Julien'),
('BTC/223/09', 'WELE WELE NGAMBWE Claude'),
('BTC/226/10', 'KINGOMBE MOKE Gilbert'),
('BTC/227/10', 'CIMANGA CILA Miracle'),
('BTC/230/10', 'MANDJAKU ISASUMU Paulin'),
('BTC/232/10', 'YANGA MAYABU Raoul'),
('BTC/233/10', 'LUPAY LEMI Gilbert'),
('BTC/234/10', 'ZENGA MBALA Fils'),
('BTC/235/10', 'BULU BOYOLI Jean-Willy'),
('BTC/236/10', 'MUKWA KINDAMBA Max'),
('BTC/237/10', 'MADIMBA MADIMBA Corneille'),
('BTC/238/10', 'MADIA ISANGU Patrick'),
('BTC/239/10', 'NZUZI MASSAMBA Dominique'),
('BTC/242/11', 'OZINGEY ZOR Lorenz'),
('BTC/243/12', 'MAZU LETOLO Blaise'),
('BTC/244/12', 'KITSA WALEYIRWE Eustache'),
('BTC/245/02', 'BAYANGALADI NGUSA Emilie'),
('BTC/246/13', 'YUMA RAMAZANI ALI'),
('BTC/247/14', 'SUNGU MBELIKOLO Benjamin'),
('BTC/248/15', 'LENDO NZITA Roddhy'),
('BTC/249/15', 'AMUNDALA NAFISA Marie-louise'),
('BTC/250/15', 'LOMBE SAKINA Sylvie'),
('BTC/251/15', 'SANZU MBAYA Popo'),
('BTC/252/15', 'NKONDI MINKOLA Yannick'),
('BTC/253/15', 'KISAKA AMELIA Amelia'),
('BTC/253/16', 'KISAKA AMELIA'),
('BTC/254/16', 'LEKIARI KIWA Sebastien'),
('BTC/255/16', 'MAKENDO LOLA Michel'),
('BTC/256/16', 'BIAWU MPAMBU Gédéon'),
('BTC/257/16', 'KALANGILA NKOY Olivier'),
('BTC/258/16', 'MUJINGA TUMBA Magalie'),
('BTC/259/16', 'MPUA KITUBA Dieudonné'),
('BTC/262/16', 'KIMBAMBA MANGINGA Noel'),
('BTC/263/17', 'BATULI LOKALA Pathy'),
('BTC/264/17', 'KALUNDA BUANGA Carlos'),
('BTC/265/17', 'MWENDANGA MURHULA Guylain'),
('BTC/266/17', 'KASONGO KALANDA Toutou'),
('BTC/267/18', 'MPANZU BIKINDU Don Hervé'),
('BTC/268/18', 'ANDY ZAHINDA Andy'),
('BTC/269/18', 'LUZOLO DIATEZUA Pamphile'),
('BTC/270/18', 'TAMBANI BUHENDWA Jean-Paul'),
('BTC/271/18', 'MBUNZI MUNGIMBA Vanessa'),
('BTC/272/18', 'MAMBOTE MAYIVANGANGA Alfred'),
('BTC/273/18', 'KINDUNDU MUKOMBO Dimitri'),
('BTC/274/18', 'SEFU WEWE Nickel'),
('BTC/275/18', 'MBENZA BIBAU Glody'),
('BTC/276/18', 'MPANZU BIKINDU'),
('BTC/278/18', 'NGANGA LUMENGU Mireille'),
('BTC/279/18', 'MAKULUKA MANTINTI Léon'),
('BTC/280/18', 'MFUTILA LENDA'),
('BTC/280/20', 'MFUTILA LENDA Amos'),
('BTC/281/18', 'SILU MANZITA'),
('BTC/281/20', 'SILU MANZITA Cédric'),
('BTC/282/18', 'UMBA SIFA Tretty'),
('BTC/285/18', 'MWANGE FAYILA Yvette'),
('BTC/286/19', 'KAHENGA MILOLO Jenny'),
('BTC/287/19', 'KIPANGA UREDI Roger'),
('BTC/288/19', 'LELO VANGU Peter'),
('BTC/289/19', 'KAHENGA MILOLO'),
('BTC/289/20', 'DIANOVA KIUFU Jérémie'),
('BTC/290/20', 'DJUWA OMADJELA Véro'),
('BTC/291/20', 'GIZEGELE KABONGO Patrick'),
('BTC/293/20', 'LOMBOL\'I IYANZA Peter'),
('BTC/294/20', '11969522119E MUBIAYI KAYEMBE'),
('BTC/295/20', 'VALU TANGIZA Malga'),
('BTC/296/20', 'KAPINGA BAKUMBANE Constantin'),
('BTC/297/20', 'MUSHAMALIRWA NTANA Claude'),
('BTC/298/20', 'NGABA KABOTE Hervé'),
('BTC/299/20', 'NTUNDULU KALUNSEVIKO Cathy'),
('BTC/30/86', 'KISAKA AMAY Joseph'),
('BTC/300/20', 'KAYEMBE BUATU Victor'),
('BTC/301/20', 'EMBELE BOLANGA Jerry'),
('BTC/303/20', 'SUNDA MBONGO Landry-Xavier'),
('BTC/304/20', 'BATULI ILONGA Gracia'),
('BTC/305/20', 'KAHAMBIRA AMANI Paulin'),
('BTC/306/20', 'MBIKAY BULABA Pacha'),
('BTC/307/20', 'MBOKO MALELE Regis'),
('BTC/308/20', 'MUKANZA MBIKI Archippe'),
('BTC/309/', 'KAMONGO MBOMA Papy'),
('BTC/310/20', 'UKECHI UVOVA Bienfait'),
('BTC/311/20', 'MUZANGI LUYINDULA Vinyi'),
('BTC/312/20', 'MALEKANI ARIEL'),
('BTC/313/20', 'MPOY MPIANA'),
('BTC/314/20', 'MAKAYA MWANZALONGO'),
('BTC/315/20', 'KANGA BOKEMBIA'),
('BTC/316/20', 'KISAKA MUSUMU MIYA'),
('BTC/317/20', 'KABONGO KABWAKA Marie'),
('BTC/318/20', 'NKIASI BAKISA Anne Marie'),
('BTC/319/20', 'KYAMABONDO MWANDO Arcel'),
('BTC/320/20', 'MANZIA MOSABU Elie Michel'),
('BTC/321/20', 'NSIMUTI NSONI Timothée'),
('BTC/322/20', 'MAZALA KAMOYI Patrick'),
('BTC/323/20', 'YAHUMA BAITOAPALA Aristote'),
('BTC/324/20', 'MUNKOKA NDONGALA KAMBOLO'),
('BTC/325/21', 'MANU NDELO EMMANUEL'),
('BTC/327/21', 'ATIBASAY UMO Trésor'),
('BTC/328/21', 'BOLINGO EKENGA Bienvenu'),
('BTC/329/21', 'MAGUNDU NSIALA Gloire'),
('BTC/330/21', 'MUNGANGA GINDENDE Patrick'),
('BTC/335/21', 'BATUMENI BAYENDA'),
('BTC/336/21', 'SANDA KADULU Yan'),
('BTC/337/21', 'ONGOLO ELAYA Keren'),
('BTC/338/21', 'LUKUSA MONDO'),
('BTC/339/21', 'KASENGA SAKAJI Charles'),
('BTC/340/21', 'ILUNGA KABEYA NTAMBWE Pierre'),
('BTC/341/21', 'BUKEMBO BUKUANGA Junior'),
('BTC/342/21', 'MUKENDI MBUYI'),
('BTC/343/21', 'MUKADI TSIBANGU Faustin'),
('BTC/344/21', 'MUKUNA DIANGU Nice'),
('BTC/345/21', 'NDONGO TSHIKALA Jean de Dieu'),
('BTC/346/21', 'MONZOY NOMBO Dalia'),
('BTC/347/22', 'GICHIRO PACIFIQUE Jonas'),
('BTC/348/22', 'NTAMBWE KAKENGE Evariste'),
('BTC/349/22', 'TSHILANDA TSHIYOLE'),
('BTC/350/22', 'MUNGELE Jeanine'),
('BTC/351/22', 'KAKESA KAYUMBI Daniel'),
('BTC/352/22', 'NDOMBI SAMBI Lisette'),
('BTC/353/22', 'BUSHABU KEMISHANGA Georges'),
('BTC/354/22', 'MAKWIKILA NSINGANI Roger'),
('BTC/355/22', 'KABAMBA Hervé'),
('BTC/356/22', 'MPIA BOOLO Stephanie'),
('BTC/357/22', 'MUKWAT MASHIMANG Heritier'),
('BTC/358/22', 'MUTSHINA MFUNI Medard'),
('BTC/359/22', 'KABASELE TSHISEKEDI'),
('BTC/360/22', 'NGAVUKA NDINGAMBOTE'),
('BTC/361/22', 'NTAMBWE KANYINDA Séphorien'),
('BTC/362/22', 'HANGI MATHE'),
('BTC/363/22', 'KAKENGE TAMPWO Préfina'),
('BTC/364/22', 'KONDE SAPO Gerard'),
('BTC/366/22', 'BILUSA BAILA Ravel'),
('BTC/367/22', 'NDABALI KOMBETO'),
('BTC/368/22', 'MUTUDI MUTUDI Philippe'),
('BTC/369/22', 'TSHIYOYO TSHIAMALENGA'),
('BTC/370/22', 'MUTOMBO TUENDELE Dierto'),
('BTC/371/22', 'IPIPO KALOMBO Cristian'),
('BTC/372/22', 'NTUMBA DIBONDO'),
('BTC/373/22', 'KALONJI WAMUSHIMBU Willy'),
('BTC/374/22', 'KABALA KABANGU Theodore'),
('BTC/375/22', 'GUHWIMA GWANZAMBI'),
('BTC/376/22', 'KALUNGA KALONJI Ambroise'),
('BTC/377/22', 'MVUENZOLO Plamedi'),
('BTC/378/22', 'YAMBA-YAMBA MOTER'),
('BTC/379/22', 'IKUNI Charly'),
('BTC/380/22', 'MUKOMBELA NTAMBWE Joseph'),
('BTC/381/22', 'TUMBA KALONJI Nina'),
('BTC/382/22', 'ATASHILE OKITO Marie Cécile'),
('BTC/383/22', 'MALEWU NGOMBA'),
('BTC/384/22', 'IRAKIZA MWUGURA Josué'),
('BTC/385/22', 'NTUMBA NTUMBA Jules'),
('BTC/386/22', 'MPEVE MAMPUYA Emmanuel'),
('BTC/387/22', 'LODI OKUNDI Peter'),
('BTC/388/22', 'NDJEKA MASUDI Patrick'),
('BTC/389/22', 'NDUMBI KABUYA Séraphin'),
('BTC/390/22', 'BELANGA BOSEKO'),
('BTC/391/22', 'MANDJAKU MAKU Joël'),
('BTC/392/22', 'KAMBAJI KABANGU Sam'),
('BTC/393/22', 'MAKANGA MANKATU Fidèle'),
('BTC/394/22', 'MUKENDI MUAMBA David'),
('BTC/395/22', 'TENDAYI TENDAYI'),
('BTC/396/22', 'DISENGOMOKA I MONOMOSI Francis'),
('BTC/397/22', 'MUZIR MONGA Baby'),
('BTC/398/22', 'TSHIULU LUPAKA Oscar'),
('BTC/399/22', 'KABUKU IFEFO Audrey'),
('BTC/401/22', 'TSHIBUYI KAZADI Olivier'),
('BTC/402/22', 'KALALA MALOJI Antoine'),
('BTC/403/22', 'MBOWATO MBOLEMBE Jonathan'),
('BTC/404/22', 'MULANGUA KONGOLO Célestin'),
('BTC/405/22', 'MAPANGALA MASIALA Josaphat'),
('BTC/406/22', 'KAZADI MWIKEU Nathan'),
('BTC/407/22', 'KALANGA TSHIENDA Kathya'),
('BTC/408/22', 'BAOSSO NDOE Nadia'),
('BTC/409/22', 'BUSSA NKAGBOLEA Henriette'),
('BTC/41/88', 'MUKODIA MAYALA Léonard'),
('BTC/410/22', 'BUKASA NDAYA Sandra'),
('BTC/411/22', 'KUSEKE Gracia Prince Honoré'),
('BTC/412/22', 'NDANDA MELI Patrick'),
('BTC/413/22', 'KABANGU TSHIMINI Joël'),
('BTC/414/22', 'MATALA KABALA Christian'),
('BTC/415/22', 'UKONDA MUWAWA Dieu Merci'),
('BTC/416/22', 'MAWIKA KAYIBA Exaucé'),
('BTC/417/22', 'KOMO KOPSON'),
('BTC/418/22', 'DILUABANZA MAKOLO Esaïe'),
('BTC/420/22', 'TEKASALA N’SIAME Reagan'),
('BTC/421/22', 'MAROMIA LIFUNGULA Jacquie'),
('BTC/424/22', 'KITAMBO KAPENZI Blanchard'),
('BTC/425/22', 'LOMALISA WOLONGO Arnold'),
('BTC/426/22', 'TSIMBA PUATI Taty'),
('BTC/427/22', 'LONGOMBANGA BOZI Freddy'),
('BTC/428/22', 'LODI OTOKA François'),
('BTC/429/22', 'NKOMBE LOSELE Steven'),
('BTC/430/22', 'ONAEMBO ONTONA Trésor'),
('BTC/431/22', 'KITOKO ESSEME Rublin'),
('BTC/432/22', 'KANTA BEN Benjamin'),
('BTC/433/22', 'PELA KWINDA Vancy'),
('BTC/434/22', 'NDJADI NDJADI Michel'),
('BTC/435/22', 'BISELENGE LISAU Sonen'),
('BTC/436/22', 'MUJINGA KABEYA Linda'),
('BTC/437/22', 'YINDI KOKATA Pathou'),
('BTC/438/22', 'ANEKWE KULE Léon'),
('BTC/439/22', 'MAKANDA MAFWANA Serge'),
('BTC/440/22', 'ETANGA BOTAKA Vuna'),
('BTC/441/22', 'MWIKAKAMUSAU Dada'),
('BTC/442/22', 'OKITA TETE EDJEDJA Armand'),
('BTC/443/22', 'KASONGO MALABA Jean'),
('BTC/444/22', 'ASSANI MATILI Freddy'),
('BTC/445/22', 'BEZANGISIA DUMA Eric'),
('BTC/447/22', 'MUKENGE NYANZALA'),
('BTC/449/22', 'YOUDI MOLEKA Christian'),
('BTC/450/22', 'YOMBO KALEKA Etienne'),
('BTC/451/22', 'KABONGO Gabriel'),
('BTC/452/22', 'MWAMBA KABOBO Juventus'),
('BTC/453/22', 'NGOYI LUKOJI Jordi'),
('BTC/454/22', 'MUNKANYA KAPIAMBA J.P'),
('BTC/455/22', 'TAMALEKA TAMUTUKU'),
('BTC/456/22', 'MABOUR MUKE'),
('BTC/457/22', 'INGANYA LOKENYO'),
('BTC/458/22', 'BONGANGA NGOMBE Serge'),
('BTC/459/22', 'KALUME MUHINDO Jérémie'),
('BTC/460/22', 'AKPOKO MONZA Josué'),
('BTC/461/22', 'KIBEBE KULAKULA Dride'),
('BTC/462/22', 'VEKA LANDU Michée'),
('BTC/463/22', 'MPONGO IYONDO'),
('BTC/464/22', 'MUSALUPASI EDUBUNA Florentin'),
('BTC/465/22', 'KUMA DONGO Samy'),
('BTC/466/22', 'TSHIKANGU KAIJI Michel'),
('BTC/467/22', 'ATSHIMEN MALESHEL Dimitri'),
('BTC/468/22', 'LUMU TSHIMANGA Gabriel'),
('BTC/469/22', 'MWENYI MILONGO'),
('BTC/47/89', 'BONDUNGU EKALA KAKA Jean-Pierre'),
('BTC/470/22', 'LIKIERE MANIKISA Licky'),
('BTC/471/22', 'TAMFUMU DEBA Deba'),
('BTC/472/22', 'KILOLO NGOY Céline'),
('BTC/473/22', 'DEYANGAGO LENA Roger'),
('BTC/474/22', 'NANI SANGI Fabrice'),
('BTC/475/22', 'GELEGO MBOMA Melchissedeck'),
('BTC/476/22', 'KAFOLOTA SIKI Blanchard'),
('BTC/477/22', 'WEMBO LOLA Georges'),
('BTC/478/22', 'MBOYO ESONA Willy'),
('BTC/480/22', 'NIGENE NDEZE Ernestine'),
('BTC/481/22', 'MUKIZA MUTIMA John'),
('BTC/483/22', 'MUTOMBO NTONKU Sylva'),
('BTC/484/22', 'KADI MBUYANDAYA Derrick'),
('BTC/485/22', 'ASSUMANI BIRIKO Padjo'),
('BTC/486/22', 'MWENGESYALI VINANE Michael'),
('BTC/487/22', 'MUNGWERI Justin'),
('BTC/488/22', 'MUTONI MUKONGO Bob Yves'),
('BTC/491/22', 'TUTONDA MANTONDILA'),
('BTC/494/23', 'KAYOMO DIKETELE'),
('BTC/85/00', 'MAFWANKADI KIMBENI Papy'),
('BTC/86/01', 'MUKANZA KAMAYA Ferdinand'),
('BTC/87/01', 'BILA NGUNGA Christine'),
('BTC/89/01', 'TAMBANI MUZITA Paul'),
('BTC/91/01', 'KIBAL MAY Baudouin'),
('BTC110/02', 'KIYIKA DIAZOLA Alpha');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Agent`
--
ALTER TABLE `Agent`
  ADD PRIMARY KEY (`matricule`),
  ADD UNIQUE KEY `matricule` (`matricule`);

--
-- Index pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`matricule`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
