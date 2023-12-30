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
                    
                //dump($mcodes);
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
                                //dump($item);
                                $testarray[] = $item;
                            }
                        }
   
        $str = "hello";
        return  $str;
      

    }

    public function testpost(Request $request){ 
        
        //dump($request);
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
        //dump($dynamicVariables);
    
        // 選択された都道府県のデータを取得
        $selectedValue = $request->input('selectedValue');
        $variableName = "prefectures_" . ($selectedValue + 1);
        $testarray = [];
    
        //dump($selectedValue);
        //dump($variableName);

        if (array_key_exists($variableName, $dynamicVariables)) {
            $count = count($dynamicVariables[$variableName]);
    
            for ($j = 0; $j < $count; $j++) {
                $item = $dynamicVariables[$variableName][$j];
                $testarray[] = $item;
                //dump($item);
            }
        }
    
         // JSON形式でレスポンスを返す
         
         return response()->json($testarray);

        
    }
    public function getDetailClass(Request $request){

        $client = new Client();
        $applicationId = "1052696491690146167";
        $method = "GET";
    
        // 地区APIからデータを取得
        $Places_url = "https://app.rakuten.co.jp/services/api/Travel/GetAreaClass/20131024?format=json&applicationId=" . $applicationId;
        $place_response = $client->request($method, $Places_url);
        $Places = json_decode($place_response->getBody());
    
        $darray = [];

        foreach ($Places->areaClasses as $place) {
            foreach ($place[0]->largeClass[1]->middleClasses as $middleClasses) {
                foreach ($middleClasses->middleClass[1]->smallClasses as $smallClass) {
                    if (count($smallClass->smallClass) == 2) {
                        foreach ($smallClass->smallClass as $item) {
                            if (is_object($item) && property_exists($item, 'detailClasses')) {
                                $darray[] = $item->detailClasses;
                            }
                        }
                    }
                }
            }
        }
        //dump( $darray);
        $mergedClasses = [];
       
        
        for ($i = 0; $i < 5; $i++) {
            $dclass = [];
            foreach ($darray[$i] as $dclasses) {
                $dclass[] = $dclasses->detailClass;
            }
            $mergedClasses[] = $dclass;
        }
        //dump($mergedClasses);
        $detailClassarray = [];
        foreach($mergedClasses as $array){
             //dump($array);
            $detailClassarray[] = $array;
        }

        

        $dynamicVariables = [];
        for ($i = 1; $i <= 5; $i++) {
            $variableName = "detail_" . $i;
            $$variableName = [];
    
            // 該当の部分だけを取得
            $startIndex = ($i - 1) * ceil(count($detailClassarray) / 5);
            $endIndex = $i * ceil(count($detailClassarray) / 5);
            $selectedClasses = array_slice($detailClassarray, $startIndex, $endIndex - $startIndex);
    
            foreach ($selectedClasses as $array) {
                    $$variableName[] = $array;
                    //dump($array);

            }

            $dynamicVariables[$variableName] = $$variableName;
            }


            $selectedMiddleClass = $request->input('selectedValue');
            //dump($$variableName);

            //dump($request->input('selectedValue'));
            // 選択された地域に応じて対応する配列を取得
            $responseArray = [];
            switch ($selectedMiddleClass) {
                case '0':
                    $responseArray = $dynamicVariables['detail_1'];
                    break;
                case '12':
                    $responseArray = $dynamicVariables['detail_2'];
                    break;
                case '22':
                    $responseArray = $dynamicVariables['detail_3'];
                    break;
                case '25':
                    $responseArray = $dynamicVariables['detail_4'];
                    break;
                case '26':
                    $responseArray = $dynamicVariables['detail_5'];
                    break;
                default:
                // デフォルトの処理（何もしない場合は空の配列としておく）
                    $responseArray = [];
                    break;
        }
        //dump($responseArray);


        return response()->json($responseArray[0]);

        
        

       
    }
   
}
