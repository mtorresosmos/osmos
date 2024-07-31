<div class="tabs tabs-category">
    <div class="tab-btn-wrapper">
        <button class="tab-btn active" data-target="tab1">All Projects</button>
        <!--<button class="tab-btn" data-target="tab2">Camber excesivo</button>-->
    </div>
    <div class="tab-content">
        <div id="tab1" class="tab-panel active">
            <?php get_template_part( 'template-parts/cards/cards-projects-all' ); ?>
        </div>
        <!--<div id="tab2" class="tab-panel">
            <h4 class="tab-title">Desgaste de neumáticos debido al camber y caster</h4>
        </div>-->
    </div>
</div>