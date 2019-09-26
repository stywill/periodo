<nav aria-label="Page navigation example" class="mt-3">
    <ul class="pagination">
        <li class="page-item {{!$results->previousPageUrl()?'disabled':''}}"><a class="page-link" href="{{$results->previousPageUrl()}}&per_page={{$results->perPage()}}">Anterior</a></li>
        @for($i=1;$i<=$paginas;$i++)
            <li class="page-item {{$results->currentPage()===$i?'active':''}}"><a class="page-link" href="{{$results->url($i)}}&per_page={{$results->perPage()}}">{{$i}}</a></li>
        @endfor
        <li class="page-item {{!$results->nextPageUrl()?'disabled':''}}"><a class="page-link" href="{{$results->nextPageUrl()}}&per_page={{$results->perPage()}}">Próximo</a></li>
    </ul>
</nav>
