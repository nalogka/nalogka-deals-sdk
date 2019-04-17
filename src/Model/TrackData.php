<?php


namespace Fostenslave\NalogkaDealsSDK\Model;


class TrackData
{
    public $id;

    public $trackerType;

    public $trackerShortName;

    public $code;

    public $status;

    public $events = [];

    public $statusUpdatedAt;
}