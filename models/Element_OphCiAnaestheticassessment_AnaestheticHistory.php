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
 * This is the model class for table "et_ophcianaestheticassessmen_anaesthetichistory".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property text $previous_problems
 * @property text $post_operative_nausea
 * @property text $pain
 * @property text $cns
 * @property text $cardiovascular
 * @property text $respiratory
 * @property boolean $smoking
 * @property boolean $smoking_how_much_id
 * @property boolean $drinking
 * @property boolean $drinking_how_much_id
 * @property text $gi
 * @property text $gu
 * @property text $endocrine
 * @property text $musculoskeletal
 * @property boolean $falls_mobility_risk
 * @property text $prenant_menstrual_period
 * @property boolean $anaesthesia_reviewed
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 */

class Element_OphCiAnaestheticassessment_AnaestheticHistory extends BaseEventTypeElement
{
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
		return 'et_ophcianaestheticassessment_anaesthetichistory';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, previous_problems, post_operative_nausea, pain, cns, cardiovascular, respiratory, smoking, smoking_how_much_id, drinking, drinking_how_much_id, gi, gu, endocrine, musculoskeletal, falls_mobility_risk, pregnant_menstrual_period, anaesthesia_reviewed', 'safe'),
			array('previous_problems, post_operative_nausea, pain, cns, cardiovascular, respiratory, smoking, drinking, gi, gu, endocrine, musculoskeletal, falls_mobility_risk, pregnant_menstrual_period, anaesthesia_reviewed', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_id, previous_problems, post_operative_nausea, pain, cns, cardiovascular, respiratory, smoking, smoking_how_much_id, drinking, drinking_how_much_id, gi, gu, endocrine, musculoskeletal, falls_mobility_risk, pregnant_menstrual_period, anaesthesia_reviewed', 'safe', 'on' => 'search'),
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
			'drinking_how_much' => array(self::BELONGS_TO, 'OphCiAnaestheticassessment_AnaestheticHistory_DrinkingHowMuch', 'drinking_how_much_id'),
			'smoking_how_much' => array(self::BELONGS_TO, 'OphCiAnaestheticassessment_AnaestheticHistory_SmokingHowMuch', 'smoking_how_much_id'),
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
			'previous_problems' => 'Previous problems',
			'post_operative_nausea' => 'Post-operative nausea',
			'cns' => 'CNS',
			'smoking_how_much_id' => 'How much?',
			'drinking_how_much_id' => 'How much?',
			'gi' => 'GI',
			'gu' => 'GU',
			'pregnant_menstrual_period' => 'Pregnant/menstrual period',
			'falls_mobility_risk' => 'Falls/mobility risk',
			'anaesthesia_reviewed' => 'Anaesthesia reviewed',
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
		
		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	protected function afterValidate()
	{
		if (@$_POST['Element_OphCiAnaestheticassessment_AnaestheticHistory']['smoking']) {
			if (!@$_POST['Element_OphCiAnaestheticassessment_AnaestheticHistory']['smoking_how_much_id']) {
				$this->addError('smoking_how_much_id','Please identify how much the patient smokes');
			}
		}

		if (@$_POST['Element_OphCiAnaestheticassessment_AnaestheticHistory']['drinking']) {
			if (!@$_POST['Element_OphCiAnaestheticassessment_AnaestheticHistory']['drinking_how_much_id']) {
				$this->addError('drinking_how_much_id','Please identify how much the patient drinks');
			}
		}

		return parent::afterValidate();
	}
}
?>
