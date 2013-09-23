<?php

class DefaultController extends BaseEventTypeController {
	public function actionCreate()
	{
		parent::actionCreate();
	}

	public function actionUpdate($id)
	{
		parent::actionUpdate($id);
	}

	public function actionView($id)
	{
		parent::actionView($id);
	}

	public function actionPrint($id)
	{
		parent::actionPrint($id);
	}

	public function doesSmoke($element)
	{
		if (!empty($_POST)) {
			return @$_POST['Element_OphCiAnaestheticassessment_AnaestheticHistory']['smoking'];
		}

		return $element->smoking;
	}

	public function doesDrink($element)
	{
		if (!empty($_POST)) {
			return @$_POST['Element_OphCiAnaestheticassessment_AnaestheticHistory']['drinking'];
		}
		
		return $element->drinking;
	}
}
