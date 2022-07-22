@extends('layouts.user') @section('title', "Manager's Lounge")
@section('content')

    <main>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                {{-- <button type="button" class="close" data-dismiss="alert">×</button> --}}
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="container-fluid p-4 text-white">
            <div class="row">
                <div class="col-lg-8">
                    <div class="pt-3 sdjhdksmn">
                        <h3 class="sdhjdl"><b>Manager’s Lounge</b></h3>
                        <p class="mt-4">
                            Express your delight with your team’s performance or vent your anger after a miserable match. Share insider info, present strategies, and communicate all things football and fantasy-related with fellow players.
                        </p>
                        <div class="jkasdhd78">
                            <form action="{{ url('store-post') }}" method="POST" id="postForm">
                                @csrf
                                <input id="div_editor1" name="description" />
                            </form>
                        </div>
                        <button class="mt-4 sdhsjd98" id="storePost">+ Create Post</button>

                        @foreach ($post as $key => $value)
                            <div class="comment-sec">
                                <div class="comments">
                                    {{-- <h5 class="mt-5">Nestlevera</h5>
                              <p class="mt-3">
                                  Suspendisse tincidunt, eros non commodo tristique, turpis elit
                                  placerat mauris. Suspe ndisse tincidunt, eros non commodo
                                  tristique, turpis elit placerat mauris Suspendisse tincidunt,
                                  eros non commodo tristique, turpis elit placerat mauris. Suspe
                                  ndisse tincidunt, eros non commodo tristique, turpis elit
                                  placerat mauris
                              </p> --}}
                                    {!! $value->description !!}
                                    <div class="sdjdhjkdnk">
                                        <div class="sdjjhd87">
                                            <a class="sdhdj89 hideShow" href="javascript:void(0)"
                                                data-keyid="{{ $value->id }}" id="hideShow">+Add Comment</a>
                                        </div>
                                        <div class="sdjsks89">
                                            <a class="sdjksj98" href="">{{ $value->comment }} Comment</a>
                                            <a class="sdkjd8909 sharei" href="#" id='share'>
                                                Share
                                                <p class="result"></p>
                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <div class="commentArea commentArea{{ $value->id }}" id="comments">
                                    <textarea class="text-white sdhfj9754 comment_text{{ $value->id }}" placeholder="Write a comment"></textarea>

                                    <div class="hsdkdf97">
                                        <button class="mt-2 sdjnhcfn90874 submit_comment"
                                            data-keyid="{{ $value->id }}">Submit</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="col-lg-4">
                   @include('components/trendingfeeds')

                    <div class="htavb">
                        <h4 class="mt-3 mkuytg">Latest Feeds</h4>
                        <div class="news-col-content">
                            @foreach ($latest as $key => $value)
                            {!! $value->description !!}
                            <div class="like_share">
                                <a class="hyujh45" href="#">{{ $value->comment }} Comment</a>
                                <a class="jkyts778 sharei" href="#">Share</a>
                            </div>
                            <hr />
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection
