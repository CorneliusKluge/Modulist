var fieldEntry = 0;
var categoryEntry = 0;
var examEntry = 0;
var basicLiteratureEntry = 0;
var deepeningLiteratureEntry = 0;

function check_status(obj, addFlag) {
    var presenceFlag = obj.options[obj.selectedIndex].getAttribute('data-presenceFlag');
    var id = obj.getAttribute('data-id');
    
    if(addFlag) {
        var addOrChange = "add";
    }
    else {
        var addOrChange = "change";
    }

    var div = document.getElementById("module_" + addOrChange + "_TheoryFlag_" + id);

    if(div) {
        if(presenceFlag == 1) {
            div.classList.add("invisible");
            descendants = document.querySelectorAll("#module_" + addOrChange + "_TheoryFlag_" + id + " *");
            descendants.forEach(function(item) {
                item.setAttribute("disabled", "disabled");
            });
        }
        else {
            div.classList.remove("invisible");
            descendants = document.querySelectorAll("#module_" + addOrChange + "_TheoryFlag_" + id + " *");
            descendants.forEach(function(item) {
                item.removeAttribute("disabled");
            });
        }
    }
}

function check_course(obj, addFlag) {
    var courseID = obj.options[obj.selectedIndex].getAttribute('value');

    if(addFlag) {
        var fieldDiv = document.getElementById("module_add_field_div");
    }
    else {
        var fieldDiv = document.getElementById("module_change_field_div");
    }

   
    var fieldSelects = fieldDiv.querySelectorAll('select:not(.invisible)');
    fieldSelects.forEach(function(fieldSelect) {
        Array.from(fieldSelect.options).forEach(function(option) {
            option.classList.add('invisible');
            option.setAttribute("disabled", "disabled");
        });


        Array.from(fieldSelect.options).forEach(function(option) {
            var dataCourse = option.getAttribute('data-course');
            var value = option.getAttribute('value');

            if(dataCourse == courseID || value == 0) {
                option.classList.remove('invisible');
                option.removeAttribute("disabled");
            }
        });
        var fieldSelectClone = fieldSelect.cloneNode(true);
        fieldSelect.replaceWith(fieldSelectClone);
    });
}

function addFieldEntry(addFlag) {
    if(addFlag) {
        var div = document.getElementById("module_add_field_div");
        var i = div.children.length - 2;

        var elemToClone = document.getElementById("module_add_field_0");
        var id = "module_add_field_" + i;
    }
    else {
        var div = document.getElementById("module_change_field_div");
        var i = div.children.length - 2;

        var elemToClone = document.getElementById("module_change_field_0");
        var id = "module_change_field_" + i;
    }

    var clone = elemToClone.cloneNode(true);
    clone.setAttribute("id", id);
    clone.setAttribute("name", id);

    div.appendChild(clone);
}

function addBasicLiteratureEntry(addFlag) {
    if(addFlag) {
        var div = document.getElementById("module_add_basicLiterature_div");
        var i = div.children.length - 2;

        var elemToClone = document.getElementById("module_add_basicLiterature_0");
        var id = "module_add_basicLiterature_" + i;
    }
    else {
        var div = document.getElementById("module_change_basicLiterature_div");
        var i = div.children.length - 2;

        var elemToClone = document.getElementById("module_change_basicLiterature_0");
        var id = "module_change_basicLiterature_0" + i;
    }

    var clone = elemToClone.cloneNode(true);
    clone.setAttribute("id", id);
    clone.setAttribute("name", id);

    div.appendChild(clone);
}

function addDeepeningLiteratureEntry(addFlag) {
    if(addFlag) {
        var div = document.getElementById("module_add_deepeningLiterature_div");
        var i = div.children.length - 2;

        var elemToClone = document.getElementById("module_add_deepeningLiterature_0");
        var id = "module_add_deepeningLiterature_" + i;
    }
    else {
        var div = document.getElementById("module_change_deepeningLiterature_div");
        var i = div.children.length - 2;

        var elemToClone = document.getElementById("module_change_deepeningLiterature_0");
        var id = "module_change_deepeningLiterature_" + i;
    }

    var clone = elemToClone.cloneNode(true);
    clone.setAttribute("id", id);
    clone.setAttribute("name", id);

    div.appendChild(clone);
}

