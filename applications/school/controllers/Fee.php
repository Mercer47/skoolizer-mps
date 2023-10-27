<?php

require "Notification.php";

class Fee extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('FeeModel');
		$this->load->model('ClassModel');
		$this->load->model('MessageModel');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->config('validation_rules');
        date_default_timezone_set("Asia/Kolkata");
		if (!($_SESSION['loggedIn'])) {
			session_destroy();
			redirect(site_url('auth'));
		}
	}

	public function viewStructure()
	{
		$data['fee']=$this->FeeModel->load();
		$this->load->view('fee/structure',$data);
	}

	public function addStructure()
	{
		$data['classes'] = $this->ClassModel->getAll();
		$this->load->view('fee/feestructuredetails', $data);
	}

	public function insertStructure()
	{
		$this->form_validation->set_rules($this->config->item('fee'));

		if ($this->form_validation->run() === FALSE) {
			$data['classes'] = $this->ClassModel->getAll();
			$this->load->view('fee/feestructuredetails', $data);
		} else {
			$data = array(
				'feeclass' => $_POST['class'],
				'permonthfee' => $_POST['permonth'],
				'tuition_fee' => $_POST['regfee'],
				'annual_fee' => $_POST['security'],
				'installmentsfee' => $_POST['installments']
			);
			$response = $this->FeeModel->insert($data);
			if ($response) {
				$this->session->set_flashdata('success', "Added Successfully");
				redirect(site_url('fee/viewStructure'));
			} else {
				$this->session->set_flashdata('error', "Failed to Add");
				redirect(site_url('fee/viewStructure'));
			}
		}
	}


	public function newPayment()
	{
		$data['classes'] = $this->ClassModel->getAll();
		$this->load->view('fee/newpayment', $data);
	}

	public function insertPayment()
	{
		$this->form_validation->set_rules($this->config->item('payment'));
		if ( $this->form_validation->run() === FALSE ) {
			$data['classes'] = $this->ClassModel->getAll();
			$this->load->view('fee/newpayment', $data);
		} else {
			$payment = array(
				'ids' => $this->input->post('id'),
				'period' => $this->input->post('period'),
				'lastDate' => $this->input->post('lastdate'),
			);

			if($this->FeeModel->insertPayment($payment)) {
				$this->createFeeNotification($payment);
				$this->session->set_flashdata('success', "Added Successfully");
				redirect(site_url('fee/viewPayments'));
			} else {
				$this->session->set_flashdata('error', "Failed to Add");
				redirect(site_url('fee/viewPayments'));
			}
		}
	}


	public function viewPayments()
	{
		$data['classes'] = $this->ClassModel->getAll();
		$this->load->view('fee/viewpayments', $data);
	}

	public function receipt()
	{
		$feeId = $this->input->post('id');
		$data['reciept'] = $this->FeeModel->loadReceiptDetails($feeId);
		$this->load->view('fee/reciept', $data);
	}

	public function getDetails($id)
	{
		$this->load->model('StudentModel');
		$data['info'] = $this->StudentModel->getInfo($id);
		$data['details'] = $this->FeeModel->loadFeeDetails($id);
		$this->load->view('students/feedetails', $data);
	}

	public function delete($id)
	{
		$response = $this->FeeModel->delete($id);
		if ($response) {
			$this->session->set_flashdata('success', "Deleted Successfully");
			redirect(site_url('fee/viewStructure'));
		} else {
			$this->session->set_flashdata('error', "Failed to Delete");
			redirect(site_url('fee/viewStructure'));
		}
	}

	public function accept()
	{
		$data['payments'] = $this->FeeModel->get($this->input->post('id'));
		$this->load->view('fee/accept', $data);
	}

	public function update()
	{
		$this->form_validation->set_rules($this->config->item('fee_accept'));
		if ($this->form_validation->run() === FALSE) {
			$data['payments'] = $this->FeeModel->get($this->input->post('payment_id'));
			$this->load->view('fee/accept', $data);
		} else {
			$updatedPayment = array(
				'amount_paid' => $this->input->post('amount_paid'),
				'concession' => $this->input->post('concession'),
				'payment_mode' => $this->input->post('payment_mode'),
				'paidondate' => $this->input->post('payment_date'),
				'status' => true,
				'balance' =>   $this->input->post('amount') - $this->input->post('amount_paid')
			);

			$response = $this->FeeModel->update($updatedPayment, $this->input->post('payment_id'));

			if ($response) {
				$this->session->set_flashdata('success', "Accepted Successfully");
				redirect(site_url('fee/viewPayments'));
			} else {
				$this->session->set_flashdata('error', "Failed to Accept");
				redirect(site_url('fee/viewPayments'));
			}
		}
	}

	private function createFeeNotification(array $payment)
	{
		$recipientIds = $payment['ids'];
		$recipients = $this->MessageModel->getRecipients($recipientIds);

		$feeNotification = array(
			'recipientIds' => $recipients,
			'title' => 'Fee Due',
			'body' => 'Fee of your ward for the period of '.
				$payment['period'].' is due. Last date for fee payment is '.$payment['lastDate'].
				' Please pay the fee before due date to avoid late fee charges.',
			'type' => 'fee'
		);

		$notification = new Notification();
		$notification->send($feeNotification);
	}

	public function filter($year, $month, $class)
	{
		$data['payments'] = $this->FeeModel->getFilteredData($year, $month, $class);
		$this->load->view('fee/table', $data);
	}

	public function display()
	{
		$data['payments'] = $this->FeeModel->loadpayments();
		$this->load->view('fee/table', $data);
	}

	public function filterStudent($class)
	{
		$data['students'] = $this->FeeModel->getFilteredStudentData($class);
		$this->load->view('fee/new_payment_table', $data);
	}

	public function displayStudent()
	{
		$data['students'] = $this->FeeModel->getStudentFeeDetail();
		$this->load->view('fee/new_payment_table', $data);
	}

	public function pending()
    {
        $data['students'] = $this->FeeModel->getPending();
        $this->load->view('fee/pending/view', $data);
    }
}
