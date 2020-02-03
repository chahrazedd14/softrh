function ajaxCallAsynch() {
    // console.dir(myForm);
    console.log('myForm ',event.target.dataset);
    var buttonService = event.target;
    var service_id = event.target.dataset.service;
    console.log(service_id);
    var formData = new FormData();

    var paramAjax = {
        method: "POST",
        // body: formData
    };

    fetch(`/admin/show/${service_id}`, paramAjax).then(function (response) {

        console.dir(response);
        return response.json();

    }).then(function (data) {

        // var lol = JSON.stringify(data);
        console.log("data : ", data);
        
    });

}


var buttonService = document.querySelector('#button-service1');

buttonService.addEventListener("click", function (event) {
    event.preventDefault();

    ajaxCallAsynch(event);


});

