<!DOCTYPE html>
<html lang="en">
<head>
	<title>Skoolizer ERP</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styles.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.css'); ?>">
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/DataTables/datatables.js'); ?>"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet"
		  href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="icon" href="<?php echo base_url('assets/favicon/favicon.ico') ?>" type="image/ico"/>
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
			font-family: Montserrat-Medium;
			src: url(<?php echo base_url("assets/fonts/Montserrat-Medium.ttf"); ?>);
		}

		@font-face {
			font-family: Rubik-Regular;
			src: url(<?php echo base_url("assets/fonts/Rubik-Regular.ttf"); ?>);
		}

	</style>
</head>
<body>
<div class="col-md-12 top-level-container">
	<div class="col-md-3 brand-logo-container">
		<i>
			<img
					src="<?php echo base_url('assets/images/logo/skoolizer.png') ?>"
					class="brand-logo"
					onclick="location.href='<?php echo site_url('home') ?>'"
					alt="Skoolizer Logo"
			/>
		</i>
	</div>
	<div class="col-md-9 school-name-container">
		<div class="school-logo-container">
				<img
						src="<?php echo base_url('assets/images/logo/'.$this->config->item('schoolLogo')) ?>"
						class="school-logo"
						alt="School Logo"
				/>
		</div>
		<p class="school-name">
			<?php echo $this->config->item('schoolName') ?>
			<button
					class="icon-btn"
					onclick="location.href='<?php echo site_url('auth/signout'); ?>'"
					title="Log Out"
			>
				<i class="las la-door-open"></i>
			</button>
		</p>
	</div>
	<div class="col-md-12" style="padding: 0px;">
		<div class="col-md-3" style="background: #f95555; padding: 0px; padding-left: 20px; ">
		    <?php if($this->session->userdata('usertype')->usertype != "admin") { ?>
	            <div class="panel-group" id="accordion">
    				<div class="panel panel-default" style="background: #f95555; border: none;">
    					<div class="panel-heading" style="background: #f95555; border: none;">
    						<h4 class="panel-title">
    							<button class="side-bar-btn" data-toggle="collapse" data-parent="#accordion"
    									href="#collapse7">
    								<i class="las la-tachometer-alt"></i>
    								Exams
    							</button>
    							<br>
    						</h4>
    					</div>
    					<div id="collapse7" class="panel-collapse collapse">
    						<div class="panel-body">
    							<button class="side-bar-btn"
    									onclick="location.href='<?php echo site_url('exam/newexam'); ?>'">
    								<i class="las la-plus-square"></i>
    								New Exam
    							</button>
    							<br>
    								<button class="side-bar-btn" onclick="location.href='<?php echo site_url('exam/selectClass'); ?>'">
    								<i class="las la-eye"></i>
    								All Exams
    							</button>
    							<br/>
    								<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('metrics'); ?>'">
								<i class="las la-hospital-symbol"></i>
								Metrics
							</button>
							<br/>
    						</div>
    					</div>
    				</div>
				</div>
				
							<div class="panel panel-default" style="background: #f95555; border: none;">
					<div class="panel-heading" style="background: #f95555; border: none;">
						<h4 class="panel-title">
							<button
									class="side-bar-btn"  data-parent="#accordion"
									href="#"
									onclick="location.href='<?php echo site_url('post/view') ?>'"
							>
								<i class="las la-rss"></i>
								Posts
							</button>
							<br>
						</h4>
					</div>
				</div>
				
				
		<?php } else { ?>
			<div class="panel-group" id="accordion">
				<div class="panel panel-default" style="background: #f95555; border: none;">
					<div class="panel-heading" style="background: #f95555; border: none;">
						<h4 class="panel-title">
							<button class="side-bar-btn" data-toggle="collapse" data-parent="#accordion"
									href="#collapse2">
								<i class="las la-graduation-cap"></i>
								Students
							</button>
						</h4>
					</div>
					<div id="collapse2" class="panel-collapse collapse">
						<div class="panel-body">
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('student/create'); ?>'">
								<i class="las la-plus-square"></i>
								New Admission
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('student/viewmany'); ?>'">
								<i class="las la-eye"></i>
								View Students
							</button>
							<br>
                            <button class="side-bar-btn"
                                    onclick="location.href='<?php echo site_url('student/listSelect'); ?>'">
                                <i class="las la-list-ol"></i>
                                List of Students
                            </button>
                            <br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('movement/select'); ?>'">
								<i class="las la-arrow-circle-right"></i>
								Check In/Out
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('movement/view'); ?>'">
								<i class="las la-book"></i>
								Log Book
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('student/promote'); ?>'">
								<i class="las la-redo"></i>
								Promote Students
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('metrics'); ?>'">
								<i class="las la-hospital-symbol"></i>
								Metrics
							</button>
							<br>
                            <button class="side-bar-btn"
                                    onclick="location.href='<?php echo site_url('sport'); ?>'">
                                <i class="las la-basketball-ball"></i>
                                Sports
                            </button>
                            <br>
                            <button class="side-bar-btn"
                                    onclick="location.href='<?php echo site_url('student/viewTransferredStudents'); ?>'">
                                <i class="las la-basketball-ball"></i>
                                SLCs
                            </button>
						</div>
					</div>
				</div>

				<div class="panel panel-default" style="background: #f95555; border: none;">
					<div class="panel-heading" style="background: #f95555; border: none;">
						<h4 class="panel-title">
							<button class="side-bar-btn" data-toggle="collapse" data-parent="#accordion"
									href="#collapse3">
								<i class="las la-chalkboard-teacher"></i>
								Teachers
							</button>
							<br>
						</h4>
					</div>
					<div id="collapse3" class="panel-collapse collapse">
						<div class="panel-body">
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('teacher/add'); ?>'">
								<i class="las la-plus-square"></i>
								Add Teacher
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('teacher/view'); ?>'">
								<i class="las la-eye"></i>
								View Teachers
							</button>
							<br></div>
					</div>
				</div>


				<div class="panel panel-default" style="background: #f95555; border: none;">
					<div class="panel-heading" style="background: #f95555; border: none;">
						<h4 class="panel-title">
							<button class="side-bar-btn" data-toggle="collapse" data-parent="#accordion"
									href="#collapse4">
								<i class="las la-list-alt"></i>
								Attendance
							</button>
							<br>
						</h4>
					</div>
					<div id="collapse4" class="panel-collapse collapse">
						<div class="panel-body">
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('attendance/mark'); ?>'">
								<i class="las la-check-square"></i>
								Mark Attendance
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('attendance/view'); ?>'">
								<i class="las la-eye"></i>
								View Attendance
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('attendance/viewbymonth'); ?>'">
								<i class="las la-file-alt"></i>
								Attendance Sheet
							</button>
							<br></div>
					</div>
				</div>

				<div class="panel panel-default" style="background: #f95555; border: none;">
					<div class="panel-heading" style="background: #f95555; border: none;">
						<h4 class="panel-title">
							<button class="side-bar-btn" data-toggle="collapse" data-parent="#accordion"
									href="#collapse5">
								<i class="las la-calendar"></i>
								Schedule
							</button>
							<br>
						</h4>
					</div>
					<div id="collapse5" class="panel-collapse collapse">
						<div class="panel-body">
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('timetable/view'); ?>'">
								<i class="las la-eye"></i>
								View Timetable
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('timetable/add'); ?>'">
								<i class="las la-plus-square"></i>
								New Time Period
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('classs/classes'); ?>'">
								<i class="las la-users"></i>
								Classes
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('event'); ?>'">
								<i class="las la-calendar-check"></i>
								Events
							</button>
							<br>
						</div>
					</div>
				</div>


				<div class="panel panel-default" style="background: #f95555; border: none;">
					<div class="panel-heading" style="background: #f95555; border: none;">
						<h4 class="panel-title">
							<button class="side-bar-btn" data-toggle="collapse" data-parent="#accordion"
									href="#collapse6">
								<i class="las la-bus"></i>
								Transport
							</button>
							<br>
						</h4>
					</div>
					<div id="collapse6" class="panel-collapse collapse">
						<div class="panel-body">
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('route/activeroutes'); ?>'">
								<i class="las la-spinner"></i>
								Active
								Routes
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('route/routes'); ?>'">
								<i class="las la-route"></i>
								Routes
							</button>
							<br>
							<button class="side-bar-btn" onclick="location.href='<?php echo site_url('bus/buses'); ?>'">
								<i class="las la-bus-alt"></i>
								Buses
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('transportstaff/view'); ?>'">
								<i class="las la-user-tie"></i>
								Transport
								Staff
							</button>
							<br></div>
					</div>
				</div>

				<div class="panel panel-default" style="background: #f95555; border: none;">
					<div class="panel-heading" style="background: #f95555; border: none;">
						<h4 class="panel-title">
							<button class="side-bar-btn" data-toggle="collapse" data-parent="#accordion"
									href="#collapse7">
								<i class="las la-tachometer-alt"></i>
								Exams
							</button>
							<br>
						</h4>
					</div>
					<div id="collapse7" class="panel-collapse collapse">
						<div class="panel-body">
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('exam/newexam'); ?>'">
								<i class="las la-plus-square"></i>
								New Exam
							</button>
							<br>
							<button class="side-bar-btn" onclick="location.href='<?php echo site_url('exam/selectClass'); ?>'">
								<i class="las la-eye"></i>
								All Exams
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('metrics'); ?>'">
								<i class="las la-hospital-symbol"></i>
								Metrics
							</button>
							<br/>
							<button class="side-bar-btn" onclick="location.href='<?php echo site_url('quiz'); ?>'">
								<i class="las la-list-ol"></i>
								Quizzes
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('questionPaper/view'); ?>'">
								<i class="las la-paperclip"></i>
								Question Papers
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('exam/classWiseReport'); ?>'">
								<i class="las la-paperclip"></i>
								Classwise Exam Report
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('exam/classWiseMetrics'); ?>'">
								<i class="las la-paperclip"></i>
								Classwise Metrics
							</button>
						</div>
					</div>
				</div>

				<div class="panel panel-default" style="background: #f95555; border: none;">
					<div class="panel-heading" style="background: #f95555; border: none;">
						<h4 class="panel-title">
							<button class="side-bar-btn" data-toggle="collapse" data-parent="#accordion"
									href="#collapse8">
								<i class="las la-edit"></i>
								Homework
							</button>
							<br>
						</h4>
					</div>
					<div id="collapse8" class="panel-collapse collapse">
						<div class="panel-body">
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('homework/homework'); ?>'">
								<i class="las la-list-ul"></i>
								Assign
								Homework
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('homework/view'); ?>'">
								<i class="las la-eye"></i>
								View Homework
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('assignment/view'); ?>'">
								<i class="las la-cog"></i>
								Assignment Generator
							</button>
							<br>
						</div>
					</div>
				</div>


				<div class="panel panel-default" style="background: #f95555; border: none;">
					<div class="panel-heading" style="background: #f95555; border: none;">
						<h4 class="panel-title">
							<button class="side-bar-btn" data-toggle="collapse" data-parent="#accordion"
									href="#collapse9">
								<i class="las la-user-tie"></i>
								Employees
							</button>
							<br>
						</h4>
					</div>
					<div id="collapse9" class="panel-collapse collapse">
						<div class="panel-body">
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('employee/view'); ?>'">
								<i class="las la-eye"></i>
								View Employees
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('employee/attendance'); ?>'">
								<i class="las la-list-alt"></i>
								Employee Attendance
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('employee/viewattendance'); ?>'">
								<i class="las la-users"></i>
								View Employee Attendance
							</button>
							<br>
                            <button class="side-bar-btn"
                                    onclick="location.href='<?php echo site_url('employee/select'); ?>'">
                                <i class="las la-file-alt"></i>
                                Attendance Sheet
                            </button>
                            <br/>
                        </div>
					</div>
				</div>

				<div class="panel panel-default" style="background: #f95555; border: none;">
					<div class="panel-heading" style="background: #f95555; border: none;">
						<h4 class="panel-title">
							<button class="side-bar-btn" data-toggle="collapse" data-parent="#accordion"
									href="#collapse47">
								<i class="las la-rupee-sign"></i>
								Fee
							</button>
							<br>
						</h4>
					</div>
					<div id="collapse47" class="panel-collapse collapse">
						<div class="panel-body">
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('fee/viewstructure'); ?>'">
								<i class="las la-project-diagram"></i>
								Fee
								Structure
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('fee/newpayment'); ?>'">
								<i class="las la-plus-square"></i>
								Create
								Payments
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('fee/viewpayments'); ?>'">
								<i class="las la-file-invoice-dollar"></i>
								View
								Payments
							</button>
							<br>
                        </div>
					</div>
				</div>
				
				
				
				
				<div class="panel panel-default" style="background: #f95555; border: none;">
                    <div class="panel-heading" style="background: #f95555; border: none;">
                        <h4 class="panel-title">
                            <button class="side-bar-btn" data-toggle="collapse" data-parent="#accordion"
                                    href="#collapse48">
                                <i class="las la-walking"></i>
                                Visitor Management
                            </button>
                            <br>
                        </h4>
                    </div>
                    <div id="collapse48" class="panel-collapse collapse">
                        <div class="panel-body">
                            <button class="side-bar-btn"
                                    onclick="location.href='<?php echo site_url('visitor/view'); ?>'">
                                <i class="las la-book"></i>
                                Log Book
                            </button>
                        </div>
                    </div>
                </div>


				<div class="panel panel-default" style="background: #f95555; border: none;">
					<div class="panel-heading" style="background: #f95555; border: none;">
						<h4 class="panel-title">
							<button class="side-bar-btn" data-toggle="collapse" data-parent="#accordion"
									href="#collapse10">
								<i class="las la-sms"></i>
								Messaging
							</button>
							<br>
						</h4>
					</div>
					<div id="collapse10" class="panel-collapse collapse">
						<div class="panel-body">
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('message/view'); ?>'">
								<i class="las la-mobile"></i>
								In-App
								Messaging
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('sms/reason'); ?>'">
								<i class="las la-envelope"></i>
								Inbox
								Messaging/SMS
							</button>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('sms/inboxmessages'); ?>'">
								<i class="las la-paper-plane"></i>
								View sent
								SMS
							</button>
						</div>
					</div>
				</div>

				<div class="panel panel-default" style="background: #f95555; border: none;">
					<div class="panel-heading" style="background: #f95555; border: none;">
						<h4 class="panel-title">
							<button
									class="side-bar-btn"  data-parent="#accordion"
									href="#"
									onclick="location.href='<?php echo site_url('post/view') ?>'"
							>
								<i class="las la-rss"></i>
								Posts
							</button>
							<br>
						</h4>
					</div>
				</div>

				<div class="panel panel-default" style="background: #f95555; border: none;">
					<div class="panel-heading" style="background: #f95555; border: none;">
						<h4 class="panel-title">
							<button class="side-bar-btn" data-toggle="collapse" data-parent="#accordion"
									href="#collapse11">
								<i class="las la-info-circle"></i>
								More
							</button>
							<br>
						</h4>
					</div>
					<div id="collapse11" class="panel-collapse collapse">
						<div class="panel-body">
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('home/terms'); ?>'">
								<i class="las la-file-alt"></i>
								Terms &
								Conditions
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('home/privacy'); ?>'">
								<i class="las la-user-secret"></i>
								Privacy Policy
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('home/docs'); ?>'">
								<i class="las la-book"></i>
								Documentation
							</button>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		<div class="col-md-9" style="padding: 0px;">
