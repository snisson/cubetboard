<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sitemap extends CI_Controller {

    /**
     * Generate sitemap for site
     * @since 08-20-2014
     * @author Milan Zavišić
     */

    
    function index()
    {


        $this->load->model('sitemap_model');
        $data["sitemap"] = $this->sitemap_model->getSitemapData(5000,1000); //select urls from DB to Array

        $this->load->view("sitemap", $data);
    }
}



?>
