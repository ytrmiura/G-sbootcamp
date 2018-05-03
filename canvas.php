<?php


$user_name = $_SESSION["user_name"];
$user_id = $_SESSION["user_id"];

$_SESSION["old_view"] = null;

?>

<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <link href="css/canvas.css" rel="stylesheet">
  <script src="js/jquery-ui.min.js"></script>
  <script type="text/javascript">


//version2
    var obj_id = 0;  //画像のid
    var old_id=null;  //一つ前のオブジェクトのidf
    var image = new Array("img/0.png","img/1.png","img/2.png","img/3.png");     //吹き出し画像情報
    var img = new Image();
    var objArr = [];  //キープかどうか調べる 0:削除化　1:キープ

    


    function deleteCanvas(obj_id){
      if(objArr[obj_id]==0){
        $("#canvas"+obj_id).animate({
          opacity:0
        },1000,'swing',function(){ $("#canvas"+obj_id).remove();});
      }
    }

     // Canvasを追加し、追加されたCanvasを返す。 
    function addCanvas(width, height) {
      var screen = document.getElementById('screen');
        // idは 'canvas[n]' (nは要素数) とする
      var id = 'canvas' + obj_id.toString();
      var left = Math.random()*690;
      var top= Math.random()*440;

        // Canvas要素を追加
      $('#screen').prepend(
            $('<canvas></canvas>')
                .attr('ondblclick','obj_keep('+obj_id+')')
                .attr('id', id)
                .attr('width', width)
                .attr('height', height)
                .attr('style','position: absolute; left: '+left+'px; top: '+top+'px;')
        );

        objArr.push(0);

        setTimeout('deleteCanvas('+obj_id+')',10000);   //秒後に消去
          obj_id++;

        // ブラウザが未対応の場合はnullを返す
        var canvas = document.getElementById(id);
        if (!canvas || !canvas.getContext)
            return null;
        return canvas;
    }
     
     // テキスト処理
    function initContext(canvas, context,text,user_name) {
        // 中にテキストを描画
            context.font ="23px 'sans-serif'"
            context.fillStyle = "black";
            var x = 30;
            var y = canvas.height/3 -5;
            fillTextLine(context,text ,x, y);
            // context.fillText(text, x, y);//, canvas.width);
           
            context.font ="20px 'sans-serif'"
            var x =150;
            var y = 3*canvas.height/4 -5;
            context.fillText('by '+user_name, x, y);//, canvas.width);
        // ドラッグ可能にする
        $(canvas).draggable({ containment: '#screen',
                              scroll: false });
    }

   

var fillTextLine = function(context, text, x, y) {
  var textList = text.split('\n');
  var lineHeight = context.measureText("あ").width;
  // console.log(i);
  textList.forEach(function(text, i) {
    context.fillText(text, x, y+lineHeight*i);
  });
};

/*y
  [0,1]
  y-lineheight*

*/

     
     // オブジェクトを追加 
                                        //誰かがつぶやいたら作成
    function addObj(user_name,text,image_num) {

      img.src = image[image_num]; //画像取得
        // Canvasを取得
        var width = 300;
        var height = 150;
        var canvas = addCanvas(width, height);
        if (!canvas) return false;
        // 四角形を描画
        var context = canvas.getContext('2d');
        img.onload=function(){
          context.beginPath();
          context.drawImage(img,0,0,width,height);
          initContext(canvas, context,text,user_name); //文字処理
      }
    }





      //データベースに送信
    function addData(num){
      $.get('add.php',{
        text: $("#text").val(),
        user_name: "<?php echo $user_name; ?>",
        user_id: "<?php echo $user_id; ?>",
        image_num : num
      },function(data){
        console.log(num);
      }); 
    }

      //データベースが更新されたら送信
    function checkUpdate() {
      $.get('checkUpdate.php', {
        old_id: old_id
      }, function(data) {
        console.log(data);
        if((data=="false")){  //更新なし
        }else if(!isNaN(data)){ //一回目
          old_id = data;    
        }else{  //更新アリ
          addObj(data.user_name,data.text,data.image_num);
          old_id = data.id;
        }
         checkUpdate();
      });
    }

      //ダブルクリックで、ツイートをキープ
    function obj_keep(obj_id){

      var left =$("#canvas"+obj_id).css('left');
      var top = $("#canvas"+obj_id).css('top');
      console.log($("#canvas"+obj_id).css('left'));

      if(objArr[obj_id]==1){
        objArr[obj_id]=0;
        $("#canvas"+obj_id).animate({
          opacity:1
        },1000);
        setTimeout('deleteCanvas('+obj_id+')',10000);  
      }else if(objArr[obj_id]==0){
        objArr[obj_id]=1;
        
        $("#canvas"+obj_id).animate({
          opacity:0.8
        },1000);

      }
    console.log(left);
    console.log($("#canvas"+obj_id).css('left'));
    }
    $(document).ready(function(){
      checkUpdate();


    });







  // });

  </script>
  <title>吹き出しテスト</title>
</head>

<body>

  
<div class="container">


  <script language="JavaScript">
<!--
      window.document.onkeypress=lineCheck;
      function lineCheck(e){
      var ta=document.getElementById("text");
      var row=ta.getAttribute("rows");
      var r=(ta.value.split("\n")).length;

     

      if(document.all){
      if(r>=row && window.event.keyCode==13){ //keyCode for IE
      return false; //入力キーを無視
      }
      } else {
      if(r>=row && e.which==13){ //which for NN
      return false;
      }
      }
      }

      

//-->
</script>
  <textarea id="text" style="resize:none;" name="text" rows="3" cols="20" wrap="hard" onChange="check()"></textarea>
<!-- </span> -->




    <div class="btn-group-vertical">
    <button type="button" class="btn btn-info" onclick="addData(0)">モワモワ</button>
    <button type="button" class="btn btn-default" onclick="addData(1)">シンプル</button>
    <button type="button" class="btn btn-success" onclick="addData(2)">カクカク</button>
    <button type="button" class="btn btn-danger" onclick="addData(3)">ギザギザ</button>
  </div>
  <!-- </form> -->
  <div class="form-group">
  <div id="screen">
  </div>
</div>
</div>


</body>
</html>

