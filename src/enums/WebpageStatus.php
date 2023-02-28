<?php declare(strict_types=1);

namespace Enum;

use BenSampo\Enum\Enum;

final class WebpageStatus extends Enum
{
    const Draft = 'draft';
    const Published = 'published';
    const Future = 'future';
}
