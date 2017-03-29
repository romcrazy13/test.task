<?php


class AjaxController extends CController{

    /**
     * actionSendUnisender - отсылка через сервис Unisender
     *
     * ВАЖНО! Изменение кода в теле метода Запрещено!
     */
    public function actionSendUnisender(){
        $send_result = NotificationUnisenderModel::getInstance()
                        ->setVars($_SESSION['model']);
//                        ->run()
//                        ->getResult();

        return json_encode($send_result);
    }

    public static function sendLetter(){
        return self::actionSendUnisender();
    }

    public function getURL(){

    }


}
