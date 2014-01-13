<?php 
class m130402_092533_event_type_OphCiAnaestheticassessment extends CDbMigration
{
	public function up() {

		// --- EVENT TYPE ENTRIES ---

		// create an event_type entry for this event type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphCiAnaestheticassessment'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Clinical events'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphCiAnaestheticassessment', 'name' => 'Anaesthetic Assessment','event_group_id' => $group['id']));
		}
		// select the event_type id for this event type name
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphCiAnaestheticassessment'))->queryRow();

		// --- ELEMENT TYPE ENTRIES ---

		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'History',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'History','class_name' => 'Element_OphCiAnaestheticassessment_History', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'History'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Examination',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Examination','class_name' => 'Element_OphCiAnaestheticassessment_Examination', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Examination'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'3.ASA',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => '3.ASA','class_name' => 'Element_OphCiAnaestheticassessment_Asa', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'ASA'))->queryRow();



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophcianaestheticassessmen_history', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'medical_history' => 'text DEFAULT \'\'', // Medical history
				'allergies' => 'text DEFAULT \'\'', // Allergies
				'iodine' => 'tinyint(1) unsigned NOT NULL', // Iodine
				'latex' => 'tinyint(1) unsigned NOT NULL', // Latex
				'previous_surgical_procedures' => 'text DEFAULT \'\'', // Previous surgical procedures
				'previous_anaesthesia_problems' => 'tinyint(1) unsigned NOT NULL', // Previous anaesthesia problems
				'anaesthesia_problems' => 'text DEFAULT \'\'', // Anaesthesia problems
				'system_review' => 'text DEFAULT \'\'', // System review
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
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophcianaestheticassessmen_examination', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'blood_pressure1' => 'varchar(3) DEFAULT \'\'', // Blood pressure
				'blood_pressure2' => 'varchar(2) DEFAULT \'\'', // Blood pressure
				'rbs' => 'varchar(255) DEFAULT \'\'', // RBS
				'sao2' => 'varchar(255) DEFAULT \'\'', // SaO2
				'temp' => 'varchar(255) DEFAULT \'\'', // Temp
				'pulse' => 'varchar(255) DEFAULT \'\'', // Pulse
				'eyedraw' => 'text DEFAULT \'\'', // Lung eyedraw
				'lung' => 'text DEFAULT \'\'', // Lung
				'heart' => 'text DEFAULT \'\'', // Heart
				'investigations' => 'text DEFAULT \'\'', // Investigations
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcianaestheticassessmen_examination_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcianaestheticassessmen_examination_cui_fk` (`created_user_id`)',
				'KEY `et_ophcianaestheticassessmen_examination_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophcianaestheticassessmen_examination_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianaestheticassessmen_examination_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianaestheticassessmen_examination_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		// element lookup table ophcianaestheticassessmen_asa_asa_grade
		$this->createTable('ophcianaestheticassessmen_asa_asa_grade', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) NOT NULL',
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
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->insert('ophcianaestheticassessmen_asa_asa_grade',array('name'=>'I','display_order'=>1));
		$this->insert('ophcianaestheticassessmen_asa_asa_grade',array('name'=>'II','display_order'=>2));
		$this->insert('ophcianaestheticassessmen_asa_asa_grade',array('name'=>'III','display_order'=>3));
		$this->insert('ophcianaestheticassessmen_asa_asa_grade',array('name'=>'IV','display_order'=>4));



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophcianaestheticassessmen_asa', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'asa_grade_id' => 'int(10) unsigned NOT NULL', // ASA grade
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
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

	}

	public function down() {
		// --- drop any element related tables ---
		// --- drop element tables ---
		$this->dropTable('et_ophcianaestheticassessmen_history');



		$this->dropTable('et_ophcianaestheticassessmen_examination');



		$this->dropTable('et_ophcianaestheticassessmen_asa');


		$this->dropTable('ophcianaestheticassessmen_asa_asa_grade');


		// --- delete event entries ---
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphCiAnaestheticassessment'))->queryRow();

		foreach ($this->dbConnection->createCommand()->select('id')->from('event')->where('event_type_id=:event_type_id', array(':event_type_id'=>$event_type['id']))->queryAll() as $row) {
			$this->delete('audit', 'event_id='.$row['id']);
			$this->delete('event', 'id='.$row['id']);
		}

		// --- delete entries from element_type ---
		$this->delete('element_type', 'event_type_id='.$event_type['id']);

		// --- delete entries from event_type ---
		$this->delete('event_type', 'id='.$event_type['id']);

		// echo "m000000_000001_event_type_OphCiAnaestheticassessment does not support migration down.\n";
		// return false;
		echo "If you are removing this module you may also need to remove references to it in your configuration files\n";
		return true;
	}
}
?>
