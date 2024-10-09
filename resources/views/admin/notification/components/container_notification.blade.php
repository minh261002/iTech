@if (isset($notification))
    <div class="card-header">
        <h2 class="card-title py-2 mb-0"> {{ $notification->title }}</h2>
    </div>
    <div class="card-body" style="height:60vh; overflow-y:auto">
        {!! $notification->content !!}
    </div>
@else
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-center">
            <img src="{{ asset('admin/assets/images/4884170.jpg') }}" style="height: 64vh" />
        </div>
    </div>
@endif

<div class="card-footer">
    <p class="text-center mb-0">
        Notification push here
    </p>
</div>
