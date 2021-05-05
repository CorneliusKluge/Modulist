document.addEventListener("DOMContentLoaded", function() {
    getFieldListView();

    document.getElementById("field_add_button").addEventListener("click", fieldAddViewEvent);
});

var fieldFormEditedFlag = false;

function initializeFieldEvents() {
    var item = document.getElementById("field_add_submit");
    if(item) {
        item.addEventListener("click", fieldAddSubmitEvent);
    }

    document.querySelectorAll(".button_change_field").forEach(function(item) {
        item.addEventListener("click", fieldChangeViewEvent);
    });

    var item = document.getElementById("field_change_submit");
    if(item) {
        item.addEventListener("click", fieldChangeSubmitEvent);
    }

    document.querySelectorAll(".button_delete_field").forEach(function(item) {
        item.addEventListener("click", fieldDeleteViewEvent);
    });

    var item = document.getElementById("field_delete_submit");
    if(item) {
        item.addEventListener("click", fieldDeleteSubmitEvent);
    }

    document.querySelectorAll(".close, .overlay").forEach(function(item) {
        item.addEventListener("click", closeEvent);
    });

    var item = document.getElementById("field_add_form");
    if(item) {
        item.addEventListener("input", fieldAddFormEvent);
    }

    var item = document.getElementById("field_change_form");
    if(item) {
        item.addEventListener("input", fieldChangeFormEvent);
    }
}
function getFieldAddView() {
    fieldFormEditedFlag = false;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            var answer = this.responseText;
            var target = document.getElementById("field_form_container");
            
            target.innerHTML = answer;

            initializeFieldEvents();
        }
    };
    xhttp.open("POST", "index.php?subcontroller=ajax", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("field_add");
}
function getFieldListView() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            var answer = this.responseText;
            var target = document.getElementById("field_list_container");
            
            target.innerHTML = answer;
            initializeFieldEvents();
        }
    };
    xhttp.open("POST", "index.php?subcontroller=ajax", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("field_list=true");
}
function fieldAddSubmit() {
    var form = document.getElementById("field_add_form");
    var formData = new FormData(form);
    formData.append("field_add_submit", "true");
    var str = new URLSearchParams(formData).toString();

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            var answer = JSON.parse(this.responseText);
            var target = document.getElementById("field_message_container");
            
            if(answer["success"]) {
                document.getElementById("field_form_container").innerHTML = "";
            }
            target.innerHTML = answer["output"];

            getFieldListView();
        }
    };
    xhttp.open("POST", "index.php?subcontroller=ajax", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(str);
}
function getFieldChangeView(id) {
    fieldFormEditedFlag = false;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            var answer = this.responseText;
            var target = document.getElementById("field_form_container");
            
            target.innerHTML = answer;

            initializeFieldEvents();
        }
    };
    xhttp.open("POST", "index.php?subcontroller=ajax", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("field_change=" + id);
}
function fieldChangeSubmit(id) {
    var form = document.getElementById("field_change_form");
    var formData = new FormData(form);
    formData.append("field_change_submit", id);
    var str = new URLSearchParams(formData).toString();

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            var answer = JSON.parse(this.responseText);
            var target = document.getElementById("field_message_container");
            
            if(answer["success"]) {
                document.getElementById("field_form_container").innerHTML = "";
            }
            target.innerHTML = answer["output"];

            getFieldListView();
        }
    };
    xhttp.open("POST", "index.php?subcontroller=ajax", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(str);
}
function getFieldDeleteView(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            var answer = this.responseText;
            var target = document.getElementById("field_deleteForm_container");
            
            target.innerHTML = answer;

            initializeFieldEvents();

            var overlay = document.getElementById("overlay");
            if(overlay) {
                overlay.classList.add("overlay--visible");
            }
            var deleteFormContainer = document.getElementById("field_deleteForm_container");
            if(deleteFormContainer) {
                deleteFormContainer.classList.add("field_deleteForm_container--visible");
            }
        }
    };
    xhttp.open("POST", "index.php?subcontroller=ajax", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("field_delete=" + id);
}
function fieldDeleteSubmit(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            var answer = JSON.parse(this.responseText);
            var target = document.getElementById("field_deleteForm_container");
            
            target.innerHTML = answer["output"];

            getFieldListView();
        }
    };
    xhttp.open("POST", "index.php?subcontroller=ajax", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("field_delete_submit=" + id);
}

function fieldAddViewEvent() {
    if(fieldFormEditedFlag) {
        if(!confirm("Achtung, wenn Sie fortfahren, dann verlieren Sie ihren aktuellen Stand. Wollen Sie fortfahren?")) {
            return;
        }
    }
    getFieldAddView();
}
function fieldChangeViewEvent() {
    if(fieldFormEditedFlag) {
        if(!confirm("Achtung, wenn Sie fortfahren, dann verlieren Sie ihren aktuellen Stand. Wollen Sie fortfahren?")) {
            return;
        }
    }
    getFieldChangeView(event.currentTarget.getAttribute("data-id"));
}
function fieldAddSubmitEvent() {
    fieldAddSubmit();
}
function fieldChangeSubmitEvent() {
    fieldChangeSubmit(event.currentTarget.getAttribute("data-id"));
}
function fieldDeleteViewEvent() {
    getFieldDeleteView(event.currentTarget.getAttribute("data-id"));
}
function fieldDeleteSubmitEvent() {
    fieldDeleteSubmit(event.currentTarget.getAttribute("data-id"));
}
function fieldAddFormEvent() {
    fieldFormEditedFlag = true;
}
function fieldChangeFormEvent() {
    fieldFormEditedFlag = true;
}
function closeEvent() {
    var overlay = document.getElementById("overlay");
    if(overlay) {
        overlay.classList.remove("overlay--visible");
    }

    var deleteFormContainer = document.getElementById("field_deleteForm_container");
    if(deleteFormContainer) {
        deleteFormContainer.classList.remove("field_deleteForm_container--visible");
    }
}
