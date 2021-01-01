<?php namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
	public function index()
	{
		$data = [];
		
		helper(['form']);	
		if($this->request->getMethod()=='post'){
			$rules = [				
				'email'=> "required|min_length[8]|max_length[100]|valid_email",
				'password'=> "required|min_length[6]|max_length[100]|validateUser[email,password]",				
			];

			$errors = [
				'password'=>[
					'validateUser'=>'Email or Password don\'t matched'
				]
			];

			if(!$this->validate($rules,$errors)){
				$data['validation']= $this->validator;
			}else{
				// Store the user in our database
				$model = new UserModel();
				$user = $model->where('email',$this->request->getVar('email'))
								->first();
				$this->setUserSession($user);
				// $session = session();
				// $session->setFlashData('success','Successfully Registered');
				return redirect()->to('dashboard');
			}
		}
		echo view('templates/header',$data);
		echo view('auth/login');
		echo view('templates/footer');
	}
	private function setUserSession($user){
		$data = [
			'id'=>$user['id'],
			'first_name'=>$user['first_name'],
			'last_name'=>$user['last_name'],
			'email'=>$user['email'],
			'loggedIn'=>true
		];
		session()->set($data);
		return true;
	}
	public function register()
	{
		$data = [];
		
		helper(['form']);	
		if($this->request->getMethod()=='post'){
			$rules = [
				'first_name'=> "required|min_length[4]|max_length[100]",
				'last_name'=>"required|min_length[4]|max_length[100]",
				'email'=> "required|min_length[8]|max_length[100]|valid_email|is_unique[users.email]",
				'password'=> "required|min_length[6]|max_length[100]",
				'confirm_password'=>'matches[password]'
			];
			if(!$this->validate($rules)){
				$data['validation']= $this->validator;
			}else{
				// Store the user in our database
				$model = new UserModel();
				$newdata = [
					'first_name'=>$this->request->getVar('first_name'),
					'last_name'=>$this->request->getVar('last_name'),
					'email'=>$this->request->getVar('email'),
					'password'=>$this->request->getVar('password')
				];
				$model->save($newdata);

				$session = session();
				$session->setFlashData('success','Successfully Registered');
				return redirect()->to('/');
			}
		}

		echo view('templates/header',$data);
		echo view('auth/register');
		echo view('templates/footer');
	}
	public function profile(){
		$data = [];
		$model = new UserModel();
		helper(['form']);	
		if($this->request->getMethod()=='post'){
			$rules = [
				'first_name'=> "required|min_length[4]|max_length[100]",
				'last_name'=>"required|min_length[4]|max_length[100]",
				
			];
			if($this->request->getPost('password')!=''){
				$rules['password']= "required|min_length[6]|max_length[100]";
				$rules['confirm_password']='matches[password]';
			}
			if(!$this->validate($rules)){
				$data['validation']= $this->validator;
			}else{
				// Store the user in our database
				
				$newdata = [
					'id'=>session()->get('id'),
					'first_name'=>$this->request->getPost('first_name'),
					'last_name'=>$this->request->getPost('last_name'),
					
					'password'=>$this->request->getPost('password')
				];
				if($this->request->getPost('password')!=''){
					$newdata['password']= $this->request->getVar('password');					
				}

				$model->save($newdata);

				$session = session();
				$session->setFlashData('success','Successfully Updated');
				return redirect()->to('/profile');
			}
		}
		$data['user']=$model->where('id',session()->get('id'))->first();
		echo view('templates/header',$data);
		echo view('auth/profile');
		echo view('templates/footer');
	}

	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}
}
