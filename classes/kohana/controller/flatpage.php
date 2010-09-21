<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_Controller_Flatpage extends Controller_Template {

	protected $config = array();
	
	/**
	 * Load config file
	 */
	public function __construct(Kohana_Request $request)
		{
		parent::__construct($request);

		$this->config = Kohana::config('flatpages');
		}
		
	/**
	 * Display flatpage
	 */
	public function action_index($label)
		{
		// get page content
		$data = ORM::factory('flatpage')->where('label', '=', $label)->find()->as_array();

		// load view
		$view = View::factory(($data['template']?$data['template']:$this->config['default_template']));
		$view->data = $data;

		$this->template->title = $data['title'];	
		$this->template->content = $view;
		}
}
