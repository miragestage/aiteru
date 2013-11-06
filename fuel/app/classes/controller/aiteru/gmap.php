<?php

class Controller_Aiteru_Gmap extends Controller_Template
{

	public $template = 'aiteru/template_menu';

	public function action_gmap()
	{
		$this->template->title = 'gmap';

		//テンプレートに自分自身のviewを埋め込む
		$this->template->content = View::forge('aiteru/gmap');

	}


}
