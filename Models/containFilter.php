<?php
class ContainFilter implements filterInterface
{
    private $_column, $_search;
    public function __construct($_column,  $_search)
    {
        $this->_column = $_column;
        $this->_search =  $_search;
    }
    public function get_sql()
    {
        return "'" . $this->_column . "' like '" . $this->_search . "'";
    }
}