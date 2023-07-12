<div class="carousel__item carousel__item--image">
    <% if $Image %>
        <img
            src="$Image.PerfectCmsImageLinkNonRetina('CarouselImageImage')"
            srcset="$Image.PerfectCmsImageLinkNonRetina('CarouselImageImage') 1x, $Image.PerfectCmsImageLinkRetina('CarouselImageImage') 2x"
            alt="$Image.Title"
            class=""
        />
    <% end_if %>
</div>
