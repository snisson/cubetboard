<?php
/**
Sitemap model to retrieve site structure for sitemap generation

* @uses : Retrieves data for sitemap.xml
* @version $id:$
* @since 16.08.2014
* @author Milan Zavisic
*/
class Sitemap_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
    /**
     * Function retrieve data for generating sitemap file
     * @param  : $lastPins - number of newest pins to retrieve
                 $lastBoards - number of newest boards to retrieve
     * @author : Milan Zavisic
     * @since  : 16.08.2014
     * @return
     */
     function getSitemapData($lastPins,$lastBoards) {
	    
	   $this->db->from('pins');
	   $this->db->order_by("id", "desc");
	   $this->db->limit($lastPins);
	   $query = $this->db->get();
	    
	   $sitemap = array();
	   if ($query->num_rows() > 0) {
	      foreach ($query->result() as $row) {
	         $sitemap[]["url"] = "/board/pins/" . $row->board_id . "/" . $row->id;
		}
	   }
	   
	   $this->db->from('board');
	   $this->db->order_by("id", "desc");
	   $this->db->limit($lastBoards);
	   $query = $this->db->get();
	    
	   if ($query->num_rows() > 0) {
	      foreach ($query->result() as $row) {
	         $sitemap[]["url"] = "/board/index/" . $row->id;
		}
	   }
	   	   
	   
	   return $sitemap;
	}
	
}
