<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('assets/vendors/jquery/jquery-3.5.0.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/webfonts/inter/inter.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-app.js"></script>

    <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
    <script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-analytics.js"></script>

    <!-- Add Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-firestore.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>

    <script>
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
            apiKey: "AIzaSyBYdmaLCYwLqeU-Ud8G2T6Dnww5eS_a8II",
            databaseURL: "https://hippacompliant-6c5ef-default-rtdb.firebaseio.com",
            authDomain: "hippacompliant-6c5ef.firebaseapp.com",
            projectId: "hippacompliant-6c5ef",
            storageBucket: "hippacompliant-6c5ef.appspot.com",
            messagingSenderId: "1023196025670",
            appId: "1:1023196025670:web:0168e6bd37700ab77acb47",
            measurementId: "G-804ZHKGB3H"
        };
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();

        const messaging = firebase.messaging();

        messaging
            .requestPermission()
            .then(function() {
                return messaging.getToken()
            })
            .then(function(token) {
                console.log(token);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{ route('save_device_token') }}',
                    type: 'POST',
                    data: {
                        token: token
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        console.log('Token saved successfully.');
                    },
                    error: function(err) {
                        console.log('User Chat Token Error' + err);
                    },
                });

            }).catch(function(err) {
                console.log('User Chat Token Error' + err);
            });

        messaging.onMessage(function(payload) {
            const noteTitle = payload.notification.title;
            const noteOptions = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };
            new Notification(noteTitle, noteOptions);
        });


        var ref = firebase.database().ref("user_id_{{ auth()->user()->id }}/web_notification");

        let newItems = false;
        ref.on('child_added', function(snapshot) {
            var snotificaton = snapshot.val();
            if (snotificaton.url == "block") {
                var blockkks =
                    '<li class="list-group-item"><div class="media"><div class="btn btn-danger btn-icon rounded-circle text-light mr-2"><i class="fa fa-ban" style="color:white;font-size:50px;"></i></div><div class="media-body"><h6><a href="' +
                    snotificaton.url + '">' +
                    snotificaton.text + '</a></h6><p class="text-muted mb-0">25 mins ago</p></div></div></li>';
            } else {
                var blockkks =
                    '<li class="list-group-item"><div class="media"><div class="btn btn-primary btn-icon rounded-circle text-light mr-2"><!-- Default :: Inline SVG --><svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg><!-- Alternate :: External File link --><!-- <img class="injectable hw-24" src="./../assets/media/heroicons/outline/check-circle.svg" alt=""> --></div><div class="media-body"><h6><a href="' +
                    snotificaton.url + '">' +
                    snotificaton.text + '</a></h6><p class="text-muted mb-0">25 mins ago</p></div></div></li>';


            }
            $('#notifiy').append(blockkks);
            if (!newItems) {
                return
            }

            toastr.options.timeOut = 1500; // 1.5s 
            console.log(snotificaton);
            if (snotificaton.blocked == "1" || snotificaton.un_blocked == "1") {
                location.reload();
            } else {
                toastr.success('<a href=' + snotificaton.url + '>' + snotificaton.text + '</a>');

            }

        });


        ref.once('value', () => {
            newItems = true
        })
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="chats-tab-open">

    <!-- Main Layout Start -->
    <div class="main-layout">
        <!-- Navigation Start -->
        <div class="navigation navbar navbar-light bg-primary">
            <!-- Logo Start -->
            <a class="d-none d-xl-block bg-light rounded p-1" href="./../index.html">
                <!-- Default :: Inline SVG -->
                <svg height="30" width="30" viewBox="0 0 512 511">
                    <g>
                        <path
                            d="m120.65625 512.476562c-7.25 0-14.445312-2.023437-20.761719-6.007812-10.929687-6.902344-17.703125-18.734375-18.117187-31.660156l-1.261719-41.390625c-51.90625-46.542969-80.515625-111.890625-80.515625-183.992188 0-68.816406 26.378906-132.101562 74.269531-178.199219 47.390625-45.609374 111.929688-70.726562 181.730469-70.726562s134.339844 25.117188 181.730469 70.726562c47.890625 46.097657 74.269531 109.382813 74.269531 178.199219 0 68.8125-26.378906 132.097657-74.269531 178.195313-47.390625 45.609375-111.929688 70.730468-181.730469 70.730468-25.164062 0-49.789062-3.253906-73.195312-9.667968l-46.464844 20.5c-5.035156 2.207031-10.371094 3.292968-15.683594 3.292968zm135.34375-471.976562c-123.140625 0-216 89.816406-216 208.925781 0 60.667969 23.957031 115.511719 67.457031 154.425781 8.023438 7.226563 12.628907 17.015626 13.015625 27.609376l.003906.125 1.234376 40.332031 45.300781-19.988281c8.15625-3.589844 17.355469-4.28125 25.921875-1.945313 20.132812 5.554687 41.332031 8.363281 63.066406 8.363281 123.140625 0 216-89.816406 216-208.921875 0-119.109375-92.859375-208.925781-216-208.925781zm-125.863281 290.628906 74.746093-57.628906c5.050782-3.789062 12.003907-3.839844 17.101563-.046875l55.308594 42.992187c16.578125 12.371094 40.304687 8.007813 51.355469-9.433593l69.519531-110.242188c6.714843-10.523437-6.335938-22.417969-16.292969-14.882812l-74.710938 56.613281c-5.050781 3.792969-12.003906 3.839844-17.101562.046875l-55.308594-41.988281c-16.578125-12.371094-40.304687-8.011719-51.355468 9.429687l-69.554688 110.253907c-6.714844 10.523437 6.335938 22.421874 16.292969 14.886718zm0 0"
                            data-original="#000000" class="active-path" data-old_color="#000000" fill="#665dfe">
                        </path>
                    </g>
                </svg>

                <!-- Alternate :: External File link -->
                <!-- <img class="injectable" src="./../assets/media/logo.svg" alt=""> -->
            </a>
            <!-- Logo End -->

            <!-- Main Nav Start -->
            <ul class="nav nav-minimal flex-row flex-grow-1 justify-content-between flex-xl-column justify-content-xl-center"
                id="mainNavTab" role="tablist">

                <!-- Chats Tab Start -->
                <li class="nav-item">
                    <a class="nav-link p-0 py-xl-3 active" id="chats-tab" href="#chats-content" title="Chats">
                        <!-- Default :: Inline SVG -->
                        <svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z">
                            </path>
                        </svg>

                        <!-- Alternate :: External File link -->
                        <!-- <img class="injectable hw-24" src="./../assets/media/heroicons/outline/chat-alt-2.svg" alt="Chat icon"> -->
                    </a>
                </li>
                <!-- Chats Tab End -->
                <!-- Profile Tab Start -->
                <li class="nav-item">
                    <a class="nav-link p-0 py-xl-3" id="profile-tab" href="#profile-content" title="Profile">
                        <!-- Default :: Inline SVG -->
                        <svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <!-- Alternate :: External File link -->
                        <!-- <img class="injectable hw-24" src="./../assets/media/heroicons/outline/user-circle.svg" alt="Profile icon"> -->
                    </a>
                </li>
                <!-- Profile Tab End -->
            </ul>
            <!-- Main Nav End -->
        </div>
        <!-- Navigation End -->

        <!-- Sidebar Start -->
        @include('layouts.include.conversation_list')
        <!-- Sidebar End -->
        <!-- Main Start -->
        <main class="main @if() main main-visible @endif">
            @yield('content')

            <!-- Main End -->
            <div class="backdrop"></div>
    </div>
  

