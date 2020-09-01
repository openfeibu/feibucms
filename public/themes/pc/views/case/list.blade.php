<div class="page-product-con clearfix wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
    @if(count($pages))
    @foreach($pages as $key => $page)
        <div class="page-product-item clearfix col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <a href="{{ route('pc.case.show',$page->id) }}" target="_blank">
                <div class="img "><img class="transition500" src="{{ '/image/original'.$page->image }}" alt=" {{ $page->title }}"></div>
                <div class="test transition">

                    <div class="title fb-overflow-1">
                        {{ $page->title }}
                    </div>

                </div>
            </a>
        </div>
    @endforeach
	@else
        <div class="nodata">
            <div class="img "><img class="transition500" src="{{ '/image/original'.setting('logo') }}" alt=" "></div>
            <div class="test">该分类没有产品，如有任何问题请联系我们</div>
        </div>
    @endif
</div>
{!! $pages->links('common.ajax_pagination') !!}