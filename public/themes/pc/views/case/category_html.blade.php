<div class="container w1400">

    <ul class="one-tab clearfix category-tab" style="display: block">
        @foreach($categories as $key => $category)
            <li category_id="{{ $category['id'] }}" type="child" @if($category['id'] == $category_id) class="active" @endif>{{ $category['name'] }}</li>
        @endforeach
    </ul>

</div>