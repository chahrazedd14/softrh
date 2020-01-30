function ajaxCallAsynch() {
    // console.dir(myForm);
    console.log('myForm');

    var formData = new FormData();

    var paramAjax = {
        method: "POST",
        // body: formData
    };

    fetch('/controlleur/adminControlleur.php', paramAjax).then(function (response) {

        console.dir(response);
        return response.json();

    }).then(function (data) {

        // var lol = JSON.stringify(data);
        console.log("data : ", data);
        
    });

}


var buttonService = document.querySelector('#button-service1');

buttonService.addEventListener("click", function (event) {
    // event.preventDefault();

    ajaxCallAsynch();


});

