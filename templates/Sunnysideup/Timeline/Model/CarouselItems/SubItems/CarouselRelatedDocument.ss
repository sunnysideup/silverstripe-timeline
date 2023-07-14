<% if $RelatedDocumentLink %>
    <li class="$StyleClass">
        <a href="$RelatedDocumentLink.LinkURL" {$RelatedDocumentLink.TargetAttr}>
        <h3>$RelatedDocumentLink.Title</h3>
        <% if $Description %><p>$Description</p><% end_if %>
        </a>
    </li>
<% end_if %>



