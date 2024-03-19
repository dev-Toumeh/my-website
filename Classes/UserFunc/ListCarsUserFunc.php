<?php

namespace Toumeh\MyWebsite\UserFunc;

use Doctrine\DBAL\Exception;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\Restriction\FrontendRestrictionContainer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

class ListCarsUserFunc
{
    private ContentObjectRenderer $cObj;

    public function setContentObjectRenderer(ContentObjectRenderer $cObj): void
    {
        $this->cObj = $cObj;
    }

    public function listCars(string $content, array $conf, ServerRequestInterface $request): string
    {
        $view = $this->getView();
        $view->assign('cars', $this->getCars());
        var_dump('hello');
        return $view->render();
    }

    /**
     * @throws Exception
     */
    public function getCars(): array {
        $queryBuilder = $this->getConnectionPool()->getQueryBuilderForTable('tx_cars_car');

        $queryBuilder->setRestrictions(GeneralUtility::makeInstance(FrontendRestrictionContainer::class));
        $statement =$queryBuilder
            ->select('*')
            ->from('tx_cars_car')
            ->orderBy('sorting')
            ->executeQuery();
        $cars = [];
        while ($car = $statement->fetchAssociative()) {

            $cars[] = $car;
        }

        return $cars;
    }

    private function getView(): StandaloneView
    {
       $view = GeneralUtility::makeInstance(StandaloneView::class);
       $view->setTemplatePathAndFilename('EXT:cars/Resources/Private/Templates/ListCars.html');
       $view->setLayoutRootPaths(['EXT:cars/Resources/Private/Layouts/']);


       return $view;
    }

    private function getConnectionPool(): ConnectionPool
    {
       return  GeneralUtility::makeInstance(ConnectionPool::class);
    }
}