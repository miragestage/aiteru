<?php

class Controller_Aiteru_Layer extends Controller
{

	public function action_test()
	{
		$data = array();
		$data['title'] = "Test";
		
		return View::forge('aiteru/test', $data);
		
	}

	
}
