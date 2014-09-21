<?php namespace App\Controller;

class FeaturedBookController extends Controller {

	public function indexAction() {
		return array(
			'books' => $this->em()->getFeaturedBookRepository()->getLatest(100),
		);
	}

	public function bookAction() {
		return $this->render('App:FeaturedBook:book.html.twig', array(
			'book' => $this->em()->getFeaturedBookRepository()->getRandom()
		));
	}
}