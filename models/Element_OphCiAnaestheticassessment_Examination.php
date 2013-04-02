<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

/**
 * This is the model class for table "et_ophcianaestheticassessmen_examination".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property string $blood_pressure1
 * @property string $blood_pressure2
 * @property string $rbs
 * @property string $sao2
 * @property string $temp
 * @property string $pulse
 * @property string $eyedraw
 * @property string $lung
 * @property string $heart
 * @property string $investigations
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 */

class Element_OphCiAnaestheticassessment_Examination extends BaseEventTypeElement
{
	public $service;

	/**
	 * Returns the static model of the specified AR class.
	 * @return the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'et_ophcianaestheticassessmen_examination';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, blood_pressure1, blood_pressure2, rbs, sao2, temp, pulse, eyedraw, lung, heart, investigations, ', 'safe'),
			array('blood_pressure1, blood_pressure2, rbs, sao2, temp, pulse, eyedraw, lung, heart, investigations, ', 'required'),
			array('blood_pressure1', 'numerical', 'integerOnly' => true),
			array('blood_pressure2', 'numerical', 'integerOnly' => true),
			array('rbs', 'numerical', 'integerOnly' => false, 'min' => 0, 'max' => 20, 'numberPattern' => '/^[0-9]{1,2}(\.[0-9])?$/', 'message' => 'RBS must be between 0.0 - 20.0'),
			array('sao2', 'numerical', 'integerOnly' => true, 'min' => 0, 'max' => 150, 'message' => 'SaO2 must be between 0 - 150'),
			array('temp', 'numerical', 'integerOnly' => false, 'min' => 30, 'max' => 45, 'numberPattern' => '/^[0-9]{2}(\.[0-9])?$/', 'message' => 'Temp must be between 30.0 - 45.0'),
			array('pulse', 'numerical', 'integerOnly' => true, 'min' => 10, 'max' => 250, 'message' => 'Pulse must be between 10 - 250'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_id, blood_pressure1, blood_pressure2, rbs, sao2, temp, pulse, eyedraw, lung, heart, investigations, ', 'safe', 'on' => 'search'),
		);
	}
	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'element_type' => array(self::HAS_ONE, 'ElementType', 'id','on' => "element_type.class_name='".get_class($this)."'"),
			'eventType' => array(self::BELONGS_TO, 'EventType', 'event_type_id'),
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'user' => array(self::BELONGS_TO, 'User', 'created_user_id'),
			'usermodified' => array(self::BELONGS_TO, 'User', 'last_modified_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'event_id' => 'Event',
			'blood_pressure1' => 'Blood pressure',
			'blood_pressure2' => 'Blood pressure',
			'rbs' => 'RBS',
			'sao2' => 'SaO2',
			'temp' => 'Temp',
			'pulse' => 'Pulse',
			'eyedraw' => 'Lung eyedraw',
			'lung' => 'Lung',
			'heart' => 'Heart',
			'investigations' => 'Investigations',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('event_id', $this->event_id, true);
		$criteria->compare('blood_pressure1', $this->blood_pressure1);
		$criteria->compare('blood_pressure2', $this->blood_pressure2);
		$criteria->compare('rbs', $this->rbs);
		$criteria->compare('sao2', $this->sao2);
		$criteria->compare('temp', $this->temp);
		$criteria->compare('pulse', $this->pulse);
		$criteria->compare('eyedraw', $this->eyedraw);
		$criteria->compare('lung', $this->lung);
		$criteria->compare('heart', $this->heart);
		$criteria->compare('investigations', $this->investigations);
		
		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	public function getBlood_pressure1() {
		if (isset($_POST['Element_OphCiAnaestheticassessment_Examination']['blood_pressure1'])) {
			return $_POST['Element_OphCiAnaestheticassessment_Examination']['blood_pressure1'];
		}
		return $this->blood_pressure1;
	}

	public function getBlood_pressure2() {
		if (isset($_POST['Element_OphCiAnaestheticassessment_Examination']['blood_pressure2'])) {
			return $_POST['Element_OphCiAnaestheticassessment_Examination']['blood_pressure2'];
		}
		return $this->blood_pressure2;
	}
}
?>
