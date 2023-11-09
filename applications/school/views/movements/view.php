<?php $this->view('header') ?>
	<div class="col-md-12 innerview">
		<div class="col-md-12 filter-bar">
			<p class="filter-enable"><input type="checkbox" class="custom-checkbox" id="filter-check"> Enable Filter</p>
			<div class="col-md-4">
				<p class="filter-title"><i class="las la-filter"></i> Year</p>
				<select name="year" id="year" class="filter">
					<option><?php echo date("Y") ?></option>
					<option><?php echo date("Y", strtotime("-1 year")) ?></option>
					<option><?php echo date("Y", strtotime("-2 years")) ?></option>
				</select>
			</div>
			<div class="col-md-4">
				<p class="filter-title"><i class="las la-filter"></i> Month</p>
				<select name="month" id="month" class="filter">
					<option value="1">January</option>
					<option value="2">Februry</option>
					<option value="3">March</option>
					<option value="4">April</option>
					<option value="5">May</option>
					<option value="6">June</option>
					<option value="7">July</option>
					<option value="8">August</option>
					<option value="9">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>
				</select>
			</div>
			<div class="col-md-4">
				<p class="filter-title"><i class="las la-filter"></i> Class</p>
				<select name="class" id="class" class="filter">
					<?php if (isset($classes)) { ?>
						<?php foreach ($classes as $class) { ?>
							<option><?php echo $class->Classname ?></option>
						<?php } ?>
					<?php } ?>
				</select>
			</div>
		</div>
		<div id="table-view">

		</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$('#table-view').load('<?php echo site_url('movement/display') ?>')
	});

	$('.filter').on('change', function () {
		if ($('#filter-check').is(':checked')) {
			$('#table-view').load('<?php echo site_url('movement/filter/') ?>' + $('#year').val() + '/' + $('#month').val() + '/' + $('#class').val())
		}
	});
	$('#filter-check').on('change', function () {
		if(this.checked) {
			$('#table-view').load('<?php echo site_url('movement/filter/') ?>' + $('#year').val() + '/' + $('#month').val() + '/' + $('#class').val())
		} else {
			$('#table-view').load('<?php echo site_url('movement/display') ?>')
		}
	});
</script>
<?php $this->view('footer') ?>