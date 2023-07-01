const form = document.querySelector('form');
form.addEventListener('submit', function(event) {
  event.preventDefault(); 

  const nameInput = document.querySelector('input[type="text"]');
  const emailInput = document.querySelector('input[type="email"]');
  const passwordInput = document.querySelector('input[type="password"]');
  const roleSelect = document.querySelector('.role');

  const name = nameInput.value;
  const email = emailInput.value;
  const password = passwordInput.value;
  const role = roleSelect.value;

  // Perform form validation
  if (name.trim() === '') {
    alert('Please enter your name');
    nameInput.focus();
    return;
  }
  if (email.trim() === '') {
    alert('Please enter your email');
    emailInput.focus();
    return;
  }
  if (password.trim() === '') {
    alert('Please enter your password');
    passwordInput.focus();
    return;
  }
  nameInput.value = '';
  emailInput.value = '';
  passwordInput.value = '';
  roleSelect.selectedIndex = 0;
  alert('Registration successful');
});