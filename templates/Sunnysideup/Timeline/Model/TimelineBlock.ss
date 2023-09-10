<% if $TimelineEntries %>
    <div class="timeline-block__wrapper">
        <div class="timeline-block">
            <div class="timeline-block__entries">
                <% loop $TimelineEntries %>
                <div id="timeline-$ID"
                    class="
                        timeline-entry
                        timeline-entry--<% if $IsAutoPosition %><% if $Even %>right<% else %>left<% end_if %><% else %>{$EntryPosition}<% end_if %>
                        timeline-entry--{$EntryType}
                        timeline-entry--{$NodeColour.CSSClass}
                        timeline-entry--{$EntryTense}"
                    >

                    <% if $HasCarouselItems %>
                    <details class="timeline-entry__detail" id="Timeline-Toggle-$ID">
                        <summary
                            class="timeline-entry__node timeline-entry__node--carousel"
                            style="background-color: $NodeColour"
                        >
                            <span class="sr-only">$Title</span>
                        </summary>
                        <div class="timeline-entry__detail-inner">


                            <div class="restricted-width-container">
                                <a href="#Timeline-Toggle-$ID" data-toggle-for="Timeline-Toggle-$ID" class="timeline-entry__open-close-button"><% include Sunnysideup/Timeline/Model/Includes/CloseSVG %></a>

                                <div class="timeline-entry__date">
                                    <time datetime="$DateForOrdering">$Title</time>
                                </div>
                                <p class="timeline-entry__description">$Description</p>
                                <% if $CarouselItems %>
                                <div class="timeline-entry__carousel">
                                    <% loop $CarouselItems.Sort(SortOrder, ASC) %>$Me<% end_loop %>
                                </div>

                                <div class="timeline-entry__swipe">
                                    <p><strong>Swipe</strong>&nbsp;for more content</p>
                                </div>
                                <% end_if %>
                            </div>
                        </div>
                    </details>

                    <% else %>
                    <div class="timeline-entry__node"></div>
                    <style>
                        #timeline-$ID .timeline-entry__node {
                            background-color: $NodeColour;
                        }
                    </style>
                    <% end_if %>

                    <div class="container restricted-width-container timeline-entry__wrapper">
                        <div class="timeline-entry__inner">
                            <div class="timeline-entry__date">
                                <time datetime="$DateForOrdering">$Title</time>
                            </div>
                            <p class="timeline-entry__description">$Description</p>
                            <% if $HasReadMoreLink %>
                                $ReadMoreLink.setCSSClass('timeline-entry__read-more-link')
                            <% end_if %>
                            <% if $HasCarouselItems %>
                                <a href="#Timeline-Toggle-$ID" class="timeline-entry__show-carousel" data-toggle-for="Timeline-Toggle-$ID">Read More</a>
                            <% end_if %>
                        </div>
                    </div>
                </div>
                <% end_loop %>
            </div>
        </div>
    </div>
<% end_if %>
