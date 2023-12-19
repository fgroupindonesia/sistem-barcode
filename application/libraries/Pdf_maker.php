<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// this calls will be available once the config is using
// $config['composer_autoload'] = TRUE; inside the config.php
// and the vendor folder is located inside 'application' folder too...
require_once APPPATH . 'vendor/autoload.php';
use Dompdf\Dompdf; 

class Pdf_maker {

	 protected $CI;

	public function __construct()
    {
        $this->CI =& get_instance();
       
    }

   public function generateFile(){
	   
	   $dompdf = new Dompdf();
	   
	   // $page_data = array('name' => 'mydata');
	   // $this->CI->parser->parse($view, $data, true);
	   // $this->load->view('template/test', $page_data, TRUE); 
	   // $html = file_get_contents("pdf-content.html");
	   $t = $this->CI->load->view('login', '', true);
	   $dompdf->loadHtml($t); 
 
		// (Optional) Setup the paper size and orientation 
		$dompdf->setPaper('A4', 'landscape'); 
		 
		// Render the HTML as PDF 
		$dompdf->render(); 
		 
		// Output the generated PDF to Browser the file is automatically downloaded
		$dompdf->stream();
   }
   
}
?>