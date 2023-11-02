function changeHandler(button, form){
    document.getElementById(button).addEventListener("click", function(e){
        e.preventDefault();

        const span = document.querySelector(form + ' span');
        const userIDBox = document.querySelector(form + ' input[name="userID"]');
        const passwordBox = document.querySelector(form + ' input[name="userPassword"]');

        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'php/change-account.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = xhr.responseText;

                    span.textContent = response;
                    span.style.color = "red";

                    setTimeout(function() {
                        span.textContent = "Change Account";
                        span.style.color = "#F250A9";
                    }, 3000);

                    userIDBox.value = '';
                    passwordBox.value ='';
            }
        };

        const userID = userIDBox.value;
        const password = passwordBox.value;
        const data = 'userID=' + encodeURIComponent(userID) + '&password=' + encodeURIComponent(password);

        xhr.send(data);
    });
}

changeHandler('change', '#change-account');
