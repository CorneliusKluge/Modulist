<!DOCTYPE html>
<html>
    <head>
        <script src="js/studyManagement.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" type="image/x-icon" href="/Modulist/favicon.ico">
    </head>
    <body>
        <header>
            <a class="img-logo"></a>
            <nav class="navbar">
                <ul class="navbar_container">
                    <li class="navbar_entry"><a href="./module">Module</a></li>
                    <li class="navbar_entry"><a href="./category">Modulkategorien</a></li>
                    <li class="navbar_entry"><a href="./literature">Literatur</a></li>
                    <li class="navbar_entry"><a href="./studymanagement">Studienverwaltung</a></li>
                    <li class="navbar_entry"><a href="./export">Export</a></li>
                </ul>
            </nav>
        </header>
        <h1>Studienverwaltung</h1>
        <div class="course_container">
            <div class="course_container_header">
                <h2>Studiengänge verwalten</h2>
                <button type="button" id="course_add_button" class="table_add_button button" value=""></button>
            </div>
            <div id="course_form_container"></div>
        
            <div id="course_message_container"></div>
            <div class="course_management_container">
                <div id="course_list_container"></div>
            </div>
            <div id="course_deleteForm_container" class="message_container"></div>
        </div>

        <div class="field_container">
            <div class="field_container_header">
                <h2>Studienrichtungen verwalten</h2>
                <button type="button" id="field_add_button" class="table_add_button button" value=""></button>
            </div>
            <div id="field_form_container"></div>
            <div id="field_message_container" class="message_container"></div>
            <div class="field_management_container">
               
                <div id="field_list_container"></div>
            </div>
            <div id="field_deleteForm_container" class="message_container"></div>
        </div>

        <div id="overlay" class="overlay overlay--invisible"></div>
    </body>
</html>