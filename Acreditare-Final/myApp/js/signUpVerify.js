document.querySelector('#exampleModal_SIGN-UP').addEventListener('submit', (event) => {
    const p1 = document.querySelector('#signUpPass1').value;
    const p2 = document.querySelector('#signUpPass2').value;
    if (p1 != p2) {
        alert("Passwords don't match!");
        event.preventDefault();
    }
})