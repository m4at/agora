<?php
namespace AgoraTeam\Agora\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Phillip Thiele
 *           Björn Christopher Bresser <bjoern.bresser@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * User
 */
class User extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * signiture
	 *
	 * @var string
	 */
	protected $signiture = '';

	/**
	 * posts
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Post>
	 * @cascade remove
	 */
	protected $posts = NULL;

	/**
	 * favoriteThreads
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Thread>
	 * @cascade remove
	 */
	protected $favoriteThreads = NULL;

	/**
	 * observedThreads
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Thread>
	 * @cascade remove
	 */
	protected $observedThreads = NULL;

	/**
	 * spamPosts
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Post>
	 * @cascade remove
	 */
	protected $spamPosts = NULL;

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->posts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->favoriteThreads = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->observedThreads = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->spamPosts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the signiture
	 *
	 * @return string $signiture
	 */
	public function getSigniture() {
		return $this->signiture;
	}

	/**
	 * Sets the signiture
	 *
	 * @param string $signiture
	 * @return void
	 */
	public function setSigniture($signiture) {
		$this->signiture = $signiture;
	}

	/**
	 * Adds a Post
	 *
	 * @param \AgoraTeam\Agora\Domain\Model\Post $post
	 * @return void
	 */
	public function addPost(\AgoraTeam\Agora\Domain\Model\Post $post) {
		$this->posts->attach($post);
	}

	/**
	 * Removes a Post
	 *
	 * @param \AgoraTeam\Agora\Domain\Model\Post $postToRemove The Post to be removed
	 * @return void
	 */
	public function removePost(\AgoraTeam\Agora\Domain\Model\Post $postToRemove) {
		$this->posts->detach($postToRemove);
	}

	/**
	 * Returns the posts
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Post> $posts
	 */
	public function getPosts() {
		return $this->posts;
	}

	/**
	 * Sets the posts
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Post> $posts
	 * @return void
	 */
	public function setPosts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $posts) {
		$this->posts = $posts;
	}

	/**
	 * Adds a Thread
	 *
	 * @param \AgoraTeam\Agora\Domain\Model\Thread $favoriteThread
	 * @return void
	 */
	public function addFavoriteThread(\AgoraTeam\Agora\Domain\Model\Thread $favoriteThread) {
		$this->favoriteThreads->attach($favoriteThread);
	}

	/**
	 * Removes a Thread
	 *
	 * @param \AgoraTeam\Agora\Domain\Model\Thread $favoriteThreadToRemove The Thread to be removed
	 * @return void
	 */
	public function removeFavoriteThread(\AgoraTeam\Agora\Domain\Model\Thread $favoriteThreadToRemove) {
		$this->favoriteThreads->detach($favoriteThreadToRemove);
	}

	/**
	 * Returns the favoriteThreads
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Thread> $favoriteThreads
	 */
	public function getFavoriteThreads() {
		return $this->favoriteThreads;
	}

	/**
	 * Sets the favoriteThreads
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Thread> $favoriteThreads
	 * @return void
	 */
	public function setFavoriteThreads(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $favoriteThreads) {
		$this->favoriteThreads = $favoriteThreads;
	}

	/**
	 * Adds a Thread
	 *
	 * @param \AgoraTeam\Agora\Domain\Model\Thread $observedThread
	 * @return void
	 */
	public function addObservedThread(\AgoraTeam\Agora\Domain\Model\Thread $observedThread) {
		$this->observedThreads->attach($observedThread);
	}

	/**
	 * Removes a Thread
	 *
	 * @param \AgoraTeam\Agora\Domain\Model\Thread $observedThreadToRemove The Thread to be removed
	 * @return void
	 */
	public function removeObservedThread(\AgoraTeam\Agora\Domain\Model\Thread $observedThreadToRemove) {
		$this->observedThreads->detach($observedThreadToRemove);
	}

	/**
	 * Returns the observedThreads
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Thread> $observedThreads
	 */
	public function getObservedThreads() {
		return $this->observedThreads;
	}

	/**
	 * Sets the observedThreads
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Thread> $observedThreads
	 * @return void
	 */
	public function setObservedThreads(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $observedThreads) {
		$this->observedThreads = $observedThreads;
	}

	/**
	 * Adds a Post
	 *
	 * @param \AgoraTeam\Agora\Domain\Model\Post $spamPost
	 * @return void
	 */
	public function addSpamPost(\AgoraTeam\Agora\Domain\Model\Post $spamPost) {
		$this->spamPosts->attach($spamPost);
	}

	/**
	 * Removes a Post
	 *
	 * @param \AgoraTeam\Agora\Domain\Model\Post $spamPostToRemove The Post to be removed
	 * @return void
	 */
	public function removeSpamPost(\AgoraTeam\Agora\Domain\Model\Post $spamPostToRemove) {
		$this->spamPosts->detach($spamPostToRemove);
	}

	/**
	 * Returns the spamPosts
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Post> $spamPosts
	 */
	public function getSpamPosts() {
		return $this->spamPosts;
	}

	/**
	 * Sets the spamPosts
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Post> $spamPosts
	 * @return void
	 */
	public function setSpamPosts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $spamPosts) {
		$this->spamPosts = $spamPosts;
	}

}