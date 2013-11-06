<?php

class Controller_Aiteru_Top extends Controller_Template
{

	public $template = 'aiteru/template_menu';

	public function action_index()
	{
		$this->template->title = 'top';

		//テンプレートに自分自身のviewを埋め込む
		$this->template->content = View::forge('aiteru/index');

	}


}
