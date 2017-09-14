<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 14/07/2017
 * Time: 12.27
 */

namespace App\Services;


use App\Events\NewUserRegister;
use App\Events\RequestChangeEmail;
use App\Events\UserDinasCreated;
use App\Repository\Contract\IUbahEmailRepository;
use App\Repository\Contract\IUserRepository;
use App\Services\Response\ServicePaginationResponseDto;
use App\Services\Response\ServiceResponseDto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class UserService extends BaseService
{
    protected $userRepository;
    protected $ubahEmailRepository;

    public function __construct(IUserRepository $userRepository, IUbahEmailRepository $ubahEmailRepository)
    {
        $this->userRepository = $userRepository;
        $this->ubahEmailRepository = $ubahEmailRepository;
    }

    public function create($input)
    {
        $response = new ServiceResponseDto();
        $token = md5(uniqid());
        $isEmailExist = $this->isEmailExist('', $input['email']);

        if ($isEmailExist->getResult()) {
            $message = ['Email sudah di gunakan, gunakan email lain'];
            $response->addErrorMessage($message);
        } else {
            $param = [
                'name' => $input['name'],
                'email' => $input['email'],
                'userLevel' => $input['userLevel'],
                'password' => bcrypt($input['password']),
                'token' => $token
            ];

            if (!$this->userRepository->create($param)) {
                $message = ['Gagal menambahkan user'];
                $response->addErrorMessage($message);
            } else {
                Event::fire(new NewUserRegister($input['email'], $token, $input['name']));
            }
        }

        return $response;
    }

    public function createUserDinas($input)
    {
        $response = new ServiceResponseDto();
        $isEmailExist = $this->isEmailExist('', $input['email']);

        if ($isEmailExist->getResult()) {
            $message = ['Email sudah di pakai gunakan email lain'];
            $response->addErrorMessage($message);
        } else {
            $password = uniqid();
            $param = [
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => $password,
                'userLevel' => $input['userLevel'],
                'kabupaten' => $input['kabupaten'],
                'kelurahan' => $input['kelurahan'],
                'korwilId' => $input['korwilId']
            ];
            if (!$this->userRepository->createUserDinas($param)) {
                $message = ['Gagal menyimpan'];
                $response->addErrorMessage($message);
            } else {
                Event::fire(new UserDinasCreated($input['email'], $password));
            }
        }

        return $response;
    }

    public function updateUserDinas($input)
    {
        $response = new ServiceResponseDto();
        $isEmailExist = $this->isEmailExist($input['id'], $input['email']);

        if ($isEmailExist->getResult()) {
            $message = ['Email sudah di pakai gunakan email lain'];
            $response->addErrorMessage($message);
        } else {
            if (!$this->userRepository->createUserDinas($input)) {
                $message = ['Gagal menyimpan'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    public function changePassword($id, $password)
    {
        $response = new ServiceResponseDto();

        if (!$this->userRepository->changePassword($id, $password)) {
            $message = ['Gagal mengubah password'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function read($id)
    {
        return $this->readObject($this->userRepository, $id);
    }

    public function showAll()
    {
        return $this->getAllObject($this->userRepository);
    }

    public function update($input)
    {
        $response = new ServiceResponseDto();


        if (!$this->userRepository->update($input)) {
            $message = ['Gagal menyimpan'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function delete($id)
    {
        return $this->deleteObject($this->userRepository, $id);
    }

    public function paginationFront($filter, $param)
    {
        if ($filter['kabupaten'] == '') {
            return $this->pagination($param);
        } else {
            if ($filter['kecamatan'] == '' || !isset($filter['kecamatan'])) {
                return $this->paginationFilterByKabupaten($param, $filter['kabupaten']);
            } else {
                return $this->paginationFilterByKecamatan($param, $filter['kecamatan']);
            }
        }
    }

    public function pagination($param)
    {
        return $this->getPaginationObject($this->userRepository, $param);
    }

    public function paginationFilterByKabupaten($param, $kabupaten)
    {
        $response = new ServicePaginationResponseDto();

        $pagingResult = $this->userRepository->paginationByKabupaten($this->parsePaginationParam($param), $kabupaten);
        $response->setCurrentPage($param['pageIndex']);
        $response->setPageSize($param['pageSize']);
        $response->setTotalCount($pagingResult->getTotalCount());
        $response->setResult($pagingResult->getResult());

        return $response;
    }

    public function paginationFilterByKecamatan($param, $kecamatan)
    {
        $response = new ServicePaginationResponseDto();

        $pagingResult = $this->userRepository->paginationByKecamatan($this->parsePaginationParam($param), $kecamatan);
        $response->setCurrentPage($param['pageIndex']);
        $response->setPageSize($param['pageSize']);
        $response->setTotalCount($pagingResult->getTotalCount());
        $response->setResult($pagingResult->getResult());

        return $response;
    }

    public function paginationUserByLevel($param, $level)
    {
        $response = new ServicePaginationResponseDto();

        $pagingResult = $this->userRepository->paginationUserByUserLevel($this->parsePaginationParam($param), $level);
        $response->setCurrentPage($param['pageIndex']);
        $response->setPageSize($param['pageSize']);
        $response->setTotalCount($pagingResult->getTotalCount());
        $response->setResult($pagingResult->getResult());

        return $response;
    }

    public function paginationByKorwil($param, $korwil)
    {
        $response = new ServicePaginationResponseDto();

        $pagingResult = $this->userRepository->paginationPerusahaanByKorwil($this->parsePaginationParam($param), $korwil);
        $response->setCurrentPage($param['pageIndex']);
        $response->setPageSize($param['pageSize']);
        $response->setTotalCount($pagingResult->getTotalCount());
        $response->setResult($pagingResult->getResult());

        return $response;
    }

    protected function isUserNameActive($email)
    {
        $response = new ServiceResponseDto();

        $response->setResult($this->userRepository->checkUserIsActive($email));

        return $response;
    }

    protected function isEmailExist($id, $email)
    {
        $response = new ServiceResponseDto();

        $response->setResult($this->userRepository->checkEmail($email, $id));

        return $response;
    }

    public function authProcess($input)
    {
        $response = new ServiceResponseDto();

        $isEmailExist = $this->isEmailExist('', $input['email'])->getResult();
        if ($isEmailExist) {
            $isUserActive = $this->isUserNameActive($input['email'])->getResult();
            if ($isUserActive) {
                if (isset($input['remember'])) {
                    if ($input['remember'] == 1) {
                        if (!Auth::attempt(['email' => $input['email'], 'password' => $input['password']], true)) {
                            $message = ['User dan Password tidak valid!'];
                            $response->addErrorMessage($message);
                        }
                    }
                } else {
                    if (!Auth::attempt(['email' => $input['email'], 'password' => $input['password']], false)) {
                        $message = ['User dan Password tidak valid!'];
                        $response->addErrorMessage($message);
                    }
                }
            } else {
                $message = ['User belum di aktivasi!'];
                $response->addErrorMessage($message);
            }
        } else {
            $message = ['Email / user tidak di temukan!'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function activationUser($email, $token)
    {
        $response = new ServiceResponseDto();
        $userEmail = base64_decode($email);
        $isUserActive = $this->isUserNameActive($userEmail)->getResult();
        if ($isUserActive) {
            $message = ['User sudah di aktivasi'];
            $response->addErrorMessage($message);
        } else {
            if (!$this->userRepository->userConfirmation($userEmail, $token)) {
                $message = ['Gagal mengaktifasi user'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    public function updateDataUmumPerusahaan($param)
    {
        $response = new ServiceResponseDto();
        $perusahaanId = auth()->user()->id;

        if (!$this->userRepository->updateDataUmumPerusahaan($perusahaanId, $param)) {
            $message = ['Gagal menyimpan data'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function updateDataLegalPerusahaan($param)
    {
        $response = new ServiceResponseDto();
        $perusahaanId = auth()->user()->id;

        if (!$this->userRepository->updateDataLegalitasPerusahaan($perusahaanId, $param)) {
            $message = ['Gagal menyimpan data'];
            $response->addErrorMessage($message);
        }

        return $response;
    }


    public function updateDataPengelolah($param)
    {
        $response = new ServiceResponseDto();
        $perusahaanId = auth()->user()->id;

        if (!$this->userRepository->updateDataPengelolah($perusahaanId, $param)) {
            $message = ['Gagal menyimpan data'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function createRequestUbahEmail($input)
    {
        $response = new ServiceResponseDto();
        $isEmailExist = $this->isEmailExist($input['userId'], $input['email']);

        if ($isEmailExist->getResult()) {
            $message = ['Email sudah di gunakan,coba email lainnya'];
            $response->addErrorMessage($message);
        } else {
            if (!$this->ubahEmailRepository->create($input)) {
                $message = ['Gagal menyimpan'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    public function changeStatusUbahEmail($id, $status, $newEmail, $oldEmail, $userId)
    {
        $response = new ServiceResponseDto();

        if (!$this->ubahEmailRepository->changeStatusRequest($id, $status)) {
            $message = ['Gagal mengubah status'];
            $response->addErrorMessage($message);
        } else {
            if ($status == 'setuju') {
                Event::fire(new RequestChangeEmail($status, $newEmail));
                $isEmailExist = $this->isEmailExist($userId, $newEmail);
                if ($isEmailExist->getResult()) {
                    $message = ['Email sudah di gunakan'];
                    $response->addErrorMessage($message);
                } else {
                    if (!$this->userRepository->changeEmail($userId, $newEmail)) {
                        $message = ['Gagal mengubah email'];
                        $response->addErrorMessage($message);
                    }
                }
            } elseif ($status == 'tolak') {
                Event::fire(new RequestChangeEmail($status, $oldEmail));
            }

        }

        return $response;
    }

    public function paginationUbahEmail($param)
    {
        return $this->getPaginationObject($this->ubahEmailRepository, $param);
    }

    public function lupaPassword($email){
        $response = new ServiceResponseDto();
        $isEmailExist= $this->isEmailExist('',$email);

        if($isEmailExist->getResult()){

        }else{
            $message= ['Email tidak di temukan'];
            $response->addErrorMessage($message);
        }

        return $response;
    }
}