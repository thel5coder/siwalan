<?php

namespace App\Services;

use App\Repository\Contract\IBaseRepository;
use App\Services\Response\ServiceResponseDto as ResponseDto;
use App\Services\Response\ServicePaginationResponseDto as PaginationDto;
use App\Repository\Contract\Pagination\PaginationParam;
use Illuminate\Support\Facades\Input;
use Tymon\JWTAuth\Facades\JWTAuth;

abstract class BaseService {
    protected function generateSlug($url){
        $url = strtolower($url);
        //Make alphanumeric (removes all other characters)
        $url = preg_replace("/[^a-z0-9_\s-]/", "", $url);
        //Clean up multiple dashes or whitespaces
        $url = preg_replace("/[\s-]+/", " ", $url);
        //Convert whitespaces and underscore to dash
        $url = preg_replace("/[\s_]/", "-", $url);
        return $url;
    }

    protected function getAuthenticatedUser(){
        $response = new ResponseDto();
        try {
            if (!$response->setResult(JWTAuth::parseToken()->authenticate())) {
                $message = 'User tidak di temukan';
                $response->addErrorMessage($message);
            }
        } catch (TokenExpiredException $e) {
            $message = 'TokenExpired';
            $response->addErrorMessage($message);
        } catch (TokenInvalidException $e) {
            $message = 'TokenInvalid';
            $response->addErrorMessage($message);
        } catch (JWTException $e) {
            $message = 'TokenAbsent';
            $response->addErrorMessage($message);
        }
        // the token is valid and we have found the user via the sub claim
        return $response;
    }

    public function uploadingFile($input){
        $response = new ResponseDto();
        if(Input::hasFile($input)){
            $fileName = date('YmdHis').'-'.Input::file($input)->getClientOriginalName();
            if (Input::file($input)->move(base_path() . '/public/upload/', $fileName)) {
                $response->setResult($fileName);
            } else {
                $fileName='';
                $response->setResult($fileName);
            }
        }
        return $response;
    }

    protected function deleteObject(IBaseRepository $repository, $id) {
        $response = new ResponseDto();

        $response->setResult($repository->delete($id));

        return $response;
    }

    protected function readObject(IBaseRepository $repository, $id) {
        $response = new ResponseDto();
        $response->setResult($repository->read($id));

        return $response;
    }

    protected function getAllObject(IBaseRepository $repository) {
        $response = new ResponseDto();
        $response->setResult($repository->showAll());

        return $response;
    }

    protected function getPaginationObject(IBaseRepository $repository, $param) {
        $response = new PaginationDto();
   
        $pagingResult = $repository->paginationData($this->parsePaginationParam($param));
        $response->setCurrentPage($param['pageIndex']);
        $response->setPageSize($param['pageSize']);
        $response->setTotalCount($pagingResult->getTotalCount());
        $response->setResult($pagingResult->getResult());

        return $response;
    }

    protected function parsePaginationParam($param) {
        $paginationParam = new PaginationParam();
        $paginationParam->setKeyword($param['searchPhrase']);
        $paginationParam->setPageIndex($param['pageIndex']);
        $paginationParam->setPageSize($param['pageSize']);

        if ($param['sort'] != '') {
            foreach ($param['sort'] as $key => $value) {
                $paginationParam->setSortBy($key);
                $paginationParam->setSortOrder($value);
            }
        }
        
        return $paginationParam;
    }

}
