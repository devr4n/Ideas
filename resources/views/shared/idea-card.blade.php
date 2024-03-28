<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                     src="{{ optional($idea->user)->getImageUrl() }}"
                     alt="{{ optional($idea->user)->name }}">
                <div>
                    <h5 class="card-title mb-0">
                        @if ($idea->user)
                            <a href="{{ route('users.show', $idea->user->id) }}">
                                {{ $idea->user->name }}
                            </a>
                        @endif
                    </h5>

                </div>
            </div>
            <div>
                <form method="post" action="{{ route('ideas.destroy',$idea->id) }}">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('ideas.show',$idea->id) }}" class="btn btn-info btn-sm"> View </a>
                    <a href="{{ route('ideas.edit',$idea->id) }}" class="btn btn-success btn-sm"> Update </a>
                    <button class="btn btn-danger btn-sm"> X</button>
                </form>
            </div>
        </div>

        <div class="card-body">
            @if($editing ?? false)
                <form action="{{ route('ideas.update',$idea->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <textarea name="content" class="form-control" id="content"
                                  rows="3">{{ $idea->content }}</textarea>
                        @error('content')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="">
                        <button class="btn btn-dark mb-2"> Update</button>
                    </div>
                </form>
            @else
                <p class="fs-6 fw-light text-muted">
                    {{ $idea->content }}
                </p>
            @endif
            <div class="d-flex justify-content-between">
                <div>
                    <a href="#" class="fw-light nav-link fs-6">
                        <span class="fas fa-heart me-1"> </span>
                        {{$idea->likes}}
                    </a>
                </div>
                <div>
                <span class="fs-6 fw-light text-muted">
                    <span class="fas fa-clock"> </span>
                    {{$idea->created_at}}
                </span>
                </div>
            </div>
            @include('shared.comment-box')
        </div>
    </div>
</div>
