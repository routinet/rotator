<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
function rquoteBuildRoute(&$query)
{
    $segments = array();
    if (isset($query['view'])) {
        $segments[] = $query['view'];
        unset($query['view']);
    }
    // set view in every case
    else
    {
   //    $segments[] = 'rquotes';
     $segments[] = '';
    }
  return $segments;
}

function rquoteParseRoute($segments)
{
    $vars = array();
    switch ($segments[0])
    {
        case 'create':
            $vars['view'] = 'create';
            break;
        case 'rquotes':
        default:
            $vars['view'] = 'rquotes';
            break;
    }
    return $vars;
}
