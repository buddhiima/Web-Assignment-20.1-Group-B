function validateContactus() {
    
    if(document.contactusForm.name.value.length==0) {
         alert("Please enter your name.");
        return;
    } 
    
    if(document.contactusForm.email.value.length==0) {
        alert("Please enter your email address.");
        return;
    } 
                
    if (!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(contactusForm.email.value)) {
        alert("Please enter a valid email address.");
         return;
    }
    
    if(document.contactusForm.phone.value.length==0) {
         alert("Please enter your phone number.");
        return;
    }
                
    if(isNaN(document.contactusForm.phone.value)) {
        alert("Phone number must be numeric.");
        return;
    }
    
    if(document.contactusForm.message.value.length==0) {
         alert("Please enter your message.");
        return;
    } 
}