<?php

class m131003_090332_height_and_weight extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophcianaestheticassessmen_examination','height','varchar(16) collate utf8_bin not null');
		$this->addColumn('et_ophcianaestheticassessmen_examination','weight','varchar(16) collate utf8_bin not null');
	}

	public function down()
	{
		$this->dropColumn('et_ophcianaestheticassessmen_examination','height');
		$this->dropColumn('et_ophcianaestheticassessmen_examination','weight');
	}
}
