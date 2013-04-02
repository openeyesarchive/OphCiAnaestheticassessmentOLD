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

<div class="cols2 clearfix">
	<div class="right">
		<div class="element <?php echo $element->elementType->class_name ?>">
			<h4 class="elementTypeName">
				<?php  echo $element->elementType->name ?>
			</h4>
			<div class="clearfix eventDetail">
				<?php
				$this->widget('application.modules.eyedraw.OEEyeDrawWidget', array(
					'mode'=>'view',
					'width'=>200,
					'height'=>200,
					'idSuffix'=> $element->elementType->id,
					'model'=>$element,
					'attribute'=>'eyedraw',
				));
				?>
				<div class="eyedrawFields view">
					<?php if ($lung = $element->lung) { ?>
					<div>
						<div class="data">
							<?php echo $lung?>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<div class="left">
		<table class="subtleWhite normalText">
			<tbody>
				<tr>
					<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('blood_pressure1'))?></td>
					<td><span class="big"><?php echo CHtml::encode($element->blood_pressure1)?>/<?php echo CHtml::encode($element->blood_pressure2)?></span></td>
				</tr>
				<tr>
					<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('rbs'))?></td>
					<td><span class="big"><?php echo CHtml::encode($element->rbs)?></span></td>
				</tr>
				<tr>
					<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('sao2'))?></td>
					<td><span class="big"><?php echo CHtml::encode($element->sao2)?></span></td>
				</tr>
				<tr>
					<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('temp'))?></td>
					<td><span class="big"><?php echo CHtml::encode($element->temp)?>°C</span></td>
				</tr>
				<tr>
					<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('pulse'))?></td>
					<td><span class="big"><?php echo CHtml::encode($element->pulse)?> BPM</span></td>
				</tr>
				<tr>
					<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('heart'))?></td>
					<td><span class="big"><?php echo CHtml::encode($element->heart)?></span></td>
				</tr>
				<tr>
					<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('investigations'))?></td>
					<td><span class="big"><?php echo CHtml::encode($element->investigations)?></span></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
