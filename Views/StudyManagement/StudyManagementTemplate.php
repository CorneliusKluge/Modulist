<!DOCTYPE html>
<html>
    <head>
        <script src="js/studyManagement.js"></script>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <a class="img-logo"></a>
            <nav class="navbar">
                <ul class="navbar_container">
                    <li class="navbar_entry"><a href="index.php?subcontroller=module">Module</a></li>
                    <li class="navbar_entry"><a href="index.php?subcontroller=category">Modulkategorien</a></li>
                    <li class="navbar_entry"><a href="index.php?subcontroller=literature">Literatur</a></li>
                    <li class="navbar_entry"><a href="index.php?subcontroller=studymanagement">Studienverwaltung</a></li>
                    <li class="navbar_entry"><a href="index.php?subcontroller=export">Export</a></li>
                    <!-- <li class="navbar_entry"><a  href="index.php?subcontroller=options">Optionen</a></li> -->
                </ul>
            </nav>
        </header>
        <h1>Studienverwaltung</h1>
        <h2>Studiengänge verwalten</h2>
        <div class="course_container">
            <div id="course_form_container"></div>
            
            <div id="course_message_container"></div>
            <div class="course_management_container">
                <button type="button" id="course_add_button">Erstellen</button>
                <div id="course_list_container"></div>
            </div>
            <div id="course_deleteForm_container"></div>
        </div>

        <h2>Studienrichtungen verwalten</h2>
        <div class="field_container">
            <div id="field_form_container"></div>

            <div id="field_message_container"></div>
            <div class="field_management_container">
                <button type="button" id="field_add_button">Erstellen</button>
                <div id="field_list_container"></div>
            </div>
            <div id="field_deleteForm_container"></div>
        </div>

        <div id="overlay"></div>
    </body>
</html>