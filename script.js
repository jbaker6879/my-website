document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    // Define valid usernames, passwords, and the page they redirect to
    const validCredentials = [
        { username: "user1", password: "pass1", redirectPage: "user1.html" },
        { username: "admin", password: "admin123", redirectPage: "admin.html" },
        { username: "guest", password: "guestpass", redirectPage: "guest.html" }
    ];

    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const errorMessage = document.getElementById("errorMessage");

    // Find if the entered credentials match any of the valid ones
    const user = validCredentials.find(cred => cred.username === username && cred.password === password);

    if (user) {
        // Store the login state in sessionStorage
        sessionStorage.setItem("isLoggedIn", "true");
        sessionStorage.setItem("username", username);

        // Redirect to the specific page for that user
        window.location.href = user.redirectPage;
    } else {
        // Display an error message if the login is incorrect
        errorMessage.textContent = "Invalid username or password!";
    }
});