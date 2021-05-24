<?php


abstract class Creator
{
    // фабричный метод 
    abstract public function factoryMethod();

    public function someOperation(): string
    {
        // Вызываем фабричный метод, чтобы получить объект-продукт.
        $product = $this->factoryMethod();
        // Далее, работаем с этим продуктом.
        $result = $product->send($param1, $param2);

        return $result;
    }
}

/**
 * Конкретные Создатели переопределяют фабричный метод для того, чтобы изменить
 * тип результирующего продукта.
 */
class EmailCreator extends Creator
{
    
    public function factoryMethod()
    {
        return new EmailNotificator();
    }
}

class SmsCreator extends Creator
{
    public function factoryMethod()
    {
        return new SmsNotificator();
    }
}


class WebPushCreator extends Creator
{
    public function factoryMethod()
    {
        return new WebPushNotificator();
    }
}

interface iNotificator
{
    public function send($param1, $param2);
}

class EmailNotificator implements iNotification
{
    public function send($param1, $param2)
    {
        
    }
}

class SmsNotificator implements iNotificator
{
    public function send($param1, $param2) 
    {
        
    }
}

class WebPushNotificator implements iNotificator
{
    public function send($param1, $param2) 
    {
        
    }
}

/**
 * Клиентский код работает с экземпляром конкретного создателя, хотя и через его
 * базовый интерфейс. Пока клиент продолжает работать с создателем через базовый
 * интерфейс, вы можете передать ему любой подкласс создателя.
 */

class NotificationService
{
    public function notity(User $user, $text)
    {
        (new EmailNotificator)->send($user->email, $text);
        (new SmsNotificator)->send($user->phone, $text);
        (new WebPushNotificator)->send($tokenId, $text);
    }
} 


