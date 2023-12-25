<div class="category-menu category-menu-2">
    <div class="category-heading">
        <h2 class="categories-toggle"><span>categories</span></h2>
    </div>
    <div id="cate-toggle" class="category-menu-list" style="height: 330px; overflow-y: scroll; overflow-x: hidden;">
        <ul>
            @foreach ($categories as $categoryName)
                <li><a href="{{ url('/category', $categoryName->name) }}">{{ $categoryName->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
