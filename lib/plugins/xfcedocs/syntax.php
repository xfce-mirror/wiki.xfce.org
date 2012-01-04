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

    function getAllowedTypes ()
    {
        return array('container','substition','protected','disabled','formatting','paragraphs');
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
        $this->Lexer->addEntryPattern('<figure ["\'].*?["\']>(?=.*?</figure>)',$mode,'plugin_xfcedocs');
    }

    function postConnect() {
        $this->Lexer->addExitPattern('</figure>','plugin_xfcedocs');
    }

    /**
     * Handle the match
     */
    function handle ($match, $state, $pos, &$handler)
    {
        switch ($state)
        {
            case DOKU_LEXER_ENTER:
                if (strpos ($match, '<figure ') === 0)
                    return array($state, 'figure', substr ($match, 9, -2));
                return array($state, $this->default);

            case DOKU_LEXER_MATCHED:
            case DOKU_LEXER_UNMATCHED:
            case DOKU_LEXER_EXIT:
                return array($state, null, $match);
                break;

            case DOKU_LEXER_SPECIAL:
                if (strpos ($match, '{gui>') === 0)
                    return array($state, 'gui', substr ($match, 5, -1));
                elseif (strpos ($match, '{bug>') === 0)
                    return array($state, 'bug', substr ($match, 5, -1));
                elseif (strpos ($match, '{key>') === 0)
                    return array($state, 'key', substr ($match, 5, -1));
        }

        return array();
    }

    /**
     * Create output
     */
    function render ($mode, &$renderer, $data)
    {
        if ($mode == 'xhtml')
        {
            list ($state, $type, $match) = $data;
            
            switch ($state)
            {
                case DOKU_LEXER_ENTER:
                    if ($type == 'figure')
                        $renderer->doc .= '<table class="figure">'.
                                          '<tr><th>'. $renderer->_xmlEntities($match) .'</th></tr>'.
                                          '<tr><td>';
                    else
                        return false;
                    break;
                
                case DOKU_LEXER_EXIT :
                    $renderer->doc .= '</td></tr></table>';
                    break;
                
                case DOKU_LEXER_UNMATCHED :
                    $renderer->doc .= $renderer->_xmlEntities($match);
                    break;
                
                case DOKU_LEXER_SPECIAL:
                    if ($type == 'gui')
                        $renderer->doc .= '<span class="gui"><strong>'. str_replace ('>', '</strong> &#8594; <strong>', $match) .'</strong></span>';
                    elseif ($type == 'bug')
                        $renderer->externallink('https://bugzilla.xfce.org/show_bug.cgi?id='.$match, 'bug #'.$match);
                    elseif ($type == 'key')
                        $renderer->doc .= '<span class="key"><strong>'. str_replace ('+', '</strong>-<strong>', $match) .'</strong></span>';
                    elseif ($type == 'figure')
                        $renderer->doc .= '<div class="figure">'. $match .'</div>';
                    else
                        return false;
                    break;
            }

            return true;
        }
        return false;
    }
};

?>
