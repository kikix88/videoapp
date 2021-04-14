import pyrebase

#Configure and Connext to Firebase

firebaseConfig = { 'apiKey': "AIzaSyCosQnuMy9GX51TiAwqYyRDdD4W0O-lCnM",
    'authDomain': "pythonauth-262f7.firebaseapp.com",
    'databaseURL': "https://pythonauth-262f7-default-rtdb.firebaseio.com/",
    'projectId': "pythonauth-262f7",
    'storageBucket': "pythonauth-262f7.appspot.com",
    'messagingSenderId': "148368200833",
    'appId': "1:148368200833:web:d4af71569696a69116a980",
    'measurementId': "G-PJ4XKD6WPR"}

firebase=pyrebase.initialize_app(firebaseConfig)
auth=firebase.auth()

#Login function

def login():
    print("Log in...")
    email=input("Enter email: ")
    password=input("Enter password: ")
    try:
        login = auth.sign_in_with_email_and_password(email, password)
        print("Successfully logged in!")
        # print(auth.get_account_info(login['idToken']))
       # email = auth.get_account_info(login['idToken'])['users'][0]['email']
       # print(email)
    except:
        print("Invalid email or password")
    return

#Signup Function

def signup():
    print("Sign up...")
    email=input("Enter email: ")
    password=input("Enter password: ")
    try:
        user = auth.create_user_with_email_and_password(email, password)
        ask=input("Do you want to login?[y/n]")
        if ask=='y':
            login()
    except: 
        print("Email already exists")
    return

#Main

ans=input("Are you a new user?[y/n]")

if ans == 'n':
    login()
elif ans == 'y':
    signup()
