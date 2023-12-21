
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



function move_ball() {
      checkbox.addEventListener('click', () => {
        const title = document.querySelector(titleSelector);
        title.textContent = checkbox.checked ? 'おすすめ公開' : 'おすすめ非公開';
    });
  }
  
  document.addEventListener('DOMContentLoaded', function() {
    move_ball();
  });

  function ball() {
    const checkbox = document.getElementById('switch');
    const title = document.querySelector('.title');
  
    checkbox.addEventListener('click', () => {
      title.textContent = checkbox.checked ? 'おすすめ公開' : 'おすすめ非公開';
    });
  }
  
  document.addEventListener('DOMContentLoaded', function() {
    ball();
  });

  


  function MoveChange() {
    console.log("fuga");
    if (document.getElementById('move_way')) {
      var id = document.getElementById('move_way').value;
      if (id == "自家用車") {
        document.getElementById('car').style.display = "";
        document.getElementById('rental').style.display = "none";
        document.getElementById('train').style.display = "none";
      } else if (id == 'レンタカー') {
        document.getElementById('car').style.display = "none";
        document.getElementById('rental').style.display = "";
        document.getElementById('train').style.display = "none";
      } else if (id == '公共交通機関') {
        document.getElementById('car').style.display = "none";
        document.getElementById('rental').style.display = "none";
        document.getElementById('train').style.display = "";
      }
    }
  }

  window.onload = MoveChange;













function searchChange() {
  if (document.getElementById('search')) {
      id = document.getElementById('search').value;
    
      if (id == "曖昧") {
          document.getElementById('keyword').style.display = "";
          document.getElementById('vacancy').style.display = "none";
          document.getElementById('lank').style.display = "none";
      } else if (id == '空室') {
          document.getElementById('keyword').style.display = "none";
          document.getElementById('vacancy').style.display = "";
          document.getElementById('lank').style.display = "none";
      }  else if (id == 'ランキング') {
          document.getElementById('keyword').style.display = "none";
          document.getElementById('vacancy').style.display = "none";
          document.getElementById('lank').style.display = "";
      }
  }
  window.onload = searchChange;
}

window.addEventListener('scroll', function () {
    var sidebar = document.getElementById('main');
    var content = document.querySelector('.sub');
    var contentRect = content.getBoundingClientRect();

    if (window.scrollY > contentRect.top) {
        sidebar.style.position = 'fixed';
        sidebar.style.top = '0';
    } else {
        sidebar.style.position = 'relative';
        sidebar.style.top = 'auto';
    }
});

// セレクトボックスの変更イベントを監視
document.getElementById('selectedmiddleClass').addEventListener('change', function () {
  // 選択された値を取得
  var selectedValue = this.value;

  // Ajaxリクエストを送信
  axios.post('/getPrefectureData', {
      selectedmiddleClass: selectedValue
  })
  .then(function (response) {
      // サーバーレスポンスから取得したデータを処理する
      var testarray = response.data;

      // セレクトボックスにデータを追加する処理を行う（例）
      // ここでの処理は、実際のHTML構造や表示方法に応じて調整してください
      var selectBox = document.getElementById('selectedsmallClass');
      selectBox.innerHTML = ''; // 一度クリア

      for (var i = 0; i < testarray.length; i++) {
          var option = document.createElement('option');
          option.value = testarray[i];
          option.text = testarray[i];
          selectBox.add(option);
      }
  })
  .catch(function (error) {
      console.error(error);
  });
});
