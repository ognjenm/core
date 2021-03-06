<?php namespace Telenok\Core\Model\Web;

class PageController extends \Telenok\Core\Interfaces\Eloquent\Object\Model {

	protected $ruleList = ['title' => ['required', 'min:1']];
	protected $table = 'page_controller';

    public function page()
    {
        return $this->hasMany('\App\Telenok\Core\Model\Web\Page', 'page_page_controller');
    }

}