<!DOCTYPE html>
<html>
    <head>
        <title>Modulverwaltung</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" type="image/x-icon" href="/Modulist/favicon.ico">
        <script src="libs/tinymce/tinymce.min.js"></script>
        <script src="js/module.js"></script>
        <script>
            tinymce.init({
                selector: '.form_editor',
                menubar: 'edit view format'
            });
        </script>
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
        <h1>Modulverwaltung</h1>
        %1$s

        %2$s

        %3$s
        <script src="js/deleteView.js"></script>
    </body>
</html>