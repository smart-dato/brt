<?php

namespace SmartDato\Brt\Enums\Stakeholder;

enum Type: string
{
    case Requester = 'RQ';
    case Receiver = 'RE';
    case Sender = 'SE';
    case Collection_Point = 'CP';
    case PickUp_Point = 'PP';
}
