/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */:
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */:
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */:
/*!40101 SET NAMES utf8 */:
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */:
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */:
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */:
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE="NO_AUTO_VALUE_ON_ZERO" */:
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */:
DROP TABLE IF EXISTS constancia:
/*!40101 SET @saved_cs_client     = @@character_set_client */:
/*!40101 SET character_set_client = utf8 */:

CREATE TABLE `constancia` (
  `folio` int(8) NOT NULL AUTO_INCREMENT,
  `evento` int(8) NOT NULL,
  `cursante` varchar(20) NOT NULL,
  `fecha_emision` date DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`folio`),
  KEY `evento` (`evento`),
  KEY `cursante` (`cursante`),
  CONSTRAINT `constancia_ibfk_1` FOREIGN KEY (`evento`) REFERENCES `evento` (`evento_id`),
  CONSTRAINT `constancia_ibfk_2` FOREIGN KEY (`cursante`) REFERENCES `cursante` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=603 DEFAULT CHARSET=utf8:


/*!40101 SET character_set_client = @saved_cs_client */:
LOCK TABLES `constancia` WRITE:
/*!40000 ALTER TABLE `constancia` DISABLE KEYS */:
    INSERT INTO constancia VALUES("1","1","9709983","2019-03-06","Comité organizador"):
