<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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

<script src="{{ asset('assets/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendors/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/vendors/svg-inject/svg-inject.min.js') }}"></script>
<script src="{{ asset('assets/vendors/modal-stepes/modal-steps.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

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
            document.getElementById('group_id').value = response.group_id;
            console.log(response.code);
            if (response.code == null) {
                $('#heading').html('Group did not created');
            }else{
                location.reload();
            }
        }
    });


});
</script>


<script type="text/javascript">
    $('.change_profile').bind("click", function() {

        $('#profile_input').click();
    });
</script>
<script type="text/javascript">
    var x = document.getElementById("profile_display");

    function readURLfor_profile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#profile_display')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(82);
                // $('#submit_form').click();

                var form = new FormData(document.getElementById('update_profile_pic_form'));
                var token = $('#token').val();
                form.append('_token', token);
                $.ajax({
                    url: '/change_profile_pic',
                    type: 'post',
                    data: form,
                    cache: false,
                    contentType: false, //must, tell jQuery not to process the data
                    processData: false,

                    success: function(response) {
                        toastr.success('Profile Picture has been updated.');
                    }
                });



            };
            var name = document.getElementById('profile_input');
            $('#files').val(name.files.item(0).name);
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

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
