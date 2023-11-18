
function viewChange(){
  if(document.getElementById('event_category')){
      id = document.getElementById('event_category').value;
      if(id == "移動"){
          document.getElementById('move').style.display = "";
          document.getElementById('eat').style.display = "none";
          document.getElementById('travel').style.display = "none";
          document.getElementById('hotel').style.display = "none";
      }else if(id == '食事'){
          document.getElementById('move').style.display = "none";
          document.getElementById('eat').style.display = "";
          document.getElementById('travel').style.display = "none";
          document.getElementById('hotel').style.display = "none";
      }else if(id == '観光'){
          document.getElementById('move').style.display = "none";
          document.getElementById('eat').style.display = "none";
          document.getElementById('travel').style.display = "";
          document.getElementById('hotel').style.display = "none";
      }else if(id == '宿泊'){
        document.getElementById('move').style.display = "none";
        document.getElementById('eat').style.display = "none";
        document.getElementById('travel').style.display = "none";
        document.getElementById('hotel').style.display = "";
    }else if(id = '何を'){
      document.getElementById('move').style.display = "none";
      document.getElementById('eat').style.display = "none";
      document.getElementById('travel').style.display = "none";
      document.getElementById('hotel').style.display = "nome";
  }
  }
  
window.onload = viewChange;
}
function ball(){
const checkbox = document.getElementById('switch');
checkbox.addEventListener('click', () => {
  const title = document.querySelector('.title');
  title.textContent = checkbox.checked ? 'おすすめ公開' : 'おすすめ非公開';
});
window.onload = ball;
}


function searchChange() {
  if (document.getElementById('search')) {
      id = document.getElementById('search').value;
    
      if (id == "曖昧") {
          document.getElementById('keyword').style.display = "";
          document.getElementById('vacancy').style.display = "none";
          /*document.getElementById('facility').style.display = "none";*/
          document.getElementById('lank').style.display = "none";
      } else if (id == '空室') {
          document.getElementById('keyword').style.display = "none";
          document.getElementById('vacancy').style.display = "";
         /* document.getElementById('facility').style.display = "none";*/
          document.getElementById('lank').style.display = "none";
      }  else if (id == 'ランキング') {
          document.getElementById('keyword').style.display = "none";
          document.getElementById('vacancy').style.display = "none";
          /*document.getElementById('facility').style.display = "none";*/
          document.getElementById('lank').style.display = "";
      }/**else if (id == '施設') {
          document.getElementById('keyword').style.display = "none";
          document.getElementById('vacancy').style.display = "none";
          document.getElementById('facility').style.display = "";
          document.getElementById('lank').style.display = "none";
      }**/
  }
}

window.onload = function () {
  searchChange();

  // ページ読み込み時にクッキーを取得して適用
  document.addEventListener('DOMContentLoaded', function () {
      var searchValue = getCookie("searchValue");
      if (searchValue) {
          document.getElementById('search').value = searchValue;
          searchChange(); // セレクトボックスの初期状態を設定
      }
  });

  // クッキーを取得する関数
  function getCookie(name) {
      var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
      if (match) return match[2];
  }
};

