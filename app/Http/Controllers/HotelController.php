<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class HotelController extends Controller
{
    //
    public function index(Request $request)
    {
        $client = new Client();
        $applicationId = "1052696491690146167";
        $method = "GET";
        
                /***地区API開始 */
            $Places_url = "https://app.rakuten.co.jp/services/api/Travel/GetAreaClass/20131024?format=json&applicationId=".$applicationId;
    

              
            $place_response = $client->request($method, $Places_url);
    
            $Places = $place_response->getBody();
            $Places = json_decode($Places);
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


            return view('rakuten.index', compact('posts','Places'));
        }

        public function facility_api(Request $request){
            $client = new Client();
            $applicationId = "1052696491690146167";
            $method = "GET";
                 /***地区API開始 */
                 $Places_url = "https://app.rakuten.co.jp/services/api/Travel/GetAreaClass/20131024?format=json&applicationId=".$applicationId;
    

              
                 $place_response = $client->request($method, $Places_url);
         
                 $Places = $place_response->getBody();
                 $Places = json_decode($Places);
                     /***地区API終了 */
            

            $middleClassCode = $request->input('selectedmiddleClass');
            $smallClassCode = $request->input('selectedSmallClass');
           

            $url = "https://app.rakuten.co.jp/services/api/Travel/SimpleHotelSearch/20170426?format=json&largeClassCode=japan&middleClassCode=" . $middleClassCode . "&smallClassCode=" . $smallClassCode . "&applicationId=" . $applicationId;
dump($middleClassCode);
dd($smallClassCode);

            //接続
            
            $response = $client->request($method, $url);
    
            $posts = $response->getBody();
            $posts = json_decode($posts);

            return view('rakuten.facility_result', compact('middleClassCode','smallClassCode','Places'));
            
        }



        public function keyword_api(Request $request){
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
        
        public function lank_api(Request $request){
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
