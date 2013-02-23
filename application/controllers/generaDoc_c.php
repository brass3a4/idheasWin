<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class GeneraDoc_c extends CI_Controller
{

	public function __construct(){
           
          parent::__construct();
          
            $this->load->helper(array('html', 'url'));
        	$this->load->model(array('actores_m', 'general_m','reportes_m'));
			$this->load->library('word');
       }
	
	
	function index() 
	{	
		$this->generaReporteLargoDoc();
	}
	
	function generaReporteLargoDoc()
	{
		$section = $this->word->createSection(array('orientation'=>'landscape'));
		
		// Add text elements
		$section->addText('Hello World!');
		$section->addTextBreak(1);
		 
		$section->addText('I am inline styled.', array('name'=>'Verdana', 'color'=>'006699'));
		$section->addTextBreak(1);
		 
		$this->word->addFontStyle('rStyle', array('bold'=>true, 'italic'=>true, 'size'=>16));
		$this->word->addParagraphStyle('pStyle', array('align'=>'center', 'spaceAfter'=>100));
		$section->addText('I am styled by two style definitions.', 'rStyle', 'pStyle');
		$section->addText('I have only a paragraph style definition.', null, 'pStyle');
		
		$filename='just_some_random_name.docx'; //save our document as this file name
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		 
		$objWriter = PHPWord_IOFactory::createWriter($this->word, 'Word2007');
		$objWriter->save('php://output');
	}
	
}

?>