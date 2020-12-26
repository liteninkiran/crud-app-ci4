
    var classInvalid = " invalid";
    var classChanged = " changed";

    // REGEX for email
    const regExEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

    // When we load the page, all controls that are conditionally visible must be checked to see if they need to be hidden or shown
    forceOnChange();

    // Loop through all input, select and textarea elements and force the OnChange event
    function forceOnChange()
    {
        var inputEls;
        var inputEl;
        var i;

        inputEls = document.querySelectorAll('input, select, textarea')

        for(i = 0; i < inputEls.length; i++)
        {
            inputEl = inputEls[i];

            if(inputEl.onchange != null)
            {
                // Trigger the 'hideElement' function
                inputEl.onchange();
            }
        }
    }

    function hideElement(id, element, stringCheck)
    {
        var div = document.getElementById(id + '_div');
        var input = document.getElementById(id);

        div.style.display = element.value == stringCheck ? 'block' : 'none';
        input.required = element.value == stringCheck;
    }

    function changeMe(inputEl)
    {
        removeClass(inputEl, classInvalid);
        addClass(inputEl, classChanged);
    }

    function changeType(inputEl, typeName)
    {
        inputEl.type = typeName;
    }

    function addClass(inputEl, clsName)
    {
        if(!inputEl.className.includes(clsName))
        {
            inputEl.className += clsName;
        }
    }

    function removeClass(inputEl, clsName)
    {
        if(inputEl.className.includes(clsName))
        {
            inputEl.className = inputEl.className.replace(clsName, "");
        }
    }

    function matchRegEx(regEx, fieldValue)
    {
        return fieldValue.match(regEx) != null;
    }

    function submitForm(formId)
    {
        // Retrieve the form
        var form = document.getElementById('jmlForm');

        var formValid = validateForm();

        // If the form is valid, ask user if they wish to proceed with submission
        if(formValid)
        {
            // Ask user for confirmation
            var response = confirm("Are you sure you want to save the record?");

            // Check user response
            if(response == true)
            {
                // Submit form
                form.submit();
            }
        }
    }

    function checkRequired(inputEl)
    {
        return inputEl.required && inputEl.value == "" ? false : true;
    }

    function checkEmail(inputEl)
    {
        emailValid = false;

        if(inputEl.type == "email" && inputEl.value != "")
        {
            emailValid = matchRegEx(regExEmail, inputEl.value);
        }
        else
        {
            emailValid = true;
        }

        if(!emailValid)
        {
            emailError(inputEl);
        }

        return emailValid;
    }

    function emailError(inputEl)
    {
        // Find the label of the field
        var label = inputEl.previousElementSibling;

        // Define error message
        var message  = " is invalid. Please check and try again.";

        // Check label
        if(label == null)
        {
            message = "Email" + message;
        }
        else
        {
            message = label.innerText.replace(" *", "") + message;
        }

        // Append input value to error message
        message += "\n\n" + inputEl.value;

        alert(message);
    }

    function validateForm()
    {
        // RETURN VALUE: Store if form is valid
        var formValid = true;

        // Get Input, Select and Text Area elements
        var inputEls = document.querySelectorAll('input, select, textarea');

        // A loop that checks every input field in the current tab
        for(i = 0; i < inputEls.length; i++)
        {
            // Store current element
            var inputEl = inputEls[i];

            // Flag input as valid/invalid
            var inputValid = checkArrayValues(inputEl);

            // Flag form as valid/invalid
            formValid = formValid && inputValid;
        }

        return formValid;
    }

    function performChecks(inputEl)
    {
        var checks = [];

        // Perform checks
        checks[0] = checkRequired(inputEl);
        checks[1] = checkEmail(inputEl);

        return checks;
    }

    function checkArray(check)
    {
        return check == true;
    }

    function checkArrayValues(inputEl)
    {
        // Return array of booleans
        var checks = performChecks(inputEl);

        // Check each element is true
        var inputValid = checks.every(checkArray);

        // Change background colour of invalid inputs by giving "invalid" class
        if(!inputValid)
        {
            removeClass(inputEl, classChanged)
            addClass(inputEl, classInvalid)
        }

        return inputValid;
    }
