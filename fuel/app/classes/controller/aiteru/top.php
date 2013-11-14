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

	public function action_gmap()
	{
		$this->template->title = 'gmap';
	
		//テンプレートに自分自身のviewを埋め込む
		$this->template->content = View::forge('aiteru/gmap');
	
	}

	
	public function action_shop()
	{
		$this->template->title = 'shop';
	
	
		if (isset($_POST['save']))
		{
			$data = array();
	
			$data = array(
					'name' => Input::post('id'),
					'name' => Input::post('name'),
					'gmap_lat' => Input::post('gmap_lat'),
					'gmap_lng' => Input::post('gmap_lng')
			);
	
			//モデルのインスタンス化
	
			$new=Model_Shop::forge($data);
	
			//データの保存
	
			$new->save();
	
		}
			
			
		$data = Model_Shop::find_all();
	
		$view = View::forge('aiteru/shop');
		$view->set_global('shops', $data);
			
		//テンプレートに自分自身のviewを埋め込む
		$this->template->content = View::forge('aiteru/shop');
	
		return;
			
	}
	
}
