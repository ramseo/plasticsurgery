@extends('frontend.layouts.app')

@section('title') {{$$module_name_singular->name}} @endsection

@section('content')
<section id="breadcrumb-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('frontend.posts.index') }}">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$$module_name_singular->name}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<article>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 blog-detail-main-col">
                <p>
                    <span class="font-weight-bold">
                        Category:
                    </span>

                    <a href="{{route('frontend.categories.show', [encode_id($$module_name_singular->category_id), $$module_name_singular->category->slug])}}" class="badge badge-sm badge-warning text-uppercase px-3">{{$$module_name_singular->category_name}}</a>
                </p>
                <h1 class="display-3">
                    {{$$module_name_singular->name}}
                </h1>
                <div class="blog-meta">
                    <span class="">
                        <i class="fa fa-user"></i>
                        {{isset($$module_name_singular->created_by_alias)? $$module_name_singular->created_by_alias : $$module_name_singular->created_by_name}}
                    </span>
                    &nbsp;
                    <span class="post-date">
                        <i class="fa fa-calendar"></i>
                        {{$$module_name_singular->published_at_formatted}}
                    </span>
                </div>
                @include('frontend.includes.messages')
            </div>

            @php
                $post_details_url = route('frontend.posts.show',[encode_id($$module_name_singular->id), $$module_name_singular->slug]);
            @endphp
            <div class="blog-detail-content-col">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col">
                            <img class="img-fluid" src="{{$$module_name_singular->featured_image}}" alt="{{$$module_name_singular->name}}">
                            <p>{!!$$module_name_singular->content!!}</p>
                            <p>
                                @foreach ($$module_name_singular->tags as $tag)
                                <a href="{{route('frontend.tags.show', [encode_id($tag->id), $tag->slug])}}" class="badge badge-sm badge-info text-uppercase px-3">{{$tag->name}}</a>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>

