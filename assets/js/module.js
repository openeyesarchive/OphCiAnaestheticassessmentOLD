
/* Module-specific javascript can be placed here */

$(document).ready(function() {
	handleButton($('#et_save'),function() {
	});
	
	handleButton($('#et_cancel'),function(e) {
		if (m = window.location.href.match(/\/update\/[0-9]+/)) {
			window.location.href = window.location.href.replace('/update/','/view/');
		} else {
			window.location.href = baseUrl+'/patient/episodes/'+et_patient_id;
		}
		e.preventDefault();
	});

	handleButton($('#et_deleteevent'));

	handleButton($('#et_canceldelete'),function(e) {
		if (m = window.location.href.match(/\/delete\/[0-9]+/)) {
			window.location.href = window.location.href.replace('/delete/','/view/');
		} else {
			window.location.href = baseUrl+'/patient/episodes/'+et_patient_id;
		}
		e.preventDefault();
	});

	handleButton($('button.ed_clear'),function(e) {
		e.preventDefault();

		ed_drawing_edit_359.deleteAllDoodles();
		ed_drawing_edit_359.deselectDoodles();
		ed_drawing_edit_359.drawAllDoodles();
	});

	$('select.populate_textarea').unbind('change').change(function() {
		if ($(this).val() != '') {
			var cLass = $(this).parent().parent().parent().attr('class').match(/Element.*/);
			var el = $('#'+cLass+'_'+$(this).attr('id'));
			var currentText = el.text();
			var newText = $(this).children('option:selected').text();

			if (currentText.length == 0) {
				el.text(ucfirst(newText));
			} else {
				el.text(currentText+', '+newText);
			}
		}
	});

	$('input[type="checkbox"][name="Element_OphCiAnaestheticassessment_History[previous_anaesthesia_problems]"]').click(function() {
		if ($(this).is(':checked')) {
			$('#div_Element_OphCiAnaestheticassessment_History_anaesthesia_problems').show();
		} else {
			$('#div_Element_OphCiAnaestheticassessment_History_anaesthesia_problems').hide();
		}
	});

	$('#event_display').delegate('.ed_report', 'click', function(e) {
		$('#Element_OphCiAnaestheticassessment_Examination_lung').val(ed_drawing_edit_359.report().replace(/, +$/, ''));
		e.preventDefault();
	});
});

function ucfirst(str) { str += ''; var f = str.charAt(0).toUpperCase(); return f + str.substr(1); }

function eDparameterListener(_drawing) {
	if (_drawing.selectedDoodle != null) {
		// handle event
	}
}
