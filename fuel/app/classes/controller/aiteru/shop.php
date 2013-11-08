<?php

class Controller_Aiteru_Shop extends Controller_Template
{

	public $template = 'aiteru/template_menu';

	public function action_shop()
	{
		$this->template->title = 'shop';

		//テンプレートに自分自身のviewを埋め込む
		$this->template->content = View::forge('aiteru/shop');

 		if (Input::method() == 'POST')
 		{ 
 			$data = array(
 				'name' => Input::post('name'),
 				'gmap_lat' => Input::post('gmap_lat'),
 				'gmap_lng' => Input::post('gmap_lng')
 			);
 			
 			//モデルのインスタンス化
 			
 			$new=Model_Shop::forge($data);
 			
 			//データの保存
 			
 			$new->save();
 			
 		}
	}


}
