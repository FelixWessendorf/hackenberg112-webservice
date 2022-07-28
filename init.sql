CREATE TABLE `appointment`
(
    `appointment_id`         mediumint(6) UNSIGNED ZEROFILL NOT NULL,
    `start`                  datetime     NOT NULL,
    `end`                    datetime     DEFAULT NULL,
    `description`            varchar(255) NOT NULL,
    `location`               varchar(255) DEFAULT NULL,
    `additional_information` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `monthly_service`
(
    `month`     mediumint(6) UNSIGNED NOT NULL,
    `person_id` smallint(4) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `operation`
(
    `operation_id` mediumint(6) UNSIGNED ZEROFILL NOT NULL,
    `date`         date         NOT NULL,
    `description`  varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `person`
(
    `person_id`      smallint(4) UNSIGNED ZEROFILL NOT NULL,
    `sex`            enum('m','f') NOT NULL,
    `first_name`     varchar(255) NOT NULL,
    `last_name`      varchar(255) NOT NULL,
    `e_mail_address` varchar(255) DEFAULT NULL,
    `date_of_birth`  date         DEFAULT NULL,
    `date_of_entry`  date         DEFAULT NULL,
    `rank_id`        tinyint(2) UNSIGNED ZEROFILL NOT NULL,
    `active`         tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `person_has_qualification`
(
    `person_id`        smallint(4) UNSIGNED ZEROFILL NOT NULL,
    `qualification_id` tinyint(2) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `person_in_charge_for_appointment`
(
    `appointment_id` mediumint(6) UNSIGNED ZEROFILL NOT NULL,
    `person_id`      smallint(4) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `qualification`
(
    `qualification_id` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
    `name`             varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `qualification` (`qualification_id`, `name`)
VALUES (01, 'Maschinist'),
       (02, 'Drehleitermaschinist'),
       (03, 'Führerschein C'),
       (04, 'Führerschein CE'),
       (05, 'Atemschutz'),
       (06, 'Absturzsicherung'),
       (07, 'Sprechfunker'),
       (08, 'ABC'),
       (09, 'Motorsäge'),
       (10, 'Gerätewart'),
       (11, 'Technische Hilfeleistung'),
       (12, 'Gefährliche Stoffe und Güter'),
       (13, 'Feldkochherd'),
       (14, 'Truppführer Feldkochherd'),
       (15, 'Wasserförderung über weite Wege'),
       (16, 'Sanitäter');

CREATE TABLE `rank`
(
    `rank_id` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
    `name`    varchar(255) NOT NULL,
    `sort`    tinyint(4) NOT NULL,
    `sex`     char(2)      NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `rank` (`rank_id`, `name`, `sort`, `sex`)
VALUES (01, 'Feuerwehrmann-Anwärter', 1, 'm'),
       (02, 'Feuerwehrmann', 2, 'm'),
       (03, 'Oberfeuerwehrmann', 3, 'm'),
       (04, 'Hauptfeuerwehrmann', 4, 'm'),
       (05, 'Unterbrandmeister', 5, 'm'),
       (06, 'Brandmeister', 6, 'm'),
       (07, 'Oberbrandmeister', 7, 'm'),
       (08, 'Hauptbrandmeister', 8, 'm'),
       (09, 'Brandinspektor', 9, 'm'),
       (10, 'Brandoberinspektor', 10, 'm'),
       (11, 'Stadtbrandinspektor', 11, 'm'),
       (12, 'Fachberater', 0, 'm'),
       (13, 'Feuerwehrfrau-Anwärterin', 1, 'f'),
       (14, 'Feuerwehrfrau', 2, 'f'),
       (15, 'Oberfeuerwehrfrau', 3, 'f'),
       (16, 'Hauptfeuerwehrfrau', 4, 'f'),
       (17, 'Unterbrandmeisterin', 5, 'f'),
       (18, 'Brandmeisterin', 6, 'f'),
       (19, 'Oberbrandmeisterin', 7, 'f'),
       (20, 'Hauptbrandmeisterin', 8, 'f'),
       (21, 'Brandinspektorin', 9, 'f'),
       (22, 'Brandoberinspektorin', 10, 'f'),
       (23, 'Stadtbrandinspektorin', 11, 'f'),
       (24, 'Fachberaterin', 0, 'f');

ALTER TABLE `appointment`
    ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `start_end_idx` (`start`,`end`);

ALTER TABLE `monthly_service`
    ADD PRIMARY KEY (`month`,`person_id`),
  ADD KEY `fk_person_idx` (`person_id`),
  ADD KEY `month_idx` (`month`);

ALTER TABLE `operation`
    ADD PRIMARY KEY (`operation_id`),
  ADD KEY `date_idx` (`date`);

ALTER TABLE `person`
    ADD PRIMARY KEY (`person_id`),
  ADD KEY `fk_rank_idx` (`rank_id`);

ALTER TABLE `person_has_qualification`
    ADD PRIMARY KEY (`person_id`,`qualification_id`),
  ADD KEY `fk_qualification_idx` (`qualification_id`),
  ADD KEY `fk_person_idx` (`person_id`),
  ADD KEY `fk_person_has_qualification_person_idx` (`person_id`),
  ADD KEY `fk_person_has_qualification_1_idx` (`qualification_id`);

ALTER TABLE `person_in_charge_for_appointment`
    ADD PRIMARY KEY (`appointment_id`,`person_id`),
  ADD KEY `fk_person_idx` (`person_id`),
  ADD KEY `fk_appointment_idx` (`appointment_id`);

ALTER TABLE `qualification`
    ADD PRIMARY KEY (`qualification_id`);

ALTER TABLE `rank`
    ADD PRIMARY KEY (`rank_id`);

ALTER TABLE `appointment`
    MODIFY `appointment_id` mediumint(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

ALTER TABLE `operation`
    MODIFY `operation_id` mediumint(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

ALTER TABLE `person`
    MODIFY `person_id` smallint(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

ALTER TABLE `qualification`
    MODIFY `qualification_id` tinyint(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

ALTER TABLE `rank`
    MODIFY `rank_id` tinyint(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

ALTER TABLE `monthly_service`
    ADD CONSTRAINT `fk_monthly_service_person` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `person`
    ADD CONSTRAINT `fk_rank_id` FOREIGN KEY (`rank_id`) REFERENCES `rank` (`rank_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `person_has_qualification`
    ADD CONSTRAINT `fk_person_has_qualification_person` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_person_has_qualification_qualification` FOREIGN KEY (`qualification_id`) REFERENCES `qualification` (`qualification_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `person_in_charge_for_appointment`
    ADD CONSTRAINT `fk_appointment_has_person_appointment1` FOREIGN KEY (`appointment_id`) REFERENCES `appointment` (`appointment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_appointment_has_person_person1` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

