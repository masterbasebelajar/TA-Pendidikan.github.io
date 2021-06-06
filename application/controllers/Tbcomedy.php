<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbcomedy extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Tbcomedy');
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
            $config['base_url'] = base_url() . 'tbcomedy/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tbcomedy/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tbcomedy/index.html';
            $config['first_url'] = base_url() . 'tbcomedy/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_Tbcomedy->total_rows($q);
        $tbcomedy = $this->M_Tbcomedy->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbcomedy_data' => $tbcomedy,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul' => 'Comedy'
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tbcomedy/tbcomedy_list', $data);
        $this->load->view('templates/footer');
    }

    public function read($id) 
    {
        $row = $this->M_Tbcomedy->get_by_id($id);
        if ($row) {
            $data = array(
		'idComedy' => $row->idComedy,
		'namaComedy' => $row->namaComedy,
		'gambar' => $row->gambar,
		'jenisComedy' => $row->jenisComedy,
		'tipeComedy' => $row->tipeComedy,
		'qtyComedy' => $row->qtyComedy,
		'harga' => $row->harga,
		'ketComedy' => $row->ketComedy,
        'judul' => 'Comedy'
	    );
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tbcomedy/tbcomedy_read', $data);
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbcomedy'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbcomedy/create_action'),
	    'idComedy' => set_value('idComedy'),
	    'namaComedy' => set_value('namaComedy'),
	    // 'gambar' => set_value('gambar'),
	    'jenisComedy' => set_value('jenisComedy'),
	    'tipeComedy' => set_value('tipeComedy'),
	    'qtyComedy' => set_value('qtyComedy'),
	    'harga' => set_value('harga'),
	    'ketComedy' => set_value('ketComedy'),
        'judul' => 'Comedy'
	);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tbcomedy/tbcomedy_form', $data);
        $this->load->view('templates/footer');
        
    }
    
    public function create_action() 
    {
        $this->_rules();

        $namaComedy = $this->input->post('namaComedy',TRUE);
        $jenisComedy = $this->input->post('jenisComedy', TRUE);
        $tipeComedy = $this->input->post('tipeComedy', TRUE);
        $qtyComedy = $this->input->post('qtyComedy', TRUE);
        $harga = $this->input->post('harga', TRUE);
        $ketComedy = $this->input->post('ketComedy', TRUE);
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
                'namaComedy'    => $namaComedy,
                'jenisComedy'   => $jenisComedy,
                'tipeComedy'    => $tipeComedy,
                'qtyComedy'     => $qtyComedy,
                'harga'         => $harga,
                'ketComedy'     => $ketComedy,
                'gambar'        => $gambar
	    );

            $this->M_Tbcomedy->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tbcomedy'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_Tbcomedy->get_by_id($id);

        if ($row) {
            $data = array(
            'button' => 'Update',
            'action' => site_url('tbcomedy/update_action'),
		    'idComedy' => set_value('idComedy', $row->idComedy),
            'namaComedy' => set_value('namaComedy', $row->namaComedy),
            // 'gambar' => set_value('gambar', $row->gambar),
            'jenisComedy' => set_value('jenisComedy', $row->jenisComedy),
            'tipeComedy' => set_value('tipeComedy', $row->tipeComedy),
            'qtyComedy' => set_value('qtyComedy', $row->qtyComedy),
            'harga' => set_value('harga', $row->harga),
            'ketComedy' => set_value('ketComedy', $row->ketComedy),
            'judul' => 'Comedy'
	    );
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tbcomedy/tbcomedy_edit', $row, $data);
            $this->load->view('templates/footer');
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbcomedy'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idComedy', TRUE));
        } else {
            $data = array(
		'namaComedy' => $this->input->post('namaComedy',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
		'jenisComedy' => $this->input->post('jenisComedy',TRUE),
		'tipeComedy' => $this->input->post('tipeComedy',TRUE),
		'qtyComedy' => $this->input->post('qtyComedy',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'ketComedy' => $this->input->post('ketComedy',TRUE)
	    );

            $this->M_Tbcomedy->update($this->input->post('idComedy', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbcomedy'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_Tbcomedy->get_by_id($id);

        if ($row) {
            $this->M_Tbcomedy->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbcomedy'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbcomedy'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('namaComedy', 'namacomedy', 'trim|required');
	// $this->form_validation->set_rules('gambar', 'gambar', 'trim|required');
	$this->form_validation->set_rules('jenisComedy', 'jeniscomedy', 'trim|required');
	$this->form_validation->set_rules('tipeComedy', 'tipecomedy', 'trim|required');
	$this->form_validation->set_rules('qtyComedy', 'qtycomedy', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('ketComedy', 'ketcomedy', 'trim|required');

	$this->form_validation->set_rules('idComedy', 'idComedy', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbcomedy.xls";
        $judul = "tbcomedy";
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
	xlsWriteLabel($tablehead, $kolomhead++, "NamaComedy");
	xlsWriteLabel($tablehead, $kolomhead++, "Gambar");
	xlsWriteLabel($tablehead, $kolomhead++, "JenisComedy");
	xlsWriteLabel($tablehead, $kolomhead++, "TipeComedy");
	xlsWriteLabel($tablehead, $kolomhead++, "QtyComedy");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "KetComedy");

	foreach ($this->M_Tbcomedy->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->namaComedy);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gambar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenisComedy);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tipeComedy);
	    xlsWriteNumber($tablebody, $kolombody++, $data->qtyComedy);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ketComedy);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbcomedy.doc");

        $data = array(
            'tbcomedy_data' => $this->M_Tbcomedy->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbcomedy/tbcomedy_doc',$data);
    }

}

/* End of file Tbcomedy.php */
/* Location: ./application/controllers/Tbcomedy.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-19 18:06:26 */
/* http://harviacode.com */