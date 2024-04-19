function formValidation() {
    var isFormValid = true;
    
    var formElements = document.registration.getElementsByTagName("input");
    for (var i = 0; i < formElements.length; i++) {
        if (formElements[i].type === "text" || formElements[i].type === "password" || formElements[i].type === "radio") {
            if (formElements[i].value.trim() === "") {
                alert("All input fields must be filled.");
                formElements[i].focus();
                isFormValid = false;
                break;
            }
        }
    }

    if (isFormValid) {
        // Existing validation logic
        var uid = document.registration.userid;
        var passid = document.registration.passid;
        var uname = document.registration.username;
        var uadd = document.registration.address;
        var ucountry = document.registration.country;
        var uzip = document.registration.zip;
        var uemail = document.registration.email;
        var umsex = document.registration.msex;
        var ufsex = document.registration.fsex;

        if (userid_validation(uid, 5, 12)) {
            if (passid_validation(passid, 7, 12)) {
                if (allLetter(uname)) {
                    if (alphanumeric(uadd)) {
                        if (countryselect(ucountry)) {
                            if (allnumeric(uzip)) {
                                if (ValidateEmail(uemail)) {
                                    if (validsex(umsex, ufsex)) {
                                        // Form is valid, submit the form
                                        return true;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    return false;
}