<?php

/**
 * NotificationUnisenderAbstractModel
 */


abstract class NotificationUnisenderAbstractModel{


    const METHOD_NAME_SEND_EMAIL = 'sendEmail';



    public static function getInstance(){
//        $model = new self();
        $model = new static();

        return $model;
    }



    /**
     * curlSend - Сама отправка
     */
    abstract protected function curlSend($url, $post_data = null);



    /**
     * getUrl - возвращает url API сервиса
     */
    abstract protected function getApiUrl($method_name = self::METHOD_NAME_SEND_EMAIL, $format = 'json');



    /**
     * getApiKey - возвращает ключ API
     */
    abstract protected function getApiKey();



    /**
     * getResult - возвращает результат
     */
    abstract protected function getResult();








}
