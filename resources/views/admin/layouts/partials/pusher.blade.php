<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
    var pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
        cluster: "{{ env('PUSHER_APP_CLUSTER') }}",
        authEndpoint: '/broadcasting/auth',
        auth: {
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
        },
    });
    Pusher.logToConsole = true;

    var adminId = '{{ Auth::guard('admin')->user()->id ?? 0 }}';

    var channel = pusher.subscribe(`App.Models.Admin.${adminId}`);

    channel.bind('App\\Events\\NotificationEvent', function(data) {
        FuiToast.info(data.title, {
            title: 'Bạn có thông báo mới'
        });

        $('#countUnreadNotification').text(parseInt($('#countUnreadNotification').text()) + 1);

        let html = `
            <div class="card-body border notification-item box-noty-${data.body['notyId']} d-block mt-1 rounded border bg-light"
                data-notification-id="${data.body['notyId']}" style="cursor: pointer">

                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center notification-item-${data.body['notyId']}">
                        <div class="flex-shrink-0">
                            <i class="fa-solid fa-bell text-success" style="font-size: 32px"></i>
                        </div>
                        <div class="flex-grow-1 ms-3 text-truncate">
                            <h6 class="my-0 fw-medium text-dark fs-15">
                                ${data.title}
                            </h6>
                            <small class="text-muted fs-13 fw-medium mb-0">
                                ${formatTime(data.body['created_at'])}
                            </small>
                        </div>
                    </div>

                     <div class="delete-notification" data-notyId="${data.body['notyId']}">
                        <button class="btn btn-sm btn-danger rounded-circle">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;

        $('#notification-box').prepend(html);
    });

    channel.bind('App\\Events\\UserLoginEvent', function(data) {
        FuiToast.success('1');
    });
</script>
