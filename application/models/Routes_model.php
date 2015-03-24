<?php
class Routes_model extends CI_Model {

    public $id;
    public $category;
    public $from;
    public $to;

    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }

    public function get($table, $params)
    {
    	$query = $this->db->get_where($table, $params);
    	$this->db->order_by('id ASC');
    	
    	return $query->result();
    }

    public function insert()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

}