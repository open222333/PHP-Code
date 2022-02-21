<html>

<head>
    <title>Index</title>
</head>

<body>
    <?php
    $dir = ".";
    echo '網頁：';
    getDirList($dir);

    function getDirList($dir)
    {
        $ignore = array('dinner.db', 'README.md', 'example.html');
        echo "<br>$dir<br>";
        if (is_dir($dir)) {
            $dh = opendir($dir);
            chdir($dir);
            while (($file = readdir($dh)) !== false) {
                if (is_dir($file) && basename($file) != '.' && basename($file) != '..')
                    getDirList($file);
                else if (filename($file) != "." && filename($file) != "..")
                    // echo "$file";
                    if (!in_array($file, $ignore)) {
                        echo '<br>';
                        echo "<a href='http://127.0.0.1/Learning_PHP/$dir/$file'>$file</a>";
                    }
            }
            chdir("../");
            closedir($dh);
            echo '<br>';
        }
    }

    function filename($file)
    {
        $path_parts = pathinfo($file);
        return basename($file, $path_parts['extension']);
    }
    ?>
</body>

</html>