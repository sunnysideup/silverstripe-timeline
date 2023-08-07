<div
    class="carousel__item carousel__item--related-documents $StyleClass"
    style="
        background-color: $BackgroundColour;
        color:$BackgroundColour.FontColour;
    "
>
    <% if $Title %><h2>$Title</h2><% end_if %>
    <% if $RelatedDocuments %>
    <ul>
        <% loop $RelatedDocuments %>$Me<% end_loop %>
    </ul>
    <% end_if %>
</div>
