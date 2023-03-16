<?php 

namespace Code\QueryBuilder;

class Select
{
    private $query;

    public function __construct($table)
    {
        $this->query = 'SELECT * FROM '. $table;
    }

    public function getSql()
    {
        return $this->query;
    }

    public function where(String $fild, String $operator)
    {
        return $this->query.= ' WHERE '. $fild . ' '. $operator . ' :'. $fild ; 
    }
}