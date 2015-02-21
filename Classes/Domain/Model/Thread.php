<?php
namespace AgoraTeam\Agora\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Phillip Thiele <philipp.thiele@phth.de>
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
 * Thread
 */
class Thread extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 * 
	 * @var string
	 */
	protected $title = '';

	/**
	 * solved
	 * 
	 * @var boolean
	 */
	protected $solved = FALSE;

	/**
	 * closed
	 * 
	 * @var boolean
	 */
	protected $closed = FALSE;

	/**
	 * sticky
	 * 
	 * @var boolean
	 */
	protected $sticky = FALSE;

	/**
	 * creator
	 * 
	 * @var \AgoraTeam\Agora\Domain\Model\User
	 * @lazy
	 */
	protected $creator = NULL;

	/**
	 * posts
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Post>
	 * @cascade remove
	 * @lazy
	 */
	protected $posts = NULL;

	/**
	 * views
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<>
	 * @cascade remove
	 * @lazy
	 */
	protected $views = NULL;

	/**
	 * groupsWithReadAccess
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Group>
	 * @lazy
	 */
	protected $groupsWithReadAccess = NULL;

	/**
	 * groupWithWriteAccesss
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Group>
	 * @lazy
	 */
	protected $groupWithWriteAccesss = NULL;

	/**
	 * groupsWithModificationAccess
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Group>
	 * @lazy
	 */
	protected $groupsWithModificationAccess = NULL;

	/**
	 * usersWithReadAccess
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\User>
	 * @lazy
	 */
	protected $usersWithReadAccess = NULL;

	/**
	 * usersWthWriteAccessii
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\User>
	 * @lazy
	 */
	protected $usersWthWriteAccessii = NULL;

	/**
	 * usersWithModificationAccess
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\User>
	 * @lazy
	 */
	protected $usersWithModificationAccess = NULL;

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
		$this->views = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->groupsWithReadAccess = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->groupWithWriteAccesss = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->groupsWithModificationAccess = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->usersWithReadAccess = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->usersWthWriteAccessii = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->usersWithModificationAccess = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the title
	 * 
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 * 
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the solved
	 * 
	 * @return boolean $solved
	 */
	public function getSolved() {
		return $this->solved;
	}

	/**
	 * Sets the solved
	 * 
	 * @param boolean $solved
	 * @return void
	 */
	public function setSolved($solved) {
		$this->solved = $solved;
	}

	/**
	 * Returns the boolean state of solved
	 * 
	 * @return boolean
	 */
	public function isSolved() {
		return $this->solved;
	}

	/**
	 * Returns the closed
	 * 
	 * @return boolean $closed
	 */
	public function getClosed() {
		return $this->closed;
	}

	/**
	 * Sets the closed
	 * 
	 * @param boolean $closed
	 * @return void
	 */
	public function setClosed($closed) {
		$this->closed = $closed;
	}

	/**
	 * Returns the boolean state of closed
	 * 
	 * @return boolean
	 */
	public function isClosed() {
		return $this->closed;
	}

	/**
	 * Returns the sticky
	 * 
	 * @return boolean $sticky
	 */
	public function getSticky() {
		return $this->sticky;
	}

	/**
	 * Sets the sticky
	 * 
	 * @param boolean $sticky
	 * @return void
	 */
	public function setSticky($sticky) {
		$this->sticky = $sticky;
	}

	/**
	 * Returns the boolean state of sticky
	 * 
	 * @return boolean
	 */
	public function isSticky() {
		return $this->sticky;
	}

	/**
	 * Returns the creator
	 * 
	 * @return \AgoraTeam\Agora\Domain\Model\User $creator
	 */
	public function getCreator() {
		return $this->creator;
	}

	/**
	 * Sets the creator
	 * 
	 * @param \AgoraTeam\Agora\Domain\Model\User $creator
	 * @return void
	 */
	public function setCreator(\AgoraTeam\Agora\Domain\Model\User $creator) {
		$this->creator = $creator;
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
	 * Adds a
	 * 
	 * @param  $view
	 * @return void
	 */
	public function addView($view) {
		$this->views->attach($view);
	}

	/**
	 * Removes a
	 * 
	 * @param $viewToRemove The  to be removed
	 * @return void
	 */
	public function removeView($viewToRemove) {
		$this->views->detach($viewToRemove);
	}

	/**
	 * Returns the views
	 * 
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<> $views
	 */
	public function getViews() {
		return $this->views;
	}

	/**
	 * Sets the views
	 * 
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<> $views
	 * @return void
	 */
	public function setViews(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $views) {
		$this->views = $views;
	}

	/**
	 * Adds a Group
	 * 
	 * @param \AgoraTeam\Agora\Domain\Model\Group $groupsWithReadAcces
	 * @return void
	 */
	public function addGroupsWithReadAcces(\AgoraTeam\Agora\Domain\Model\Group $groupsWithReadAcces) {
		$this->groupsWithReadAccess->attach($groupsWithReadAcces);
	}

	/**
	 * Removes a Group
	 * 
	 * @param \AgoraTeam\Agora\Domain\Model\Group $groupsWithReadAccesToRemove The Group to be removed
	 * @return void
	 */
	public function removeGroupsWithReadAcces(\AgoraTeam\Agora\Domain\Model\Group $groupsWithReadAccesToRemove) {
		$this->groupsWithReadAccess->detach($groupsWithReadAccesToRemove);
	}

	/**
	 * Returns the groupsWithReadAccess
	 * 
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Group> $groupsWithReadAccess
	 */
	public function getGroupsWithReadAccess() {
		return $this->groupsWithReadAccess;
	}

	/**
	 * Sets the groupsWithReadAccess
	 * 
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Group> $groupsWithReadAccess
	 * @return void
	 */
	public function setGroupsWithReadAccess(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $groupsWithReadAccess) {
		$this->groupsWithReadAccess = $groupsWithReadAccess;
	}

	/**
	 * Adds a Group
	 * 
	 * @param \AgoraTeam\Agora\Domain\Model\Group $groupWithWriteAccess
	 * @return void
	 */
	public function addGroupWithWriteAccess(\AgoraTeam\Agora\Domain\Model\Group $groupWithWriteAccess) {
		$this->groupWithWriteAccesss->attach($groupWithWriteAccess);
	}

	/**
	 * Removes a Group
	 * 
	 * @param \AgoraTeam\Agora\Domain\Model\Group $groupWithWriteAccessToRemove The Group to be removed
	 * @return void
	 */
	public function removeGroupWithWriteAccess(\AgoraTeam\Agora\Domain\Model\Group $groupWithWriteAccessToRemove) {
		$this->groupWithWriteAccesss->detach($groupWithWriteAccessToRemove);
	}

	/**
	 * Returns the groupWithWriteAccesss
	 * 
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Group> $groupWithWriteAccesss
	 */
	public function getGroupWithWriteAccesss() {
		return $this->groupWithWriteAccesss;
	}

	/**
	 * Sets the groupWithWriteAccesss
	 * 
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Group> $groupWithWriteAccesss
	 * @return void
	 */
	public function setGroupWithWriteAccesss(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $groupWithWriteAccesss) {
		$this->groupWithWriteAccesss = $groupWithWriteAccesss;
	}

	/**
	 * Adds a Group
	 * 
	 * @param \AgoraTeam\Agora\Domain\Model\Group $groupsWithModificationAcces
	 * @return void
	 */
	public function addGroupsWithModificationAcces(\AgoraTeam\Agora\Domain\Model\Group $groupsWithModificationAcces) {
		$this->groupsWithModificationAccess->attach($groupsWithModificationAcces);
	}

	/**
	 * Removes a Group
	 * 
	 * @param \AgoraTeam\Agora\Domain\Model\Group $groupsWithModificationAccesToRemove The Group to be removed
	 * @return void
	 */
	public function removeGroupsWithModificationAcces(\AgoraTeam\Agora\Domain\Model\Group $groupsWithModificationAccesToRemove) {
		$this->groupsWithModificationAccess->detach($groupsWithModificationAccesToRemove);
	}

	/**
	 * Returns the groupsWithModificationAccess
	 * 
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Group> $groupsWithModificationAccess
	 */
	public function getGroupsWithModificationAccess() {
		return $this->groupsWithModificationAccess;
	}

	/**
	 * Sets the groupsWithModificationAccess
	 * 
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Group> $groupsWithModificationAccess
	 * @return void
	 */
	public function setGroupsWithModificationAccess(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $groupsWithModificationAccess) {
		$this->groupsWithModificationAccess = $groupsWithModificationAccess;
	}

	/**
	 * Adds a User
	 * 
	 * @param \AgoraTeam\Agora\Domain\Model\User $usersWithReadAcces
	 * @return void
	 */
	public function addUsersWithReadAcces(\AgoraTeam\Agora\Domain\Model\User $usersWithReadAcces) {
		$this->usersWithReadAccess->attach($usersWithReadAcces);
	}

	/**
	 * Removes a User
	 * 
	 * @param \AgoraTeam\Agora\Domain\Model\User $usersWithReadAccesToRemove The User to be removed
	 * @return void
	 */
	public function removeUsersWithReadAcces(\AgoraTeam\Agora\Domain\Model\User $usersWithReadAccesToRemove) {
		$this->usersWithReadAccess->detach($usersWithReadAccesToRemove);
	}

	/**
	 * Returns the usersWithReadAccess
	 * 
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\User> $usersWithReadAccess
	 */
	public function getUsersWithReadAccess() {
		return $this->usersWithReadAccess;
	}

	/**
	 * Sets the usersWithReadAccess
	 * 
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\User> $usersWithReadAccess
	 * @return void
	 */
	public function setUsersWithReadAccess(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $usersWithReadAccess) {
		$this->usersWithReadAccess = $usersWithReadAccess;
	}

	/**
	 * Adds a User
	 * 
	 * @param \AgoraTeam\Agora\Domain\Model\User $usersWthWriteAccessii
	 * @return void
	 */
	public function addUsersWthWriteAccessii(\AgoraTeam\Agora\Domain\Model\User $usersWthWriteAccessii) {
		$this->usersWthWriteAccessii->attach($usersWthWriteAccessii);
	}

	/**
	 * Removes a User
	 * 
	 * @param \AgoraTeam\Agora\Domain\Model\User $usersWthWriteAccessiiToRemove The User to be removed
	 * @return void
	 */
	public function removeUsersWthWriteAccessii(\AgoraTeam\Agora\Domain\Model\User $usersWthWriteAccessiiToRemove) {
		$this->usersWthWriteAccessii->detach($usersWthWriteAccessiiToRemove);
	}

	/**
	 * Returns the usersWthWriteAccessii
	 * 
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\User> $usersWthWriteAccessii
	 */
	public function getUsersWthWriteAccessii() {
		return $this->usersWthWriteAccessii;
	}

	/**
	 * Sets the usersWthWriteAccessii
	 * 
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\User> $usersWthWriteAccessii
	 * @return void
	 */
	public function setUsersWthWriteAccessii(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $usersWthWriteAccessii) {
		$this->usersWthWriteAccessii = $usersWthWriteAccessii;
	}

	/**
	 * Adds a User
	 * 
	 * @param \AgoraTeam\Agora\Domain\Model\User $usersWithModificationAcces
	 * @return void
	 */
	public function addUsersWithModificationAcces(\AgoraTeam\Agora\Domain\Model\User $usersWithModificationAcces) {
		$this->usersWithModificationAccess->attach($usersWithModificationAcces);
	}

	/**
	 * Removes a User
	 * 
	 * @param \AgoraTeam\Agora\Domain\Model\User $usersWithModificationAccesToRemove The User to be removed
	 * @return void
	 */
	public function removeUsersWithModificationAcces(\AgoraTeam\Agora\Domain\Model\User $usersWithModificationAccesToRemove) {
		$this->usersWithModificationAccess->detach($usersWithModificationAccesToRemove);
	}

	/**
	 * Returns the usersWithModificationAccess
	 * 
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\User> $usersWithModificationAccess
	 */
	public function getUsersWithModificationAccess() {
		return $this->usersWithModificationAccess;
	}

	/**
	 * Sets the usersWithModificationAccess
	 * 
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\User> $usersWithModificationAccess
	 * @return void
	 */
	public function setUsersWithModificationAccess(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $usersWithModificationAccess) {
		$this->usersWithModificationAccess = $usersWithModificationAccess;
	}

}