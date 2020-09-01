<!-- 内容 -->
<div class="main">

    <div class="container w1400">
        {!! Theme::widget('WebBreadcrumb')->render() !!}

        @if(!$search_key)
        <div class="screen wow fadeInUp animated " style="box-shadow: none;" data-wow-duration=".6s" data-wow-delay=".5s" id="category_html">
            @include('case.category_html')
        </div>
        @endif
    </div>
    <div class="product-main">
        <div class="container w1400 product-list case-list">
            @include('case.list')
        </div>
    </div>
</div>
<script>
    var url = "{{ route('pc.case.index') }}"
    var category_id;
</script>

@include('common.case_ajax')

<script>

    $(function() {

        $("body").on("click", ".page a", function () {
            var ajax_href= $(this).attr('ajax_href');
            if(!ajax_href || ajax_href == 'javascript' || ajax_href == '#')
            {
                return ;
            }
            showLoading();
            $.ajax({
                url : ajax_href,
                data : {'category_id' : category_id,'_token':"{!! csrf_token() !!}"},
                type : 'get',
                dataType : "json",
                success : function (data) {
                    hideLoading();
                    var html = data.data.content;
                    console.log(html);
                    if(html)
                    {
                        $(".product-list").html(html);
                    }

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