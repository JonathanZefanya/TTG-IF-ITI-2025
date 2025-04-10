<?php defined('ALTUMCODE') || die() ?>

<?php if(settings()->links->additional_domains_is_enabled): ?>
    <?php $additional_domains = (new \Altum\Models\Domain())->get_available_additional_domains(); ?>
<?php endif ?>

<ul class="pricing-features">
    <?php if(settings()->links->biolinks_is_enabled): ?>
        <li>
            <div><?= sprintf(l('global.plan_settings.biolinks_limit'), ($data->plan_settings->biolinks_limit == -1 ? l('global.unlimited') : nr($data->plan_settings->biolinks_limit))) ?></div>
        </li>

        <li>
            <div><?= sprintf(l('global.plan_settings.biolink_blocks_limit'), ($data->plan_settings->biolink_blocks_limit == -1 ? l('global.unlimited') : nr($data->plan_settings->biolink_blocks_limit))) ?></div>
        </li>

        <?php $enabled_biolink_blocks = array_filter((array) $data->plan_settings->enabled_biolink_blocks) ?>
        <?php $enabled_biolink_blocks_count = count($enabled_biolink_blocks) ?>
        <?php
        $enabled_biolink_blocks_string = implode(', ', array_map(function($key) {
            return l('link.biolink.blocks.' . mb_strtolower($key));
        }, array_keys($enabled_biolink_blocks)));
        ?>
        <li>
            <div class="<?= $enabled_biolink_blocks_count ? null : 'text-muted' ?>">
                <?php if($enabled_biolink_blocks_count == count(require APP_PATH . 'includes/enabled_biolink_blocks.php')): ?>
                    <?= l('global.plan_settings.enabled_biolink_blocks_all') ?>
                <?php else: ?>
                    <?= sprintf(l('global.plan_settings.enabled_biolink_blocks_x'), '<strong>' . nr($enabled_biolink_blocks_count) . '</strong>') ?>
                <?php endif ?>

                <span class="mr-1" data-toggle="tooltip" title="<?= $enabled_biolink_blocks_string ?>"><i class="fas fa-fw fa-xs fa-circle-question text-gray-500"></i></span>
            </div>
        </li>

        <?php if(\Altum\Plugin::is_active('payment-blocks')): ?>
            <li>
                <div><?= sprintf(l('global.plan_settings.payment_processors_limit'), ($data->plan_settings->payment_processors_limit == -1 ? l('global.unlimited') : nr($data->plan_settings->payment_processors_limit))) ?></div>
            </li>
        <?php endif ?>
    <?php endif ?>

    <?php if(settings()->links->shortener_is_enabled): ?>
        <li>
            <div><?= sprintf(l('global.plan_settings.links_limit'), ($data->plan_settings->links_limit == -1 ? l('global.unlimited') : nr($data->plan_settings->links_limit))) ?></div>
        </li>
    <?php endif ?>

    <?php if(settings()->links->files_is_enabled): ?>
        <li>
            <div><?= sprintf(l('global.plan_settings.files_limit'), ($data->plan_settings->files_limit == -1 ? l('global.unlimited') : nr($data->plan_settings->files_limit))) ?></div>
        </li>
    <?php endif ?>

    <?php if(settings()->links->vcards_is_enabled): ?>
        <li>
            <div><?= sprintf(l('global.plan_settings.vcards_limit'), ($data->plan_settings->vcards_limit == -1 ? l('global.unlimited') : nr($data->plan_settings->vcards_limit))) ?></div>
        </li>
    <?php endif ?>

    <?php if(settings()->links->events_is_enabled): ?>
        <li>
            <div><?= sprintf(l('global.plan_settings.events_limit'), ($data->plan_settings->events_limit == -1 ? l('global.unlimited') : nr($data->plan_settings->events_limit))) ?></div>
        </li>
    <?php endif ?>

    <?php if(settings()->links->static_is_enabled): ?>
        <li>
            <div><?= sprintf(l('global.plan_settings.static_limit'), ($data->plan_settings->static_limit == -1 ? l('global.unlimited') : nr($data->plan_settings->static_limit))) ?></div>
        </li>
    <?php endif ?>

    <?php if(settings()->codes->qr_codes_is_enabled): ?>
        <li>
            <div><?= sprintf(l('global.plan_settings.qr_codes_limit'), ($data->plan_settings->qr_codes_limit == -1 ? l('global.unlimited') : nr($data->plan_settings->qr_codes_limit))) ?></div>
        </li>

        <li>
            <div><?= sprintf(l('global.plan_settings.qr_codes_bulk_limit'), ($data->plan_settings->qr_codes_bulk_limit == -1 ? l('global.unlimited') : nr($data->plan_settings->qr_codes_bulk_limit))) ?></div>
        </li>
    <?php endif ?>

    <?php if(\Altum\Plugin::is_active('aix') && settings()->aix->documents_is_enabled): ?>
        <li>
            <div><?= sprintf(l('global.plan_settings.documents_model.' . str_replace('-', '_', $data->plan_settings->documents_model))) ?></div>
        </li>

        <li>
            <div><?= sprintf(l('global.plan_settings.documents_per_month_limit'), ($data->plan_settings->documents_per_month_limit == -1 ? l('global.unlimited') : nr($data->plan_settings->documents_per_month_limit))) ?></div>
        </li>

        <li>
            <div><?= sprintf(l('global.plan_settings.words_per_month_limit'), ($data->plan_settings->words_per_month_limit == -1 ? l('global.unlimited') : nr($data->plan_settings->words_per_month_limit))) ?></div>
        </li>
    <?php endif ?>

    <?php if(\Altum\Plugin::is_active('aix') && settings()->aix->images_is_enabled): ?>
        <li>
            <div><?= sprintf(l('global.plan_settings.images_per_month_limit'), ($data->plan_settings->images_per_month_limit == -1 ? l('global.unlimited') : nr($data->plan_settings->images_per_month_limit))) ?></div>
        </li>
    <?php endif ?>

    <?php if(\Altum\Plugin::is_active('aix') && settings()->aix->transcriptions_is_enabled): ?>
        <div class="d-flex justify-content-between align-items-center my-3">
            <div>
                <?= sprintf(l('global.plan_settings.transcriptions_per_month_limit'), '<strong>' . ($data->plan_settings->transcriptions_per_month_limit == -1 ? l('global.unlimited') : nr($data->plan_settings->transcriptions_per_month_limit)) . '</strong>') ?>
            </div>
        </div>


        <div class="d-flex justify-content-between align-items-center my-3">
            <div>
                <?= sprintf(l('global.plan_settings.transcriptions_file_size_limit'), '<strong>' . get_formatted_bytes($data->plan_settings->transcriptions_file_size_limit * 1000 * 1000) . '</strong>') ?>
            </div>
        </div>
    <?php endif ?>

    <?php if(\Altum\Plugin::is_active('aix') && settings()->aix->chats_is_enabled): ?>
        <div class="d-flex justify-content-between align-items-center my-3">
            <div>
                <?= sprintf(l('global.plan_settings.chats_per_month_limit'), '<strong>' . ($data->plan_settings->chats_per_month_limit == -1 ? l('global.unlimited') : nr($data->plan_settings->chats_per_month_limit)) . '</strong>') ?>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center my-3">
            <div>
                <?= sprintf(l('global.plan_settings.chat_messages_per_chat_limit'), '<strong>' . ($data->plan_settings->chat_messages_per_chat_limit == -1 ? l('global.unlimited') : nr($data->plan_settings->chat_messages_per_chat_limit)) . '</strong>') ?>
            </div>
        </div>
    <?php endif ?>

    <?php if(\Altum\Plugin::is_active('email-signatures') && settings()->signatures->is_enabled): ?>
        <li>
            <div><?= sprintf(l('global.plan_settings.signatures_limit'), ($data->plan_settings->signatures_limit == -1 ? l('global.unlimited') : nr($data->plan_settings->signatures_limit))) ?></div>
        </li>
    <?php endif ?>

    <li>
        <div><?= sprintf(l('global.plan_settings.projects_limit'), ($data->plan_settings->projects_limit == -1 ? l('global.unlimited') : nr($data->plan_settings->projects_limit))) ?></div>
    </li>

    <?php if(settings()->links->splash_page_is_enabled): ?>
        <li>
            <div><?= sprintf(l('global.plan_settings.splash_pages_limit'), ($data->plan_settings->splash_pages_limit == -1 ? l('global.unlimited') : nr($data->plan_settings->splash_pages_limit))) ?></div>
        </li>
    <?php endif ?>

    <?php if(settings()->links->pixels_is_enabled): ?>
    <li>
        <div><?= sprintf(l('global.plan_settings.pixels_limit'), ($data->plan_settings->pixels_limit == -1 ? l('global.unlimited') : nr($data->plan_settings->pixels_limit))) ?></div>
    </li>
    <?php endif ?>

    <?php if(\Altum\Plugin::is_active('teams')): ?>
        <li>
            <div><?= sprintf(l('global.plan_settings.teams_limit'), ($data->plan_settings->teams_limit == -1 ? l('global.unlimited') : nr($data->plan_settings->teams_limit))) ?></div>
        </li>

        <li>
            <div><?= sprintf(l('global.plan_settings.team_members_limit'), ($data->plan_settings->team_members_limit == -1 ? l('global.unlimited') : nr($data->plan_settings->team_members_limit))) ?></div>
        </li>
    <?php endif ?>

    <?php if(\Altum\Plugin::is_active('affiliate') && settings()->affiliate->is_enabled): ?>
        <li>
            <div><?= sprintf(l('global.plan_settings.affiliate_commission_percentage'), nr($data->plan_settings->affiliate_commission_percentage) . '%') ?></div>
        </li>
    <?php endif ?>

    <?php if(settings()->links->domains_is_enabled): ?>
        <li>
            <div><?= sprintf(l('global.plan_settings.domains_limit'), ($data->plan_settings->domains_limit == -1 ? l('global.unlimited') : nr($data->plan_settings->domains_limit))) ?></div>
        </li>
    <?php endif ?>

    <li>
        <div><?= sprintf(l('global.plan_settings.track_links_retention'), ($data->plan_settings->track_links_retention == -1 ? l('global.unlimited') : nr($data->plan_settings->track_links_retention))) ?></div>
    </li>

    <?php if(settings()->links->additional_domains_is_enabled): ?>
        <div class="d-flex justify-content-between align-items-center my-3 <?= count($data->plan_settings->additional_domains ?? []) ? null : 'text-muted' ?>">
            <div>
                <?= sprintf(l('global.plan_settings.additional_domains'), '<strong>' . nr(count($data->plan_settings->additional_domains ?? [])) . '</strong>') ?>
                <span class="mr-1" data-toggle="tooltip" title="<?= sprintf(l('global.plan_settings.additional_domains_help'), implode(', ', array_map(function($domain_id) use($additional_domains) { return $additional_domains[$domain_id]->host ?? null; }, $data->plan_settings->additional_domains ?? []))) ?>"><i class="fas fa-fw fa-xs fa-circle-question text-gray-500"></i></span>
            </div>

            <i class="fas fa-fw fa-sm <?= count($data->plan_settings->additional_domains ?? []) ? 'fa-check-circle text-success' : 'fa-times-circle' ?>"></i>
        </div>
    <?php endif ?>

    <?php if(settings()->links->splash_page_is_enabled): ?>
    <?php
    $no_forced_splash_page = true;
    foreach(require APP_PATH . 'includes/links_types.php' as $key => $value) {
        if($data->plan_settings->{'force_splash_page_on_' . $key}) {
            $no_forced_splash_page = false;
            break;
        }
    }
    ?>
    <li>
        <div class="<?= $no_forced_splash_page ? null : 'text-muted' ?>">
            <?= l('global.plan_settings.no_forced_splash_page') ?>

            <span class="mr-1" data-toggle="tooltip" title="<?= l('global.plan_settings.no_forced_splash_page_help') ?>"><i class="fas fa-fw fa-xs fa-circle-question text-gray-500"></i></span>
        </div>

        <i class="fas fa-fw fa-sm <?= $no_forced_splash_page ? 'fa-check-circle text-success' : 'fa-times-circle text-muted' ?>"></i>
    </li>
    <?php endif ?>

    <?php foreach(require APP_PATH . 'includes/simple_user_plan_settings.php' as $plan_setting): ?>
        <li>
            <div class="<?= $data->plan_settings->{$plan_setting} ? null : 'text-muted' ?>">
                <?= l('global.plan_settings.' . $plan_setting) ?>

                <span class="mr-1" data-toggle="tooltip" title="<?= l('global.plan_settings.' . $plan_setting . '_help') ?>"><i class="fas fa-fw fa-xs fa-circle-question text-gray-500"></i></span>
            </div>

            <i class="fas fa-fw fa-sm <?= $data->plan_settings->{$plan_setting} ? 'fa-check-circle text-success' : 'fa-times-circle text-muted' ?>"></i>
        </li>
    <?php endforeach ?>
</ul>
