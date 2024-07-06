// scripts.js

// Email validation
function validateEmail(email) {
    const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return re.test(String(email).toLowerCase());
}

// Date range validation
function validateDateRange(startDate, endDate) {
    return new Date(startDate) <= new Date(endDate);
}

// Name validation
function validateName(name) {
    const re = /^[a-zA-Z\s]+$/;
    return re.test(String(name));
}

// Form validation
document.getElementById('signupForm').addEventListener('submit', function(event) {
    const email = document.getElementById('email').value;
    const name = document.getElementById('name').value;

    if (!validateEmail(email)) {
        alert('Please enter a valid email address.');
        event.preventDefault();
    }

    if (!validateName(name)) {
        alert('Please enter a valid name.');
        event.preventDefault();
    }
});

document.getElementById('signinForm').addEventListener('submit', function(event) {
    const email = document.getElementById('email').value;

    if (!validateEmail(email)) {
        alert('Please enter a valid email address.');
        event.preventDefault();
    }
});
