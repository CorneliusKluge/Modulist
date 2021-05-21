<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
        <script src="libs/tinymce/tinymce.min.js"></script>
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
                    <li class="navbar_entry"><a href="index.php?subcontroller=module">Module</a></li>
                    <li class="navbar_entry"><a href="index.php?subcontroller=category">Modulkategorien</a></li>
                    <li class="navbar_entry"><a href="index.php?subcontroller=literature">Literatur</a></li>
                    <li class="navbar_entry"><a href="index.php?subcontroller=studymanagement">Studienverwaltung</a></li>
                    <li class="navbar_entry"><a href="index.php?subcontroller=export">Export</a></li>
                    <!-- <li class="navbar_entry"><a  href="index.php?subcontroller=options">Optionen</a></li> -->
                </ul>
            </nav>
        </header>
        <h1>Modulverwaltung</h1>
        %1$s

        %2$s

        %3$s
    </body>
</html>