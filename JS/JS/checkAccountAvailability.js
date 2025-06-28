
export function checkAccountAvailability(email, username) {
    return fetch("../BACKEND/checkAccountAvailability.php", {
        method: "POST", 
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({email, username}),
    })
    .then((response) => response.json())
    .catch((error) => {
        console.error("Error checking:", error);
        return {emailExist: false, usernameExist: false};
    })
}