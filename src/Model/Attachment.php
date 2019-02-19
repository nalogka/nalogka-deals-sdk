<?php


namespace Fostenslave\NalogkaDealsSDK\Model;


class Attachment
{
    /** @var string Название файла (Так же идентификатора в Файловом хранилище) */
    public $id;

    /** @var string Описание файла */
    public $description;

    /** @var string Полный URL для скачивания @Getonly */
    public $publicUrl;

    /** @var string MIME-тип файла @Getonly */
    public $mimeType;

    /** @var string Размер файла в байтах @Getonly */
    public $size;
}