<?php

namespace SmartDato\Brt\Enums;

enum PayerType: string
{
    case Sender = 'Sender'; // the sender pays for shipment
    case Consignee = 'Consignee'; // the consignee pays for shipment
    case Ordering = 'Ordering'; // the ordering pays for shipment
}
