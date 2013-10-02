<?php

class m131002_135519_orbis_tweaks extends CDbMigration
{
	public function up()
	{
		$event_type = Yii::app()->db->createCommand()->select("*")->from("event_type")->where("class_name = :class_name",array(":class_name"=>"OphCiAnaestheticassessment"))->queryRow();

		$this->update('event_type',array('name'=>'Anesthesia pre-operative assessment'),"id = {$event_type['id']}");
	}

	public function down()
	{
		$event_type = Yii::app()->db->createCommand()->select("*")->from("event_type")->where("class_name = :class_name",array(":class_name"=>"OphCiAnaestheticassessment"))->queryRow();

		$this->update('event_type',array('name'=>'Anaesthetic Assessment'),"id = {$event_type['id']}");
	}
}
