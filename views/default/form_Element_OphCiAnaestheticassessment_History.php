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

	<?php echo $form->textArea($element, 'medical_history', array('rows' => 4, 'cols' => 80))?>
	<?php echo $form->textArea($element, 'allergies', array('rows' => 4, 'cols' => 80))?>
	<div id="div_<?php echo $element->elementType->class_name?>_iodine" class="eventDetail">
		<div class="label"></div>
		<div class="datacol1">
			<input type="hidden" value="0" name="<?php echo $element->elementType->class_name?>[iodine]" id="<?php echo $element->elementType->class_name?>_iodine">
			<input type="checkbox" value="1" name="<?php echo $element->elementType->class_name?>[iodine]" id="<?php echo $element->elementType->class_name?>_iodine">
			<?php echo $element->getAttributeLabel('iodine')?>
			&nbsp;&nbsp;&nbsp;
			<input type="hidden" value="0" name="<?php echo $element->elementType->class_name?>[latex]" id="<?php echo $element->elementType->class_name?>_latex">
			<input type="checkbox" value="1" name="<?php echo $element->elementType->class_name?>[latex]" id="<?php echo $element->elementType->class_name?>_latex">
			<?php echo $element->getAttributeLabel('latex')?>
		</div>
	</div>
	<?php echo $form->textArea($element, 'previous_surgical_procedures', array('rows' => 4, 'cols' => 80))?>
	<?php echo $form->checkBox($element, 'previous_anaesthesia_problems', array('text-align' => 'right'))?>
	<?php echo $form->textField($element, 'anaesthesia_problems', array('hide' => !$element->previous_anaesthesia_problems))?>
	<?php echo $form->textArea($element, 'system_review', array('rows' => 4, 'cols' => 80))?>
</div>
