<?php
/**
 * TwitterResourceOwner
 */
namespace Kukiwasabi\OAuth2\Client\Provider;

class TwitterResourceOwner implements ResourceOwnerInterface
{
	/**
	 * Returns the identifier of the authorized resource owner.
	 *
	 * @return mixed
	 */
	public function getId() {
		return $this->response['data']['id'] ?: null;
	}

	/**
	 * Return all of the owner details available as an array.
	 *
	 * @return array
	 */
	public function toArray() {
		return $this->response['data'];
	}
}
