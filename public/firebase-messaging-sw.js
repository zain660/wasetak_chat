/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js');

/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/
firebase.initializeApp({
    apiKey: "AIzaSyBYdmaLCYwLqeU-Ud8G2T6Dnww5eS_a8II",
    databaseURL: "https://hippacompliant-6c5ef-default-rtdb.firebaseio.com",
    authDomain: "hippacompliant-6c5ef.firebaseapp.com",
    projectId: "hippacompliant-6c5ef",
    storageBucket: "hippacompliant-6c5ef.appspot.com",
    messagingSenderId: "1023196025670",
    appId: "1:1023196025670:web:0168e6bd37700ab77acb47",
    measurementId: "G-804ZHKGB3H"
});

/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload,
    );
    /* Customize notification here */
    const notificationTitle = "Background Message Title";
    const notificationOptions = {
        body: "Background Message body.",
        icon: "/itwonders-web-logo.png",
    };

    return self.registration.showNotification(
        notificationTitle,
        notificationOptions,
    );
});