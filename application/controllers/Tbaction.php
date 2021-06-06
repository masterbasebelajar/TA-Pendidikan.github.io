<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbaction extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Tbaction');
        $this->load->library('form_validation');

        // check user tanpa login
        if($this->session->has_userdata('isLoggin') != true){
            redirect('auth');
        }
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tbaction/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tbaction/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tbaction/index.html';
            $config['first_url'] = base_url() . 'tbaction/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_Tbaction->total_rows($q);
        $tbaction = $this->M_Tbaction->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbaction_data' => $tbaction,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul' => 'Action'
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tbaction/tbaction_list', $data);
        $this->load->view('templates/footer');
    }

    public function read($id) 
    {
        $row = $this->M_Tbaction->get_by_id($id);
        if ($row) {
            $data = array(
		'idAction' => $row->idAction,
		'namaAction' => $row->namaAction,
		'gambar' => $row->gambar,
		'jenisAction' => $row->jenisAction,
		'tipeAction' => $row->tipeAction,
		'qtyAction' => $row->qtyAction,
		'harga' => $row->harga,
		'ketAction' => $row->ketAction,
        'judul' => 'Action'
		// 'created_at' => $row->created_at,
		// 'updated_at' => $row->updated_at,
	    );
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tbaction/tbaction_read', $data);
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbaction'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbaction/create_action'),
	    'idAction' => set_value('idAction'),
	    'namaAction' => set_value('namaAction'),
	    // 'gambar' => set_value('gambar'),
	    'jenisAction' => set_value('jenisAction'),
	    'tipeAction' => set_value('tipeAction'),
	    'qtyAction' => set_value('qtyAction'),
	    'harga' => set_value('harga'),
	    'ketAction' => set_value('ketAction'),
        'judul' => 'Action'
	);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tbaction/tbaction_form', $data);
        $this->load->view('templates/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        $namaAction = $this->input->post('namaAction',TRUE);
        $jenisAction = $this->input->post('jenisAction', TRUE);
        $tipeAction = $this->input->post('tipeAction', TRUE);
        $qtyAction = $this->input->post('qtyAction', TRUE);
        $harga = $this->input->post('harga', TRUE);
        $ketAction = $this->input->post('ketAction', TRUE);
        $gambar = $_FILES['gambar'];
        if ($gambar=''){}else{
            $config['upload_path']          = './assets/upload/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                // return $this->upload->data("file_name");
                echo "Upload Gagal"; die();
            } else{
                $gambar = $this->upload->data('file_name');
            }
    
        }

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'namaAction'    => $namaAction,
                'jenisAction'   => $jenisAction,
                'tipeAction'    => $tipeAction,
                'qtyAction'     => $qtyAction,
                'harga'         => $harga,
                'ketAction'     => $ketAction,
                'gambar'        => $gambar
	    );

            $this->M_Tbaction->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tbaction'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_Tbaction->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbaction/update_action'),
                'idAction' => set_value('idAction', $row->idAction),
                'namaAction' => set_value('namaAction', $row->namaAction),
                // 'gambar' => set_value('gambar', $row->gambar),
                'jenisAction' => set_value('jenisAction', $row->jenisAction),
                'tipeAction' => set_value('tipeAction', $row->tipeAction),
                'qtyAction' => set_value('qtyAction', $row->qtyAction),
                'harga' => set_value('harga', $row->harga),
                'ketAction' => set_value('ketAction', $row->ketAction),
                'judul' => 'Action'
	    );
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tbaction/tbaction_edit', $row, $data);
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbaction'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idAction', TRUE));
        } else {
            $data = array(
		'namaAction' => $this->input->post('namaAction',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
		'jenisAction' => $this->input->post('jenisAction',TRUE),
		'tipeAction' => $this->input->post('tipeAction',TRUE),
		'qtyAction' => $this->input->post('qtyAction',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'ketAction' => $this->input->post('ketAction',TRUE),
	    );

            $this->M_Tbaction->update($this->input->post('idAction', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbaction'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_Tbaction->get_by_id($id);

        if ($row) {
            $this->M_Tbaction->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbaction'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbaction'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('namaAction', 'namaaction', 'trim|required');
	// $this->form_validation->set_rules('gambar', 'gambar', 'trim|required');
	$this->form_validation->set_rules('jenisAction', 'jenisaction', 'trim|required');
	$this->form_validation->set_rules('tipeAction', 'tipeaction', 'trim|required');
	$this->form_validation->set_rules('qtyAction', 'qtyaction', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('ketAction', 'ketaction', 'trim|required');
	// $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	// $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('idAction', 'idAction', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbaction.xls";
        $judul = "tbaction";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "NamaAction");
	xlsWriteLabel($tablehead, $kolomhead++, "Gambar");
	xlsWriteLabel($tablehead, $kolomhead++, "JenisAction");
	xlsWriteLabel($tablehead, $kolomhead++, "TipeAction");
	xlsWriteLabel($tablehead, $kolomhead++, "QtyAction");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "KetAction");
	xlsWriteLabel($tablehead, $kolomhead++, "Created At");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

	foreach ($this->M_Tbaction->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->namaAction);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gambar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenisAction);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tipeAction);
	    xlsWriteNumber($tablebody, $kolombody++, $data->qtyAction);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ketAction);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_at);
	    xlsWriteLabel($tablebody, $kolombody++, $data->updated_at);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbaction.doc");

        $data = array(
            'tbaction_data' => $this->M_Tbaction->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbaction/tbaction_doc',$data);
    }

}

/* End of file Tbaction.php */
/* Location: ./application/controllers/Tbaction.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-20 18:35:04 */
/* http://harviacode.com */