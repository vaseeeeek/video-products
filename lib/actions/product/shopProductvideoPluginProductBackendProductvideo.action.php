<?php
class shopProductvideoPluginProductBackendProductvideoAction extends waViewAction
{
    public function execute()
    {
        
        $videosModel = new shopProductvideoPluginModel();
        $tagsModel = new shopProductvideoPluginTagsModel();

        $productId = waRequest::get('id');
        $videos = $videosModel->getByProductId($productId);
        $tags = $tagsModel->getAllTags();

        $this->view->assign('videos', $videos);
        $this->view->assign('tags', $tags);
    }
}