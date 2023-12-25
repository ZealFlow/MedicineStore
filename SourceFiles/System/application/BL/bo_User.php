<?php

    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\DA\dao_User.php';
    require_once 'C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\models\User.php';

    class bo_User {
        private $udao;

        public function __construct() {
            $this->udao = new dao_User();
        }

        public function login($account, $pass) {
            return $this->udao->login($account, $pass);
        }

        public function addAccount($fullName, $email, $password) {
            try {
                return $this->udao->addAccount($fullName, $email, $password);
            } catch (Exception $e) {
                $e->getMessage();
                return false;
            }
        }

        public function isEmail($Email) {
            try {
                return $this->udao->isEmail($Email);
            } catch (Exception $e) {
                $e->getMessage();
                return false;
            }
        }
    }

?>
