<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
	<?php if ($teachers == null) { ?>
		<p style="font-family: Questrial-Regular; font-size: 30px; text-align: center; margin-top: 50px;">Not yet Added.
			Click Add teacher in menu to add.</p>
	<?php } ?>

    <?php if ($this->session->flashdata('error')) { ?>
        <div class="col-md-12 error-bar">
            <i class="las la-exclamation-triangle"></i>
            <?php echo $this->session->flashdata('error') ?>
            <?php $this->session->unset_userdata('error') ?>
        </div>
    <?php } ?>
    <?php if ($this->session->flashdata('success')) { ?>
        <div class="col-md-12 col-lg-12 success-bar">
            <i class="las la-check-square"></i>
            <?php echo $this->session->flashdata('success') ?>
            <?php $this->session->unset_userdata('success') ?>
        </div>
    <?php } ?>

	<table class="table table-responsive table-bordered dataTableFull" id="table">
		<thead class="dataTableHead">
		<tr>
			<th>Name</th>
			<th>Post</th>
			<th>Date of Joining</th>
			<th>Actions</th>
		</tr>
		</thead>
		<tbody class="dataTableBody">
		<?php foreach ($teachers as $row) { ?>
			<tr>
				<td>
					<a href="<?php echo site_url('teacher/profile/') . $row->id; ?>">
						<?php echo $row->Teachername; ?>
					</a>
				</td>
				<td><?php echo $row->Post; ?></td>
				<td><?php echo $row->Doj; ?></td>
				<td>
					<i class="material-icons dt-action-btn" onclick="myFunction(<?php echo $row->id ?>)">delete</i>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(function () {
		$('#table').DataTable({
			"order": [[2, "desc"]],
			responsive: true
		});
	});
</script>

<script type="text/javascript">
	function myFunction(id) {

		var r = confirm("Are you sure ?");
		if (r == true) {
			location.href = '<?php echo site_url('teacher/delete/') ?>' + id;
		} else {
			javascript:void (0);
		}
	}
</script>
<?php $this->view('footer'); ?>
