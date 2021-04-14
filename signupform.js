
  // Your web app's Firebase configuration

  var firebaseConfig = {
    apiKey: "AIzaSyAD7jKZj0QU89oxWWUtJJjkxDWrsMMQJos",
    authDomain: "videoapp-81c1d.firebaseapp.com",
    databaseURL: "https://pythonauth-262f7-default-rtdb.firebaseio.com/",
    projectId: "videoapp-81c1d",
    storageBucket: "videoapp-81c1d.appspot.com",
    messagingSenderId: "719112767656",
    appId: "1:719112767656:web:a903c40894f41ebd1bda9d",
    measurementId: "G-M6B8CEMVW4"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);


  const auth = firebase.auth();

  function signUp(){

    var email = document.getElementById("email");
    var password = document.getElementById("password");

    const promise = auth.createUserWithEmailAndPassword(email.value, password.value);
    promise.catch(e => alert(e.message));

    alert("Successfully Signed Up");
  }


  function signIn(){

    var email = document.getElementById("email");
    var password = document.getElementById("password");

    const promise = auth.signInWithEmailAndPassword(email.value, password.value);
    promise.catch(e => alert(e.message));

  }




  function signOut(){

    auth.signOut();
    alert("Signed Out");

  }

  auth.onAuthStateChanged(function(user){
      if(user){
          var email = user.email;
          alert("You've signed in with " + email);
          //is signed in

      }else{
          alert("No Active User");

        //no user is signed in
      }
  })