INSERT INTO constancia VALUES("2","1","8001022","2019-03-06","Comité organizador"):
INSERT INTO constancia VALUES("3","1","8207968","2019-03-06","Comité organizador"):
INSERT INTO constancia VALUES("4","1","2905191","2019-03-06","Comité organizador"):
INSERT INTO constancia VALUES("5","1","8408246","2019-03-06","Comité organizador"):
INSERT INTO constancia VALUES("6","1","2214784","2019-03-06","Comité organizador"):
INSERT INTO constancia VALUES("7","1","2101238","2019-03-06","Comité organizador"):
INSERT INTO constancia VALUES("8","1","2122006","2019-03-06","Comité organizador"):
INSERT INTO constancia VALUES("9","1","0","2019-03-06","Comité organizador"):
INSERT INTO constancia VALUES("10","1","9500103","2019-03-06","Comité organizador"):
INSERT INTO constancia VALUES("11","1","2536234","2019-03-06","Comité organizador"):
INSERT INTO constancia VALUES("12","1","0","2019-03-06","Comité organizador"):
INSERT INTO constancia VALUES("13","1","0","2019-03-06","Comité organizador"):
INSERT INTO constancia VALUES("14","2","8209456","2019-03-06","Participante"):
INSERT INTO constancia VALUES("15","2","8315132","2019-03-06","Participante"):
INSERT INTO constancia VALUES("16","2","9901752","2019-03-06","Participante"):
INSERT INTO constancia VALUES("17","2","2905981","2019-03-06","Participante"):
INSERT INTO constancia VALUES("18","2","2956728","2019-03-06","Participante"):
INSERT INTO constancia VALUES("19","2","2505231","2019-03-06","Participante"):
INSERT INTO constancia VALUES("20","2","8206899","2019-03-06","Participante"):
INSERT INTO constancia VALUES("21","2","2312506","2019-03-06","Participante"):
INSERT INTO constancia VALUES("22","2","8914656","2019-03-06","Participante"):
INSERT INTO constancia VALUES("23","2","2421682","2019-03-06","Participante"):
INSERT INTO constancia VALUES("24","2","2303779","2019-03-06","Participante"):
INSERT INTO constancia VALUES("25","2","2709937","2019-03-06","Participante"):
INSERT INTO constancia VALUES("26","2","2710269","2019-03-06","Participante"):
INSERT INTO constancia VALUES("27","2","2948860","2019-03-06","Participante"):
INSERT INTO constancia VALUES("28","2","2836637","2019-03-06","Participante"):
INSERT INTO constancia VALUES("29","2","2959132","2019-03-06","Participante"):
INSERT INTO constancia VALUES("30","2","9623647","2019-03-06","Participante"):
INSERT INTO constancia VALUES("31","2","2933829","2019-03-06","Participante"):
INSERT INTO constancia VALUES("32","2","9414827","2019-03-06","Participante"):
INSERT INTO constancia VALUES("33","2","2707497","2019-03-06","Participante"):
INSERT INTO constancia VALUES("34","2","8611688","2019-03-06","Participante"):
INSERT INTO constancia VALUES("35","2","2961404","2019-03-06","Participante"):
INSERT INTO constancia VALUES("36","2","2961606","2019-03-06","Participante"):
INSERT INTO constancia VALUES("37","2","9025405","2019-03-06","Participante"):
INSERT INTO constancia VALUES("38","2","2960427","2019-03-06","Participante"):
INSERT INTO constancia VALUES("39","2","9021213","2019-03-06","Participante"):
INSERT INTO constancia VALUES("40","2","9805184","2019-03-06","Participante"):
INSERT INTO constancia VALUES("41","2","2953801","2019-03-06","Participante"):
INSERT INTO constancia VALUES("42","2","9800301","2019-03-06","Participante"):
INSERT INTO constancia VALUES("43","2","9709983","2019-03-06","Participante"):
INSERT INTO constancia VALUES("44","2","0","2019-03-06","Participante"):
INSERT INTO constancia VALUES("45","3","2519062","2019-03-06","Presidente comité"):
INSERT INTO constancia VALUES("46","3","2955057","2019-03-06","Miembro comité"):
INSERT INTO constancia VALUES("47","3","2506297","2019-03-06","Miembro comité"):
INSERT INTO constancia VALUES("48","3","8206899","2019-03-06","Miembro comité"):
INSERT INTO constancia VALUES("49","3","2953801","2019-03-06","Miembro comité"):
INSERT INTO constancia VALUES("50","3","8001022","2019-03-06","Miembro comité"):
INSERT INTO constancia VALUES("51","3","2117118","2019-03-06","Miembro comité"):
INSERT INTO constancia VALUES("52","3","9325247","2019-03-06","Miembro comité"):
INSERT INTO constancia VALUES("53","3","2019477","2019-03-06","Miembro comité"):
INSERT INTO constancia VALUES("54","3","2957632","2019-03-06","Miembro comité"):
INSERT INTO constancia VALUES("55","3","2922274","2019-03-06","Miembro comité"):
INSERT INTO constancia VALUES("56","3","2116987","2019-03-06","0"):
INSERT INTO constancia VALUES("57","3","8110026","2019-03-06","Miembro comité"):
INSERT INTO constancia VALUES("58","3","2026392","2019-03-06","Miembro comité"):
INSERT INTO constancia VALUES("59","3","2624117","2019-03-06","Miembro comité"):
INSERT INTO constancia VALUES("60","3","2602369","2019-03-06","Miembro comité"):
INSERT INTO constancia VALUES("61","3","2207648","2019-03-06","Miembro comité"):
INSERT INTO constancia VALUES("62","3","8019967","2019-03-06","Miembro comité"):
INSERT INTO constancia VALUES("63","3","2907844","2019-03-06","Miembro comité"):
INSERT INTO constancia VALUES("64","4","2624117","2019-03-07","Asistente"):
INSERT INTO constancia VALUES("65","5","2624117","2019-03-07","Asistente"):
INSERT INTO constancia VALUES("66","6","2624117","2019-03-07","Asistente"):
INSERT INTO constancia VALUES("67","7","2624117","2019-03-07","Miembro del comité"):
INSERT INTO constancia VALUES("68","8","2934094","2019-03-07","Participante"):
INSERT INTO constancia VALUES("69","9","2921979","2019-03-07","Miembro del Colegio"):
INSERT INTO constancia VALUES("70","10","2921979","2019-03-07","Presidente"):
INSERT INTO constancia VALUES("71","11","2934094","2019-03-07","Miembro del Comité"):
INSERT INTO constancia VALUES("72","12","2934094","2019-03-07","Miembro"):
INSERT INTO constancia VALUES("73","13","7711972","2019-03-07","Participante"):
INSERT INTO constancia VALUES("74","14","2955272","2019-03-07","Jurado Calificador"):
INSERT INTO constancia VALUES("75","14","8814325","2019-03-07","Jurado Calificador"):
INSERT INTO constancia VALUES("76","14","2921979","2019-03-07","Jurado Calificador"):
INSERT INTO constancia VALUES("77","14","2602113","2019-03-07","Jurado Calificador"):
INSERT INTO constancia VALUES("78","14","2736411","2019-03-07","Jurado calificador"):
INSERT INTO constancia VALUES("79","14","9521348","2019-03-07","Jurado calificador"):
INSERT INTO constancia VALUES("80","14","9426736","2019-03-07","Jurado calificador"):
INSERT INTO constancia VALUES("81","14","9409386","2019-03-07","Jurado calificador"):
INSERT INTO constancia VALUES("82","14","8809267","2019-03-07","Jurado calificador"):
INSERT INTO constancia VALUES("83","15","2035456","2019-03-07","Consejero Académico Suplente"):
INSERT INTO constancia VALUES("84","15","9414827","2019-03-07","Consejero Académico Suplente"):
INSERT INTO constancia VALUES("85","16","8900299","2019-03-07","Miembro del Comité"):
INSERT INTO constancia VALUES("86","15","8206899","2019-03-07","Consejero Académico Suplente"):
INSERT INTO constancia VALUES("87","15","2122006","2019-03-07","Consejero Académico Suplente"):
INSERT INTO constancia VALUES("88","15","8410674","2019-03-07","Consejero Académico Suplente"):
INSERT INTO constancia VALUES("89","15","8615985","2019-03-07","Consejero Académico Suplente"):
INSERT INTO constancia VALUES("90","15","9021213","2019-03-07","Consejero Académico"):
INSERT INTO constancia VALUES("91","15","9409386","2019-03-07","Consejero Académico"):
INSERT INTO constancia VALUES("92","15","2212226","2019-03-07","Consejero Académico"):
INSERT INTO constancia VALUES("93","17","2958623","2019-03-07","Participante"):
INSERT INTO constancia VALUES("94","17","2921979","2019-03-07","Participante"):
INSERT INTO constancia VALUES("95","17","2958087","2019-03-07","Participante"):
INSERT INTO constancia VALUES("96","17","2801639","2019-03-07","Participante"):
INSERT INTO constancia VALUES("97","17","2921979","2019-03-07","Participante"):
INSERT INTO constancia VALUES("98","18","9203729","2019-03-07","Vocal"):
INSERT INTO constancia VALUES("99","18","2949600","2019-03-07","Presidenta"):
INSERT INTO constancia VALUES("100","18","2121085","2019-03-07","Vocal"):
INSERT INTO constancia VALUES("101","18","2126613","2019-03-07","Secretario"):
INSERT INTO constancia VALUES("102","18","8709009","2019-03-07","Vocal"):
INSERT INTO constancia VALUES("103","18","2949600","2019-03-07","Presidenta"):
INSERT INTO constancia VALUES("104","19","2949600","2019-03-07","Coordinadora"):
INSERT INTO constancia VALUES("105","20","8706034","2019-03-07","Asistente"):
INSERT INTO constancia VALUES("106","20","9025405","2019-03-07","Asistente"):
INSERT INTO constancia VALUES("107","20","7816901","2019-03-07","Asistente"):
INSERT INTO constancia VALUES("108","20","8001022","2019-03-07","Asistente"):
INSERT INTO constancia VALUES("109","20","9221697","2019-03-07","Asistente"):
INSERT INTO constancia VALUES("110","20","2519062","2019-03-07","Asistente"):
INSERT INTO constancia VALUES("111","20","9325247","2019-03-07","Asistencia"):
INSERT INTO constancia VALUES("112","20","2960280","2019-03-07","Asistente"):
INSERT INTO constancia VALUES("113","20","2948649","2019-03-07","Asistente"):
INSERT INTO constancia VALUES("114","20","2736411","2019-03-07","Asistente"):
INSERT INTO constancia VALUES("115","20","8110026","2019-03-07","Asistente"):
INSERT INTO constancia VALUES("116","20","2954666","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("117","20","2116987","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("118","20","2935333","2019-03-08","Asistencia"):
INSERT INTO constancia VALUES("119","20","2624117","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("121","20","2960619","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("122","20","2729156","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("123","20","9911367","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("124","20","2001705","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("125","20","2026392","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("126","20","8414556","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("127","20","2602113","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("128","20","2203898","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("129","20","9412646","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("130","21","9412646","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("131","21","2602113","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("132","21","8414556","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("133","21","8315132","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("134","21","9211306","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("135","21","2213435","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("136","21","2210533","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("137","21","2934094","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("138","21","7816901","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("139","21","2203898","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("140","21","8001022","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("141","21","2519062","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("142","21","8408246","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("143","21","2954666","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("144","21","8209456","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("145","22","2019477","2019-03-08","Organizador"):
INSERT INTO constancia VALUES("146","23","2019477","2019-03-08","Coordinadora General"):
INSERT INTO constancia VALUES("147","24","2019477","2019-03-08","Coordinadora General"):
INSERT INTO constancia VALUES("148","25","2019477","2019-03-08","Coordinadora General"):
INSERT INTO constancia VALUES("149","26","2019477","2019-03-08","Representante del CUSUR"):
INSERT INTO constancia VALUES("150","27","2019477","2019-03-08","Coordinadora General"):
INSERT INTO constancia VALUES("151","28","2019477","2019-03-08","Coordinadora General"):
INSERT INTO constancia VALUES("152","29","2019477","2019-03-08","Coordinadora General"):
INSERT INTO constancia VALUES("153","30","2019477","2019-03-08","Coordinadora General"):
INSERT INTO constancia VALUES("154","31","8110026","2019-03-08","Acreditar"):
INSERT INTO constancia VALUES("155","31","2116987","2019-03-08","Acreditar"):
INSERT INTO constancia VALUES("156","31","8706034","2019-03-08","Acreditar"):
INSERT INTO constancia VALUES("157","31","2207648","2019-03-08","Acreditar"):
INSERT INTO constancia VALUES("158","31","2108984","2019-03-08","Acreditar"):
INSERT INTO constancia VALUES("159","31","2943417","2019-03-08","Acreditar"):
INSERT INTO constancia VALUES("160","31","2729156","2019-03-08","Acreditar"):
INSERT INTO constancia VALUES("161","31","2624117","2019-03-08","Acreditar"):
INSERT INTO constancia VALUES("162","31","2945119","2019-03-08","Acreditar"):
INSERT INTO constancia VALUES("163","31","9325247","2019-03-08","Acreditar"):
INSERT INTO constancia VALUES("164","31","9508244","2019-03-08","Acreditar"):
INSERT INTO constancia VALUES("165","31","2304058","2019-03-08","Acreditar"):
INSERT INTO constancia VALUES("166","31","9025405","2019-03-08","Acreditar"):
INSERT INTO constancia VALUES("167","31","2602113","2019-03-08","Acreditar"):
INSERT INTO constancia VALUES("168","31","9623647","2019-03-08","Acreditar"):
INSERT INTO constancia VALUES("169","31","9911367","2019-03-08","Acreditar"):
INSERT INTO constancia VALUES("170","31","9221697","2019-03-08","Acreditar"):
INSERT INTO constancia VALUES("171","31","7816901","2019-03-08","Acreditar"):
INSERT INTO constancia VALUES("172","31","2736411","2019-03-08","Acreditar"):
INSERT INTO constancia VALUES("173","31","2101238","2019-03-08","Acreditar"):
INSERT INTO constancia VALUES("174","32","9414827","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("175","32","2117118","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("176","32","2718081","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("177","32","9716017","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("178","32","2311623","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("179","32","2210533","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("180","32","2946914","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("181","32","8609179","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("182","32","9901752","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("183","32","2707497","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("184","32","2213435","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("185","32","2001578","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("186","32","2934094","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("187","32","9412611","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("188","32","2216809","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("189","32","7816901","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("190","32","8209456","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("191","32","2955075","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("192","32","2964069","2019-03-08","Asistencia"):
INSERT INTO constancia VALUES("193","32","210096685","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("194","32","0","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("195","32","2953801","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("196","32","9800301","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("197","33","9623647","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("198","33","8819718","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("199","33","2232162","2019-03-08","Asistencia"):
INSERT INTO constancia VALUES("200","33","9325247","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("201","34","8924015","2019-03-08","Organizador"):
INSERT INTO constancia VALUES("202","35","8924015","2019-03-08","Instructor"):
INSERT INTO constancia VALUES("203","36","8924015","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("204","34","2309769","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("205","34","2035537","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("206","34","2232162","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("207","34","7509936","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("208","34","2214784","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("209","34","9110828","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("210","34","2505231","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("211","34","7910029","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("213","34","2126613","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("214","34","8206899","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("215","34","9428666","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("216","34","2946811","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("217","34","2948860","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("218","34","2406608","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("219","34","9217967","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("220","34","9905898","2019-03-08","Asistente"):
INSERT INTO constancia VALUES("221","35","9110828","2019-03-08","Instructora"):
INSERT INTO constancia VALUES("222","37","9110828","2019-03-08","Organizadora"):
INSERT INTO constancia VALUES("223","35","8206899","2019-03-08","Instructor"):
INSERT INTO constancia VALUES("224","37","8206899","2019-03-08","Organizador"):
INSERT INTO constancia VALUES("225","35","2232162","2019-03-08","Instructora"):
INSERT INTO constancia VALUES("226","37","2232162","2019-03-08","Organizadora"):
INSERT INTO constancia VALUES("227","34","9912096","2019-03-08","Organizadora"):
INSERT INTO constancia VALUES("228","34","2604183","2019-03-08","Organizadora"):
INSERT INTO constancia VALUES("229","38","2019477","2019-03-08","Organizadora"):
INSERT INTO constancia VALUES("230","39","2019477","2019-03-08","Coordinadora"):
INSERT INTO constancia VALUES("231","40","2019477","2019-03-08","Coordinadora"):
INSERT INTO constancia VALUES("232","40","2019477","2019-03-08","Coordinadora"):
INSERT INTO constancia VALUES("233","41","2019477","2019-03-08","Coordinadora"):
INSERT INTO constancia VALUES("234","42","2138174","2019-03-08","Ponente"):
INSERT INTO constancia VALUES("235","43","8808848","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("236","43","0","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("237","43","9520856","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("238","43","2921979","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("239","43","8812586","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("240","43","2121085","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("241","43","2958623","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("242","43","2801639","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("243","43","2961266","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("244","43","2958087","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("245","43","7816898","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("246","43","2532115","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("247","44","9204296","2019-03-11","Gestionar y lograr convenio"):
INSERT INTO constancia VALUES("248","21","8706034","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("249","45","2532115","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("250","45","2801639","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("251","45","2958623","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("252","45","2121085","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("253","45","8812586","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("254","45","2921979","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("255","45","9520856","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("256","45","8808848","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("257","45","000000","0000-00-00","Asistente"):
INSERT INTO constancia VALUES("258","45","7816898","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("259","45","2961266","2019-03-11","Asistencia"):
INSERT INTO constancia VALUES("260","45","2958087","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("261","46","2309769","2019-03-11","Organizadora"):
INSERT INTO constancia VALUES("262","44","2309769","2019-03-11","Coordinadora operativa"):
INSERT INTO constancia VALUES("263","3","2202344","2019-03-11","Consejera"):
INSERT INTO constancia VALUES("264","47","2505231","2019-03-11","Miembro"):
INSERT INTO constancia VALUES("265","47","8924015","2019-03-11","Miembro"):
INSERT INTO constancia VALUES("266","47","2959132","2019-03-11","Miembro"):
INSERT INTO constancia VALUES("267","47","9504702","2019-03-11","Miembro"):
INSERT INTO constancia VALUES("268","47","8206899","2019-03-11","Miembro"):
INSERT INTO constancia VALUES("269","47","2943689","2019-03-11","Miembro"):
INSERT INTO constancia VALUES("270","47","7916795","2019-03-11","Miembro"):
INSERT INTO constancia VALUES("271","47","2953995","2019-03-11","Miembro"):
INSERT INTO constancia VALUES("272","47","2721031","2019-03-11","Miembro"):
INSERT INTO constancia VALUES("273","47","9521224","2019-03-11","Miembro"):
INSERT INTO constancia VALUES("274","47","2958806","2019-03-11","Miembro"):
INSERT INTO constancia VALUES("275","47","9428666","2019-03-11","Miembro"):
INSERT INTO constancia VALUES("276","47","2117118","2019-03-11","Miembro"):
INSERT INTO constancia VALUES("277","48","9901728","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("279","49","8106231","2019-03-11","Miembro"):
INSERT INTO constancia VALUES("280","44","2130734","2019-03-11","Asesora"):
INSERT INTO constancia VALUES("281","50","9217967","2019-03-11","Participante"):
INSERT INTO constancia VALUES("282","50","2736411","2019-03-11","Participante"):
INSERT INTO constancia VALUES("283","50","8924015","2019-03-11","Participante"):
INSERT INTO constancia VALUES("284","50","9504702","2019-03-11","Participante"):
INSERT INTO constancia VALUES("285","50","2962322","2018-12-20","Participante"):
INSERT INTO constancia VALUES("286","51","2962322","2019-03-11","Formar parte"):
INSERT INTO constancia VALUES("287","51","9504702","2019-03-11","Formar parte"):
INSERT INTO constancia VALUES("288","51","8924015","2019-03-11","Formar parte"):
INSERT INTO constancia VALUES("289","51","9217967","2019-03-11","Formar parte"):
INSERT INTO constancia VALUES("290","51","2736411","2019-03-11","Formar parte"):
INSERT INTO constancia VALUES("291","50","2711109","2019-03-11","Participante"):
INSERT INTO constancia VALUES("292","51","2711109","2019-03-11","Formar parte"):
INSERT INTO constancia VALUES("293","52","2944835","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("294","52","2533154","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("295","52","2910276","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("296","52","2960136","0209-03-11","Asistente"):
INSERT INTO constancia VALUES("297","52","2943689","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("298","52","2949600","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("299","52","9523944","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("300","52","9521224","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("301","52","2637227","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("302","52","2962806","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("303","52","2956728","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("304","52","2610698","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("305","52","2953995","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("306","52","2905981","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("307","52","2800705","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("308","52","2312506","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("309","52","2907844","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("310","52","2952167","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("311","52","2721031","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("312","52","2126621","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("313","52","9203729","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("314","52","2426072","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("315","52","2601249","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("316","52","2959132","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("317","52","2957465","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("318","53","8112363","2019-03-11","Integrante"):
INSERT INTO constancia VALUES("319","53","8209456","2019-03-11","Integrante"):
INSERT INTO constancia VALUES("320","53","9204296","2019-03-11","Integrante"):
INSERT INTO constancia VALUES("321","53","2026392","2019-03-11","Integrante"):
INSERT INTO constancia VALUES("322","53","2001705","2019-03-11","Integrante"):
INSERT INTO constancia VALUES("323","53","8609179","2019-03-11","Integrante"):
INSERT INTO constancia VALUES("324","53","8207968","2019-03-11","Integrante"):
INSERT INTO constancia VALUES("325","53","8900299","2019-03-11","Integrante"):
INSERT INTO constancia VALUES("326","53","8001022","2019-03-11","Integrante"):
INSERT INTO constancia VALUES("327","53","8924015","2019-03-11","Integrantte"):
INSERT INTO constancia VALUES("328","53","9800301","2019-03-11","Integrante"):
INSERT INTO constancia VALUES("329","53","8518521","2019-03-11","Integrante"):
INSERT INTO constancia VALUES("330","53","2937743","2019-03-11","Integrante"):
INSERT INTO constancia VALUES("331","53","2949600","2019-03-11","Integrante"):
INSERT INTO constancia VALUES("332","53","2134284","2019-03-11","Integrante"):
INSERT INTO constancia VALUES("333","53","9513566","2019-03-11","Integrante"):
INSERT INTO constancia VALUES("334","53","2962661","2019-03-11","Integrante"):
INSERT INTO constancia VALUES("335","53","2702282","2019-03-11","Integrante"):
INSERT INTO constancia VALUES("336","53","2613395","2019-03-11","Integrante"):
INSERT INTO constancia VALUES("337","53","9905898","2019-03-11","Integrante"):
INSERT INTO constancia VALUES("338","53","2505096","2019-03-11","Integrante"):
INSERT INTO constancia VALUES("339","53","9113568","2019-03-11","Integrante"):
INSERT INTO constancia VALUES("340","53","2945265","2019-03-11","Integrante"):
INSERT INTO constancia VALUES("341","31","2202344","2019-03-11","Participante"):
INSERT INTO constancia VALUES("342","31","8110026","2019-03-11","Participante"):
INSERT INTO constancia VALUES("343","54","2963481","2019-03-11","Integrante"):
INSERT INTO constancia VALUES("344","55","2202344","2019-03-11","Facilitadora"):
INSERT INTO constancia VALUES("345","31","9911367","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("346","56","2309769","2019-03-11","Coordinador"):
INSERT INTO constancia VALUES("347","57","2210533","2019-03-11","Miembro"):
INSERT INTO constancia VALUES("348","8","2210533","2019-03-11","Participante"):
INSERT INTO constancia VALUES("349","59","2963481","2019-03-11","Participante"):
INSERT INTO constancia VALUES("350","59","2952013","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("351","59","9301801","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("352","59","8408246","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("353","59","9409386","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("354","59","9426736","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("355","59","2736411","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("356","59","2116987","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("357","59","9427406","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("358","60","8900299","2019-03-11","Miembro"):
INSERT INTO constancia VALUES("359","61","2613395","2019-03-11","Miembro"):
INSERT INTO constancia VALUES("360","62","2613395","2019-03-11","Presidente"):
INSERT INTO constancia VALUES("361","63","2613395","2019-03-11","Presidente"):
INSERT INTO constancia VALUES("362","64","2613395","2019-03-11","MIembro"):
INSERT INTO constancia VALUES("363","65","2613395","2019-03-11","Miembro"):
INSERT INTO constancia VALUES("364","66","2613395","2019-03-11","Miembro"):
INSERT INTO constancia VALUES("365","67","2613395","2019-03-11","Miembro"):
INSERT INTO constancia VALUES("366","68","2108984","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("367","68","2729156","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("368","68","2945119","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("369","68","9325247","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("370","68","9508244","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("371","68","2304058","2019-03-11","Asistente"):
INSERT INTO constancia VALUES("372","68","9221697","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("373","68","7816901","2019-03-13","Asistente"):
INSERT INTO constancia VALUES("374","68","2736411","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("375","68","2101238","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("376","68","2116987","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("377","68","8706034","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("378","69","2613395","2019-03-12","Impartir"):
INSERT INTO constancia VALUES("379","69","2613395","2019-03-12","Impartir"):
INSERT INTO constancia VALUES("380","69","2958087","2019-03-12","Impartir"):
INSERT INTO constancia VALUES("381","69","2958087","2018-03-12","Impartir"):
INSERT INTO constancia VALUES("382","69","0","2019-03-12","Impartir"):
INSERT INTO constancia VALUES("383","69","0","2019-03-12","Impartir"):
INSERT INTO constancia VALUES("384","69","0","2019-03-12","Impartir"):
INSERT INTO constancia VALUES("385","69","0","2019-03-12","Impartir"):
INSERT INTO constancia VALUES("386","69","9521348","2019-03-12","Impartir"):
INSERT INTO constancia VALUES("387","69","9521348","2019-03-12","Impartir"):
INSERT INTO constancia VALUES("388","57","2213435","2019-03-12","Miembro"):
INSERT INTO constancia VALUES("389","64","2613395","2019-03-12","Miembro"):
INSERT INTO constancia VALUES("390","63","2613395","2019-03-12","Presidente"):
INSERT INTO constancia VALUES("391","65","2613395","2019-03-12","Miembro"):
INSERT INTO constancia VALUES("392","61","2613395","2019-03-12","Miembro"):
INSERT INTO constancia VALUES("393","70","2613395","2019-03-12","Miembro"):
INSERT INTO constancia VALUES("394","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("395","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("396","72","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("397","73","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("398","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("399","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("400","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("401","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("402","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("403","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("404","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("405","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("406","71","8112363","0209-03-12","Participante"):
INSERT INTO constancia VALUES("407","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("408","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("409","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("410","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("411","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("412","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("413","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("414","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("415","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("416","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("417","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("418","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("419","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("420","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("421","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("422","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("423","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("424","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("425","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("426","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("427","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("428","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("429","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("430","74","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("431","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("432","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("433","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("434","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("435","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("436","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("437","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("438","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("439","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("440","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("441","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("442","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("443","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("444","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("445","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("446","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("447","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("448","75","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("449","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("450","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("451","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("452","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("453","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("454","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("455","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("456","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("457","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("458","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("459","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("460","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("461","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("462","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("463","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("464","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("465","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("466","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("467","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("468","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("469","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("470","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("471","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("472","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("473","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("474","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("475","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("476","71","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("477","76","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("478","77","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("479","78","8112363","2018-03-12","Participante"):
INSERT INTO constancia VALUES("480","78","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("481","79","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("482","80","9508244","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("483","14","9211306","2018-03-12","Miembro Propietario"):
INSERT INTO constancia VALUES("484","81","8810222","2019-03-12","Ponente"):
INSERT INTO constancia VALUES("485","81","8810222","2019-03-12","Ponente"):
INSERT INTO constancia VALUES("486","82","9521348","2019-03-12","Miembro Propietario"):
INSERT INTO constancia VALUES("487","82","9521348","2019-03-12","Miembro Propietario"):
INSERT INTO constancia VALUES("488","82","9521348","2019-03-12","Miembro Propietario"):
INSERT INTO constancia VALUES("489","82","9521348","2019-03-12","Miembro Propietario"):
INSERT INTO constancia VALUES("490","82","9521348","2019-03-12","Miembro Propietario"):
INSERT INTO constancia VALUES("491","82","9521348","2019-03-12","Miembro Propietario"):
INSERT INTO constancia VALUES("492","83","2406608","2019-03-12","Directora"):
INSERT INTO constancia VALUES("493","84","2128632","2019-03-12","Participante"):
INSERT INTO constancia VALUES("494","84","8112363","2019-03-12","Coordinador"):
INSERT INTO constancia VALUES("495","85","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("496","85","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("497","86","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("498","86","9504702","2019-03-12","Participante"):
INSERT INTO constancia VALUES("499","86","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("500","86","8112363","2019-03-12","Participante"):
INSERT INTO constancia VALUES("501","86","9504702","2019-03-12","Participante"):
INSERT INTO constancia VALUES("502","86","9504702","2019-03-12","Participante"):
INSERT INTO constancia VALUES("503","86","2128632","2019-03-12","Participante"):
INSERT INTO constancia VALUES("504","86","2128632","2019-03-12","Participante"):
INSERT INTO constancia VALUES("505","86","2128632","2019-03-12","Participante"):
INSERT INTO constancia VALUES("506","86","2128632","2019-03-12","Participante"):
INSERT INTO constancia VALUES("513","87","2941201","2019-03-12","Integrante"):
INSERT INTO constancia VALUES("514","87","2958623","2019-03-12","Secretario"):
INSERT INTO constancia VALUES("515","88","2957959","2019-03-12","Integrante"):
INSERT INTO constancia VALUES("516","87","2963481","2019-03-12","Presidente"):
INSERT INTO constancia VALUES("517","89","7711972","2019-03-12","Ponente"):
INSERT INTO constancia VALUES("518","90","7711972","2019-03-12","Organizador"):
INSERT INTO constancia VALUES("519","90","7711972","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("524","90","2959322","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("525","90","2","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("526","90","3","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("527","90","4","2019-02-12","Asistente"):
INSERT INTO constancia VALUES("528","90","5","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("529","90","6","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("530","90","7","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("531","90","8709009","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("532","90","2309521","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("533","90","8","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("534","90","9","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("535","90","2627183","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("536","90","10","2019-03-12","Asistencia"):
INSERT INTO constancia VALUES("537","90","11","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("538","90","2530023","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("539","90","12","2019-03-12","Asistencia"):
INSERT INTO constancia VALUES("540","90","13","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("541","90","2819023","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("542","90","9200045","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("543","90","14","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("544","90","15","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("545","90","2945346","2019-03-12","Asistente"):
INSERT INTO constancia VALUES("546","91","16","2019-03-12","Participación"):
INSERT INTO constancia VALUES("547","91","17","2019-03-13","Participación"):
INSERT INTO constancia VALUES("548","91","18","2019-03-13","Participación"):
INSERT INTO constancia VALUES("549","91","19","2019-03-13","Participante"):
INSERT INTO constancia VALUES("550","92","20","2019-03-13","Organizador"):
INSERT INTO constancia VALUES("551","92","2958415","2019-03-13","Organizador"):
INSERT INTO constancia VALUES("552","92","2959322","2019-03-13","Organizador"):
INSERT INTO constancia VALUES("553","92","3","2019-03-13","Organizador"):
INSERT INTO constancia VALUES("554","92","4","2019-03-13","Organizador"):
INSERT INTO constancia VALUES("555","92","5","2019-03-13","Organizador"):
INSERT INTO constancia VALUES("556","92","6","2019-03-13","Organizador"):
INSERT INTO constancia VALUES("557","92","7","2019-03-13","Organizador"):
INSERT INTO constancia VALUES("558","92","8709009","2019-03-13","Organizador"):
INSERT INTO constancia VALUES("559","92","2309521","2019-03-13","Organizador"):
INSERT INTO constancia VALUES("560","92","8","2019-03-13","Organizador"):
INSERT INTO constancia VALUES("561","92","2627183","2019-03-13","Organizador"):
INSERT INTO constancia VALUES("562","92","11","2019-03-13","Organizador"):
INSERT INTO constancia VALUES("563","92","2530023","2019-03-13","Organizador"):
INSERT INTO constancia VALUES("564","92","13","2019-03-13","Organizador"):
INSERT INTO constancia VALUES("565","92","9200045","2019-03-13","Organizador"):
INSERT INTO constancia VALUES("566","92","15","2019-03-13","Organizador"):
INSERT INTO constancia VALUES("567","92","2945346","2019-03-13","Organizador"):
INSERT INTO constancia VALUES("568","94","2958415","2019-03-13","Participación"):
INSERT INTO constancia VALUES("569","95","2921979","2019-03-13","Ponente"):
INSERT INTO constancia VALUES("570","96","21","2019-03-13","Ponente"):
INSERT INTO constancia VALUES("571","97","8709009","2019-03-13","Ponente"):
INSERT INTO constancia VALUES("572","98","22","2019-03-13","Ponente"):
INSERT INTO constancia VALUES("573","99","2611708","2019-03-13","Organizador"):
INSERT INTO constancia VALUES("574","100","2960092","2019-03-13","Ponente"):
INSERT INTO constancia VALUES("575","100","2955256","2019-03-13","Ponente"):
INSERT INTO constancia VALUES("576","100","23","2019-03-13","Ponente"):
INSERT INTO constancia VALUES("577","59","2935333","2019-03-13","Asistente"):
INSERT INTO constancia VALUES("578","59","2960280","2019-03-13","Asistente"):
INSERT INTO constancia VALUES("579","101","2934094","2019-03-13","Ponente"):
INSERT INTO constancia VALUES("580","102","2946811","2019-03-13","Ponente"):
INSERT INTO constancia VALUES("581","103","24","2019-03-13","Ponente"):
INSERT INTO constancia VALUES("582","103","25","2019-03-13","Ponente"):
INSERT INTO constancia VALUES("583","103","26","2019-03-13","Ponente"):
INSERT INTO constancia VALUES("584","103","27","2019-03-13","Ponente"):
INSERT INTO constancia VALUES("585","104","9412743","2019-03-13","Ponente"):
INSERT INTO constancia VALUES("586","101","28","2019-03-15","Ponente"):
INSERT INTO constancia VALUES("587","101","29","2019-03-15","Ponente"):
INSERT INTO constancia VALUES("588","101","30","2019-03-15","Ponente"):
INSERT INTO constancia VALUES("589","101","8001022","0019-03-15","Ponente"):
INSERT INTO constancia VALUES("590","101","2813122","2019-03-15","Ponente"):
INSERT INTO constancia VALUES("591","101","31","2019-03-15","Ponente"):
INSERT INTO constancia VALUES("592","101","32","2019-03-15","Ponente"):
INSERT INTO constancia VALUES("593","101","33","2019-03-15","Ponente"):
INSERT INTO constancia VALUES("594","101","2962806","2019-03-15","Ponente"):
INSERT INTO constancia VALUES("595","101","2956944","2019-03-15","Ponente"):
INSERT INTO constancia VALUES("596","101","2953875","2019-03-15","Ponente"):
INSERT INTO constancia VALUES("597","101","34","2019-03-15","Ponente"):
INSERT INTO constancia VALUES("598","101","35","2019-03-15","Ponente"):
INSERT INTO constancia VALUES("599","105","2905191","2019-03-27","Participación"):
INSERT INTO constancia VALUES("600","105","2832526","2019-03-27","Participación"):
INSERT INTO constancia VALUES("601","105","9903496","2019-03-27","Participación"):
INSERT INTO constancia VALUES("602","105","2122006","2019-03-27","Participación"):

    /*!40000 ALTER TABLE `constancia` ENABLE KEYS */:
    UNLOCK TABLES:



DROP TABLE IF EXISTS cursante:
/*!40101 SET @saved_cs_client     = @@character_set_client */:
/*!40101 SET character_set_client = utf8 */:

CREATE TABLE `cursante` (
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8:


/*!40101 SET character_set_client = @saved_cs_client */:
LOCK TABLES `cursante` WRITE:
/*!40000 ALTER TABLE `cursante` DISABLE KEYS */:
    INSERT INTO cursante VALUES("0","Andrea del Toro Arias"):
INSERT INTO cursante VALUES("00","Adriana Patricia Velasco Moncada"):
INSERT INTO cursante VALUES("000","Violeta Rubí Castro López"):
INSERT INTO cursante VALUES("00000","María Fernanda Castañeda Almaguer"):
INSERT INTO cursante VALUES("000000","Claudia Madeleine Elizabeth Hunot Alexander"):
INSERT INTO cursante VALUES("0000000","Ana Laura Beltrán Cortes"):
INSERT INTO cursante VALUES("00000000","Ana Mallitzin González Martín"):
INSERT INTO cursante VALUES("000000000","Jenifer Alcaraz Novoa"):
INSERT INTO cursante VALUES("0000000000","Rafael Vázquez Solórzano"):
INSERT INTO cursante VALUES("00000000000","Enrique Jaime Herrera López"):
INSERT INTO cursante VALUES("001","Jenifer Alcaraz Novoa"):
INSERT INTO cursante VALUES("1","Alejandra Patiño Figueroa"):
INSERT INTO cursante VALUES("10","Marlene Sánchez González"):
INSERT INTO cursante VALUES("1000000","prueba1"):
INSERT INTO cursante VALUES("11","Miguel Ángel Terrones Ramírez"):
INSERT INTO cursante VALUES("12","Palmira Gutierrez Cedillo"):
INSERT INTO cursante VALUES("13","Paola Fernanda López Trejo"):
INSERT INTO cursante VALUES("14","María de Jesús Sixto Onofre"):
INSERT INTO cursante VALUES("15","Zulma Alejandra Nieto González"):
INSERT INTO cursante VALUES("16","María de Lourdes Ramírez Aldana"):
INSERT INTO cursante VALUES("17","María del Carmen Sixto"):
INSERT INTO cursante VALUES("18","María del Refugio Avalos Benito"):
INSERT INTO cursante VALUES("19","María del Rocio Marquez Encarnación"):
INSERT INTO cursante VALUES("2","Catalina Chávez Jacobo"):
INSERT INTO cursante VALUES("20","Alexis Misael Arellano Martínez"):
INSERT INTO cursante VALUES("2001578","José Luis Jiménez Díaz"):
INSERT INTO cursante VALUES("2001705","Sara Guerrero Campos"):
INSERT INTO cursante VALUES("2019477","Jessica Vargas Íniguez"):
INSERT INTO cursante VALUES("2026392","Marco Tulio Daza Ramírez"):
INSERT INTO cursante VALUES("2035456","Octavio Núñez Maciel"):
INSERT INTO cursante VALUES("2035537","Rosa Elena Arellano Montoya"):
INSERT INTO cursante VALUES("21","Héctor Fredi Huendo Romero"):
INSERT INTO cursante VALUES("210096685","José Antonio Espinoza Reyes"):
INSERT INTO cursante VALUES("2101238","Jessica del Pilar Ramírez Anaya"):
INSERT INTO cursante VALUES("2108984","Sandra Verónica Arias Bautista"):
INSERT INTO cursante VALUES("2116987","Martha Karina Amezcua Luján"):
INSERT INTO cursante VALUES("2117118","Victor Genaro Ríos Rodríguez"):
INSERT INTO cursante VALUES("2121085","Claudia Llanes Cañedo"):
INSERT INTO cursante VALUES("2122006","Carlos Alejandro Hidalgo Rasmussen"):
INSERT INTO cursante VALUES("2126613","Hugo Concepción Rodríguez Chávez"):
INSERT INTO cursante VALUES("2126621","María Cristina del Toro Guizar"):
INSERT INTO cursante VALUES("2128632","Mariana Elizabeth Domínguez Cobian"):
INSERT INTO cursante VALUES("2130734","Isabel Cristina Marin Arriola"):
INSERT INTO cursante VALUES("2134284","Guillermina López Jiménez"):
INSERT INTO cursante VALUES("2138174","Lucia Ester Rizo Martínez"):
INSERT INTO cursante VALUES("22","Joaquín Antonio López Castañeda"):
INSERT INTO cursante VALUES("2202344","Diana Rojo Morales"):
INSERT INTO cursante VALUES("2203898","Lourdes Margarita Arce Rodríguez"):
INSERT INTO cursante VALUES("2207648","Porfirio Chávez Galindo"):
INSERT INTO cursante VALUES("2210533","José Cruz Guzmán Díaz"):
INSERT INTO cursante VALUES("2212226","Jaime García Guzmán"):
INSERT INTO cursante VALUES("2213435","Antonio Jiménez Díaz"):
INSERT INTO cursante VALUES("2214784","Patricia Joséfina López Uriarte"):
INSERT INTO cursante VALUES("2216809","Arturo González Solis"):
INSERT INTO cursante VALUES("2232162","Lilia del Sagrario Figueroa Meza"):
INSERT INTO cursante VALUES("23","Oscar Geovanny Jiménez González"):
INSERT INTO cursante VALUES("2303779","Lorena Ruesga Cardenas"):
INSERT INTO cursante VALUES("2304058","Felipe Santoyo Telles"):
INSERT INTO cursante VALUES("2309521","Juan Manuel Guzmán Silva"):
INSERT INTO cursante VALUES("2309769","Norma Hélen Juarez"):
INSERT INTO cursante VALUES("2311623","Francisco Javier Camacho Murillo"):
INSERT INTO cursante VALUES("2312506","Sandra Ivonne Torres Lisjuan"):
INSERT INTO cursante VALUES("24","Sandra Garibay Chávez"):
INSERT INTO cursante VALUES("2406608","Laura Elena de Luna Velasco"):
INSERT INTO cursante VALUES("2421682","Irene Odemariz Limones Gutierrez"):
INSERT INTO cursante VALUES("2426072","Gabriela Ochoa Pujol"):
INSERT INTO cursante VALUES("25","Rosa del Sagrario Rubio"):
INSERT INTO cursante VALUES("2505096","Alma Gabriela Jacobo Larios"):
INSERT INTO cursante VALUES("2505231","Luis Alberto Pérez Amezcua"):
INSERT INTO cursante VALUES("2506297","Martha Aideé Ruíz Gutiérrez"):
INSERT INTO cursante VALUES("2519062","Enrique Roberto Azpeitia Torres"):
INSERT INTO cursante VALUES("2530023","Oziel Dante Montañez Valdez"):
INSERT INTO cursante VALUES("2532115","Alma Gabriela Martínez Moreno"):
INSERT INTO cursante VALUES("2533154","Thelma Sofia Alonso Navarro"):
INSERT INTO cursante VALUES("2536234","Karla Verónica Lares Martínez"):
INSERT INTO cursante VALUES("26","Erika del Sagrario Montes"):
INSERT INTO cursante VALUES("2601249","Araceli Gutiérrez Sánchez"):
INSERT INTO cursante VALUES("2602113","María Alicia Rodríguez Hernández"):
INSERT INTO cursante VALUES("2602369","Laura Patricia López Espinoza"):
INSERT INTO cursante VALUES("2604183","Georgina Sánchez González"):
INSERT INTO cursante VALUES("2610698","Flor de Guadalupe Rodríguez López"):
INSERT INTO cursante VALUES("2611708","Omar Hernández Calvario"):
INSERT INTO cursante VALUES("2613395","Berenice Sánchez Caballero"):
INSERT INTO cursante VALUES("2624117","Omar Arce Rodríguez"):
INSERT INTO cursante VALUES("2627183","María Guadalupe Contréras Maldonado"):
INSERT INTO cursante VALUES("2637227","Liduvina Margarita Macias Silva"):
INSERT INTO cursante VALUES("27","Gabriela Alejandra Hernández Cárdenas"):
INSERT INTO cursante VALUES("2702282","Tzintli Meraz Medina"):
INSERT INTO cursante VALUES("2707497","Erwin José Peña Valencia"):
INSERT INTO cursante VALUES("2709937","J. Jesús Munguía Hernández"):
INSERT INTO cursante VALUES("2710269","Rosa Emilia Soto Nuñez"):
INSERT INTO cursante VALUES("2711109","Yolanda Lizeth Sevilla García"):
INSERT INTO cursante VALUES("2718081","Abdel Israel Dávila del Toro"):
INSERT INTO cursante VALUES("2721031","Claudia Lizeth Vázquez Aguilar"):
INSERT INTO cursante VALUES("2729156","Patricia Isabel López de la Madrid"):
INSERT INTO cursante VALUES("2736411","Ma. Claudia Castañeda Saucedo"):
INSERT INTO cursante VALUES("28","Lydia Karen Chávez Saldaña"):
INSERT INTO cursante VALUES("2800705","J. Jesús Torres Barragán"):
INSERT INTO cursante VALUES("2801639","Virginia Gabriela Aguilera Cervantes"):
INSERT INTO cursante VALUES("2813122","Adrián De la Torre Chávez"):
INSERT INTO cursante VALUES("2819023","Rafael Michel León"):
INSERT INTO cursante VALUES("2832526","Felipe de Jesús Díaz Resendiz"):
INSERT INTO cursante VALUES("2836637","José Luis Zuñiga Vargas"):
INSERT INTO cursante VALUES("29","María Elena Contreras Torres"):
INSERT INTO cursante VALUES("2905191","Karina Franco Paredes"):
INSERT INTO cursante VALUES("2905981","Ariana Lizeth García Partida"):
INSERT INTO cursante VALUES("2907844","Samuel Toscano Rodríguez"):
INSERT INTO cursante VALUES("2910276","José Cardenas Gorgonio"):
INSERT INTO cursante VALUES("2921979","Fatima Ezzahra Housni"):
INSERT INTO cursante VALUES("2922274","Juan Manuel Vázquez Flores"):
INSERT INTO cursante VALUES("2933829","Miguel Amezquita Sánchez"):
INSERT INTO cursante VALUES("2934094","Lorena Martínez Martínez"):
INSERT INTO cursante VALUES("2935333","Norma Angélica Siordia Ornelas"):
INSERT INTO cursante VALUES("2937743","Oscar Iván Delgado Nungaray"):
INSERT INTO cursante VALUES("2941201","Laura Elena Iñiguez Muñoz"):
INSERT INTO cursante VALUES("2943417","Esmeralda Azucena García Álvarez"):
INSERT INTO cursante VALUES("2943689","J. Ventura Chávez Pérez"):
INSERT INTO cursante VALUES("2944835","Lenin Antonio Aceves Díaz"):
INSERT INTO cursante VALUES("2945119","Jesús Haydee Herrera Hernández"):
INSERT INTO cursante VALUES("2945265","Adriana Holguín Bernal"):
INSERT INTO cursante VALUES("2945346","José Raúl Jiménez Botello"):
INSERT INTO cursante VALUES("2946811","Claudia Rocio Magaña González"):
INSERT INTO cursante VALUES("2946914","Santiago Figueroa Gómez"):
INSERT INTO cursante VALUES("2948649","Juan Saul Barajas Pérez"):
INSERT INTO cursante VALUES("2948860","Javier Antonio Zepeda Orozco"):
INSERT INTO cursante VALUES("2949600","Gladys Josefina Delgado Nungaray"):
INSERT INTO cursante VALUES("2952013","Martha Leticia Ortiz Acosta"):
INSERT INTO cursante VALUES("2952167","Ana Patricia Zepeda Salvador"):
INSERT INTO cursante VALUES("2953801","Denis Arturo López Gaspar"):
INSERT INTO cursante VALUES("2953875","Esther Macías Llamas"):
INSERT INTO cursante VALUES("2953995","Oscar Rodríguez Romero"):
INSERT INTO cursante VALUES("2954666","María de Jesús García Romero"):
INSERT INTO cursante VALUES("2955057","Abel Cortez Torres"):
INSERT INTO cursante VALUES("2955075","Mónica Betancourt Evangelista"):
INSERT INTO cursante VALUES("2955256","Rafael Rios Nuño"):
INSERT INTO cursante VALUES("2955272","María del Carmen Barragán Carmona"):
INSERT INTO cursante VALUES("2956728","Gonzalo Rocha de la Cruz"):
INSERT INTO cursante VALUES("2956944","Sonia Amezcua Patiño"):
INSERT INTO cursante VALUES("2957465","Elsa Bravo Valencia"):
INSERT INTO cursante VALUES("2957632","Jorge Irineo Silva Sánchez"):
INSERT INTO cursante VALUES("2957959","Karina Alarcon Domínguez"):
INSERT INTO cursante VALUES("2958087","Ana Cristina Espinoza Gallardo"):
INSERT INTO cursante VALUES("2958415","Andrés Emmanuel Michel Hernández"):
INSERT INTO cursante VALUES("2958623","Zyanya Reyes Castillo"):
INSERT INTO cursante VALUES("2958806","Azucena Rodríguez Anaya"):
INSERT INTO cursante VALUES("2959132","María Del Carmen Oliveros Sánchez"):
INSERT INTO cursante VALUES("2959322","Aurora Berenice Gutiérrez Cedillo"):
INSERT INTO cursante VALUES("2960092","Paola Hernández Ángeles"):
INSERT INTO cursante VALUES("2960136","Alma Guadalupe Chávez Pérez"):
INSERT INTO cursante VALUES("2960280","Jonathan Rivera Eufracio"):
INSERT INTO cursante VALUES("2960427","Jessica Elizabeth Pineda Lozano"):
INSERT INTO cursante VALUES("2960619","Orlando Rodríguez Anguiano"):
INSERT INTO cursante VALUES("2961266","Angélica Jiménez Briseño"):
INSERT INTO cursante VALUES("2961404","Ana Fabiola Campos Jazo"):
INSERT INTO cursante VALUES("2961606","Juan Pedro Salcedo Ortega"):
INSERT INTO cursante VALUES("2962322","Anahi Copitzy Gómez Fuentes"):
INSERT INTO cursante VALUES("2962661","Monserratt Espinoza Vega"):
INSERT INTO cursante VALUES("2962806","Liliana Margarita Milanes Magaña"):
INSERT INTO cursante VALUES("2963481","Jorge Enrique Pliego Sandoval"):
INSERT INTO cursante VALUES("2964069","Christian Adrian Villalobos García"):
INSERT INTO cursante VALUES("3","Daniel Alejandro Bahena Ramírez"):
INSERT INTO cursante VALUES("30","Dalia Dalila Cisneros Gómez"):
INSERT INTO cursante VALUES("31","Rosalva Patricia Zúñiga López"):
INSERT INTO cursante VALUES("32","Patricia Josefina Zavala López"):
INSERT INTO cursante VALUES("33","Jorge Armando Pinto Hernández"):
INSERT INTO cursante VALUES("34","Isabel Ochoa Méndez"):
INSERT INTO cursante VALUES("35","Esther Silvia Olmos Velázquez"):
INSERT INTO cursante VALUES("4","David Martínez López"):
INSERT INTO cursante VALUES("5","Evelia Carolina Sánchez Álvarez"):
INSERT INTO cursante VALUES("6","Gabriela Hernández Salazar"):
INSERT INTO cursante VALUES("7","Idelina Martínez Coria"):
INSERT INTO cursante VALUES("7509936","Jesús Alfredo López García"):
INSERT INTO cursante VALUES("7711972","J. Guadalupe Michel Parra"):
INSERT INTO cursante VALUES("7816898","José Guadalupe Salazar Estrada"):
INSERT INTO cursante VALUES("7816901","Alejandro Mercado Méndez"):
INSERT INTO cursante VALUES("7910029","José Eduardo Ramírez Soltero"):
INSERT INTO cursante VALUES("7916795","Ma. del Refugio Rodríguez Ibarra"):
INSERT INTO cursante VALUES("8","María de Jesús Guzmán Aguilar"):
INSERT INTO cursante VALUES("8001022","Berta Ermila Madrigal Torres"):
INSERT INTO cursante VALUES("8019967","René Santibáñez Escobar"):
INSERT INTO cursante VALUES("8106231","Adrian Larios Escalante"):
INSERT INTO cursante VALUES("8110026","Ma. Patricia Rivera Espinoza"):
INSERT INTO cursante VALUES("8112363","Ricardo Xicoténcatl García Cauzor"):
INSERT INTO cursante VALUES("8206899","Arturo Sánchez Campos"):
INSERT INTO cursante VALUES("8207968","Alfonso Barajas Martínez"):
INSERT INTO cursante VALUES("8209456","Humberto Palos Delgadillo"):
INSERT INTO cursante VALUES("8315132","Rodrígo Cano Guzmán"):
INSERT INTO cursante VALUES("8408246","José María Tapia González"):
INSERT INTO cursante VALUES("8410674","Leticia Margarita Aguilar Núñez"):
INSERT INTO cursante VALUES("8414556","Ma. del Consuelo Aldrete Chávez"):
INSERT INTO cursante VALUES("8518521","Ricardo García de Alba García"):
INSERT INTO cursante VALUES("8609179","José Antonio Peña"):
INSERT INTO cursante VALUES("8611688","Esther Barragan Bautista"):
INSERT INTO cursante VALUES("8615985","Ricardo Blanco Deniz"):
INSERT INTO cursante VALUES("8706034","Ramiro Rivera"):
INSERT INTO cursante VALUES("8709009","Jesús Alberto Espinosa Arias"):
INSERT INTO cursante VALUES("8808848","Elia Herminia Valdés Miramontes"):
INSERT INTO cursante VALUES("8809267","Dionisio CHávez Ruiz"):
INSERT INTO cursante VALUES("8810222","Francisco Javier Chavoya Moreno"):
INSERT INTO cursante VALUES("8812586","Antonio López Espinoza"):
INSERT INTO cursante VALUES("8814325","Herlínda García Solórzano"):
INSERT INTO cursante VALUES("8819718","Silvano Hernández López"):
INSERT INTO cursante VALUES("8900299","Elia Margarita Rodríguez Chávez"):
INSERT INTO cursante VALUES("8914656","Adan Sepulveda Montes"):
INSERT INTO cursante VALUES("8924015","José Alejandro Juarez González"):
INSERT INTO cursante VALUES("9","María Gisela Trujillo Sanchez"):
INSERT INTO cursante VALUES("9021213","Maria Cristina López de la Madrid"):
INSERT INTO cursante VALUES("9025405","Adriana Alcaráz Marin"):
INSERT INTO cursante VALUES("9110828","Claudia Margarita Navarro Herrera"):
INSERT INTO cursante VALUES("9113568","Rachel García Reynaga"):
INSERT INTO cursante VALUES("9200045","Tomas Eduardo Orendain Verduzco"):
INSERT INTO cursante VALUES("9203729","Carlos Benavides Zepeda"):
INSERT INTO cursante VALUES("9204296","Martha Leticia Rujano Silva"):
INSERT INTO cursante VALUES("9211306","Mercedes Guillermina Nuñez Gutierrez"):
INSERT INTO cursante VALUES("9217967","Jorge Arturo Martínez Ibarra"):
INSERT INTO cursante VALUES("9221697","Carlos Hernández Vega"):
INSERT INTO cursante VALUES("9301801","Ivan Elpidio Morales Zambrano"):
INSERT INTO cursante VALUES("9325247","Gonzalo Hernández García"):
INSERT INTO cursante VALUES("9409386","José Octavio Macías Macías"):
INSERT INTO cursante VALUES("9412611","Irma Angélica Quiroz Silva"):
INSERT INTO cursante VALUES("9412646","Luz Elena Corona Loya"):
INSERT INTO cursante VALUES("9412743","Mónica Almeida López"):
INSERT INTO cursante VALUES("9414827","Perla Briseño Montes de Oca"):
INSERT INTO cursante VALUES("9426736","María Luisa Pita López"):
INSERT INTO cursante VALUES("9427406","Héctor Delgado Martínez"):
INSERT INTO cursante VALUES("9428666","Ricardo Sigala Gómez"):
INSERT INTO cursante VALUES("9500103","Ana Isabel Ochoa Barajas"):
INSERT INTO cursante VALUES("9504702","Alejandro Macías Macías"):
INSERT INTO cursante VALUES("9508244","Miguel Ángel Rangel Romero"):
INSERT INTO cursante VALUES("9513566","Marcos Manuel Macías Macías"):
INSERT INTO cursante VALUES("9520856","Humberto Bracamontes del Toro"):
INSERT INTO cursante VALUES("9521224","Hugo Gutierrez Murguia"):
INSERT INTO cursante VALUES("9521348","Oscar Jiménez Rivera"):
INSERT INTO cursante VALUES("9523944","María Elena Galvez Zatarain"):
INSERT INTO cursante VALUES("9623647","Esmeralda Briseño Montes de Oca"):
INSERT INTO cursante VALUES("9709983","Abraham López Villalvazo"):
INSERT INTO cursante VALUES("9716017","Ramiro Abarca Urquiza"):
INSERT INTO cursante VALUES("9800301","Evangelina Elizabeth Lozano Montes de Oca"):
INSERT INTO cursante VALUES("9805184","Katiuzka Flores Guerrero"):
INSERT INTO cursante VALUES("9901728","Ana Anaya Velasco"):
INSERT INTO cursante VALUES("9901752","Claudia Delfín Ruiz"):
INSERT INTO cursante VALUES("9903496","Ezequiel Ramírez Lira"):
INSERT INTO cursante VALUES("9905898","Rosa Eugenia García Gómez"):
INSERT INTO cursante VALUES("9911367","Pedro Pablo Villafania Gongora"):
INSERT INTO cursante VALUES("9912096","Martha Verónica López Espinoza"):

    /*!40000 ALTER TABLE `cursante` ENABLE KEYS */:
    UNLOCK TABLES:



DROP TABLE IF EXISTS evento:
/*!40101 SET @saved_cs_client     = @@character_set_client */:
/*!40101 SET character_set_client = utf8 */:

CREATE TABLE `evento` (
  `evento_id` int(8) NOT NULL AUTO_INCREMENT,
  `tipo_evento` int(8) NOT NULL,
  `instancia` int(8) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `duracion` int(5) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  PRIMARY KEY (`evento_id`),
  UNIQUE KEY `nombre` (`nombre`),
  KEY `tipo_evento` (`tipo_evento`),
  KEY `instancia` (`instancia`),
  CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`tipo_evento`) REFERENCES `tipo_evento` (`tipo_evento_id`),
  CONSTRAINT `evento_ibfk_2` FOREIGN KEY (`instancia`) REFERENCES `instancia` (`instancia_id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8:


/*!40101 SET character_set_client = @saved_cs_client */:
LOCK TABLES `evento` WRITE:
/*!40000 ALTER TABLE `evento` DISABLE KEYS */:
    INSERT INTO evento VALUES("1","4","9","Semana Nacional de Investigación Cientif","0","2018-11-13","2018-11-14"):
INSERT INTO evento VALUES("2","2","17","Curso Taller Elaboración de Materiales c","0","2018-07-09","2018-12-14"):
INSERT INTO evento VALUES("3","4","7","Comité de seguimiento a la calidad del P","0","2018-01-01","2018-12-31"):
INSERT INTO evento VALUES("4","1","15","Curso-Taller Interpretación de Datos Est","32","2019-01-09","2019-01-02"):
INSERT INTO evento VALUES("5","1","9","Curso Estudio de la estructura interna y","20","2018-03-14","2018-03-20"):
INSERT INTO evento VALUES("6","1","18","Curso de capacitación para la acreditaci","20","2018-04-13","2018-05-25"):
INSERT INTO evento VALUES("7","4","3","Comité de Titulación del Programa Educat","0","2018-01-01","2018-12-31"):
INSERT INTO evento VALUES("8","1","9","Proceso de selección de alumnos del curs","0","2018-11-29","2018-11-29"):
INSERT INTO evento VALUES("9","5","16","Colegio Departamental del Departamento d","0","2017-01-02","2019-12-31"):
INSERT INTO evento VALUES("10","5","16","Academia de Ciencias de la Tierra del De","0","2017-01-02","2019-12-31"):
INSERT INTO evento VALUES("11","6","21","Comité para la creación del Centro de In","0","2018-12-14","2018-12-14"):
INSERT INTO evento VALUES("12","6","21","Consejo de la Cátedra Nacional de Derech","0","2018-12-03","2018-12-03"):
INSERT INTO evento VALUES("13","6","33","Segundo curso sobre residuos orgánicos y","73","2018-11-01","2018-11-30"):
INSERT INTO evento VALUES("14","6","2","Comisión Dictaminadora para el Ingreso y","0","2018-12-03","2018-12-31"):
INSERT INTO evento VALUES("15","6","3","Consejero Académico Suplente del H. Cons","0","2018-10-05","2019-10-15"):
INSERT INTO evento VALUES("16","5","18","Comité Técnico para el seguimiento de la","0","2017-11-01","2019-10-31"):
INSERT INTO evento VALUES("17","6","26","Proceso de selección de alumnos para el ","0","2018-11-20","2018-11-23"):
INSERT INTO evento VALUES("18","6","18","Comité de Titulación Programa Educativo ","0","2018-08-01","2020-07-31"):
INSERT INTO evento VALUES("19","6","1","Coordinadora en el proceso de evaluación","0","2016-09-01","2018-05-31"):
INSERT INTO evento VALUES("20","6","20","Curso Cultura emprendedora dirigida a lo","40","2018-11-26","2018-12-14"):
INSERT INTO evento VALUES("21","6","20","Prevención y disolución de conflictos de","40","2018-11-30","2018-12-18"):
INSERT INTO evento VALUES("22","6","6","VIII Coloquio sobre el Mariachi Tradicio","0","2018-09-13","2018-09-14"):
INSERT INTO evento VALUES("23","6","6","XVII Concurso Nacional de Cuento Juan Jo","0","2018-09-21","2018-09-21"):
INSERT INTO evento VALUES("24","6","6","VI Feria de la Ciencia y Tecnología","0","2018-10-02","2018-10-03"):
INSERT INTO evento VALUES("25","6","6","Tiempo para ti... Mujer CUSur","0","2018-03-08","2018-03-08"):
INSERT INTO evento VALUES("26","6","6","Limpiemos Zapotlán","0","2018-06-14","2018-06-14"):
INSERT INTO evento VALUES("27","6","6","Curso de verano 2018 Pequeños Universita","0","2018-07-10","2018-07-15"):
INSERT INTO evento VALUES("28","6","20","Presentación del Libro 50 mil sombras","0","2018-11-07","2018-11-07"):
INSERT INTO evento VALUES("29","6","6","Curso de verano de música","0","2018-06-09","2018-07-22"):
INSERT INTO evento VALUES("30","6","6","Espectáculo dancístico Tierra de fuego","0","2018-03-11","2018-03-11"):
INSERT INTO evento VALUES("31","6","20","Programa de simulación On Campus","40","2018-07-16","2018-07-20"):
INSERT INTO evento VALUES("32","6","21","Curso Taller Evaluación de la Calidad de","40","2018-06-04","2018-11-23"):
INSERT INTO evento VALUES("33","6","20","Curso Taller Prevención y disolución de ","40","2018-11-30","2018-12-18"):
INSERT INTO evento VALUES("34","6","18","Curso Buenas Prácticas Docentes","40","2018-07-03","2018-12-07"):
INSERT INTO evento VALUES("35","6","18","Curso Buenas Prácticas Docentes Instruct","40","2018-07-03","2018-12-07"):
INSERT INTO evento VALUES("36","6","18","Curso Buenas Prácticas Docentes Asistent","40","0008-07-03","2018-12-07"):
INSERT INTO evento VALUES("37","6","18","Curso Buenas Prácticas Docentes Organiza","40","2018-07-03","2018-12-07"):
INSERT INTO evento VALUES("38","6","6","Comité Organizador de la Feria una mirad","0","2018-09-07","2018-09-07"):
INSERT INTO evento VALUES("39","6","6","Coordinadora General de los Talleres de ","0","2018-01-01","2018-12-31"):
INSERT INTO evento VALUES("40","6","6","Coordinadora General de la Gala Cultural","0","2018-05-22","2018-05-22"):
INSERT INTO evento VALUES("41","6","6","Coordinadora General del II Concurso Bie","0","2018-09-01","2018-09-01"):
INSERT INTO evento VALUES("42","6","19","Psicoterapia Cognitivo-conductual en niñ","0","2018-11-13","2018-11-14"):
INSERT INTO evento VALUES("43","1","26","Curso Elementos de cooperación cientific","40","2018-01-15","2018-01-18"):
INSERT INTO evento VALUES("44","6","5","Convenio CSR-U-JEC-008-2018 UDG. IMJUVE","0","2018-08-01","2018-12-31"):
INSERT INTO evento VALUES("45","6","26","Curso Impacto fisiológico del estrés oxi","40","2018-11-05","2018-11-16"):
INSERT INTO evento VALUES("46","6","21","Conferencia magistral: La Agroecología R","0","2018-10-09","2018-10-09"):
INSERT INTO evento VALUES("47","6","18","Comité de seguimiento a la calidad acadé","0","2017-08-01","2018-08-31"):
INSERT INTO evento VALUES("48","6","23","Curso QGIS Aplicado al Análisis de Pelig","20","2018-06-14","2018-02-15"):
INSERT INTO evento VALUES("49","5","3","Comisión de Normatividad","0","2018-10-01","2019-10-31"):
INSERT INTO evento VALUES("50","6","18","Proceso de revisión y selección de aspir","0","2016-08-15","2018-07-16"):
INSERT INTO evento VALUES("51","6","18","Formar parte de la junta académica de la","0","2018-01-16","2019-01-14"):
INSERT INTO evento VALUES("52","6","19","Buenas Prácticas Docentes","40","2018-07-03","2018-12-07"):
INSERT INTO evento VALUES("53","6","5","Consejo Técnico de Tutorias","0","2018-07-16","2018-12-20"):
INSERT INTO evento VALUES("54","5","3","Comité Curricular Intercentros","0","2018-01-01","2020-12-31"):
INSERT INTO evento VALUES("55","1","3","Curso Taller Herramientas para la evalua","60","2018-01-31","2018-03-23"):
INSERT INTO evento VALUES("56","6","33","Foro Internacional Tecnología e innovaci","0","2018-10-03","2018-10-03"):
INSERT INTO evento VALUES("57","6","9","Junta Académica del Posgrado de Derecho ","0","2018-07-16","2018-12-20"):
INSERT INTO evento VALUES("58","6","3","Secretario suplente de la elección de Co","0","2018-01-01","2018-12-31"):
INSERT INTO evento VALUES("59","1","15","Curso Introtucción al Método R","20","2018-06-26","2018-06-28"):
INSERT INTO evento VALUES("60","5","3","Comisión de Normatividad 2018-2018","0","2018-10-01","2019-10-30"):
INSERT INTO evento VALUES("61","6","22","Comité de Seguimiento de recomendaciones","0","2018-01-16","2018-07-15"):
INSERT INTO evento VALUES("62","6","22","Comité Consultivo de Nutrición en el cal","0","2018-01-16","2018-07-15"):
INSERT INTO evento VALUES("63","6","22","Comité de Titulación en la Licenciatura ","0","2018-01-16","2018-07-15"):
INSERT INTO evento VALUES("64","6","22","Comité Curricular Intercentros de la Lic","0","2018-01-16","2018-07-15"):
INSERT INTO evento VALUES("65","6","22","Comité de Reforma Curricular del PE Nutr","0","2018-01-16","2018-07-15"):
INSERT INTO evento VALUES("66","6","22","Consejo Técnico de Tutorias 2018-A","0","2018-01-16","2018-07-15"):
INSERT INTO evento VALUES("67","6","22","Presidente del Comité Consultivo de Nutr","0","2018-01-16","2019-07-15"):
INSERT INTO evento VALUES("68","6","20","Programa de simulación On Campus 2da eta","40","2018-12-03","2018-12-07"):
INSERT INTO evento VALUES("69","6","3","Curso de Nivelación para alumnos que pre","48","2018-08-13","2018-12-20"):
INSERT INTO evento VALUES("70","6","3","Consejo Técnico de Tutorías de CUSUR 201","0","2018-08-13","0000-00-00"):
INSERT INTO evento VALUES("71","6","6","Convenio nacional en materia de práctica","0","2018-01-04","2018-01-04"):
INSERT INTO evento VALUES("72","6","6","Convenio nacional  en materia de práctic","0","2018-01-04","2018-01-04"):
INSERT INTO evento VALUES("73","6","6","Convenio nacional de prácticas profesion","0","2018-01-04","2018-01-04"):
INSERT INTO evento VALUES("74","6","6","Convenio Ncional en materia de prácticas","0","2018-02-27","2018-02-27"):
INSERT INTO evento VALUES("75","6","6","Convenio  Nacional en materia de práctic","0","2018-04-19","2018-04-19"):
INSERT INTO evento VALUES("76","6","6","Gestión del CONVENIO GENERAL ADENDUM AL ","0","2018-10-10","2018-10-10"):
INSERT INTO evento VALUES("77","6","6","Gestión del CONVENIO GENERAL DE COLABORA","0","2018-01-25","2018-01-25"):
INSERT INTO evento VALUES("78","6","6","Gestión de Convenio General de Colaborac","0","2018-02-26","2018-02-26"):
INSERT INTO evento VALUES("79","6","6","Gestión de Convenio Nacional especifico ","0","2018-08-08","2018-08-08"):
INSERT INTO evento VALUES("80","6","20","Cultura Emprendedora Dirigida a Universi","40","2018-12-14","2018-12-14"):
INSERT INTO evento VALUES("81","6","7","Curso Introducción al Aprendizaje de Len","40","2018-01-16","2018-07-15"):
INSERT INTO evento VALUES("82","6","3","Grupo técnico de apoyo para la certifica","0","2017-01-16","2019-07-15"):
INSERT INTO evento VALUES("83","6","3","Trabajo recepcional Las aptitudes y Herr","0","2018-12-31","2018-12-31"):
INSERT INTO evento VALUES("84","6","3","Elaboración del libro del 6° informe de ","0","2019-01-24","2019-01-24"):
INSERT INTO evento VALUES("85","6","3","Elaboración del proyecto integral de las","0","2019-02-07","2019-02-07"):
INSERT INTO evento VALUES("86","6","3","Proyecto integral de las Convocatorias 2","0","2019-02-07","2019-02-07"):
INSERT INTO evento VALUES("87","5","7","Comité Consultivo de la Ing. Sistemas Bi","0","2019-01-01","2021-12-31"):
INSERT INTO evento VALUES("88","5","7","Karina Alarcón Domínguez","0","2019-01-01","2021-12-31"):
INSERT INTO evento VALUES("89","6","30","Día mundial de los humedales 2019 Laguna","25","2019-02-07","2019-02-08"):
INSERT INTO evento VALUES("90","6","30","Celebración del Día Mundial de los Humed","25","2019-02-07","2019-02-08"):
INSERT INTO evento VALUES("91","6","30","Exposición de Artesanías de tule y lirio","25","2019-02-07","2019-02-08"):
INSERT INTO evento VALUES("92","6","30","Organizador en la Celebración del Día Mu","25","2019-02-07","2019-02-08"):
INSERT INTO evento VALUES("94","6","30","Presentación del Documental del Tapeixtl","25","2019-02-07","2019-02-08"):
INSERT INTO evento VALUES("95","6","30","Ponencia Cambio Climático y los humedale","25","2019-02-07","2019-02-08"):
INSERT INTO evento VALUES("96","6","30","Ponencia Grupo Los Cerritos Bajo un cont","25","2019-02-07","2019-02-08"):
INSERT INTO evento VALUES("97","6","30","Ponencia esquemas de Gobernanza para la ","25","2019-02-07","2019-02-08"):
INSERT INTO evento VALUES("98","6","30","Ponencia Ser socialmente responsable es ","25","2019-02-07","2019-02-08"):
INSERT INTO evento VALUES("99","6","14","Ralli de Redes II Jornadas de Ciencias E","0","2019-10-02","2019-10-03"):
INSERT INTO evento VALUES("100","6","2","Curso Publicación de Información y Prote","0","2018-12-10","2018-12-10"):
INSERT INTO evento VALUES("101","6","7","Foro Problemas Sociales en la Región Sur","0","2019-03-15","2019-03-15"):
INSERT INTO evento VALUES("102","6","7","Mesa redonda Experiencias, retos y persp","0","2019-03-14","2019-03-14"):
INSERT INTO evento VALUES("103","6","7","Foro La movilidad estudiantil internacio","0","2019-03-14","2019-03-14"):
INSERT INTO evento VALUES("104","6","7","Conferencia Magistral Las Políticas públ","0","2019-03-15","2019-03-15"):
INSERT INTO evento VALUES("105","6","23","Modificación del Programa de Doctorado e","0","2018-10-28","2018-10-28"):

    /*!40000 ALTER TABLE `evento` ENABLE KEYS */:
    UNLOCK TABLES:



DROP TABLE IF EXISTS instancia:
/*!40101 SET @saved_cs_client     = @@character_set_client */:
/*!40101 SET character_set_client = utf8 */:

CREATE TABLE `instancia` (
  `instancia_id` int(8) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`instancia_id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8:


/*!40101 SET character_set_client = @saved_cs_client */:
LOCK TABLES `instancia` WRITE:
/*!40000 ALTER TABLE `instancia` DISABLE KEYS */:
    INSERT INTO instancia VALUES("28","Centro de Investigación en Biología Molecular de las Enfermedades Crónicas"):
INSERT INTO instancia VALUES("26","Centro de Investigación en Comportamiento Alimentario y Nutrición"):
INSERT INTO instancia VALUES("29","Centro de Investigación en Emprendurismo, Incubación, Consultoría, Asesoría e Innovación"):
INSERT INTO instancia VALUES("31","Centro de Investigación en Riesgos y Calidad de Vida"):
INSERT INTO instancia VALUES("32","Centro de Investigación en Territorio y Ruralidad"):
INSERT INTO instancia VALUES("30","Centro de Investigación Lago de Zapotlán y Cuencas"):
INSERT INTO instancia VALUES("27","Centro de Investigaciones en Abejas"):
INSERT INTO instancia VALUES("7","Coordinación de Carreras"):
INSERT INTO instancia VALUES("12","Coordinación de Control Escolar"):
INSERT INTO instancia VALUES("6","Coordinación de Extensión"):
INSERT INTO instancia VALUES("11","Coordinación de Finanzas"):
INSERT INTO instancia VALUES("9","Coordinación de Investigación y Posgrado"):
INSERT INTO instancia VALUES("13","Coordinación de Personal"):
INSERT INTO instancia VALUES("8","Coordinación de Planeación"):
INSERT INTO instancia VALUES("5","Coordinación de Servicios Académicos"):
INSERT INTO instancia VALUES("10","Coordinación de Servicios Generales"):
INSERT INTO instancia VALUES("4","Coordinación de Tecnologías para el Aprendizaje (CTA)"):
INSERT INTO instancia VALUES("19","Departamento de Artes y Humanidades"):
INSERT INTO instancia VALUES("24","Departamento de Ciencias Básicas para la Salud"):
INSERT INTO instancia VALUES("25","Departamento de Ciencias Clínicas"):
INSERT INTO instancia VALUES("17","Departamento de Ciencias Computacionales e Innovación Tecnológica"):
INSERT INTO instancia VALUES("16","Departamento de Ciencias de la Naturaleza"):
INSERT INTO instancia VALUES("20","Departamento de Ciencias Económicas y Administrativas"):
INSERT INTO instancia VALUES("15","Departamento de Ciencias Exactas y Metodologías"):
INSERT INTO instancia VALUES("21","Departamento de Ciencias Sociales"):
INSERT INTO instancia VALUES("23","Departamento de Promoción, Preservación y Desarrollo de la Salud"):
INSERT INTO instancia VALUES("22","División de Ciencias de la Salud"):
INSERT INTO instancia VALUES("14","División de Ciencias Exactas, Naturales y Tecnológicas"):
INSERT INTO instancia VALUES("18","División de Ciencias Sociales y Humanidades"):
INSERT INTO instancia VALUES("33","Otra"):
INSERT INTO instancia VALUES("1","Rectoría"):
INSERT INTO instancia VALUES("3","Secretaría Académica"):
INSERT INTO instancia VALUES("2","Secretaría Administrativa"):

    /*!40000 ALTER TABLE `instancia` ENABLE KEYS */:
    UNLOCK TABLES:



DROP TABLE IF EXISTS tipo_evento:
/*!40101 SET @saved_cs_client     = @@character_set_client */:
/*!40101 SET character_set_client = utf8 */:

CREATE TABLE `tipo_evento` (
  `tipo_evento_id` int(8) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  PRIMARY KEY (`tipo_evento_id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8:


/*!40101 SET character_set_client = @saved_cs_client */:
LOCK TABLES `tipo_evento` WRITE:
/*!40000 ALTER TABLE `tipo_evento` DISABLE KEYS */:
    INSERT INTO tipo_evento VALUES("6","Constancia"):
INSERT INTO tipo_evento VALUES("1","Curso"):
INSERT INTO tipo_evento VALUES("3","Diplomado"):
INSERT INTO tipo_evento VALUES("5","Nombramiento"):
INSERT INTO tipo_evento VALUES("4","Otro"):
INSERT INTO tipo_evento VALUES("2","Taller"):

    /*!40000 ALTER TABLE `tipo_evento` ENABLE KEYS */:
    UNLOCK TABLES:



DROP TABLE IF EXISTS usuario:
/*!40101 SET @saved_cs_client     = @@character_set_client */:
/*!40101 SET character_set_client = utf8 */:

CREATE TABLE `usuario` (
  `usuario_id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(254) DEFAULT NULL,
  `tipo_usuario` int(1) NOT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8:


/*!40101 SET character_set_client = @saved_cs_client */:
LOCK TABLES `usuario` WRITE:
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */:
    INSERT INTO usuario VALUES("1","admin","123","email@gmail.com","0"):
INSERT INTO usuario VALUES("2","raqueg","guerrero","raquel.guerrero@cusur.udg.mx","0"):
INSERT INTO usuario VALUES("3","denisl","lopez","denis.lopez@cusur.udg.mx","0"):
INSERT INTO usuario VALUES("4","dianaj","juarez","diana.juarez@cusur.udg.mx","0"):

    /*!40000 ALTER TABLE `usuario` ENABLE KEYS */:
    UNLOCK TABLES:





CREATE PROCEDURE crear_usuario(
  IN _username varchar(40),
     _password varchar(40),
     _email varchar(254),
     _tipo_usuario int(1),
  OUT _salida int
)
BEGIN
  INSERT INTO usuario (username, password, email, tipo_usuario)
    VALUES (_username, _password, _email, _tipo_usuario);
  SET _salida = LAST_INSERT_ID();
END :

CREATE PROCEDURE crear_cursante(
  IN _codigo varchar(20),
     _nombre varchar(60),
  OUT _salida varchar(20)
)
BEGIN
  DECLARE contador INT DEFAULT 0;

  IF TRIM(_codigo) = '0' THEN
    INSERT INTO cursante VALUES (default, 'Externo', _nombre);
    SET _salida = LAST_INSERT_ID();
  ELSE
    SELECT COUNT(*) INTO contador FROM cursante WHERE UPPER(codigo) = UPPER(_codigo);
    IF contador > 0 THEN
      SELECT cursante_id INTO _salida FROM cursante WHERE UPPER(codigo) = UPPER(_codigo);
    ELSE
      INSERT INTO cursante VALUES (default, _codigo, _nombre);
      SET _salida = LAST_INSERT_ID();
    END IF;
  END IF;
END :

CREATE PROCEDURE crear_tipo_evento(
  IN _nombre varchar(40),
  OUT _salida int(8)
)
BEGIN
  INSERT INTO tipo_evento (nombre) VALUES (_nombre);
  SET _salida = LAST_INSERT_ID();
END :

CREATE PROCEDURE crear_evento(
  IN _tipo_evento int(8),
     _instancia int(8),
     _nombre varchar(40),
     _duracion int(5),
     _fecha_inicio date,
     _fecha_fin date,
  OUT _salida int(8)
)
BEGIN
  DECLARE cantidad_columnas int;

  SELECT COUNT(*) INTO cantidad_columnas FROM evento
    WHERE UPPER(TRIM(_nombre)) = UPPER(TRIM(nombre));

  IF cantidad_columnas = 0 THEN
      INSERT INTO evento (tipo_evento, nombre, duracion, fecha_inicio, fecha_fin,
        instancia) VALUES (_tipo_evento, _nombre, _duracion, _fecha_inicio,
        _fecha_fin, _instancia);
  END IF;

  SELECT evento_id INTO _salida FROM evento
    WHERE UPPER(TRIM(_nombre)) = UPPER(TRIM(nombre));
END :

CREATE PROCEDURE crear_constancia(
  IN _evento int(8),
     _cursante varchar(20),
     _fecha_emision date,
     _comentario varchar(255),
  OUT _salida int
)
BEGIN
  INSERT INTO constancia (evento, cursante, fecha_emision, comentario)
    VALUES (_evento, _cursante, _fecha_emision, _comentario);
  SET _salida = LAST_INSERT_ID();
END :

CREATE PROCEDURE borrar_usuario(
  IN _usuario_id int(8)
)
BEGIN
  DELETE FROM usuario WHERE usuario_id = _usuario_id;
END :

CREATE PROCEDURE borrar_cursante(
  IN _codigo varchar(20)
)
BEGIN
  DELETE FROM cursante WHERE codigo = _codigo;
END :

CREATE PROCEDURE borrar_tipo_evento(
  IN _tipo_evento_id int(8)
)
BEGIN
  DELETE FROM tipo_evento WHERE tipo_evento_id = _tipo_evento_id;
END :

CREATE PROCEDURE borrar_evento(
  IN _evento_id int(8)
)
BEGIN
  DELETE FROM evento WHERE evento_id = _evento_id;
END :

CREATE PROCEDURE borrar_constancias(
  IN _folio int(8)
)
BEGIN
  DELETE FROM constancia WHERE folio = _folio;
END :

CREATE PROCEDURE actualizar_usuario(
  IN _usuario_id int(8),
     _username varchar(40),
     _password varchar(40),
     _email varchar(254),
     _tipo_usuario int(1)
)
BEGIN
  UPDATE usuario SET username =  _username, password = _password,
   email = _email, tipo_usuario = _tipo_usuario WHERE usuario_id = _usuario_id;
END :

CREATE PROCEDURE actualizar_cursante(
  IN _codigo varchar(20),
     _nombre varchar(40)
)
BEGIN
  UPDATE cursante SET nombre =  _nombre WHERE codigo = _codigo;
END :

CREATE PROCEDURE actualizar_tipo_evento(
  IN _tipo_evento_id int(8),
     _nombre varchar(40)
)
BEGIN
  UPDATE tipo_evento SET nombre =  _nombre WHERE tipo_evento_id = _tipo_evento_id;
END :

CREATE PROCEDURE actualizar_evento(
  IN _evento_id int(8),
     _tipo_evento int(8),
     _instancia int(8),
     _nombre varchar(40),
     _duracion int(5),
     _fecha_inicio date,
     _fecha_fin date
)
BEGIN
  UPDATE evento SET tipo_evento = _tipo_evento_id, nombre = _nombre,
    duracion = _duracion, fecha_inicio = _fecha_inicio, fecha_fin = _fecha_fin,
    instancia = _instancia WHERE evento_id = _evento_id;
END :

CREATE PROCEDURE actualizar_constancia(
  IN _folio int(8),
     _evento int(8),
     _cursante varchar(20),
     _fecha_emision date,
     _comentario varchar(255)
)
BEGIN
  UPDATE evento SET evento = _evento, cursante = _cursante,
    fecha_emision = _fecha_emision, comentario = _comentario WHERE folio = _folio;
END :

CREATE PROCEDURE leer_usuario(
  IN _usuario_id int(8),
  OUT _username varchar(40),
      _password varchar(40),
      _email varchar(254),
      _tipo_usuario int(1)
)
BEGIN
  SELECT username, password, email, tipo_usuario INTO _username, _password, _email,
    _tipo_usuario FROM usuario WHERE usuario_id = _usuario_id;
END :

CREATE PROCEDURE leer_cursante(
  IN _codigo varchar(20),
  OUT _nombre varchar(60)
)
BEGIN
  SELECT nombre INTO _nombre FROM cursante WHERE codigo = _codigo;
END :


CREATE PROCEDURE leer_tipo_evento(
  IN _tipo_evento_id int(8),
  OUT _nombre varchar(60)
)
BEGIN
  SELECT nombre INTO _nombre FROM tipo_evento WHERE tipo_evento_id = _tipo_evento_id;
END :

CREATE PROCEDURE leer_evento(
  IN _evento_id int(8),
  OUT _tipo_evento int(8),
      _instancia int(8),
      _nombre varchar(40),
      _duracion int(5),
      _fecha_inicio date,
      _fecha_fin date
)
BEGIN
  SELECT tipo_evento, instancia, nombre, duracion, fecha_inicio, fecha_fin
    INTO _tipo_evento, _instancia, _nombre, _duracion, _fecha_inicio, _fecha_fin
    FROM evento WHERE evento_id = _evento_id;
END :

CREATE PROCEDURE leer_constancia(
  IN _folio int(8),
  OUT _evento int(8),
      _cursante varchar(20),
      _fecha_emision date,
      _comentario varchar(255)
)
BEGIN
  SELECT evento, cursante, fecha_emision, comentario INTO _evento, _cursante,
    _fecha_emision, _comentario FROM evento WHERE folio = _folio;
END :


CREATE PROCEDURE formulario(
  IN _codigo varchar(20),
     _nombre_cursante varchar(60),
     _nombre_evento varchar(40),
     _tipo_evento_id int(8),
     _instancia_id int(8),
     _duracion int(5),
     _fecha_inicio date,
     _fecha_fin date,
     _fecha_emision date,
     _comentario varchar(255),
  OUT _salida int
)
BEGIN
  DECLARE _salida_cursante int;
  DECLARE _salida_evento int;

  CALL crear_cursante(_codigo, _nombre_cursante, _salida_cursante);
  CALL crear_evento(_tipo_evento_id, _instancia_id, _nombre_evento, _duracion,
    _fecha_inicio, _fecha_fin, _salida_evento);
  CALL crear_constancia(_salida_evento, _salida_cursante, _fecha_emision,
    _comentario, _salida);
END :

CALL crear_usuario('admin', '123', 'email@gmail.com', 0, @out):

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

