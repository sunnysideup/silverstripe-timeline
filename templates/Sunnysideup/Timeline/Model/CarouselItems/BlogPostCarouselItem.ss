<div class="carousel__item carousel__item--blog-post">
    <a href="{$BlogPost.Link}" {$BlogPost.Link.target}>
        $BlogPost.Image.FocusFill(800,700)
        <h2>$BlogPost.Title</h2>
        <p>$BlogPost.Text.LimitCharacters(100)</p>
        <span>Read more</span>
    </a>
</div>
