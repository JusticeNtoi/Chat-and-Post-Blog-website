const editBtn = document.querySelector('.profile-buttons .profile-edit'),
saveBtn = document.querySelector('.profile-buttons .profile-save'),
profileButtons = document.querySelector('.profile-buttons');

const inputfield1 = document.getElementById("inputfield1"),
inputfield2 = document.getElementById("inputfield2"),
inputfield3 = document.getElementById("inputfield3"),
inputfield4 = document.getElementById("inputfield4");

const imageCursor = document.querySelector('.profile-back label img');
var inputImage = document.getElementById('inputImage');

const img = document.querySelector(".profile-picture");

var isReadOnly = true; // Initial state
var isPassword = true;
let cursorIsPointer = false;

// Function to save the original values of the input fields
function saveOriginalValues() {
    inputfield1.dataset.originalValue = inputfield1.value;
    inputfield2.dataset.originalValue = inputfield2.value;
    inputfield3.dataset.originalValue = inputfield3.value;
    inputfield4.dataset.originalValue = inputfield4.value;
    img.dataset.originalSrc = img.src;
}

// Save the original input values when the form loads
saveOriginalValues();


editBtn.onclick = ()=> {
    profileButtons.classList.toggle('active');
    saveBtn.classList.toggle('active');

    if (editBtn.textContent === "Edit") {
        editBtn.textContent = "Cancel";
    } else {
        editBtn.textContent = "Edit";

        // Reset input values to their original values
        inputfield1.value = inputfield1.dataset.originalValue;
        inputfield2.value = inputfield2.dataset.originalValue;
        inputfield3.value = inputfield3.dataset.originalValue;
        inputfield4.value = inputfield4.dataset.originalValue;
        img.src = img.dataset.originalSrc;
    }

    // removing and Adding readonly attribute
    isReadOnly = !isReadOnly;

    inputfield1.readOnly = isReadOnly;
    inputfield2.readOnly = isReadOnly;
    inputfield3.readOnly = isReadOnly;
    inputfield4.readOnly = isReadOnly;

    isPassword = !isPassword;
    if (isPassword) {
        inputfield4.type = 'password';
    } else {
        inputfield4.type = 'text';
    }

    inputImage.disabled = !inputImage.disabled;
    if (cursorIsPointer) {
        imageCursor.style.cursor = 'auto'; // Change cursor to default (auto)
    } else {
        imageCursor.style.cursor = 'pointer'; // Change cursor to pointer
    }
    cursorIsPointer = !cursorIsPointer;    
}