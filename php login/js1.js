let SignInBtn = document.getElementById("SignInBtn");
        let nameField = document.getElementById("nameField");
        let title = document.getElementById("title");


        SignInBtn.onclick = function(){
            nameField.style.maxHeight = "0";
            title.innerHTML = "Sign In";
            SignUpBtn.classList.add("disable");
            SignInBtn.classList.remove("disable");
        }

        SignUpBtn.onclick = function(){
            nameField.style.maxHeight = "60px";
            title.innerHTML = "Sign Up";
            SignUpBtn.classList.remove("disable");
            SignInBtn.classList.add("disable");
        }
