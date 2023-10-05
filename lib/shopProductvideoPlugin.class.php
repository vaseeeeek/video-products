<?php

class shopProductvideoPlugin extends shopPlugin
{
    public function handleBackendProduct($product)
	{   
        if (!$product->id)
		{
			return [];
		}

		$view = wa()->getView();
		$view->assign('product', $product);

		$templatePathProductEditSectionLi = wa()->getAppPath('plugins/productvideo/templates/hooks/', 'shop') . 'BackendProduct.EditSectionLi.html';

		return [
			'edit_section_li' => $view->fetch($templatePathProductEditSectionLi),
		];
	}
	public function videoDataHook($product_id)
	{
		$model = new shopProductvideoPluginModel();
		$videos = $model->getByProductId($product_id);
		$tagsModel = new shopProductvideoPluginTagsModel();
		$tagRows = $tagsModel->getAllTags();

		$allTags = [];
		foreach ($tagRows as $tagRow) {
			$allTags[$tagRow['id']] = $tagRow['name'];
		}

		$videoData = [];

		foreach ($videos as $video) {
			$videoTags = [];
			$tagIds = explode(',', $video['tags']);
			
			foreach ($tagIds as $tagId) {
				if (isset($allTags[$tagId])) {
					$videoTags[$tagId] = $allTags[$tagId];
				}
			}

			$videoData[$video['id']] = [$video['video_url'], $videoTags];
		}

		return $videoData;
	}
}
