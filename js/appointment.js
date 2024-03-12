// Function to validate form fields
function validateForm() {
  let name = document.forms["bookingForm"]["name"].value;
  let email = document.forms["bookingForm"]["email"].value;
  let phone = document.forms["bookingForm"]["phone"].value;
  let date = document.forms["bookingForm"]["date"].value;
  let time = document.forms["bookingForm"]["time"].value;

  if (name == "" || email == "" || phone == "" || date == "" || time == "") {
    alert("All fields must be filled out");
    return false;
  }
  // Add more validation checks as needed
}

// Function to generate dynamic time slots
function generateTimeSlots() {
  let timeSlots = document.getElementById('time');
  let startTime = new Date();
  let endTime = new Date(startTime);
  endTime.setHours(23, 59, 59); // Set end time to the end of the day
  let interval = 30; // Interval in minutes

  // Clear existing options
  timeSlots.options.length = 0;

  // Generate time slots
  for (let time = startTime; time <= endTime; time.setMinutes(time.getMinutes() + interval)) {
    let timeString = time.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
    let option = document.createElement('option');
    option.value = timeString;
    option.text = timeString;
    timeSlots.appendChild(option);
  }
}

// Call generateTimeSlots on page load
window.onload = generateTimeSlots;