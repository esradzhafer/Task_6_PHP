

// client-side validation for the registration //


function validateForm() {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var number = document.getElementById("number").value;
    var password = document.getElementById("password").value;

    if (username === "" || email === "" || number === "" || password === "") {
        alert("All fields are required");
        return false;
    }

    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.match(emailPattern)) {
        alert("Invalid email format");
        return false;
    }

    if (isNaN(number) || number.length !== 10) {
        alert("Phone number should be a 10-digit number");
        return false;
    }

    if (password.length < 6) {
        alert("Password should be at least 6 characters long");
        return false;
    }

    return true;
}



// client-side validation for the login form //
function validateForm() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    if (email === "") {
    alert("Email is required");
    return false;
}

    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.match(emailPattern)) {
        alert("Invalid email format");
        return false;
    }

    if (password === "") {
        alert("Password is required");
        return false;
    }

    if (password.length < 6) {
        alert("Password should be at least 6 characters long");
        return false;
    }


    return true;
}