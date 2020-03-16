<?php
namespace First\Grid\Api;

interface AllnewsRepositoryInterface
{
	public function save(\First\Grid\Api\Data\AllnewsInterface $news);

    public function getById($newsId);

    public function delete(\First\Grid\Api\Data\AllnewsInterface $news);

    public function deleteById($newsId);
}
