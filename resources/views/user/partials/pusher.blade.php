<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
    @if (auth()->guard('web')->check())
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

        var userId = '{{ Auth::guard('web')->user()->id ?? 0 }}';

        var channel = pusher.subscribe(`App.Models.User.${userId}`);

        channel.bind('App\\Events\\NotificationEvent', function(data) {
            var audio = new Audio('{{ asset('audio.mp3') }}');
            audio.muted = true;
            audio.play().then(() => {
                audio.muted = false;
            }).catch(error => {
                console.error('Audio playback failed:', error);
            });
            FuiToast.info(data.title, {
                title: 'Bạn có thông báo mới'
            });
        });
    @endif
</script>
