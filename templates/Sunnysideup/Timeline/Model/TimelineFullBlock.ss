<% if $TimelineEntries %>
    <div class="timeline-block__wrapper">
        <div class="timeline-block">
            <div class="timeline-block__entries">
                <% loop $TimelineEntries %>
                <div class="timeline-entry timeline-entry--{$EntryPosition} timeline-entry--{$EntryType} timeline-entry--{$NodeColour} timeline-entry--{$EntryTense}">
                    <% if $EntryType == 'carousel' %>
                    <details class="timeline-entry__detail">
                        <summary class="timeline-entry__node timeline-entry__node--carousel"><span class="sr-only">Toggle Carousel</span></summary>
                        <div class="timeline-entry__detail-inner">
                            <div class="container">
                                <div class="timeline-entry__date">
                                    <time datetime="$DateForOrdering">$DateDescription</time>
                                </div>
                                <div class="timeline-entry__title">$Title</div>
                            </div>
                            <% if $CarouselItems %>
                                <div class="timeline-entry__carousel">
                                <% loop $CarouselItems.Sort(SortOrder, ASC) %>
                                    $Me
                                <% end_loop %>
                                </div>
                                <div class="timeline-entry__swipe">
                                    <p><strong>Swipe</strong>&nbsp;for more content</p>
                                </div>
                            <% end_if %>
                        </div>
                    </details>
                    <% end_if %>
                    <% if $EntryType == 'read-more' %>
                    <div class="timeline-entry__node"></div>
                    <% end_if %>
                    <div class="container timeline-entry__wrapper">
                        <div class="timeline-entry__inner">
                            <div class="timeline-entry__date">
                                <time datetime="$DateForOrdering">$DateDescription</time>
                            </div>
                            <div class="timeline-entry__title">$Title</div>
                            <% if $EntryType == 'read-more' %>
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
