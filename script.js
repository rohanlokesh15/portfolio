document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("registrationForm");
    const responseDiv = document.getElementById("response");
  
    form.addEventListener("submit", (event) => {
      event.preventDefault(); // Prevent default form submission
  
      const formData = new FormData(form);
  
      responseDiv.style.display = "block";
      responseDiv.style.backgroundColor = "#e0ffe4";
      responseDiv.style.color = "#2d7a3e";
      responseDiv.innerHTML = `
        <strong>Registration Successful!</strong><br>
        <ul>
          <li><strong>Name:</strong> ${formData.get("name")}</li>
          <li><strong>Email:</strong> ${formData.get("email")}</li>
          <li><strong>Phone:</strong> ${formData.get("phone")}</li>
          <li><strong>Address:</strong> ${formData.get("address")}</li>
        </ul>
      `;
  
      form.reset(); // Clear form
    });
  });