<?php

// use Cake¥Event¥Event; //正誤表より　修正箇所はここのみ



//コントローラ基本形
namespace App\Controller;
//ここで定義するクラスがどこに配置されてるかを指定。
//例)このクラスを「App」フォルダの中の「Controller」フォルダに配置します
//クラスは配置する場所が決まっていて、名前空間(＝フォルダのような)と言う。

use App\Controller\AppController; //よく使うクラスを書いておく。

// class HelloController/*(名前Controller)*/ extends AppController{//コントローラークラスは●●controllerとかく。 extends AppControllerによって、AppControllerを継承するとHelloControllerにコントローラーとしての機能がつく。
//     //必要な設定。。。
//     //public function/*アクション*/(){
//         //実行する処理。。。
//     }
//     //必要なだけアクションを記述。。。
// }
//クエリパラメーター
//アドレス？=値&キー&値&キー
//キー　受け渡す値に付けておく名前、値だけではなんの名前かわからなくなるので、名前をつけておく。

class HelloController extends AppController
{

	// public $autoRender = false; //自動レンダリング=テンプレートを自動で読み込んで画面に表示するやつ。自動でテンプレートを読み込もうとして、ないよ、とエラーを吐かないようにfalseにしている。
	// private $data = [
	// 	['name' => 'taro', 'mail' => 'taro@yamada', 'tel' => '090-4947-1234'],
	// 	['name' => 'hanako', 'mail' => 'hanako@flower', 'tel' => '090-2344-1234'],
	// 	['name' => 'sachiko', 'mail' => 'sachiko@happy', 'tel' => '080-9373-1234']
	// ];
	public function index()
	{
	}
	public function form()
	{
		$this->ViewBuilder()->autoLayout(false);
		$name = $this->request->data['name'];
		$mail = $this->request->data['mail'];
		$age = $this->request->data['age'];
		$res = 'こんにちは、' . $name . '(' . $age . ')さん。メールアドレスは,' . $mail . 'ですね？';
		$values = [
			'title' => 'Result',
			'message' => $res
		];
		$this->set($values);
	}
	//正誤表より
	// public function beforeFilter(Event $event)
	// {
	// 	$this->getEventManager()->off($this->Csrf);
	// }
}
