<?php

namespace SmartDato\Brt\Enums\Stakeholder;

enum Type: string
{
    case Requester = 'RQ';
    case Receiver = 'RE';
    case Sender = 'SE';
    case CollectionPoint = 'CP';
    case PickupPoint = 'PP';
}
