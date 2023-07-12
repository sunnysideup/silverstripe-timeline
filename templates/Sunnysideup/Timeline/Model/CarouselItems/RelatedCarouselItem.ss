<div class="carousel__item carousel__item--related-documents">
    <% if $Title %><h2>$Title</h2><% end_if %>
    <% if $RelatedDocuments %>
        <% loop $RelatedDocuments.Sort(SortOrder, ASC) %>
            $Me
        <% end_loop %>
    <% end_if %>
</div>
