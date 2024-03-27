<?php

namespace Toumeh\MyWebsite\Controller;

use Exception;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;

class JsonController extends AbstractController
{
    public function jsonAction(): ResponseInterface
    {
        try {
            $request = $this->request;
            $contactData = $this->myWebsiteService->getContactData($request->getParsedBody());
//            $this->myWebsiteService->sendEmail($contactData);
            $resul = [self::SUCCESS => true, self::MESSAGE => self::SUCCESS_MESSAGE];
            $this->logger->info('someone tried to contacted you');
        } catch (InvalidArgumentException $e) {
            $resul = [self::SUCCESS => false, self::MESSAGE => $e->getMessage()];
            $this->logger->error($e->getMessage());
        } catch (Exception $e) {
            $this->logger->error($e->getMessage());
            $resul = [self::SUCCESS => false, self::MESSAGE => self::ERROR_PREDEFINED_MESSAGE];
        };

        return $this->jsonResponse(json_encode($resul));
    }
}