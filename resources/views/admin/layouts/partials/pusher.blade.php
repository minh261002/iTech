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
        const elements = document.getElementsByClassName('toast-cus');
        const sub = document.getElementsByClassName('sub-text');
        sub[0].innerText = data.title;
        if (elements.length > 0) {
            elements[0].classList.add('show-toast-cus');
            setTimeout(() => {
                elements[0].classList.remove('show-toast-cus');
            }, 3000);
        }
        $('#countUnreadNotification').text(parseInt($('#countUnreadNotification').text()) + 1);


    });
</script>
