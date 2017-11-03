(function () {
    "use strict";

    var contactTable = get("contactTable"),
        firstNameInput = get("firstName"),
        lastNameInput = get("lastName"),
        emailInput = get("email"),
        phoneInput = get("phone"),
        contacts = [];

    function get(id) {
        return document.getElementById(id);
    }

    function addContact(firstName, lastName, email, phone) {
        
        var contact = {
            firstName: firstName,
            lastName: lastName,
            email: email,
            phone: phone
        };

        contacts.push(contact);

        if (contacts.length === 1) {
            contactTable.deleteRow(1);
        }

        var row = contactTable.insertRow();
        var firstNameCell = row.insertCell();
        var lastNameCell = row.insertCell();
        var emailCell = row.insertCell();
        var phoneCell = row.insertCell();

        firstNameCell.innerHTML = contact.firstName;
        lastNameCell.innerHTML = contact.lastName;
        emailCell.innerHTML = contact.email;
        phoneCell.innerHTML = contact.phone;
    }

    get("theForm").addEventListener("submit", function (event){
        addContact(firstNameInput.value, lastNameInput.value, emailInput.value, phoneInput.value);
        event.preventDefault();
    });
}());