function addCategoryEntry(addFlag) {
    if(addFlag ) {
        var div = document.getElementById("module_add_categories_div");
        var i = div.children.length - 1;
        
        var elemToClone = document.getElementById("module_add_categoryDiv_0");
        var id = "module_add_categoryDiv_" + i;
        var categoryID = "module_add_category_" + i;
        var workloadID = "module_add_categoryWorkload_" + i;
        var semesterID = "module_add_categorySemester_" + i;
        var theoryFlagDivID = "module_add_TheoryFlag_" + i;
        var theoryFlag_theoryID = "module_add_TheoryFlag_theory_" + i;
        var theoryFlag_Name = "module_add_TheoryFlag_" + i;
        var teoryFlag_practicalID = "module_add_TheoryFlag_practical_" + i;
    }
    else {
        var div = document.getElementById("module_change_categories_div");
        var i = div.children.length - 1;

        var elemToClone = document.getElementById("module_change_categoryDiv_0");
        var id = "module_change_categoryDiv_" + i;
        var categoryID = "module_change_category_" + i;
        var workloadID = "module_change_categoryWorkload_" + i;
        var semesterID = "module_change_categorySemester_" + i;
        var theoryFlagDivID = "module_change_TheoryFlag_" + i;
        var theoryFlag_theoryID = "module_change_TheoryFlag_theory_" + i;
        var theoryFlag_Name = "module_change_TheoryFlag_" + i;
        var teoryFlag_practicalID = "module_change_TheoryFlag_practical_" + i;
    }

    var clone = elemToClone.cloneNode(true);
    clone.setAttribute("id", id);
    clone.setAttribute("name", id);

    childDiv = clone.getElementsByTagName('div');

    var categoryLabel = childDiv[0].getElementsByTagName('label');
    categoryLabel[0].setAttribute("for", categoryID);

    var categorySelect = childDiv[0].getElementsByTagName('select')
    categorySelect[0].setAttribute("id", categoryID);
    categorySelect[0].setAttribute("name", categoryID);
    categorySelect[0].setAttribute("data-id", i);

    var workloadLabel = childDiv[1].getElementsByTagName('label');
    workloadLabel[0].setAttribute("for", workloadID);

    var workloadInput = childDiv[1].getElementsByTagName('input');
    workloadInput[0].setAttribute("id", workloadID);
    workloadInput[0].setAttribute("name", workloadID);

    var semesterLabel = childDiv[2].getElementsByTagName('label');
    semesterLabel[0].setAttribute("for", semesterID);

    var semesterInput = childDiv[2].getElementsByTagName('input')
    semesterInput[0].setAttribute("id", semesterID);
    semesterInput[0].setAttribute("name", semesterID);

    var theoryFlagDiv = childDiv[3];
    theoryFlagDiv.setAttribute("id", theoryFlagDivID);
    
    var theoryFlag_tDiv = theoryFlagDiv.getElementsByTagName('div')[0];
    var theoryFlag_pDiv = theoryFlagDiv.getElementsByTagName('div')[1];

    var theoryFlag_theory_label = theoryFlag_tDiv.getElementsByTagName('label');
    theoryFlag_theory_label[0].setAttribute("for", theoryFlag_theoryID);

    var theoryFlag_theory_input = theoryFlag_tDiv.getElementsByTagName('input');
    theoryFlag_theory_input[0].setAttribute("id", theoryFlag_theoryID);
    theoryFlag_theory_input[0].setAttribute("name", theoryFlag_Name);

    var theoryFlag_practical_label = theoryFlag_pDiv.getElementsByTagName('label');
    theoryFlag_practical_label[0].setAttribute("for", teoryFlag_practicalID);

    var theoryFlag_prctical_input = theoryFlag_pDiv.getElementsByTagName('input');
    theoryFlag_prctical_input[0].setAttribute("id", teoryFlag_practicalID);
    theoryFlag_prctical_input[0].setAttribute("name", theoryFlag_Name);

    descendants = clone.querySelectorAll("*");
    descendants.forEach(function(item) {
        item.removeAttribute("disabled");
    });
    clone.classList.remove("invisible");

    div.appendChild(clone);
}

