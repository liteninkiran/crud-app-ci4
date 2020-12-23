
    // REGEX for email
    const regExEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

    function validateForm()
    {
        // RETURN variable - store if form is valid
        var formValid = true;
        var inputValid;

        // Get Input, Select and Text Area elements
        var inputEls = document.querySelectorAll('input, select, textarea');

        // A loop that checks every input field in the current tab
        for(i = 0; i < inputEls.length; i++)
        {
            var chkRequired = true;
            var chkEmail = true;
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
            }

            inputValid = chkRequired && chkEmail;
            formValid = formValid && inputValid;
        }

        return formValid;
    }

    function matchRegEx(regEx, field)
    {
        return field.value.match(regEx) != null;
    }


