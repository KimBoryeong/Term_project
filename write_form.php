<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Document</title>
<!-- include libraries(jQuery, bootstrap) -->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <link href="write_form.css?after" type="text/css" rel="stylesheet">
</head>

<body>
    <?php 
        require_once("BoardDao.php");
		require_once("tools.php");
		
		$num = requestValue("num");
        $page = requestValue("page");
        $writer = requestValue("writer");
    ?>
    <center>
        <img src="order_form_text.png" id="order_img" />
        <div class="container" id="form_container">
            <form action="write.php" method="post">
                <div class="form-group">
                    <div id="img">
                        <img src="title.png" id="title_img" />
                    </div>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>

                <div class="form-group" id="img">
                    <div>
                        <img src="writer.png" id="writer_img" />
                    </div>
                    <input type="text" id="writer" name="writer" class="form-control" required>
                </div>

                <div class="form-group" id="img">
                    <div>
                        <img src="naiyou.png" id="naiyou_img" />
                    </div>
                    <div class="form-group">
                        <textarea class="summernote" name="content" rows="8" required></textarea>
                    </div>
                    <button type="submit"id="okBtn"><img src="okBtn.png"/></button>
                    <!-- <img src="listBtn.png" id="listBtn" onclick="location.href='board.php?page=<?= $page ?>'" /> -->
                </div>
            </form>
        </div>
    </center>
    <script>
        $(function (){
        $('.summernote').summernote({ //스마트 에디터 summernote탑재 그리고 에디터 기본 UI설정
        height: 350, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: false, // set focus to editable area after initializing summernote
        placeholder: "글을 쓰거나 이미지를 드래그 해보세요",
        lang: 'ko-Kr',
        codemirror: {
          lineNumbers:true,
          tabSize:2,
          theme:"solarized ligth"
        },
        callbacks:{
          onImageUpload: function(image){  //summernote 내장 이벤트
          editor = $(this);
          uploadImageContent(image[0], editor);
        }
        }
      });
        
      function uploadImageContent(image, editor){
        var data = new FormData();
        data.append("image", image);
        $.ajax({
          data: data,
          type: "post",
          url: "imageUpload.php",
          cache: false, 
          contentType: false, 
          processData: false,
          success: function(url){
            var image = $('<img>').attr('src', url);
            $(editor).summernote("insertNode", image[0]);
          },
          error:function(data){
            console.log(data);
          }
        });
      }
        });
    </script>
</body>

</html>
