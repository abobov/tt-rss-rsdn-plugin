<?php
/*
 * Plugin alter rsdn.ru feeds links.
 */
class rsdn extends Plugin {
    private $rsdn_guid = 'rsdn.ru';
    /*
     * Thread show mode, possible values:
     *
     * 1: only first message
     * flat: multiple pages
     * all: single page
     */
    private $mode = 'flat';

    function about() {
        return array(0.1,
            'RSDN.ru feed plugin',
            'abobov');
    }

    function init($host) {
        $host->add_hook($host::HOOK_ARTICLE_FILTER, $this);
    }

    function hook_article_filter($article) {
        if (strpos($article['guid'], $this->rsdn_guid) !== FALSE) {
            $article['link'] = sprintf('%s.%s', $article['link'], $this->mode);
        }
        return $article;
    }

    function api_version() {
        return 2;
    }
}
?>
