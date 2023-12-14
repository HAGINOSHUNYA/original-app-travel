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

                 $mNames = [];//各都道府県のmiddleClassName
                    foreach($Places->areaClasses as $place){
                        foreach($place[0]->largeClass[1]->middleClasses as $middleClass){
                            $mNames[] =$middleClass->middleClass[0]->middleClassName;
                        }
                    }

                $middleArray = array_map(function ($name, $code) {//ミドルのネームとコードを組み合わせる
                        return [$name, $code];
                    }, $mNames, $mcodes);

                    
                   
                 
                 
                 $scodes = [];//各都道府県のsmallClassCode
                    foreach($Places->areaClasses as $place){
                        foreach($place[0]->largeClass[1]->middleClasses as $middleClasses){
                            foreach($middleClasses->middleClass[1]->smallClasses as $smallClass){
                           
                            $scodes[] = $smallClass->smallClass[0]->smallClassCode;
                            }
                        }
                    }
 
                    
                 $sNames = [];//各都道府県のsmallClassName
                 foreach($Places->areaClasses as $place){
                     foreach($place[0]->largeClass[1]->middleClasses as $middleClasses){
                         foreach($middleClasses->middleClass[1]->smallClasses as $smallClass){
                            //dump($smallClass);
                         $sNames[] = $smallClass->smallClass[0]->smallClassName;
                         }
                     }
                 }

                 $smallArray = array_map(function ($name, $code) {//スモールのネームとコードを組み合わせる
                    return [$name, $code];
                }, $sNames, $scodes);

                //dump($smallArray);



                $sArray = [];
                foreach($Places->areaClasses as $place){
                    foreach($place[0]->largeClass[1]->middleClasses as $middle){
                           
                        foreach($middle->middleClass[1] as $small){
                            $sArray [] = $small;
                            //dump($small);//各都道府県の塊
                        }
                    }  
                 }

                 $Array = array_map(function ($middle, $small) {//ミドルのネームとコードを組み合わせる
                    return [$middle, $small];
                }, $middleArray, $sArray);

                 //dump($Array);
                        

              

                    //detailclass予定地
                
                    foreach($Places->areaClasses as $place){
                        foreach($place[0]->largeClass[1]->middleClasses as $middleClasses){
                            foreach($middleClasses->middleClass[1]->smallClasses as $smallClass){
                              // dump($smallClass);
                            
                            }
                        }
                    }


                /**地区APIの各クラスコード取得終了*/

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

                
            


            return view('rakuten.index', compact('posts','Places','mNames','middleArray','smallArray','Array'));
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

                    dump($mNames);
                    foreach($mNames as $mName){
                        
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

                    
                

                    foreach($Places->areaClasses as $place){//各都道府県のsmallClassCode
                        foreach($place[0]->largeClass[1]->middleClasses as $middleClasses){
                           foreach($middleClasses->middleClass[1]->smallClasses as $smallClass){
                            //dump(count($smallClass->smallClass));
    
                           }
                         }
                        }


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
            return view('rakuten.facility_result', compact('middleClassCode','smallClassCode','Places'));
            
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
