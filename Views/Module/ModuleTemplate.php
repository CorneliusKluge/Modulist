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
        <nav class="navbar">
            <div>
                <a class="img-logo"></a>
                <ul class="navbar_container">
                    <li class="navbar_entry"><a>Home</a></li>
                    <li class="navbar_entry"><a>Modulverwaltung</a></li>
                    <li class="navbar_entry"><a>Modulkategorieverwaltung</a></li>
                    <li class="navbar_entry"><a>Literaturverwaltung</a></li>
                    <li class="navbar_entry"><a>Export</a></li>
                    <!-- <li class="navbar_entry"><a>Optionen</a></li> -->
                </ul>
            </div>
        </nav>
        <h1>Modulverwaltung</h1>
        %1$s

        %2$s

        %3$s
    </body>
</html>