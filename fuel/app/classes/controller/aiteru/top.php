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

	/**
	 * グーグルマップ
	 */
	public function action_gmap()
	{
		$this->template->title = 'gmap';
		
		$name = Session::get('name');
		
		$view = View::forge('aiteru/gmap');
		$view->set_global('name', $name);
		
		//テンプレートに自分自身のviewを埋め込む
		$this->template->content = View::forge('aiteru/gmap');
	
	}

	/**
	 * 店舗登録　表示
	 */
	public function action_shop()
	{
		$this->template->title = 'shop';
		
		$errors = array();
		$errors['name'] = '';
		$errors['gmap_lat'] = '';
		$errors['gmap_lng'] = '';
		
		//if (isset($_POST['save']))
		//if (isset($_POST['save']) && Security::check_token())
		//csrf対策　2度押し　F5キー対策
		if (Security::check_token())
		{
			//バリデーションの設定
			$val = Validation::forge();
			
			$val->add('name', 'お名前')
				->add_rule('required');

			$val->add('gmap_lat', '緯度')
				->add_rule( 'required')
				->add_rule('valid_string', array('numeric', 'dots'));
			
			$val->add('gmap_lng', '経度')
				->add_rule( 'required')
				->add_rule('valid_string', array('numeric', 'dots'));
			
			//検証実行
			if($val->run())
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
		
		//csrf対策用　2度押し　F5キー等の対策
		$token['token_key'] = Config::get('security.csrf_token_key');
		$token['token'] = Security::fetch_token();
		
		//エラーメッセージを各フィールド別に表示させる
 		$view->set_global('errors', $errors);
		
 		//店舗データ
 		$view->set_global('shops', $data);
 		//security用トークン
		$view->set_global('token', $token);
		
		//Session::set('name', $data[0]['name']);
		
		//テンプレートに自分自身のviewを埋め込む
		$this->template->content = View::forge('aiteru/shop');
	
		return;
			
	}
	
	/**
	 * ルートマップ
	 */
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
	
	/**
	 * 二点間の距離を測定
	 * @param 始点緯度 $lat1
	 * @param 始点経度 $lng1
	 * @param 終点緯度 $lat2
	 * @param 終点経度 $lng2
	 * @return number
	 */
	public function getDistance($lat1, $lng1, $lat2, $lng2)
	{
		//地球の半径(wikiより)
		$r = 6378.150;
		$pi = 3.14;
		
		//南北の緯度の差をラジアンに変換
		$latRad = ($pi / 180 * ($lat1 - $lat2));
		
		//東西の緯度の差をラジアンに変換
		$lngRad = ($pi / 180 * ($lng1 - $lng2));
		
		//南北の距離　地球の半径 * 緯度の差のラジアン
		$latDistance = $r * $latRad;
		
		//測定する緯度の半径 *  経度の差のラジアン 
		$lngDistance = cos($pi / 180 * $lat1) * $r * $lngRad;
		
		//ピタゴラスの定理
		return sqrt(pow($latDistance, 2) + pow($lngDistance, 2));
	}
	
	
	/**
	 * 検索する範囲を作成
	 * @param ルート緯度 $lat
	 * @param ルート経度 $lng
	 * @return multitype:number
	 */
	public function getRange($lat, $lng, $rangeLimit)
	{
		$data = array();
		
		//検索範囲 メートル
		//$rangeLimit = 1000;
		
		//地球の半径(wikiより)
		$r = 6378150;
		
		//円周率
		//$pi = 3.14159265359;
		$pi = 3.14;
		
		//地球の円周
		$earth = 2 * $pi * $r;
		
		//一秒あたりの距離（緯度）
		$secondLat = $earth/(360 * 60 * 60);
		//検索範囲を度に変換（緯度始点）
		$rangeLatS = $lat + (-$rangeLimit / $secondLat / 60 / 60);
		//検索範囲を度に変換（緯度終点）
		$rangeLatE = $lat + ($rangeLimit / $secondLat / 60 / 60);
		
		//一秒あたりの距離（経度）
		$secondLng = ($earth * cos($lat / 180 * $pi)) / (360 * 60 * 60);
		//検索範囲を度に変換（経度始点）
		$rangeLngS = $lng + (-$rangeLimit / $secondLng / 60 / 60);
		//検索範囲を度に変換（経度終点）
		$rangeLngE = $lng + ($rangeLimit / $secondLng / 60 / 60);
		
		$data['earth'] = $earth;
		$data['secondLat'] = $secondLat;
		$data['rangeLatS'] = $rangeLatS;
		$data['rangeLatE'] = $rangeLatE;
		
		$data['secondLng'] = $secondLng;
		$data['rangeLngS'] = $rangeLngS;
		$data['rangeLngE'] = $rangeLngE;
		
		//2点間の距離を測定する
		$data['distance'] = Controller_Aiteru_Top::getDistance(
				$rangeLatS, $rangeLngS, $rangeLatE, $rangeLngE);
		
		return $data;
	}
	
	/**
	 * 指定範囲内の検索　大まかな検索実行後　正確な2点間の距離を計測
	 */
	public function action_search()
	{
		$this->template->title = 'search';
		
		$data = array();
		$result = array();
		$rows = array();
		
		$rangeLimit = 500; //検索半径
		$locationLat = 26.3257691;//緯度初期値
		$locationLng = 127.78560189999996;//経度初期値
		
		//検索範囲の設定
		$data = Controller_Aiteru_Top::getRange($locationLat, $locationLng, $rangeLimit);
		
		if (Security::check_token())
		{
			$rangeLimit = Input::post('rangeLimit');//検索半径
			$locationLat = Input::post('rootLat');//現在地（緯度）
			$locationLng = Input::post('rootLng');//現在地（経度）
			
			$data = Controller_Aiteru_Top::getRange($locationLat, $locationLng, $rangeLimit);

			//検索半径のデータ取得
			$query = DB::select()->from('shops');
			$query->Where('gmap_lat', 'between', array($data['rangeLatS'], $data['rangeLatE']));
			$query->Where('gmap_lng', 'between', array($data['rangeLngS'], $data['rangeLngE']));
			$query->limit(100);
			$rows = $query->execute()->as_array();
			
			$i = 0;
			foreach ($rows as $row)
			{
				$distance = sprintf("%.2f", Controller_Aiteru_Top::getDistance(
					$locationLat, $locationLng, $row['gmap_lat'], $row['gmap_lng']) * 1000);
				
				if ($rangeLimit >= $distance )
				{
					$result[$i]['id'] = $row['id'];
					$result[$i]['name'] = $row['name'];
					$result[$i]['gmap_lat'] = $row['gmap_lat'];
					$result[$i]['gmap_lng'] = $row['gmap_lng'];
					$result[$i]['distance'] = $distance;
					
					$i++;
				}
			}
		}
		
		//検索半径
		$data['rangeLimit'] = $rangeLimit;
			
		$view = View::forge('aiteru/search');
		$view->set_global('data', $data);
		
		//csrf対策用　2度押し　F5キー等の対策
		$token['token_key'] = Config::get('security.csrf_token_key');
		$token['token'] = Security::fetch_token();
		
		//範囲内のデータ（おおまか）
		$view->set_global('rows', $rows);
		
		//範囲内のデータ（正確）
		$view->set_global('results', $result);
		
		//security用トークン
		$view->set_global('token', $token);
		
		//テンプレートに自分自身のviewを埋め込む
		$this->template->content = View::forge('aiteru/search');
		
		return;
	}
}
