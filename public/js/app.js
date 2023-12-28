
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
          document.getElementById('facility').style.display = "none";
      } else if (id == '空室') {
          document.getElementById('keyword').style.display = "none";
          document.getElementById('vacancy').style.display = "";
          document.getElementById('lank').style.display = "none";
          document.getElementById('facility').style.display = "none";
      }  else if (id == 'ランキング') {
          document.getElementById('keyword').style.display = "none";
          document.getElementById('vacancy').style.display = "none";
          document.getElementById('lank').style.display = "";
          document.getElementById('facility').style.display = "none";
      }  else if (id == '施設') {
        document.getElementById('keyword').style.display = "none";
        document.getElementById('vacancy').style.display = "none";
        document.getElementById('lank').style.display = "none";
        document.getElementById('facility').style.display = "";
    }
  }
  window.onload = searchChange;
}

