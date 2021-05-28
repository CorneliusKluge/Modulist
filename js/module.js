var fieldEntry = 0;
var categoryEntry = 0;
var examEntry = 0;
var basicLiteratureEntry = 0;
var deepeningLiteratureEntry = 0;

//TODO: fill selectfield with options
function addFieldEntry(addFlag) {
    fieldEntry++;

    var div;
    var addOrChange;

    if(addFlag) {
        div = document.getElementById("module_add_field_div");
        addOrChange = "_add_";
    }
    else {
        div = document.getElementById("module_change_field_div");
        addOrChange = "_change_";
    }

    var fieldID = "module" + addOrChange + "field_" + fieldEntry;

    var fieldInput = document.createElement("select");
    fieldInput.setAttribute("class", "form_select");
    fieldInput.setAttribute("id", fieldID);
    fieldInput.setAttribute("name", fieldID);

    div.appendChild(fieldInput);
}

//TODO: fill selectfield with options
function addCategoryEntry(addFlag) {
    categoryEntry++;
    var categoriesDiv;

    if(addFlag) {
        var categoriesDiv = document.getElementById("module_add_categories_div");
        addOrChange = "_add_";
    }
    else {
        categoriesDiv = document.getElementById("module_change_categories_div");
        addOrChange = "_change_";
    }

    //category
    var categoryDivId = "module" + addOrChange + "category_div_" + categoryEntry;
    var categoryDiv = document.createElement("div");
    categoryDiv.setAttribute("class", "form_item");
    categoryDiv.setAttribute("id", categoryDivId);

    var categoryId = "module" + addOrChange + "category_" + categoryEntry;
    var categoryInput = document.createElement("select");
    categoryInput.setAttribute("class", "form_select");
    categoryInput.setAttribute("id", categoryId);
    categoryInput.setAttribute("name", categoryId);
   /* if(categories.length != 0) {
        categories.forEach(category => {
            categoryInput.options.add(new Option(category[0].toString())); //name
        });
    }*/

    var categoryLabel = document.createElement("label");
    categoryLabel.setAttribute("class", "form_label");
    categoryLabel.setAttribute("for", categoryId);
    categoryLabel.innerHTML = "Kategorie:";
    
    categoriesDiv.appendChild(categoryDiv);
    categoryDiv.appendChild(categoryLabel);
    categoryDiv.appendChild(categoryInput);

    //workload
    var workloadDivId = "module" + addOrChange + "categoryWorkload_div_" + categoryEntry;
    var workloadDiv = document.createElement("div");
    workloadDiv.setAttribute("class", "form_item");
    workloadDiv.setAttribute("id", workloadDivId);

    var workloadId = "module" + addOrChange + "categoryWorkload_" + categoryEntry;
    var workloadInput = document.createElement("input");
    workloadInput.setAttribute("class", "form_input");
    workloadInput.setAttribute("type", "number");
    workloadInput.setAttribute("id", workloadId);
    workloadInput.setAttribute("name", workloadId);

    var workloadLabel = document.createElement("label");
    workloadLabel.setAttribute("class", "form_label");
    workloadLabel.innerHTML = "Workload (h):";
    workloadLabel.setAttribute("for", workloadId);

    categoriesDiv.appendChild(workloadDiv);
    workloadDiv.appendChild(workloadLabel);
    workloadDiv.appendChild(workloadInput);

    //selflearning theoryFlag divs and headline label
    var theoryFlagDivID = "module" + addOrChange + "TheoryFlag_div_" + categoryEntry;
    var theoryFlagDivID_t = "module" + addOrChange + "TheoryFlag_theory_div_" + categoryEntry;
    var theoryFlagDivID_p = "module" + addOrChange + "TheoryFlag_practical_div_" + categoryEntry;

    var theoryFlagDiv = document.createElement("div");
    theoryFlagDiv.setAttribute("class", "form_item");
    theoryFlagDiv.setAttribute("id", theoryFlagDivID);

    var theoryFlagDiv_t = document.createElement("div");
    theoryFlagDiv_t.setAttribute("class", "form_radio_entry");
    theoryFlagDiv_t.setAttribute("id", theoryFlagDivID_t);

    var theoryFlagDiv_p = document.createElement("div");
    theoryFlagDiv_p.setAttribute("class", "form_radio_entry");
    theoryFlagDiv_p.setAttribute("id", theoryFlagDivID_p);

    var theoryFlagLabel = document.createElement("label");
    theoryFlagLabel.setAttribute("class", "form_label");
    theoryFlagLabel.innerHTML = "Einteilung EVL Theorie/Praxis";

    categoriesDiv.appendChild(theoryFlagDiv);
    theoryFlagDiv.appendChild(theoryFlagLabel);
    theoryFlagDiv.appendChild(theoryFlagDiv_t);
    theoryFlagDiv.appendChild(theoryFlagDiv_p);

    //selflearning theoryFlag: theory
    var theoryFlagId_t = "module" + addOrChange + "TheoryFlag_theory_" + categoryEntry;
    var theoryFlagInput_t = document.createElement("input");
    theoryFlagInput_t.setAttribute("class", "form_radio_box");
    theoryFlagInput_t.setAttribute("type", "radio");
    theoryFlagInput_t.setAttribute("id", theoryFlagId_t);
    theoryFlagInput_t.setAttribute("name", theoryFlagId_t);

    var theoryFlagLabel_t = document.createElement("label");
    theoryFlagLabel_t.setAttribute("class", "form_radio_label");
    theoryFlagLabel_t.innerHTML = "EVL Theorie";
    theoryFlagLabel_t.setAttribute("for", theoryFlagId_t);

    theoryFlagDiv_t.appendChild(theoryFlagInput_t);
    theoryFlagDiv_t.appendChild(theoryFlagLabel_t);

    //selflearning theoryFlag: practical
    var theoryFlagId_p = "module" + addOrChange + "TheoryFlag_practical_" + categoryEntry;
    var theoryFlagInput_p = document.createElement("input");
    theoryFlagInput_p.setAttribute("class", "form_radio_box");
    theoryFlagInput_p.setAttribute("type", "radio");
    theoryFlagInput_p.setAttribute("id", theoryFlagId_p);
    theoryFlagInput_p.setAttribute("name", theoryFlagId_p);

    var theoryFlagLabel_p = document.createElement("label");
    theoryFlagLabel_p.setAttribute("class", "form_radio_label");
    theoryFlagLabel_p.innerHTML = "EVL Praxis";
    theoryFlagLabel_p.setAttribute("for", theoryFlagId_p);

    theoryFlagDiv_p.appendChild(theoryFlagInput_p);
    theoryFlagDiv_p.appendChild(theoryFlagLabel_p);
}

