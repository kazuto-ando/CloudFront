<?php

require_once APPLICATION_PATH.'/../library/aws/aws-autoloader.php';
use Aws\CloudFront\CloudFrontClient;

/**
 * Class CloudFront
 */
class CloudFront
{
	var $cloudFront;

	public function __construct(){

		// cloudFrontの設定
		$this->cloudFront = CloudFrontClient::factory(
			array('key' => '*****',
				  'secret' => '****',
				  'region' => '*****',
			));
	}

	/**
	 *
	 * キャッシュ削除
	 */
	public function createInvalidation()
	{

		$paths = array('/*');

		$result = $this->cloudFront->createInvalidation(array(
			// DistributionId is required
			'DistributionId' => '*****',
			// Paths is required
			'Paths' => array(
				// Quantity is required
				'Quantity' => count($paths),
				'Items' => $paths,
			),
			// CallerReference is required
			'CallerReference' => time(),
		));

		return $result;
	}

}



