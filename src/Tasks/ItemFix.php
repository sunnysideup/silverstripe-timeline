<?php

namespace Sunnysideup\Timeline\Tasks;

use SilverStripe\Dev\BuildTask;
use SilverStripe\ORM\DB;

class ItemFix extends BuildTask
{
    private static $segment = 'timelineitemfix';

    protected $title = "Timeline Carousel Item Fixes";

    protected $description = "Makes the align with new setup.";

    public function run($request)
    {
        DB::query(
            'UPDATE "CarouselItem"
                INNER JOIN "ImageCarouselItem"
                ON "CarouselItem"."ID" = "ImageCarouselItem"."ID"
            SET "CarouselItem"."Summary" = "ImageCarouselItem"."Description"
            WHERE
                ("CarouselItem"."Summary" IS NULL OR "CarouselItem"."Summary" = \'\')
                AND
                ("ImageCarouselItem"."Description" IS NOT NULL AND  "ImageCarouselItem"."Description" <> \'\');
        '
        );
        DB::query(
            'UPDATE "CarouselItem"
                INNER JOIN "ImageCarouselItem"
                ON "CarouselItem"."ID" = "ImageCarouselItem"."ID"
            SET "CarouselItem"."Title" = "ImageCarouselItem"."Title"
            WHERE
                ("CarouselItem"."Title" IS NULL OR "CarouselItem"."Title" = \'\')
                AND
                ("ImageCarouselItem"."Title" IS NOT NULL AND  "ImageCarouselItem"."Title" <> \'\');
        '
        );
        DB::query(
            'UPDATE "CarouselItem"
                INNER JOIN "SummaryCarouselItem"
                ON "CarouselItem"."ID" = "SummaryCarouselItem"."ID"
            SET "CarouselItem"."Summary" = "SummaryCarouselItem"."Summary"
            WHERE
                ("CarouselItem"."Summary" IS NULL OR "CarouselItem"."Summary" = "")
                AND
                ("SummaryCarouselItem"."Summary" IS NOT NULL AND  "SummaryCarouselItem"."Summary" <> \'\');
        '
        );
    }

}
