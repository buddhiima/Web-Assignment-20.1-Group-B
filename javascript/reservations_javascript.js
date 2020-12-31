function validateReservation() {
                
    var checkinDate = document.getElementById('checkin').value;
    if (!checkinDate) {
        alert("Check-In date is empty!");
        return;
    }
            
                
    var checkoutDate = document.getElementById('checkout').value;
        if (!checkoutDate) {
            alert("Check-Out date is empty!");
            return;
        }
    
    if(document.reservationForm.type.selectedIndex==0) {
        alert("Please select type of room.");
        return;
    }
    
    if(document.reservationForm.meal.selectedIndex==0) {
        alert("Please select your meal plan.");
        return;
    }
}
            