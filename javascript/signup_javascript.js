function validateSignup() {
                
    if(document.signupForm.name.value.length==0) {
        alert("Please enter your full name.");
        return;
     }
                
    if(document.signupForm.contactno.value.length==0) {
         alert("Please enter your contact number.");
        return;
    }
                
    if(isNaN(document.signupForm.contactno.value)) {
        alert("Contact number must be numeric.");
        return;
     }
                
    if(document.signupForm.email.value.length==0) {
        alert("Please enter your email address.");
        return;
    }
                
    if (!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(signupForm.email.value)) {
        alert("Please enter a valid email address.");
         return;
    }
         
    if(document.signupForm.uname.value.length==0) {
         alert("Please enter a user name.");
        return;
    }
    
    if(document.signupForm.password.value.length==0) {
         alert("Please enter a password.");
        return;
    }
    
    if(document.signupForm.password.value.length<8) {
         alert("Password must be atleast 8 characters long.");
        return;
    }
    
    if(document.signupForm.cpassword.value.length==0) {
         alert("Please confirm your password.");
        return;
    }
    
    if((document.signupForm.password.value)!=(document.signupForm.cpassword.value)) {
        alert("Passwords do not match!");
    }
        
}
    