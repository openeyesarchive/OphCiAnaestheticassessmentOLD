<?php

class m131206_150632_soft_deletion extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophcianaestheticassessmen_asa','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcianaestheticassessmen_asa_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcianaestheticassessmen_examination','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcianaestheticassessmen_examination_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcianaestheticassessmen_history','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcianaestheticassessmen_history_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('et_ophcianaestheticassessmen_asa','deleted');
		$this->dropColumn('et_ophcianaestheticassessmen_asa_version','deleted');
		$this->dropColumn('et_ophcianaestheticassessmen_examination','deleted');
		$this->dropColumn('et_ophcianaestheticassessmen_examination_version','deleted');
		$this->dropColumn('et_ophcianaestheticassessmen_history','deleted');
		$this->dropColumn('et_ophcianaestheticassessmen_history_version','deleted');
	}
}
