DROP TABLE IF EXISTS `packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE packages (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(50),
    description text,
    upload  VARCHAR(50) DEFAULT NULL,
    download VARCHAR(50) DEFAULT NULL,
    volume   BIGINT DEFAULT NULL,
    created  DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);
