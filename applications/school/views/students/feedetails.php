<?php $this->view('header'); ?>
<div class="col-md-12" style="padding: 30px;">
	<?php if ($details==Null) { ?>
		<p style="font-family: Questrial-Regular; font-size: 25px; text-align: center;">Nothing to show.</p>
		
	<?php } else {?>
<?php foreach($info as $row) { ?>
	<div class="col-md-12" style=" border: 1px solid; border-radius: 5px; border-color: #EBEBEC; padding: 0px;">
		<div class="col-md-12" style=" padding: 0px; border-bottom: 1px solid; border-color: #EBEBEC;">
			<div class="col-md-4" style="background: #f95555; padding: 10px 0 10px 0;" align="center">
			<?php if ($row->image!=NULL) { ?>
				<img src="<?php echo base_url('assets/images/students/').$row->image; ?>" style="height: 150px; width: 150px; border-radius: 50%;">
			<?php } else { ?>
				<img src="<?php echo base_url('assets/icons/user.svg'); ?>" style="height: 150px; width: 150px;">
			<?php } ?>
			
		</div>
		<div class="col-md-8" style="padding: 20px; font-family: Questrial-Regular; font-size: 20px;">
			<p><?php echo $row->Name; ?></p>
			<p>Class: <?php echo $row->Class; ?></p>
			<p>Rollno: <?php echo $row->Rollno; ?></p>
		</div>
		</div>
		
		<div class="col-md-12" style="padding: 20px;">

			<p style="font-size: 30px; text-transform: uppercase; font-family: Nunito-Semibold;" align="center">Fee Details</p>
			<?php foreach($details as $key) { ?>
			<p style="font-family: RedhatR; font-size: 25px;">Period: <?php echo $key->period; ?></p>
			<p style="font-family: RedhatR; font-size: 25px;">Status: <?php if ($key->status==FALSE) {
				echo "Pending";
			} else {
				echo "Paid";
			} ?></p>
			<p style="font-family: RedhatR; font-size: 20px;">Last Date: <?php $date=date('d F, Y',strtotime($key->lastdate)); echo $date; ?></p>
			<?php if ($key->paidondate!=NULL) { ?>
			<p style="font-family: RedhatR; font-size: 20px;">Paid On: <?php $date=date('d F, Y',strtotime($key->paidondate)); echo $date; ?></p>
			<?php } ?>
			
		<?php } ?>
		</div>
	</div>
<?php }  }?>
</div>

<?php $this->view('footer'); ?>