<?php get_header(); ?>

<main style="max-width: 1280px; margin: 0 auto; padding: 0 20px;">

    <div class="hero-news glass glass-hover-effect" style="background: url('https://images.unsplash.com/photo-1677442136019-21780ecad995?q=80&w=2000&auto=format&fit=cover') no-repeat center center;">
        <div class="hero-content">
            <span class="tag-cat">Destaque</span>
            <h1 style="font-size: clamp(2rem, 5vw, 3.5rem); max-width: 900px; text-shadow: 0 4px 20px rgba(0,0,0,0.9); margin-bottom: 20px; line-height: 1.1; font-weight: 800;">
                O Futuro da <span class="text-gradient">Automação</span> Começa Aqui
            </h1>
            <p style="color: #e2e8f0; max-width: 600px; font-size: 1.2rem; margin-bottom: 20px;">
                Explore as últimas tendências em IA, automação e marketing digital.
            </p>
        </div>
    </div>

    <div class="trending-card glass glass-hover-effect">
        <div class="trending-thumb-container">
            <span class="trending-thumb-text">AI</span>
        </div>
        <div class="trending-content">
            <div>
                <span class="tag-pill">#IA</span> 
                <span class="tag-pill">#Automação</span>
            </div>
            <h2 class="trending-title">GPT-5 e o Próximo Salto da Inteligência Artificial Generativa</h2>
            <p style="color: var(--text-grey); font-size: 1.1rem; margin-bottom: 25px;">
                Novas capacidades de raciocínio multimodal prometem revolucionar a forma como interagimos com sistemas inteligentes no dia a dia empresarial.
            </p>
            <a href="#" class="read-more-link">Leia mais <i class="ph ph-arrow-right"></i></a>
        </div>
    </div>

    <h2 class="section-title">Últimas Atualizações</h2>
    
    <div class="news-grid">
        
        <?php 
        $count = 0; 
        if ( have_posts() ) : 
            while ( have_posts() ) : the_post(); 
                $count++; 
        ?>

            <article class="news-card glass glass-hover-effect" onclick="window.location='<?php the_permalink(); ?>'">
                <?php if ( has_post_thumbnail() ) : ?>
                    <img src="<?php the_post_thumbnail_url('medium'); ?>" class="news-thumb" alt="<?php the_title(); ?>" style="width:100%; height:200px; object-fit:cover; border-radius:12px; margin-bottom:20px;">
                <?php else: ?>
                    <div class="news-thumb-placeholder thumb-purple"></div>
                <?php endif; ?>

                <div class="news-card-content">
                    <div class="news-tags">
                        <span class="tag-pill"><?php $cat = get_the_category(); if($cat) echo $cat[0]->cat_name; ?></span>
                    </div>
                    
                    <h3 class="news-title"><?php the_title(); ?></h3>
                    
                    <div class="news-description">
                        <?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?>
                    </div>
                    
                    <a href="<?php the_permalink(); ?>" class="read-more-link">Ler artigo <i class="ph ph-arrow-right"></i></a>
                </div>
            </article>

            <?php if ($count == 2) : ?>
                <article class="news-card ad-slot-card glass">
                    <span class="ad-slot-label">Patrocinado</span>
                    <div class="ad-slot-rect">Anúncio 300x250</div>
                    <h3 style="font-size: 1.1rem; font-weight: 700; color: white; margin-bottom: 10px;">Espaço Publicitário</h3>
                    <p style="font-size: 0.9rem; color: var(--text-grey);">Anuncie aqui e alcance milhares de profissionais.</p>
                </article>
            <?php endif; ?>

        <?php 
            endwhile; 
        else : 
            echo '<p style="color:white;">Nenhum post encontrado.</p>';
        endif; 
        ?>

    </div>
</main>

<?php get_footer(); ?>