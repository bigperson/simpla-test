<?php
/**
 * Скрипт служит для импорта данных по заказу из RetailCRM.
 * Скрипт принимает на вход идентификатор заказа.
 * Далее уже в специальном методе будут получены все данные заказа из RetailCRM и импортированы в Simpla CMS
 */

$path_parts = pathinfo($_SERVER['SCRIPT_FILENAME']); // определяем директорию скрипта (полезно для запуска из cron'а)
chdir($path_parts['dirname']); // задаем директорию выполнение скрипта
// Подключаем API Simpla
require_once ('../api/Simpla.php');
// Подключим зависимые библиотеки (API RetailCRM)
require_once ('../vendor/autoload.php');
// Подключаем описание класса для экспорта заказов и клиентов
require_once ('../api/Retail.php');

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $orderId = strval($_POST['id']);
    $obRetail = new Retail();
    $obRetail->setOrderRetailData($orderId);
}
