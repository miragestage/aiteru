<?php

use Fuel\Core\Validation;
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
		$errors = array();
		$errors['name'] = '';
		$errors['gmap_lat'] = '';
		$errors['gmap_lng'] = '';
		
		//if (isset($_POST['save']))
		//if (isset($_POST['save']) && Security::check_token())
		if (Security::check_token())
		{
			
			$val = Validation::forge();
			
			$val->add('name', 'お名前')
				->add_rule('required');

			$val->add('gmap_lat', '緯度')
				->add_rule( 'required')
				->add_rule('valid_string', array('numeric', 'dots'));
			
			$val->add('gmap_lng', '経度')
				->add_rule( 'required')
				->add_rule('valid_string', array('numeric', 'dots'));

			if($val->run())
			{
				$data = array();
		
				$data = array(
					'name' => Input::post('name'),
					'gmap_lat' => Input::post('gmap_lat'),
					'gmap_lng' => Input::post('gmap_lng')
				);
		
				//モデルのインスタンス化
				$new=Model_Shop::forge($data);
		
				//データの保存
				$new->save();
				
			}else{
				
			    foreach($val->error() as $key => $e)
			    {
			        $errors[$key] = $e->get_message();
			        //echo $key;
 				}
 				
			}
		}
		
 					
		$data = Model_Shop::find_all();
	
		$view = View::forge('aiteru/shop');
		
		$token['token_key'] = Config::get('security.csrf_token_key');
		$token['token'] = Security::fetch_token();
 		$view->set_global('errors', $errors);
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
		$data['lat'] = 26.326036618734133;
		$data['lng'] = 127.80387890966188;
		
		$view = View::forge('aiteru/routem');
		$view->set_global('latlng', $data);
		
		//テンプレートに自分自身のviewを埋め込む
		$this->template->content = View::forge('aiteru/routem');
		
		return;
		
	}
}
