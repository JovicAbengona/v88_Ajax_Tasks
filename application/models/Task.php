<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Task extends CI_Model {
        public function all(){
            $get_tasks = $this->db->query("SELECT * FROM tasks")->result_array();

            if($get_tasks != NULL){
                return $get_tasks;
            }
            else{
                return "No Result";
            }
        }

        public function create($new_task){
            $query = "INSERT INTO tasks (title, status, created_at, updated_at) VALUES (?, ?, ?, ?)";
            $values = array($new_task["task_title"], "ongoing", date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));

            return $this->db->query($query, $values);
        }

        public function complete_task($id){
            $query = "UPDATE tasks SET status = ? WHERE id = ? ";
            $values = array("done", $id);

            return $this->db->query($query, $values);
        }

        public function update($update_task){
            $query = "UPDATE tasks SET title = ?, updated_at = ? WHERE id = ? ";
            $values = array($update_task["edit_task"], date("Y-m-d, H:i:s"), $update_task["id"]);

            return $this->db->query($query, $values);
        }
    }
?>
