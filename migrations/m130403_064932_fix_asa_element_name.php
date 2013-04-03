<?php

class m130403_064932_fix_asa_element_name extends CDbMigration
{
	public function up()
	{
		$event_type = EventType::model()->find('class_name=?',array('OphCiAnaestheticassessment'));
		$this->update('element_type',array('name'=>'ASA'),"event_type_id = $event_type->id and class_name = 'Element_OphCiAnaestheticassessment_Asa'");
	}

	public function down()
	{
	}
}
