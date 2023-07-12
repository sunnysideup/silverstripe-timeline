<% if $RelatedDocumentLink %>
    <a href="$RelatedDocumentLink.LinkURL"{$RelatedDocumentLink.TargetAttr}>
    <% if $RelatedDocumentIcon %>
        <img
            src="$RelatedDocumentIcon.PerfectCmsImageLinkNonRetina('CarouselRelatedDocumentIcon')"
            srcset="$RelatedDocumentIcon.PerfectCmsImageLinkNonRetina('CarouselRelatedDocumentIcon') 1x, $RelatedDocumentIcon.PerfectCmsImageLinkRetina('CarouselRelatedDocumentIcon') 2x"
            alt="$RelatedDocumentIcon.Title"
        />
    <% end_if %>
    <h3>$RelatedDocumentLink.Title</h3>
    <% if $Description %><p>$Description</p><% end_if %>
    </a>
<% end_if %>



