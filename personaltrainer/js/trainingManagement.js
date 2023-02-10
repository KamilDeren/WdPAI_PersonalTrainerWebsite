myButton = document.querySelectorAll("#signUpWithdrawButton");


function signUpOrWithdrawFromTraining(){
    const training = this;
    const child = training.children[0]
    const id = child.getAttribute("id");
    console.log(id)

    const self = this;

    if(this.value == "dodaj") {
        console.log('a');
        fetch(`/signUpToTraining/${id}`)
            .then(function () {
                child.classList.remove('fa-plus');
                child.classList.add('fa-check');
            })
            .then(function () {
                self.value = "usun";
            })
            .catch(error => console.error(error));
    }
    else {
        console.log('b');
        fetch(`/withdrawFromTraining/${id}`)
            .then(function () {
                child.classList.remove('fa-check');
                child.classList.add('fa-plus');
            })
            .then(function(){
                self.value = "dodaj";
            })
            .catch(error => console.error(error));
    }
}

myButton.forEach(button => button.addEventListener("click", signUpOrWithdrawFromTraining));