<?php
// lib/models/shopProductvideo.model.php
class shopProductvideoPluginModel extends waModel
{
    protected $table = 'shop_productvideo'; 

    public function getByProductId($product_id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE product_id = i:product_id";
        return $this->query($sql, ['product_id' => $product_id])->fetchAll();
    }

    public function addVideo($product_id, $video_url, $tags)
    {
        $data = [
            'product_id' => $product_id,
            'video_url'  => $video_url,
            'tags'       => $tags,
        ];
        return $this->insert($data);
    }

    public function deleteVideo($id)
    {
        return $this->deleteById($id);
    }

    public function updateTags($id, $tags)
    {
        $data = [
            'tags' => $tags,
        ];
        return $this->updateById($id, $data);
    }
    public function getAllVideos()
    {
        return $this->query("SELECT * FROM {$this->table}")->fetchAll();
    }
}
