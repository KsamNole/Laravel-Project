<?php

namespace App\MagicCategory;

class MagicClass {

    public $user;
    public $id;
    private $x;


    public function __construct($user, $id)
    {
        $this->user = $user;
        $this->id = $id;
        echo '__construct - при создании объекта<br>';
    }

    public function __destruct()
    {
        echo '__destruct - вызывается когда закончится скрипт и удаляет объект<br>';
    }

    public function __call($name, $arguments)
    {
        echo '__call - при вызове несуществующих методов, принимет 2 аргумента: название метода и переменные  переданные в него<br>';
    }

    public function __set($name, $value)
    {
        echo '__set - при записи данных в недоступные свойства (например в приватные)<br>';
    }

    public function __get($name)
    {
        echo '__get - при чтении несуществующих или недоступных свойств<br>';
    }

    public function __isset($name)
    {
        echo '__isset - при вызове isset() или empty() на несуществующих или недоступных свойств<br>';
    }

    public function __invoke($name)
    {
        echo '__invoke - вызывается, когда скрипт пытается выполнить объект как функцию<br>';
    }

    public function __toString()
    {
        echo '__toString - преобразует объект в строку<br>';
        return "$this->user<br>";
    }

    public function __serialize()
    {
        echo "__serialize - вызывается перед сериализацией<br>";
        return [
            'user' => $this->user,
            'id' => $this->id,
        ];
    }

    public function __unserialize(array $data): void
    {
        echo "__unserialize - восстанавливает свойства объекта из массива<br>";
        $this->user = $data['user'];
        $this->id = $data['id'];
    }
}
?>

