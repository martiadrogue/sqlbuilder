<?php

namespace MartiAdrogue\Scrapper\DataObject\QueryBuilder;

/**
 *
 */
class TransactionBuilder
{
    private $sql;

    public function __construct(DataBinding $pdo)
    {
        parent::__construct($pdo);
    }

    protected function performTransaction(DataBinding $pdo, array $params)
    {
        $sql = 'INSERT INTO brand(id,image,name,slug)'.
            ' VALUES (UNHEX(:id),:image,:name,:slug)';
        $paramMap = [
            ':id' => $params[0],
            ':image' => $params[1],
            ':name' => $params[2],
            ':slug' => $params[3],
            ];
        $pdo->execute($sql, $paramMap);
    }
}
