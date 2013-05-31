<?php
/**
 * User accounts section

 * @package pinterest clone model
 * @subpackage WebServices 
 * @category API
 * @since 29-05-2013
 * @author Robin <robin@cubettech.com>
 * @copyright Copyright (c) 2007-2010 Cubet Technologies. (http://cubettechnologies.com)
 */
class Apiaccount_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    
    /**
     * User authentication function
     * @param varchar $username username/email
     * @param varchar $pass Password
     * @return array user data
     * @since 29-05-2013
     * @author Robin <robin@cubettech.com>
     */
    public function authenticate($username, $pass){
        $this->db->select('id,first_name, middle_name, last_name, facebook_id, twitter_id, email, status,
                            verification, description, location, image, connect_by, time_created, time_updated,
                            notifications, twitter_post, facebook_post'
        );
        
        $where = "(email = '{$username}' OR username = '{$username}')";
        $this->db->where('password', $pass);
        $query = $this->db->get_where('user', $where);
        
        if($query->num_rows() != 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    
    /**
     * User registration
     * @param array $data User data
     * @return boolean
     * @since 29-05-2013
     * @author Robin <robin@cubettech.com>
     */
    public function register($data){
        try {
            
            if($this->db->insert('user', $data)) {
                return mysql_insert_id();
            } else {
                throw new Exception();
            }
            
        } catch(Exception $e) {
            return false;
        }
    }
    
    /**
     * User registration
     * @param int $id user id
     * @param array $data User data
     * @return boolean
     * @since 30-05-2013
     * @author Robin <robin@cubettech.com>
     */
    public function edit_user($id, $data){
        try {
            
            $this->db->where('id', $id);
            if($this->db->update('user', $data)) {
                return true;
            } else {
                throw new Exception();
            }
            
        } catch(Exception $e) {
            return false;
        }
    }
    
    /**
     * User registration
     * @param int $id user id
     * @param varchar $oldpwd current password
     * @param varchar $newpwd New password
     * @return boolean
     * @since 30-05-2013
     * @author Robin <robin@cubettech.com>
     */
    public function change_password($id, $oldpwd, $newpwd){
        try {
            
            $this->db->where('id', $id);
            $this->db->where('password', $oldpwd);
            $query = $this->db->get('user');
            
            if($query->num_rows() != 0) {
                $this->db->where('id', $id);
                $this->db->update('user', array('password' => $newpwd));
                return true;
            } else {
                throw new Exception();
            }
            
        } catch(Exception $e) {
            return false;
        }
    }
    
    /**
     * GEt User details by user id
     * @param type $user_id
     * @return boolean
     * @since 31-05-2013
     * @author Robin <robin@cubettech.com>
     */
    public function get_user($user_id){
        $this->db->where('user.id', $user_id);
        $query = $this->db->get('user');
        
        if($query->num_rows() != 0) {
            return $query->row_array();
        } else {
            return false;
        }
        
    }
}

/* End of file apiaccount_model.php */ 
/* Location: ./application/models/api/apiaccount_model.php */