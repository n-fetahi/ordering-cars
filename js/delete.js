var deleteButton = document.getElementById('deleteButton');
var cover = document.getElementById('cover');
var confirmationBox = document.getElementById('confirmationBox');
var confirmDeleteButton = document.getElementById('confirmDeleteButton');
var cancelDeleteButton = document.getElementById('cancelDeleteButton');

deleteButton.addEventListener('click', function() {
  confirmationBox.style.display = 'block';
  cover.style.display = 'block';
});

cancelDeleteButton.addEventListener('click', function() {
  confirmationBox.style.display = 'none';
  cover.style.display = 'none';

});

