<?php

namespace SmartDato\Brt\Enums;

enum PayeeType: string
{
    case Sender = 'Sender';
    case Consignee = 'Consignee';
    case Ordering = 'Ordering';
}
