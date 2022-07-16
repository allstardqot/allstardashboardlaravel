<div class="htavb">
    <h4 class="mt-3 mkuytg">Trending Feeds</h4>
    <div class="news-col-content">
        @if($trending->count() > 0)
        
            @foreach ($trending as $key => $value)
                {!! $value->description !!}
                <div class="like_share">
                    <a class="hyujh45" href="#" onclick="showComment('{{ $value->id }}')">{{ $value->comment }} Comment</a>
                    <a class="jkyts778 sharei" href="#">Share</a>
                    <p class="result"></p>
                </div>
                <hr />
            @endforeach
        @endif
    </div>
</div>

<script>  
    const shareData = {
        title: 'All Star',
        text: "This is the All Star Football Game Online: https://allstarsfan.com/ \n Winning Pool successfully!",
        // url: 'https://mynataraja.live/',


    }
    const btni = document.querySelector('.sharei');
    const resultParai = document.querySelector('.result');

    // Share must be triggered by "user activation"
    btni.addEventListener('click', async () => {
        // alert('adfd');
        try {
            await navigator.share(shareData)
            // resultParai.textContent = 'MDN shared successfully'
        } catch (err) {
            resultParai.textContent = 'Error: ' + err
        }
    });

    </script>