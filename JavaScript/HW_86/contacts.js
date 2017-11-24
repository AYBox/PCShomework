/*global $*/
(function () {
    "use strict";

    var contactTable = $("#contactTable tbody"),
        contacts = [];

    function addContact(contact) {
        contacts.push(contact);

        if (contacts.length === 1) {
            contactTable.empty();
        }

        contactTable.append(
            '<tr>' +
            '<td>' + contact.firstName + '</td>' +
            '<td>' + contact.lastName + '</td>' +
            '<td>' + contact.email + '</td>' +
            '<td>' + contact.phone + '</td>' +
            '</tr>'

        );
    }

    var firstNameInput = $("#first");
    var lastNameInput = $("#last");
    var emailInput = $("#email");
    var phoneInput = $("#phone");
    var addContactForm = $("#addContactForm");

    function hideAddContactForm() {
        addContactForm.slideUp();
        addContactForm[0].reset();
    }

    addContactForm.on("submit", function (event) {
        var newContact = {
            firstName: firstNameInput.val(),
            lastName: lastNameInput.val(),
            email: emailInput.val(),
            phone: phoneInput.val()
        };
        addContact(newContact);
        hideAddContactForm();
        event.preventDefault();
    });

    function importContacts() {
        $.getJSON("contacts.txt", function (loadedData) {
            console.log(loadedData.jsonContacts);
            /*jshint -W104*/
            for (let i = 0; i < loadedData.jsonContacts.length; i++) {
                addContact(loadedData.jsonContacts[i]);
            }
            /*loadedData.jsonContacts.foreach(function (value) {
                addContact(value);
            });*/

        }).fail(function (xhr, statusCode, statusText) {
            alert("error: " + statusText);
            console.log(xhr, statusCode, statusText);
        });
    }

    $("#cancel").click(hideAddContactForm);

    $("#add").click(function () {
        addContactForm.slideDown();
    });
    $("#import").click(importContacts);
}());