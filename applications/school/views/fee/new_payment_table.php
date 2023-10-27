<form id="loading" method="POST" action="<?php echo site_url('fee/insertpayment'); ?>">
	<div class="col-md-12" align="center">
		<div class="col-md-6">
			<p class="headings">Payment Period</p>
			<input class="square-input" type="text" name="period">
		</div>
		<div class="col-md-6">
			<p class="headings">Last Date</p>
			<input class="square-input" type="date" name="lastdate">
			<?php if (form_error('lastdate')) { ?>
				<?php echo form_error('lastdate',
					'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
					'</div>')
				?>
			<?php } ?>
		</div>
	</div>

	<div class="col-md-12">
		<table class="table table-responsive table-bordered dataTableFull" id="table">
			<thead class="dataTableHead">
			<tr>
				<th><input type="checkbox" id="selectall" checked/> Select All</th>
				<th>Roll No.</th>
				<th>Name</th>
				<th>Class</th>
				<th>Installment Amount</th>
			</tr>
			</thead>
			<tbody class="dataTableBody">
			<?php if (!empty($students)) { ?>
				<?php foreach ($students as $row) { ?>
					<tr>
						<td>
							<input
								type="checkbox"
								name="id[]"
								class="<?php echo $row->Class; ?>"
								value="<?php echo $row->id; ?>" checked
							/>
							<?php if (form_error('id[]')) { ?>
								<?php echo form_error('id[]',
									'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
									'</div>')
								?>
							<?php } ?>
						</td>
						<td><?php echo $row->Rollno; ?></td>
						<td><?php echo $row->Name; ?></td>
						'
						<td><?php echo $row->Class ?></td>
						<td><?php echo $row->installmentsfee; ?></td>
					</tr>
				<?php } ?>
			<?php } ?>
			</tbody>
		</table>
	</div>
	<button class="float" title="Add" style="border: none;" type="submit">
		<i class="material-icons" style="font-size: 30px; position: relative; left: 3px; top: 2px;">
			send
		</i></button>
</form>

<script>
	document.getElementById('loading').onsubmit = function() {
		const loaderMessage = document.getElementById('loader-message')
		loaderMessage.innerText = "Creating Payments..."
		const loader = document.querySelector(".loader");
		loader.className = "loader";
		loaderMessage.innerText = "Sending Notifications..."
	}
</script>
<script type="text/javascript">
	$(document).ready(function () {
		$("#selectall").click(function () {
			if (this.checked) {
				$('input[type=checkbox]').each(function () {
					$("input[type=checkbox]").prop('checked', true);
				})
			} else {
				$('input[type=checkbox]').each(function () {
					$("input[type=checkbox]").prop('checked', false);
				})
			}
		});
	});
</script>
