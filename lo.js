function registerUser() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var role = document.getElementById('role').value;
    var user = {
      name: name,
      email: email,
      password: password,
      role: role
    };
    if (role === 'consultant') {
      window.location.href = 'consultant-matching.html';
    } else {
      window.location.href = 'business-matching.html';
    }
  }
