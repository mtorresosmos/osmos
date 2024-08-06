<div class="tabs tabs-category">
    <div class="tab-btn-wrapper">
        <button class="tab-btn active" data-target="tab1" data-color="black">All Projects</button>
        <button class="tab-btn border-orange" data-target="tab2" data-color="orange">Brand Strategy</button>
        <button class="tab-btn border-purple" data-target="tab3" data-color="purple">Digital Marketing</button>
        <button class="tab-btn border-orange" data-target="tab4" data-color="orange">Graphic Design</button>
        <button class="tab-btn border-blue" data-target="tab5" data-color="blue">Web Development</button>
        <button class="tab-btn border-green" data-target="tab6" data-color="green">Video</button>
        <button class="tab-btn border-green" data-target="tab7" data-color="green">Photography</button>
    </div>
    <div class="tab-content">
        <div id="tab1" class="tab-panel active">
            <?php get_template_part( 'template-parts/cards/cards-projects-all' ); ?>
        </div>
        <div id="tab2" class="tab-panel">
            <?php get_template_part( 'template-parts/cards/cards-projects-brand-strategy' ); ?>
        </div>
        <div id="tab3" class="tab-panel">
            <?php get_template_part( 'template-parts/cards/cards-projects-digital-marketing' ); ?>
        </div>
        <div id="tab4" class="tab-panel">
            <?php get_template_part( 'template-parts/cards/cards-projects-graphic-design' ); ?>
        </div>
        <div id="tab5" class="tab-panel">
            <?php get_template_part( 'template-parts/cards/cards-projects-web-development' ); ?>
        </div>
        <div id="tab6" class="tab-panel">
            <?php get_template_part( 'template-parts/cards/cards-projects-audiovisual' ); ?>
        </div>
        <div id="tab7" class="tab-panel">
            <?php get_template_part( 'template-parts/cards/cards-projects-audiovisual' ); ?>
        </div>
    </div>
</div>