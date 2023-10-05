<?php

// lib/actions/shopProductvideoPluginBackend.actions.php

class shopProductvideoPluginBackendActions extends waActions
{
    public function createtagAction()
    {
        $tag_name = waRequest::post('tag');

        if ($tag_name) {
            $tagsModel = new shopProductvideoPluginTagsModel();
            $tagsModel->addTag($tag_name);
            $this->displayJson(['status' => 'ok']);
        } else {
            $this->displayJson(['status' => 'error', 'errors' => 'Tag name cannot be empty.']);
        }
    }
    public function deletetagAction()
    {
        $tag_id = waRequest::post('id');

        if ($tag_id) {
            $tagsModel = new shopProductvideoPluginTagsModel();
            $tagsModel->deleteTag($tag_id);
            $this->displayJson(['status' => 'ok']);
        } else {
            $this->displayJson(['status' => 'error', 'errors' => 'Tag ID cannot be empty.']);
        }
    }
    public function updatetagsAction()
    {
        $id = waRequest::post('id');
        $tags = waRequest::post('tags');

        $model = new shopProductvideoPluginModel();
        $model->updateTags($id, $tags);

        $this->displayJson(['status' => 'ok']);
    }

    public function addvideoAction()
    {
        $video_url = waRequest::post('video_url');
        $product_id = waRequest::post('product_id');
        $tags = ''; // Initialize tags as empty for now

        $model = new shopProductvideoPluginModel();
        $model->addVideo($product_id, $video_url, $tags);

        $this->displayJson(['status' => 'ok']);
    }
    public function deletevideoAction()
    {
        $id = waRequest::post('id');

        $model = new shopProductvideoPluginModel();
        $model->deleteVideo($id);

        $this->displayJson(['status' => 'ok']);
    }
}
