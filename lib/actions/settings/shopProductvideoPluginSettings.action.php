<?php
// lib/actions/shopProductvideoSettings.action.php

class shopProductvideoPluginSettingsAction extends waViewAction
{
    public function execute()
    {
        $tagsModel = new shopProductvideoPluginTagsModel();
        $tags = $tagsModel->getAllTags();
        $this->view->assign('tags', $tags);
    }
}
