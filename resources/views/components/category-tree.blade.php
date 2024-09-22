@if ($child->childrens->count() > 0)
    <details class="style2" style="margin-left: 30px">
        <summary>{{ $child->name }}</summary>


        @foreach ($child->childrens as $child)
            <x-category-tree :child="$child" />
        @endforeach
    </details>
@else
<div class="content content-x" style="margin-left: 20px">
    <a href="">{{ $child->name }}</a>
</div>
@endif

