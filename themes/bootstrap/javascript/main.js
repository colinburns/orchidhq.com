$(function(){

	//submit a form automatically when input(s) are changed
	$("form.submitonchange").each(function(){
		var $form = $(this);
		$form.find(":input").change(function(){
			$form.submit();

		})
		$form.find(".Actions").hide();
	});

    $(document).ready(function() {
        $('#OrchidTable').DataTable();
    } );

    $(document).on('click', '.delete', function(e) {
    	e.preventDefault();
		if(confirm("Are you sure you want to delete!\nClick OK or Cancel.")) {
            window.location.href = $(this).attr('href');
		}
	});

    $(document).on('blur', '#OrchidForm_OrchidForm_PotNumber', function(e){
    	var potNumber = $(this).val();

    	var url = '/orchid/validatepotnumber';
        var jqxhr = $.ajax({
            type: "POST",
            url: url,
			data: {PotNumber:potNumber}
        })
            .done(function (data, status) {
                $('#OrchidForm_OrchidForm_PotNumber').css('border-color', '#ccc').css('border-width', '1px').removeClass('error');
            })
            .fail(function (data, status) {
				$('#OrchidForm_OrchidForm_PotNumber').css('border-color', 'red').css('border-width', '2px').addClass('error');
				alert('This Pot Number ['+potNumber+'] already exists in the system. Perhaps you want to edit this entry rather than trying to create a new record. To find this Pot Number go to the view page and search for this Pot Number in the search bar to the right of the table.\n\n Otherwise change the Pot Number to be something unique.');
            });

	});

    $(document).on('submit', '#OrchidForm_OrchidForm', function(e){
        e.preventDefault();
		if($('#OrchidForm_OrchidForm_PotNumber').hasClass('error')) {
			alert("You have an error with the Pot Number and I can't submit the form because Pot Number will not be unique.");
		} else {
			$('#OrchidForm_OrchidForm')[0].submit();
		}
    });

});