<div class="blog-comments-col">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <h5 class="mb-4">
                    @if($$module_name_singular->comments->count())
                    <span class="text-primary">({{$$module_name_singular->comments->count()}})</span>
                    @endif

                    @lang('Comments')
                </h5>
                <div class="row">
                    @auth
                    <div class="col-12 align-self-center">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#commentForm" role="button" aria-expanded="false" aria-controls="commentForm"><i class="far fa-comment-alt"></i> Write new comment</a>
                        </p>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col align-self-center">
                            <div class="collapse multi-collapse" id="commentForm">
                                <div class="card card-body">
                                    <p>
                                        Your comment will be in the moderation queue. If your comment will be approved, you will get notification and it will be displayed here.
                                        <br>
                                        Please submit once & wait till published.
                                    </p>

                                    {{ html()->form('POST', route("frontend.comments.store"))->class('form')->open() }}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <?php
                                                $field_name = 'name';
                                                $field_lable = "Subject";
                                                $field_placeholder = $field_lable;
                                                $required = "required";
                                                ?>
                                                {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
                                                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <?php
                                                $field_name = 'comment';
                                                $field_lable = "Details Comment";
                                                $field_placeholder = $field_lable;
                                                $required = "required";
                                                ?>
                                                {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
                                                {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required", "rows"=>5]) }}
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    $field_name = 'post_id';
                                    $field_lable = label_case($field_name);
                                    $field_placeholder = $field_lable;
                                    $required = "required";
                                    ?>
                                    {{ html()->hidden($field_name)->value(encode_id($$module_name_singular->id))->attributes(["$required"]) }}

                                    <?php
                                    $field_name = 'user_id';
                                    $field_lable = label_case($field_name);
                                    $field_placeholder = $field_lable;
                                    $required = "required";
                                    ?>
                                    {{ html()->hidden($field_name)->value(encode_id(auth()->user()->id))->attributes(["$required"]) }}

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                {{ html()->button($text = "<i class='fas fa-save'></i> Submit", $type = 'submit')->class('btn btn-success') }}
                                            </div>
                                        </div>
                                    </div>

                                    {{ html()->form()->close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endauth
                    @guest
                    <div class="col-12 col-sm-6 align-self-center">
                        <p>
                            <a href="{{route('login')}}?redirectTo={{url()->current()}}" class="btn btn-primary btn-block"><i class="fas fa-user-shield"></i> Login & Write comment</a>
                        </p>
                    </div>
                    @endguest
                </div>

                <div>
                    <div class="mt-5">
                        @php
                        $comments_all = $$module_name_singular->comments;
                        $comments_level1 = $comments_all->where('parent_id','');
                        @endphp

                        @foreach ($comments_level1 as $comment)
                        <div class="card bg-soft rounded p-4 mb-4">
                            <div class="d-flex justify-content-between mb-4">
                                <span class="font-small">
                                    <a href="#"><img class="avatar-sm img-fluid rounded-circle mr-2" src="{{asset('img/avatars/'.rand(1,8).'.jpg')}}" alt="avatar" /> <span class="font-weight-bold">{{$comment->user_name}}</span> </a>
                                    <span class="ml-2">2 min ago</span>
                                </span>
                                <div>
                                    <button class="btn btn-link text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Report comment"><i class="far fa-flag"></i></button>
                                </div>
                            </div>

                            <p class="m-0">
                                {{$comment->name}}
                            </p>
                            <p class="m-0">
                                {!!$comment->comment!!}
                            </p>

                            <div class="mt-4 mb-3 d-flex justify-content-between">
                                <div>
                                    <i class="far fa-thumbs-up text-action text-success mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Like comment"></i>
                                    <i class="far fa-thumbs-down text-action text-danger mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dislike comment"></i>
                                    <span class="font-small font-weight-light">4 likes</span>
                                </div>

                                @auth
                                <button type="button" id="replyBtn{{encode_id($comment->id)}}" class="btn btn-outline-primary btn-sm float-right m-0" data-toggle="collapse" href="#replyForm{{encode_id($comment->id)}}" role="button" aria-expanded="false" aria-controls="replyForm{{encode_id($comment->id)}}"><i class="fas fa-reply mr-2"></i> Reply</button>

                                @else
                                <a href="{{route('login')}}?redirectTo={{url()->current()}}" class="btn btn-primary btn-sm float-right m-0"><i class="fas fa-user-shield"></i> Login & Reply</a>

                                @endauth
                            </div>
                            @auth
                            <div class="collapse multi-collapse" id="replyForm{{encode_id($comment->id)}}">
                                <p>
                                    {{ html()->form('POST', route("frontend.comments.store"))->class('form')->open() }}

                                    <?php
                                    $field_name = 'parent_id';
                                    $field_lable = label_case($field_name);
                                    $field_placeholder = $field_lable;
                                    $required = "required";
                                    ?>
                                    {{ html()->hidden($field_name)->value(encode_id($comment->id))->attributes(["$required"]) }}

                                    <?php
                                    $field_name = 'post_id';
                                    $field_lable = label_case($field_name);
                                    $field_placeholder = $field_lable;
                                    $required = "required";
                                    ?>
                                    {{ html()->hidden($field_name)->value(encode_id($$module_name_singular->id))->attributes(["$required"]) }}

                                    <?php
                                    $field_name = 'user_id';
                                    $field_lable = label_case($field_name);
                                    $field_placeholder = $field_lable;
                                    $required = "required";
                                    ?>
                                    {{ html()->hidden($field_name)->value(encode_id(auth()->user()->id))->attributes(["$required"]) }}

                                    <?php
                                    $field_name = 'name';
                                    $field_lable = label_case($field_name);
                                    $field_placeholder = $field_lable;
                                    $required = "required";
                                    ?>
                                    {{ html()->hidden($field_name)->value("Reply of ".$comment->name)->attributes(["$required"]) }}

                                    <div class="row">
                                        <div class="col-9">
                                            <div class="form-group">
                                                <?php
                                                $field_name = 'comment';
                                                $field_lable = "Reply";
                                                $field_placeholder = $field_lable;
                                                $required = "required";
                                                ?>
                                                <!-- {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!} -->
                                                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="form-group">
                                                {{ html()->button($text = "<i class='fas fa-save'></i> Submit", $type = 'submit')->class('btn btn-success m-0') }}
                                            </div>
                                        </div>
                                    </div>

                                    {{ html()->form()->close() }}
                                </p>
                            </div>
                            @endauth

                            <div class="collapse" id="replyContainer1">
                                <textarea class="form-control border" placeholder="Reply to John Doe" rows="6" data-bind-characters-target="#charactersRemainingReply" maxlength="1000"></textarea>
                                <div class="d-flex justify-content-between mt-3">
                                    <small class="font-weight-light"><span id="charactersRemainingReply">1000</span> characters remaining</small> <button class="btn btn-primary btn-sm animate-up-2">Send</button>
                                </div>
                            </div>
                        </div>

                        @php
                        $comments_of_comment = $comments_all->where('parent_id', $comment->id);
                        @endphp

                        @if ($comments_of_comment)
                        @foreach ($comments_of_comment as $comment_reply)
                        <div class="card bg-soft rounded p-4 ml-5 mb-4">
                            <div class="d-flex justify-content-between mb-4">
                                <span class="font-small">
                                    <a href="#"><img class="avatar-sm img-fluid rounded-circle mr-2" src="{{asset('img/avatars/'.rand(1,8).'.jpg')}}" alt="avatar" /> <span class="font-weight-bold">{{$comment_reply->user_name}}</span> </a>
                                </span>
                                <div>
                                    <button class="btn btn-link text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Report comment"><i class="far fa-flag"></i></button>
                                </div>
                            </div>

                            <p class="m-0">
                                {!!$comment_reply->comment!!}
                            </p>
                        </div>
                        @endforeach
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push ("after-scripts")
<script src="https://cdn.jsdelivr.net/npm/sharer.js@latest/sharer.min.js"></script>
@endpush
