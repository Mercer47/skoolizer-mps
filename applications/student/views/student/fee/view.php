<?php $this->view('student/layouts/header') ?>
<div class="col-xs-12 page-content">
    <div class="col-xs-12 message-list-container">
        <?php if (empty($payments)) { ?>
            <p>Empty here :-)</p>
        <?php } ?>
        <?php if (isset($payments)) { ?>
            <?php foreach ($payments as $payment) { ?>
                <div class="col-xs-12 message-container">
                    <div class="col-xs-12 payment">
                        <p>Name: <?php echo $payment->studentname ?></p>
                        <p>Class: <?php echo $payment->class ?></p>
                        <p>Roll No: <?php echo $payment->rollno ?></p>
                        <p>Amount: <?php echo $payment->amount ?></p>
                        <p>Last Date: <?php echo $payment->lastdate ?></p>
                        <p>Period: <?php echo $payment->period ?></p>
                        <p>Status: <?php echo $payment->status ? "Paid" : "Unpaid" ?></p>
                        <p>Payment Mode: <?php echo $payment->payment_mode ?></p>
                        <p>Payment Date: <?php echo $payment->paidondate ?></p>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
<?php $this->view('student/layouts/footer') ?>
