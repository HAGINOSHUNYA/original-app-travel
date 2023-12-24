<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class HotelController extends Controller
{
    //
    public function index(Request $request)//検索ページ　地区APIの値を習得してビューに値を渡す
    {
        $client = new Client();
        $applicationId = "1052696491690146167";
        $method = "GET";
        
                /***地区API開始 */
            $Places_url = "https://app.rakuten.co.jp/services/api/Travel/GetAreaClass/20131024?format=json&applicationId=".$applicationId;
            $place_response = $client->request($method, $Places_url);
            $Places = $place_response->getBody();
            $Places = json_decode($Places);

            foreach($Places->areaClasses as $place){
                foreach($place[0]->largeClass[1]->middleClasses as $middleClass){
                    //dump($middleClass->middleClass);//各都道府県の塊
             }}
            
                /**地区APIの各middleClasscode取得開始 */

                 $mcodes = [];//各都道府県のmiddleClassCode☆
                    foreach($Places->areaClasses as $place){
                        foreach($place[0]->largeClass[1]->middleClasses as $middleClass){
                         $mcodes[] =$middleClass->middleClass[0]->middleClassCode;
                        }
                    }
                    dump($mcodes);

                 $mNames = [];//各都道府県のmiddleClassName☆
                    foreach($Places->areaClasses as $place){
                        foreach($place[0]->largeClass[1]->middleClasses as $middleClass){
                            $mNames[] =$middleClass->middleClass[0]->middleClassName;
                        }
                    }
                //ミドルのネームとコードを組み合わせる☆
                $middleArray = array_map(function ($name, $code) {
                        return [$name, $code];
                    }, $mNames, $mcodes);

                    /**地区APIの各middleClasscode取得終了 */

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
                    //dump($dynamicVariables);
                    $testarray = [];

                    $variableName = "prefectures_6" ;//ここのリクエストを送れるようにする

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
                        //dump($testarray);//これをレスポンスする
   

                    
                    
                 
                 $scodes = [];//各都道府県のsmallClassCode☆
                    foreach($Places->areaClasses as $place){
                        foreach($place[0]->largeClass[1]->middleClasses as $middleClasses){
                            foreach($middleClasses->middleClass[1]->smallClasses as $smallClass){
                           
                            $scodes[] = $smallClass->smallClass[0]->smallClassCode;
                            }
                        }
                    }
 
                    
                 $sNames = [];//各都道府県のsmallClassName☆
                 foreach($Places->areaClasses as $place){
                     foreach($place[0]->largeClass[1]->middleClasses as $middleClasses){
                         foreach($middleClasses->middleClass[1]->smallClasses as $smallClass){
                            //dump($smallClass);
                         $sNames[] = $smallClass->smallClass[0]->smallClassName;
                         }
                     }
                 }
                //スモールのネームとコードを組み合わせる☆
                 $smallArray = array_map(function ($name, $code) {
                    return [$name, $code];
                }, $sNames, $scodes);

                

                //dump($smallArray);

                /**地区APIの各smallClasscode取得終了 */

                /**地区APIの各detailclasscode取得開始 */

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
                
                $mergedClasses = [];
                
                for ($i = 0; $i < 5; $i++) {
                    $dclass = [];
                    foreach ($darray[$i] as $dclasses) {
                        $dclass[] = $dclasses->detailClass;
                    }
                    $mergedClasses[] = $dclass;
                }
                
              
                $detailArray = array_merge(...$mergedClasses);
                
               
                



                    /***  都道府県のdetailclass作成終了 */
                    

                /***地区API終了 */
                
                /***楽天トラベル施設検索API開始*/

            $middleClassCode = "akita";//$request->input('middleClassCode')
            $smallClassCode = "tazawa";//$request->input('smallClassCode')
            

            $url = "https://app.rakuten.co.jp/services/api/Travel/SimpleHotelSearch/20170426?format=json&largeClassCode=japan&middleClassCode=" . $middleClassCode . "&smallClassCode=" . $smallClassCode . "&applicationId=" . $applicationId;


            //接続
            
            $response = $client->request($method, $url);
    
            $posts = $response->getBody();
            $posts = json_decode($posts);
            
                /***楽天トラベル施設検索API終了*/

                 /**地区APIの各クラスコード取得開始 */

                
            


            return view('rakuten.index', compact('posts','Places','mNames','middleArray','smallArray','detailArray'));
        }

        public function facility_api(Request $request){//施設検索API機能とページ　機能とページは分けた方がよいかも
            $client = new Client();
            $applicationId = "1052696491690146167";
            $method = "GET";
                 /***地区API開始 */
                 $Places_url = "https://app.rakuten.co.jp/services/api/Travel/GetAreaClass/20131024?format=json&applicationId=".$applicationId;
                 $place_response = $client->request($method, $Places_url);
                 $Places = $place_response->getBody();
                 $Places = json_decode($Places);
                /***地区API終了 */
                /**地区APIの各クラスコード取得開始 */

                /**地区APIの各middleClasscode取得開始 */
                foreach($Places->areaClasses as $place){
                    foreach($place[0]->largeClass[1]->middleClasses as $middleClass){
                        //dump($middleClass->middleClass);//各都道府県の塊
                 }}

                 $mcodes = [];//各都道府県のmiddleClassCode
                    foreach($Places->areaClasses as $place){
                        foreach($place[0]->largeClass[1]->middleClasses as $middleClass){
                         $mcodes[] =$middleClass->middleClass[0]->middleClassCode;
                        }
                    }

                    

                    
                 $mNames = [];//各都道府県のmiddleClassCode
                    foreach($Places->areaClasses as $place){
                        foreach($place[0]->largeClass[1]->middleClasses as $middleClass){
                            $mNames[] =$middleClass->middleClass[0]->middleClassName;
                        }
                    }

                 
                 $scodes = [];//各都道府県のsmallClassCode
                    foreach($Places->areaClasses as $place){
                        foreach($place[0]->largeClass[1]->middleClasses as $middleClasses){
                            foreach($middleClasses->middleClass[1]->smallClasses as $smallClass){
                            //dump($smallClass->smallClass[0]->smallClassCode);
                            $scodes[] = $smallClass->smallClass[0]->smallClassCode;
                            }
                        }
                    }

                    
                /**地区APIの各detailclasscode取得開始 */

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
                
                $mergedClasses = [];
                
                for ($i = 0; $i < 5; $i++) {
                    $dclass = [];
                    foreach ($darray[$i] as $dclasses) {
                        $dclass[] = $dclasses->detailClass;
                    }
                    $mergedClasses[] = $dclass;
                }
                
                
                
                $detailArray = array_merge(...$mergedClasses);
               
                



                    /***  都道府県のdetailclass作成終了 */
                       

                       // dump($dclasses);
                        


                /**地区APIの各クラスコード取得終了*/

                /**地区APIの各クラスコード取得終了 */
            
                /**施設検索API開始 */
            $middleClassCode = $request->input('selectedmiddleClass');
            $smallClassCode = $request->input('selectedSmallClass');
           
 
            //$url = "https://app.rakuten.co.jp/services/api/Travel/SimpleHotelSearch/20170426?format=json&largeClassCode=japan&middleClassCode=" . $middleClassCode . "&smallClassCode=" . $smallClassCode . "&applicationId=" . $applicationId;
//dump($middleClassCode)
//dd($smallClassCode);

            //接続
            
           // $response = $client->request($method, $url);
    
           // $posts = $response->getBody();
           // $posts = json_decode($posts);
        /**施設検索API終了 */
            return view('rakuten.facility_result', compact('middleClassCode','smallClassCode','Places','darray'));
            
        }



        public function keyword_api(Request $request){//キーワード検索機能とページ　
            /***楽天トラベルキーワード検索API開始*/
            $keyword = $request->input('keyword');
            $client = new Client();
            $applicationId = "1052696491690146167";
            $method = "GET";

            $url = "https://app.rakuten.co.jp/services/api/Travel/KeywordHotelSearch/20170426?format=json&applicationId=".$applicationId."&keyword=".$keyword;
 

            $response = $client->request($method, $url);
    
            $posts = $response->getBody();
            $posts = json_decode($posts);
                

            

                
                
            /***楽天トラベルキーワード検索API終了*/
            return view('rakuten.keyword_result', compact('posts','keyword'));
        }

        public function keyword_show($hotel){
             /***楽天トラベルキーワード検索API開始*/
             
            return view('rakuten.keyword_show', compact('hotel'));
        }
        
        public function lank_api(Request $request){//ランキング検索機能とページ
            /***楽天ランキング検索API開始*/
            $keyword = $request->input('keyword');
            $client = new Client();
            $applicationId = "1052696491690146167";
            $method = "GET";

            $url = "https://app.rakuten.co.jp/services/api/Travel/HotelRanking/20170426?format=json&genre=".$keyword."&formatVersion=1&applicationId=".$applicationId;
 
            $response = $client->request($method, $url);
    
            $posts = $response->getBody();
            $posts = json_decode($posts);
            $title = $posts->Rankings[0]->Ranking->title;
            $posts = $posts->Rankings[0]->Ranking->hotels;

           
            return view('rakuten.lank_result', compact('posts','keyword','title'));

        }
}
