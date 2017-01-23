# Bootstrap

> Типовой сайт, который следует устанавливать при разработке нового проекта. Он не создает лишних инфоблоков, которые обычно все равно удаляются, устанавливает полезные функции, добавляет наш чек-лист в Монитор качества

## Доступные в модуле функции

```php

/**
* Возвращает размер файла в удобном формате
* @param int $size Размер файла в байтах
* @return string
*/
\Prominado\Bootstrap\Functions::getFileSize($size)

/**
* Генерирует информацию о youtube ролике
* @param $url string Ссылка на ролик
* @return array
*/
\Prominado\Bootstrap\Functions::getYoutube($url)

/**
* Склонение
* @param int $n Количество
* @param array $forms Формы (1, 2, 5)
* @return string Нужная форма слова
*/
\Prominado\Bootstrap\Functions::declension($n, $forms)

/**
* Проверка, вызвана ли страница AJAX'ом
* @return boolean true если ajax
*/
\Prominado\Bootstrap\Functions::isAjax()

/**
* Получение информации о регионе по IP
* @param string $ip IP адрес
* @return \SimpleXMLElement[] Массив с информацией о регионе
*/
\Prominado\Bootstrap\Functions::getIPInfo($ip = '')

/**
* Получение координат точки по адресу
* @param $address string Адрес для которого нужны координаты
* @return string
*/
\Prominado\Bootstrap\Functions::getCoordsByAddress($address)
```
