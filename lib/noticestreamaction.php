<?php

if (!defined('GNUSOCIAL')) { exit(1); }

abstract class NoticestreamAction extends ProfileAction
{

    protected function prepare(array $args=array()) {
        parent::prepare($args);

        // fetch the actual stream stuff
        $stream = $this->getStream();
        $this->notice = $stream->getNotices(($this->page-1) * NOTICES_PER_PAGE, NOTICES_PER_PAGE + 1);

        if ($this->page > 1 && $this->notice->N == 0) {
            // TRANS: Client error when page not found (404).
            $this->clientError(_('No such page.'), 404);
        }

        return true;
    }

    // this fetches the NoticeStream
    abstract public function getStream();
}
