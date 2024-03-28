<?php

namespace Toumeh\MyWebsite\Controller;


use Psr\Http\Message\ResponseInterface;
use Toumeh\MyWebsite\Domain\Repository\QualificationsRepository;
use Toumeh\MyWebsite\Domain\Repository\UrlsRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;


class HomeController extends AbstractController
{

    public function indexAction(): ResponseInterface
    {
        try {
            $view = $this->getView();
            $this->view->assign(self::PAGES, $this->urlsRepository->getUrls());
            $this->view->assign(self::EXTERN_URLS, $this->urlsRepository->getUrls(UrlsRepository::TYPE_EXTERNAL));
            return $this->htmlResponse($view->render());
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            return $this->redirect(self::INDEX);
        }
    }

    public function resumeAction(): ResponseInterface
    {
        try {
            $view = $this->getView();
            $this->view->assign(self::EXPERIENCES, $this->qualificationRepository->getQualifications());
            $this->view->assign(self::EDUCATIONS, $this->qualificationRepository->getQualifications(QualificationsRepository::CATEGORY_EDUCATION));
            return $this->htmlResponse($view->render());
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            return $this->redirect(self::INDEX);
        }
    }

    public function contactAction(): ResponseInterface
    {
        try {
            $view = $this->getView();
            $this->view->assign(self::SKILLS, $this->myWebsiteService->formatSkillsForDisplay($this->skillsRepository->getSkills()));
            return $this->htmlResponse($view->render());
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            return $this->redirect(self::INDEX);
        }
    }

    public function projectsAction(): ResponseInterface
    {
        try {
            $view = $this->getView();
            $this->view->assign(self::PROJECTS, $this->myWebsiteService->formatProjectsForDisplay($this->projectsRepository->getProjects()));
            return $this->htmlResponse($view->render());
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            return $this->redirect(self::INDEX);
        }
    }


    private function getView(): StandaloneView
    {
        $view = GeneralUtility::makeInstance(StandaloneView::class);
        $view->setTemplatePathAndFilename(self::TEMPLATE_PATH);
        $view->setLayoutRootPaths([self::LAYOUT_PATH]);
        $view->setPartialRootPaths([self::PARTIALS_PATH]);
        $this->view->assign(self::PAGES, $this->urlsRepository->getUrls());
        $this->view->assign(self::SECTIONS, self::ACTIONS_SECTIONS[$this->getControllerActionName()]);

        return $view;
    }
}