function addExamEntry(addFlag) {
    if(addFlag ) {
        var div = document.getElementById("module_add_exams_div");
        var i = div.children.length - 1;
        
        var elemToClone = document.getElementById("module_add_examDiv_0");
        var id = "module_add_examDiv_" + i;
        var examTypeID = "module_add_examType_" + i;
        var durationID = "module_add_examDuration_" + i;
        var circumferenceID = "module_add_examCircumference_" + i;
        var periodID = "module_add_examPeriod_" + i;
        var weightingID = "module_add_examWeighting_" + i;
        var semesterID = "module_add_examSemester_" + i;
    }
    else {
        var div = document.getElementById("module_change_exams_div");
        var i = div.children.length - 1;
        
        var elemToClone = document.getElementById("module_change_examDiv_0");
        var id = "module_change_examDiv_" + i;
        var examTypeID = "module_change_examType_" + i;
        var durationID = "module_change_examDuration_" + i;
        var circumferenceID = "module_change_examCircumference_" + i;
        var periodID = "module_change_examPeriod_" + i;
        var weightingID = "module_change_examWeighting_" + i;
        var semesterID = "module_change_examSemester_" + i;
    }

    var clone = elemToClone.cloneNode(true);
    clone.setAttribute("id", id);
    clone.setAttribute("name", id);

    childDiv = clone.getElementsByTagName('div');

    var examTypeLabel = childDiv[0].getElementsByTagName('label');
    examTypeLabel[0].setAttribute("for", examTypeID);

    var examTypeSelect = childDiv[0].getElementsByTagName('select')
    examTypeSelect[0].setAttribute("id", examTypeID);
    examTypeSelect[0].setAttribute("name", examTypeID);

    var durationLabel = childDiv[1].getElementsByTagName('label');
    durationLabel[0].setAttribute("for", durationID);

    var durationInput = childDiv[1].getElementsByTagName('input');
    durationInput[0].setAttribute("id", durationID);
    durationInput[0].setAttribute("name", durationID);    

    var circumferencelabel = childDiv[2].getElementsByTagName('label');
    circumferencelabel[0].setAttribute("for", circumferenceID);

    var circumferenceInput = childDiv[2].getElementsByTagName('input');
    circumferenceInput[0].setAttribute("id", circumferenceID);
    circumferenceInput[0].setAttribute("name", circumferenceID);

    var periodLabel = childDiv[3].getElementsByTagName('label');
    periodLabel[0].setAttribute("for", periodID);

    var periodInput = childDiv[3].getElementsByTagName('input');
    periodInput[0].setAttribute("id", periodID);
    periodInput[0].setAttribute("name", periodID);

    var weightingLabel = childDiv[4].getElementsByTagName('label');
    weightingLabel[0].setAttribute("for", weightingID);

    var weightingInput = childDiv[4].getElementsByTagName('input');
    weightingInput[0].setAttribute("id", weightingID);
    weightingInput[0].setAttribute("name", weightingID);

    var semesterLabel = childDiv[5].getElementsByTagName('label');
    semesterLabel[0].setAttribute("for", semesterID);

    var semesterInput = childDiv[5].getElementsByTagName('input')
    semesterInput[0].setAttribute("id", semesterID);
    semesterInput[0].setAttribute("name", semesterID);

    descendants = clone.querySelectorAll("*");
    descendants.forEach(function(item) {
        item.removeAttribute("disabled");
    });
    clone.classList.remove("invisible");

    div.appendChild(clone);
}

function removeEntry(button) {
    button.parentElement.classList.add("invisible");
    descendants = button.parentElement.querySelectorAll("*");
    descendants.forEach(function(item) {
        item.setAttribute("disabled", "disabled");
    });
}

function removeLastSelectEntry(button) {
    var div = button.parentElement;
    var items = div.querySelectorAll('select:not(.invisible)');
    if(items.length > 1) {
        var item = items[items.length - 1];
        item.setAttribute("disabled", "disabled");
        item.classList.add("invisible");
    }
}