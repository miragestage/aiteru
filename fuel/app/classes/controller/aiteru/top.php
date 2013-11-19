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
		
		$name = Session::get('name');
		
		$view = View::forge('aiteru/gmap');
		$view->set_global('name', $name);
		
		//テンプレートに自分自身のviewを埋め込む
		$this->template->content = View::forge('aiteru/gmap');
	
	}

	
	public function action_shop()
	{
		$this->template->title = 'shop';
			
		//if (isset($_POST['save']))
		//if (isset($_POST['save']) && Security::check_token())
		if (Security::check_token())
		{
			$dataM = array();
	
			$dataM = array(
					'name' => Input::post('name'),
					'gmap_lat' => Input::post('gmap_lat'),
					'gmap_lng' => Input::post('gmap_lng')
			);
	
			//モデルのインスタンス化
			$new=Model_Shop::forge($dataM);
	
			//データの保存
			$new->save();
	
		}
		
		
		$data = Model_Shop::find_all();
	
		$view = View::forge('aiteru/shop');
		
		$token['token_key'] = Config::get('security.csrf_token_key');
		$token['token'] = Security::fetch_token();
		$view->set_global('shops', $data);
		$view->set_global('token', $token);
		
		//Session::set('name', $data[0]['name']);
		
		//テンプレートに自分自身のviewを埋め込む
		$this->template->content = View::forge('aiteru/shop');
	
		return;
			
	}
	
	public function action_routem()
	{
		$this->template->title = 'gmap';
		
		$data = array();
		$data['lat'] = 35.769131526325424;
		$data['lng'] = 139.46262565189204;
		
		$view = View::forge('aiteru/routem');
		$view->set_global('latlng', $data);
		
		//テンプレートに自分自身のviewを埋め込む
		$this->template->content = View::forge('aiteru/routem');
		
		return;
		
	}
}
