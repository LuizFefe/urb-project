<?php
// This function will take $_SERVER['REQUEST_URI'] and build a breadcrumb based on the user's current path
function breadcrumbs($separator = ' &raquo; ', $home = 'Inicio')
{
    $lastcrumb = '';
    // This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values
    $path = array_filter(explode('/', parse_url(rawurldecode($_SERVER['REQUEST_URI']), PHP_URL_PATH)));
    /* var_dump(rawurldecode($_SERVER['REQUEST_URI'])); */
    // This will build our "base URL" ... Also accounts for HTTPS :)
    $base = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];

    // Initialize a temporary array with our breadcrumbs. (starting with our home page, which I'm assuming will be the base URL)
    $breadcrumbs = array("<a class='crumble' href=\"$base\">$home</a>");

    // Find out the index for the last value in our path array
    $last = end(array_keys($path));
    // Build the rest of the breadcrumbs
    foreach ($path as $x => $crumb) {
        /* var_dump($crumb); */
        // Our "title" is the text that will be displayed (strip out .php and turn '_' into a space)
        $title = ucwords(str_replace(array('.php', '_'), array('', ' '), $crumb));
        rawurldecode($title);
        /* utf8_decode($title);
        var_dump($title); */
        // If we are not on the last index, then display an <a> tag
        if ($x != $last) {
            $breadcrumbs[] = "<a class='crumble' href=\"$base/$lastcrumb$crumb\">$title</a>";
            /* var_dump("$title"); */
            $lastcrumb = "$lastcrumb/$title/";
        }

        // Otherwise, just display the title (minus)
        else
            $breadcrumbs[] = $title;
    }

    // Build our temporary array (pieces of bread) into one big string :)
    return implode($separator, $breadcrumbs);
}
?>

<style>
    .crumble {
        font-size: 2rem;
    }

    @media (max-width: 450px) {
        .crumble {
            font-size: 1rem;
        }
    }
</style>