<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbhorror extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Tbhorror');
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
            $config['base_url'] = base_url() . 'tbhorror/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tbhorror/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tbhorror/index.html';
            $config['first_url'] = base_url() . 'tbhorror/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_Tbhorror->total_rows($q);
        $tbhorror = $this->M_Tbhorror->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbhorror_data' => $tbhorror,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul' => 'Horror'
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tbhorror/tbhorror_list', $data);
        $this->load->view('templates/footer');
    }

    public function read($id) 
    {
        $row = $this->M_Tbhorror->get_by_id($id);
        if ($row) {
            $data = array(
		'idHorror' => $row->idHorror,
		'namaHorror' => $row->namaHorror,
		'gambar' => $row->gambar,
		'jenisHorror' => $row->jenisHorror,
		'tipeHorror' => $row->tipeHorror,
		'qtyHorror' => $row->qtyHorror,
		'harga' => $row->harga,
		'ketHorror' => $row->ketHorror,
        'judul' => 'Horror'
		// 'created_at' => $row->created_at,
		// 'updated_at' => $row->updated_at,
	    );
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tbhorror/tbhorror_read', $data);
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbhorror'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbhorror/create_action'),
            'idHorror' => set_value('idHorror'),
            'namaHorror' => set_value('namaHorror'),
            // 'gambar' => set_value('gambar'),
            'jenisHorror' => set_value('jenisHorror'),
            'tipeHorror' => set_value('tipeHorror'),
            'qtyHorror' => set_value('qtyHorror'),
            'harga' => set_value('harga'),
            'ketHorror' => set_value('ketHorror'),
            'created_at' => set_value('created_at'),
            'updated_at' => set_value('updated_at'),
            'judul' => 'Horror'
	);
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('tbhorror/tbhorror_form', $data);
    $this->load->view('templates/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();
        $namaHorror = $this->input->post('namaHorror',TRUE);
        $jenisHorror = $this->input->post('jenisHorror', TRUE);
        $tipeHorror = $this->input->post('tipeHorror', TRUE);
        $qtyHorror = $this->input->post('qtyHorror', TRUE);
        $harga = $this->input->post('harga', TRUE);
        $ketHorror = $this->input->post('ketHorror', TRUE);
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
                'namaHorror'    => $namaHorror,
                'jenisHorror'   => $jenisHorror,
                'tipeHorror'    => $tipeHorror,
                'qtyHorror'     => $qtyHorror,
                'harga'         => $harga,
                'ketHorror'     => $ketHorror,
                'gambar'        => $gambar
	    );

            $this->M_Tbhorror->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tbhorror'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_Tbhorror->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbhorror/update_action'),
                'idHorror' => set_value('idHorror', $row->idHorror),
                'namaHorror' => set_value('namaHorror', $row->namaHorror),
                // 'gambar' => set_value('gambar', $row->gambar),
                'jenisHorror' => set_value('jenisHorror', $row->jenisHorror),
                'tipeHorror' => set_value('tipeHorror', $row->tipeHorror),
                'qtyHorror' => set_value('qtyHorror', $row->qtyHorror),
                'harga' => set_value('harga', $row->harga),
                'ketHorror' => set_value('ketHorror', $row->ketHorror),
                'judul' => 'Horror'
	    );
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tbhorror/tbhorror_edit', $row, $data);
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbhorror'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idHorror', TRUE));
        } else {
            $data = array(
		'namaHorror' => $this->input->post('namaHorror',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
		'jenisHorror' => $this->input->post('jenisHorror',TRUE),
		'tipeHorror' => $this->input->post('tipeHorror',TRUE),
		'qtyHorror' => $this->input->post('qtyHorror',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'ketHorror' => $this->input->post('ketHorror',TRUE)
	    );

            $this->M_Tbhorror->update($this->input->post('idHorror', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbhorror'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_Tbhorror->get_by_id($id);

        if ($row) {
            $this->M_Tbhorror->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbhorror'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbhorror'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('namaHorror', 'namahorror', 'trim|required');
	// $this->form_validation->set_rules('gambar', 'gambar', 'trim|required');
	$this->form_validation->set_rules('jenisHorror', 'jenishorror', 'trim|required');
	$this->form_validation->set_rules('tipeHorror', 'tipehorror', 'trim|required');
	$this->form_validation->set_rules('qtyHorror', 'qtyhorror', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('ketHorror', 'kethorror', 'trim|required');
	// $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	// $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('idHorror', 'idHorror', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbhorror.xls";
        $judul = "tbhorror";
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
	xlsWriteLabel($tablehead, $kolomhead++, "NamaHorror");
	xlsWriteLabel($tablehead, $kolomhead++, "Gambar");
	xlsWriteLabel($tablehead, $kolomhead++, "JenisHorror");
	xlsWriteLabel($tablehead, $kolomhead++, "TipeHorror");
	xlsWriteLabel($tablehead, $kolomhead++, "QtyHorror");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "KetHorror");
	xlsWriteLabel($tablehead, $kolomhead++, "Created At");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

	foreach ($this->M_Tbhorror->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->namaHorror);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gambar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenisHorror);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tipeHorror);
	    xlsWriteNumber($tablebody, $kolombody++, $data->qtyHorror);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ketHorror);
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
        header("Content-Disposition: attachment;Filename=tbhorror.doc");

        $data = array(
            'tbhorror_data' => $this->M_Tbhorror->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbhorror/tbhorror_doc',$data);
    }

}

/* End of file Tbhorror.php */
/* Location: ./application/controllers/Tbhorror.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-21 09:19:18 */
/* http://harviacode.com */