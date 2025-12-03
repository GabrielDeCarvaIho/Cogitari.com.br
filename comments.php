<section class="discussion-section" id="comments">
    
    <div class="discussion-header-row">
        <h3 class="discussion-title">Discussão <span class="discussion-count"><?php echo get_comments_number(); ?></span></h3>
    </div>

    <div class="discussion-box-container">
        
        <div class="rating-bar">
            <div class="rating-left">
                <span class="rating-label">AVALIAR:</span>
                <div class="stars" id="star-rating">
                    <i class="ph ph-star-fill" data-value="1"></i>
                    <i class="ph ph-star-fill" data-value="2"></i>
                    <i class="ph ph-star-fill" data-value="3"></i>
                    <i class="ph ph-star-fill" data-value="4"></i>
                    <i class="ph ph-star-fill" data-value="5"></i>
                </div>
            </div>
            
            <div style="font-size: 0.8rem; color: var(--text-grey);">
                <?php if ( is_user_logged_in() ) : ?>
                    Logado como: <strong><?php echo wp_get_current_user()->display_name; ?></strong>
                <?php else: ?>
                    Logado como: <strong>Visitante (Restrito)</strong>
                <?php endif; ?>
            </div>
        </div>

        <div class="input-area">
            <?php if ( is_user_logged_in() ) : ?>
                <form action="<?php echo site_url('/wp-comments-post.php'); ?>" method="post">
                    <textarea name="comment" class="comment-textarea" placeholder="O que você pensa sobre isso?"></textarea>
                    <input type="hidden" name="comment_post_ID" value="<?php echo get_the_ID(); ?>" />
                    <div style="overflow: hidden;">
                        <button type="submit" class="btn-gradient comment-submit-btn">Publicar Comentário</button>
                    </div>
                </form>
            <?php else : ?>
                <textarea class="comment-textarea" placeholder="Faça login para comentar..." disabled></textarea>
                <div style="text-align: right;">
                    <a href="<?php echo wp_login_url(); ?>" class="btn-gradient" style="padding:10px 30px;">Entrar</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="comment-list">
        <?php if ( have_comments() ) : ?>
            <?php wp_list_comments( array( 'style' => 'div', 'short_ping' => true, 'avatar_size' => 50 ) ); ?>
        <?php else: ?>
            
            <div class="comment-wrapper">
                <div class="comment-avatar">
                    <img src="https://ui-avatars.com/api/?name=Ana+Clara&background=random" alt="Ana">
                </div>
                <div class="comment-content-box">
                    <div class="comment-header">
                        <div class="user-meta">
                            <span class="user-name">Ana Clara</span>
                            <span class="comment-time">• Há 2 horas</span>
                        </div>
                        <div class="comment-stars">★★★★★</div>
                    </div>
                    <div class="comment-text">
                        Excelente artigo! Realmente, estou sentindo essa mudança no e-commerce. A integração via API já é uma realidade para nós.
                    </div>
                    <div class="comment-footer">
                        <span><i class="ph ph-thumbs-up"></i> 12</span>
                        <span><i class="ph ph-thumbs-down"></i></span>
                        <span><i class="ph ph-arrow-bend-up-left"></i> Responder</span>
                    </div>
                </div>
            </div>

            <div class="comment-wrapper is-reply">
                <div class="comment-avatar">
                    <img src="https://ui-avatars.com/api/?name=Lucas+Mendes&background=000&color=fff" alt="Lucas">
                </div>
                <div class="comment-content-box">
                    <div class="comment-header">
                        <div class="user-meta">
                            <span class="user-name">Lucas Mendes <span class="is-author-badge">(Autor)</span></span>
                            <span class="comment-time">• Há 30 min</span>
                        </div>
                    </div>
                    <div class="comment-text">
                        Concordo, João! O branding será o "critério de desempate" dos algoritmos.
                    </div>
                    <div class="comment-footer">
                        <span><i class="ph ph-thumbs-up"></i> 5</span>
                        <span><i class="ph ph-thumbs-down"></i></span>
                        <span><i class="ph ph-arrow-bend-up-left"></i> Responder</span>
                    </div>
                </div>
            </div>

        <?php endif; ?>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('#star-rating i');
            stars.forEach(star => {
                star.addEventListener('mouseover', function() { highlightStars(this.getAttribute('data-value')); });
                star.addEventListener('mouseout', function() { highlightStars(0); });
            });
            function highlightStars(val) {
                stars.forEach(s => {
                    if(s.getAttribute('data-value') <= val) s.classList.add('filled');
                    else s.classList.remove('filled');
                });
            }
        });
    </script>
</section>