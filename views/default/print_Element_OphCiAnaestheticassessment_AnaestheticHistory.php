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

<h4 class="elementTypeName"><?php echo $element->elementType->name?></h4>

<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('previous_problems'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->previous_problems)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('post_operative_nausea'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->post_operative_nausea)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('pain'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->pain)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('cns'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->cns)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('cardiovascular'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->cardiovascular)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('smoking'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->smoking ? 'Yes, '.$element->smoking_how_much->name : 'No')?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('drinking'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->drinking ? 'Yes, '.$element->drinking_how_much->name : 'No')?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('gi'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->gi)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('gu'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->gu)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('endocrine'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->endocrine)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('musculoskeletal'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->musculoskeletal)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('falls_mobility_risk'))?></td>
			<td><span class="big"><?php echo $element->falls_mobility_risk ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('pregnant_menstrual_period'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->pregnant_menstrual_period)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('anaesthesia_reviewed'))?></td>
			<td><span class="big"><?php echo $element->anaesthesia_reviewed ? 'Yes' : 'No'?></span></td>
		</tr>
	</tbody>
</table>
