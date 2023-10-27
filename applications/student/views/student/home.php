<?php $this->view('student/layouts/header') ?>
<div class="col-xs-12 col-sm-12 page-content">
    <div class="col-xs-12 info-box">
        <p class="student-home-heading">Classes Today</p>
        <div class="col-md-6 col-xs-6 col-sm-6">
            <p class="student-home-info-title">Date</p>
            <p class="student-home-info-title">Day</p>
            <p class="student-home-info-title">Last Movement</p>
        </div>
        <div class="col-xs-6 col-sm-6">
            <p class="student-home-info-value"><?php echo date("d F Y") ?></p>
            <p class="student-home-info-value"><?php echo date("l") ?></p>
        </div>
        <p>
            <?php if (isset($mostRecentMovement)) echo $mostRecentMovement->movement . " " . $mostRecentMovement->timestamp ?>
        </p>
    </div>
    <div class="col-xs-12 schedule-list-container">
        <?php if (isset($scheduleList)) { ?>
            <?php foreach ($scheduleList as $schedule) { ?>
                <div class="col-xs-12 schedule-container">
                    <div class="col-xs-4 schedule-subject-container">
                        <p class="student-home-subject-name"><?php echo $schedule->Subjectname ?></p>
                    </div>
                    <div class="col-xs-8 schedule-details-container">
                        <p class="student-home-subject-time"><?php echo $schedule->Stime ?> to <?php echo $schedule->Etime ?></p>
                        <p class="student-home-subject-teacher">Teacher: <?php echo $schedule->Teachername ?></p>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
<?php $this->view('student/layouts/footer') ?>
