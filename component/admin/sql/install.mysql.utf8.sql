CREATE TABLE IF NOT EXISTS `#__rotator_blocks`
(
  `id`           INT(11)             NOT NULL AUTO_INCREMENT,
  `catid`        INT(11)             NOT NULL DEFAULT '0',
  `title`        TEXT                NOT NULL,
  `description`  TEXT                NOT NULL,
  `content`      TEXT                NOT NULL,
  `params`       TEXT                NOT NULL,
  `published`    TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
  `created_by`   INT(11)             NOT NULL DEFAULT 0,
  `created`      TIMESTAMP                    DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `#__rotator_bookmarks`;

CREATE TABLE IF NOT EXISTS `#__rotator_bookmarks` (
  `id`            INT(11)      NOT NULL
  COMMENT 'The module id',
  `last_id`       MEDIUMINT(9) NOT NULL DEFAULT '0',
  `date_modified` MEDIUMINT(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8;
