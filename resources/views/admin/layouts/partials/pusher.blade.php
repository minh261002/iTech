<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
    var pusher = new Pusher('3cc7a46e532c9e22baf5', {
        cluster: 'ap1',
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

        var html = `
            <a href="javascript:void(0);" class="dropdown-item notify-item text-muted link-primary active">
                <div class="notify-icon">
                    <img src="${data.image}" class="img-fluid rounded-circle" alt="" />
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <p class="notify-details">${data.title}</p>
                    <small class="text-muted">${data.created_at}</small>
                </div>
                <p class="mb-0 user-msg">
                    <small class="fs-14">${data.content}</small>
                </p>
            </a>
        `;
    });
</script>
