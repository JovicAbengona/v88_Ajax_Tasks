<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Tasks extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model("Task");
        }
        public function index(){
            $this->load->view('index');
        }

        public function index_html(){
            $data["tasks"] = $this->Task->all();
            $this->load->view("templates/tasks", $data);
        }

        public function index_json(){
            $data = array();
            $data["tasks"] = $this->Task->all();
            echo json_encode($data);
        }

        public function create(){
            $new_task = $this->input->post();
            $add_task = $this->Task->create($new_task);
            $data["tasks"] = $this->Task->all();
            $this->load->view("templates/tasks", $data);
        }

        public function complete($id){
            $this->Task->complete_task($id);
            $this->index_html();
        }

        public function update($id){
            $update_task = $this->input->post();
            $update_task["id"] = $id;
            $this->Task->update($update_task);
            $data["tasks"] = $this->Task->all();
            $this->load->view("templates/tasks", $data);
        }
    }
?>