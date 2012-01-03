<?php

if (!defined('DOKU_INC'))
  define('DOKU_INC',realpath(dirname(__FILE__).'/../../').'/');
if (!defined('DOKU_PLUGIN'))
  define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');

require_once(DOKU_PLUGIN.'syntax.php');

class syntax_plugin_xfcedocs extends DokuWiki_Syntax_Plugin
{
    /**
     * return some info
     **/
    function getInfo ()
    {
        return array
        (
            'author' => 'Nick Schermer',
            'email'  => 'nick@xfce.org',
            'date'   => '2011-12-31',
            'name'   => 'Xfce Syntax Plugin',
            'desc'   => 'Syntax helpers for the Xfce wikis',
            'url'    => 'http://git.xfce.org',
        );
    }

    /**
     * What kind of syntax are we?
     **/
    function getType ()
    {
        return 'substition';
    }

    /**
     * Paragraph Type
     **/
    function getPType ()
    {
        return 'normal';
    }

    /**
     * Where to sort in?
     */
    function getSort ()
    {
        return 10;
    }

    /**
     * Connect pattern to lexer
     */
    function connectTo ($mode)
    {
        $this->Lexer->addSpecialPattern('\{gui\>.*?\}', $mode, 'plugin_xfcedocs');
        $this->Lexer->addSpecialPattern('\{key\>.*?\}', $mode, 'plugin_xfcedocs');
        $this->Lexer->addSpecialPattern('\{bug\>\d+\}', $mode, 'plugin_xfcedocs');
    }

    /**
     * Handle the match
     */
    function handle ($match, $state, $pos, &$handler)
    {
        switch ($state)
        {
            case DOKU_LEXER_ENTER :
            case DOKU_LEXER_MATCHED :
            case DOKU_LEXER_UNMATCHED :
            case DOKU_LEXER_EXIT :
                break;

            case DOKU_LEXER_SPECIAL :
                if (strpos ($match, '{gui>') === 0)
                    return array('gui', substr ($match, 5, -1));
                elseif (strpos ($match, '{bug>') === 0)
                    return array('bug', substr ($match, 5, -1));
                elseif (strpos ($match, '{key>') === 0)
                    return array('key', substr ($match, 5, -1));
        }

        return array();
    }

    /**
     * Create output
     */
    function render($mode, &$renderer, $data)
    {
        if( $mode == 'xhtml')
        {
            list ($type, $match) = $data;

            if ($type == 'gui')
                $renderer->doc .= '<span class="gui"><strong>'. str_replace ('>', '</strong> &#8594; <strong>', $match) .'</strong></span>';
            elseif ($type == 'bug')
                 $renderer->externallink('https://bugzilla.xfce.org/show_bug.cgi?id='.$match, 'bug #'.$match);
            elseif ($type == 'key')
                 $renderer->doc .= '<span class="key"><strong>'. str_replace ('+', '</strong>-<strong>', $match) .'</strong></span>';
            else
                 return false;

            return true;
        }
        return false;
    }
};

?>
