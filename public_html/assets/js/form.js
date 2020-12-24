
    var classInvalid = " invalid";
    var classChanged = " changed";

    // REGEX for email
    const regExEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

    function changeMe(inputEl)
    {
        removeClass(inputEl, classInvalid)
        addClass(inputEl, classChanged)
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

    function matchRegEx(regEx, field)
    {
        return field.value.match(regEx) != null;
    }

    function validateForm(formId)
    {
        // Retrieve the form
        var form = document.getElementById('jmlForm');

        // Store if form is valid
        var formValid = true;

        // Get Input, Select and Text Area elements
        var inputEls = document.querySelectorAll('input, select, textarea');

        // A loop that checks every input field in the current tab
        for(i = 0; i < inputEls.length; i++)
        {
            // Initialise check variables
            var chkRequired = true;
            var chkEmail = true;

            // Initialise valid variable (all checks must pass)
            var inputValid = false;

            // Store current element
            var inputEl = inputEls[i];

            // Check REQUIRED
            if(inputEl.required && inputEl.value == "")
            {
                // Flag input as invalid
                chkRequired = false;
            }

            // Check EMAIL
            if(inputEl.type == "email" && inputEl.value != "")
            {
                // Check if email address matches RegEx
                chkEmail = matchRegEx(regExEmail, inputEl);

                if(!chkEmail)
                {
                    // Find the label of the field
                    label = inputEl.previousElementSibling;

                    if(label == null)
                    {
                        message  = "Email is invalid. Please check and try again.\n\n";
                        message += inputEl.value;
                    }
                    else
                    {
                        message = label.innerText;
                        message = message.replace(" *", "");
                        message += " is invalid. Please check and try again.\n\n";
                        message += inputEl.value;
                    }

                    alert(message);
                }
            }

            // Flag input as valid/invalid
            inputValid = chkRequired && chkEmail;

            // Flag form as valid/invalid
            formValid = formValid && inputValid;

            // Change background colour of invalid inputs by giving "invalid" class
            if(!inputValid)
            {
                removeClass(inputEl, classChanged)
                addClass(inputEl, classInvalid)
            }
        }

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
        else
        {

        }
    }
