<div class="carousel__item carousel__item--summary">
    <% if $Icon %>
        <img
            src="$Icon.PerfectCmsImageLinkNonRetina('CarouselSummaryIcon')"
            srcset="$Icon.PerfectCmsImageLinkNonRetina('CarouselSummaryIcon') 1x, $Icon.PerfectCmsImageLinkRetina('CarouselSummaryIcon') 2x"
            alt="$Icon.Title"
            class=""
        />
    <% end_if %>
    <% if $Title %><h2>$Title</h2><% end_if %>
    <% if $Summary %>
        <p class="">$Summary</p>
    <% end_if %>
    <% if $ProjectLink %>
        $ProjectLink.setCSSClass('btn btn--white')
    <% end_if %>
</div>