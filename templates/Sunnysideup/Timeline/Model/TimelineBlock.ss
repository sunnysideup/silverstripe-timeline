<% if $TimelineEntries %>
    <div class="timeline-block__wrapper">
        <div class="timeline-block">
            <div class="timeline-block__entries">
                <% loop $TimelineEntries %>
                <div class="timeline-entry timeline-entry--{$EntryPosition} timeline-entry--{$EntryType} timeline-entry--{$NodeColour} timeline-entry--{$EntryTense}">
                    <% if $EntryType == 'carousel' %>
                    <details class="timeline-entry__detail">
                        <summary class="timeline-entry__node timeline-entry__node--carousel" style="background-color: $NodeColour"><span class="sr-only">Toggle Carousel</span></summary>
                        <div class="timeline-entry__detail-inner">
                            <div class="restricted-width-container">
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
                    <% end_if %>

                    <% if $EntryType == 'read-more' %>
                    <div class="timeline-entry__node"></div>
                    <% end_if %>

                    <div class="container restricted-width-container timeline-entry__wrapper">
                        <div class="timeline-entry__inner">
                            <div class="timeline-entry__date">
                                <time datetime="$DateForOrdering">$Title</time>
                            </div>
                            <p class="timeline-entry__description">$Description</p>
                            <% if $ReadMoreLink %>
                                $ReadMoreLink.setCSSClass('timeline-entry__read-more-link')
                            <% end_if %>
                        </div>
                    </div>
                </div>
                <% end_loop %>
            </div>
        </div>
    </div>
<% end_if %>
