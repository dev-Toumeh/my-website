<?php

namespace Toumeh\MyWebsite\ViewHelpers;

use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class UrlsViewHelper extends AbstractViewHelper
{
    /**
     * Initialize the arguments that your ViewHelper accepts.
     */
    public function initializeArguments(): void
    {
        $this->registerArgument('externUrls', 'mixed', 'External URLs to be processed', true);
    }

    /**
     * Apply the formatUrlsForDisplay method to the URLs provided.
     *
     * @return array The formatted URLs.
     */
    public function render(): array
    {
        $urls = $this->arguments['externUrls'];
        return $this->formatUrlsForDisplay($urls);
    }

    /**
     * Formats the array or QueryResultInterface of URLs for display.
     *
     * @param array|QueryResultInterface $urls The URLs to format.
     * @return array The formatted URLs.
     */
    protected function formatUrlsForDisplay(QueryResultInterface|array $urls): array
    {
        $result = [];
        foreach ($urls as $url) {
            $result[$url->getType()] = $url->getUrl();
        }
        return $result;
    }
}