<html lang="en">
<head>
    <title>Report</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link href="<?php echo base_url('assets/css/report_card.css') ?>" rel="stylesheet"/>
    <style type="text/css">
        @font-face {
            font-family: Nunito_regular;
            src: url(<?php echo base_url("assets/fonts/Nunito_regular.ttf"); ?>);
        }

        @font-face {
            font-family: Nunito-Light;
            src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
        }

        @font-face {
            font-family: Nunito-Semibold;
            src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
        }

        @font-face {
            font-family: Questrial-Regular;
            src: url(<?php echo base_url("assets/fonts/Questrial-Regular.ttf"); ?>);
        }

        @font-face {
            font-family: RedhatR;
            src: url(<?php echo base_url("assets/fonts/RedhatR.ttf"); ?>);
        }

        @font-face {
            font-family: Rubik-Medium;
            src: url(<?php echo base_url("assets/fonts/Rubik-Medium.ttf"); ?>);
        }

        @font-face {
            font-family: Rubik-Regular;
            src: url(<?php echo base_url("assets/fonts/Rubik-Regular.ttf"); ?>);
        }
    </style>
</head>
<body>
<div class="col-xs-12">
    <div class="col-xs-12 school-name-container">
        <div class="school-logo-container">
            <img
                    src="<?php echo base_url('assets/images/logo/' . $this->config->item('schoolLogo')) ?>"
                    class="school-logo"
                    alt="School Logo"
            />
        </div>
        <p class="school-name"><?php echo $this->config->item('schoolName') ?></p>
        <p class="school-address"><?php echo $this->config->item('schoolAddress') ?></p>
    </div>
    <div class="col-xs-12">
        <p class="page-title">Affiliated to CBSE</p>
        <p class="report-card-title-sm" style="display: inline-block">Affiliation Code: 630180</p>
        <p class="report-card-title-sm" style="display: inline-block; float: right;">School Code: 43169</p>
        <?php if (isset($student)) { ?>
        <p class="page-title">Class <?php echo $student->Class ?></p>
        <?php } ?>
        <p class="report-card-title-sm">Session: (2023-2024)</p>
    </div>
    <div class="col-xs-12 info-container">
        <?php if (isset($student)) { ?>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <p class="language">
                        Student Name:  <span class="info"><?php echo $student->Name; ?></span><br/>
                    
                        Father Name: <span
                                class="info"><?php echo $student->Fname ?></span><br/>
                        Mother Name: <span
                                class="info"><?php echo $student->Mname ?></span><br/>
                    </p>
                    
                </div>
                <div class="col-xs-6">
                    <p class="language">
        
                        Date of Birth: <span class="info"><?php echo date('d-m-Y', strtotime($student->Dob)) ?></span><br/>
                        Roll Number: <span class="info"><?php echo $student->Rollno ?></span><br/>
                        Aadhaar Number: <span class="info"><?php echo $student->Aadharno ?></span><br/>
                    </p>
                </div>

                <p style="text-align: center">TERM-1 EXAMINATION</p>
                <?php if (isset($exams)) { ?>
                <?php } ?>
                
                <!--<div class="col-xs-4">-->
                <!--    <?php if ($student->image != null) { ?>-->
                <!--        <img src="<?php echo base_url('assets/images/students/') . $student->image; ?>"-->
                <!--             class="student-img" alt="">-->
                <!--    <?php } else { ?>-->
                <!--        <img src="<?php echo base_url('assets/icons/user.svg'); ?>"-->
                <!--             style="height: 150px; width: 150px;" alt="">-->
                <!--    <?php } ?>-->
                <!--</div>-->
            </div>
        <?php } ?>
    </div>

    <table class="table table-responsive">
        <thead class="report-card-table-head">
        <tr>
            <th>Subjects</th>
                <?php foreach($exams as $key => $examination) { ?>
                        <th>
                            <?php echo $examination->Examtype ?>
                        </th>
                <?php } ?>
            <th>Total</th>
            <th>Maxmimum Marks</th>
        </tr>
        </thead>
        <tbody class="report-card-table-body">
        <?php if (isset($subjects)) { ?>
            <?php if(isset($subjectsOrder)) { ?>
                <?php foreach( $subjectsOrder as $key => $value ) { ?>
                    <?php foreach ($subjects as $subject) { ?>
                        <?php if( $value == $subject->Subject ) { ?>
                            <tr>
                                <?php $totalOfRow = 0; $maxMarksOfSubject = 0; ?>
                                <td>
                                    <?php echo $subject->Subject ?>
                                </td>
                                <?php if (isset($exams)) { ?>
                                    <?php foreach ($exams as $key => $examination) { ?>
                                        <td>
                                            <?php if (isset($marks)) { ?>
                                                <?php foreach ($marks as $mark) { ?>
                                                    <?php if ($mark['examType'] == $examination->Examtype
                                                         && $mark['subject'] == $subject->Subject) {
                                                         if (isset($combinedArray)) {
                                                             foreach ($combinedArray as $key => $value) {
                                                                 if (!empty($value)) {
                                                                     if ($mark['examType'] == $key) {
                                                                         if (is_numeric($mark['maxMarks'])) {
                                                                             $convertedObtainedMarks = ($mark['marksObtained'] / $mark['maxMarks']) * $value;
                                                                             echo $convertedObtainedMarks;
                                                                             $totalOfRow = $totalOfRow + $convertedObtainedMarks;
                                                                             $maxMarksOfSubject = $maxMarksOfSubject + $value;
                                                                         } else {
                                                                             echo $mark['marksObtained'];
                                                                         }
                                                                     }
                                                                 } else {
                                                                     echo $mark['marksObtained'];
                                                                     if (is_numeric($mark['marksObtained'])) {
                                                                         $totalOfRow = $totalOfRow + $mark['marksObtained'];
                                                                         $maxMarksOfSubject = $maxMarksOfSubject + $mark['maxMarks'];
                                                                     }
                                                                     break;
                                                                 }
                                                            }
                                                        }
                                                    }
                                                } ?>
                                            <?php } ?>
                                        </td>
                                    <?php } ?>
                                <?php } ?>
                                <td>
                                    <?php echo $totalOfRow ?>
                                </td>
                                <td><?php echo $maxMarksOfSubject ?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        <?php } ?>
            <?php 
                $totalMaxMarks = 0;
                $totalMarksObtained = 0 ;
                $convertedMaxMarks = 0;
                foreach ($subjects as $subject) { ?>
                    <?php if (isset($exams)) { ?>
                        <?php foreach ($exams as $key => $examination) { ?>
                            <?php if (isset($marks)) { ?>
                                <?php foreach ($marks as $mark) { ?>
                                    <?php if ($mark['examType'] == $examination->Examtype
                                        && $mark['subject'] == $subject->Subject) {
                                        if (isset($combinedArray)) {
                                            foreach ($combinedArray as $key => $value) {
                                                if (!empty($value)) {
                                                    if ($mark['examType'] == $key) {
                                                        if (is_numeric($mark['maxMarks'])) {
                                                            $convertedMaxMarks = $convertedMaxMarks + $value;
                                                        } else {
                                                            continue;
                                                        }
                                                    }
                                                } else {
                                                    if (is_numeric($mark['maxMarks'])) {
                                                        $convertedMaxMarks = $convertedMaxMarks + $mark['maxMarks'];
                                                    }
                                                    break;
                                                }
                                            }
                                        }
                                    }
                                } ?>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                    
                    <?php foreach ($exams as $key => $examination) { ?>
                        <?php if (isset($marks)) { ?>
                            <?php foreach ($marks as $mark) { ?>
                                <?php if ($mark['examType'] == $examination->Examtype
                                    && $mark['subject'] == $subject->Subject) {
                                    if (isset($combinedArray)) {
                                        foreach ($combinedArray as $key => $value) {
                                            if (!empty($value)) {
                                                if ($mark['examType'] == $key) {
                                                    if (is_numeric($mark['maxMarks'])) {
                                                        $convertedObtainedMarks = ($mark['marksObtained'] / $mark['maxMarks']) * $value;
                                                        $totalMarksObtained = $totalMarksObtained + $convertedObtainedMarks;
                                                    } else {
                                                        continue;
                                                    }
                                                }
                                            } else {
                                                if (is_numeric($mark['marksObtained'])) {
                                                    $totalMarksObtained = $totalMarksObtained + $mark['marksObtained'];
                                                }
                                                break;
                                        }
                                    }
                                }
                            } ?>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            <tr>
                <td>Total</td>
                <td>
                        <?php echo $convertedMaxMarks; ?>
                </td>
                <td>
                            <?php echo $totalMarksObtained; ?>
                </td>
            </tr>
            <tr>
                <td>Percentage</td>
                <td>
                    <?php $percentage = ($totalMarksObtained/$convertedMaxMarks) * 100;
                        echo $percentage."%";
                    ?>
                </td>
            </tr>
            <tr>
                <td>Grade</td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <p>Co Scholastic Areas</p>
    <div class="col-xs-12">
        <?php if (isset($metrics)) { ?>
            <table class="table table-responsive">
                <thead class="report-card-table-head">
                <tr>
                    <th>Activities</th>
                    <th>Grade</th>
                </tr>
                </thead>
                <tbody class="report-card-table-body">
                <?php foreach ($metrics as $metric) { ?>
                    <tr>
                        <td><?php echo $metric->metric_name ?></td>
                        <td><?php echo $metric->mark ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
    
    <p>Class Teacher Remark: </p>

    <div class="col-xs-12 signature-container">
        <div class="col-xs-3">
            <p class="signature-container-names">Class Incharge:</p>
        </div>
           <div class="col-xs-3">
            <p class="signature-container-names">Coordinator: </p>
        </div>
        <div class="col-xs-3">
            <p class="signature-container-names">Examination Incharge</p>
        </div>
        <div class="col-xs-3">
            <p class="signature-container-names">Principal</p>
        </div>
    </div>

</div>
<script>
    window.onload = function () {
        window.print();
    }

</script>
</body>
</html>
