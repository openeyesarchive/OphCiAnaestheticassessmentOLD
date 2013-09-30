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

	<div class="splitElement clearfix" style="background-color: #DAE6F1;">
		<div class="left" style="width:30%; margin-left: 15px;">
			<?php
			$this->widget('application.modules.eyedraw.OEEyeDrawWidget', array(
				'doodleToolBarArray'=>array('Effusion', 'Crepitations', 'Wheeze'),
				'scriptArray'=>array('ED_Cardiology.js'),
				'mode'=>'edit',
				'width'=>300,
				'height'=>300,
				'idSuffix'=> 'heart',
				'model'=>$element,
				'attribute'=>'eyedraw',
				'onReadyCommandArray'=>array(
					array('addDoodle', array('Lungs')),
					array('deselectDoodles'),
				),
			))?>
			<div class="eyedrawFields">
				<button class="ed_report">Report</button>
				<button class="ed_clear">Clear</button>
			</div>
		</div>
		<div class="right" style="width:62%; margin-top: 75px;">
			<div class="halfHeight">
				<div id="div_<?php echo $element->elementType->class_name?>_blood_pressure1" class="eventDetail">
					<div class="label"><?php echo $element->getAttributeLabel('_blood_pressure1')?>:</div>
					<div class="datacol1">
						<?php echo CHtml::textField(get_class($element).'[blood_pressure1]', $element->getBlood_pressure1(), array('size' => 3, 'maxlength' => 3))?> / 
						<?php echo CHtml::textField(get_class($element).'[blood_pressure2]', $element->getBlood_pressure2(), array('size' => 2, 'maxlength' => 2))?>
					</div>
				</div>

				<?php echo $form->textField($element, 'sao2', array('size' => '5'))?>
				<?php echo $form->textField($element, 'temp', array('size' => '5'))?>
				<?php echo $form->textField($element, 'pulse', array('size' => '5'))?>
				<?php echo $form->textArea($element, 'lung', array('rows' => 3, 'cols' => 55))?>
				<?php echo $form->textField($element, 'heart', array('size' => 50))?>
				<?php echo $form->textField($element, 'airway_class', array('size' => 50))?>
				<?php echo $form->textField($element, 'loose_teeth', array('size' => 50))?>
				<?php echo $form->textField($element, 'abdominal_palpation', array('size' => 50))?>
			</div>
		</div>
	</div>
</div>