</body>

<script src="{{ asset('assets/vendors/jquery/jquery-3.5.0.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery/jquery-3.5.0.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendors/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/vendors/svg-inject/svg-inject.min.js') }}"></script>
<script src="{{ asset('assets/vendors/modal-stepes/modal-steps.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

@include('layouts.include.sweetalert')
<script>
    document.getElementById('next1').disabled = true;

    function check_group_name() {
        // console.log($('#groupName').val());
        if ($('#groupName').val() == null || $('#files').val() == null) {
            document.getElementById('next1').disabled = true;
        } else {
            document.getElementById('next1').disabled = false;

        }
    }
    // Add record
    $('#create_group_form').submit(function(e) {


        e.preventDefault();
        var form = new FormData(document.getElementById('create_group_form'));
        var token = $('#token').val();
        form.append('_token', token);
        $.ajax({
            url: '/create_group',
            type: 'post',
            data: form,
            cache: false,
            contentType: false, //must, tell jQuery not to process the data
            processData: false,

            success: function(response) {
                // console.log(response);
                document.getElementById('group_id').value = response;
                console.log(response.code);
                if (response.code == null) {
                    $('#heading').html('Group did not created');
                }
            }
        });


    });
</script>

<script>
    // Add record
    $('#account_info_form').submit(function(e) {


        e.preventDefault();
        var form = new FormData(document.getElementById('account_info_form'));
        var token = $('#token').val();
        form.append('_token', token);

        $.ajax({
            url: '/update_profile_info',
            type: 'post',
            data: form,
            cache: false,
            contentType: false, //must, tell jQuery not to process the data
            processData: false,

            success: function(response) {
                $('#phone').html(response.res.phone);
                $('#dob').html(response.res.dob);
                $('#display_name').html(response.res.name);
                $('#website').html(response.res.website);
                $('#address').html(response.res.address);
                toastr.success('Profile Information has been updated.');
            }
        });


    });
</script>



</body>

</html>
