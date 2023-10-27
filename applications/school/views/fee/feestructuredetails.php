<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
	<form method="POST" action="<?php echo site_url('fee/insertstructure'); ?>">
		<div class="col-md-12">
			<div class="col-md-4">
				<p class="details">
					Class
				</p>
				<select name="class">
					<?php if (isset($classes)) { ?>
						<?php foreach ($classes as $row) { ?>
							<option value="<?php echo $row->Classname; ?>"><?php echo $row->Classname; ?></option>
						<?php } ?>
					<?php } ?>
				</select>

				<p class="details">
					Per Month Tuition Fee
				</p>
				<input
						type="number"
						name="permonth"
						class="form-input"
				>
				<?php if (form_error('permonth')) { ?>
					<?php echo form_error('permonth',
							'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
							'</div>')
					?>
				<?php } ?>

				<p class="details">
					Total Tuition Fee
				</p>
				<input
						type="number"
						name="regfee"
						class="form-input"
				/>
				<?php if (form_error('regfee')) { ?>
					<?php echo form_error('regfee',
							'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
							'</div>')
					?>
				<?php } ?>
			</div>
			<div class="col-md-4">
				<p class="details">
					Annual Charges
				</p>
				<input
						type="number"
						name="security"
						class="form-input"
				/>
				<?php if (form_error('security')) { ?>
					<?php echo form_error('security',
							'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
							'</div>')
					?>
				<?php } ?>

				<p class="details">
					Installments fee
				</p>
				<input
						type="number"
						name="installments"
						class="form-input"
				/>
				<?php if (form_error('installments')) { ?>
					<?php echo form_error('installments',
							'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
							'</div>')
					?>
				<?php } ?>
			</div>
			<div class="col-md-4">

			</div>
		</div>
		<div class="col-md-12">
			<input type="submit" name="" value="Add" class="form-submit">
		</div>
	</form>
</div>
<?php $this->view('footer'); ?>