function addExamEntry(addFlag) {
    examEntry++;

    var examTypeDiv;
    var examDurationDiv;
    var examCircumferenceDiv;
    var examPeriodDiv;
    var examWeigthingDiv;
    var addOrChange;

    if(addFlag) {
        examTypeDiv = document.getElementById("module_add_examType_div");
        examDurationDiv = document.getElementById("module_add_examDuration_div");
        examCircumferenceDiv = document.getElementById("module_add_examCircumference_div");
        examPeriodDiv = document.getElementById("module_add_examPeriod_div");
        examWeigthingDiv = document.getElementById("module_add_examWeighting_div");

        addOrChange = "_add_";
    }
    else {
        examTypeDiv = document.getElementById("module_change_examType_div");
        examDurationDiv = document.getElementById("module_change_examDuration_div");
        examCircumferenceDiv = document.getElementById("module_change_examCircumference_div");
        examPeriodDiv = document.getElementById("module_change_examPeriod_div");
        examWeigthingDiv = document.getElementById("module_change_examWeighting_div");
        addOrChange = "_change_";
    }

    var examTypeID = "module" + addOrChange + "examType_" + examEntry;
    var examDurationID = "module" + addOrChange + "examDuration_" + examEntry;
    var examCircumferenceID = "module" + addOrChange + "examCircumference_" + examEntry;
    var examPeriodID = "module" + addOrChange + "examPeriod_" + examEntry;
    var examWeigthingID = "module" + addOrChange + "examWeighting_" + examEntry;


    var examTypeInput = document.createElement("select");
    examTypeInput.setAttribute("class", "form_select");
    examTypeInput.setAttribute("id", examTypeID);
    examTypeInput.setAttribute("name", examTypeID);
    examTypeInput.add(new Option("Klausurarbeit", "1"));
    examTypeInput.add(new Option("Mündliche Prüfungen", "2"));
    examTypeInput.add(new Option("Mündliches Fachgespräch", "3"));
    examTypeInput.add(new Option("Präsentation", "4"));
    examTypeInput.add(new Option("Projektarbeit", "5"));
    examTypeInput.add(new Option("Präsentation", "6"));
    examTypeInput.add(new Option("Seminararbeit", "7"));
    examTypeInput.add(new Option("Programmentwurf", "8"));
    examTypeInput.add(new Option("Prüfung am Computer", "9"));
    examTypeInput.add(new Option("Praktische Prüfung", "10"));

    var examDurationInput = document.createElement("input");
    examDurationInput.setAttribute("class", "form_input");
    examDurationInput.setAttribute("type", "string");
    examDurationInput.setAttribute("id", examDurationID);
    examDurationInput.setAttribute("name", examDurationID);

    var examCircumferenceInput = document.createElement("input");
    examCircumferenceInput.setAttribute("class", "form_input");
    examCircumferenceInput.setAttribute("type", "string");
    examCircumferenceInput.setAttribute("id", examCircumferenceID);
    examCircumferenceInput.setAttribute("name", examCircumferenceID);

    var examPeriodInput = document.createElement("input");
    examPeriodInput.setAttribute("class", "form_input");
    examPeriodInput.setAttribute("type", "string");
    examPeriodInput.setAttribute("id", examPeriodID);
    examPeriodInput.setAttribute("name", examPeriodID);

    var examWeightingInput = document.createElement("input");
    examWeightingInput.setAttribute("class", "form_input");
    examWeightingInput.setAttribute("type", "string");
    examWeightingInput.setAttribute("id", examWeigthingID);
    examWeightingInput.setAttribute("name", examWeigthingID);

    examTypeDiv.appendChild(examTypeInput);
    examDurationDiv.appendChild(examDurationInput);
    examCircumferenceDiv.appendChild(examCircumferenceInput);
    examPeriodDiv.appendChild(examPeriodInput);
    examWeigthingDiv.appendChild(examWeightingInput);
}

