<table class="table table-responsive table-bordered dataTableFull" id="table">
	<thead class="dataTableHead">
	<tr>
		<th>PaymentId</th>
		<th>Student Name</th>
		<th>Class</th>
		<th>Roll No.</th>
		<th>Amount</th>
		<th>Last Date</th>
		<th>Period</th>
		<th>Status</th>
		<th>Payment Mode</th>
		<th>Concession</th>
		<th>Amount Paid</th>
		<th>Paid On</th>
		<th>Balance</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody class="dataTableBody">
	<?php if (isset($payments)) { ?>
		<?php foreach ($payments as $row) { ?>
			<tr>
				<td><?php echo $row->feeid; ?></td>
				<td><?php echo $row->studentname; ?></td>
				<td><?php echo $row->class; ?></td>
				<td><?php echo $row->rollno; ?></td>
				<td><?php echo $row->amount; ?></td>
				<td><?php echo $row->lastdate; ?></td>
				<td><?php echo $row->period; ?></td>
				<td><?php if ($row->status == true) {
						echo "Paid";
					} else {
						echo "Pending";
					} ?>
				</td>
				<td><?php echo $row->payment_mode ?></td>
				<td><?php echo $row->concession; ?></td>
				<td><?php echo $row->amount_paid; ?></td>
				<td><?php echo $row->paidondate; ?></td>
				<td><?php echo $row->balance; ?></td>
				<td>
					<?php if ($row->status == true) { ?>
						<form method="POST" action="<?php echo site_url('fee/receipt') ?>">
							<input type="hidden" name="id" value="<?php echo $row->feeid ?>">
							<button class="dt-action-btn">
								<i class="la la-receipt btn-icon" title="Receipt"></i>
							</button>
						</form>
					<?php } else { ?>
						<form action="<?php echo site_url('fee/accept/') ?>" method="POST">
							<input type="hidden" name="id" value="<?php echo $row->feeid; ?>">
							<button class="dt-action-btn" title="Accept Payment" type="submit">
								<i class="la la-hand-holding-usd btn-icon"></i>
							</button>
						</form>
					<?php } ?>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>
	</tbody>
</table>

<script type="text/javascript">
	$(document).ready(function () {
		$(function () {
			$('#table').DataTable({
				responsive: true,
			});
		});
	});
</script>
