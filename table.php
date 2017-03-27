<meta charset="UTF-8">
<link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css' />
<table id="employee-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
	<thead>
		<tr>
			<th>item_name</th>
			<th>item_type</th>
			<th>item_brand</th>
			<th>test</th>
		</tr>
	</thead>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var datatableAjax = $('#employee-grid').dataTable({
			"lengthMenu": [[30, 45, 50, -1], [30, 45, 50, "All"]],
			"iDisplayLength": 30,
			"processing": true,
			"serverSide": true,
			"ajax": {
				"url" : "ajax.php",
				"type" : "POST",
				"data" : {
					'test': 'tseter'
				}
			},
		});
	});
</script>