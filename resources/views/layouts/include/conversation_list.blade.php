   <!-- Sidebar Start -->
   <aside class="sidebar">
       <!-- Tab Content Start -->
       <div class="tab-content">
           <!-- Chat Tab Content Start -->
           <div class="tab-pane active" id="chats-content">
               <div class="d-flex flex-column h-100">
                   <div class="hide-scrollbar h-100" id="chatContactsList">

                       <!-- Chat Header Start -->
                       <div class="sidebar-header sticky-top p-2">

                           <div class="d-flex justify-content-between align-items-center">
                               <!-- Chat Tab Pane Title Start -->
                               <h5 class="font-weight-semibold mb-0">Chats</h5>
                               <!-- Chat Tab Pane Title End -->

                               <ul class="nav flex-nowrap">

                                   <li class="nav-item list-inline-item mr-1">
                                       <a class="nav-link text-muted px-1" href="#" title="Notifications"
                                           role="button" data-toggle="modal" data-target="#notificationModal">
                                           <!-- Default :: Inline SVG -->
                                           <svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                   d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                               </path>
                                           </svg>

                                           <!-- Alternate :: External File link -->
                                           <!-- <img src="./../assets/media/heroicons/outline/bell.svg" alt="" class="injectable hw-20"> -->
                                       </a>
                                   </li>

                                   <li class="nav-item list-inline-item mr-0">
                                       <div class="dropdown">
                                           <a class="nav-link text-muted px-1" href="#" role="button"
                                               title="Details" data-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false">
                                               <!-- Default :: Inline SVG -->
                                               <svg class="hw-20" fill="none" viewBox="0 0 24 24"
                                                   stroke="currentColor">
                                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                       d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                                   </path>
                                               </svg>

                                               <!-- Alternate :: External File link -->
                                               <!-- <img src="./../assets/media/heroicons/outline/dots-vertical.svg" alt="" class="injectable hw-20"> -->
                                           </a>

                                           <div class="dropdown-menu dropdown-menu-right">

                                               <a class="dropdown-item" href="#" role="button"
                                                   data-toggle="modal" data-target="#createGroup">Create
                                                   Group</a>

                                           </div>
                                       </div>
                                   </li>
                               </ul>
                           </div>


                           <!-- Sidebar Header Start -->
                           <div class="sidebar-sub-header">
                               <!-- Sidebar Header Dropdown Start -->
                               <div class="dropdown mr-2">
                                   <!-- Dropdown Button Start -->
                                   <button class="btn btn-outline-default dropdown-toggle" type="button"
                                       data-chat-filter-list="" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">
                                       All Chats
                                   </button>
                                   <!-- Dropdown Button End -->

                                   <!-- Dropdown Menu Start -->
                                   <div class="dropdown-menu">
                                       <a class="dropdown-item" data-chat-filter="" data-select="all-chats"
                                           href="#">All Chats</a>

                                       <a class="dropdown-item" data-chat-filter="" data-select="groups"
                                           href="#">Groups</a>

                                   </div>
                                   <!-- Dropdown Menu End -->
                               </div>
                               <!-- Sidebar Header Dropdown End -->

                               <!-- Sidebar Search Start -->
                               <form class="form-inline">
                                   <div class="input-group">
                                       <input type="text"
                                           class="form-control search border-right-0 transparent-bg pr-0"
                                           placeholder="Search users...">
                                       <div class="input-group-append">
                                           <div class="input-group-text transparent-bg border-left-0" role="button">
                                               <!-- Default :: Inline SVG -->
                                               <svg class="text-muted hw-20" fill="none" viewBox="0 0 24 24"
                                                   stroke="currentColor">
                                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                       d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                               </svg>

                                               <!-- Alternate :: External File link -->
                                               <!-- <img class="injectable hw-20" src="./../assets/media/heroicons/outline/search.svg" alt=""> -->
                                           </div>
                                       </div>
                                   </div>
                               </form>
                               <!-- Sidebar Search End -->
                           </div>
                           <!-- Sidebar Header End -->
                       </div>
                       <!-- Chat Header End -->
                       @php
                           $conversation = App\Models\ChatConvo::where('sender_id', Auth::user()->id)
                               ->orwhere('reciever_id', Auth::user()->id)
                               ->orderBy('id', 'DESC')
                               ->get();
                           $count_conversation = App\Models\ChatConvo::where('sender_id', Auth::user()->id)
                               ->orwhere('reciever_id', Auth::user()->id)
                               ->count();
                           $all_group = App\Models\GroupParticipant::where('participant_id', Auth::user()->id)
                               ->orderBy('id', 'DESC')
                               ->get();
                           $all_group_count = App\Models\GroupParticipant::where(
                               'participant_id',
                               Auth::user()->id,
                           )->count();

                       @endphp
                       <!-- Chat Contact List Start -->
                       <ul class="contacts-list" id="chatContactTab" data-chat-list="">
                           <!-- Chat Item Start -->
                           @if ($count_conversation > 0)
                               @foreach ($conversation as $contact)
                                   @php
                                       if ($contact->reciever_id == Auth::user()->id) {
                                           $contact_details = App\Models\User::where(
                                               'id',
                                               $contact->sender_id,
                                           )->first();
                                       } else {
                                           $contact_details = App\Models\User::where(
                                               'id',
                                               $contact->reciever_id,
                                           )->first();
                                       }
                                   @endphp

                                   <!-- Chat Item Start -->
                                   <li
                                       class="contacts-item @if (Request::path() != 'home') @if ($id == $contact_details->id) active @endif @endif">
                                       <a class="contacts-link"
                                           href="/Conversation/{{ $contact_details->id }}/{{ str_replace(' ', '-', $contact_details->name) }}">
                                           <div class="avatar avatar-online">
                                               <img src="{{ asset('/assets/media/avatar') }}/{{ $contact_details->avatar ?? 'avatar.png' }}"
                                                   alt="">
                                           </div>
                                           <div class="contacts-content">
                                               <div class="contacts-info">
                                                   <h6 class="chat-name">
                                                       {{ $contact_details->name }}</h6>
                                                   <div class="chat-time">
                                                       <span>{{ $contact->created_at->diffForHumans() }}</span>
                                                   </div>
                                               </div>
                                               <div class="contacts-texts">
                                                   <p class="text-truncate">
                                                       {{ $contact->message }}
                                                   </p>
                                               </div>
                                           </div>
                                       </a>
                                   </li>
                                   <!-- Chat Item End -->
                               @endforeach
                           @endif
                           {{-- @dd(asset('Group/'.$id.'/'.$name.''), url()->current()); --}}
                           @if ($all_group_count > 0)
                               @foreach ($all_group as $all_groups)
                                   <!-- Chat Item Start -->
                                   @php
                                       $group_details = App\Models\Group::where('id', $all_groups->group_id)->first();
                                   @endphp
                                   @if ($group_details != null)
                                       <li
                                           class="contacts-item groups @if (Request::path() == 'Group') @if ($id == $all_groups->id)) active @endif @endif">
                                           <a class="contacts-link"
                                               href="/Group/{{ $group_details->id }}/{{ str_replace(' ', '-', $group_details->group_name) }}">
                                               <div class="avatar bg-success text-light">
                                                   <span>
                                                       <!-- Default :: Inline SVG -->
                                                       <img src="{{ asset('/group_thumb') }}/{{ $group_details->group_thumb }}"
                                                           alt="" class="img">

                                                       <!-- Alternate :: External File link -->
                                                       <!-- <img class="injectable" src="./../assets/media/heroicons/outline/user-group.svg" alt=""> -->
                                                   </span>
                                               </div>
                                               <div class="contacts-content">
                                                   <div class="contacts-info">
                                                       <h6 class="chat-name">
                                                           {{ $group_details->group_name }}
                                                       </h6>
                                                       <div class="chat-time">
                                                           <span>{{ $group_details->updated_at->diffForHumans() }}</span>
                                                       </div>
                                                   </div>
                                                   <div class="contacts-texts">
                                                       <p class="text-truncate">
                                                           <span>{{ $group_details->last_msg_nam }}: </span>
                                                           {{ $group_details->group_last_message }}
                                                       </p>
                                                       {{-- <div class="d-inline-flex align-items-center ml-1">
                                                       <!-- Default :: Inline SVG -->
                                                       @if ($group_details->group_privacy == 'private')
                                                           <svg class="hw-16 text-muted" viewBox="0 0 20 20"
                                                               fill="currentColor">
                                                               <path fill-rule="evenodd"
                                                                   d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                                   clip-rule="evenodd"></path>
                                                           </svg>
                                                       @endif

                                                       <!-- Alternate :: External File link -->
                                                       <!-- <img class="injectable hw-16 text-muted" src="./../assets/media/heroicons/solid/lock-closed.svg" alt=""> -->
                                                   </div> --}}
                                                   </div>
                                               </div>
                                           </a>
                                       </li>
                                   @endif
                                   <!-- Chat Item End -->
                               @endforeach
                           @endif
                       </ul>
                       <!-- Chat Contact List End -->
                   </div>
               </div>
           </div>

           <!-- Profile Tab Content Start -->
           <div class="tab-pane" id="profile-content">
               <div class="d-flex flex-column h-100">
                   <div class="hide-scrollbar">
                       <!-- Sidebar Header Start -->
                       <div class="sidebar-header sticky-top p-2 mb-3">
                           <h5 class="font-weight-semibold">Profile</h5>
                           <p class="text-muted mb-0">Personal Information & Settings</p>
                       </div>
                       <!-- Sidebar Header end -->

                       <!-- Sidebar Content Start -->
                       <div class="container-xl">
                           <div class="row">
                               <div class="col">

                                   <!-- Card Start -->
                                   <div class="card card-body card-bg-5">

                                       <!-- Card Details Start -->
                                       <div class="d-flex flex-column align-items-center">
                                           <div class="avatar avatar-lg mb-3">
                                               <img class="avatar-img" id="profile_display"
                                                   src="{{ asset('/assets/media/avatar') }}/{{ Auth::user()->avatar }}"
                                                   alt="">
                                           </div>

                                           <div class="d-flex flex-column align-items-center">
                                               <h5><span id="display_name">{{ Auth::user()->name }}</span> <i
                                                       class="fa fa-check-circle" aria-hidden="true"
                                                       style="color: skyblue;" title="Premium"></i></h5>
                                           </div>

                                           <div class="d-flex">
                                               <a class="btn btn-outline-default mx-1"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                   type="button">
                                                   <!-- Default :: Inline SVG -->
                                                   <form id="logout-form" action="{{ route('logout') }}"
                                                       method="POST" style="display: none;">
                                                       @csrf
                                                   </form>
                                                   <svg class="hw-18 d-none d-sm-inline-block" fill="none"
                                                       viewBox="0 0 24 24" stroke="currentColor">
                                                       <path stroke-linecap="round" stroke-linejoin="round"
                                                           stroke-width="2"
                                                           d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                                   </svg>

                                                   <!-- Alternate :: External File link -->
                                                   <!-- <img class="injectable hw-18" src="./../assets/media/heroicons/outline/logout.svg" alt=""> -->
                                                   <span>Logout</span>
                                               </a>
                                           </div>
                                       </div>
                                       <!-- Card Details End -->

                                       <!-- Card Options Start -->
                                       <div class="card-options">
                                           <div class="dropdown">
                                               <button
                                                   class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted text-muted"
                                                   type="button" data-toggle="dropdown" aria-haspopup="true"
                                                   aria-expanded="false">
                                                   <!-- Default :: Inline SVG -->
                                                   <svg class="hw-20" fill="none" viewBox="0 0 24 24"
                                                       stroke="currentColor">
                                                       <path stroke-linecap="round" stroke-linejoin="round"
                                                           stroke-width="2"
                                                           d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                                   </svg>

                                                   <!-- Alternate :: External File link -->
                                                   <!-- <img class="injectable hw-20" src="./../assets/media/heroicons/outline/dots-vertical.svg" alt=""> -->
                                               </button>
                                               <div class="dropdown-menu">
                                                   <a class="dropdown-item change_profile">Change Profile
                                                       Picture
                                                       <form method="post" id="update_profile_pic_form"
                                                           enctype="multipart/form-data">
                                                           <input type="hidden" id="token"
                                                               value="{{ csrf_token() }}">
                                                           <input type="file" name="files" id="profile_input"
                                                               onchange="readURLfor_profile(this);"
                                                               style="display: none;">
                                                       </form>
                                                   </a>
                                               </div>
                                           </div>
                                       </div>
                                       <!-- Card Options End -->

                                   </div>
                                   <!-- Card End -->

                                   <!-- Card Start -->
                                   <div class="card mt-3">

                                       <!-- List Group Start -->
                                       <ul class="list-group list-group-flush">


                                           <!-- List Group Item Start -->
                                           <li class="list-group-item py-2">
                                               <div class="media align-items-center">
                                                   <div class="media-body">
                                                       <p class="small text-muted mb-0">Birthdate</p>
                                                       <p class="mb-0" id="dob">
                                                           {{ Auth::user()->dob ?? 'N/A' }}</p>
                                                   </div>
                                                   <!-- Default :: Inline SVG -->
                                                   <svg class="text-muted hw-20 ml-1" fill="none"
                                                       viewBox="0 0 24 24" stroke="currentColor">
                                                       <path stroke-linecap="round" stroke-linejoin="round"
                                                           stroke-width="2"
                                                           d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                   </svg>

                                                   <!-- Alternate :: External File link -->
                                                   <!-- <img class="injectable text-muted hw-20 ml-1" src="./../assets/media/heroicons/outline/calendar.svg" alt=""> -->
                                               </div>
                                           </li>
                                           <!-- List Group Item End -->

                                           <!-- List Group Item Start -->
                                           <li class="list-group-item py-2">
                                               <div class="media align-items-center">
                                                   <div class="media-body">
                                                       <p class="small text-muted mb-0">Phone</p>
                                                       <p class="mb-0"id="phone">{{ Auth::user()->phone ?? 'N/A' }}
                                                       </p>
                                                   </div>
                                                   <!-- Default :: Inline SVG -->
                                                   <svg class="text-muted hw-20 ml-1" fill="none"
                                                       viewBox="0 0 24 24" stroke="currentColor">
                                                       <path stroke-linecap="round" stroke-linejoin="round"
                                                           stroke-width="2"
                                                           d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                                   </svg>

                                                   <!-- Alternate :: External File link -->
                                                   <!-- <img class="injectable text-muted hw-20 ml-1" src="./../assets/media/heroicons/outline/phone.svg" alt=""> -->
                                               </div>
                                           </li>
                                           <!-- List Group Item End -->

                                           <!-- List Group Item Start -->
                                           <li class="list-group-item py-2">
                                               <div class="media align-items-center">
                                                   <div class="media-body">
                                                       <p class="small text-muted mb-0">Email</p>
                                                       <p class="mb-0" id="email">
                                                           {{ Auth::user()->email ?? 'N/A' }}</p>
                                                   </div>

                                                   <!-- Default :: Inline SVG -->
                                                   <svg class="text-muted hw-20 ml-1" fill="none"
                                                       viewBox="0 0 24 24" stroke="currentColor">
                                                       <path stroke-linecap="round" stroke-linejoin="round"
                                                           stroke-width="2"
                                                           d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                   </svg>

                                                   <!-- Alternate :: External File link -->
                                                   <!-- <img class="injectable text-muted hw-20 ml-1" src="./../assets/media/heroicons/outline/mail.svg" alt=""> -->
                                               </div>
                                           </li>
                                           <!-- List Group Item End -->

                                           <!-- List Group Item Start -->
                                           <li class="list-group-item py-2">
                                               <div class="media align-items-center">
                                                   <div class="media-body">
                                                       <p class="small text-muted mb-0">Website</p>
                                                       <p class="mb-0" id="website">
                                                           {{ Auth::user()->website ?? 'N/A' }}</p>
                                                   </div>
                                                   <!-- Default :: Inline SVG -->
                                                   <svg class="text-muted hw-20 ml-1" fill="none"
                                                       viewBox="0 0 24 24" stroke="currentColor">
                                                       <path stroke-linecap="round" stroke-linejoin="round"
                                                           stroke-width="2"
                                                           d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                   </svg>

                                                   <!-- Alternate :: External File link -->
                                                   <!-- <img class="injectable text-muted hw-20 ml-1" src="./../assets/media/heroicons/outline/globe.svg" alt=""> -->
                                               </div>
                                           </li>
                                           <!-- List Group Item End -->

                                           <!-- List Group Item Start -->
                                           <li class="list-group-item pt-2">
                                               <div class="media align-items-center">
                                                   <div class="media-body">
                                                       <p class="small text-muted mb-0">Address</p>
                                                       <p class="mb-0" id="address">
                                                           {{ Auth::user()->address ?? 'N/A' }}</p>
                                                   </div>
                                                   <!-- Default :: Inline SVG -->
                                                   <svg class="text-muted hw-20 ml-1" fill="none"
                                                       viewBox="0 0 24 24" stroke="currentColor">
                                                       <path stroke-linecap="round" stroke-linejoin="round"
                                                           stroke-width="2"
                                                           d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                                   </svg>

                                                   <!-- Alternate :: External File link -->
                                                   <!-- <img class="injectable text-muted hw-20 ml-1" src="./../assets/media/heroicons/outline/home.svg" alt=""> -->
                                               </div>
                                           </li>
                                           <!-- List Group Item End -->

                                       </ul>
                                       <!-- List Group End -->

                                   </div>
                                   <!-- Card End -->

                                   <!-- Card Start -->
                                   <div class="card my-3">

                                       <!-- List Group Start -->
                                       <ul class="list-group list-group-flush">

                                           <!-- List Group Item Start -->
                                           <li class="list-group-item py-2">
                                               <div class="media align-items-center">
                                                   <div class="media-body">
                                                       <p class="small text-muted mb-0">Facebook</p>
                                                       <a class="font-size-sm font-weight-medium"
                                                           href="#">{{ Auth::user()->facebook ?? 'N/A' }}</a>
                                                   </div>
                                                   <!-- Alternate :: External File link -->
                                                   <!-- <img class="injectable text-muted hw-20 ml-1" src="./../assets/media/icons/facebook.svg" alt=""> -->
                                               </div>
                                           </li>
                                           <!-- List Group Item End -->

                                           <!-- List Group Item Start -->
                                           <li class="list-group-item py-2">
                                               <div class="media align-items-center">
                                                   <div class="media-body">
                                                       <p class="small text-muted mb-0">Youtube</p>
                                                       <a class="font-size-sm font-weight-medium"
                                                           href="#">{{ Auth::user()->youtube ?? 'N/A' }}</a>
                                                   </div>
                                                   <!-- Alternate :: External File link -->
                                                   <!-- <img class="injectable text-muted hw-20 ml-1" src="./../assets/media/icons/twitter.svg" alt=""> -->
                                               </div>
                                           </li>
                                           <!-- List Group Item End -->

                                           <!-- List Group Item Start -->
                                           <li class="list-group-item py-2">
                                               <div class="media align-items-center">
                                                   <div class="media-body">
                                                       <p class="small text-muted mb-0">Twitch</p>
                                                       <a class="font-size-sm font-weight-medium"
                                                           href="#">{{ Auth::user()->twitch ?? 'N/A' }}</a>
                                                   </div>
                                                   <!-- Alternate :: External File link -->
                                                   <!-- <img class="injectable text-muted hw-20 ml-1" src="./../assets/media/icons/instagram.svg" alt=""> -->
                                               </div>
                                           </li>
                                           <!-- List Group Item End -->

                                       </ul>
                                       <!-- List Group End -->

                                   </div>
                                   <!-- Card End -->

                               </div>
                           </div>
                       </div>
                       <!-- Sidebar Content End -->
                   </div>
               </div>
           </div>
           <!-- Profile Tab Content End -->
       </div>
       <!-- Chats Tab Content End -->

       <!-- Tab Content End -->
   </aside>
   <!-- Sidebar End -->
