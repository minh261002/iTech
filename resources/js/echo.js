
// import Echo from 'laravel-echo';
// import axios from 'axios';

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: '3cc7a46e532c9e22baf5',
//     cluster: 'ap1',
//     forceTLS: false,
//     authorizer: (channel, options) => {
//         return {
//             authorize: (socketId, callback) => {
//                 axios.post('http://localhost:8000/broadcasting/auth', {
//                     socket_id: socketId,
//                     channel_name: channel.name
//                 })
//                 .then(response => {
//                     callback(false, response.data);
//                 })
//                 .catch(error => {
//                     callback(true, error);
//                 });
//             }
//         };
//     },
// });

// var adminId = document.querySelector('meta[name="adminId"]').getAttribute('content');

// var channel = window.Echo.private(`App.Models.Admin.${adminId}`);
// channel.listen('NotificationEvent', function(data) {
//     alert(JSON.stringify(data));
// });
