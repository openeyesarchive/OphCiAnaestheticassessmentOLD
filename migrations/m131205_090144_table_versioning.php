<?php

class m131205_090144_table_versioning extends CDbMigration
{
	public function up()
	{
		$this->execute("
CREATE TABLE `et_ophcianaestheticassessmen_asa_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `asa_grade_id` int(10) unsigned NOT NULL,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophcianaestheticassessmen_asa_lmui_fk` (`last_modified_user_id`),
  KEY `acv_et_ophcianaestheticassessmen_asa_cui_fk` (`created_user_id`),
  KEY `acv_et_ophcianaestheticassessmen_asa_ev_fk` (`event_id`),
  KEY `acv_ophcianaestheticassessmen_asa_asa_grade_fk` (`asa_grade_id`),
  CONSTRAINT `acv_et_ophcianaestheticassessmen_asa_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcianaestheticassessmen_asa_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcianaestheticassessmen_asa_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `acv_ophcianaestheticassessmen_asa_asa_grade_fk` FOREIGN KEY (`asa_grade_id`) REFERENCES `ophcianaestheticassessmen_asa_asa_grade` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcianaestheticassessmen_asa_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcianaestheticassessmen_asa_version');

		$this->createIndex('et_ophcianaestheticassessmen_asa_aid_fk','et_ophcianaestheticassessmen_asa_version','id');
		$this->addForeignKey('et_ophcianaestheticassessmen_asa_aid_fk','et_ophcianaestheticassessmen_asa_version','id','et_ophcianaestheticassessmen_asa','id');

		$this->addColumn('et_ophcianaestheticassessmen_asa_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcianaestheticassessmen_asa_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcianaestheticassessmen_asa_version','version_id');
		$this->alterColumn('et_ophcianaestheticassessmen_asa_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcianaestheticassessmen_examination_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `blood_pressure1` varchar(3) COLLATE utf8_bin DEFAULT '',
  `blood_pressure2` varchar(2) COLLATE utf8_bin DEFAULT '',
  `rbs` varchar(255) COLLATE utf8_bin DEFAULT '',
  `sao2` varchar(255) COLLATE utf8_bin DEFAULT '',
  `temp` varchar(255) COLLATE utf8_bin DEFAULT '',
  `pulse` varchar(255) COLLATE utf8_bin DEFAULT '',
  `eyedraw` text COLLATE utf8_bin,
  `lung` text COLLATE utf8_bin,
  `heart` text COLLATE utf8_bin,
  `investigations` text COLLATE utf8_bin,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophcianaestheticassessmen_examination_lmui_fk` (`last_modified_user_id`),
  KEY `acv_et_ophcianaestheticassessmen_examination_cui_fk` (`created_user_id`),
  KEY `acv_et_ophcianaestheticassessmen_examination_ev_fk` (`event_id`),
  CONSTRAINT `acv_et_ophcianaestheticassessmen_examination_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcianaestheticassessmen_examination_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcianaestheticassessmen_examination_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcianaestheticassessmen_examination_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcianaestheticassessmen_examination_version');

		$this->createIndex('et_ophcianaestheticassessmen_examination_aid_fk','et_ophcianaestheticassessmen_examination_version','id');
		$this->addForeignKey('et_ophcianaestheticassessmen_examination_aid_fk','et_ophcianaestheticassessmen_examination_version','id','et_ophcianaestheticassessmen_examination','id');

		$this->addColumn('et_ophcianaestheticassessmen_examination_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcianaestheticassessmen_examination_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcianaestheticassessmen_examination_version','version_id');
		$this->alterColumn('et_ophcianaestheticassessmen_examination_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcianaestheticassessmen_history_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `medical_history` text COLLATE utf8_bin,
  `allergies` text COLLATE utf8_bin,
  `iodine` tinyint(1) unsigned NOT NULL,
  `latex` tinyint(1) unsigned NOT NULL,
  `previous_surgical_procedures` text COLLATE utf8_bin,
  `previous_anaesthesia_problems` tinyint(1) unsigned NOT NULL,
  `anaesthesia_problems` text COLLATE utf8_bin,
  `system_review` text COLLATE utf8_bin,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophcianaestheticassessmen_history_lmui_fk` (`last_modified_user_id`),
  KEY `acv_et_ophcianaestheticassessmen_history_cui_fk` (`created_user_id`),
  KEY `acv_et_ophcianaestheticassessmen_history_ev_fk` (`event_id`),
  CONSTRAINT `acv_et_ophcianaestheticassessmen_history_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcianaestheticassessmen_history_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcianaestheticassessmen_history_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcianaestheticassessmen_history_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcianaestheticassessmen_history_version');

		$this->createIndex('et_ophcianaestheticassessmen_history_aid_fk','et_ophcianaestheticassessmen_history_version','id');
		$this->addForeignKey('et_ophcianaestheticassessmen_history_aid_fk','et_ophcianaestheticassessmen_history_version','id','et_ophcianaestheticassessmen_history','id');

		$this->addColumn('et_ophcianaestheticassessmen_history_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcianaestheticassessmen_history_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcianaestheticassessmen_history_version','version_id');
		$this->alterColumn('et_ophcianaestheticassessmen_history_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophcianaestheticassessmen_asa_asa_grade_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `display_order` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_ophcianaestheticassessmen_asa_asa_grade_lmui_fk` (`last_modified_user_id`),
  KEY `acv_ophcianaestheticassessmen_asa_asa_grade_cui_fk` (`created_user_id`),
  CONSTRAINT `acv_ophcianaestheticassessmen_asa_asa_grade_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_ophcianaestheticassessmen_asa_asa_grade_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophcianaestheticassessmen_asa_asa_grade_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophcianaestheticassessmen_asa_asa_grade_version');

		$this->createIndex('ophcianaestheticassessmen_asa_asa_grade_aid_fk','ophcianaestheticassessmen_asa_asa_grade_version','id');
		$this->addForeignKey('ophcianaestheticassessmen_asa_asa_grade_aid_fk','ophcianaestheticassessmen_asa_asa_grade_version','id','ophcianaestheticassessmen_asa_asa_grade','id');

		$this->addColumn('ophcianaestheticassessmen_asa_asa_grade_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophcianaestheticassessmen_asa_asa_grade_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophcianaestheticassessmen_asa_asa_grade_version','version_id');
		$this->alterColumn('ophcianaestheticassessmen_asa_asa_grade_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');
	}

	public function down()
	{
		$this->dropTable('et_ophcianaestheticassessmen_asa_version');
		$this->dropTable('et_ophcianaestheticassessmen_examination_version');
		$this->dropTable('et_ophcianaestheticassessmen_history_version');
		$this->dropTable('ophcianaestheticassessmen_asa_asa_grade_version');
	}
}