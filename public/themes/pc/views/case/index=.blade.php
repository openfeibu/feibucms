<!-- 内容 -->
<div class="main">

    <div class="container w1400">
        {!! Theme::widget('WebBreadcrumb')->render() !!}
        @if(!$search_key)
        <div class="screen wow fadeInUp animated " style="box-shadow: none;" data-wow-duration=".6s" data-wow-delay=".5s">
            <ul class="one-tab clearfix category-tab">
                <li @if($product_category_id == 0)class="active"@endif category_id='0' type="parent">全部</li>
                @foreach($top_categories as $key => $category)
                <li category_id="{{ $category->id }}" type="child" @if($category->id == $product_category_id) class="active" @endif>{{ $category->name }}</li>
                @endforeach
            </ul>
            @if($product_category_id && isset($children) && $children)
                <ul class="two-tab clearfix category-tab" style="display:block">
                    <li class="active" category_id='{{$product_category_id}}' type="parent">全部</li>
                    @foreach($children as $key => $child)
                        <li category_id="{{ $child->id }}" type="child">{{ $child->name }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        @endif
    </div>
    <div class="product-main">
        <div class="container w1400 product-list">
            @include('product.list')
        </div>
    </div>
</div>
<script>
    var url = "{{ route('pc.product.index') }}"
    var category_id;
</script>

@include('common.product_ajax')

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
                data : {'product_category_id' : category_id,'_token':"{!! csrf_token() !!}"},
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