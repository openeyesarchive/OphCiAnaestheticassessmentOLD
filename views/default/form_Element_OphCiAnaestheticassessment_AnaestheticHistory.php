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
?>

<div class="element <?php echo $element->elementType->class_name?>"
	data-element-type-id="<?php echo $element->elementType->id?>"
	data-element-type-class="<?php echo $element->elementType->class_name?>"
	data-element-type-name="<?php echo $element->elementType->name?>"
	data-element-display-order="<?php echo $element->elementType->display_order?>">
	<h4 class="elementTypeName"><?php echo $element->elementType->name; ?></h4>

	<?php echo $form->textArea($element, 'previous_problems', array('rows' => 4, 'cols' => 80))?>
	<?php echo $form->textArea($element, 'post_operative_nausea', array('rows' => 4, 'cols' => 80))?>
	<?php echo $form->textArea($element, 'pain', array('rows' => 4, 'cols' => 80))?>
	<?php echo $form->textArea($element, 'cns', array('rows' => 4, 'cols' => 80))?>
	<?php echo $form->textArea($element, 'cardiovascular', array('rows' => 4, 'cols' => 80))?>
	<?php echo $form->textArea($element, 'respiratory', array('rows' => 4, 'cols' => 80))?>
	<div id="Element_OphCiAnaestheticassessment_AnaestheticHistory_smoking" class="eventDetail">
		<div class="label"><?php echo $element->getAttributeLabel('smoking')?>:</div>
		<div class="data">
			<?php echo $form->checkBox($element, 'smoking', array('nowrapper'=>true))?>
			<div class="smoking_how_much" style="display: <?php if ($this->doesSmoke($element)) {?>inline-block<?php }else{?>none<?php }?>; margin-left: 5px;">
				<span><?php echo $element->getAttributeLabel('smoking_how_much_id')?></span>
				<?php echo $form->dropDownList($element, 'smoking_how_much_id', CHtml::listData(OphCiAnaestheticassessment_AnaestheticHistory_SmokingHowMuch::model()->findAll(array('order'=>'display_order')),'id','name'),array('nowrapper'=>true,'empty'=>'- Please select -'))?>
			</div>
		</div>
	</div>
	<div id="Element_OphCiAnaestheticassessment_AnaestheticHistory_drinking" class="eventDetail">
		<div class="label"><?php echo $element->getAttributeLabel('drinking')?>:</div>
		<div class="data">
			<?php echo $form->checkBox($element, 'drinking', array('nowrapper'=>true))?>
			<div class="drinking_how_much" style="display: <?php if ($this->doesDrink($element)) {?>inline-block<?php }else{?>none<?php }?>; margin-left: 5px;">
				<span><?php echo $element->getAttributeLabel('drinking_how_much_id')?></span>
				<?php echo $form->dropDownList($element, 'drinking_how_much_id', CHtml::listData(OphCiAnaestheticassessment_AnaestheticHistory_DrinkingHowMuch::model()->findAll(array('order'=>'display_order')),'id','name'),array('nowrapper'=>true,'empty'=>'- Please select -'))?>
			</div>
		</div>
	</div>
	<?php echo $form->textArea($element, 'gi', array('rows'=>4,'cols'=>80))?>
	<?php echo $form->textArea($element, 'gu', array('rows'=>4,'cols'=>80))?>
	<?php echo $form->textArea($element, 'endocrine', array('rows'=>4,'cols'=>80))?>
	<?php echo $form->textArea($element, 'musculoskeletal', array('rows'=>4,'cols'=>80))?>
	<?php echo $form->radioBoolean($element, 'falls_mobility_risk')?>
	<?php echo $form->textArea($element, 'pregnant_menstrual_period', array('rows'=>4,'cols'=>80))?>
	<?php echo $form->radioBoolean($element, 'anaesthesia_reviewed')?>
</div>
