<?php
class Routes_model extends CI_Model {

    public $id;
    public $category;
    public $from;
    public $to;

    public function get_routes($from, $to)
    {
    	$this->from = $from;
    	$this->to = $to;

    	return "ok";
    }

    public function get_routes_category($id, $data = null)
    {
    	$this->category = $id;
    	$query = $this->db->get_where('routes', ['category' => $this->category]);
    	foreach ($query->result() as $row)
		{
			/*$data[] = [
			'from' => $row->from,
			];*/
			$data[] = $row;
		}
		
    	return $data;
    }

}