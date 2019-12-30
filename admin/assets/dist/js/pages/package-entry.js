$(function() {
	("use strict");

	var ticksStyle = {
		fontColor: "#495057",
		fontStyle: "bold"
	};

	var mode = "index";
	var intersect = true;

	$(document).on("change", ".btn-file :file", function() {
		var input = $(this),
			label = input
				.val()
				.replace(/\\/g, "/")
				.replace(/.*\//, "");
		input.trigger("fileselect", [label]);
	});

	$(".btn-file :file").on("fileselect", function(event, label) {
		var input = $(this)
				.parents(".input-group")
				.find(":text"),
			log = label;

		if (input.length) {
			input.val(log);
		} else {
			if (log) alert(log);
		}
	});
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$("#img-upload").attr("src", e.target.result);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#imgInp").change(function() {
		readURL(this);
	});

	$("#rate_per").on("focus", function() {
		$(this).select();
	});

	$("#nights").on("input blur", function(e) {
		let nights_val = !isNaN(parseInt($(this).val()))
			? parseInt($(this).val())
			: 1;
		let days_val = nights_val + 1;
		$("#days").val(days_val);
	});

	$("#nights").on("blur", function() {
		if (isNaN(parseInt($(this).val()))) {
			$(this).val(1);
		}
	});

	// validate signup form on keyup and submit
	let validator = $("#entryForm").validate({
		// debug: true,
		errorClass: "text-danger error",
		validClass: "text-success success",
		rules: {
			title: {
				required: true,
				minlength: 10
			},
			description: {
				required: true
			},
			rate_per: {
				required: true,
				number: true,
				min: 1
			},
			nights: {
				required: true,
				digits: true,
				min: 1
			},
			days: {
				required: true,
				digits: true,
				min: 1
			},
			min_pax: {
				required: true,
				digits: true,
				min: 1
			},
			tag: "required",
			status: "required"
			// imageInp: "required"
		},
		messages: {
			title: {
				required: "Enter package title."
			},
			description: {
				required: "Enter package description."
			},
			rate_per: {
				required: "Enter rate per person."
			},
			nights: {
				required: "Enter nights stay."
			},
			days: {
				required: "Enter days stay."
			},
			min_pax: {
				required: "Enter minimum packages."
			},
			tag: "Select package tag.",
			status: "Select package staus."
			// imageInp: "Image is required"
		},
		errorPlacement: function(error, element) {
			error.appendTo(element.parent().parent());
		},
		submitHandler: function(form) {
			// disable submit button
			$("#saveHandler").prop("disabled", true);

			// submit form
			form.submit();
		}
	});
});
