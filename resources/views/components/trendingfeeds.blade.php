<div class="htavb">
    <h4 class="mt-3 mkuytg">Trending Feeds</h4>
    <div class="news-col-content">
        @if($trending->count() > 0)
        
            @foreach ($trending as $key => $value)
                {!! $value->description !!}
                <div class="like_share">
                    <a class="hyujh45" href="#" onclick="showComment('{{ $value->id }}')">{{ $value->comment }} Comment</a>
                    <a class="jkyts778 sharei" href="javascript:void(0);">Share</a>
                    {{-- <p class="result"></p> --}}
                </div>
                <hr />
            @endforeach
        @endif
    </div>
</div>

