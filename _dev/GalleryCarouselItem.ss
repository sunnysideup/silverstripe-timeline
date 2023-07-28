<div
    class="carousel__item carousel__item--gallery"
    style="
        background-color: $BackgroundColour;
        color:$BackgroundColour.ForeColour;
    "
>
<% if $GalleryImages %>
    <% loop $GalleryImages.Sort(SortOrder, ASC) %>
    <% if $Pos < 4 %>$Me<% end_if %>
    <% end_loop %>
<% end_if %>
</div>
