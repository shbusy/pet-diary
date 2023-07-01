<div class="col-lg-12">{{--본문--}}
    <div style="margin: 16px;">
        <a class="list-group-item flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h6 class="mb-1"><strong>{{ $post->title }}</strong></h6>
                <small class="text-muted">{{ $post->created_at_format }}</small>
            </div>
            <div class="d-flex w-100 justify-content-between">
                <p class="mb-1">{{ $post->content }}</p>
            </div>
        </a>
    </div>
</div>
