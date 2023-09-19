let loop=0;
//初期表示
$(function(){   
    let url = location.href;
    if(url == 'http://localhost/influencer_education/public/admin/banner'){
        loop=$('.loop').text();
        console.log(loop);

        
    };
    
});



//変更画像のプレビュー
$(document).on('change','.bannerFile',function(){ 
    console.log('ファイル');
    let id = $(this).prev();
    let elem = this;
    let fileReader = new FileReader();
    fileReader.readAsDataURL(elem.files[0]);                   
    fileReader.onload = (function () {                          
        let imgTag = `<img class="w-100 mx-4" src='${fileReader.result}'>`         
        id.html(imgTag);            
    });
    
});

//入力欄の追加
$(document).on('click','#bannerCreate',function(){
   // let click = i++;
    loop++;
    $test = 'none';
    console.log('新規'+loop);
    $('#bannerBlock').append(
        "<div class='d-flex align-items-center ms-lg-5 ps-5 my-2'>"+
            "<div class='w-25 me-5'>"+
                "<img class='w-100 mx-4' src='../storage/img/none.jpg'>"+
            "</div>"+
            "<input class='bannerFile' type='file' name='image"+loop+"'>"+
            "<input class='d-none' type='text' name='"+loop+"' value='"+$test+"'>"+
            "<button class='btn fw-bold fs-3 mx-4 bg-danger text-white rounded-circle  border border-white bannerDelete' type='button' name='"+loop+"' id='"+$test+"'>ー</button>"+
        "</div>"
    )
});

//削除
$(document).on('click','.bannerDelete',function(){
    $loopNum = $(this).attr('name');
    $delNum = $(this).attr('id');
    $imgUrl = $("#image"+$loopNum).attr('src');
    $imgPath = $imgUrl.substr(11);
    console.log($imgUrl );

    if(!confirm($loopNum+'番目のバナー画像を削除しますか？')){
        return false;
    }else{
        console.log('削除'+$delNum);
        var data = {
            'id' : $delNum,
            'imgPath' : $imgPath,
        };

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            type:'POST',
            async: true,
            timeout: 10000,
            url:'banner/delete',
            datatype: 'json',
            data: data

        }).done(function (){
           console.log('接続できました');
            return false;

        }).fail(function(jqXHR, textStatus, errorThrown){
            console.log('ファイルの取得に失敗しました。');
                        console.log("ajax通信に失敗しました");
                        console.log("jqXHR          : " + jqXHR.status); 
                        console.log("textStatus     : " + textStatus);    
                        console.log("errorThrown    : " + errorThrown.message);
                        console.log("URL            : " + url);
        }).always(function() {

        });
    }
});

