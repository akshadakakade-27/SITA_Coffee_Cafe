document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    // Retrieve form values
    var em = document.getElementById('email').value.indexOf("@");
    var username =document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (username === '' || password === '') {//empty field validatioin
        alert('Please fill in all the fields');
        return;
    }
    if (em== -1) {//  email validation 
        alert('Please enter a valid email address');
        return;
    }
    if (password.length < 6) {// Password validation
        alert('Password must be at least 6 characters long');
        return;
    }
    alert('Logged in successfully');// If all validations passx, display success message;
});


