<?php
class Navigation extends CommonST{
    private static $hInst = null;

    public static function getInstance()
    {
        if (!empty(self::$hInst = null)) {
            return self::$hInst;
        } else {
            return self::$hInst = new self();
        }
    }

    public function getNavigation() {
        $preArray   = DataBase::getInstance()->getAllTableObj("categories",'Category');
        $navArray = $this->sortArrayByParrent($preArray);
        return $navArray;
    }
    private function sortArrayByParrent($oArray,$phname = null) {
        $res = null;
                    foreach ($oArray as $value){
                if ($value->getParrentId() == $phname) {
                    $res[$value->getName()] = $value;
                    $res[$value->getName()]->setChild($this->sortArrayByParrent($oArray,$value->getId()));
                }
            }
        return $res;
    }


}
