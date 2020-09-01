<script>
    $(function() {
        //商品筛选
        var page = 1;
        category_id = {{ $category_id  }};

        $("body").on("click",".screen .category-tab li", function () {
            $(this).addClass("active").siblings("li").removeClass("active");
            category_id = $(this).attr('category_id');
            var type = $(this).attr('type');
            var that = $(this);
            var this_index = $(".screen ul").index($(this).parent());
			showLoading();
            $.ajax({
                url : url,
                data : {'page':page,'category_id' : category_id,'search_key':"{{ $search_key }}",'_token':"{!! csrf_token() !!}"},
                type : 'get',
                dataType : "json",
                success : function (data) {
                    var html = data.data.content;
					hideLoading();
                    if(html)
                    {
                        $(".case-list").html(html);
                    }
                    $(".screen ul").each(function(index,el){
                        console.log(index)
                        if(index > this_index)
                        {
                            $(this).fadeOut(200).remove();
                        }
                    });

                    $("#category_html").html(data.data.category_html);

                },
                error : function (jqXHR, textStatus, errorThrown) {
                    responseText = $.parseJSON(jqXHR.responseText);
                    var message =  responseText.msg;
                    if(!message)
                    {
                        message = '服务器错误';
                    }
                }
            });
        })

    })

</script>