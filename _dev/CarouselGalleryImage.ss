<a
    href="$GalleryFullImage.PerfectCmsImageLinkRetina('CarouselGalleryFullImage')"
    data-fancybox="gallery"
>
<% if $GalleryTileImage %>
<% if $Title %><h2>$Title</h2><% end_if %>
    <img
        src="$GalleryTileImage.PerfectCmsImageLinkNonRetina('CarouselGalleryTileImage')"
        srcset="$GalleryTileImage.PerfectCmsImageLinkNonRetina('CarouselGalleryTileImage') 1x, $GalleryTileImage.PerfectCmsImageLinkRetina('CarouselGalleryTileImage') 2x"
        alt="$GalleryTileImage.Title"
        class=""
    />
<% end_if %>
</a>
