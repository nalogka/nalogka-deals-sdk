<?php


namespace Nalogka\DealsSDK\Model;


class StatusChangedEvent
{
    public $id;
    
    public $changeSet;

    public $occuredAt;

    public $initiatedBy;
}