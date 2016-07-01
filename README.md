# Prominado.bootstrap

> Типовой сайт, который следует устанавливать при разработке нового приекта. Он не создает лишних инфоблоков, которые обычно все равно удаляются, устанавливает полезные функции, добавляет наш чек-лист в Монитор качества

## Доступные в модуле функции

```php

/**
* Возвращает размер файла в удобном формате
* @param $size int Размер файла в байтах
* @param $lang string Локализация (ru / en)
* @return string
*/
\Prominado\Bootstrap\CFunctions::getFileSize($size, $lang = "ru")

/**
* Генерирует информацию о youtube ролике
* @param $url string Ссылка на ролик
* @return array
*/
\Prominado\Bootstrap\CFunctions::getYoutubeLinkInfo($url)

/**
* Возвращает тип файла (строковый код, например xls, pdf, doc). Бывает необходимо когда надо задать класс иконки, например .icon--pdf
* @param $file_array array Принимает массив - результат битриксовой функции CFile::GetFileArray($file_id)
* @return string Тип файла
*/
\Prominado\Bootstrap\CFunctions::getFileType($file_array)

/**
* Склонение
* @param $n int Количество
* @param $forms array Формы (1, 2, 5)
* @return string Нужная форма слова
*/
\Prominado\Bootstrap\CFunctions::sklon($n, $forms)

/**
* Проверка, вызвана ли страница AJAX'ом
* @return boolean true если ajax
*/
\Prominado\Bootstrap\CFunctions::isAjax()

/**
* Получение информации о регионе по IP
* @param $ip string IP адрес
* @return array Массив с информацией о регионе
*/
\Prominado\Bootstrap\CFunctions::getIPInfo($ip)

/**
* Получение координат точки по адресу
* @param $address string Адрес для которого нужны координаты
* @return string
*/
\Prominado\Bootstrap\CFunctions::getCoordsByAddress($address)
```
