@if ($firstPage != $lastPage)
    <div class="pagination">
        <a href="{{ $prevPage }}" class="btn-paginate prev"><i class="fa fa-chevron-left"></i></a>
        <ul class="paginate">
            @for($i=$firstPage;$i<=$lastPage;$i++)
                @if ($i == $currentPage)
                    <li><a class="active" href="{{ $path . '?page=' . $i }}">{{ $i }}</a></li>
                @else
                    <li><a href="{{ $path . '?page=' . $i }}">{{ $i }}</a></li>
                @endif
            @endfor
        </ul>
        <a href="{{ $nextPage }}" class="btn-paginate prev"><i class="fa fa-chevron-right"></i></a>
    </div>    
@endif
