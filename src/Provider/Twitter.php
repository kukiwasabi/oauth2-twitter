<?php
/**
 * Twitter
 */
namespace League\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Token\AccessToken;
use Psr\Http\Message\ResponseInterface;
use Abraham\TwitterOAuth\TwitterOAuth;

class Twitter extends AbstractProvider
{
	/**
	 * Returns the base URL for authorizing a client.
	 *
	 * Eg. https://oauth.service.com/authorize
	 *
	 * @return string
	 */
	public function getBaseAuthorizationUrl() {
		return 'https://api.twitter.com/oauth/request_token';
	}

	public function getAuthorizationUrl(array $options = []) {
		$connection = new TwitterOAuth($this->clientId, $this->clientSecret);
		$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => $this->redirectUri));
		$options["caller"]->Session->write('twitter.request_token', $request_token);
		$url = $connection->url('oauth/authenticate', array('oauth_token' => $request_token['oauth_token']));
		return $url;
	}

	/**
	 * Returns the base URL for requesting an access token.
	 *
	 * Eg. https://oauth.service.com/token
	 *
	 * @param array $params
	 * @return string
	 */
	public function getBaseAccessTokenUrl(array $params) {
		return 'https://api.twitter.com/oauth/access_token';
	}

	/**
	 * Returns the URL for requesting the resource owner's details.
	 *
	 * @param AccessToken $token
	 * @return string
	 */
	public function getResourceOwnerDetailsUrl(AccessToken $token) {
		return 'https://api.twitter.com/v1/users/self?access_token='.$token;
	}

	/**
	 * Returns the default scopes used by this provider.
	 *
	 * This should only be the scopes that are required to request the details
	 * of the resource owner, rather than all the available scopes.
	 *
	 * @return array
	 */
	protected function getDefaultScopes() {

	}

	/**
	 * Checks a provider response for errors.
	 *
	 * @throws IdentityProviderException
	 * @param  ResponseInterface $response
	 * @param  array|string $data Parsed response data
	 * @return void
	 */
	protected function checkResponse(ResponseInterface $response, $data) {

	}

	/**
	 * Generates a resource owner object from a successful resource owner
	 * details request.
	 *
	 * @param  array $response
	 * @param  AccessToken $token
	 * @return ResourceOwnerInterface
	 */
	protected function createResourceOwner(array $response, AccessToken $token) {

	}
}
