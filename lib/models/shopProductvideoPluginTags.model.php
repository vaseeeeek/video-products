<?php
// lib/models/shopProductvideoTagsModel.php

class shopProductvideoPluginTagsModel extends waModel
{
    protected $table = 'shop_productvideo_tags'; // Table name according to Webasyst naming conventions

    // Fetch all predefined tags from the plugin settings
    public function getAllTags()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->query($sql)->fetchAll();
    }

    // Add a new tag
    public function addTag($tag_name)
    {
        $data = [
            'name' => $tag_name,
        ];
        return $this->insert($data);
    }

    // Delete a tag by its ID
    public function deleteTag($id)
    {
        return $this->deleteById($id);
    }

    // Update a tag by its ID
    public function updateTag($id, $new_name)
    {
        return $this->updateById($id, ['name' => $new_name]);
    }
}
