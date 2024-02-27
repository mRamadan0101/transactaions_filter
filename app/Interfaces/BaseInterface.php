<?php

namespace App\Interfaces;

interface BaseInterface
{
    public function getProviderName();

    public function getId();

    public function getAmount();

    public function getCurrency();

    public function getPhone();

    public function getStatus();

    public function getCreatedAt();
}
