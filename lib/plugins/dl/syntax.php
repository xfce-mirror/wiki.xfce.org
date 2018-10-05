    <?php
        if(!defined('DOKU_INC')) define('DOKU_INC',realpath(dirname(__FILE__).'/../../').'/');
    if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
    require_once(DOKU_PLUGIN.'syntax.php');

    /** Declare Definition List.

        Declares a HTML - Definition-List

        Indentation: First either no indentation, or any number of spaces.
        Title: Line starts with (optional) spaces and a question mark
        Definition: Line starts with (opt.) spaces and an exclamation mark
        End: Multiple lines are allowed, so an empty line declares the end
        Subdefinitions: Indent more

        Syntax:
         ? Definition Title
           Multiple lines are possible
         ! Definition Description
         ? Definition Title1
         ? Definition Title2
         ! Definition Description1
         ! Definition Description2
         ! Definition Description3
           ? Subdefinition
           ! Description
         ! Back
           ? Again deeper

        License: LGPL
        */
    class syntax_plugin_dl extends DokuWiki_Syntax_Plugin {

      function getInfo() {
        return array('author' => 'Marc Wäckerlin',
                     'email'  => 'marc [at] waeckerlin [dot-org]',
                     'name'   => 'Definition List Plugin',
                     'desc'   => 'HTML Definition List',
                     'url'    => 'http://marc.waeckerlin.org');
      }

      function getType() {
        return 'container';
      }

      function getAllowedTypes() {
        return array('container','substition','protected','disabled','formatting','paragraphs');
      }
      
      function getPType() {
         return 'block';
      }

      function getSort() {
        return 10;
      }

      function connectTo($mode) {
        $this->Lexer->addEntryPattern('^ *\!', $mode, 'plugin_dl');
        $this->Lexer->addEntryPattern('^ *\?[^\n]*', $mode, 'plugin_dl');
      }

      function postConnect() {
        $this->Lexer->addPattern('\n *\!', 'plugin_dl');
        $this->Lexer->addPattern('^ *\!', 'plugin_dl');
        $this->Lexer->addPattern('\n *\?[^\n]*', 'plugin_dl');
        $this->Lexer->addPattern('^ *\?[^\n]*', 'plugin_dl');
        $this->Lexer->addExitPattern('\n$', 'plugin_dl');
      }

      function handle($match, $state, $pos, Doku_Handler $handler){
        if (($state==DOKU_LEXER_MATCHED ||
             $state==DOKU_LEXER_ENTER)
            && preg_match('/\?/', $match)) {
          $title =
            htmlspecialchars(preg_replace("/\n* *\?(.*)/", '\1', $match));
	  $match = preg_replace("/(\n* *\?).*/", '\1', $match);
        } else {
          $title = '';
        }
        return array($match, $state, $title);
      }

      function render($format, Doku_Renderer $renderer, $data) {
        static $close = '';
        static $level = 0;
        static $last_neesting = 0;
        static $indent = array();
        static $dlstart = "\n<dl>";
        static $dlend = "\n</dl>";
        static $dtstart = "\n<dt>";
        static $dtend = "</dt>";
        static $ddstart = "\n<dd>";
        static $ddend = "</dd>";
        list($match, $state, $title) = $data;
        while ($match[0]=="\n") $match=substr($match, 1);
        $neesting = strlen($match);
        if ($state==DOKU_LEXER_MATCHED) {
          if ($last_neesting<$neesting) {
            $renderer->doc .= $close.$ddstart.$dlstart;
            $close = '';
            $indent[++$level] = $neesting;
          } else if ($last_neesting>$neesting) {
            $renderer->doc .= $close.$dlend.($level?$ddend:'');
            $close = '';
            while ($level && $indent[--$level]>$neesting)
              $renderer->doc .= $dlend.($level?$ddend:'');
          }
          $last_neesting = $neesting;
        }
        switch ($state) {
          case DOKU_LEXER_ENTER: {
            $last_neesting = $neesting;
            if ($level>0) $renderer->doc .= $close;
            for (; $level>0; --$level)
              $renderer->doc .= $dlend.($level!=1?$ddend:'');
            $renderer->doc .= $dlstart;
            if (preg_match('/\?/', $match)) {
              $renderer->doc .= $dtstart;
              $close = $dtend;
              if ($title!='')
                $renderer->doc .= '<a name="'.$title.'"></a>'.$title;
            } else if (preg_match('/!/', $match)) {
              $renderer->doc .= $ddstart;
              $close = $ddend;
            } else return false;
            $indent[++$level] = $neesting;
          } return true;
          case DOKU_LEXER_EXIT: {
            $renderer->doc .= $close;
            for (; $level>0; --$level)
              $renderer->doc .= $dlend.($level!=1?$ddend:'');
            $renderer->doc .= "\n";
          } return true;
          case DOKU_LEXER_MATCHED: {
            if (preg_match('/\?/', $match)) {
              $renderer->doc .= $close;
              $renderer->doc .= $dtstart;
              $close = $dtend;
              if ($title!='')
                $renderer->doc .= '<a class="target" name="'
                  .$title.'"></a>'.$title;
            } else if (preg_match('/!/', $match)) {

              $renderer->doc .= $close;
              $renderer->doc .= $ddstart;
              $close = $ddend;
            } else return false;
          } return true;
          case DOKU_LEXER_UNMATCHED: {
            $renderer->doc .= htmlspecialchars($match);
          } return true;
        }
        return false;
      }
    }
    ?>