//TODO: fill selectfield with options
function addBasicLiteratureEntry(addFlag) {
    basicLiteratureEntry++;

    var div;
    var addOrChange;

    if(addFlag) {
        div = document.getElementById("module_add_basicLiterature_div");
        addOrChange = "_add_";
    }
    else {
        div = document.getElementById("module_change_basicLiterature_div");
        addOrChange = "_change_";
    }

    var basicLiteratureID = "module" + addOrChange + "basicLiterature_" + basicLiteratureEntry;

    var basicLiteratureInput = document.createElement("select");
    basicLiteratureInput.setAttribute("class", "form_select");
    basicLiteratureInput.setAttribute("id", basicLiteratureID);
    basicLiteratureInput.setAttribute("name", basicLiteratureID);

    div.appendChild(basicLiteratureInput);
}

//TODO: fill selectfield with options
function addDeepeningLiteratureEntry(addFlag) {
    deepeningLiteratureEntry++;

    var div;
    var addOrChange;

    if(addFlag) {
        div = document.getElementById("module_add_deepeningLiterature_div");
        addOrChange = "_add_";
    }
    else {
        div = document.getElementById("module_change_deepeningLiterature_div");
        addOrChange = "_change_";
    }

    var deepeningLiteratureID = "module" + addOrChange + "deepeningLiterature_" + deepeningLiteratureEntry;

    var deepeningLiteratureInput = document.createElement("select");
    deepeningLiteratureInput.setAttribute("class", "form_select");
    deepeningLiteratureInput.setAttribute("id", deepeningLiteratureID);
    deepeningLiteratureInput.setAttribute("name", deepeningLiteratureID);

    div.appendChild(deepeningLiteratureInput);
}