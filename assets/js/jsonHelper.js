var prefixUrl = "/aqua/config/json";

function dataSource(controller, functionName, pageSize){

    var DS = new kendo.data.DataSource({
        pageSize: pageSize,
        transport: {
            read: prefixUrl + "/" + controller + "/" + functionName + ".php",
            dataType: "jsonp"
        }
  
    });

    return DS;
}

function runJson(controller, functionName, parameters, onSuccess, onError) {
    parameters = parameters || {};
    onSuccess = onSuccess || function () { };
    onError = onError || function () { };
    $.ajax({
        type: "GET",
        data: parameters,
        url: prefixUrl + "/" + controller + "/" + functionName + ".php",
        success: function (result) {
            onSuccess(result);
        },
        error: function (req, status, error) {
            onError(req, status, error)
            console.log("Error occured with " + controller + functionName)
            console.log(req);
            console.log(error)
            console.log(status)
        }
    })
}

function runJsonPost(controller, functionName, parameters, onSuccess, onError) {
    parameters = parameters || {};
    onSuccess = onSuccess || function () { };
    onError = onError || function () { };
    $.ajax({
        type: "POST",
        data: parameters,
        url: prefixUrl + "/" + controller + "/" + functionName + ".php",
        success: function (result) {
            onSuccess(result);
        },
        error: function (req, status, error) {
            onError(req, status, error)
            console.log("Error occured with " + controller + functionName)
            console.log(req);
            console.log(error)
            console.log(status)
        }
    })
}