<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/webfonts/inter/inter.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ asset('assets/vendors/jquery/jquery-3.5.0.min.js') }}"></script>

</head>

<body class="chats-tab-open">
        @php
            $url = str_replace('/{id}/{name}','',Route::currentRouteName());
        @endphp
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
                            data-original="#000000" class="active-path" data-old_color="#000000" fill="#665dfe" />
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
                                d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
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
        @include('layouts.include.conversation_list')

        <!-- Main Start -->
        <main class="main @if($url == 'Conversation') main-visible @endif">

            @yield('content')
            <!-- Chats Page End -->
 
            @include('layouts.include.profile_tab')
            <!-- Profile Settings End -->

        </main>
          <!-- Modal 2 :: Create Group -->
    <div class="modal modal-lg-fullscreen fade" id="createGroup" tabindex="-1" role="dialog"
    aria-labelledby="createGroupLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-dialog-zoom">
        <form method="post" id="create_group_form" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title js-title-step" id="createGroupLabel">&nbsp;</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body py-0 hide-scrollbar">
                    <div class="row hide pt-2" data-step="1" data-title="Create a New Group">

                        <div class="col-12">
                            <div class="form-group">
                                <label for="groupName">Group name</label>
                                <input type="text" onkeypress="check_group_name()" required name="group_name"
                                    class="form-control form-control-md" id="groupName"
                                    placeholder="Type group name here">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Choose profile picture</label>
                                <div class="custom-file">
                                    <input type="file" required name="files" id="files"
                                        class="custom-file-input" id="profilePictureInput" accept="image/*">
                                    <label class="custom-file-label" for="profilePictureInput">Choose
                                        file</label>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-0">
                                        <label>Group privacy</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group rounded p-2 border">
                                        <div class="custom-control custom-radio">
                                            <input class="form-check-input" required type="radio"
                                                name="group_privacy" id="exampleRadios1" value="public"
                                                checked="">
                                            <label class="form-check-label" for="exampleRadios1">
                                                Public group
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group rounded p-2 border">
                                        <div class="custom-control custom-radio">
                                            <input class="form-check-input" required type="radio"
                                                name="group_privacy" id="exampleRadios2" value="private">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Private group
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link text-muted js-btn-step mr-auto"
                                data-orientation="cancel" data-dismiss="modal"></button>
                            <button type="button" class="btn btn-secondary  js-btn-step"
                                data-orientation="previous"></button>

                            <button type="submit" id="next1" class="btn btn-primary js-btn-step"
                                data-orientation="next"></button>
                        </div>

                    </div>
                    <input type="hidden" id="token" value="{{ csrf_token() }}">
        </form>


        <div class="row hide pt-2" data-step="2" data-title="Add Group Members">
            <div class="col-12 px-0">
                <!-- Search Start -->
                <div class="input-group w-100 bg-light">
                    <input type="text"
                        class="form-control form-control-md search border-right-0 transparent-bg pr-0"
                        placeholder="Search...">
                    <div class="input-group-append">
                        <div class="input-group-text transparent-bg border-left-0" role="button">
                            <!-- Default :: Inline SVG -->
                            <svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>

                            <!-- Alternate :: External File link -->
                            <!-- <img class="injectable hw-20" src="./../assets/media/heroicons/outline/search.svg" alt=""> -->
                        </div>
                    </div>
                </div>
                <!-- Search End -->
            </div>
            <form method="post" id="add_member_form" class="col-sm-12">
                <input type="hidden" id="token" value="{{ csrf_token() }}">

                <div class="col-12 px-0">
                    <!-- List Group Start -->
                    <ul class="list-group list-group-flush">
                        @php
                            $all_user = App\Models\User::where('id', '!=', Auth::user()->id)
                                ->where('role', '!=', 1)
                                ->get();
                        @endphp
                        @if ($all_user->count() > 0)
                            @foreach ($all_user as $all_users)
                                <!-- List Group Item Start -->
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="avatar avatar-online mr-2">
                                            <img src="{{ asset('/assets/media/avatar') }}/{{ $all_users->avatar ?? 'avatar.png' }}"
                                                alt="">
                                        </div>

                                        <div class="media-body">
                                            <h6 class="text-truncate">
                                                <a href="#" class="text-reset">{{ $all_users->name }}</a>
                                            </h6>

                                        </div>

                                        <div class="media-options">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox"
                                                    name="participants_id" value="{{ $all_users->id }}"
                                                    id="chx-user-{{ $all_users->id }}">
                                                <label class="custom-control-label"
                                                    for="chx-user-{{ $all_users->id }}"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="media-label" for="chx-user-{{ $all_users->id }}"></label>
                                </li>


                                <script>
                                    // Add record
                                    $('#add_member_form').submit(function(e) {


                                        e.preventDefault();
                                        var form = new FormData(document.getElementById('add_member_form'));
                                        var token = $('#token').val();
                                        form.append('_token', token);
                                        var checked_box = document.getElementById("chx-user-{{ $all_users->id }}");

                                        if (checked_box.checked == true) {

                                            $.ajax({
                                                url: '/add_member/{{ $all_users->id }}',
                                                type: 'post',
                                                data: form,
                                                cache: false,
                                                contentType: false, //must, tell jQuery not to process the data
                                                processData: false,

                                                success: function(response) {

                                                }
                                            });
                                        }

                                    });
                                </script>
                            @endforeach
                        @else
                            No users found.
                        @endif
                        <!-- List Group Item End -->
                        <input type="hidden" id="group_id" name="group_id">

                    </ul>
                    <!-- List Group End -->
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link text-muted js-btn-step mr-auto"
                        data-orientation="cancel" data-dismiss="modal"></button>

                    <button type="submit" class="btn btn-primary js-btn-step" data-orientation="next"></button>
                </div>
            </form>
        </div>

        <div class="row pt-2 h-100 hide" data-step="3" data-title="Finished">
            <div class="col-12">
                <div class="d-flex justify-content-center align-items-center flex-column h-100"
                    id="gorup_message_div">
                    <div class="btn btn-success btn-icon rounded-circle text-light mb-3">
                        <!-- Default :: Inline SVG -->
                        <svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7"></path>
                        </svg>

                        <!-- Alternate :: External File link -->
                        <!-- <img class="injectable hw-24" src="./../assets/media/heroicons/outline/check.svg" alt=""> -->
                    </div>
                    <h6 id="heading">Group Created Successfully</h6>
                    <p class="text-muted text-center">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Dolores cumque laborum fugiat vero pariatur provident!</p>
                </div>
            </div>
        </div>
    </div>
</div>
        <div class="modal modal-lg-fullscreen fade" id="notificationModal" tabindex="-1" role="dialog"
        aria-labelledby="notificationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-dialog-zoom">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notificationModalLabel">Notifications</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0 hide-scrollbar">
                    <div class="row">

                        <div class="col-12">
                            <!-- List Group Start -->
                            <ul class="list-group list-group-flush  py-2">
                                <!-- List Group Item Start -->
                                <div id="notifiy"></div>
                                <!-- List Group Item End -->


                            </ul>
                            <!-- List Group End -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <a type="button" data-dismiss="modal" aria-label="Close" class="btn btn-link text-muted">Close</a>
                </div>
            </div>
        </div>
    </div>
        @include('layouts.include.script')

        @stack('custom_js')
</body>
