--------------------
Extra: Raincolor
--------------------
Since: June 16th, 2017
Author: Alexander Babykin <meinteil19@gmail.com>
License: GNU GPLv2 (or later at your option)
 
A simple extra for replacing color values from text to color

--------------------

Имеется возможность установить пакет для дополнения mSearch2/mFilter2

Для этого необходимо добавить метод buildRaincolorFilter из директории:
core/components/model/msearch2/filtershandler.class.php
И добавить в класс mse2FiltersHandler (желательно через пользовательские классы)

В вызове сниппета mFilter2 необходимо указать параметры:
- &filters=`msoption|color:raincolor` 
- &tplFilter.row.msoption|color=`tpl.mFilter2.filter.raincolor` (для вывода через специальный чанк)