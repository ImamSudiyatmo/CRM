<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\CustomerModel;
use App\Entities\CustomerEntity;

class CustomerController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        if ($this->request->isAJAX()) {
            // response ajax
            // arahkan ke function show tanpa parameter id
            return $this->show();
        } else {
            // response non ajax
            return view('customer/index', [
                'title' => 'Customer',
            ]);
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $cust_mod = new CustomerModel();
        if ($id == null) {
            // jika parameter id tidak ada / null
            if ($this->request->getMethod() == 'post') {
                // jika request method post, tampil datatable
                return $this->respond([], 200, 'You Get Datatable');
            } else if ($this->request->getMethod() == 'get') {
                // jika request method get, tampil list biasa
                $cust_lists = $cust_mod->find();
                return $this->respond($cust_lists);
            }
        } else {
            // jika ada parameter id
            // filter customer with deleted
            $allCustomers = $cust_mod->withDeleted()->find($id);
            if (is_null($allCustomers)) {
                // jika tidak ada
                return $this->failNotFound();
            } else {
                // jika ada nilainya
                $activeCust = $cust_mod->find($id);
                if (is_null($activeCust)) {
                    // customer sudah di delete
                    return $this->respondNoContent();
                } else {
                    // customer masih aktif
                    return $this->respond($activeCust);
                }
            }
        }
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $cust_mod = new CustomerModel();
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $cust_mod = new CustomerModel();
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $cust_mod = new CustomerModel();
    }
}
