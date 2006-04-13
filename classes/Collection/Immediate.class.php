<?php
require_once(Doctrine::getPath().DIRECTORY_SEPARATOR."Collection.class.php");
/**
 * @author      Konsta Vesterinen
 * @package     Doctrine ORM
 * @url         www.phpdoctrine.com
 * @license     LGPL
 * @version     1.0 alpha
 */
class Doctrine_Collection_Immediate extends Doctrine_Collection {
    /**
     * @param Doctrine_DQL_Parser $graph
     * @param integer $key              
     */
    public function __construct(Doctrine_DQL_Parser $graph,$key) {
        parent::__construct($graph->getTable($key));
                                               
        $name = $this->table->getComponentName();
        $data = $graph->getData($name);
        if(is_array($data)) {
            foreach($data as $k=>$v):
                $this->table->setData($v);
                $this->add($this->table->getRecord());
            endforeach;
        }
    }
}
?>
