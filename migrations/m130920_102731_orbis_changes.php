<?php

class m130920_102731_orbis_changes extends OEMigration
{
	public function up()
	{
		$event_type = Yii::app()->db->createCommand()->select("*")->from("event_type")->where("class_name = :class_name",array(":class_name"=>"OphCiAnaestheticassessment"))->queryRow();
		$this->insert('element_type',array('event_type_id'=>$event_type['id'],'class_name'=>'Element_OphCiAnaestheticassessment_AnaestheticHistory','name'=>'Anaesthetic history','display_order'=>10,'default'=>1,'required'=>1));

		$this->createTable('ophcianaestheticassessment_anaesthetichistory_smoking_how_much', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(64) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianaestheticassessment_anaesthetichistory_shm_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianaestheticassessment_anaesthetichistory_shm_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianaestheticassessment_anaesthetichistory_shm_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianaestheticassessment_anaesthetichistory_shm_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcianaestheticassessment_anaesthetichistory_drinking_how_much', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(64) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianaestheticassessment_anaesthetichistory_dhm_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianaestheticassessment_anaesthetichistory_dhm_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianaestheticassessment_anaesthetichistory_dhm_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianaestheticassessment_anaesthetichistory_dhm_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophcianaestheticassessment_anaesthetichistory', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'previous_problems' => 'text COLLATE utf8_bin NOT NULL',
				'post_operative_nausea' => 'text COLLATE utf8_bin NOT NULL',
				'pain' => 'text COLLATE utf8_bin NOT NULL',
				'cns' => 'text COLLATE utf8_bin NOT NULL',
				'cardiovascular' => 'text COLLATE utf8_bin NOT NULL',
				'respiratory' => 'text COLLATE utf8_bin NOT NULL',
				'smoking' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'smoking_how_much_id' => 'int(10) unsigned NULL',
				'drinking' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'drinking_how_much_id' => 'int(10) unsigned NULL',
				'gi' => 'text COLLATE utf8_bin NOT NULL',
				'gu' => 'text COLLATE utf8_bin NOT NULL',
				'endocrine' => 'text COLLATE utf8_bin NOT NULL',
				'musculoskeletal' => 'text COLLATE utf8_bin NOT NULL',
				'falls_mobility_risk' => 'tinyint(1) unsigned NOT NULL',
				'pregnant_menstrual_period' => 'text COLLATE utf8_bin NOT NULL',
				'anaesthesia_reviewed' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcianaestheticassessmen_anaesthetichistory_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcianaestheticassessmen_anaesthetichistory_cui_fk` (`created_user_id`)',
				'KEY `et_ophcianaestheticassessmen_anaesthetichistory_ev_fk` (`event_id`)',
				'KEY `et_ophcianaestheticassessmen_anaesthetichistory_shmi_fk` (`smoking_how_much_id`)',
				'KEY `et_ophcianaestheticassessmen_anaesthetichistory_dhmi_fk` (`drinking_how_much_id`)',
				'CONSTRAINT `et_ophcianaestheticassessmen_anaesthetichistory_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianaestheticassessmen_anaesthetichistory_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianaestheticassessmen_anaesthetichistory_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `et_ophcianaestheticassessmen_anaesthetichistory_shmi_fk` FOREIGN KEY (`smoking_how_much_id`) REFERENCES `ophcianaestheticassessment_anaesthetichistory_smoking_how_much` (`id`)',
				'CONSTRAINT `et_ophcianaestheticassessmen_anaesthetichistory_dhmi_fk` FOREIGN KEY (`drinking_how_much_id`) REFERENCES `ophcianaestheticassessment_anaesthetichistory_drinking_how_much` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->update('element_type',array('display_order'=>20),"event_type_id = {$event_type['id']} and class_name = 'Element_OphCiAnaestheticassessment_Examination'");

		$this->dropColumn('et_ophcianaestheticassessmen_examination','rbs');
		$this->dropColumn('et_ophcianaestheticassessmen_examination','investigations');

		$this->addColumn('et_ophcianaestheticassessmen_examination','airway_class','varchar(2048) COLLATE utf8_bin NOT NULL');
		$this->addColumn('et_ophcianaestheticassessmen_examination','loose_teeth','varchar(2048) COLLATE utf8_bin NOT NULL');
		$this->addColumn('et_ophcianaestheticassessmen_examination','abdominal_palpation','varchar(2048) COLLATE utf8_bin NOT NULL');

		$this->insert('element_type',array('event_type_id'=>$event_type['id'],'class_name'=>'Element_OphCiAnaestheticassessment_AnaestheticPlan','name'=>'Anaesthetic plan','display_order'=>30,'default'=>1,'required'=>1));

		$this->createTable('ophcianaestheticassessment_anaestheticplan_asa_grade', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(64) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianaestheticassessment_anaestheticplan_asa_grade_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianaestheticassessment_anaestheticplan_asa_grade_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianaestheticassessment_anaestheticplan_asa_grade_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianaestheticassessment_anaestheticplan_asa_grade_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophcianaestheticassessment_anaestheticplan', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'asa_grade_id' => 'int(10) unsigned NOT NULL',
				'plan' => 'varchar(2048) COLLATE utf8_bin NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcianaestheticassessmen_anaestheticplan_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcianaestheticassessmen_anaestheticplan_cui_fk` (`created_user_id`)',
				'KEY `et_ophcianaestheticassessmen_anaestheticplan_ev_fk` (`event_id`)',
				'KEY `et_ophcianaestheticassessmen_anaestheticplan_agi_fk` (`asa_grade_id`)',
				'CONSTRAINT `et_ophcianaestheticassessmen_anaestheticplan_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianaestheticassessmen_anaestheticplan_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianaestheticassessmen_anaestheticplan_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `et_ophcianaestheticassessmen_anaestheticplan_agi_fk` FOREIGN KEY (`asa_grade_id`) REFERENCES `ophcianaestheticassessment_anaestheticplan_asa_grade` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->delete('element_type',"event_type_id={$event_type['id']} and class_name = 'Element_OphCiAnaestheticassessment_History'");
		$this->delete('element_type',"event_type_id={$event_type['id']} and class_name = 'Element_OphCiAnaestheticassessment_Asa'");

		$this->dropTable('et_ophcianaestheticassessmen_asa');
		$this->dropTable('et_ophcianaestheticassessmen_history');
		$this->dropTable('ophcianaestheticassessmen_asa_asa_grade');

		$this->initialiseData(dirname(__FILE__));
	}

	public function down()
	{
		$event_type = Yii::app()->db->createCommand()->select("*")->from("event_type")->where("class_name = :class_name",array(":class_name"=>"OphCiAnaestheticassessment"))->queryRow();

		$this->insert('element_type', array('name' => 'History','class_name' => 'Element_OphCiAnaestheticassessment_History', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		$this->insert('element_type', array('name' => '3.ASA','class_name' => 'Element_OphCiAnaestheticassessment_Asa', 'event_type_id' => $event_type['id'], 'display_order' => 1));

		$this->createTable('et_ophcianaestheticassessmen_history', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'medical_history' => 'text COLLATE utf8_bin DEFAULT \'\'',
				'allergies' => 'text COLLATE utf8_bin DEFAULT \'\'',
				'iodine' => 'tinyint(1) unsigned NOT NULL',
				'latex' => 'tinyint(1) unsigned NOT NULL',
				'previous_surgical_procedures' => 'text COLLATE utf8_bin DEFAULT \'\'',
				'previous_anaesthesia_problems' => 'tinyint(1) unsigned NOT NULL',
				'anaesthesia_problems' => 'text COLLATE utf8_bin DEFAULT \'\'',
				'system_review' => 'text COLLATE utf8_bin DEFAULT \'\'',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcianaestheticassessmen_history_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcianaestheticassessmen_history_cui_fk` (`created_user_id`)',
				'KEY `et_ophcianaestheticassessmen_history_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophcianaestheticassessmen_history_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianaestheticassessmen_history_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianaestheticassessmen_history_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcianaestheticassessmen_asa_asa_grade', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianaestheticassessmen_asa_asa_grade_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianaestheticassessmen_asa_asa_grade_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianaestheticassessmen_asa_asa_grade_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianaestheticassessmen_asa_asa_grade_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianaestheticassessmen_asa_asa_grade',array('name'=>'I','display_order'=>1));
		$this->insert('ophcianaestheticassessmen_asa_asa_grade',array('name'=>'II','display_order'=>2));
		$this->insert('ophcianaestheticassessmen_asa_asa_grade',array('name'=>'III','display_order'=>3));
		$this->insert('ophcianaestheticassessmen_asa_asa_grade',array('name'=>'IV','display_order'=>4));

		$this->createTable('et_ophcianaestheticassessmen_asa', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'asa_grade_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcianaestheticassessmen_asa_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcianaestheticassessmen_asa_cui_fk` (`created_user_id`)',
				'KEY `et_ophcianaestheticassessmen_asa_ev_fk` (`event_id`)',
				'KEY `ophcianaestheticassessmen_asa_asa_grade_fk` (`asa_grade_id`)',
				'CONSTRAINT `et_ophcianaestheticassessmen_asa_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianaestheticassessmen_asa_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianaestheticassessmen_asa_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophcianaestheticassessmen_asa_asa_grade_fk` FOREIGN KEY (`asa_grade_id`) REFERENCES `ophcianaestheticassessmen_asa_asa_grade` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->dropTable('et_ophcianaestheticassessment_anaestheticplan');
		$this->dropTable('ophcianaestheticassessment_anaestheticplan_asa_grade');

		$this->delete('element_type',"event_type_id={$event_type['id']} and class_name = 'Element_OphCiAnaestheticassessment_AnaestheticPlan'");

		$this->dropColumn('et_ophcianaestheticassessmen_examination','abdominal_palpation');
		$this->dropColumn('et_ophcianaestheticassessmen_examination','loose_teeth');
		$this->dropColumn('et_ophcianaestheticassessmen_examination','airway_class');

		$this->addColumn('et_ophcianaestheticassessmen_examination','rbs',"varchar(255) COLLATE utf8_bin DEFAULT ''");
		$this->addColumn('et_ophcianaestheticassessmen_examination','investigations',"varchar(255) COLLATE utf8_bin DEFAULT ''");

		$this->update('element_type',array('display_order'=>1),"event_type_id = {$event_type['id']} and class_name = 'Element_OphCiAnaestheticassessment_Examination'");

		$this->dropTable('et_ophcianaestheticassessment_anaesthetichistory');
		$this->dropTable('ophcianaestheticassessment_anaesthetichistory_drinking_how_much');
		$this->dropTable('ophcianaestheticassessment_anaesthetichistory_smoking_how_much');

		$this->delete('element_type',"event_type_id={$event_type['id']} and class_name = 'Element_OphCiAnaestheticassessment_AnaestheticHistory'");
	}
}
