<div
    class="
        carousel__item carousel__item--image
        carousel__item--image<% if $IsBackground %>--background<% else %>inset<% end_if %>
    "
    style="
        background-color: $BackgroundColour;
        color: $BackgroundColour.FontColour;
        <% if $IsBackground %><% if $Image %> background-image: url('$Image.ScaleWidth(644).Link');<% end_if %><% end_if %>
    "
>
    <% if $IsInset %><% if $Image %>
        <img
            src="$Image.PerfectCmsImageLinkNonRetina('CarouselImageImage')"
            srcset="$Image.PerfectCmsImageLinkNonRetina('CarouselImageImage') 1x, $Image.PerfectCmsImageLinkRetina('CarouselImageImage') 2x"
            alt="$Image.Title.ATT"
        />
    <% end_if %><% end_if %>

    <% if $HasTextContent %>
    <div class="carousel__item--image--caption">
        <% if $Title %>
            <h2 class="carousel__item__title">$Title</h2>
        <% end_if %>
        <% if $MoreInformation %>
            $MoreInformation.setCSSClass('btn btn--right')
        <% end_if %>
        <% if $Summary %>
            <p class="carousel__item__description">$Summary</p>
        <% end_if %>
    </div>
    <% end_if %>

</div>
