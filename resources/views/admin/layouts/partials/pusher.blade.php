<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
    var pusher = new Pusher('3cc7a46e532c9e22baf5', {
        cluster: 'ap1'
    });
    Pusher.logToConsole = true;

    var adminId = '{{ Auth::guard('admin')->user()->id ?? 0 }}';
    var channel = pusher.subscribe(`App.Models.Admin.${adminId}`);

    channel.bind('NotificationEvent', function(data) {

        FuiToast.info(data.content, {
            title: data.title,
            isClose: true,
            position: 'top-center',
        })
    });
</script>
