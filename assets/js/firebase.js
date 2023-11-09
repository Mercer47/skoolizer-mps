import firebase from "firebase/compat/app";
import "firebase/compat/messaging";
import { getMessaging, getToken } from "firebase/messaging";


// TODO: Replace the following with your app's Firebase project configuration
// See: https://firebase.google.com/docs/web/learn-more#config-object
const firebaseConfig = {
    apiKey: "AIzaSyDr0Sppv8jay3LHJlVN1MJOumhQAFL6sfU",
    authDomain: "school-39299.firebaseapp.com",
    projectId: "school-39299",
    storageBucket: "school-39299.appspot.com",
    messagingSenderId: "976696419627",
    appId: "1:976696419627:web:88e8671da251daefb3d16e",
    measurementId: "G-RD24WNKZQP"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);


// Initialize Firebase Cloud Messaging and get a reference to the service
const messaging = getMessaging();
// Add the public key generated from the console here.
getToken(messaging, {vapidKey: "BKbvDc_hesaGJsq0IneMb_te6clJ6IHhxaR1fDy65rPdqlLTP9lobMkPIpH_8dDSL4_vabEtwgZ4rsb_sHYhG_M"}).then(r => );

function requestPermission() {
    console.log('Requesting permission...');
    Notification.requestPermission().then((permission) => {
        if (permission === 'granted') {
            console.log('Notification permission granted.');
        }
    })
}



