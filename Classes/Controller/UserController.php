<?php

namespace Toumeh\MyWebsite\Controller;


use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extensionmanager\Controller\AbstractController;

class UserController extends AbstractController
{
    public function newAction(): ResponseInterface
    {
        var_dump('sex');
        $this->view->assign('newBlog', 'hello from the blog');
        return $this->htmlResponse('<h1>hello from car controller</h1>');
    }
}