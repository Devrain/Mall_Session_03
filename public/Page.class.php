<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/3
 * Time: 21:15
 */
class Page
{
    private $_total;
    private $_page_size;
    private $_limit;
    private $_page;
    private $_page_num;
    private $_url;
    private $_both_num;

    /**
     * Page constructor.
     * @param $_total
     * @param $_page_size
     */
    public function __construct($_total, $_page_size)
    {
        $this->_total = $_total ? $_total : 1;
        $this->_page_size = $_page_size;
        $this->_page_num = ceil($this->_total / $this->_page_size);
        $this->_page = $this->setPage();
        $this->_limit = "LIMIT " . ($this->_page - 1) * $this->_page_size . ",$this->_page_size";
        $this->_url = $this->setUrl();
        $this->_both_num = 2;

    }


    public function getLimit()
    {
        return $this->_limit;
    }

    public function getPage()
    {
        return $this->_page;
    }

    /**
     *
     */
    private function setPage()
    {
        if (!empty($_GET['page'])) {
            if ($_GET['page'] > 0) {
                if ($_GET['page'] > $this->_page_num) {
                    return $this->_page_num;
                } else {
                    return $_GET['page'];
                }
            } else {
                return 1;
            }
        } else {
            return 1;
        }
    }

    private function setUrl()
    {
        $_url = $_SERVER['REQUEST_URI'];
        $_par = parse_url($_url);
        if (isset($_par['query'])) {
            parse_str($_par['query'], $_query);
            unset($_query['page']);
            $_url = $_par['path'] . '?' . http_build_query($_query);
        }
        return $_url;
    }

    private function pageList()
    {
        $_page_list = '';
        for ($i = $this->_both_num; $i >= 1; $i--) {
            $_page = $this->_page - $i;
            if ($_page < 1) continue;

            $_page_list .= '<a href="' . $this->_url . '&page=' . $_page . '">' . $_page . '</a>';
        }
        $_page_list .= '<span class="me">' . $this->_page . '</span>';
        for ($i = 1; $i <= $this->_both_num; $i++) {
            $_page = $this->_page + $i;
            if ($_page > $this->_page_num) break;
            $_page_list .= '<a href="' . $this->_url . '&page=' . $_page . '">' . $_page . '</a>';
        }
        return $_page_list;
    }

    //  首页
    private function first()
    {
        if ($this->_page > $this->_both_num + 1) {
            return '<a href="' . $this->_url . '">1</a>';

        }
    }

    //  上一页
    private function prev()
    {
        if ($this->_page == 1) {
            return '<span class="disabled">上一页</span>';
        }
        return '<a href="' . $this->_url . '&page=' . ($this->_page - 1) . '">上一页</a>';
    }

    //  下一页
    private function next()
    {
        if ($this->_page== $this->_page_num) {
            return '<span class="disabled">下一页</span>';

        }
        return '<a href="' . $this->_url . '&page=' . ($this->_page + 1) . '">下一页</a>';
    }


    //  尾页
    private function last()
    {
        if ($this->_page_num- $this->_page> $this->_both_num) {
            return '...<a href="' . $this->_url . '&page=' . $this->_page_num . '">' . $this->_page_num . '</a>';

        }
    }

    public function showPage()
    {
        $_page = '';
        $_page .= $this->first();
        $_page .= $this->pageList();
        $_page .= $this->last();
        $_page .= $this->prev();
        $_page .= $this->next();
        return $_page;

    }

}


