$(function() {
	("use strict");

	var ticksStyle = {
		fontColor: "#495057",
		fontStyle: "bold"
	};

	var mode = "index";
	var intersect = true;

	$(".dataTable").dataTable({
		dom: "Bfrtip",
		buttons: [
			{
				extend: "print",
				text: "Print all",
				exportOptions: {
					modifier: {
						selected: null
					}
				}
			},
			{
				extend: "print",
				text: "Print selected"
			},
			{
				extend: "excelHtml5",
				autoFilter: true,
				sheetName: "Package details",
				text: "Export to excel",
				exportOptions: {
					modifier: {
						selected: null
					}
				}
			},
			{
				extend: "excelHtml5",
				text: "Excel selected"
			},
			{
				extend: "copy",
				text: "Copy",
				exportOptions: {
					modifier: {
						selected: null
					}
				}
			},
			{
				text: "JSON",
				action: function(e, dt, button, config) {
					var data = dt.buttons.exportData();

					$.fn.dataTable.fileSave(
						new Blob([JSON.stringify(data)]),
						"package_details.json"
					);
				}
			}
		],
		select: true
	});
});
