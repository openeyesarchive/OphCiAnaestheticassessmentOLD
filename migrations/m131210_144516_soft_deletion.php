<?php

class m131210_144516_soft_deletion extends CDbMigration
{
	public function up()
	{
		$this->addColumn('ophcianaestheticassessmen_asa_asa_grade','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcianaestheticassessmen_asa_asa_grade_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('ophcianaestheticassessmen_asa_asa_grade','deleted');
		$this->dropColumn('ophcianaestheticassessmen_asa_asa_grade_version','deleted');
	}
}
