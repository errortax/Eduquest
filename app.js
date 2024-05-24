document.addEventListener('DOMContentLoaded', function() {
    let signInForm = document.querySelector('.sign-in-form');

    signInForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Dummy hardcoded credentials
        const validUsername = 'student@email.com';
        const validPassword = 'password';

        // Retrieve entered username and password
        let username = document.querySelector('.sign-in-form input[type="text"]').value;
        let password = document.querySelector('.sign-in-form input[type="password"]').value;

        // Perform authentication
        if (username === validUsername && password === validPassword) {
            // Authentication successful
            // Redirect the user to the dashboard homepage
            window.location.href = '/E-learning-dashboad/home.php'; // Change 'dashboard.html' to your actual dashboard homepage URL
        } else {
            // Authentication failed
            // Display an error message or take appropriate action
            alert('Invalid username or password. Please try again.');
        }
    });
});