document.addEventListener("DOMContentLoaded", function() {
    getFieldListView();
    getCourseListView();

    document.getElementById("field_add_button").addEventListener("click", fieldAddViewEvent);
    document.getElementById("course_add_button").addEventListener("click", courseAddViewEvent);
});

var fieldFormEditedFlag = false;
var courseFormEditedFlag = false;

// Field initialize Events

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

// Course initialize Events

function initializeCourseEvents() {
    var item = document.getElementById("course_add_submit");
    if(item) {
        item.addEventListener("click", courseAddSubmitEvent);
    }

    document.querySelectorAll(".button_change_course").forEach(function(item) {
        item.addEventListener("click", courseChangeViewEvent);
    });

    var item = document.getElementById("course_change_submit");
    if(item) {
        item.addEventListener("click", courseChangeSubmitEvent);
    }

    document.querySelectorAll(".button_delete_course").forEach(function(item) {
        item.addEventListener("click", courseDeleteViewEvent);
    });

    var item = document.getElementById("course_delete_submit");
    if(item) {
        item.addEventListener("click", courseDeleteSubmitEvent);
    }

    document.querySelectorAll(".close, .overlay").forEach(function(item) {
        item.addEventListener("click", closeEvent);
    });

    var item = document.getElementById("course_add_form");
    if(item) {
        item.addEventListener("input", courseAddFormEvent);
    }

    var item = document.getElementById("course_change_form");
    if(item) {
        item.addEventListener("input", courseChangeFormEvent);
    }
}

// Field Functions

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
    xhttp.open("POST", "index.php?subcontroller=field", true);
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
    xhttp.open("POST", "index.php?subcontroller=field", true);
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
                fieldFormEditedFlag = false;
            }
            target.innerHTML = answer["output"];

            getFieldListView();
        }
    };
    xhttp.open("POST", "index.php?subcontroller=field", true);
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
    xhttp.open("POST", "index.php?subcontroller=field", true);
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
                fieldFormEditedFlag = false;
            }
            target.innerHTML = answer["output"];

            getFieldListView();
        }
    };
    xhttp.open("POST", "index.php?subcontroller=field", true);
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
                overlay.classList.remove("invisible");
            }
            var deleteFormContainer = document.getElementById("field_deleteForm_container");
            if(deleteFormContainer) {
                deleteFormContainer.classList.remove("invisible");
            }
        }
    };
    xhttp.open("POST", "index.php?subcontroller=field", true);
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
    xhttp.open("POST", "index.php?subcontroller=field", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("field_delete_submit=" + id);
}

// Course Functions

function getCourseAddView() {
    courseFormEditedFlag = false;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            var answer = this.responseText;
            var target = document.getElementById("course_form_container");
            
            target.innerHTML = answer;

            initializeCourseEvents();
        }
    };
    xhttp.open("POST", "index.php?subcontroller=course", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("course_add");
}
function getCourseListView() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            var answer = this.responseText;
            var target = document.getElementById("course_list_container");
            
            target.innerHTML = answer;
            initializeCourseEvents();
        }
    };
    xhttp.open("POST", "index.php?subcontroller=course", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("course_list=true");
}
function courseAddSubmit() {
    var form = document.getElementById("course_add_form");
    var formData = new FormData(form);
    formData.append("course_add_submit", "true");
    var str = new URLSearchParams(formData).toString();

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            var answer = JSON.parse(this.responseText);
            var target = document.getElementById("course_message_container");
            
            if(answer["success"]) {
                document.getElementById("course_form_container").innerHTML = "";
                courseFormEditedFlag = false;
            }
            target.innerHTML = answer["output"];

            getCourseListView();
        }
    };
    xhttp.open("POST", "index.php?subcontroller=course", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(str);
}
function getCourseChangeView(id) {
    courseFormEditedFlag = false;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            var answer = this.responseText;
            var target = document.getElementById("course_form_container");
            
            target.innerHTML = answer;

            initializeCourseEvents();
        }
    };
    xhttp.open("POST", "index.php?subcontroller=course", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("course_change=" + id);
}
function courseChangeSubmit(id) {
    var form = document.getElementById("course_change_form");
    var formData = new FormData(form);
    formData.append("course_change_submit", id);
    var str = new URLSearchParams(formData).toString();

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            var answer = JSON.parse(this.responseText);
            var target = document.getElementById("course_message_container");
            
            if(answer["success"]) {
                document.getElementById("course_form_container").innerHTML = "";
                courseFormEditedFlag = false;
            }
            target.innerHTML = answer["output"];

            getCourseListView();
        }
    };
    xhttp.open("POST", "index.php?subcontroller=course", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(str);
}
function getCourseDeleteView(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            var answer = this.responseText;
            var target = document.getElementById("course_deleteForm_container");
            
            target.innerHTML = answer;

            initializeCourseEvents();

            var overlay = document.getElementById("overlay");
            if(overlay) {
                overlay.classList.remove("invisible");
            }
            var deleteFormContainer = document.getElementById("course_deleteForm_container");
            if(deleteFormContainer) {
                deleteFormContainer.classList.remove("invisible");
            }
        }
    };
    xhttp.open("POST", "index.php?subcontroller=course", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("course_delete=" + id);
}
function courseDeleteSubmit(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            var answer = JSON.parse(this.responseText);
            var target = document.getElementById("course_deleteForm_container");
            
            target.innerHTML = answer["output"];

            getCourseListView();
        }
    };
    xhttp.open("POST", "index.php?subcontroller=course", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("course_delete_submit=" + id);
}

// Field Events

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

// Course Events

function courseAddViewEvent() {
    if(courseFormEditedFlag) {
        if(!confirm("Achtung, wenn Sie fortfahren, dann verlieren Sie ihren aktuellen Stand. Wollen Sie fortfahren?")) {
            return;
        }
    }
    getCourseAddView();
}
function courseChangeViewEvent() {
    if(courseFormEditedFlag) {
        if(!confirm("Achtung, wenn Sie fortfahren, dann verlieren Sie ihren aktuellen Stand. Wollen Sie fortfahren?")) {
            return;
        }
    }
    getCourseChangeView(event.currentTarget.getAttribute("data-id"));
}
function courseAddSubmitEvent() {
    courseAddSubmit();
}
function courseChangeSubmitEvent() {
    courseChangeSubmit(event.currentTarget.getAttribute("data-id"));
}
function courseDeleteViewEvent() {
    getCourseDeleteView(event.currentTarget.getAttribute("data-id"));
}
function courseDeleteSubmitEvent() {
    courseDeleteSubmit(event.currentTarget.getAttribute("data-id"));
}
function courseAddFormEvent() {
    courseFormEditedFlag = true;
}
function courseChangeFormEvent() {
    courseFormEditedFlag = true;
}

// Generally Events

function closeEvent() {
    var overlay = document.getElementById("overlay");
    if(overlay) {
        overlay.classList.add("invisible");
    }

    var fieldDeleteFormContainer = document.getElementById("field_deleteForm_container");
    if(fieldDeleteFormContainer) {
        fieldDeleteFormContainer.classList.add("invisible");
    }
    var courseDeleteFormContainer = document.getElementById("course_deleteForm_container");
    if(courseDeleteFormContainer) {
        courseDeleteFormContainer.classList.add("invisible");
    }
}
