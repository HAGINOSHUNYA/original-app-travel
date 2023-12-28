<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TestController extends Controller
{
    //

    public function index()
    { 
        $client = new Client();
        $applicationId = "1052696491690146167";
        $method = "GET";
        
                /***地区API開始 */
            $Places_url = "https://app.rakuten.co.jp/services/api/Travel/GetAreaClass/20131024?format=json&applicationId=".$applicationId;
            $place_response = $client->request($method, $Places_url);
            $Places = $place_response->getBody();
            $Places = json_decode($Places);

            /**各都道府県のmiddleClassCode☆ */

            $mcodes = [];//
                    foreach($Places->areaClasses as $place){
                        foreach($place[0]->largeClass[1]->middleClasses as $middleClass){
                         $mcodes[] =$middleClass->middleClass[0]->middleClassCode;
                        }
                    }
                    
                dump($mcodes);
            /**各都道府県のmiddleClassCode☆ */




             /**地区APIの各smallClasscode取得開始 */

                    $sarray = [];
                    foreach($Places->areaClasses as $place){
                        foreach($place[0]->largeClass[1]->middleClasses as $middleClasses){
                            foreach($middleClasses->middleClass[1] as $smallClass){
                                        $sarray[] = $smallClass;         
                           }
                        }
                    }//dump($sarray);
                    $dynamicVariables = [];

                    for ($i = 1; $i <= 47; $i++) {
                        // 変数名を動的に生成
                        $variableName = "prefectures_" . $i;
                        $$variableName = [];  // 可変変数を作成
                        foreach ($sarray[$i - 1] as $sclasses) {
                            foreach ($sclasses as $sss) {
                                $$variableName[] = $sss[0];  // 可変変数にデータを追加
                            }
                        }
                        //echo "Content of $variableName: ";
                        //dump($$variableName);
                        // 可変変数の名前と値を配列に保存
                        $dynamicVariables[$variableName] = $$variableName;
                        //dump($dynamicVariables["prefectures_" .$i]);
                    }
                    
                    $testarray = [];
                    $variableName = "prefectures_45" ;//ここを
                    
                     // $dynamicVariablesに$keyが$variableNameの要素がある場合のみ処理を行う
                        if (array_key_exists($variableName, $dynamicVariables)) {
                            $count[$i] = count($dynamicVariables[$variableName]);

                            //$count[$i]回数分だけ繰り返す
                            for ($j = 0; $j < $count[$i]; $j++) {
                                $item = $dynamicVariables[$variableName][$j];
                                // ここで$itemを利用した処理を行う
                                dump($item);
                                $testarray[] = $item;
                            }
                        }
   
        $str = "hello";
        return  $str;
      

    }

    public function testpost(Request $request){ 
        
        dump($request);
    }

    public function getSmallClass(Request $request)
    {//dd($request);
        $client = new Client();
        $applicationId = "1052696491690146167";
        $method = "GET";
    
        // 地区APIからデータを取得
        $Places_url = "https://app.rakuten.co.jp/services/api/Travel/GetAreaClass/20131024?format=json&applicationId=" . $applicationId;
        $place_response = $client->request($method, $Places_url);
        $Places = json_decode($place_response->getBody());
    
        // 各都道府県のmiddleClassCodeを取得
        $mcodes = [];
        foreach ($Places->areaClasses as $place) {
            foreach ($place[0]->largeClass[1]->middleClasses as $middleClass) {
                $mcodes[] = $middleClass->middleClass[0]->middleClassCode;
            }
        }
    
        // 各都道府県のmiddleClassNameを取得
        $mNames = [];
        foreach ($Places->areaClasses as $place) {
            foreach ($place[0]->largeClass[1]->middleClasses as $middleClass) {
                $mNames[] = $middleClass->middleClass[0]->middleClassName;
            }
        }
    
        // ミドルのネームとコードを組み合わせる
        $middleArray = array_map(function ($name, $code) {
            return [$name, $code];
        }, $mNames, $mcodes);
    
        // 地区APIの各smallClasscode取得
        $sarray = [];
        foreach ($Places->areaClasses as $place) {
            foreach ($place[0]->largeClass[1]->middleClasses as $middleClasses) {
                foreach ($middleClasses->middleClass[1] as $smallClass) {
                    $sarray[] = $smallClass;
                }
            }
        }
    
        // 各都道府県ごとに変数を動的に生成
        $dynamicVariables = [];
        for ($i = 1; $i <= 47; $i++) {
            $variableName = "prefectures_" . $i;
            $$variableName = [];
            foreach ($sarray[$i - 1] as $sclasses) {
                foreach ($sclasses as $sss) {
                    $$variableName[] = $sss[0];
                }
            }
            $dynamicVariables[$variableName] = $$variableName;
        }
    
        // 選択された都道府県のデータを取得
        $selectedValue = $request->input('selectedValue');
        $variableName = "prefectures_" . ($selectedValue + 1);
        $testarray = [];
    
        dump($selectedValue);
        dump($variableName);

        if (array_key_exists($variableName, $dynamicVariables)) {
            $count = count($dynamicVariables[$variableName]);
    
            for ($j = 0; $j < $count; $j++) {
                $item = $dynamicVariables[$variableName][$j];
                $testarray[] = $item;
                dump($item);
            }
        }
    
         // JSON形式でレスポンスを返す
         dump($testarray);
         return response()->json($testarray);

        
    }
}
