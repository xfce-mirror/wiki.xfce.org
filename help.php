<?php

function get_value($name, $fallback = null)
{
  if (isset ($_GET[$name]))
    return $_GET[$name];
  return $fallback;
}

/* Path to the dokuwiki data */
$relpath = '/../domains/docs2.xfce.org/data/pages/';
$root = realpath (dirname ($_SERVER['SCRIPT_FILENAME']) . $relpath);
if (!is_dir ($root) || !chdir (($root)))
    die ('Pages path is not properly configured');

/* Subpaths in which components are expected */
$subdirs = array ('xfce', 'apps', 'panel-plugins', 'thunar-plugins');
$defpage = 'start';

/* Get information about from the uri */
//$version = get_value ('version');
$locale = get_value ('locale');
$component = get_value ('component');
$page = get_value ('page', $defpage);
$offset = get_value ('offset');

/* Start uri */
$uri = '';

/* Find component */
if ($component != null)
{
    foreach ($subdirs as $subdir)
    {
        $path = $subdir.'/'.$component.'/';
        if (is_dir ($path))
        {
            $uri = $path;
            break;
        }
    }
}

/* Get component page */
if (is_file ($uri.$page.'.txt'))
    $uri .= $page;
elseif (is_file ($uri.$defpage.'.txt'))
    $uri .= $defpage;
else
    $uri = $defpage;

/* Get locales array */
if (empty ($locale))
{
    $locales = array ();
}
else
{
    /* Sanitize the value */
    list ($locale) = preg_split ('/[\s.]+/', $locale);
    $locale = str_replace ('_', '-', $locale);

    /* Create possible locales array */
    $locales = array ($locale);
    $codes = explode ('-', $locale);
    if (count ($codes) > 1)
        $locales[] = $codes[0];
}

/* Append browser languages */
if (isset ($_SERVER['HTTP_ACCEPT_LANGUAGE']))
{
    $accept = strtolower ($_SERVER['HTTP_ACCEPT_LANGUAGE']);
    foreach (explode (',', $accept) as $lang)
    {
        list ($code) = explode (';', $lang);
        if (!in_array ($code, $locales))
            $locales[] = $code;
    }
}

/* Check if there is a translation */
foreach ($locales as $code)
{
    if (!empty ($code) && is_dir ($code))
    {
        $path = $code.'/'.$uri;
        if (is_file ($path.'.txt'))
        {
            $uri = $path;
            break;
        }
    }
}

/* Append the offset */
if (!empty ($offset))
    $uri .= '#'.$offset;

/* Redirect */
header('Location: /'.$uri);

?>
