<?php

namespace SmartDato\Brt\Enums;

enum Filter: string
{
    case eq = '_eq'; //  (equals)
    case iEq = '_iEq'; //  (equals case insensitive)

    case startsWith = '_startsWith'; //  (starts with)
    case iStartsWith = '_iStartsWith'; //  (starts with case insensitive)

    case in = '_in'; //  (in)
    case nin = '_nin'; //  (not in)

    case endsWith = '_endsWith'; //  (ends with)
    case iEndsWith = '_iEndsWith'; //  (ends with case insensitive)

    case notEq = '_notEq'; // (not equals)
    case iNotEq = '_iNotEq'; // (not equals case insensitive)

    case gt = '_gt'; // (greater than)
    case gte = '_gte'; // (greater than or equal)

    case lt = '_lt'; // (less than)
    case lte = '_lte'; // (less than or equal)

    case between = '_between'; // (between)
}
