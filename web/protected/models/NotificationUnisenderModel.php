<?php

use AjaxController;

/**
 * NotificationUnisenderModel - модель для сервиса рассылки - UniSender
 */
class NotificationUnisenderModel extends NotificationUnisenderAbstractModel
{
    private $result;

    public function setVars($model)
    {
        $request = [
            'api_key' => $this->getApiKey(),
            'email' => $model['email'],
            'sender_name' => $model['senderName'],
            'sender_email' => $model['senderEmail'],
            'subject' => $model['subject'],
            'body' => $model['body'],
            'list_id' => $model['listId'],
        ];
        return $this->curlSend($this->getApiUrl(), $request);
    }

    /**
     * curlSend - Сама отправка
     */
    protected function curlSend($url, $post_data = null)
    {
        // Устанавливаем соединение
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_URL, $url);

        $this->result = curl_exec($ch);
        return $this->getResult();
    }

    /**
     * getUrl - возвращает url API сервиса
     */
    protected function getApiUrl($method_name = self::METHOD_NAME_SEND_EMAIL, $format = 'json')
    {
        return "https://api.unisender.com/ru/api/sendEmail?format=$format";
    }

    /**
     * getApiKey - возвращает ключ API
     */
    protected function getApiKey()
    {
        return Yii::app()->params['APIkey'];
    }

    /**
     * getResult - возвращает результат
     */
    public function getResult()
    {

        if ($this->result) {

            // Раскодируем ответ API-сервера
            $jsonObj = json_decode($this->result);

            if (null === $jsonObj) {
                // Ошибка в полученном ответе
                // echo 'Invalid JSON';

            } elseif (!empty($jsonObj->error)) {
                // Ошибка отправки сообщения
                // echo sprintf('An error occured %s (code: %s)', $jsonObj->error, $jsonObj->code);
            } else {
                // Сообщение успешно отправлено
                // echo 'Email message is sent. Message id ' . $jsonObj->result->email_id;
            }
        } else {
            // Ошибка соединения с API-сервером
            // echo 'API access error';
        }
        return $jsonObj;
    }

    public function run($request)
    {
    }


}

